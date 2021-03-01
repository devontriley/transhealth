<?php
if(!$image) $image = get_sub_field('image');
if(!$header) $header = get_sub_field('header');
if(!$copy) $copy = get_sub_field('copy');
?>

<div class="jumbotron hero home-hero section module-flush" data-scroll-effect="">
    <div class="row">
        <div class="col-md-6 order-2 text-container-col">
            <div class="text-container">
                <div class="inner">
                    <h1><?php echo $header ?></h1>

                    <p class="copy"><?php echo $copy ?></p>

                    <?php if(have_rows('buttons')): ?>
                        <div class="button-container">
                            <?php while(have_rows('buttons')): the_row(); ?>
                                <?php 
                                    $button = get_sub_field('button');
                                    $text = $button['title'];
                                    $link = $button['url'];
                                ?>

                                <?php echo button($link, $text); ?>

                                <?php 
                                unset($button);
                                unset($text);
                                unset($link);
                                ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 order-lg-2 mb-5 mb-lg-0">
            <div class="image-container">
                <?php if($image): ?>
                    <?php echo imageTag($image, "hero-img", '100vw', null, false); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- scroll button -->
    <div class="scroll-arrow">
        <span>Scroll Down</span>
        <svg viewBox="0 0 10.86 16.8">
            <use href="#right-arrow"></use>
        </svg>
    </svg>
    </div>
</div>

<?php
unset($image);
unset($header);
unset($copy);
?>