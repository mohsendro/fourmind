<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly. ?>

<!DOCTYPE html>
<html lang="<?php echo get_bloginfo('language'); ?>" 
      dir="<?php if( is_rtl() ) { echo 'rtl'; } else { echo 'ltr'; } ?>"
>
<head>
    <meta charset="<?php echo get_bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>
        <?php
            if( get_bloginfo('description') ) {
                echo get_bloginfo('name') . ' | ' . get_bloginfo('description');
            } else {
                echo get_bloginfo('name');
            }
        ?>
    </title>
    <?php wp_head(); ?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9KDKYPZQH8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9KDKYPZQH8');
</script>
</head>
<body <?php body_class('body'); ?> >

<video autoplay loop muted playsinline class="fourmind-back">
    <source src="<?php echo TYPEROCKET_DIR_URL . '/resources/assets/video/bg.mp4'; ?>" type="video/mp4">
</video>