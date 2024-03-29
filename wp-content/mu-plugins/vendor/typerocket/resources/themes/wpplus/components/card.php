<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly. ?>

<?php
    $sep = 1;
    $quiz = '';
    $count = count($workshop->meta->workshopInfo['questions']);
    foreach( $workshop->meta->workshopInfo['questions'] as $question ) {
        foreach( $question as $key => $value) {
            $quiz .= $value;
            if( $sep < $count ) {
                $quiz .= " ,";
            }
        }
        $sep++;
    }

    $workshopReserve = new \App\Models\Reservation;
    $where_search = [
        [
            'column'   => 'course_id',
            'operator' => '=',
            'value'    => $workshop->ID
        ],
        'AND',
        [
            'column'   => 'status',
            'operator' => '=',
            'value'    => 1
        ]
    ];
    $workshops_reserve = $workshopReserve->findAll()->where($where_search)->select('id')->orderBy('ID', 'DESC')->get();
    if( $workshops_reserve ) {
        $workshops_reserve = $workshops_reserve->toArray();
    } else {
        $workshops_reserve = [];
    }

    $current_date = strtotime( date("m/d/Y", time()) );
    $course_finished_date = strtotime( $workshop->meta->workshopInfo['finished-date'] );
?>

<?php if( $workshop->meta->workshopInfo['capacity'] > count($workshops_reserve) && ($course_finished_date - $current_date) >= 0 ): ?>
    <div class="swiper-slide card-slide">
        <?php if( has_post_thumbnail($workshop->ID) ): ?>
            <?php
                $post_thumbnail_attr = array(
                    'data-bs-toggle' => 'modal',
                    'data-bs-target' => '#videoPopup' . $workshop->ID,
                    'onclick' => "pauseVideo(" . $workshop->ID . ");",
                );
            ?>
                <?php echo get_the_post_thumbnail( $workshop->ID, 'full', $post_thumbnail_attr ); ?>
            <?php else: ?>
                <img src="<?php echo TYPEROCKET_DIR_URL; ?>/resources/assets/img/card.png" class="thumbnail">
        <?php endif; ?>
        <div class="content">
            <div class="head">
                <h3 class="title"><?php echo $workshop->post_title; ?></h3>
                <span class="teacher">با <?php echo $workshop->meta->workshopInfo['teacher']; ?></span>
            </div>
            <ul class="details">
                <!-- <li>
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.49996 2.38019C5.31663 2.38019 3.54163 4.15519 3.54163 6.33852C3.54163 8.48019 5.21663 10.2135 7.39996 10.2885C7.46663 10.2802 7.53329 10.2802 7.58329 10.2885C7.59996 10.2885 7.60829 10.2885 7.62496 10.2885C7.63329 10.2885 7.63329 10.2885 7.64163 10.2885C9.77496 10.2135 11.45 8.48019 11.4583 6.33852C11.4583 4.15519 9.68329 2.38019 7.49996 2.38019Z" fill="white"/>
                        <path d="M11.7333 12.5052C9.4083 10.9552 5.61663 10.9552 3.27497 12.5052C2.21663 13.2135 1.6333 14.1718 1.6333 15.1968C1.6333 16.2218 2.21663 17.1718 3.26663 17.8718C4.4333 18.6552 5.96663 19.0468 7.49997 19.0468C9.0333 19.0468 10.5666 18.6552 11.7333 17.8718C12.7833 17.1635 13.3666 16.2135 13.3666 15.1802C13.3583 14.1552 12.7833 13.2052 11.7333 12.5052Z" fill="white"/>
                        <path d="M16.6583 6.83015C16.7916 8.44682 15.6416 9.86348 14.05 10.0551C14.0416 10.0551 14.0416 10.0551 14.0333 10.0551H14.0083C13.9583 10.0551 13.9083 10.0551 13.8666 10.0718C13.0583 10.1135 12.3166 9.85515 11.7583 9.38015C12.6166 8.61348 13.1083 7.46348 13.0083 6.21348C12.95 5.53848 12.7166 4.92182 12.3666 4.39682C12.6833 4.23848 13.05 4.13848 13.425 4.10515C15.0583 3.96348 16.5166 5.18015 16.6583 6.83015Z" fill="white"/>
                        <path d="M18.325 14.5385C18.2583 15.3468 17.7417 16.0468 16.875 16.5218C16.0417 16.9802 14.9917 17.1968 13.95 17.1718C14.55 16.6302 14.9 15.9552 14.9667 15.2385C15.05 14.2052 14.5583 13.2135 13.575 12.4218C13.0167 11.9802 12.3667 11.6302 11.6583 11.3718C13.5 10.8385 15.8167 11.1968 17.2417 12.3468C18.0083 12.9635 18.4 13.7385 18.325 14.5385Z" fill="white"/>
                    </svg>
                    <strong>ظرفیت باقیمانده:</strong>
                    <span><?php //echo $workshop->meta->workshopInfo['capacity'] - count($workshops_reserve); ?> نفر</span>
                </li> -->
                <li>
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.3333 3.00513H1.66663C1.32496 3.00513 1.04163 2.72179 1.04163 2.38013C1.04163 2.03846 1.32496 1.75513 1.66663 1.75513H18.3333C18.675 1.75513 18.9583 2.03846 18.9583 2.38013C18.9583 2.72179 18.675 3.00513 18.3333 3.00513Z" fill="white"/>
                        <path d="M13.8916 19.3301C13.7833 19.5468 13.5583 19.6718 13.3333 19.6718C13.2416 19.6718 13.1416 19.6468 13.0583 19.6051L9.99997 18.0801L6.94164 19.6051C6.8583 19.6468 6.7583 19.6718 6.66664 19.6718C6.44164 19.6718 6.21664 19.5468 6.1083 19.3301C5.94997 19.0135 6.07497 18.6385 6.39164 18.4885L9.37497 16.9968V14.8801H10.625V16.9968L13.6083 18.4885C13.925 18.6385 14.05 19.0135 13.8916 19.3301Z" fill="white"/>
                        <path d="M2.5 2.38013V12.4635C2.5 14.0468 3.33333 14.8801 4.91667 14.8801H15.0833C16.6667 14.8801 17.5 14.0468 17.5 12.4635V2.38013H2.5ZM14.15 7.86346L11.525 10.0551C11.2833 10.2551 10.975 10.3385 10.6833 10.2885C10.3833 10.2385 10.125 10.0551 9.96667 9.78846L9.09167 8.33013L6.65 10.3635C6.53333 10.4635 6.39167 10.5051 6.25 10.5051C6.075 10.5051 5.89167 10.4301 5.76667 10.2801C5.54167 10.0135 5.58333 9.62179 5.85 9.39679L8.475 7.20513C8.71667 7.00513 9.025 6.92179 9.31667 6.97179C9.61667 7.02179 9.875 7.20513 10.0333 7.47179L10.9083 8.93013L13.35 6.89679C13.6167 6.67179 14.0083 6.71346 14.2333 6.98013C14.45 7.24679 14.4167 7.63846 14.15 7.86346Z" fill="white"/>
                    </svg>
                    <strong>نوع دوره:</strong>
                    <span><?php echo $workshop->meta->workshopInfo['type']; ?></span>
                </li>
                <li>
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.9583 3.68013V2.38013C13.9583 2.03846 13.675 1.75513 13.3333 1.75513C12.9917 1.75513 12.7083 2.03846 12.7083 2.38013V3.63013H7.29165V2.38013C7.29165 2.03846 7.00832 1.75513 6.66665 1.75513C6.32499 1.75513 6.04165 2.03846 6.04165 2.38013V3.68013C3.79165 3.88846 2.69999 5.23013 2.53332 7.22179C2.51665 7.46346 2.71665 7.66346 2.94999 7.66346H17.05C17.2917 7.66346 17.4917 7.45513 17.4667 7.22179C17.3 5.23013 16.2083 3.88846 13.9583 3.68013Z" fill="white"/>
                        <path d="M16.6667 8.91345H3.33333C2.875 8.91345 2.5 9.28845 2.5 9.74679V14.8801C2.5 17.3801 3.75 19.0468 6.66667 19.0468H13.3333C16.25 19.0468 17.5 17.3801 17.5 14.8801V9.74679C17.5 9.28845 17.125 8.91345 16.6667 8.91345ZM7.675 15.8885C7.63333 15.9218 7.59167 15.9635 7.55 15.9885C7.5 16.0218 7.45 16.0468 7.4 16.0635C7.35 16.0885 7.3 16.1051 7.25 16.1135C7.19167 16.1218 7.14167 16.1301 7.08333 16.1301C6.975 16.1301 6.86667 16.1051 6.76667 16.0635C6.65833 16.0218 6.575 15.9635 6.49167 15.8885C6.34167 15.7301 6.25 15.5135 6.25 15.2968C6.25 15.0801 6.34167 14.8635 6.49167 14.7051C6.575 14.6301 6.65833 14.5718 6.76667 14.5301C6.91667 14.4635 7.08333 14.4468 7.25 14.4801C7.3 14.4885 7.35 14.5051 7.4 14.5301C7.45 14.5468 7.5 14.5718 7.55 14.6051C7.59167 14.6385 7.63333 14.6718 7.675 14.7051C7.825 14.8635 7.91667 15.0801 7.91667 15.2968C7.91667 15.5135 7.825 15.7301 7.675 15.8885ZM7.675 12.9718C7.51667 13.1218 7.3 13.2135 7.08333 13.2135C6.86667 13.2135 6.65 13.1218 6.49167 12.9718C6.34167 12.8135 6.25 12.5968 6.25 12.3801C6.25 12.1635 6.34167 11.9468 6.49167 11.7885C6.725 11.5551 7.09167 11.4801 7.4 11.6135C7.50833 11.6551 7.6 11.7135 7.675 11.7885C7.825 11.9468 7.91667 12.1635 7.91667 12.3801C7.91667 12.5968 7.825 12.8135 7.675 12.9718ZM10.5917 15.8885C10.4333 16.0385 10.2167 16.1301 10 16.1301C9.78333 16.1301 9.56667 16.0385 9.40833 15.8885C9.25833 15.7301 9.16667 15.5135 9.16667 15.2968C9.16667 15.0801 9.25833 14.8635 9.40833 14.7051C9.71667 14.3968 10.2833 14.3968 10.5917 14.7051C10.7417 14.8635 10.8333 15.0801 10.8333 15.2968C10.8333 15.5135 10.7417 15.7301 10.5917 15.8885ZM10.5917 12.9718C10.55 13.0051 10.5083 13.0385 10.4667 13.0718C10.4167 13.1051 10.3667 13.1301 10.3167 13.1468C10.2667 13.1718 10.2167 13.1885 10.1667 13.1968C10.1083 13.2051 10.0583 13.2135 10 13.2135C9.78333 13.2135 9.56667 13.1218 9.40833 12.9718C9.25833 12.8135 9.16667 12.5968 9.16667 12.3801C9.16667 12.1635 9.25833 11.9468 9.40833 11.7885C9.48333 11.7135 9.575 11.6551 9.68333 11.6135C9.99167 11.4801 10.3583 11.5551 10.5917 11.7885C10.7417 11.9468 10.8333 12.1635 10.8333 12.3801C10.8333 12.5968 10.7417 12.8135 10.5917 12.9718ZM13.5083 15.8885C13.35 16.0385 13.1333 16.1301 12.9167 16.1301C12.7 16.1301 12.4833 16.0385 12.325 15.8885C12.175 15.7301 12.0833 15.5135 12.0833 15.2968C12.0833 15.0801 12.175 14.8635 12.325 14.7051C12.6333 14.3968 13.2 14.3968 13.5083 14.7051C13.6583 14.8635 13.75 15.0801 13.75 15.2968C13.75 15.5135 13.6583 15.7301 13.5083 15.8885ZM13.5083 12.9718C13.4667 13.0051 13.425 13.0385 13.3833 13.0718C13.3333 13.1051 13.2833 13.1301 13.2333 13.1468C13.1833 13.1718 13.1333 13.1885 13.0833 13.1968C13.025 13.2051 12.9667 13.2135 12.9167 13.2135C12.7 13.2135 12.4833 13.1218 12.325 12.9718C12.175 12.8135 12.0833 12.5968 12.0833 12.3801C12.0833 12.1635 12.175 11.9468 12.325 11.7885C12.4083 11.7135 12.4917 11.6551 12.6 11.6135C12.75 11.5468 12.9167 11.5301 13.0833 11.5635C13.1333 11.5718 13.1833 11.5885 13.2333 11.6135C13.2833 11.6301 13.3333 11.6551 13.3833 11.6885C13.425 11.7218 13.4667 11.7551 13.5083 11.7885C13.6583 11.9468 13.75 12.1635 13.75 12.3801C13.75 12.5968 13.6583 12.8135 13.5083 12.9718Z" fill="white"/>
                    </svg>
                    <strong>تاریخ دوره:</strong>
                    <span><?php echo $workshop->meta->workshopInfo['date']; ?></span>
                </li>
                <li>
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.99996 2.38013C5.40829 2.38013 1.66663 6.12179 1.66663 10.7135C1.66663 15.3051 5.40829 19.0468 9.99996 19.0468C14.5916 19.0468 18.3333 15.3051 18.3333 10.7135C18.3333 6.12179 14.5916 2.38013 9.99996 2.38013ZM13.625 13.6885C13.5083 13.8885 13.3 13.9968 13.0833 13.9968C12.975 13.9968 12.8666 13.9718 12.7666 13.9051L10.1833 12.3635C9.54163 11.9801 9.06663 11.1385 9.06663 10.3968V6.98013C9.06663 6.63846 9.34996 6.35513 9.69163 6.35513C10.0333 6.35513 10.3166 6.63846 10.3166 6.98013V10.3968C10.3166 10.6968 10.5666 11.1385 10.825 11.2885L13.4083 12.8301C13.7083 13.0051 13.8083 13.3885 13.625 13.6885Z" fill="white"/>
                    </svg>
                    <strong>طول دوره:</strong>
                    <span><?php echo $workshop->meta->workshopInfo['time']; ?></span>
                </li>
            </ul>
            <dev class="desc">
                <div class="headline">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.4916 2.38013H6.50829C3.47496 2.38013 1.66663 4.18846 1.66663 7.22179V14.1968C1.66663 17.2385 3.47496 19.0468 6.50829 19.0468H13.4833C16.5166 19.0468 18.325 17.2385 18.325 14.2051V7.22179C18.3333 4.18846 16.525 2.38013 13.4916 2.38013ZM14.1666 15.0885H5.83329C5.49163 15.0885 5.20829 14.8051 5.20829 14.4635C5.20829 14.1218 5.49163 13.8385 5.83329 13.8385H14.1666C14.5083 13.8385 14.7916 14.1218 14.7916 14.4635C14.7916 14.8051 14.5083 15.0885 14.1666 15.0885ZM14.1666 11.3385H5.83329C5.49163 11.3385 5.20829 11.0551 5.20829 10.7135C5.20829 10.3718 5.49163 10.0885 5.83329 10.0885H14.1666C14.5083 10.0885 14.7916 10.3718 14.7916 10.7135C14.7916 11.0551 14.5083 11.3385 14.1666 11.3385ZM14.1666 7.58846H5.83329C5.49163 7.58846 5.20829 7.30513 5.20829 6.96346C5.20829 6.62179 5.49163 6.33846 5.83329 6.33846H14.1666C14.5083 6.33846 14.7916 6.62179 14.7916 6.96346C14.7916 7.30513 14.5083 7.58846 14.1666 7.58846Z" fill="white"/>
                    </svg>
                    توضیحات:
                </div>
                <?php if( $workshop->post_excerpt ): ?>
                    <p><?php echo $workshop->post_excerpt; ?><?php //echo substr( sanitize_textarea_field($workshop->post_excerpt), 0, 250); ?></p>
                <?php endif; ?>
            </dev>
            <div class="links">
                <?php 
                    if( ! isset($workshop->meta->workshopInfo['video']) ) {
                        $disable = "disabled";
                    } else {
                        $disable = "";
                    }
                ?>
                <button class="btn btn-introduce <?php echo $disable; ?>" data-bs-toggle="modal" data-bs-target="#videoPopup<?php echo $workshop->ID; ?>" onclick="pauseVideo(<?php echo $workshop->ID; ?>);">ویدئو معرفی</button>
                <button class="btn btn-register" 
                    data-courseID = "<?php echo $workshop->ID; ?>" 
                    data-courseTitle = "<?php echo $workshop->post_title; ?>" 
                    data-courseDate = "<?php echo $workshop->meta->workshopInfo['date']; ?>" 
                    data-courseQuiz = "<?php echo $quiz; ?>"
                    data-courseMinPrice = "<?php echo $workshop->meta->workshopInfo['price']['min']; ?>" 
                    data-courseMaxPrice = "<?php echo $workshop->meta->workshopInfo['price']['max']; ?>" 
                    data-courseDefaultPrice = "<?php echo $workshop->meta->workshopInfo['price']['default']; ?>" 
                >
                    انتخاب
                </button>
            </div>
        </div>
        <!-- Modal -->
        <?php if( isset($workshop->meta->workshopInfo['video']) ): ?>
            <div class="modal fade videoPopupItem" id="videoPopup<?php echo $workshop->ID; ?>" date-popupNumber="<?php echo $workshop->ID; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <?php echo $workshop->post_title; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeVideo(<?php echo $workshop->ID; ?>);"></button>
                        </div>
                        <div class="modal-body">
                            <?php if( has_post_thumbnail($workshop->ID) ): ?>
                                <video class="embed-responsive-item" data-videoID="video<?php echo $workshop->ID; ?>"
                                    loop controls src="<?php echo $workshop->meta->workshopInfo['video']["url"]; ?>" 
                                    poster="<?php echo get_the_post_thumbnail_url($workshop->ID); ?>"
                                    type="video/mp4" width="100%" height="auto"
                                >
                                </video>
                            <?php else: ?>
                                    <video class="embed-responsive-item" data-videoID="video<?php echo $workshop->ID; ?>"
                                        loop controls src="<?php echo $workshop->meta->workshopInfo['video']["url"]; ?>" 
                                        poster="<?php echo TYPEROCKET_DIR_URL; ?>/resources/assets/img/card.png"
                                        type="video/mp4" width="100%" height="auto"
                                    >
                                    </video>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>