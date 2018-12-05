<?php
//Create sign data(Tripledes(ECB,PKCS7)) in PHP 5
function encrypt_pkcs7 ($str, $key)
{
    $key        = base64_decode($key);
    $block      = mcrypt_get_block_size("tripledes", "ecb");
    $pad        = $block - (strlen($str) % $block);
    $str        .= str_repeat(chr($pad), $pad);
    $ciphertext = mcrypt_encrypt("tripledes", $key, $str, "ecb");

    return base64_encode($ciphertext);
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