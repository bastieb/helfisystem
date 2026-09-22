<?php

use Engelsystem\Mail\EngelsystemMailer;
use Engelsystem\Models\PretixVoucher;
use Engelsystem\Models\Shifts\ShiftEntry;
use Engelsystem\Models\User\User;

/**
 * helfisystem: Tagesticket-Deal (Ausnahme fuer kurze 3-5h-Schichten - Tagesticket statt
 * Wochenendticket). Liegt die Schicht direkt an einem Festivaltag, gibt es automatisch das
 * Ticket fuer genau diesen Tag. Liegt sie ausserhalb (z.B. Auf-/Abbau), muss der Helfi einen
 * der drei Tage auswaehlen - eine frei waehlbare Variante gibt es nicht (keine Voucher dafuer).
 */

/**
 * Prueft, ob ein Helfi fuer den Tagesticket-Deal qualifiziert.
 *
 * Voraussetzung: die Summe der eingeplanten Stunden ist exakt eine einzelne Schicht mit
 * 3 bis 5 Stunden Dauer (unabhaengig vom Schichttyp). Liegt sie an einem der drei
 * konfigurierten Festivaltage, gibt es das Ticket fuer genau diesen Tag; sonst muss der
 * Helfi einen der drei Tage auswaehlen.
 *
 * @return array{eligible: bool, freeChoice: bool, fixedDay: ?string, shift: ?\Engelsystem\Models\Shifts\Shift}
 */
function DayTicketDeal_check_eligibility(User $user): array
{
    $none = ['eligible' => false, 'freeChoice' => false, 'fixedDay' => null, 'shift' => null];

    if (!config('enable_5h_deal')) {
        return $none;
    }

    $entries = ShiftEntry::where('user_id', $user->id)
        ->with(['shift', 'shift.shiftType'])
        ->get();

    if ($entries->count() !== 1) {
        return $none;
    }

    $entry = $entries->first();
    $shift = $entry->shift;
    if (!$shift) {
        return $none;
    }

    $hours = ($shift->end->getTimestamp() - $shift->start->getTimestamp()) / 3600;
    if ($hours < 3.0 - 0.01 || $hours > 5.0 + 0.01) {
        return $none;
    }

    $shiftDate = $shift->start->format('Y-m-d');
    $days = [
        'fri' => (string) config('pretix_event_day_fri'),
        'sat' => (string) config('pretix_event_day_sat'),
        'sun' => (string) config('pretix_event_day_sun'),
    ];
    foreach ($days as $key => $date) {
        if ($date !== '' && $date === $shiftDate) {
            return ['eligible' => true, 'freeChoice' => false, 'fixedDay' => $key, 'shift' => $shift];
        }
    }

    return ['eligible' => true, 'freeChoice' => true, 'fixedDay' => null, 'shift' => $shift];
}

/**
 * Vergibt einen Voucher aus dem angegebenen Pool und markiert den Deal als bestaetigt.
 * Gibt den Voucher-Code zurueck, oder null wenn der Pool leer ist oder der Tag ungueltig ist.
 */
function DayTicketDeal_confirm(User $user, string $day): ?string
{
    $pool = match ($day) {
        'fri' => PretixVoucher::POOL_DAY_FRI,
        'sat' => PretixVoucher::POOL_DAY_SAT,
        'sun' => PretixVoucher::POOL_DAY_SUN,
        default => null,
    };

    if ($pool === null) {
        return null;
    }

    $code = null;
    (new PretixVoucher())->getConnection()->transaction(function () use ($user, $day, $pool, &$code): void {
        /** @var PretixVoucher|null $voucher */
        $voucher = PretixVoucher::query()
            ->where('pool', $pool)
            ->whereNull('used_by_user_id')
            ->orderBy('id')
            ->lockForUpdate()
            ->first();

        if (!$voucher) {
            return;
        }

        $voucher->used_by_user_id = $user->id;
        $voucher->used_at = new \Carbon\Carbon();
        $voucher->save();

        $user->personalData->voucher_code = $voucher->code;
        $user->personalData->day_ticket_deal_confirmed = true;
        $user->personalData->day_ticket_deal_day = $day;
        $user->personalData->save();

        $code = $voucher->code;

        engelsystem_log(
            'Confirmed 5h day-ticket deal for ' . User_Nick_render($user, true)
            . ', day ' . $day . ', voucher ' . $voucher->code
        );

        $redeemLinkTemplate = (string) config('pretix_redeem_link', '');
        $redeemLink = ($redeemLinkTemplate && str_contains($redeemLinkTemplate, '{code}'))
            ? str_replace('{code}', $voucher->code, $redeemLinkTemplate)
            : $redeemLinkTemplate;

        /** @var EngelsystemMailer $mailer */
        $mailer = app(EngelsystemMailer::class);
        $mailer->sendViewTranslated(
            $user,
            'You have earned a Pretix voucher!',
            'emails/pretix-voucher',
            [
                'code' => $voucher->code,
                'link' => $redeemLink,
                'username' => $user->displayName,
            ]
        );
    });

    return $code;
}

/**
 * helfisystem: Admin-Ausnahme - manuelle Voucher-Zuweisung fuer Sonderfaelle, die nicht ins normale
 * Schema passen (z.B. mehrere kurze Schichten statt einer). Unabhaengig vom Tagesticket-Deal-Workflow:
 * setzt KEINE Tagesticket-Deal-Flags und sperrt daher auch keine weiteren Schichtanmeldungen.
 *
 * @return string|null Voucher-Code, oder null wenn der Pool ungueltig/leer ist
 */
function PretixVoucherException_assign(User $admin, User $target, string $pool, string $reason): ?string
{
    $validPools = [
        PretixVoucher::POOL_FULL,
        PretixVoucher::POOL_DAY_FRI,
        PretixVoucher::POOL_DAY_SAT,
        PretixVoucher::POOL_DAY_SUN,
    ];
    if (!in_array($pool, $validPools, true)) {
        return null;
    }

    $code = null;
    (new PretixVoucher())->getConnection()->transaction(function () use ($admin, $target, $pool, $reason, &$code): void {
        /** @var PretixVoucher|null $voucher */
        $voucher = PretixVoucher::query()
            ->where('pool', $pool)
            ->whereNull('used_by_user_id')
            ->orderBy('id')
            ->lockForUpdate()
            ->first();

        if (!$voucher) {
            return;
        }

        $voucher->used_by_user_id = $target->id;
        $voucher->used_at = new \Carbon\Carbon();
        $voucher->save();

        $target->personalData->voucher_code = $voucher->code;
        $target->personalData->save();

        $code = $voucher->code;

        engelsystem_log(
            'Admin voucher exception: ' . User_Nick_render($admin, true)
            . ' assigned ' . PretixVoucher::poolLabel($pool) . ' (' . $voucher->code . ') to '
            . User_Nick_render($target, true) . '. Reason: ' . $reason
        );

        $redeemLinkTemplate = (string) config('pretix_redeem_link', '');
        $redeemLink = ($redeemLinkTemplate && str_contains($redeemLinkTemplate, '{code}'))
            ? str_replace('{code}', $voucher->code, $redeemLinkTemplate)
            : $redeemLinkTemplate;

        /** @var EngelsystemMailer $mailer */
        $mailer = app(EngelsystemMailer::class);
        $mailer->sendViewTranslated(
            $target,
            'You have earned a Pretix voucher!',
            'emails/pretix-voucher',
            [
                'code' => $voucher->code,
                'link' => $redeemLink,
                'username' => $target->displayName,
            ]
        );
    });

    return $code;
}
