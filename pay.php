<?php
/*
* banktest.ir
* Melli / Sadad gateway sample code
* For support contact me on Telegram: @a6oozar
*/

require_once __DIR__ . "/config.php";

$Amount        = 1000; // مبلغ به ریال
$OrderId       = time(); // شماره فاکتور یا سفارش در سمت شما که معمولا ID جدول فاکتورهاست
$iranTime      = new DateTime('now', new DateTimeZone('Asia/Tehran'));
$localDateTime = $iranTime->format('m/d/Y g:i:s a'); // این زمان نباید بیشتر از ۲ دقیقه با زمان سرور بانک اختلاف داشته باشد

$ReturnUrl = "http://localhost/verify.php"; // ادرس بازگشتی به سایت شما

$SignData = encrypt_pkcs7("$TerminalId;$OrderId;$Amount", $key);

$data     = [
    'MerchantId'    => $MerchantId,
    'TerminalId'    => $TerminalId,
    'Amount'        => $Amount,
    'OrderId'       => $OrderId,
    'LocalDateTime' => $localDateTime,
    'ReturnUrl'     => $ReturnUrl,
    'SignData'      => $SignData,
];

$str_data = json_encode($data);

$res      = CallAPI($paymentRequestURL, $str_data);
$response = json_decode($res);

if ($response->ResCode == 0) {
    $Token = $response->Token;
    $url   = "{$gatewayURL}?Token=$Token";

    header('Location: ' . $url);
    exit;
} else {
    die($response->Description);
}
