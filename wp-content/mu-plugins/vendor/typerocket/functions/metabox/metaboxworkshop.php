<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Meta Box: metabox-workshop - متادیتای کارگاه

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    // Set a unique slug-like ID
    $prefix = 'workshopInfo';
  
    // Create workshop metabox
    CSF::createMetabox( $prefix, array(
      'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
      'title'     => 'اطلاعات کارگاه',
      'post_type' => 'workshop',
    ) );
  
    // Create a section
    CSF::createSection( $prefix, array(
        'fields' => array(

            array(
                'id'    => 'teacher',
                'type'  => 'text',
                'title' => 'مدرس دوره',
            ),

            array(
                'id'          => 'capacity',
                'type'        => 'number',
                'title'       => 'ظرفیت دوره',
                'unit'        => 'نفر',
            ),

            array(
                'id'    => 'type',
                'type'  => 'text',
                'title' => 'نوع دوره',
            ),
            
            array(
                'id'    => 'date',
                'type'  => 'text',
                'title' => 'تاریخ دوره',
            ),

            array(
                'id'     => 'meetings',
                'type'   => 'repeater',
                'title'  => 'تاریخ جلسات',
                'fields' => array(
              
                  array(
                    'id'    => 'clock',
                    'type'  => 'text',
                    'title' => 'روز / ساعت'
                  ),
              
                ),
              ),
              
            
            array(
                'id'    => 'time',
                'type'  => 'text',
                'title' => 'طول دوره',
            ),

            array(
                'id'    => 'link',
                'type'  => 'text',
                'title' => 'لینک دوره',
            ),

        )
    ) );
  
}