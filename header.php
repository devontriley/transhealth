<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no" />
        <title><?php the_title(); ?></title>
        <?php wp_head(); ?>

        <!-- TODO: Add GTM ID to Options Page in Back End Sidebar -->
        <?php 
            $gtmId = get_field('google_tag_manager_id', 'option'); 
            $initGtm = get_field('init_gtm', 'option');
        ?>

        <?php if($gtmId && $initGtm): ?>
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','<?php echo $gtmId ?>');</script>
            <!-- End Google Tag Manager -->
        <?php endif; ?>

        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_bloginfo('url') ?>/favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_bloginfo('url') ?>/favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_bloginfo('url') ?>/favicon_io/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_bloginfo('url') ?>/favicon_io/site.webmanifest">

        <!-- TODO: Add Bugherd Script to Options Page in Back End Sidebar -->
        <?php 
            $bugherdScript = get_field('bugherd_script_tag', 'option'); 
            $initBugherd = get_field('init_bugherd', 'option');

            if($bugherdScript && $initBugherd):
                echo $bugherdScript;
            endif; 
        ?>

    </head>

    <body <?php body_class(); ?> data-barba="wrapper" data-loadhome="<?php echo is_front_page(); ?>">

        <?php if($gtmId && $initGtm): ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-<?php echo $gtmId ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        <?php endif; ?>

        <?php include('main-svg.svg'); ?>

        <div id="wrapper">

            <?php include('components/nav/flyout-menu.php'); ?>

            <?php include('components/banner.php'); ?>

            <header id="header" role="navigation">
                
                <div class="header-logo">
                    <a class="header-link" href="<?php echo home_url(); ?>" aria-label="Return to Home Page">
                        <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/logo_color.svg" alt="Transhealth Northampton" />
                    </a>
                </div>

                <div class="primary-nav">
                    <?php wp_nav_menu( array('theme_location' => 'main-menu') ); ?>
                    
                    <div class="primary-nav-btn-wrapper">
                        <a href="https://patientgateway.massgeneralbrigham.org/MyChart-PRD/Authentication/Login" target="_blank" class="primary-nav-btn btn">Patient Portal</a>
                    </div>
                </div>  

                <div class="mobile-controls" data-hover="scale">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                
            </header>

        <div id="container" data-barba="container" data-barba-namespace="<?php echo $post->post_name; ?>">