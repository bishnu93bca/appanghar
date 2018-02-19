<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:dbd5193a04269afd6332df6cefd477e3",
                  "X-Auth-Token:f3a154dc00fb3a728a501772568c8f74"));
$payload = Array(
    'purpose' => 'FIFA',
    'amount' => '5000',
    'phone' => '9999999999',
    'buyer_name' => 'John Doe',
    'redirect_url' => 'http:appanghar.com/homes/success',
    'send_email' => true,
    'webhook' => '',
    'send_sms' => true,
    'email' => 'foo@example.com',
    'allow_repeated_payments' => false 
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 


$json_decode=json_decode($response,true);
$long_url=$json_decode['payment_request']['longurl'];
echo $long_url;
//header("http://localhost/appanghar.com/homes/");
header('Location: ' . $long_url);
//echo "<script>window.open('".$long_url."','_self')</script>";

//echo $response;

?>