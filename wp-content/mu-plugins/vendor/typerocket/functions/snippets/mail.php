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

    // SMTP configuration
    $phpmailer->isSMTP();                    
    $phpmailer->Host = 'lh372.irandns.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Username = 'smtp@fourmind.co';
    $phpmailer->Password = 'FvKr37tNkwURTLEBsjkN';
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->Port = 587;

    $phpmailer->setFrom('smtp@fourmind.co', 'Fourmind');

    // Add a recipient
    $phpmailer->addAddress($mail);

    // Add cc or bcc 
    // $phpmailer->addCC('cc@example.com');
    // $phpmailer->addBCC('bcc@example.com');

    // Set email format to HTML
    $phpmailer->isHTML(true);

    // Email subject
    $phpmailer->Subject = 'Welcome To Fourmind';

    // Email body content
    $mailContent = $full_name . ' عزیز، کارگاه شما با موفقیت رزرو شد';
    $phpmailer->Body = $mailContent;

    if(!$phpmailer->send()){
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $phpmailer->ErrorInfo;
    }else{
        echo 'Message has been sent';
    }

    //////////////////////////////////////////////////////////////////////

    // Custom WP Mail Function
    // $to = array($mail);
    // $subject   = 'ایمیل خوش آمد گویی fourmind';
    // $headers[] = 'Content-Type: text/html; charset=UTF-8';
    // $headers[] = 'From: فورمایند';
    // $message   = $full_name . ' عزیز، کارگاه شما با موفقیت رزرو شد';

    // wp_mail( $to, $subject, $message, $headers );

}