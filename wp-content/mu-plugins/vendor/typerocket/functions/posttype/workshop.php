<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Post Type: ‌workshop - ‌کارگاه

// general
$post_type_workshop = tr_post_type('workshop', 'workshops');
$post_type_workshop->setIcon('dashicons-welcome-learn-more');
$post_type_workshop->setPosition(5);
$post_type_workshop->setModelClass(\App\Models\Workshop::class);
$post_type_workshop->setHandler(\App\Controllers\WorkshopController::class);

// labels
$upperPlural = '‌کارگاه‌ها';
$upperSingular = '‌کارگاه‌';
$lowerSingular = '‌کارگاه‌';
$pluralLower = '‌کارگاه‌ها';
$labels = [
    'add_new'               => _x('افزودن ‌کارگاه‌', 'post_type:workshop', 'wpplus'),
    'all_items'             => sprintf( _x('همهٔ %s', 'post_type:workshop', 'wpplus'), $upperPlural),
    'archives'              => sprintf( _x('%s ‌کارگاه‌ها', 'post_type:workshop', 'wpplus'), $upperSingular),
    'add_new_item'          => sprintf( _x('%s تازه', 'post_type:workshop', 'wpplus'), $upperSingular),
    'attributes'            => sprintf( _x('ویژگی %s', 'post_type:workshop', 'wpplus'), $upperSingular),
    'edit_item'             => sprintf( _x('ویرایش %s', 'post_type:workshop', 'wpplus'), $upperSingular),
    'filter_items_list'     => sprintf( _x('فیلتر %s list %s', 'post_type:workshop', 'wpplus'), $pluralLower, $upperSingular),
    'insert_into_item'      => sprintf( _x('درج در %s', 'post_type:workshop', 'wpplus'), $lowerSingular),
    'item_published'        => sprintf( _x('%s انتشار.', 'post_type:workshop', 'wpplus'), $upperSingular),
    'item_published_privately' => sprintf( _x('%s انتشار خصوصی.', 'wpplus'), $upperSingular),
    'item_updated'          => sprintf( _x('%s بروزرسانی.', 'post_type:workshop', 'wpplus'), $upperSingular),
    'item_reverted_to_draft'=> sprintf( _x('%s انتقال به پیشنویس.', 'post_type:workshop', 'wpplus'), $upperSingular),
    'item_scheduled'        => sprintf( _x('%s برنامه ریزی.', 'post_type:workshop', 'wpplus'), $upperSingular),
    'items_list'            => sprintf( _x('%s لیست', 'post_type:workshop', 'wpplus'), $upperPlural),
    'menu_name'             => sprintf( _x('%s',  'post_type:workshop:admin menu', 'wpplus'), $upperPlural),
    'name'                  => sprintf( _x('%s', 'post_type:workshop:post type general name', 'wpplus'), $upperPlural),
    'name_admin_bar'        => sprintf( _x('%s', 'post_type:workshop:add new from admin bar', 'wpplus'), $upperSingular),
    'items_list_navigation' => sprintf( _x('%s list navigation', 'post_type:workshop', 'wpplus'), $upperPlural),
    'new_item'              => sprintf( _x('جدید %s', 'post_type:workshop', 'wpplus'), $upperSingular),
    'not_found'             => sprintf( _x('هیچ ‌کارگاه‌ یافت نشد', 'post_type:workshop', 'wpplus'), $pluralLower),
    'not_found_in_trash'    => sprintf( _x('یافت نشد %s در سطل زباله', 'post_type:workshop', 'wpplus'), $pluralLower),
    'parent_item_colon'     => sprintf( _x("مادر %s:", 'post_type:workshop', 'wpplus'), $upperPlural),
    'search_items'          => sprintf( _x('جستجو %s', 'post_type:workshop', 'wpplus'), $upperPlural),
    'singular_name'         => sprintf( _x('%s',  'post_type:workshop:post type singular name', 'wpplus'), $upperSingular),
    'uploaded_to_this_item' => sprintf( _x('بارگذاری در %s', 'post_type:workshop', 'wpplus'), $lowerSingular),
    'view_item'             => sprintf( _x('نمایش %s', 'post_type:workshop', 'wpplus'), $upperSingular),
    'view_items'            => sprintf( _x('نمایش %s', 'post_type:workshop', 'wpplus'), $upperPlural),
];
$post_type_workshop->setLabels($labels);

// slug
$withFront = false;
$post_type_workshop->setSlug('workshop', $withFront);
$post_type_workshop->setHierarchical(true);
$post_type_workshop->setRest('workshop');
$post_type_workshop->hideFrontend();
// $post_type_workshop->setRootOnly('/{post-type}/{post-name}');

// single
$post_type_workshop->forceDisableGutenberg();
$post_type_workshop->setSupports(['title', 'thumbnail', 'excerpt', 'page-attributes']);
// $post_type_workshop->featureless();

// archive
// $post_type_workshop->addColumn('ID', true, 'شناسه', function($value) {
//     return get_the_ID();
// });

// meta data
// $post_type_workshop->setModelClass(\App\Models\PsotTypeSample::class)
//             ->saveTitleAs(function (\App\Models\PsotTypeSample $post_type_workshop, \TypeRocket\Http\Request $request) {
//                 return $post_type_workshop->data->$request->getDataPost('post_title');
//             });