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

        <!-- TODO: Insert Favicons Here -->
        <link rel="icon" href="<?php echo get_template_directory_uri()?>/assets/favicons/favicon.png" sizes="any" type="image/svg+xml">

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
            <!-- Starter pane for Barba transitions -->
            <!-- <div class="animation-pane vertical" id="animation-pane-vertical">
                <img id="animation-pane-asset" alt="" src='<?php echo home_url(); ?>/wp-content/themes/bones/assets/img/logo.png'/>
            </div> -->

            <!-- TODO: Configure Nav Pane -->
            <?php include('components/nav/flyout-menu.php'); ?>

            <?php include('components/banner.php'); ?>

            <header id="header" role="navigation">
                
                <div class="header-logo">
                    <a class="header-link" href="<?php echo home_url(); ?>" aria-label="Return to Home Page">
                        <img class='logo' alt="Transhealth Logo" src='<?php echo home_url(); ?>/wp-content/themes/transhealth/assets/logo.svg'>
                    </a>
                </div>

                <div class="primary-nav">
                    <?php wp_nav_menu( array('theme_location' => 'main-menu') ); ?>
                    
                    <div class="primary-nav-btn-wrapper">
                        <a href="https://patientgateway.massgeneralbrigham.org/MyChart-PRD/Authentication/Login" target="_blank" class="primary-nav-btn btn">Patient Portal</a>
                    </div>
                </div>  

                <div class="mobile-controls" data-hover="scale">
                    <button class="hamburger-control" name="menu-toggle" aria-haspopup="true" aria-expanded="false" aria-controls="flyout-menu">
                        Toggle Mobile Nav Controls

                        <svg aria-hidden="true" class="open active" viewBox="0 0 38 38">
                            <defs>
                                <style>
                                    .hamburg-a{fill:none;}.hamburg-b{fill:#000;}
                                </style>
                            </defs>
                            <rect class="hamburg-a" width="38" height="38"/>
                            <rect class="hamburg-b" width="28" height="3" transform="translate(5 13)"/>
                            <rect id="animate-line" class="hamburg-b" width="23" height="3" transform="translate(5 22)"/>
                        </svg>

                        <svg aria-hidden="true" class="close" viewbox="0 0 29.604 29.604" width="18" height="18">
                            <use href="#mobile-close"></use>
                        </svg>
                    </button>
                </div>
                
            </header>

        <div id="container" data-barba="container" data-barba-namespace="<?php echo $post->post_name; ?>">
        <!-- TODO: If scroll indicator, enable here -->
        <?php //include('components/scroll-indicator.php'); ?>

