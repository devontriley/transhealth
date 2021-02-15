<?php

    $id = $post->ID; 
    $title = $post->post_title;
    $link = get_field( 'resource_link', $id );
    $image = get_field( 'image', $id );
?>

<div class="card resource">
    <a target="_BLANK" class="card-cover-link" href="<?php echo $link ?>" aria-label="View Resource: <?php echo $title ?>"></a>
    <div class="card-body row">
        <div class="img-wrapper col-md-4">
            <?php echo imageTag($image, 'img'); ?>
        </div>
        <div class="text-wrapper col-md-8">
            <h3 class="title card-title"><?php echo $title ?></h2>
            <a target="_BLANK" href="<?php echo $link ?>" class="card-link expand btn" aria-label="View Resource: <?php echo $title ?>">
                <span class="learn-more">View Resource</span>
            </a>
        </div>
    </div>
</div>