<?php
    
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

function zarin_gate($email, $tel, $price) {

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    // CURLOPT_URL => 'https://api.zarinpal.com/pg/v4/payment/request.json',
    // CURLOPT_RETURNTRANSFER => true,
    // CURLOPT_ENCODING => '',
    // CURLOPT_MAXREDIRS => 10,
    // CURLOPT_TIMEOUT => 0,
    // CURLOPT_FOLLOWLOCATION => true,
    // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    // CURLOPT_CUSTOMREQUEST => 'POST',
    // CURLOPT_POSTFIELDS =>'{
    // "merchant_id": "2248c598-6619-42bd-8ace-24c46bf080b1",
    // "amount": '.$price.',
    // "callback_url": "https://academy.fourmind.co/#message",
    // "description": "Transaction description.",
    // "metadata": {
    //     "mobile": "09214500936",
    //     "email": "mohssendro@gmail.com"
    // }
    // }',
    // CURLOPT_HTTPHEADER => array(
    //     'Content-Type: application/json',
    //     'Accept: application/json'
    // ),
    // ));

    // $response = curl_exec($curl);

    // curl_close($curl);

    // Redirect
    // $result = json_decode($response);
    // header('Location: https://www.zarinpal.com/pg/StartPay/' . $result->data->authority);
    // die();

    // return $response;

    //////////////////////////////////////////////////////////////////////

    $data = array("merchant_id" => "2248c598-6619-42bd-8ace-24c46bf080b1",
    "amount" => $price * 10,
    "callback_url" => "https://academy.fourmind.co/message",
    "description" => "رزرو کارگاه",
    "metadata" => [
            "email" => $email,
            "mobile"=> $tel
        ],
    );
    $jsonData = json_encode($data);
    $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
    curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ));

    $result = curl_exec($ch);
    $err = curl_error($ch);
    $result = json_decode($result, true, JSON_PRETTY_PRINT);
    curl_close($ch);


    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        if (empty($result['errors'])) {
            if ($result['data']['code'] == 100) {
                // header('Location: https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
                return $result['data']["authority"];
            }
        } else {
            echo'Error Code: ' . $result['errors']['code'];
            echo'message: ' .  $result['errors']['message'];

        }
    }

}