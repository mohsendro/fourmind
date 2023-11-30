<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly. ?>

<?php get_header(); ?>

    <?php
        $queried_id = get_queried_object_id();

        $option = new \App\Models\Option;
        $where_option = [
            [
                'column'   => 'option_name',
                'operator' => '=',
                'value'    => 'posts_per_page'
            ]
        ];
        $option = $option->findAll()->where($where_option)->select('option_value')->get()->toArray();
        $option = $option[0]['option_value'];

        $workshop = new \App\Models\Workshop;
        $where_workshop = [
            [
                'column'   => 'post_status',
                'operator' => '=',
                'value'    => 'publish'
            ]
        ];
        $workshops = $workshop->findAll()->with('meta')->where($where_workshop)->orderBy('id', 'DESC')->get();
    ?>

    <!-- Fourmind Start -->
    <section id="fourmind" class="container-fluid fourmind">
        <div class="container">
            <div class="row">
                <div class="col-12 column">
                    <!-- Slider main container -->
                    <div class="swiper fourmindSwiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                        <!-- Slides -->
                            <div class="swiper-slide main-slide" data-bullet="خانه">
                                <div class="main-container">
                                    <h2 class="primary-desc">
                                        مهمترین تصمیمات زندگیِ شخصی و کاریِ تو، ربطی به چیزهایی که میدونی نداره. ربط به نحوه ی فکر کردنت داره. اینکه در لحظه چطور کنترل افکار و احساساتت رو داری انتخاب های آگاهانه ی تو رو مشخص میکنه.
                                    </h2>
                                    <h1 class="primary-slogan">
                                        آکادمی فورمایند روی ذهنیت تو و ابزارهایی که برای شفاف‌اندیشی و تصمیم‌گیری در اختیار داری کار می‌کنه.
                                    </h1>
                                    <button class="btn btn-start">
                                        <svg width="20" height="20" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30.0333 20.55L27.9999 18.5167C27.5166 18.1 27.2333 17.4833 27.2166 16.8C27.1833 16.05 27.4833 15.3 28.0333 14.75L30.0333 12.75C31.7666 11.0167 32.4166 9.35 31.8666 8.03334C31.3333 6.73334 29.6833 6.01667 27.2499 6.01667H9.83325V4.58334C9.83325 3.9 9.26659 3.33334 8.58325 3.33334C7.89992 3.33334 7.33325 3.9 7.33325 4.58334V35.4167C7.33325 36.1 7.89992 36.6667 8.58325 36.6667C9.26659 36.6667 9.83325 36.1 9.83325 35.4167V27.2833H27.2499C29.6499 27.2833 31.2666 26.55 31.8166 25.2333C32.3666 23.9167 31.7333 22.2667 30.0333 20.55Z" fill="white"/>
                                        </svg>
                                        شروع کن!
                                    </button>
                                </div>
                            </div>
                            <div class="swiper-slide main-slide" data-bullet="کارگاه‌ها">
                                <div class="main-container">
                                    <!-- Slider inside container -->
                                    <div class="swiper cardSwiper">
                                        <div class="swiper-wrapper">
                                            <?php foreach( $workshops as $workshop ): ?>
                                                <?php require TYPEROCKET_DIR_PATH . '/resources/themes/wpplus/components/card.php'; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide main-slide" data-bullet="فرم تماس">
                                <div class="main-container form-container">
                                    <div class="form-heading">
                                        <h2 class="title">فرم ثبت نام در کارگاه تفکر انتقادی</h2>
                                        <span class="notic">
                                            <svg width="20" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2.5C6.49 2.5 2 6.99 2 12.5C2 18.01 6.49 22.5 12 22.5C17.51 22.5 22 18.01 22 12.5C22 6.99 17.51 2.5 12 2.5ZM11.25 8.5C11.25 8.09 11.59 7.75 12 7.75C12.41 7.75 12.75 8.09 12.75 8.5V13.5C12.75 13.91 12.41 14.25 12 14.25C11.59 14.25 11.25 13.91 11.25 13.5V8.5ZM12.92 16.88C12.87 17.01 12.8 17.11 12.71 17.21C12.61 17.3 12.5 17.37 12.38 17.42C12.26 17.47 12.13 17.5 12 17.5C11.87 17.5 11.74 17.47 11.62 17.42C11.5 17.37 11.39 17.3 11.29 17.21C11.2 17.11 11.13 17.01 11.08 16.88C11.03 16.76 11 16.63 11 16.5C11 16.37 11.03 16.24 11.08 16.12C11.13 16 11.2 15.89 11.29 15.79C11.39 15.7 11.5 15.63 11.62 15.58C11.86 15.48 12.14 15.48 12.38 15.58C12.5 15.63 12.61 15.7 12.71 15.79C12.8 15.89 12.87 16 12.92 16.12C12.97 16.24 13 16.37 13 16.5C13 16.63 12.97 16.76 12.92 16.88Z" fill="#FF5858"/>
                                            </svg>
                                            جواب دادن به این سوالات اجباری نیست اما پاسخ دادن به اون‌ها تاثیر بسیار زیادی روی طراحی هدفمند مباحث کارگاه برای مخاطبین و جنس دغدغه اونها داره. 
                                        </span>
                                    </div>
                                    <form method="get" class="fourmind-form form-step-one">
                                        <div class="row">
                                            <div class="col-12 d-none column">
                                                <div class="form-group">
                                                    <input type="hidden" name="course-id" id="course-id" class="form-control course-id" value="0">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 column">
                                                <div class="form-group">
                                                    <div class="danger-message full-name-message">
                                                        <svg width="15" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M18.1333 13.7667L12.8 4.16675C12.0833 2.87508 11.0916 2.16675 9.99998 2.16675C8.90831 2.16675 7.91665 2.87508 7.19998 4.16675L1.86665 13.7667C1.19165 14.9917 1.11665 16.1667 1.65831 17.0917C2.19998 18.0167 3.26665 18.5251 4.66665 18.5251H15.3333C16.7333 18.5251 17.8 18.0167 18.3416 17.0917C18.8833 16.1667 18.8083 14.9834 18.1333 13.7667ZM9.37498 8.00008C9.37498 7.65841 9.65831 7.37508 9.99998 7.37508C10.3416 7.37508 10.625 7.65841 10.625 8.00008V12.1667C10.625 12.5084 10.3416 12.7917 9.99998 12.7917C9.65831 12.7917 9.37498 12.5084 9.37498 12.1667V8.00008ZM10.5916 15.2584C10.55 15.2917 10.5083 15.3251 10.4666 15.3584C10.4166 15.3917 10.3666 15.4167 10.3166 15.4334C10.2666 15.4584 10.2166 15.4751 10.1583 15.4834C10.1083 15.4917 10.05 15.5001 9.99998 15.5001C9.94998 15.5001 9.89165 15.4917 9.83331 15.4834C9.78331 15.4751 9.73331 15.4584 9.68331 15.4334C9.63331 15.4167 9.58331 15.3917 9.53331 15.3584C9.49165 15.3251 9.44998 15.2917 9.40831 15.2584C9.25831 15.1001 9.16665 14.8834 9.16665 14.6667C9.16665 14.4501 9.25831 14.2334 9.40831 14.0751C9.44998 14.0417 9.49165 14.0084 9.53331 13.9751C9.58331 13.9417 9.63331 13.9167 9.68331 13.9001C9.73331 13.8751 9.78331 13.8584 9.83331 13.8501C9.94165 13.8251 10.0583 13.8251 10.1583 13.8501C10.2166 13.8584 10.2666 13.8751 10.3166 13.9001C10.3666 13.9167 10.4166 13.9417 10.4666 13.9751C10.5083 14.0084 10.55 14.0417 10.5916 14.0751C10.7416 14.2334 10.8333 14.4501 10.8333 14.6667C10.8333 14.8834 10.7416 15.1001 10.5916 15.2584Z" fill="#FF5858"/>
                                                        </svg>
                                                        <span>پر کردن این فیلد الزامی است!</span>
                                                    </div>
                                                    <label for="full-name">نام و نام خانوادگی<span class="star">*</span></label>
                                                    <input type="text" name="full-name" id="full-name" class="form-control full-name" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 column">
                                                <div class="form-group">
                                                    <div class="danger-message job-message">
                                                        <svg width="15" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M18.1333 13.7667L12.8 4.16675C12.0833 2.87508 11.0916 2.16675 9.99998 2.16675C8.90831 2.16675 7.91665 2.87508 7.19998 4.16675L1.86665 13.7667C1.19165 14.9917 1.11665 16.1667 1.65831 17.0917C2.19998 18.0167 3.26665 18.5251 4.66665 18.5251H15.3333C16.7333 18.5251 17.8 18.0167 18.3416 17.0917C18.8833 16.1667 18.8083 14.9834 18.1333 13.7667ZM9.37498 8.00008C9.37498 7.65841 9.65831 7.37508 9.99998 7.37508C10.3416 7.37508 10.625 7.65841 10.625 8.00008V12.1667C10.625 12.5084 10.3416 12.7917 9.99998 12.7917C9.65831 12.7917 9.37498 12.5084 9.37498 12.1667V8.00008ZM10.5916 15.2584C10.55 15.2917 10.5083 15.3251 10.4666 15.3584C10.4166 15.3917 10.3666 15.4167 10.3166 15.4334C10.2666 15.4584 10.2166 15.4751 10.1583 15.4834C10.1083 15.4917 10.05 15.5001 9.99998 15.5001C9.94998 15.5001 9.89165 15.4917 9.83331 15.4834C9.78331 15.4751 9.73331 15.4584 9.68331 15.4334C9.63331 15.4167 9.58331 15.3917 9.53331 15.3584C9.49165 15.3251 9.44998 15.2917 9.40831 15.2584C9.25831 15.1001 9.16665 14.8834 9.16665 14.6667C9.16665 14.4501 9.25831 14.2334 9.40831 14.0751C9.44998 14.0417 9.49165 14.0084 9.53331 13.9751C9.58331 13.9417 9.63331 13.9167 9.68331 13.9001C9.73331 13.8751 9.78331 13.8584 9.83331 13.8501C9.94165 13.8251 10.0583 13.8251 10.1583 13.8501C10.2166 13.8584 10.2666 13.8751 10.3166 13.9001C10.3666 13.9167 10.4166 13.9417 10.4666 13.9751C10.5083 14.0084 10.55 14.0417 10.5916 14.0751C10.7416 14.2334 10.8333 14.4501 10.8333 14.6667C10.8333 14.8834 10.7416 15.1001 10.5916 15.2584Z" fill="#FF5858"/>
                                                        </svg>
                                                        <span>پر کردن این فیلد الزامی است!</span>
                                                    </div>
                                                    <label for="job">شغل<span class="star">*</span></label>
                                                    <input type="text" name="job" id="job" class="form-control job" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 column">
                                                <div class="form-group">
                                                    <div class="danger-message field-message">
                                                        <svg width="15" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M18.1333 13.7667L12.8 4.16675C12.0833 2.87508 11.0916 2.16675 9.99998 2.16675C8.90831 2.16675 7.91665 2.87508 7.19998 4.16675L1.86665 13.7667C1.19165 14.9917 1.11665 16.1667 1.65831 17.0917C2.19998 18.0167 3.26665 18.5251 4.66665 18.5251H15.3333C16.7333 18.5251 17.8 18.0167 18.3416 17.0917C18.8833 16.1667 18.8083 14.9834 18.1333 13.7667ZM9.37498 8.00008C9.37498 7.65841 9.65831 7.37508 9.99998 7.37508C10.3416 7.37508 10.625 7.65841 10.625 8.00008V12.1667C10.625 12.5084 10.3416 12.7917 9.99998 12.7917C9.65831 12.7917 9.37498 12.5084 9.37498 12.1667V8.00008ZM10.5916 15.2584C10.55 15.2917 10.5083 15.3251 10.4666 15.3584C10.4166 15.3917 10.3666 15.4167 10.3166 15.4334C10.2666 15.4584 10.2166 15.4751 10.1583 15.4834C10.1083 15.4917 10.05 15.5001 9.99998 15.5001C9.94998 15.5001 9.89165 15.4917 9.83331 15.4834C9.78331 15.4751 9.73331 15.4584 9.68331 15.4334C9.63331 15.4167 9.58331 15.3917 9.53331 15.3584C9.49165 15.3251 9.44998 15.2917 9.40831 15.2584C9.25831 15.1001 9.16665 14.8834 9.16665 14.6667C9.16665 14.4501 9.25831 14.2334 9.40831 14.0751C9.44998 14.0417 9.49165 14.0084 9.53331 13.9751C9.58331 13.9417 9.63331 13.9167 9.68331 13.9001C9.73331 13.8751 9.78331 13.8584 9.83331 13.8501C9.94165 13.8251 10.0583 13.8251 10.1583 13.8501C10.2166 13.8584 10.2666 13.8751 10.3166 13.9001C10.3666 13.9167 10.4166 13.9417 10.4666 13.9751C10.5083 14.0084 10.55 14.0417 10.5916 14.0751C10.7416 14.2334 10.8333 14.4501 10.8333 14.6667C10.8333 14.8834 10.7416 15.1001 10.5916 15.2584Z" fill="#FF5858"/>
                                                        </svg>
                                                        <span>پر کردن این فیلد الزامی است!</span>
                                                    </div>
                                                    <label for="field">رشته مورد علاقه<span class="star">*</span></label>
                                                    <input type="text" name="field" id="field" class="form-control field" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 column">
                                                <div class="form-group">
                                                    <div class="danger-message tel-message">
                                                        <svg width="15" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M18.1333 13.7667L12.8 4.16675C12.0833 2.87508 11.0916 2.16675 9.99998 2.16675C8.90831 2.16675 7.91665 2.87508 7.19998 4.16675L1.86665 13.7667C1.19165 14.9917 1.11665 16.1667 1.65831 17.0917C2.19998 18.0167 3.26665 18.5251 4.66665 18.5251H15.3333C16.7333 18.5251 17.8 18.0167 18.3416 17.0917C18.8833 16.1667 18.8083 14.9834 18.1333 13.7667ZM9.37498 8.00008C9.37498 7.65841 9.65831 7.37508 9.99998 7.37508C10.3416 7.37508 10.625 7.65841 10.625 8.00008V12.1667C10.625 12.5084 10.3416 12.7917 9.99998 12.7917C9.65831 12.7917 9.37498 12.5084 9.37498 12.1667V8.00008ZM10.5916 15.2584C10.55 15.2917 10.5083 15.3251 10.4666 15.3584C10.4166 15.3917 10.3666 15.4167 10.3166 15.4334C10.2666 15.4584 10.2166 15.4751 10.1583 15.4834C10.1083 15.4917 10.05 15.5001 9.99998 15.5001C9.94998 15.5001 9.89165 15.4917 9.83331 15.4834C9.78331 15.4751 9.73331 15.4584 9.68331 15.4334C9.63331 15.4167 9.58331 15.3917 9.53331 15.3584C9.49165 15.3251 9.44998 15.2917 9.40831 15.2584C9.25831 15.1001 9.16665 14.8834 9.16665 14.6667C9.16665 14.4501 9.25831 14.2334 9.40831 14.0751C9.44998 14.0417 9.49165 14.0084 9.53331 13.9751C9.58331 13.9417 9.63331 13.9167 9.68331 13.9001C9.73331 13.8751 9.78331 13.8584 9.83331 13.8501C9.94165 13.8251 10.0583 13.8251 10.1583 13.8501C10.2166 13.8584 10.2666 13.8751 10.3166 13.9001C10.3666 13.9167 10.4166 13.9417 10.4666 13.9751C10.5083 14.0084 10.55 14.0417 10.5916 14.0751C10.7416 14.2334 10.8333 14.4501 10.8333 14.6667C10.8333 14.8834 10.7416 15.1001 10.5916 15.2584Z" fill="#FF5858"/>
                                                        </svg>
                                                        <span>پر کردن این فیلد با فرمت *********09 الزامی است!</span>
                                                    </div>
                                                    <label for="tel">تلفن تماس<span class="star">*</span></label>
                                                    <input type="text" name="tel" id="tel" class="form-control tel" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 column">
                                                <div class="form-group">
                                                    <div class="danger-message email-message">
                                                        <svg width="15" height="15" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M18.1333 13.7667L12.8 4.16675C12.0833 2.87508 11.0916 2.16675 9.99998 2.16675C8.90831 2.16675 7.91665 2.87508 7.19998 4.16675L1.86665 13.7667C1.19165 14.9917 1.11665 16.1667 1.65831 17.0917C2.19998 18.0167 3.26665 18.5251 4.66665 18.5251H15.3333C16.7333 18.5251 17.8 18.0167 18.3416 17.0917C18.8833 16.1667 18.8083 14.9834 18.1333 13.7667ZM9.37498 8.00008C9.37498 7.65841 9.65831 7.37508 9.99998 7.37508C10.3416 7.37508 10.625 7.65841 10.625 8.00008V12.1667C10.625 12.5084 10.3416 12.7917 9.99998 12.7917C9.65831 12.7917 9.37498 12.5084 9.37498 12.1667V8.00008ZM10.5916 15.2584C10.55 15.2917 10.5083 15.3251 10.4666 15.3584C10.4166 15.3917 10.3666 15.4167 10.3166 15.4334C10.2666 15.4584 10.2166 15.4751 10.1583 15.4834C10.1083 15.4917 10.05 15.5001 9.99998 15.5001C9.94998 15.5001 9.89165 15.4917 9.83331 15.4834C9.78331 15.4751 9.73331 15.4584 9.68331 15.4334C9.63331 15.4167 9.58331 15.3917 9.53331 15.3584C9.49165 15.3251 9.44998 15.2917 9.40831 15.2584C9.25831 15.1001 9.16665 14.8834 9.16665 14.6667C9.16665 14.4501 9.25831 14.2334 9.40831 14.0751C9.44998 14.0417 9.49165 14.0084 9.53331 13.9751C9.58331 13.9417 9.63331 13.9167 9.68331 13.9001C9.73331 13.8751 9.78331 13.8584 9.83331 13.8501C9.94165 13.8251 10.0583 13.8251 10.1583 13.8501C10.2166 13.8584 10.2666 13.8751 10.3166 13.9001C10.3666 13.9167 10.4166 13.9417 10.4666 13.9751C10.5083 14.0084 10.55 14.0417 10.5916 14.0751C10.7416 14.2334 10.8333 14.4501 10.8333 14.6667C10.8333 14.8834 10.7416 15.1001 10.5916 15.2584Z" fill="#FF5858"/>
                                                        </svg>
                                                        <span>پر کردن این فیلد با فرمت com.***@*** الزامی است!</span>
                                                    </div>
                                                    <label for="email">ایمیل<span class="star">*</span></label>
                                                    <input type="text" name="email" id="email" class="form-control email" require>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 column">
                                                <div class="form-group form-group-radio">
                                                    <legend>انتخاب تاریخ کارگاه<span class="star">*</span></legend>

                                                    <div class="course-date">
                                                        <div class="form-check">
                                                            <input type="radio" name="date" id="date99" class="form-check-input date" value="option99" checked>
                                                            <label for="date99">زمان الان</label>
                                                        </div>
                                                    </div>


                                                    <?php // $num = 1; ?>
                                                    <?php // foreach( $workshop->meta->workshopInfo['meetings'] as $date ): ?>
                                                        <?php
                                                            // if( $num === 1 ) {
                                                            //     $checked = "checked";
                                                            // } else {
                                                            //     $checked = "";
                                                            // }
                                                        ?>
                                                        <!-- <div class="form-check">
                                                            <input type="radio" name="date" id="date<?php // echo $num; ?>" class="form-check-input date" value="option<?php // echo $num; ?>" <?php // echo $checked; ?>>
                                                            <label for="date<?php // echo $num; ?>"><?php // echo $date['clock']; ?></label>
                                                        </div> -->
                                                        <?php // $num++; ?>
                                                    <?php // endforeach; ?>



                                                </div>
                                            </div>
                                        </div>  
                                    </form>
                                    <div class="form-btn">
                                        <button class="btn btn-prev">
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.66003 20.4201L16.18 13.9001C16.95 13.1301 16.95 11.8701 16.18 11.1001L9.66003 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            مرحله قبل
                                        </button>
                                        <button class="btn btn-next">
                                            مرحله بعد
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.2501 20.4201L8.73009 13.9001C7.96009 13.1301 7.96009 11.8701 8.73009 11.1001L15.2501 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide main-slide" data-bullet="فرم سوالات">
                                <div class="main-container form-container">
                                    <div class="form-heading">
                                        <h2 class="title">فرم ثبت نام در کارگاه تفکر انتقادی</h2>
                                        <span class="notic">
                                            <svg width="20" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2.5C6.49 2.5 2 6.99 2 12.5C2 18.01 6.49 22.5 12 22.5C17.51 22.5 22 18.01 22 12.5C22 6.99 17.51 2.5 12 2.5ZM11.25 8.5C11.25 8.09 11.59 7.75 12 7.75C12.41 7.75 12.75 8.09 12.75 8.5V13.5C12.75 13.91 12.41 14.25 12 14.25C11.59 14.25 11.25 13.91 11.25 13.5V8.5ZM12.92 16.88C12.87 17.01 12.8 17.11 12.71 17.21C12.61 17.3 12.5 17.37 12.38 17.42C12.26 17.47 12.13 17.5 12 17.5C11.87 17.5 11.74 17.47 11.62 17.42C11.5 17.37 11.39 17.3 11.29 17.21C11.2 17.11 11.13 17.01 11.08 16.88C11.03 16.76 11 16.63 11 16.5C11 16.37 11.03 16.24 11.08 16.12C11.13 16 11.2 15.89 11.29 15.79C11.39 15.7 11.5 15.63 11.62 15.58C11.86 15.48 12.14 15.48 12.38 15.58C12.5 15.63 12.61 15.7 12.71 15.79C12.8 15.89 12.87 16 12.92 16.12C12.97 16.24 13 16.37 13 16.5C13 16.63 12.97 16.76 12.92 16.88Z" fill="#FF5858"/>
                                            </svg>
                                            جواب دادن به این سوالات اجباری نیست اما پاسخ دادن به اون‌ها تاثیر بسیار زیادی روی طراحی هدفمند مباحث کارگاه برای مخاطبین و جنس دغدغه اونها داره. 
                                        </span>
                                    </div>
                                    <form method="get" class="fourmind-form form-step-two">
                                        <div class="row">
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <label for="textarea1">در مورد چه چیزهایی سال‌ها خیلی اشتباه فکر می‌کردی؟</label>
                                                    <textarea name="textarea1" id="textarea1" class="form-control textarea textarea1" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <label for="textarea2">چطور میتونی متوجه بشی که افکارت کارآمد یا ناکارآمد هستند؟</label>
                                                    <textarea name="textarea2" id="textarea2" class="form-control textarea textarea2" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <label for="textarea3">چه زمان‌ها و در جه موقعیت‌هایی تونستی به اشتباهاتت پی ببری؟</label>
                                                    <textarea name="textarea3" id="textarea3" class="form-control textarea textarea3" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>  
                                    </form>
                                    <div class="form-btn">
                                        <button class="btn btn-prev">
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.66003 20.4201L16.18 13.9001C16.95 13.1301 16.95 11.8701 16.18 11.1001L9.66003 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            مرحله قبل
                                        </button>
                                        <button class="btn btn-next">
                                            مرحله بعد
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.2501 20.4201L8.73009 13.9001C7.96009 13.1301 7.96009 11.8701 8.73009 11.1001L15.2501 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide main-slide" data-bullet="فرم سوالات">
                                <div class="main-container form-container">
                                    <div class="form-heading">
                                        <h2 class="title">فرم ثبت نام در کارگاه تفکر تیم محور</h2>
                                        <span class="notic">
                                            <svg width="20" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2.5C6.49 2.5 2 6.99 2 12.5C2 18.01 6.49 22.5 12 22.5C17.51 22.5 22 18.01 22 12.5C22 6.99 17.51 2.5 12 2.5ZM11.25 8.5C11.25 8.09 11.59 7.75 12 7.75C12.41 7.75 12.75 8.09 12.75 8.5V13.5C12.75 13.91 12.41 14.25 12 14.25C11.59 14.25 11.25 13.91 11.25 13.5V8.5ZM12.92 16.88C12.87 17.01 12.8 17.11 12.71 17.21C12.61 17.3 12.5 17.37 12.38 17.42C12.26 17.47 12.13 17.5 12 17.5C11.87 17.5 11.74 17.47 11.62 17.42C11.5 17.37 11.39 17.3 11.29 17.21C11.2 17.11 11.13 17.01 11.08 16.88C11.03 16.76 11 16.63 11 16.5C11 16.37 11.03 16.24 11.08 16.12C11.13 16 11.2 15.89 11.29 15.79C11.39 15.7 11.5 15.63 11.62 15.58C11.86 15.48 12.14 15.48 12.38 15.58C12.5 15.63 12.61 15.7 12.71 15.79C12.8 15.89 12.87 16 12.92 16.12C12.97 16.24 13 16.37 13 16.5C13 16.63 12.97 16.76 12.92 16.88Z" fill="#FF5858"/>
                                            </svg>
                                            جواب دادن به این سوالات اجباری نیست اما پاسخ دادن به اون‌ها تاثیر بسیار زیادی روی طراحی هدفمند مباحث کارگاه برای مخاطبین و جنس دغدغه اونها داره. 
                                        </span>
                                    </div>
                                    <form method="get" class="fourmind-form form-step-three">
                                        <div class="row">
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <label for="textarea4">چه خاطره‌ای یادت میاد که روی تیم‌ورک بودنت تاثیر منفی گذاشته؟</label>
                                                    <textarea name="textarea4" id="textarea4" class="form-control textarea textarea4" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <label for="textarea5">یک تجربه شخصی از تیم‌ورک رو برامون بنویس</label>
                                                    <textarea name="textarea5" id="textarea5" class="form-control textarea textarea5" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <label for="textarea6">به نظرت چرا در ایران در کار تیمی ضعیف هستیم؟</label>
                                                    <textarea name="textarea6" id="textarea6" class="form-control textarea textarea6" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>  
                                    </form>
                                    <div class="form-btn">
                                        <button class="btn btn-prev">
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.66003 20.4201L16.18 13.9001C16.95 13.1301 16.95 11.8701 16.18 11.1001L9.66003 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            مرحله قبل
                                        </button>
                                        <button class="btn btn-next">
                                            مرحله بعد
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.2501 20.4201L8.73009 13.9001C7.96009 13.1301 7.96009 11.8701 8.73009 11.1001L15.2501 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide main-slide" data-bullet="فرم سوالات">
                                <div class="main-container form-container">
                                    <div class="form-heading">
                                        <h2 class="title">فرم ثبت نام در کارگاه نگرش پایدار، اقتصاد متقابل و خلق ارزش</h2>
                                        <span class="notic">
                                            <svg width="20" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2.5C6.49 2.5 2 6.99 2 12.5C2 18.01 6.49 22.5 12 22.5C17.51 22.5 22 18.01 22 12.5C22 6.99 17.51 2.5 12 2.5ZM11.25 8.5C11.25 8.09 11.59 7.75 12 7.75C12.41 7.75 12.75 8.09 12.75 8.5V13.5C12.75 13.91 12.41 14.25 12 14.25C11.59 14.25 11.25 13.91 11.25 13.5V8.5ZM12.92 16.88C12.87 17.01 12.8 17.11 12.71 17.21C12.61 17.3 12.5 17.37 12.38 17.42C12.26 17.47 12.13 17.5 12 17.5C11.87 17.5 11.74 17.47 11.62 17.42C11.5 17.37 11.39 17.3 11.29 17.21C11.2 17.11 11.13 17.01 11.08 16.88C11.03 16.76 11 16.63 11 16.5C11 16.37 11.03 16.24 11.08 16.12C11.13 16 11.2 15.89 11.29 15.79C11.39 15.7 11.5 15.63 11.62 15.58C11.86 15.48 12.14 15.48 12.38 15.58C12.5 15.63 12.61 15.7 12.71 15.79C12.8 15.89 12.87 16 12.92 16.12C12.97 16.24 13 16.37 13 16.5C13 16.63 12.97 16.76 12.92 16.88Z" fill="#FF5858"/>
                                            </svg>
                                            جواب دادن به این سوالات اجباری نیست اما پاسخ دادن به اون‌ها تاثیر بسیار زیادی روی طراحی هدفمند مباحث کارگاه برای مخاطبین و جنس دغدغه اونها داره. 
                                        </span>
                                    </div>
                                    <form method="get" class="fourmind-form form-step-four">
                                        <div class="row">
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <label for="textarea7">یک رابطه پایدار از دید تو چگونه است؟</label>
                                                    <textarea name="textarea7" id="textarea7" class="form-control textarea textarea7" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <legend>از ارزش‌هایی که در زیر آمده ۶ ارزش رو که برات از همه مهم‌ترن انتخاب کن</legend>
                                                    <div class="btn-group btn-group-narrow" role="group" aria-label="Basic checkbox toggle button group">
                                                        <input type="checkbox" name="btncheck1" id="btncheck1" class="btn-check btncheck1" data-check-value="نوع دوستی" checked/><label class="btn btn-default" for="btncheck1">نوع دوستی</label>
                                                        <input type="checkbox" name="btncheck2" id="btncheck2" class="btn-check btncheck2" data-check-value="توانمندی" checked/><label class="btn btn-default" for="btncheck2">توانمندی</label>
                                                        <input type="checkbox" name="btncheck3" id="btncheck3" class="btn-check btncheck3" data-check-value="مسئولیت" checked/><label class="btn btn-default" for="btncheck3">مسئولیت</label>
                                                        <input type="checkbox" name="btncheck4" id="btncheck4" class="btn-check btncheck4" data-check-value="نوآوری" checked/><label class="btn btn-default" for="btncheck4">نوآوری</label>
                                                        <input type="checkbox" name="btncheck5" id="btncheck5" class="btn-check btncheck5" data-check-value="پذیرش" checked/><label class="btn btn-default" for="btncheck5">پذیرش</label>
                                                        <input type="checkbox" name="btncheck6" id="btncheck6" class="btn-check btncheck6" data-check-value="تطبیق‌پذیری" /><label class="btn btn-default" for="btncheck6">تطبیق‌پذیری</label>
                                                        <input type="checkbox" name="btncheck7" id="btncheck7" class="btn-check btncheck7" data-check-value="موفقیت" /><label class="btn btn-default" for="btncheck7">موفقیت</label>
                                                        <input type="checkbox" name="btncheck8" id="btncheck8" class="btn-check btncheck8" data-check-value="یک‌پارچگی" /><label class="btn btn-default" for="btncheck8">یک‌پارچگی</label>
                                                        <input type="checkbox" name="btncheck9" id="btncheck9" class="btn-check btncheck9" data-check-value="اکتشاف" /><label class="btn btn-default" for="btncheck9">اکتشاف</label>
                                                        <input type="checkbox" name="btncheck10" id="btncheck10" class="btn-check btncheck10" data-check-value="پذیرفته شدن" /><label class="btn btn-default" for="btncheck10">پذیرفته شدن</label>
                                                        <input type="checkbox" name="btncheck11" id="btncheck11" class="btn-check btncheck11" data-check-value="کرامت" /><label class="btn btn-default" for="btncheck11">کرامت</label>
                                                        <input type="checkbox" name="btncheck12" id="btncheck12" class="btn-check btncheck12" data-check-value="اصالت" /><label class="btn btn-default" for="btncheck12">اصالت</label>
                                                        <input type="checkbox" name="btncheck13" id="btncheck13" class="btn-check btncheck13" data-check-value="قناعت" /><label class="btn btn-default" for="btncheck13">قناعت</label>
                                                        <input type="checkbox" name="btncheck14" id="btncheck14" class="btn-check btncheck14" data-check-value="اعتبار" /><label class="btn btn-default" for="btncheck14">اعتبار</label>
                                                        <input type="checkbox" name="btncheck15" id="btncheck15" class="btn-check btncheck15" data-check-value="دقت" /><label class="btn btn-default" for="btncheck15">دقت</label>
                                                        <input type="checkbox" name="btncheck16" id="btncheck16" class="btn-check btncheck16" data-check-value="مشارکت" /><label class="btn btn-default" for="btncheck16">مشارکت</label>
                                                        <input type="checkbox" name="btncheck17" id="btncheck17" class="btn-check btncheck17" data-check-value="صداقت" /><label class="btn btn-default" for="btncheck17">صداقت</label>
                                                        <input type="checkbox" name="btncheck18" id="btncheck18" class="btn-check btncheck18" data-check-value="نظم" /><label class="btn btn-default" for="btncheck18">نظم</label>
                                                        <input type="checkbox" name="btncheck19" id="btncheck19" class="btn-check btncheck19" data-check-value="امید" /><label class="btn btn-default" for="btncheck19">امید</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <legend>از ارزش‌هایی که در زیر آمده ۳ ارزش رو که برات از همه مهم‌ترن انتخاب کن</legend>
                                                    <div class="btn-group btn-group-narrow" role="group" aria-label="Basic checkbox toggle button group">
                                                        <input type="checkbox" name="btncheck20" id="btncheck20" class="btn-check btncheck20" data-check-value="مسئولیت" checked/><label class="btn btn-default" for="btncheck20">مسئولیت</label>
                                                        <input type="checkbox" name="btncheck21" id="btncheck21" class="btn-check btncheck21" data-check-value="نوآوری" checked/><label class="btn btn-default" for="btncheck21">نوآوری</label>
                                                        <input type="checkbox" name="btncheck22" id="btncheck22" class="btn-check btncheck22" data-check-value="توانمندی" /><label class="btn btn-default" for="btncheck22">توانمندی</label>
                                                        <input type="checkbox" name="btncheck23" id="btncheck23" class="btn-check btncheck23" data-check-value="دقت" /><label class="btn btn-default" for="btncheck23">دقت</label>
                                                        <input type="checkbox" name="btncheck24" id="btncheck24" class="btn-check btncheck24" data-check-value="نظم" /><label class="btn btn-default" for="btncheck24">نظم</label>
                                                        <input type="checkbox" name="btncheck25" id="btncheck25" class="btn-check btncheck25" data-check-value="موفقیت" /><label class="btn btn-default" for="btncheck25">موفقیت</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </form>
                                    <div class="form-btn">
                                        <button class="btn btn-prev">
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.66003 20.4201L16.18 13.9001C16.95 13.1301 16.95 11.8701 16.18 11.1001L9.66003 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            مرحله قبل
                                        </button>
                                        <button class="btn btn-next">
                                            مرحله بعد
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.2501 20.4201L8.73009 13.9001C7.96009 13.1301 7.96009 11.8701 8.73009 11.1001L15.2501 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide main-slide" data-bullet="فرم سوالات">
                                <div class="main-container form-container">
                                    <div class="form-heading">
                                        <h2 class="title">فرم ثبت نام در کارگاه نگرش پروژه محور و مدیریت رویداد</h2>
                                        <span class="notic">
                                            <svg width="20" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2.5C6.49 2.5 2 6.99 2 12.5C2 18.01 6.49 22.5 12 22.5C17.51 22.5 22 18.01 22 12.5C22 6.99 17.51 2.5 12 2.5ZM11.25 8.5C11.25 8.09 11.59 7.75 12 7.75C12.41 7.75 12.75 8.09 12.75 8.5V13.5C12.75 13.91 12.41 14.25 12 14.25C11.59 14.25 11.25 13.91 11.25 13.5V8.5ZM12.92 16.88C12.87 17.01 12.8 17.11 12.71 17.21C12.61 17.3 12.5 17.37 12.38 17.42C12.26 17.47 12.13 17.5 12 17.5C11.87 17.5 11.74 17.47 11.62 17.42C11.5 17.37 11.39 17.3 11.29 17.21C11.2 17.11 11.13 17.01 11.08 16.88C11.03 16.76 11 16.63 11 16.5C11 16.37 11.03 16.24 11.08 16.12C11.13 16 11.2 15.89 11.29 15.79C11.39 15.7 11.5 15.63 11.62 15.58C11.86 15.48 12.14 15.48 12.38 15.58C12.5 15.63 12.61 15.7 12.71 15.79C12.8 15.89 12.87 16 12.92 16.12C12.97 16.24 13 16.37 13 16.5C13 16.63 12.97 16.76 12.92 16.88Z" fill="#FF5858"/>
                                            </svg>
                                            جواب دادن به این سوالات اجباری نیست اما پاسخ دادن به اون‌ها تاثیر بسیار زیادی روی طراحی هدفمند مباحث کارگاه برای مخاطبین و جنس دغدغه اونها داره. 
                                        </span>
                                    </div>
                                    <form method="get" class="fourmind-form form-step-five">
                                        <div class="row">
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <label for="textarea8">چرا به مدیریت پروژه‌های برگزاری رویداد علاقه داری؟‌</label>
                                                    <textarea name="textarea8" id="textarea8" class="form-control textarea textarea8" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <label for="textarea9">مواجهه با استرس و اضطراب را در خود چگونه ارزیابی می‌کنی؟</label>
                                                    <textarea name="textarea9" id="textarea9" class="form-control textarea textarea9" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <label for="textarea10">اثر دومینو یا ویژگی دومینو از دید تو چیست؟</label>
                                                    <textarea name="textarea10" id="textarea10" class="form-control textarea textarea10" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>  
                                    </form>
                                    <div class="form-btn">
                                        <button class="btn btn-prev">
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.66003 20.4201L16.18 13.9001C16.95 13.1301 16.95 11.8701 16.18 11.1001L9.66003 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            مرحله قبل
                                        </button>
                                        <button class="btn btn-next">
                                            مرحله بعد
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.2501 20.4201L8.73009 13.9001C7.96009 13.1301 7.96009 11.8701 8.73009 11.1001L15.2501 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide main-slide" data-bullet="هزینه">
                                <div class="main-container form-container">
                                    <div class="form-heading">
                                        <h2 class="title">فرم ثبت نام در کارگاه تفکر انتقادی</h2>
                                        <span class="notic">
                                            <svg width="20" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2.5C6.49 2.5 2 6.99 2 12.5C2 18.01 6.49 22.5 12 22.5C17.51 22.5 22 18.01 22 12.5C22 6.99 17.51 2.5 12 2.5ZM11.25 8.5C11.25 8.09 11.59 7.75 12 7.75C12.41 7.75 12.75 8.09 12.75 8.5V13.5C12.75 13.91 12.41 14.25 12 14.25C11.59 14.25 11.25 13.91 11.25 13.5V8.5ZM12.92 16.88C12.87 17.01 12.8 17.11 12.71 17.21C12.61 17.3 12.5 17.37 12.38 17.42C12.26 17.47 12.13 17.5 12 17.5C11.87 17.5 11.74 17.47 11.62 17.42C11.5 17.37 11.39 17.3 11.29 17.21C11.2 17.11 11.13 17.01 11.08 16.88C11.03 16.76 11 16.63 11 16.5C11 16.37 11.03 16.24 11.08 16.12C11.13 16 11.2 15.89 11.29 15.79C11.39 15.7 11.5 15.63 11.62 15.58C11.86 15.48 12.14 15.48 12.38 15.58C12.5 15.63 12.61 15.7 12.71 15.79C12.8 15.89 12.87 16 12.92 16.12C12.97 16.24 13 16.37 13 16.5C13 16.63 12.97 16.76 12.92 16.88Z" fill="#FF5858"/>
                                            </svg>
                                            جواب دادن به این سوالات اجباری نیست اما پاسخ دادن به اون‌ها تاثیر بسیار زیادی روی طراحی هدفمند مباحث کارگاه برای مخاطبین و جنس دغدغه اونها داره. 
                                        </span>
                                    </div>
                                    <form method="get" class="fourmind-form form-step-six">
                                        <div class="row">
                                            <div class="col-12 column">
                                                <div class="form-group">
                                                    <div class="form-range">
                                                        <label for="range" class="form-label">
                                                            هزینه کارگاه رو خودت انتخاب کن
                                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M15.2501 20.4201L8.73009 13.9001C7.96009 13.1301 7.96009 11.8701 8.73009 11.1001L15.2501 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </label>
                                                        <input type="range" name="range" id="range" class="range" min="1000" max="1000000" value="10000" onchange="rangeCallback();">
                                                        <div class="wallet">
                                                            <span class="price">۱۰۰‌۰۰۰ تومان</span>
                                                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.85 4.4498V8.2498H13.35V4.4498C13.35 4.1798 13.11 4.0498 12.95 4.0498C12.9 4.0498 12.85 4.0598 12.8 4.0798L4.87 7.06981C4.34 7.2698 4 7.7698 4 8.3398V9.0098C3.09 9.6898 2.5 10.7798 2.5 12.0098V8.3398C2.5 7.1498 3.23 6.0898 4.34 5.6698L12.28 2.6698C12.5 2.5898 12.73 2.5498 12.95 2.5498C13.95 2.5498 14.85 3.3598 14.85 4.4498Z" fill="#505050"/>
                                                                <path d="M21.4999 15V16C21.4999 16.27 21.2899 16.49 21.0099 16.5H19.5499C19.0199 16.5 18.5399 16.11 18.4999 15.59C18.4699 15.28 18.5899 14.99 18.7899 14.79C18.9699 14.6 19.2199 14.5 19.4899 14.5H20.9999C21.2899 14.51 21.4999 14.73 21.4999 15Z" fill="#505050"/>
                                                                <path d="M19.48 13.45H20.5C21.05 13.45 21.5 13 21.5 12.45V12.01C21.5 9.94 19.81 8.25 17.74 8.25H6.26C5.41 8.25 4.63 8.53 4 9.01C3.09 9.69 2.5 10.78 2.5 12.01V18.74C2.5 20.81 4.19 22.5 6.26 22.5H17.74C19.81 22.5 21.5 20.81 21.5 18.74V18.55C21.5 18 21.05 17.55 20.5 17.55H19.63C18.67 17.55 17.75 16.96 17.5 16.03C17.29 15.27 17.54 14.54 18.04 14.05C18.41 13.67 18.92 13.45 19.48 13.45ZM14 13.25H7C6.59 13.25 6.25 12.91 6.25 12.5C6.25 12.09 6.59 11.75 7 11.75H14C14.41 11.75 14.75 12.09 14.75 12.5C14.75 12.91 14.41 13.25 14 13.25Z" fill="#505050"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </form>
                                    <div class="advice">
                                        <div class="column">
                                            <div class="title">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.65 3.85986H9.91V6.87986C9.91 7.26986 9.59 7.57986 9.21 7.57986C8.83 7.57986 8.51 7.26986 8.51 6.87986V3.85986H7.35C3.4 3.85986 2.1 5.03986 2.01 8.72986C2 8.90986 2.08 9.09986 2.21 9.22986C2.34 9.36986 2.51 9.43986 2.71 9.43986C4.11 9.43986 5.26 10.5999 5.26 11.9999C5.26 13.3999 4.11 14.5599 2.71 14.5599C2.52 14.5599 2.34 14.6299 2.21 14.7699C2.08 14.8999 2 15.0899 2.01 15.2699C2.1 18.9599 3.4 20.1399 7.35 20.1399H8.51V17.1199C8.51 16.7299 8.83 16.4199 9.21 16.4199C9.59 16.4199 9.91 16.7299 9.91 17.1199V20.1399H16.65C20.75 20.1399 22 18.8899 22 14.7899V9.20986C22 5.10986 20.75 3.85986 16.65 3.85986ZM18.47 11.8999L17.54 12.7999C17.5 12.8299 17.49 12.8899 17.5 12.9399L17.72 14.2099C17.76 14.4399 17.67 14.6799 17.47 14.8199C17.28 14.9599 17.03 14.9799 16.82 14.8699L15.67 14.2699C15.63 14.2499 15.57 14.2499 15.53 14.2699L14.38 14.8699C14.29 14.9199 14.19 14.9399 14.09 14.9399C13.96 14.9399 13.84 14.8999 13.73 14.8199C13.54 14.6799 13.44 14.4499 13.48 14.2099L13.7 12.9399C13.71 12.8899 13.69 12.8399 13.66 12.7999L12.73 11.8999C12.56 11.7399 12.5 11.4899 12.57 11.2699C12.64 11.0399 12.83 10.8799 13.07 10.8499L14.35 10.6599C14.4 10.6499 14.44 10.6199 14.47 10.5799L15.04 9.41986C15.15 9.20986 15.36 9.07986 15.6 9.07986C15.84 9.07986 16.05 9.20986 16.15 9.41986L16.72 10.5799C16.74 10.6299 16.78 10.6599 16.83 10.6599L18.11 10.8499C18.35 10.8799 18.54 11.0499 18.61 11.2699C18.7 11.4899 18.64 11.7299 18.47 11.8999Z" fill="#D6FF93"/>
                                                </svg>
                                                تلاش کن و ببین چطور می‌تونی به سمت یک ارتباط پایدار در این سیستم حرکت کنی.
                                            </div>
                                            <span class="desc">نگران نباش اگه به نظرت انتخابت خیلی درست نبود.</span>
                                            <span class="desc">برای دوره‌های بعدی می‌تونی موازنه‌ی قیمت و ارزش رو دقیق‌تر انتخاب کنی</span>
                                        </div>
                                        <div class="column">
                                            <ul>
                                                <li>گر بیشتر از ارزش دوره پرداخت کنی در دوره‌های بعد احتمالا شرکت نمی‌کنی.</li>
                                                <li>اگر کمتر از ارزش دوره پرداخت کنی این دوره پایدار نخواهد موند.</li>
                                                <li>اگر الان در وضعیت مالی خوبی نیستی، نگران نباش، یکی بیشتر پرداخت‌ خواهد کرد که تو بتونی بیای.</li>
                                                <li>گر الان در وضعیت مالی خوبی هستی، می‌تونی بیشتر پرداخت کنی تا دیگران هم فرصت داشته باشه بیاد.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-prev">
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.66003 20.4201L16.18 13.9001C16.95 13.1301 16.95 11.8701 16.18 11.1001L9.66003 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            مرحله قبل
                                        </button>
                                        <button class="btn btn-next" onclick="checkoutCallbackAjaxJs();">
                                            پرداخت
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.2501 20.4201L8.73009 13.9001C7.96009 13.1301 7.96009 11.8701 8.73009 11.1001L15.2501 4.58008" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide main-slide" data-hash="message" data-bullet="تایید نهایی">
                                <div class="main-container form-container">
                                    <div class="form-heading">
                                        <h2 class="title">پرداخت با موفقیت انجام شد</h2>
                                    </div>
                                    <div class="end-message">
                                        <svg width="121" height="121" viewBox="0 0 151 151" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" d="M105.625 12.4375H45.375C32.125 12.4375 21.25 23.3125 21.25 36.5625V124.625C21.25 135.875 29.3125 140.625 39.1875 135.188L69.6875 118.25C72.9375 116.438 78.1875 116.438 81.375 118.25L111.875 135.188C121.75 140.688 129.813 135.938 129.813 124.625V36.5625C129.75 23.3125 118.938 12.4375 105.625 12.4375Z" fill="#D6FF93"/>
                                            <path d="M69.8125 83.3125C68.625 83.3125 67.4375 82.875 66.5 81.9375L57.125 72.5625C55.3125 70.75 55.3125 67.75 57.125 65.9375C58.9375 64.125 61.9375 64.125 63.75 65.9375L69.8125 72L91.5 50.3125C93.3125 48.5 96.3125 48.5 98.125 50.3125C99.9375 52.125 99.9375 55.125 98.125 56.9375L73.125 81.9375C72.1875 82.875 71 83.3125 69.8125 83.3125Z" fill="#D6FF93"/>
                                        </svg>
                                        <div class="info">
                                            شما با موفقیت در <strong class="course-title">کارگاه اقتصاد متقابل و خلق ارزش</strong> ثبت‌ نام کردید. در تاریخ <span class="course-date">۵ مهر ۱۴۰۲</span> میبینیمت.
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
                                </div>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>

                    <a href="<?php echo get_home_url(); ?>" class="logo-desktop">
                        <img src="<?php echo TYPEROCKET_DIR_URL; ?>resources/assets/img/logo.png" alt="Fourmind Academy" width="auto" height="auto">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Fourmind End -->

<?php get_footer(); ?>