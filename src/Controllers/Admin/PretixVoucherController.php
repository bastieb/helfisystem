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
use Engelsystem\Models\PretixVoucher;
use Psr\Log\LoggerInterface;

class PretixVoucherController extends BaseController
{
    use HasUserNotifications;

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
        protected PretixVoucher $pretixVoucher
    ) {
    }

    public function index(): Response
    {
        $exampleCode = 'BEISPIEL-CODE';
        $redeemLink = (string) $this->config->get('pretix_redeem_link', '');

        return $this->response->withView(
            'admin/pretix/index',
            [
                'enablePretixVoucher' => (bool) $this->config->get('enable_pretix_voucher', false),
                'pretixRedeemLink' => $redeemLink,
                'pretixMinHours' => (float) $this->config->get('pretix_min_hours', 0),
                'examplePreview' => $this->buildRedeemLink($redeemLink, $exampleCode),
                'unusedCount' => $this->pretixVoucher->newQuery()->whereNull('used_by_user_id')->count(),
                'usedCount' => $this->pretixVoucher->newQuery()->whereNotNull('used_by_user_id')->count(),
                'recentlyUsed' => $this->pretixVoucher->newQuery()
                    ->whereNotNull('used_by_user_id')
                    ->with('usedBy')
                    ->orderByDesc('used_at')
                    ->limit(20)
                    ->get(),
            ]
        );
    }

    public function saveSettings(Request $request): Response
    {
        $data = $this->validate($request, [
            'enable_pretix_voucher' => 'optional|checked',
            'pretix_redeem_link' => 'optional',
            'pretix_min_hours' => 'optional|number|min:0',
        ]);

        $this->setConfig('enable_pretix_voucher', !empty($data['enable_pretix_voucher']));
        $this->setConfig('pretix_redeem_link', trim((string) ($data['pretix_redeem_link'] ?? '')));
        $this->setConfig('pretix_min_hours', (float) ($data['pretix_min_hours'] ?? 0));

        $this->log->info('Updated Pretix voucher settings');
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
