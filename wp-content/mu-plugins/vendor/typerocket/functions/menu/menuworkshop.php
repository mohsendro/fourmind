<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Menu: menu-workshop - منو کارگاه

function register_menu_workshop_page() {

	$menu = add_menu_page( 'رزرو‌ها', 'رزرو کارگاه', 'manage_options', 'workshops', 'register_menu_workshop_page_callback', 'dashicons-format-chat' ); 
    // $submenu = add_submenu_page( 'menu_slug', 'عنوان برگه', 'عنوان زیرمنو', 'manage_options', 'submenu_slug', 'register_menu_workshop_page_callback', 'dashicons-format-chat' ); 
    add_action("load-$menu", 'menu_workshop_table_add_options');
    
}
add_action( 'admin_menu', 'register_menu_workshop_page' );


// screen option
function menu_workshop_table_add_options() {

    $args_page = array(
        'label' => 'تعداد موردها در هر برگه:',
        'default' => 20,
        'option' => 'table_workshop_per_page'
    );

    add_screen_option('per_page', $args_page);

}

// get saved screen meta value
function menu_workshop_table_set_option($status, $option, $value) {

    return $value;

}
add_filter('set-screen-option', 'menu_workshop_table_set_option', 10, 3);


function register_menu_workshop_page_callback() {

    if( isset($_GET['ID']) && $_GET['ID'] ) {
        require_once plugin_dir_path(__FILE__) . "../page/pageworkshop.php";
    } else {
        require_once plugin_dir_path(__FILE__) . "../table/tableworkshop.php";
    }

}


// $settings = ['capability' => 'administrator'];
// $handler = function() {  

    // return 'hi';  

// };

// $menu_sample = tr_page('menu_sample', 'name', 'درخواست‌ها', $settings, $handler);
// $menu_sample->setHandler(\App\Controllers\SampleController::class);
// $menu_sample->mapAction('GET', 'menu_sample');
// $menu_sample->mapAction('POST', 'create_menu_sample');
// $menu_sample->setView($handler);
// $menu_sample->adminBar('menu_sample_index');
// $menu_sample->setSlug('menu_sample_index');

// $menu_sample->setIcon('dashicons-format-chat');
// $menu_sample->setTitle('عنوان برگه');
// $menu_sample->setMenuTitle('عنوان منو');
// $menu_sample->setSubMenuTitle('عنوان زیرمنو'); // If is sub page


// download CSV file
if( isset($_GET['action']) && $_GET['action'] == 'download_csv_file' ) {
    download_csv_file_callback();
}

// CSV Callback
function download_csv_file_callback() {

    // $workshop = Workshop::new()->findAll()->orderBy('ID', 'DESC')->get()->toArray();
    // $workshop = (new \App\Models\Workshop())->findAll()->orderBy('ID', 'DESC')->get()->toArray();
    $workshop = tr_query()->table('fm_workshops')->get()->toArray();

    // Query
    $statement = $workshop;
    
    // file creation
    $wp_filename = "workshop".date("d-m-y").".csv";
    
    // Clean object
    ob_end_clean();
    
    // Open file
    $wp_file = fopen($wp_filename,"w");
    
    // loop for insert data into CSV file
    foreach ($statement as $statementFet) {
        $wp_array = array(
            "ID"    => $statementFet['ID'],
            "course_id" => $statementFet['course_id'],
            "full_name" => $statementFet['full_name'],
            "job" => $statementFet['job'],
            "field" => $statementFet['field'],
            "tel" => $statementFet['tel'],
            "email" => $statementFet['email'],
            // "questions" => $statementFet['questions'],
            "price" => $statementFet['price'],
            "authority" => $statementFet['authority'],
            "status" => $statementFet['status']
        );
        // $wp_array = array();
        @fputcsv($wp_file, $wp_array);
    }
    
    // Close file
    fclose($wp_file);
    
    // download csv file
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=".$wp_filename);
    header("Content-Type: application/csv;");
    readfile($wp_filename);
    exit;

}