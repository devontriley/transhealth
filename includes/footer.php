<?php 
    $disclaimer = get_field('disclaimer', 'option');
    $feedbackTitle = get_field('feedback_title', 'option');
    $feedbackCopy = get_field('feedback_copy', 'option'); 
?>

<footer id="footer">
    <div class="newsletter">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <p>Sign up for the Transhealth Northampton Newsletter!</p>
            </div>
            <div class="col-lg-6 offset-lg-2">
                <?php include (realpath(dirname(__FILE__)."/../components/forms/form--newsletter.php")); ?>
            </div>
        </div>          
    </div>

    <div class="menu-container">
        <div class="row">
            <div class="col-md-3 logo-col">
                <a class="logo-link" href="<?php echo home_url(); ?>" aria-label="Return to Home Page">
                    <img class='logo' alt="Transhealth Logo" src='<?php echo home_url(); ?>/wp-content/themes/transhealth/assets/img/logo-white.svg'>
                </a>

                <div class="sm-links">
                    <p class="mb-3">Connect With Us</p>
                    <ul>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.281" height="36" viewBox="0 0 19.281 36"><defs><style>.a{fill:#2d3047;}</style></defs><path class="a" d="M19.627,20.25l1-6.515H14.375V9.507c0-1.782.873-3.52,3.673-3.52h2.842V.44A34.658,34.658,0,0,0,15.846,0C10.7,0,7.332,3.12,7.332,8.769v4.965H1.609V20.25H7.332V36h7.043V20.25Z" transform="translate(-1.609)"/></svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="30" viewBox="0 0 36 30"><defs><style>.a{fill:#2d3047;}</style></defs><path class="a" d="M32.3,10.857c.023.328.023.656.023.984,0,10.008-7.424,21.539-20.992,21.539A20.467,20.467,0,0,1,0,29.982a14.88,14.88,0,0,0,1.782.094,14.54,14.54,0,0,0,9.16-3.234,7.418,7.418,0,0,1-6.9-5.25,9.074,9.074,0,0,0,1.393.117,7.617,7.617,0,0,0,1.942-.258,7.525,7.525,0,0,1-5.916-7.43v-.094a7.289,7.289,0,0,0,3.335.961A7.712,7.712,0,0,1,2.513,4.764a20.8,20.8,0,0,0,15.213,7.922,8.76,8.76,0,0,1-.183-1.734,7.473,7.473,0,0,1,7.378-7.57,7.275,7.275,0,0,1,5.391,2.391,14.3,14.3,0,0,0,4.683-1.828,7.518,7.518,0,0,1-3.244,4.172A14.5,14.5,0,0,0,36,6.943a16.092,16.092,0,0,1-3.7,3.914Z" transform="translate(0 -3.381)"/></svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><defs><style>.a{fill:#2d3047;}</style></defs><path class="a" d="M15,9.546a7.692,7.692,0,1,0,7.69,7.692A7.679,7.679,0,0,0,15,9.546Zm0,12.692a5,5,0,1,1,5-5,5.009,5.009,0,0,1-5,5ZM24.8,9.231A1.794,1.794,0,1,1,23,7.437,1.79,1.79,0,0,1,24.8,9.231Zm5.093,1.821a8.879,8.879,0,0,0-2.423-6.286,8.934,8.934,0,0,0-6.284-2.423c-2.476-.141-9.9-.141-12.375,0A8.921,8.921,0,0,0,2.523,4.76,8.908,8.908,0,0,0,.1,11.046c-.141,2.477-.141,9.9,0,12.378a8.879,8.879,0,0,0,2.423,6.286,8.945,8.945,0,0,0,6.284,2.423c2.476.141,9.9.141,12.375,0a8.875,8.875,0,0,0,6.284-2.423,8.938,8.938,0,0,0,2.423-6.286c.141-2.477.141-9.894,0-12.371Zm-3.2,15.028a5.062,5.062,0,0,1-2.851,2.852c-1.974.783-6.659.6-8.841.6s-6.873.174-8.841-.6a5.062,5.062,0,0,1-2.851-2.852c-.783-1.975-.6-6.661-.6-8.843s-.174-6.875.6-8.843A5.062,5.062,0,0,1,6.157,5.543c1.974-.783,6.659-.6,8.841-.6s6.873-.174,8.841.6A5.062,5.062,0,0,1,26.69,8.395c.783,1.975.6,6.661.6,8.843S27.473,24.113,26.69,26.081Z" transform="translate(0.005 -2.238)"/></svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><defs><style>.a{fill:#2d3047;}</style></defs><path class="a" d="M6.715,30H.5V9.971h6.22ZM3.6,7.239A3.619,3.619,0,1,1,7.2,3.6,3.632,3.632,0,0,1,3.6,7.239ZM29.993,30H23.787V20.25c0-2.324-.047-5.3-3.234-5.3-3.234,0-3.729,2.525-3.729,5.136V30H10.611V9.971h5.965V12.7h.087a6.535,6.535,0,0,1,5.885-3.234C28.843,9.469,30,13.614,30,19V30Z" transform="translate(0 -0.001)"/></svg>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-2 offset-md-1">
                <?php wp_nav_menu( array('theme_location' => 'footer-menu-col-1') ); ?>
            </div>

            <div class="col-md-2">
                <?php wp_nav_menu( array('theme_location' => 'footer-menu-col-2') ); ?>
            </div>

            <div class="col-md-4 feedback">
                <div class="inner">
                    <p style="font-weight: 600; font-size: 2rem;"><?php echo $feedbackTitle ?></p>
                    <p><?php echo $feedbackCopy ?></p>
                    <a href="#" class="btn mt-3">Let us know how we did</a>
                </div>
            </div>
        </div>
    </div>

    <div class="legal">
        <div class="disclaimer">
            <p><?php echo $disclaimer ?></p>
        </div>
        <div class="copyright">
            <p>© <?php echo date('Y'); ?> Transhealth Northampton</p>
        </div>
    </div>
</footer>