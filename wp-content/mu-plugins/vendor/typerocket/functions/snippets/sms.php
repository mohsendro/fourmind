<?php
    
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// use Kavenegar\KavenegarApi;
// use Kavenegar\Exceptions\ApiException;
// use Kavenegar\Exceptions\HttpException;

function send_sms($tel, $full_name) {

    // create a new cURL resource
    $api = "624D7731383332522B43433068434B49352B4678522B364B4D77496263394577776962714E5A45425674343D";
    $receptor = $tel;
    $token = $full_name;
    $template = "Welcome";
    // $input_data = array('tracking-code' => '1054 4-41', 'name' => 'پنل');
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, "https://api.kavenegar.com/v1/".$api."/verify/lookup.json?receptor=".$receptor."&token=".$token."&template=".$template);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($handler, CURLOPT_CUSTOMREQUEST, 'POST');
    // curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);

    // grab URL and pass it to the browser
    curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);

    //////////////////////////////////////////////////////////////////////
    
    // try{
    //     $api = new \Kavenegar\KavenegarApi("624D7731383332522B43433068434B49352B4678522B364B4D77496263394577776962714E5A45425674343D");
    //     $sender = "10008663";
    //     $message = $full_name . ' عزیز، کارگاه شما با موفقیت رزرو شد';
    //     $receptor = array($tel);
    //     $result = $api->Send($sender,$receptor,$message);
    //     if($result){
    //         foreach($result as $r){
    //             echo "messageid = $r->messageid";
    //             echo "message = $r->message";
    //             echo "status = $r->status";
    //             echo "statustext = $r->statustext";
    //             echo "sender = $r->sender";
    //             echo "receptor = $r->receptor";
    //             echo "date = $r->date";
    //             echo "cost = $r->cost";
    //         }		
    //     }
    // }
    // catch(\Kavenegar\Exceptions\ApiException $e){
    //     // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
    //     echo $e->errorMessage();
    // }
    // catch(\Kavenegar\Exceptions\HttpException $e){
    //     // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
    //     echo $e->errorMessage();
    // }

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

    // try{
    //     $api = new KavenegarApi("624D7731383332522B43433068434B49352B4678522B364B4D77496263394577776962714E5A45425674343D");
    //     $receptor = $tel;
    //     $token = $full_name;
    //     $template = "Welcome";
    //     $type = "sms";//sms | call
    //     $result = $api->VerifyLookup($receptor,$token,$template,$type);
    //     if($result){
    //         var_dump($result);
    //     }
    // }
    // catch(ApiException $e){
    //     echo $e->errorMessage();
    // }
    // catch(HttpException $e){
    //     echo $e->errorMessage();
    // }

}