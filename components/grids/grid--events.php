<?php
if(!isset($mainHeader)) $mainHeader = get_sub_field('main_header');
if(!isset($events)) $events = get_sub_field('featured_events');

if(!$events)
{
    $recentEvents = new WP_Query(array (
        'post_type' => 'tribe_events',
        'posts_per_page' => '2',
        'order' => 'ASC'
    ));

    $events = $recentEvents->posts;
}
?>

<div class="module-wrapper">
    <div class="grid event module-padded">
        <?php if($mainHeader): ?>
            <h2 class="main-header outline"><?php echo $mainHeader; ?></h2>
        <?php endif; ?>

        <div class="events">
            <?php foreach($events as $event) : ?>
                <?php include (realpath(dirname(__FILE__)."/../cards/card--event.php")); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
