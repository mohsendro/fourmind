<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Page: page-workshop - صفحه داخلی کارگاه

$WorkshopController = new \App\Controllers\ReservationController;
$WorkshopController = $WorkshopController::single();

if( $WorkshopController ) {

    echo "<ul>";
    foreach ($WorkshopController[0] as $key => $value) {
        switch ($key) {
            case 'ID':
                $title = 'شناسه';
                break;
            case 'course_id':
                $title = 'شناسه کارگاه';
                break;
            case 'full_name':
                $title = 'نام و نام خانوادگی';
                break;
            case 'job':
                $title = 'شغل';
                break;
            case 'field':
                $title = 'رشته مورد علاقه';
                break;
            case 'tel':
                $title = 'تلفن تماس';
                break;
            case 'email':
                $title = 'ایمیل';
                break;
            case 'date':
                $title = 'تاریخ جلسه';
                break;
            case 'textarea1':
                $title = 'در مورد چه چیزهایی سال‌ها خیلی اشتباه فکر می‌کردی؟';
                break; 
            case 'textarea2':
                $title = 'چطور میتونی متوجه بشی که افکارت کارآمد یا ناکارآمد هستند؟';
                break;
            case 'textarea3':
                $title = 'چه زمان‌ها و در جه موقعیت‌هایی تونستی به اشتباهاتت پی ببری؟';
                break;
            case 'textarea4':
                $title = 'چه خاطره‌ای یادت میاد که روی تیم‌ورک بودنت تاثیر منفی گذاشته؟';
                break;
            case 'textarea5':
                $title = 'یک تجربه شخصی از تیم‌ورک رو برامون بنویس';
                break;
            case 'textarea6':
                $title = 'به نظرت چرا در ایران در کار تیمی ضعیف هستیم؟';
                break;
            case 'textarea7':
                $title = 'یک رابطه پایدار از دید تو چگونه است؟';
                break;
            case 'textarea8':
                $title = 'چرا به مدیریت پروژه‌های برگزاری رویداد علاقه داری؟‌';
                break;
            case 'textarea9':
                $title = 'مواجهه با استرس و اضطراب را در خود چگونه ارزیابی می‌کنی؟';
                break;   
            case 'textarea10':
                $title = 'اثر دومینو یا ویژگی دومینو از دید تو چیست؟';
                break;
            case 'checkList':
                $title = 'ارزش‌ها';
                break;
            case 'price':
                $title = 'هزینه کارگاه';
                break;                
            default:
                $title = '';
                break;
        }
        echo "<li style='padding: 10px 5px; border-bottom: 1px solid #00000030;'>";
        echo "<strong>" . $title . "</strong> : " .  $value;
        echo "</li>";
    }
    echo "</ul>";


} else {

    echo "<h4>کارگاهی یافت نشد</h4>";

}