<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fancybox.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/theme.css">
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>

        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <header>
            <div class="row">
                <?php $logo = carbon_get_theme_option('capitol_logo'); ?>
                <?php if (!empty($logo) && $logo !== 1) { ?>
                    <div class="large-12 columns"><img src="<?php echo $logo; ?>" alt="Canaan Smith" class="logo"></div>
                <?php } ?>

                <nav class="large-9 columns">
                    <?php wp_nav_menu( array(
                        'theme_location'  => 'main-menu',
                        'container'       => 'ul', 
                        'container_class' => 'primary-nav',
                        'fallback_cb'     => '',
                    )); ?>
                </nav>

                <div class="large-3 columns">
                    <a data-fancybox-type="iframe" class="mailing-list" href="<?php echo carbon_get_theme_option('capitol_join_mail'); ?>">Join the Mailing List</a>
                </div>
            </div>
        </header>
