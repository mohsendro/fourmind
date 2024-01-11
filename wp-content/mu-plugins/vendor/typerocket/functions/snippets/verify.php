<?php
    
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

function zarin_verify($price) {

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    // CURLOPT_URL => 'https://api.zarinpal.com/pg/v4/payment/verify.json',
    // CURLOPT_RETURNTRANSFER => true,
    // CURLOPT_ENCODING => '',
    // CURLOPT_MAXREDIRS => 10,
    // CURLOPT_TIMEOUT => 0,
    // CURLOPT_FOLLOWLOCATION => true,
    // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    // CURLOPT_CUSTOMREQUEST => 'POST',
    // CURLOPT_POSTFIELDS =>'{
    // "merchant_id": "2248c598-6619-42bd-8ace-24c46bf080b1",
    // "amount": "1000",
    // "authority": "A00000000000000000000000000217885159"
    // }',
    // CURLOPT_HTTPHEADER => array(
    //     'Content-Type: application/json',
    //     'Accept: application/json'
    // ),
    // ));

    // $response = curl_exec($curl);

    // curl_close($curl);
    // echo $response;

    //////////////////////////////////////////////////////////////////////

    $Authority = $_GET['Authority'];
    $data = array("merchant_id" => "2248c598-6619-42bd-8ace-24c46bf080b1", "authority" => $Authority, "amount" => $price * 10);
    $jsonData = json_encode($data);
    $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
    curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result, true);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        if ($result['data']['code'] == 100) {
            // echo 'Transation success. RefID:' . $result['data']['ref_id'];
            return $result['data']['code'];
        } else {
            // echo'code: ' . $result['errors']['code'];
            // echo'message: ' .  $result['errors']['message'];
            return $result['errors']['code'];
        }
    }

}