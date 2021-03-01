<?php
    $id = $post->ID;
    $title = $post->post_title;
    $link = get_field( 'resource_link', $id );
    $mediaType = wp_get_post_terms($id, 'media_type');
    $image = (get_field('image', $id)) ? get_field('image', $id) : get_field('resource_media_type_image', 'term_'.$mediaType[0]->term_id);
    $tags = wp_get_post_terms($id, array('audiences', 'media_type', 'topics'));
?>

<div class="card resource" data-scroll-effect="">
    <a target="_BLANK" class="card-cover-link" href="<?php echo $link ?>" aria-label="View Resource: <?php echo $title ?>"></a>
    <div class="card-body row">
        <div class="img-wrapper col-md-4">
            <?php echo imageTag($image, 'img'); ?>
        </div>
        <div class="text-wrapper col-md-8">
            <?php $counter = 0; if($tags) { ?>
                <p class="tags">
                <?php foreach($tags as $t) {
                    echo (!$counter) ? $t->name : ' | ' . $t->name;
                $counter++; } ?>
                </p>
            <?php } ?>
            <h3 class="title card-title"><?php echo $title ?></h2>
            <a href="<?php echo $link ?>" class="card-link expand btn" aria-label="View Resource: <?php echo $title ?>">
                <span class="learn-more">View Resource</span>
            </a>
        </div>
    </div>
</div>