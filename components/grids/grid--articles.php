<?php
    //BLOG GRID PAGE
    if(get_the_id() == 96) 
    {  
        $blogPage = true;

        $args = array(
            'posts_per_page' => 6,
        );
        $posts = get_posts($args);
    }

    // OTHER PAGES WITH GRID OF TWO
    else {
        if(get_sub_field('blog_posts')){
            $postPicker = get_sub_field('blog_posts');
        } elseif(get_field('related_posts')){
            $postPicker = get_field('related_posts');
        }
        
        if($postPicker){
            $posts = $postPicker;

        } else {
            $args = array(
                'posts_per_page' => 3,
            );
            $posts = get_posts($args);
        }
    }
?>

    <?php if ($posts): ?>
        <div class="module-wrapper moduleFadeIn">
            <div class="grid article module-padded">
                <div class="row">
                    <?php foreach($posts as $post): ?>
                        <?php setup_postdata($post); ?>
                        <div class="card-container col-md-4">
                            <?php include (realpath(dirname(__FILE__)."/../cards/card--article.php")); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
        
<?php wp_reset_postdata(); ?>
