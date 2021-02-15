<?php
/* Template Name: Event Single Post */

    $id = get_the_ID();
    $featuredImage = get_field('featured_image');
    $date = get_the_date();
    $title = get_the_title();
    $link = get_the_permalink();
    $content = get_post_field('post_content');
?>

<?php get_header(); ?>

<main id="content" class="article-single">
    <div class="jumbotron hero secondary module-flush">
        <div class="row">
            <div class="img-container col-md-6">
                <?php echo imageTag($featuredImage, '', '', '', false) ?>
            </div>

            <div class="text-container col-md-6">
                <div class="inner">
                    <p><?php echo $date ?></p> <!-- TODO: need date and time -->
                    <h1><?php echo $title ?></h1>
                    <!-- LOCATION -->
                    <!-- EVENT COST -->
                    <!-- REFUND POLICY -->

                    <!-- REGISTER BTN -->
                </div>
            </div>
        </div>
    </div>

    <div class="module-wrapper">
        <div class="post-content module-padded">
            <div class="inner">
                <div class="copy"></div>
                    <?php echo apply_filters('the_content', $content); ?>

                    <?php if($tags): ?>
                        <?php include('components/blog/post-tags.php'); ?>
                    <?php endif; ?>
                    
                    <?php include('components/social-share.php'); ?>
                </div>
            </div>
        </div>
    </div>

    <?php include('components/grids/grid--articles.php'); ?>
</main>

<?php get_footer(); ?>