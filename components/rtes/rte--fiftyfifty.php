<?php
    if(!$mainHeader) $mainHeader = get_sub_field('main_header');
    if(!$image) $image = get_sub_field('image');
    if(!$header) $header = get_sub_field('header');
    if(!$copy) $copy = get_sub_field('copy');
    if(!$button) $button = get_sub_field('button');
    if($button)
    {
        if(!$text) $text = $button['title'];
        if(!$link) $link = $button['url'];
    }
    if(!$inBox) $inBox = get_sub_field('in_box');
?>

<div id="module-<?php echo $moduleCounter ?>" class="module-wrapper" data-scroll-effect="">
    <div class="rte fiftyfifty <?php echo ($inBox) ? 'in-box module-padded' : 'module-flush';?>">
        <?php if($mainHeader): ?>
            <h2 class="main-header outline"><?php echo $mainHeader; ?></h2>
        <?php endif; ?>
        
        <div class="row align-items-center">
            <div class="inner <?php echo ($inBox) ? 'col-lg-10 offset-lg-1' : 'col-lg-12'; ?>">

                <div class="row">
                    <div class="image-container <?php echo ($inBox) ? 'col-lg-5 order-lg-2' : 'col-lg-6'; ?>">
                        <div class="image-inner">
                            <?php echo imageTag($image, '', '41.6%, (min-width: 992px) 33.3%'); ?>
                        </div>
                    </div>

                    <div class="text-container <?php echo ($inBox) ? 'col-lg-7' : 'col-lg-6'; ?>">
                        <div class="text-inner">
                            <?php if($header): ?>
                                <h2><?php echo $header ?></h2>
                            <?php endif; ?>

                            <?php if($copy): ?>
                                <div class="copy"><?php echo $copy ?></div>
                            <?php endif; ?>

                            <?php if($button): ?>
                                <?php echo button($link, $text); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
unset($mainHeader);
unset($image);
unset($header);
unset($copy);
unset($button);
unset($text);
unset($link);
unset($inBox);
?>