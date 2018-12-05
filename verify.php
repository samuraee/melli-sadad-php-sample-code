<?php
/*
* banktest.ir
* Melli / Sadad gateway sample code
* For support contact me on Telegram: @a6oozar
*/

require_once __DIR__ . "/config.php";

// برای مدیریت کردن حروف بزرگ یا کوچک در پارامترها
$post = array_change_key_case($_POST, CASE_LOWER);

$OrderId = $post["orderid"];
$Token   = $post["token"];
$ResCode = $post["rescode"];

if ($ResCode == 0) {
    $verifyData = ['Token'    => $Token,
                   'SignData' => encrypt_pkcs7($Token, $key),
    ];
    $str_data   = json_encode($verifyData);
    $res        = CallAPI($verifyTransactionURL, $str_data);
    $response     = json_decode($res);
}
if ($ResCode == 0) {
    //Save $response->RetrivalRefNo, $response->SystemTraceNo, $response->OrderId to DataBase
    echo "شماره سفارش:" . $OrderId . "<br>" .
        "شماره پیگیری : " . $response->SystemTraceNo . "<br>" .
        "شماره مرجع:" . $response->RetrivalRefNo .
        "<br> اطلاعات بالا را جهت پیگیری های بعدی یادداشت نمایید." . "<br>";

    // در اینجا باید سفارش کاربر را تایید و در دیتابیس موفقیت آمیز قرار بدید
    // نمایش صفحه تاییدیه پرداخت
} else {
    echo "تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد.";
}