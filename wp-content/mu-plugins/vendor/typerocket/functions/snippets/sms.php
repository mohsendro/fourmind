<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

function send_sms($tel, $full_name) {

    try{
        $api = new \Kavenegar\KavenegarApi("624D7731383332522B43433068434B49352B4678522B364B4D77496263394577776962714E5A45425674343D");
        $sender = "2000500666";
        $message = $full_name . ' عزیز، کارگاه شما با موفقیت رزرو شد';
        $receptor = array($tel);
        $result = $api->Send($sender,$receptor,$message);
        if($result){
            foreach($result as $r){
                echo "messageid = $r->messageid";
                echo "message = $r->message";
                echo "status = $r->status";
                echo "statustext = $r->statustext";
                echo "sender = $r->sender";
                echo "receptor = $r->receptor";
                echo "date = $r->date";
                echo "cost = $r->cost";
            }		
        }
    }
    catch(\Kavenegar\Exceptions\ApiException $e){
        // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
        echo $e->errorMessage();
    }
    catch(\Kavenegar\Exceptions\HttpException $e){
        // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
        echo $e->errorMessage();
    }

    /*
    sample output
    {
        "return":
        {
            "status":200,
            "message":"تایید شد"
        },
        "entries": 
        [
            {
                "messageid":8792343,
                "message":"خدمات پیام کوتاه کاوه نگار",
                "status":1,
                "statustext":"در صف ارسال",
                "sender":"10004346",
                "receptor":"09123456789",
                "date":1356619709,
                "cost":120
            },
            {
                "messageid":8792344,
                "message":"خدمات پیام کوتاه کاوه نگار",
                "status":1,
                "statustext":"در صف ارسال",
                "sender":"10004346",
                "receptor":"09367891011",
                "date":1356619709,
                "cost":120
            }
        ]
    }
    */

    //////////////////////////////////////////////////////////////////////

    // $username = '';
    // $password = '';
    // $from = '+98100009';
    // $pattern_code = '139';
    // $to = array($tel);
    // // $input_data = array('tracking-code' => '1054 4-41', 'name' => 'پنل');
    // $input_data = array('name' => $full_name);
    // $url = 'https://ippanel.com/patterns/pattern?username=' . $username . '&password=' . urlencode($password) . '&from=' . $from . '&to=' . json_encode($to) . '&input_data=' . urlencode(json_encode($input_data)) . '&pattern_code=' . $pattern_code;
    // $handler = curl_init($url);
    // curl_setopt($handler, CURLOPT_CUSTOMREQUEST, 'POST');
    // curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
    // curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    // $response = curl_exec($handler);
    // echo $response;

}