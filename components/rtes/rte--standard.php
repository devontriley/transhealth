<?php
if(!$mainHeader) $mainHeader = get_sub_field('main_header');
if(!$type) $type = get_sub_field('type');
if(!$cols) $cols = ($type == 'logo-grid') ? '3': '6';
if(!$inBox) $inBox = get_sub_field('in_box');
if(!$header) $header = get_sub_field('header');
if(!$copy) $copy = get_sub_field('copy');
if(!$button) $button = get_sub_field('button');
if(!$text && $button) $text = $button['title'];
if(!$link && $button) $link = $button['url'];

//set up class for super plain, minimal RTE
if(!$mainHeader && $type == 'standard' && !$inBox) {
    $minimal = true;
}
?>

<div class="module-wrapper" data-scroll-effect="">
    <div class="rte standard <?php if($minimal) echo 'minimal '?> module-padded <?php if($inBox) echo ' inset' ?>">

        <?php if($mainHeader): ?>
            <h2 class="main-header outline"><?php echo $mainHeader; ?></h2>
        <?php endif; ?>

        <div class="text-container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="text-inner">
                        <?php if($header): ?>
                            <h2><?php echo $header ?></h2>
                        <?php endif; ?>

                        <?php if($copy): ?>
                            <div class="copy">
                                <?php echo apply_filters('the_content', $copy) ?></div>
                        <?php endif; ?>

                        <?php if($type == 'logo-grid' || $type == 'text-icon-grid'): ?>
                            <?php if(have_rows('grid_items')): ?>
                                <div class="grid-wrapper row">
                                    <?php while(have_rows('grid_items')): ?>
                                        <?php the_row(); ?>
                                        <div class="card-container col-md-<?php echo $cols ?>">
                                            <?php include (realpath(dirname(__FILE__)."/../cards/card--icon-text.php")); ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif ?>
                        <?php endif; ?>

                        <?php if($button): ?>
                            <?php echo button($link, $button['title']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php
unset($mainHeader);
unset($copy);
unset($type);
unset($cols);
unset($inBox);
unset($header);
unset($button);
unset($text);
unset($link);
unset($cardCount);
unset($minimal);
?>