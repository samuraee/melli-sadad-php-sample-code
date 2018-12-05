<?php
/*
* banktest.ir
* Melli / Sadad gateway sample code
* For support contact me on Telegram: @a6oozar
*/


// your merchant settings

$key        = "YOUR_TERMINAL_KEY";  // TerminalKey
$MerchantId = "YOUR_MERCHANT_ID";   // MerchantId
$TerminalId = "YOUR_TERMINAL_ID";   // TerminalKey

$useBankTest = false; // برای تست با درگاه بانک تست این مقدار را true کنید

if ($useBankTest == true) {
    $paymentRequestURL    = 'http://banktest.ir/gateway/melli/payment-request';
    $gatewayURL           = 'http://banktest.ir/gateway/melli/purchase';
    $verifyTransactionURL = 'http://banktest.ir/gateway/melli/verify';
} else {
    $paymentRequestURL    = 'https://sadad.shaparak.ir/vpg/api/v0/Request/PaymentRequest';
    $gatewayURL           = 'https://sadad.shaparak.ir/VPG/Purchase';
    $verifyTransactionURL = 'https://sadad.shaparak.ir/vpg/api/v0/Advice/Verify';
}

$PHPversion = explode('.', PHP_VERSION);

if ($PHPversion[0] >= 7) {
    include_once __DIR__ . "/function_phpv7.php";
} else {
    include_once __DIR__ . "/function_phpv5.php";
}