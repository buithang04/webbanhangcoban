<?php

namespace App\Services;

use PayOS\PayOS;

class PayOSService
{
    protected $payOS;

    public function __construct()
    {
        $clientId = config('payos.client_id');
        $apiKey = config('payos.api_key');
        $checksumKey = config('payos.checksum_key');

        $this->payOS = ($clientId && $apiKey && $checksumKey)
            ? new PayOS($clientId, $apiKey, $checksumKey, config('payos.partner_code'))
            : null;
    }

    protected function ensureConfigured(): void
    {
        if (!$this->payOS) {
            throw new \RuntimeException('PayOS chưa được cấu hình. Vui lòng thêm PAYOS_CLIENT_ID, PAYOS_API_KEY và PAYOS_CHECKSUM_KEY vào file .env.');
        }
    }

    public function createPaymentLink(array $data)
    {
        $this->ensureConfigured();
        return $this->payOS->createPaymentLink($data);
    }

    public function verifyWebhook(array $data)
    {
        $this->ensureConfigured();
        return $this->payOS->verifyWebhookData($data);
    }
}