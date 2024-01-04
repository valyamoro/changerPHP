<?php
declare(strict_types=1);
\error_reporting(-1);

$amount = $_POST['amount'];
$firstCurrency = $_POST['first_currency'];
$secondCurrency = $_POST['second_currency'];

$amount = 0.05;
$firstCurrency = 'BTC';
$secondCurrency = 'ZEC';
$key = '';

$url = "https://changee.com/v1/api/exchange-create?key={$key}&from={$firstCurrency}&to={$secondCurrency}&amount={$amount}&fix=0&destinationAddress=t1PS2q82NcaDvjr2ZSAeVfLh79Xmbfutv5j&refundAddress=1BvBMSEYstWetqTFn5Au4m4GFg7xJaNVN2";

$curl = \curl_init();
\curl_setopt($curl, CURLOPT_URL, $url);
\curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = \curl_exec($curl);
\curl_close($curl);

$result = \json_decode($result, true);
$depositAddress = $result['depositAddress'];

echo $depositAddress;
