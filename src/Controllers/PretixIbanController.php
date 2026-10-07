<?php

declare(strict_types=1);

namespace Engelsystem\Controllers;

use Engelsystem\Helpers\IbanValidator;
use Engelsystem\Http\Exceptions\HttpNotFound;
use Engelsystem\Http\Request;
use Engelsystem\Http\Response;
use Engelsystem\Models\PretixIbanRequest;
use Psr\Log\LoggerInterface;

/**
 * helfisystem: Oeffentliche, token-geschuetzte Seite, ueber die Helfis eine korrigierte IBAN fuer
 * die Pfand-Erstattung eintragen koennen (kein Login noetig). Der Token steht nur in der Mail
 * (in der DB nur als SHA-256-Hash), ist einmal verwendbar, laeuft ab und ist gegen Raten
 * (64 Hex-Zeichen = 256 Bit) sowie gegen Wiederholungsversuche gesperrt.
 */
class PretixIbanController extends BaseController
{
    use HasUserNotifications;

    /** @var array<string, string> */
    protected array $permissions = [
        'form' => 'login',
        'save' => 'login',
    ];

    public function __construct(
        protected Response $response,
        protected LoggerInterface $log
    ) {
    }

    public function form(Request $request): Response
    {
        $iban = $this->requireRequest($request);

        return $this->render('pages/iban/form', $iban, [
            'account_holder' => $iban->account_holder,
        ]);
    }

    public function save(Request $request): Response
    {
        $ibanRequest = $this->requireRequest($request);

        $holder = trim((string) $request->postData('account_holder'));
        $rawIban = (string) $request->postData('iban');
        $bic = strtoupper(preg_replace('/\s+/', '', (string) $request->postData('bic')));
        $iban = IbanValidator::normalize($rawIban);

        $errors = [];
        if (mb_strlen($holder) < 3 || mb_strlen($holder) > 100) {
            $errors[] = __('iban.form.error.holder');
        }
        if (IbanValidator::error($iban) !== null) {
            $errors[] = __('iban.form.error.iban');
        }
        if (!IbanValidator::isValidBic($bic)) {
            $errors[] = __('iban.form.error.bic');
        }

        if ($errors) {
            $ibanRequest->failed_attempts++;
            $ibanRequest->save();

            foreach ($errors as $error) {
                $this->addNotification($error, NotificationType::ERROR);
            }

            return $this->render('pages/iban/form', $ibanRequest, [
                'account_holder' => $holder,
                'iban' => $rawIban,
                'bic' => $bic,
            ]);
        }

        $ibanRequest->account_holder = $holder;
        $ibanRequest->iban = $iban;
        $ibanRequest->bic = $bic !== '' ? $bic : null;
        $ibanRequest->status = PretixIbanRequest::STATUS_SUBMITTED;
        $ibanRequest->submitted_at = new \Carbon\Carbon();
        $ibanRequest->save();

        $this->log->info(
            'IBAN for refund order {order} submitted via link by user {id} ({masked})',
            ['order' => $ibanRequest->order_code, 'id' => $ibanRequest->user_id, 'masked' => IbanValidator::mask($iban)]
        );

        return $this->response->withView('pages/iban/done', ['masked_iban' => IbanValidator::mask($iban)]);
    }

    protected function render(string $view, PretixIbanRequest $ibanRequest, array $data = []): Response
    {
        return $this->response->withView($view, $data + ['order_code' => $ibanRequest->order_code]);
    }

    protected function requireRequest(Request $request): PretixIbanRequest
    {
        $ibanRequest = PretixIbanRequest::findByToken((string) $request->getAttribute('token'));

        if (!$ibanRequest || !$ibanRequest->isUsable()) {
            throw new HttpNotFound();
        }

        return $ibanRequest;
    }
}
