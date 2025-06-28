<?php

return [
    'client_id' => env('PAYOS_CLIENT_ID'),
    'api_key' => env('PAYOS_API_KEY'),
    'checksum_key' => env('PAYOS_CHECKSUM_KEY'),
    'partner_code' => env('PAYOS_PARTNER_CODE', null),
    'return_url' => env('PAYOS_RETURN_URL', 'http://localhost/ban_hang/checkout-success'),
    'cancel_url' => env('PAYOS_CANCEL_URL', 'http://localhost/ban_hang/checkout-cancel'),
];