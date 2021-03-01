<?php
if(!$image) $image = get_sub_field('image');
if(!$header) $header = get_sub_field('header');
?>

<div class="jumbotron hero secondary module-flush" data-scroll-effect="">
    <div class="row" inner>
    <div class="text-container col-md-6">
            <div class="inner">
                <h1><?php echo $header ?></h1>
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
?>