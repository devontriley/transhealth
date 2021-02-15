<?php
if(!$header) $header = get_sub_field('header');
if(!$gradientAccent) $gradientAccent = get_sub_field('gradient_accent');
if(!$staffType) $staffType = get_sub_field('staff_type');
if(!$staffQuery) {
    $staffQuery = new WP_Query(array(
        'post_type' => $staffType,
        'order' => 'ASC'
    ));
}
if(!$resultCount) $resultCount = $staffQuery->found_posts;
?>

<div class="module-wrapper">
    <div class="grid staff module-padded <?php if($gradientAccent){ echo 'sunburst'; } ?>">
        <?php if($header): ?>
            <h2><?php echo $header; ?></h2>
        <?php endif; ?>

        <?php if($staffQuery->have_posts()): ?>
            <div class="row">
                <?php $counter = 0; while($staffQuery->have_posts()): ?>
                    <?php $staffQuery->the_post(); ?>
                    <div class="card-container col-lg-5 <?php if($counter % 2 == 0){ echo 'offset-lg-1'; }?>">
                        <?php include (realpath(dirname(__FILE__)."/../cards/card--staff.php")); ?>
                    </div>
                <?php $counter++; endwhile; ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>

<?php
unset($header);
unset($gradientAccent);
unset($staffType);
unset($args);
unset($staffQuery);
unset($resultCount);
?>