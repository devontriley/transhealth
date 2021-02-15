<?php
$introTitle = get_sub_field('introductory_title');
$introCopy = get_sub_field('introductory_copy');
?>

<div class="jumbotron hero tertiary module-flush">
    <div class="inner">
        <div class="text-container">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <h1><?php echo get_the_title(); ?></h1>
                </div>

                <div class="col-md-6">
                    <?php if($introCopy && $introTitle): ?>
                        <div class="copy desktop">
                            <h3><?php echo $introTitle ?></h3>
                            <?php echo $introCopy ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="module-wrapper form-module">
    <div class="module-padded">
        <div class="row">
            <div class="form col-md-12">
                <?php include (realpath(dirname(__FILE__)."/form--careers.php")); ?>
            </div>
        </div>
    </div>
</div>

<div id="form-success-pane">
    <div class="inner">
        <h1>Thanks for reaching out! We’ll get in touch soon.</h1>
        <?php //echo button(get_home_url(), 'Return Home'); ?>
        <svg class="logo" viewbox="0 0 95.803 101.04">
            <use xlink:href="#footer-badge"></use>
        </svg>
    </div>
</div>