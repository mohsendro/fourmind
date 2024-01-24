<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly. ?>

<?php get_header(); ?>

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
                        <div class="swiper-slide main-slide" data-hash="message" data-bullet="تایید نهایی">
                            <div class="main-container form-container">
                                <?php if( (isset($_GET['Authority']) || ! empty($_GET['Authority'])) && (isset($_GET['Status']) || ! empty($_GET['Status']) ) ): ?>
                                    <?php if( $_GET['Status'] == 'OK' ): ?>
                                        <?php include(TYPEROCKET_DIR_PATH . "resources/views/components/success.php"); ?>
                                    <?php else: ?>
                                        <?php include(TYPEROCKET_DIR_PATH . "resources/views/components/error.php"); ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php tr_redirect()->toURL(home_url())->now(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
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