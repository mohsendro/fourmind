<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// WP Ajax: workshop-ajax-handle - هندل کارگاه

function workshop_ajax_handle_function() {

    check_ajax_referer( 'workshop_form_nonce', 'submitted_nonce' );  // This function will die if submitted_nonce is not correct.

    // $questionsList = [];
    // $questionsList[] = [$_POST['label1'] => sanitize_text_field($_POST['question1'])];
    // $questionsList[] = [$_POST['label2'] => sanitize_text_field($_POST['question2'])];
    // $questionsList[] = [$_POST['label3'] => sanitize_text_field($_POST['question3'])];

    $model = new App\Models\Reservation();
    $model->course_id = sanitize_text_field($_POST['courseID']);
    $model->full_name = sanitize_text_field($_POST['fullName']);
    $model->job = sanitize_text_field($_POST['job']);
    $model->field = sanitize_text_field($_POST['field']);
    $model->tel = sanitize_text_field($_POST['tel']);
    $model->email = sanitize_text_field($_POST['email']);
    // $model->questions = $questionsList;
    // $model->price = $_POST['price'];
    // $model->status = 0;
    $model->save(); 

    $response = array(
        'success'   => 'درخواست با موفقیت ارسال شد',
    );

    wp_send_json_success( $response, 200 );
    wp_send_json_error();
    wp_die();

}
add_action( 'wp_ajax_nopriv_workshop_ajax_handle', 'workshop_ajax_handle_function' );
add_action( 'wp_ajax_workshop_ajax_handle', 'workshop_ajax_handle_function' );  // For logged in users.