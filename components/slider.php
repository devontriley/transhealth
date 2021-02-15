<?php
    $header = get_sub_field('header');
    $slideCount = count( get_sub_field( 'slides' ) );
    $testimonials = get_sub_field('slides');
    $counter = 0;
?>

<div class="module-wrapper">
    <div class="module-padded slider-module">

        <div class="inset">
            <?php if($header): ?>
                <h2><?php echo $header ?></h2>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div id="insetCarousel" class="carousel slide" data-touch="true">
                    <div class="carousel-inner">

                        <?php if( have_rows('slides') ): ?>
                            <?php while( have_rows('slides') ) : the_row(); ?>
                                    <?php
                                        $image = get_sub_field('image');
                                        $copy = get_sub_field('copy');
                                        $integer = $counter + 1;
                                    ?>

                                    <div class="carousel-item slider-card <?php if($counter == 0) echo 'active'?>">
                                        <div class="inner">
                                            <div class="row">
                                                <div class="col-md-7 text-container">
                                                    <div class="text-inner">
                                                        <p class="integer outline"><?php if($integer < 10) echo '0'; ?><?php echo $integer ?></p>
                                                        <p><?php echo $copy ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-5 img-container">
                                                    <div class="img-inner">
                                                        <?php echo imageTag($image, '', '', '', false) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $counter++ ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <div class="carousel-nav">
                            <a class="carousel-control-prev" href="#insetCarousel" role="button" data-slide="prev">
                                <svg viewBox="0 0 19.4 19">
                                    <path d="M8.3,17.7l1,1c0.4,0.4,1.1,0.4,1.5,0c0,0,0,0,0,0l8.4-8.4c0.4-0.4,0.4-1.1,0-1.5c0,0,0,0,0,0l-8.4-8.4
                                    c-0.4-0.4-1.1-0.4-1.5,0c0,0,0,0,0,0l-1,1c-0.4,0.4-0.4,1.1,0,1.5c0,0,0,0,0,0l5.2,5H1c-0.6,0-1,0.5-1,1c0,0,0,0,0,0v1.4
                                    c0,0.6,0.5,1,1,1c0,0,0,0,0,0h12.5l-5.2,5C7.9,16.6,7.8,17.2,8.3,17.7C8.2,17.7,8.3,17.7,8.3,17.7z"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#insetCarousel" role="button" data-slide="next">
                                <svg viewBox="0 0 19.4 19">
                                    <path d="M8.3,17.7l1,1c0.4,0.4,1.1,0.4,1.5,0c0,0,0,0,0,0l8.4-8.4c0.4-0.4,0.4-1.1,0-1.5c0,0,0,0,0,0l-8.4-8.4
                                    c-0.4-0.4-1.1-0.4-1.5,0c0,0,0,0,0,0l-1,1c-0.4,0.4-0.4,1.1,0,1.5c0,0,0,0,0,0l5.2,5H1c-0.6,0-1,0.5-1,1c0,0,0,0,0,0v1.4
                                    c0,0.6,0.5,1,1,1c0,0,0,0,0,0h12.5l-5.2,5C7.9,16.6,7.8,17.2,8.3,17.7C8.2,17.7,8.3,17.7,8.3,17.7z"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>