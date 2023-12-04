<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

function wpplus_enqueue_scripts() {

    // Styles
    //<!-- bootstrap-v5 Css -->
    wp_register_style( 'bootstrap-reboot', TYPEROCKET_DIR_URL . 'resources/assets/vendor/bootstrap/css/bootstrap-reboot.rtl.min.css', false, '5.3.2' );
	wp_register_style( 'bootstrap', TYPEROCKET_DIR_URL . 'resources/assets/vendor/bootstrap/css/bootstrap.rtl.min.css', false, '5.3.2' );
	wp_register_style( 'bootstrap-utilities', TYPEROCKET_DIR_URL . 'resources/assets/vendor/bootstrap/css/bootstrap-utilities.rtl.min.css', false, '5.3.2' );
    // <!-- Swiper Css -->
    wp_register_style( 'swiper-bundle', TYPEROCKET_DIR_URL . 'resources/assets/vendor/swiper/css/swiper-bundle.min.css"', false, '11.0.4' );
    // <!-- Fourmind Css -->
	wp_register_style( 'global', TYPEROCKET_DIR_URL . 'resources/assets/css/global.css', false, '1.0.0' );
	wp_register_style( 'fourmind', TYPEROCKET_DIR_URL . 'resources/assets/css/style.css', false, '1.0.0' );
	wp_register_style( 'responsive', TYPEROCKET_DIR_URL . 'resources/assets/css/responsive.css', false, '1.0.0' );

    // Scripts
    // <!-- bootstrap-v5 Js -->
    wp_register_script( 'bootstrap-bundle', TYPEROCKET_DIR_URL . 'resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', false, '5.3.2' );
    wp_register_script( 'popper', TYPEROCKET_DIR_URL . 'resources/assets/vendor/bootstrap/js/popper.min.js', false, '5.3.2' );
    wp_register_script( 'bootstrap', TYPEROCKET_DIR_URL . 'resources/assets/vendor/bootstrap/js/bootstrap.min.js', false, '5.3.2' );
    // <!-- Swiper Js -->
    wp_register_script( 'swiper-bundle', TYPEROCKET_DIR_URL . 'resources/assets/vendor/swiper/js/swiper-bundle.min.js', false, '11.0.4' );
    // <!-- Fourmind Js -->
	wp_register_script( 'fourmind', TYPEROCKET_DIR_URL . 'resources/assets/js/script.js', false, '1.0.0', true );
	wp_register_script( 'ajax-workshop', TYPEROCKET_DIR_URL . 'resources/assets/js/ajaxworkshop.js', array('jquery'), '1.0.0', true );

	wp_enqueue_style( 'bootstrap-reboot' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'swiper-bundle' );   
	wp_enqueue_style( 'fourmind' );
	wp_enqueue_script( 'bootstrap-bundle' );
	wp_enqueue_script( 'swiper-bundle' );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'fourmind' );
    wp_enqueue_script( 'ajax-workshop' );


    // Ajax Handler
    wp_localize_script(
        'ajax-workshop', 'workshop_ajax_localize_obj', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'the_nonce' => wp_create_nonce('workshop_form_nonce') 
        )
    );

}

function wpplus_enqueue_scripts_admin() {

    wp_enqueue_script( 'jquery' );
    // Ajax Handler
    wp_localize_script(
        'ajax-workshop', 'workshop_ajax_localize_obj', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            // 'ajax_url' => ABSPATH . 'wp-admin/admin-ajax.php' ,
            // 'the_nonce' => wp_create_nonce('workshop_form_nonce') 
        )
    );
    
}
add_action( 'wp_enqueue_scripts', 'wpplus_enqueue_scripts' );
// add_action( 'admin_enqueue_scripts', 'wpplus_enqueue_scripts_admin' );
// add_action( 'enqueue_embed_scripts', 'wpplus_enqueue_scripts' );