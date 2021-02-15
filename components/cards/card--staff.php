<?php
$id = get_the_ID();
$photo = get_field('staff_photo');
$name = get_the_title();
$title = get_field('title');
$link = get_the_permalink($id);
?>

<div class="card staff">
    <a class="card-cover-link" href="<?php echo $link ?>"></a>
    <div class="card-body">
        <div class="img-wrapper">
            <?php echo imageTag($photo) ?>
        </div>
        <div class="text-wrapper">
            <p class="name"><?php echo $name ?></p>
            <p class="title"><?php echo $title ?></p>
        </div>
    </div>
</div>

<?php
unset($id);
unset($photo);
unset($name);
unset($title);
unset($link);
?>