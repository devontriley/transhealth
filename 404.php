<?php get_header(); ?>
<main id="content" class="template-404">
    <div class="jumbotron hero tertiary module-flush">
        <div class="inner">
            <div class="text-container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>404.</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="module-wrapper rte">
        <div class="module-padded" data-scroll-effect="moduleFadeIn" data-animation-trigger="scroll">

            <div class="row">
                <h2 class="copy">
                    Something is not working like it should. We’ll take a look!
                </h2>

                <!-- TODO: Connect to contact page --> 
                <?php //echo button( get_permalink(398), 'Let Us Know'); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>