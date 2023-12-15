<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Column: column-workshop - ستون کارگاه

// Add Column
function columns_workshop($columns) {

    $title = $columns['title'];
    $date = $columns['date'];
    unset( $columns['title'] ); 
    unset( $columns['date'] ); 
    
    // $columns['ID'] = 'شناسه';
    $columns['title'] = $title;
    $columns['info'] = 'توضیحات';
    $columns['date'] = $date;
    return $columns;

}
add_filter('manage_workshop_posts_columns', 'columns_workshop');

// Add Sort
function columns_workshop_sortable($columns) {

    $columns['ID'] = 'شناسه';
    return $columns;
    
}
add_filter('manage_edit-workshop_sortable_columns', 'columns_workshop_sortable');

// Add Data To Column
function columns_workshop_data($column, $post_id) {

    if ($column == 'ID') {
        echo $post_id;
	}

    if ($column == 'info') {
        
        // $meta = get_post_meta( $post_id, 'workshopInfo', true ); //var_dump($meta);
        // $count = count($meta);
        // if( $count > 0 ) {

        //     $i = 1;
        //     foreach( $meta as $key => $value ) {
                
        //         if( ! empty( $value ) ) {
        //             if( ! is_array( $value ) ) {
        //                 echo $value;
        //             }
        //             if( $i < $count ) {
        //                 echo " | ";
        //             }
        //         }
        //         $i++;
                
        //     }

        // }

        echo get_the_excerpt($post_id);

	}

}
add_action('manage_workshop_posts_custom_column' , 'columns_workshop_data', 10, 2);
