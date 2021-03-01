<?php 
if(!isset($icon)){ $icon = get_sub_field('image'); }
if(!isset($text)){ $text = get_sub_field('text'); }
?>

<div class="card icon-text" data-scroll-effect="">
    <div class="card-body">

        <?php if($icon): ?>
            <div class="img-wrapper">
                <div class="image">
                    <?php echo imageTag($icon); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="text-wrapper">
            <?php if($text): ?>
                <h3 class="header card-header"><?php echo $text ?></h3>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php unset($icon); unset($text); ?>