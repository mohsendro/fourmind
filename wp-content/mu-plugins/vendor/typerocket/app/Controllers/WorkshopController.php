<?php
namespace App\Controllers;

use App\Models\Workshop;
use App\Models\Option;
use TypeRocket\Controllers\WPPostController;
use TypeRocket\Http\Request;

class WorkshopController extends WPPostController
{
    protected $modelClass = Workshop::class;

    public function home(Workshop $workshop, Option $option)
    {
        $where_option = [
            [
                'column'   => 'option_name',
                'operator' => '=',
                'value'    => 'posts_per_page'
            ]
        ];
        $option = $option->find()->where($where_option)->select('option_value')->get()->toArray();
        $option = $option[0]['option_value'];

        $where_workshop = [
            [
                'column'   => 'post_status',
                'operator' => '=',
                'value'    => 'publish'
            ]
        ];
        $whereMeta_workshop = [
            // [
            //     'column'   => 'gallery_in_site',
            //     'operator' => '=',
            //     'value'    => 1
            // ]
        ];
        $workshops = $workshop->findAll()->with('meta')->whereMeta($whereMeta_workshop)->where($where_workshop)->orderBy('id', 'DESC');
        $workshops_data = $workshops; 
        $workshops = $workshops->get();

        if( $workshops != null || $workshops > 0 ) {

            $count = $workshops->count();
            $total_page = ceil($count / $option);
            $current_page = 1;
            $workshops = $workshops_data->take($option, 0)->get();

        } else {

            $workshops = [];
            $count = 0;
            $total_page = 0;
            $current_page = 0;
            
        }      

        return tr_view('Workshop', compact('workshops', 'count', 'total_page', 'current_page') );
    }

    public function page(Workshop $workshop, Option $option)
    {
        // tr_redirect()->toURL(home_url('/workshop/'))->now();
        return include( get_query_template( '404' ) );
    }

    public function archive(Workshop $workshop, Option $option, $number)
    {
        $where_option = [
            [
                'column'   => 'option_name',
                'operator' => '=',
                'value'    => 'posts_per_page'
            ]
        ];
        $option = $option->find()->where($where_option)->select('option_value')->get()->toArray();
        $option = $option[0]['option_value'];

        $where_workshop = [
            [
                'column'   => 'post_status',
                'operator' => '=',
                'value'    => 'publish'
            ]
        ];
        $whereMeta_workshop = [
            // [
            //     'column'   => 'gallery_in_site',
            //     'operator' => '=',
            //     'value'    => 1
            // ]
        ];
        $workshops = $workshop->findAll()->with('meta')->whereMeta($whereMeta_workshop)->where($where_workshop)->orderBy('id', 'DESC');
        $workshops_data = $workshops; 
        $workshops = $workshops->get();

        if( $workshops != null || $workshops > 0 ) {

            $count = $workshops->count();
            $total_page = ceil($count / $option);
            $current_page = intval($number);

            if( (intval($number) <= $total_page) && (intval($number) >= 1) ) {
                $workshops = $workshops_data->take($option, ($number-1)*$option)->get();
                if( $number == 1 ) {
                    // $workshops = $workshops->take($option, 1);
                    tr_redirect()->toURL(home_url('/workshop/'))->now();
                }
            } else {
                // $workshops = $workshops->take($option, $number);
                // tr_redirect()->toURL(home_url('/Workshop/'))->now();
                return include( get_query_template( '404' ) );
            }

        } else {

            $workshops = [];
            $count = 0;
            $total_page = 0;
            $current_page = 0;
            
        } 

        return tr_view('Workshop', compact('workshops', 'count', 'total_page', 'current_page') );
    }

    public function single(Workshop $workshop, $slug)
    {
        $where_workshop = [
            [
                'column'   => 'post_status',
                'operator' => '=',
                'value'    => 'publish'
            ],
            'AND',
            [
                'column'   => 'post_name',
                'operator' => '=',
                'value'    => $slug
            ]
        ];
        $workshop = $workshop->first()->with('meta')->where($where_workshop)->get();

        if( $workshop ) {

            return tr_view('single-workshop', compact('workshop', 'slug') );

        } else {

            return include( get_query_template( '404' ) );

        }
    }
}