<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Page: page-workshop - صفحه داخلی کارگاه

$WorkshopController = new \App\Controllers\ReservationController;
$WorkshopController = $WorkshopController::single();

if( $WorkshopController ) {

    echo "<ul>";
    foreach ($WorkshopController[0] as $key => $value) {
        echo "<li>";
        echo $value;
        echo "</li>";
    }
    echo "</ul>";

} else {

    echo "<h4>کارگاهی یافت نشد</h4>";

}
