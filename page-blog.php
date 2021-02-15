<?php
/* Template Name: Blog Page */
$count_posts = wp_count_posts();
$published_posts = $count_posts->publish;
$heroTitle = get_field('hero_title');
get_header();
?>

<main id="content" class="blog">
    <div class="module-wrapper blog-hero">
        <div class="blog-header module-padded">
            <h1><?php echo $heroTitle ?></h1>
        </div>
    </div>

    <div class="blog-body">
        <?php include (realpath(dirname(__FILE__)."/components/grids/grid--articles.php")); ?>
    </div>

    <?php if($published_posts > 6): ?>
        <a id="more_posts" href="#">
            Load More Articles
            <!-- TODO: REPLACE GIF -->
            <img class="loading-gif" src="http://localhost/df/wp-content/uploads/2021/01/loading-gif.gif" />
        </a>
    <?php endif; ?>

    <?php include(realpath(dirname(__FILE__)."/components/components.php")); ?>
</main>
<?php get_footer(); ?>