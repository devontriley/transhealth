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
        'taxonomy' => 'media_type',
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
                        <div class="header-container">
                            <svg viewBox="0 0 12.99 9.349">
                                <g id="Layer_1-2" data-name="Layer 1">
                                    <path d="M2.3,5.105h0a.431.431,0,1,0-.431-.43A.432.432,0,0,0,2.3,5.105Z" fill="none"/>
                                    <path d="M9.767,1.775a.428.428,0,0,0,.428-.428v0a.429.429,0,1,0-.428.43Z" fill="none"/>
                                    <path d="M0,4.221c.007,0,.013,0,.021,0h1.02a1.342,1.342,0,0,1,2.525,0H12.99" fill="none"/>
                                    <path d="M12.99,1.805H11.028a1.342,1.342,0,0,1-2.525,0H.019c-.007,0-.012,0-.019,0" fill="none"/>
                                    <path d="M11.06,7.574a.429.429,0,0,0,0,.858h0a.43.43,0,0,0,0-.859Z" fill="none"/>
                                    <path d="M8.5,1.805a1.342,1.342,0,0,0,2.525,0H12.99V.889H11.028A1.341,1.341,0,0,0,8.5.889L0,.893v.912ZM9.765.917a.428.428,0,0,1,.43.428v0a.429.429,0,1,1-.43-.43Z" fill="#2d3047"/>
                                    <path d="M1.041,5.133a1.343,1.343,0,0,0,2.525,0H12.99V4.217H3.566a1.342,1.342,0,0,0-2.525,0H.021c-.008,0-.014,0-.021,0v.908c.007,0,.013,0,.021,0ZM2.3,4.244a.431.431,0,0,1,0,.861h0a.431.431,0,0,1,0-.861Z" fill="#2d3047"/>
                                    <path d="M10.605,6.737a1.346,1.346,0,0,0-.806.807H.02c-.007,0-.013,0-.02,0v.908c.007,0,.013,0,.02,0H9.8a1.341,1.341,0,0,0,2.525,0h.666V7.544h-.666A1.344,1.344,0,0,0,10.605,6.737Zm.457,1.7h0A.429.429,0,1,1,11.49,8,.428.428,0,0,1,11.062,8.432Z" fill="#2d3047"/>
                                </g>
                            </svg>

                            <p class="header">Refine Resources</p>
                        </div>
                        
                        <div class="taxonomy">
                            <?php if ( !empty($audienceTerms) ) : ?>
                                <p class="name">Audience</p>
                                <?php foreach( $audienceTerms as $term ): ?>
                                    <button data-tax="audiences" data-term="<?php echo $term->name ?>"><?php echo $term->name ?></button>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="taxonomy">
                            <?php if ( !empty($mediaTerms) ) : ?>
                                <p class="name">Media Type</p>
                                <?php foreach( $mediaTerms as $term ): ?> 
                                    <button data-tax="media_type" data-term="<?php echo $term->name ?>"><?php echo $term->name ?></button>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="taxonomy">
                            <?php if ( !empty($topicTerms) ) : ?>
                                <p class="name">Topic</p>
                                <?php foreach( $topicTerms as $term ): ?> 
                                    <button data-tax="topics" data-term="<?php echo $term->name ?>"><?php echo $term->name ?></button>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
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

                        <div id="tax-query-results">
                            <h2 class="results-header"></h2>
                            <div class="results-inner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>