<?php

declare(strict_types=1);

namespace Engelsystem\Helpers;

use Engelsystem\Config\Config;
use GuzzleHttp\Client as GuzzleClient;
use RuntimeException;

/**
 * helfisystem: Minimaler Client für die Teile der Pretix-REST-API, die für die
 * Voucher- und Rückerstattungs-Automatik gebraucht werden.
 */
class PretixClient
{
    public function __construct(protected GuzzleClient $guzzle, protected Config $config)
    {
    }

    public function isConfigured(): bool
    {
        return (bool) ($this->config->get('pretix_base_url')
            && $this->config->get('pretix_organizer_slug')
            && $this->config->get('pretix_event_slug')
            && $this->config->get('pretix_api_token'));
    }

    /**
     * Sucht die Order, die den angegebenen Voucher-Code eingelöst hat.
     *
     * @return string|null Order-Code oder null, wenn kein Match gefunden wurde
     */
    public function findOrderCodeByVoucher(string $voucherCode): ?string
    {
        $response = $this->request('GET', 'orderpositions/', [
            'voucher__code' => $voucherCode,
        ]);

        $results = $response['results'] ?? [];
        if (empty($results)) {
            return null;
        }

        return $results[0]['order'] ?? null;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getOrder(string $orderCode): ?array
    {
        return $this->request('GET', 'orders/' . rawurlencode($orderCode) . '/');
    }

    /**
     * Bereits erstattete/in Erstattung befindliche Summe einer Order (alles außer canceled).
     */
    public function refundedAmount(array $order): float
    {
        $sum = 0.0;
        foreach ($order['refunds'] ?? [] as $refund) {
            if (($refund['state'] ?? null) !== 'canceled') {
                $sum += (float) $refund['amount'];
            }
        }

        return $sum;
    }

    /**
     * Legt eine Rückerstattung an (provider=manual, wird NICHT automatisch ausgeführt/ausgezahlt).
     *
     * @return array<string, mixed> Der angelegte Refund-Datensatz (inkl. local_id)
     */
    public function createManualRefund(string $orderCode, float $amount, string $comment): array
    {
        $response = $this->request('POST', 'orders/' . rawurlencode($orderCode) . '/refunds/', null, [
            'state' => 'created',
            'source' => 'admin',
            'amount' => number_format($amount, 2, '.', ''),
            'provider' => 'manual',
            'comment' => $comment,
            'mark_canceled' => false,
            'mark_pending' => false,
        ]);

        if (!isset($response['local_id'])) {
            throw new RuntimeException('Pretix refund creation failed: ' . json_encode($response));
        }

        return $response;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getRefund(string $orderCode, int $localId): ?array
    {
        return $this->request('GET', 'orders/' . rawurlencode($orderCode) . '/refunds/' . $localId . '/');
    }

    /**
     * @param array<string, string>|null $query
     * @param array<string, mixed>|null  $json
     * @return array<string, mixed>
     */
    private function request(string $method, string $path, ?array $query = null, ?array $json = null): array
    {
        if (!$this->isConfigured()) {
            throw new RuntimeException('Pretix API is not configured (base URL/organizer/event/token missing).');
        }

        $url = rtrim((string) $this->config->get('pretix_base_url'), '/')
            . '/api/v1/organizers/' . rawurlencode((string) $this->config->get('pretix_organizer_slug'))
            . '/events/' . rawurlencode((string) $this->config->get('pretix_event_slug'))
            . '/' . ltrim($path, '/');

        $options = [
            'headers' => [
                'Authorization' => 'Token ' . $this->config->get('pretix_api_token'),
                'Accept' => 'application/json',
            ],
        ];
        if ($query) {
            $options['query'] = $query;
        }
        if ($json !== null) {
            $options['json'] = $json;
        }

        $response = $this->guzzle->request($method, $url, $options);
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        $data = $body !== '' ? json_decode($body, true) : [];

        if ($status >= 400) {
            throw new RuntimeException(
                sprintf('Pretix API error %d on %s %s: %s', $status, $method, $url, $body)
            );
        }

        return $data ?? [];
    }
}
