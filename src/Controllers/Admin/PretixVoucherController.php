<?php

declare(strict_types=1);

namespace Engelsystem\Controllers\Admin;

use Engelsystem\Config\Config;
use Engelsystem\Controllers\BaseController;
use Engelsystem\Controllers\HasUserNotifications;
use Engelsystem\Controllers\NotificationType;
use Engelsystem\Helpers\Authenticator;
use Engelsystem\Http\Redirector;
use Engelsystem\Http\Request;
use Engelsystem\Http\Response;
use Engelsystem\Models\EventConfig;
use Engelsystem\Models\PretixRefund;
use Engelsystem\Models\PretixVoucher;
use Psr\Log\LoggerInterface;

class PretixVoucherController extends BaseController
{
    use HasUserNotifications;

    protected string $passwordPlaceholder = '**********';

    /** @var array<string> */
    protected array $permissions = [
        'pretix.edit',
    ];

    public function __construct(
        protected Authenticator $auth,
        protected Config $config,
        protected LoggerInterface $log,
        protected Redirector $redirect,
        protected Response $response,
        protected PretixVoucher $pretixVoucher,
        protected PretixRefund $pretixRefund
    ) {
    }

    public function index(): Response
    {
        $exampleCode = 'BEISPIEL-CODE';
        $redeemLink = (string) $this->config->get('pretix_redeem_link', '');
        $apiToken = (string) $this->config->get('pretix_api_token', '');

        return $this->response->withView(
            'admin/pretix/index',
            [
                'enablePretixVoucher' => (bool) $this->config->get('enable_pretix_voucher', false),
                'pretixRedeemLink' => $redeemLink,
                'pretixMinHours' => (float) $this->config->get('pretix_min_hours', 0),
                'examplePreview' => $this->buildRedeemLink($redeemLink, $exampleCode),
                'unusedCount' => $this->pretixVoucher->newQuery()->whereNull('used_by_user_id')->count(),
                'usedCount' => $this->pretixVoucher->newQuery()->whereNotNull('used_by_user_id')->count(),
                'pretixVoucherLowStockThreshold' => (int) $this->config->get('pretix_voucher_low_stock_threshold', 10),
                'pretixAdminNotifyEmail' => (string) $this->config->get('pretix_admin_notify_email', ''),
                'recentlyUsed' => $this->pretixVoucher->newQuery()
                    ->whereNotNull('used_by_user_id')
                    ->with('usedBy')
                    ->orderByDesc('used_at')
                    ->limit(20)
                    ->get(),

                'enablePretixRefund' => (bool) $this->config->get('enable_pretix_refund', false),
                'pretixTestMode' => (bool) $this->config->get('pretix_test_mode', true),
                'pretixRefundMinHours' => (float) $this->config->get('pretix_refund_min_hours', 0),
                'pretixBaseUrl' => (string) $this->config->get('pretix_base_url', ''),
                'pretixOrganizerSlug' => (string) $this->config->get('pretix_organizer_slug', ''),
                'pretixEventSlug' => (string) $this->config->get('pretix_event_slug', ''),
                'pretixApiTokenSet' => $apiToken !== '',
                'passwordPlaceholder' => $this->passwordPlaceholder,
                'pretixAccountHolderQuestionId' => (string) $this->config->get('pretix_account_holder_question_id', ''),
                'pretixIbanQuestionId' => (string) $this->config->get('pretix_iban_question_id', ''),
                'pretixBicQuestionId' => (string) $this->config->get('pretix_bic_question_id', ''),
                'refunds' => $this->pretixRefund->newQuery()
                    ->with('user')
                    ->orderByDesc('created_at')
                    ->limit(50)
                    ->get(),
            ]
        );
    }

    public function refundsCsv(): Response
    {
        $refunds = $this->pretixRefund->newQuery()
            ->where('state', 'created')
            ->with('user')
            ->orderBy('created_at')
            ->get();

        $lines = ['Name;IBAN;BIC;Betrag;Verwendungszweck'];
        foreach ($refunds as $refund) {
            $reference = sprintf('Helfisystem Erstattung %s', $refund->order_code);
            $lines[] = implode(';', [
                $this->csvField($refund->account_holder ?: ($refund->user->name ?? '')),
                $this->csvField($refund->iban ?: ''),
                $this->csvField($refund->bic ?: ''),
                number_format($refund->amount, 2, ',', ''),
                $this->csvField($reference),
            ]);
        }

        return $this->response
            ->withHeader('Content-Type', 'text/csv; charset=utf-8')
            ->withHeader('Content-Disposition', 'attachment; filename="pretix-erstattungen.csv"')
            ->withContent("\xEF\xBB\xBF" . implode("\r\n", $lines) . "\r\n");
    }

    private function csvField(string $value): string
    {
        return '"' . str_replace('"', '""', $value) . '"';
    }

    public function saveSettings(Request $request): Response
    {
        $data = $this->validate($request, [
            'enable_pretix_voucher' => 'optional|checked',
            'pretix_redeem_link' => 'optional',
            'pretix_min_hours' => 'optional|number|min:0',
            'enable_pretix_refund' => 'optional|checked',
            'pretix_test_mode' => 'optional|checked',
            'pretix_refund_min_hours' => 'optional|number|min:0',
            'pretix_base_url' => 'optional',
            'pretix_organizer_slug' => 'optional',
            'pretix_event_slug' => 'optional',
            'pretix_api_token' => 'optional',
            'pretix_account_holder_question_id' => 'optional',
            'pretix_iban_question_id' => 'optional',
            'pretix_bic_question_id' => 'optional',
            'pretix_admin_notify_email' => 'optional|email',
            'pretix_voucher_low_stock_threshold' => 'optional|number|min:0',
        ]);

        $this->setConfig('enable_pretix_voucher', !empty($data['enable_pretix_voucher']));
        $this->setConfig('pretix_redeem_link', trim((string) ($data['pretix_redeem_link'] ?? '')));
        $this->setConfig('pretix_min_hours', (float) ($data['pretix_min_hours'] ?? 0));

        $this->setConfig('enable_pretix_refund', !empty($data['enable_pretix_refund']));
        $this->setConfig('pretix_test_mode', !empty($data['pretix_test_mode']));
        $this->setConfig('pretix_refund_min_hours', (float) ($data['pretix_refund_min_hours'] ?? 0));
        $this->setConfig('pretix_base_url', rtrim(trim((string) ($data['pretix_base_url'] ?? '')), '/'));
        $this->setConfig('pretix_organizer_slug', trim((string) ($data['pretix_organizer_slug'] ?? '')));
        $this->setConfig('pretix_event_slug', trim((string) ($data['pretix_event_slug'] ?? '')));
        $this->setConfig(
            'pretix_account_holder_question_id',
            trim((string) ($data['pretix_account_holder_question_id'] ?? ''))
        );
        $this->setConfig('pretix_iban_question_id', trim((string) ($data['pretix_iban_question_id'] ?? '')));
        $this->setConfig('pretix_bic_question_id', trim((string) ($data['pretix_bic_question_id'] ?? '')));
        $this->setConfig('pretix_admin_notify_email', trim((string) ($data['pretix_admin_notify_email'] ?? '')));
        $this->setConfig(
            'pretix_voucher_low_stock_threshold',
            (int) ($data['pretix_voucher_low_stock_threshold'] ?? 10)
        );

        $submittedToken = (string) ($data['pretix_api_token'] ?? '');
        if ($submittedToken !== '' && $submittedToken !== $this->passwordPlaceholder) {
            $this->setConfig('pretix_api_token', $submittedToken);
        }

        $this->log->info('Updated Pretix voucher/refund settings');
        $this->addNotification('Pretix voucher settings saved.');

        return $this->redirect->to('/admin/pretix');
    }

    public function addCodes(Request $request): Response
    {
        $data = $this->validate($request, [
            'codes' => 'optional',
        ]);

        $codes = array_values(array_unique(array_filter(array_map(
            'trim',
            preg_split('/\r\n|\r|\n/', (string) ($data['codes'] ?? ''))
        ))));

        if (!$codes) {
            $this->addNotification('No voucher codes entered.', NotificationType::WARNING);

            return $this->redirect->to('/admin/pretix');
        }

        $existing = $this->pretixVoucher->newQuery()->whereIn('code', $codes)->pluck('code')->all();
        $newCodes = array_diff($codes, $existing);

        foreach ($newCodes as $code) {
            $this->pretixVoucher->newQuery()->create(['code' => $code]);
        }

        $this->log->info(
            'Added {added} Pretix voucher codes ({skipped} duplicates skipped)',
            ['added' => count($newCodes), 'skipped' => count($existing)]
        );
        $this->addNotification(sprintf(
            __('%d new voucher codes added, %d duplicates skipped.'),
            count($newCodes),
            count($existing)
        ));

        // helfisystem: neue Codes da -> naechstes Leerlaufen soll wieder eine Mail ausloesen
        if ($newCodes) {
            $this->setConfig('pretix_voucher_pool_empty_notified', false);
        }

        return $this->redirect->to('/admin/pretix');
    }

    private function setConfig(string $key, mixed $value): void
    {
        (new EventConfig())
            ->findOrNew($key)
            ->setAttribute('name', $key)
            ->setAttribute('value', $value)
            ->save();

        $this->config->set($key, $value);
    }

    private function buildRedeemLink(string $link, string $code): string
    {
        if ($link === '') {
            return '';
        }

        return str_contains($link, '{code}') ? str_replace('{code}', $code, $link) : $link;
    }
}
