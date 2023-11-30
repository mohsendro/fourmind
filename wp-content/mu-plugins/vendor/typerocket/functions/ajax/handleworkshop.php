<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// WP Ajax: workshop-ajax-handle - هندل کارگاه

function workshop_ajax_handle_function() {

    check_ajax_referer( 'workshop_form_nonce', 'submitted_nonce' );  // This function will die if submitted_nonce is not correct.
    
    $model = new App\Models\Models();
    $model->column = sanitize_text_field($_POST['courseID']);
    $model->column = sanitize_text_field($_POST['fullName']);
    $model->column = sanitize_text_field($_POST['job']);
    $model->column = sanitize_text_field($_POST['field']);
    $model->column = sanitize_text_field($_POST['tel']);
    $model->column = sanitize_text_field($_POST['email']);
    $model->column = sanitize_text_field($_POST['date']);
    $model->column = sanitize_text_field($_POST['textarea1']);
    $model->column = sanitize_text_field($_POST['textarea2']);
    $model->column = sanitize_text_field($_POST['textarea3']);
    $model->column = sanitize_text_field($_POST['textarea4']);
    $model->column = sanitize_text_field($_POST['textarea5']);
    $model->column = sanitize_text_field($_POST['textarea6']);
    $model->column = sanitize_text_field($_POST['textarea7']);
    $model->column = sanitize_text_field($_POST['textarea8']);
    $model->column = sanitize_text_field($_POST['textarea9']);
    $model->column = sanitize_text_field($_POST['textarea10']);
    $model->column = sanitize_text_field($_POST['checkList']);
    $model->column = sanitize_text_field($_POST['price']);
    $model->save(); 

    $response = array(
        'success'   => 'درخواست با موفقیت ارسال شد',
    );

    wp_send_json_success( $response, 200 );
    wp_send_json_error();
    wp_die();

}
add_action( 'wp_ajax_nopriv_workshop_ajax_handle', 'workshop_ajax_handle_function' );
// add_action( 'wp_ajax_workshop_ajax_handle', 'workshop_ajax_handle_function' );  // For logged in users.