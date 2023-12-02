<?php
namespace App\Controllers;

use App\Models\Reservation;
use App\Models\Option;
use TypeRocket\Controllers\WPPostController;
use TypeRocket\Http\Request;

class ReservationController extends WPPostController
{
    protected $modelClass = Reservation::class;

    // Admin
    static public function index()
    {

        // $workshops = new App\Models\Reservation();
        // $workshops = $workshops->findAll()->orderBy('ID', 'DESC')->get()->toArray();
        if( isset($_GET['s']) ) {

            $where_search = [
                // [
                //     'column'   => 'course_id',
                //     'operator' => 'like',
                //     'value'    =>  '%'.$_GET['s'].'%'
                // ],
                [
                    'column'   => 'course_id',
                    'operator' => '=',
                    'value'    =>  $_GET['s']
                ]
            ];

            $workshops = Reservation::new()->findAll()->where($where_search)->orderBy('ID', 'DESC')->get();
            if( $workshops ) {
                $workshops = $workshops->toArray();
            } else {
                $workshops = [];
            }

        } else {

            $workshops = Reservation::new()->findAll()->orderBy('ID', 'DESC')->get();
            if( $workshops ) {
                $workshops = $workshops->toArray();
            } else {
                $workshops = [];
            }

        }

        return $workshops;
        
    }
}