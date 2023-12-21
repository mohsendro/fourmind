<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

function send_mail($mail, $full_name) {
    
    global $phpmailer;

    // (Re)create it, if it's gone missing
    if ( ! ( $phpmailer instanceof PHPMailer ) ) {
        require_once ABSPATH . WPINC . '/class-phpmailer.php';
        require_once ABSPATH . WPINC . '/class-smtp.php';
    }
    $phpmailer = new PHPMailer;

    // Custom WP Mail Function
    $to = array($mail);
    $subject   = 'ایمیل خوش آمد گویی fourmind';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: فورمایند';
    $message   = $full_name . ' عزیز، کارگاه شما با موفقیت رزرو شد';

    wp_mail( $to, $subject, $message, $headers );

}