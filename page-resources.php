<?php get_header(); ?>

<main id="content">

    <?php

    $components = get_field('components');
    $introCopy = get_field('intro_copy');
    $featuredEducator = get_field('featured_educator_resources');
    $featuredClinician = get_field('featured_clinician_resources');
    $featuredParent = get_field('featured_parent_resources');
    $featuredKids = get_field('featured_kids_resources');
    $featuredAdults = get_field('featured_adults_resources');
    $hero = null;

    foreach($components as $c) :
        if($c['acf_fc_layout'] == 'hero') $hero = $c;
    endforeach;

    $type = $hero['type'];
    $image = $hero['image'];
    $header = $hero['header'];
    $copy = $hero['copy'];

    include(realpath(dirname(__FILE__).'/components/heroes/hero.php'));

    unset($type);
    unset($image);
    unset($header);
    unset($copy);

    $audienceArgs = array(
        'taxonomy' => 'audiences',
        'hide_empty' => false
    );

    $mediaArgs = array(
        'taxonomy' => 'media',
        'hide_empty' => false
    );

    $topicArgs = array(
        'taxonomy' => 'topics',
        'hide_empty' => false
    );

    $audienceTerms = get_terms($audienceArgs);
    $mediaTerms = get_terms($mediaArgs);
    $topicTerms = get_terms($topicArgs);
    
    ?>
    
    <div id="resource-module" class="resources-wrapper module-padded">
        <div class="inner">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filters-container">
                        <p class="header">Refine Resources</p>
                        
                        <div class="taxonomy">
                            <?php if ( !empty($audienceTerms) ) : ?>
                                <p class="name">Audience</p>
                                <?php foreach( $audienceTerms as $term ): ?> 
                                       <div class="option"><label><input type="checkbox" data-tax="audiences" data-term="<?php echo $term->name ?>" /><p><?php echo $term->name ?></p></label></div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="taxonomy">
                            <?php if ( !empty($mediaTerms) ) : ?>
                                <p class="name">Media Type</p>
                                <?php foreach( $mediaTerms as $term ): ?> 
                                       <div class="option"><label><input type="checkbox" data-tax="media" data-term="<?php echo $term->name ?>" /><p><?php echo $term->name ?></p></label></div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="taxonomy">
                            <?php if ( !empty($topicTerms) ) : ?>
                                <p class="name">Topic</p>
                                <?php foreach( $topicTerms as $term ): ?> 
                                       <div class="option"><label><input type="checkbox" data-tax="topics" data-term="<?php echo $term->name ?>" /><p><?php echo $term->name ?></p></label></div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="results-container">
                        <div class="intro-copy">
                            <?php echo $introCopy ?>
                        </div>

                        <div class="featured">
                            <h2 class="featured-header">Featured Resources</h2>

                            <div class="featured-inner">
                                <div class="educator">
                                    <?php if( $featuredEducator ): ?>
                                        <h3>Educator Resources</h3>
                                        <ul>
                                            <?php foreach( $featuredEducator as $post ): ?>
                                                <div class="card-container col-md-12">
                                                    <?php include (realpath(dirname(__FILE__)."/components/cards/card--resource.php")); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                                <div class="clinician">
                                    <?php if( $featuredClinician ): ?>
                                        <h3>Clinician Resources</h3>
                                        <ul>
                                            <?php foreach( $featuredClinician as $post ): ?>
                                                <div class="card-container col-md-12">
                                                    <?php include (realpath(dirname(__FILE__)."/components/cards/card--resource.php")); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                                <div class="parent">
                                    <?php if( $featuredParent ): ?>
                                        <h3>Parent Resources</h3>
                                        <ul>
                                        <?php foreach( $featuredParent as $post ): ?>
                                            <div class="card-container col-md-12">
                                                <?php include (realpath(dirname(__FILE__)."/components/cards/card--resource.php")); ?>
                                            </div>
                                        <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                                <div class="kids">
                                    <?php if( $featuredKids ): ?>
                                        <h3>Kids' Resources</h3>
                                        <ul>
                                        <?php foreach( $featuredKids as $post ): ?>
                                            <div class="card-container col-md-12">
                                                <?php include (realpath(dirname(__FILE__)."/components/cards/card--resource.php")); ?>
                                            </div>
                                        <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                                <div class="adults">
                                    <?php if( $featuredAdults ): ?>
                                        <h3>Adults Resources</h3>
                                        <ul>
                                        <?php foreach( $featuredAdults as $post ): ?>
                                            <div class="card-container col-md-12">
                                                <?php include (realpath(dirname(__FILE__)."/components/cards/card--resource.php")); ?>
                                            </div>
                                        <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>