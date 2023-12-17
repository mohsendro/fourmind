<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Meta Box: metabox-workshop - متادیتای کارگاه

$countReservation = new \App\Controllers\ReservationController;
$countReservation = $countReservation::countReservation();

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
                'desc'        => 'ثبت نام شده: ' . "<span style='color:red;'>" . $countReservation . "</span> نفر",
                'unit'        => 'نفر',
                'default'     => 0
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
                'id'    => 'time',
                'type'  => 'text',
                'title' => 'طول دوره',
            ),

            array(
                'id'    => 'video',
                'type'  => 'media',
                'title' => 'ویدئو معرفی',
                'library' => 'video',
                'preview' => false
            ),

            array(
                'id'     => 'questions',
                'type'   => 'repeater',
                'title'  => 'سوالات کارگاه',
                'min'    => 3,
                'max'    => 3,
                'fields' => array(
              
                    array(
                    'id'    => 'question',
                    'type'  => 'text',
                    'title' => 'عنوان سوال'
                    ),
              
                ),
                'default'   => array(
                    array(
                        'question' => 'عنوان سوال اول خود را وارد کنید',
                    ),
                    array(
                        'question' => 'عنوان سوال دوم خود را وارد کنید',
                    ),
                    array(
                        'question' => 'عنوان سوال سوم خود را وارد کنید',
                    )
                )
            ),

        )
    ) );
  
}