<?php
if(!$header) $header = get_sub_field('header');
if(!$gradientAccent) $gradientAccent = get_sub_field('gradient_accent');
if(!$staffType) $staffType = get_sub_field('staff_type');
if(!$staffQuery) {
    if($staffType == 'team'){
        $staffQueryOrdered = new WP_Query(array(
            'post_type' => array('leadership', 'clinicians'),
            'meta_key'	=> 'our_team_grid_order',
	        'orderby'	=> 'meta_value',
	        'order'		=> 'ASC',
            'fields'        => 'ids',
            'posts_per_page' => -1
        ));

        $staffQueryUnordered = new WP_Query(array(
            'post_type' => array('leadership', 'clinicians'),
            'post__not_in' => $staffQueryOrdered->posts,
	        'order'		=> 'ASC',
            'fields'        => 'ids',
            'posts_per_page' => -1
        ));

        $staff_ids = array_merge($staffQueryOrdered->posts, $staffQueryUnordered->posts); 

        $staffQuery = new WP_Query(array(
            'post_type' => array('leadership', 'clinicians'),
            'post__in' => $staff_ids,
            'order'		=> 'ASC',
            'orderby' => 'post__in',
            'posts_per_page' => -1
        ));
    } else {
        $staffQuery = new WP_Query(array(
            'post_type' => $staffType,
            'order' => 'ASC',
            'posts_per_page' => -1
        ));
    }
}
if(!$resultCount) $resultCount = $staffQuery->found_posts;
?>

<div id="<?php echo str_replace(' ', '_', strtolower($header)) ?>" class="module-wrapper" data-scroll-effect="">
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