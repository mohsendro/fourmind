<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly. ?>

<?php
    $reservation = new \App\Models\Reservation;
    $where_reservation = [
        [
            'column'   => 'authority',
            'operator' => '=',
            'value'    => $_GET['Authority']
        ]
    ];
    $reservation = $reservation->first()->where($where_reservation)->orderBy('id', 'DESC')->get();
    $verify = zarin_verify($reservation->price);
    
    if( $verify == 100 || $verify == 101 ) {
      
        $workshop = new \App\Models\Workshop;
        $where_workshop = [
            [
                'column'   => 'post_status',
                'operator' => '=',
                'value'    => 'publish'
            ]
        ];
        $workshop = $workshop->findById($reservation->course_id)->with('meta')->where($where_workshop)->get();

        if( $verify == 100 ) {
            $data = [
                'status' => 1
            ];
            tr_query()->table('fm_workshops')->findById(intval($reservation->ID))->update($data);
            
            send_sms($reservation->tel, $reservation->full_name, $workshop->post_title, $workshop->meta->workshopInfo['date']);
            send_mail($reservation->email, $reservation->full_name, $workshop->post_title, $workshop->meta->workshopInfo['date']);
        }

    } else {

        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $redirect = add_query_arg( array(
            'Authority' => $_GET['Authority'],
            'Status' => 'NOK',
        ), $actual_link );
        tr_redirect()->toURL($redirect)->now();
        die();

    }
?> 

<div class="form-heading">
    <h2 class="title">پرداخت با موفقیت انجام شد</h2>
</div>

<div class="end-message">
    <svg width="121" height="121" viewBox="0 0 151 151" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.4" d="M105.625 12.4375H45.375C32.125 12.4375 21.25 23.3125 21.25 36.5625V124.625C21.25 135.875 29.3125 140.625 39.1875 135.188L69.6875 118.25C72.9375 116.438 78.1875 116.438 81.375 118.25L111.875 135.188C121.75 140.688 129.813 135.938 129.813 124.625V36.5625C129.75 23.3125 118.938 12.4375 105.625 12.4375Z" fill="#D6FF93"/>
        <path d="M69.8125 83.3125C68.625 83.3125 67.4375 82.875 66.5 81.9375L57.125 72.5625C55.3125 70.75 55.3125 67.75 57.125 65.9375C58.9375 64.125 61.9375 64.125 63.75 65.9375L69.8125 72L91.5 50.3125C93.3125 48.5 96.3125 48.5 98.125 50.3125C99.9375 52.125 99.9375 55.125 98.125 56.9375L73.125 81.9375C72.1875 82.875 71 83.3125 69.8125 83.3125Z" fill="#D6FF93"/>
    </svg>

    <div class="info">
        شما با موفقیت در <strong class="course-title"><?php echo $workshop->post_title; ?></strong> ثبت‌ نام کردید. در تاریخ <span class="course-date"><?php echo $workshop->meta->workshopInfo['date']; ?></span> میبینیمت.
    </div>
</div>

<div class="form-btn">
    <a href="<?php echo get_home_url(); ?>" class="btn btn-home">
        <svg width="15" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M16.7 6.18324L11.9 2.82491C10.5917 1.90824 8.58333 1.95824 7.32499 2.93324L3.14999 6.19157C2.31666 6.84157 1.65833 8.17491 1.65833 9.22491V14.9749C1.65833 17.0999 3.38333 18.8332 5.50833 18.8332H14.4917C16.6167 18.8332 18.3417 17.1082 18.3417 14.9832V9.33324C18.3417 8.20824 17.6167 6.82491 16.7 6.18324Z" fill="white"/>
            <path d="M10 16.125C9.65833 16.125 9.375 15.8417 9.375 15.5V13C9.375 12.6583 9.65833 12.375 10 12.375C10.3417 12.375 10.625 12.6583 10.625 13V15.5C10.625 15.8417 10.3417 16.125 10 16.125Z" fill="white"/>
        </svg>
        بازگشت به خانه
    </a>

    <a href="#" target="_blank" class="btn btn-workshop">
        <svg width="15" height="15" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M18 2.1665V12.2498C18 13.8332 17.1667 14.6665 15.5833 14.6665H5.41666C3.83333 14.6665 3 13.8332 3 12.2498V2.1665H18Z" fill="white"/>
            <path d="M18.8334 2.7915H2.16675C1.82508 2.7915 1.54175 2.50817 1.54175 2.1665C1.54175 1.82484 1.82508 1.5415 2.16675 1.5415H18.8334C19.1751 1.5415 19.4584 1.82484 19.4584 2.1665C19.4584 2.50817 19.1751 2.7915 18.8334 2.7915Z" fill="white"/>
            <path d="M14.3917 19.1165C14.2833 19.3332 14.0583 19.4582 13.8333 19.4582C13.7416 19.4582 13.6417 19.4332 13.5583 19.3915L10.5 17.8665L7.44163 19.3915C7.3583 19.4332 7.25831 19.4582 7.16664 19.4582C6.94164 19.4582 6.71663 19.3332 6.6083 19.1165C6.44997 18.7998 6.57499 18.4248 6.89166 18.2748L9.87498 16.7832V14.6665H11.125V16.7832L14.1083 18.2748C14.425 18.4248 14.55 18.7998 14.3917 19.1165Z" fill="white"/>
        </svg>
        کارگاه‌ها
    </a>

    <a href="#" target="_blank" class="btn btn-academy">
        <svg width="15" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M10 4.91675V18.2751C10.1417 18.2751 10.2917 18.2501 10.4083 18.1834L10.4417 18.1668C12.0417 17.2918 14.8333 16.3751 16.6416 16.1334L16.8833 16.1001C17.6833 16.0001 18.3333 15.2501 18.3333 14.4501V4.3834C18.3333 3.39173 17.525 2.64174 16.5334 2.72508C14.7834 2.86674 12.1334 3.7501 10.65 4.6751L10.4417 4.80007C10.3167 4.87507 10.1583 4.91675 10 4.91675Z" fill="white"/>
            <path d="M1.66675 4.39176V14.4501C1.66675 15.2501 2.31674 16.0001 3.11674 16.1001L3.39175 16.1335C5.20842 16.3751 8.00844 17.3001 9.60844 18.1834C9.71677 18.2501 9.85008 18.2751 10.0001 18.2751V4.91677C9.84175 4.91677 9.68339 4.87509 9.55839 4.80009L9.41674 4.70843C7.9334 3.7751 5.27506 2.88344 3.52507 2.73344H3.47507C2.4834 2.65011 1.66675 3.39176 1.66675 4.39176Z" fill="white"/>
            <path d="M15.8333 2.81689V6.39188C15.8333 6.72521 15.4666 6.9252 15.1833 6.74186L14.1667 6.06686L13.15 6.74186C12.875 6.9252 12.5 6.72521 12.5 6.39188V3.76686C13.5917 3.33352 14.8083 2.98356 15.8333 2.81689Z" fill="white"/>
        </svg>
        خبرنامه آکادمی فورمایند
    </a>
</div>