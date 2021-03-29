<?php
if(!$image) $image = get_sub_field('image');
if(!$header) $header = get_sub_field('header');
if(!$anchorLinks) $anchorLinks = get_sub_field('anchor_links');
?>

<div id="module-<?php echo $moduleCounter ?>" class="jumbotron hero secondary module-flush" data-scroll-effect="">
    <div class="row" inner>
    <div class="text-container col-md-6">
            <div class="inner">
                <h1><?php echo $header ?></h1>
                <?php if($anchorLinks) : ?>
                    <?php echo $anchorLinks ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="img-container col-md-6">
            <?php echo imageTag($image, '', '', '', false) ?>
        </div>
    </div>
</div>

<?php
unset($image);
unset($header);
unset($anchorsLinks);
?>