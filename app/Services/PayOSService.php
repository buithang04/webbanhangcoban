<?php

namespace App\Services;

use PayOS\PayOS;

class PayOSService
{
    protected $payOS;

    public function __construct()
    {
        $this->payOS = new PayOS(
            config('payos.client_id'),
            config('payos.api_key'),
            config('payos.checksum_key'),
            config('payos.partner_code')
        );
    }

    public function createPaymentLink(array $data)
    {
        return $this->payOS->createPaymentLink($data);
    }

    public function verifyWebhook(array $data)
    {
        return $this->payOS->verifyWebhookData($data);
    }
}
