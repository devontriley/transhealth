<?php
    $id = $event->ID; 
    $link = get_permalink($id);
    $image = get_field('featured_image', $id);
    $title = $event->post_title;
    $date = tribe_get_start_date($id, false);
    $startTime = tribe_get_start_time($id);
    $endTime = tribe_get_end_time($id);
?>

<div class="card event"data-scroll-effect="">
    <a class="card-cover-link" href="<?php echo $link ?>" aria-label="View Event: <?php echo $title ?>"></a>
    <div class="card-body row">
        <div class="img-wrapper col-md-5">
            <?php echo imageTag($image, 'img'); ?>
        </div>
        <div class="text-wrapper col-md-7">
            <h2 class="title card-title"><?php echo $title ?></h2>
            <p class="date"><?php echo $date ?>, <?php echo $startTime ?> - <?php echo $endTime ?></p>
            <a href="<?php echo $link ?>" class="card-link expand btn" aria-label="View Event: <?php echo $title ?>">
                <span class="learn-more">View Event</span>
            </a>
        </div>
    </div>
</div>