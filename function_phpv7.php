<?php
//Create sign data(Tripledes(ECB,PKCS7)) in PHP 7+
function encrypt_pkcs7 ($str, $key)
{
    $key = base64_decode($key);
    // Don't pass the output to the base64_encode function as it's already in base64.
    $encryptedData = openssl_encrypt($str, 'des-ede3', $key, 0);
    return $encryptedData;
}

//Send Data to gateway
function CallAPI ($url, $data = false)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data),
    ]);
    $result = curl_exec($curl);
    curl_close($curl);

    return $result;
}