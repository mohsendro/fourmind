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

                $value = $value;

                break;

            case 'course_id':

                $title = 'شناسه کارگاه';

                $value = $value;

                break;

            case 'full_name':

                $title = 'نام و نام خانوادگی';

                $value = $value;

                break;

            case 'job':

                $title = 'شغل';

                $value = $value;

                break;

            case 'field':

                $title = 'رشته مورد علاقه';

                $value = $value;

                break;

            case 'tel':

                $title = 'تلفن تماس';

                $value = $value;

                break;

            case 'email':

                $title = 'ایمیل';

                $value = $value;

                break;

            case 'questions':

                $title = 'سوالات';

                $values = unserialize($value);

                if( is_array($values) ) {

                    $value = '';

                    foreach ($values as $item) {

                        foreach ($item as $key => $val) {

                            $value .= "<br>";

                            $value .= $key . " : " . $val;

                        }

                    }

                } else {

                    $value = '';

                }

                break; 

            case 'price':

                $title = 'هزینه کارگاه';

                $value = $value . ' تومان';

                break;        

            case 'authority':

                $title = 'شناسه پرداخت';

                $value = $value;

                break;  

            case 'status':

                $title = 'وضعیت';

                if( $value ) {

                    $value = "<span style='color:green;'>پرداخت شده</span>";

                } else {

                    $value = "<span style='color:red;'>پرداخت نشده</span>";

                }

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