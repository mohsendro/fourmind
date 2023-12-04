<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// WP Ajax: workshop-ajax-handle - هندل کارگاه

function workshop_ajax_handle_function() {

    check_ajax_referer( 'workshop_form_nonce', 'submitted_nonce' );  // This function will die if submitted_nonce is not correct.

    $model = new App\Models\Reservation();
    $model->course_id = sanitize_text_field($_POST['course_id']);
    $model->full_name = sanitize_text_field($_POST['fullName']);
    $model->job = sanitize_text_field($_POST['job']);
    $model->field = sanitize_text_field($_POST['field']);
    $model->tel = sanitize_text_field($_POST['tel']);
    $model->email = sanitize_text_field($_POST['email']);
    $model->date = sanitize_text_field($_POST['date']);
    $model->textarea1 = sanitize_text_field($_POST['textarea1']);
    $model->textarea2 = sanitize_text_field($_POST['textarea2']);
    $model->textarea3 = sanitize_text_field($_POST['textarea3']);
    $model->textarea4 = sanitize_text_field($_POST['textarea4']);
    $model->textarea5 = sanitize_text_field($_POST['textarea5']);
    $model->textarea6 = sanitize_text_field($_POST['textarea6']);
    $model->textarea7 = sanitize_text_field($_POST['textarea7']);
    $model->textarea8 = sanitize_text_field($_POST['textarea8']);
    $model->textarea9 = sanitize_text_field($_POST['textarea9']);
    $model->textarea10 = sanitize_text_field($_POST['textarea10']);
    $model->checkList = sanitize_text_field($_POST['checkList']);
    $model->price = sanitize_text_field($_POST['price']);
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