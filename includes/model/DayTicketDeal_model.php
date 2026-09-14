<?php

use Engelsystem\Mail\EngelsystemMailer;
use Engelsystem\Models\PretixVoucher;
use Engelsystem\Models\Shifts\ShiftEntry;
use Engelsystem\Models\User\User;

/**
 * helfisystem: 5h-Tagesticket-Deal (Ausnahme fuer Auf-/Abbau-Schichten bzw. 5h-Schichten
 * direkt an einem Festivaltag - Tagesticket statt Wochenendticket).
 */

/**
 * Prueft, ob ein Helfi fuer den 5h-Tagesticket-Deal qualifiziert.
 *
 * Voraussetzung: die Summe der eingeplanten Stunden ist exakt eine einzelne 5h-Schicht,
 * und diese Schicht ist entweder ein konfigurierter Auf-/Abbau-Schichttyp (-> freie
 * Tageswahl) oder liegt an einem der drei konfigurierten Festivaltage (-> Ticket fuer
 * genau diesen Tag).
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
    if (abs($hours - 5.0) > 0.01) {
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

    $qualifyingTypes = array_filter(array_map(
        'trim',
        explode(',', (string) config('pretix_5h_deal_shift_types', 'Aufbau,Abbau'))
    ));
    $shiftTypeName = $shift->shiftType->name ?? '';
    foreach ($qualifyingTypes as $type) {
        if (strcasecmp($type, $shiftTypeName) === 0) {
            return ['eligible' => true, 'freeChoice' => true, 'fixedDay' => null, 'shift' => $shift];
        }
    }

    return $none;
}

/**
 * Vergibt einen Voucher aus dem angegebenen Pool und markiert den Deal als bestaetigt.
 * Gibt den Voucher-Code zurueck, oder null wenn der Pool leer ist.
 */
function DayTicketDeal_confirm(User $user, string $day): ?string
{
    $pool = match ($day) {
        'fri' => PretixVoucher::POOL_DAY_FRI,
        'sat' => PretixVoucher::POOL_DAY_SAT,
        'sun' => PretixVoucher::POOL_DAY_SUN,
        default => PretixVoucher::POOL_DAY_ANY,
    };

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
