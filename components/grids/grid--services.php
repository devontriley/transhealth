<?php
$services = get_sub_field('service');
?>

<div class="module-wrapper" data-scroll-effect="">
    <div class="grid services">
        <?php foreach($services as $s) : 
            $graphic = $s['image'];
            $title = $s['title'];
            $copy = $s['copy'];
            $bgColor = $s['background_color'];
            $textColor = $s['text_color'];
            ?>
            <?php include (realpath(dirname(__FILE__)."/../cards/card--service.php")); ?>
        <?php endforeach; ?>
    </div>
</div>
