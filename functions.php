<?php 
// LOAD IN HOMEMADE FUNCTIONS
include('includes/button.php');
include('includes/image-tag.php');
include('includes/comments.php');

// SET UP BASIC NAV MENUS IN BACK END
function bones_menu_setup() {
    register_nav_menus( array(
            'main-menu' => esc_html__( 'Main Menu' ),
            'nav-pane-menu' => esc_html__( 'Nav Pane Menu' ),
            'footer-menu-col-1' => esc_html__('Footer Menu Column 1'),
            'footer-menu-col-2' => esc_html__('Footer Menu Column 2')
        )
    );
}
add_action( 'after_setup_theme', 'bones_menu_setup' );

//PREVENT DUPLICATE JQUERY LOAD
function remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset( $scripts->registered['jquery']))
    {
        $script = $scripts->registered['jquery'];

        if($script->deps)
        {
            $script->deps = array_diff( $script->deps, array('jquery-migrate'));
        }
    }
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

//LOAD SCRIPTS 
function bones_load_scripts() {
    wp_enqueue_style( 'main-stylesheet', get_stylesheet_uri(), '', time() );

    //wp_deregister_script( 'wp-embed' );

    wp_enqueue_script( 'main-scripts', get_bloginfo('template_directory') . '/bundle.js', '', time(), true);

    //AJAX PARAMS FOR LOADMORE
    global $wp_query;
    wp_localize_script( 'main-scripts', 'loadmore_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'), // WordPress AJAX
        'posts' => $wp_query->query_vars, // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );
}
add_action( 'wp_enqueue_scripts', 'bones_load_scripts' );

// TAXONOMY FILTERING FOR RESOURCES

function resourceTaxFilter()
{
    $selectedFilters = $_POST['filters'];
    $html = '';
    
    $returnObj = array(
        'html' => '',
        'total' => 0,
        'filters' => $selectedFilters,
        'query_vars' => null
    );

    if($selectedFilters)
    {
        $taxQuery = array(
            'relation' => 'AND'
        );

        foreach($selectedFilters as $key => $value) 
        {
            foreach($value as $v)
            {
                array_push($taxQuery, array(
                    'taxonomy' => $key,
                    'field' => 'slug',
                    'terms' => $v
                ));
            }
        }

        $args = array(
            'orderby' => 'date',
            'post_type' => 'resources',
            'posts_per_page' => -1,
            'tax_query' => $taxQuery
        );

        $query = new WP_Query( $args );

        $returnObj['query_vars'] = $query->query_vars;

        if( $query->have_posts() ) :

            $returnObj['total'] = count($query->posts);

            while( $query->have_posts() ): $query->the_post();
                
                $resource = $query->post;
                $title = $resource->post_title;
                $id = $resource->ID;
                $mediaType = wp_get_post_terms($id, 'media_type');
                $image = (get_field('image', $id)) ? get_field('image', $id) : get_field('resource_media_type_image', 'term_'.$mediaType[0]->term_id);
                $link = get_field('resource_link', $id);
                $tags = wp_get_post_terms($id, array('audiences', 'media_type', 'topics'));
                
                ob_start();
            ?>
                <div class="card-container col-md-12">
                    <div class="card resource">
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
                                <h3 class="title card-title"><?php echo $title ?></h3>
                                <a href="<?php echo $link ?>" class="card-link expand btn" aria-label="View Resource: <?php echo $title ?>">
                                    <span class="learn-more">View Resource</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                $html .= ob_get_clean();
            endwhile;
            wp_reset_postdata();
        endif;

        $returnObj['html'] = $html;
    }

    echo json_encode($returnObj); 

    wp_die();
}
add_action('wp_ajax_get_resources', 'resourceTaxFilter'); 
add_action('wp_ajax_nopriv_get_resources', 'resourceTaxFilter');

// DEFER SCRIPTS
function bones_defer_scripts( $tag, $handle, $src )
{
    $defer = array(
        'main-scripts'
    );

    if ( in_array( $handle, $defer ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'bones_defer_scripts', 10, 3 );

// ALLOW SVG UPLOADS
function bones_mime_types($mimes) {
    $mimes['svg'] = 'image/svg';
    return $mimes;
}
add_filter('upload_mimes', 'bones_mime_types');

//Add acf options page to admin panel!
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
	));
	
}

//Get menu function
function wp_get_menu_array($current_menu) 
{
    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    $submenu = array();

    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['children'] = array();
        }
    }

    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID'] = $m->ID;
            $submenu[$m->ID]['title'] = $m->title;
            $submenu[$m->ID]['url'] = $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }

    return $menu;
}

// CUSTOM POST TYPES
function custom_post_types() 
{
    //LEADERSHIP

    $labels = array(
        'name'                  => _x( 'Leadership', 'Post type general name', 'leadership' ),
        'singular_name'         => _x( 'Leadership', 'Post type singular name', 'leadership' ),
        'menu_name'             => _x( 'Leadership', 'Admin Menu text', 'leadership' ),
        'name_admin_bar'        => _x( 'Leadership', 'Add New on Toolbar', 'leadership' ),
        'add_new'               => __( 'Add New Leadership', 'leadership' ),
        'add_new_item'          => __( 'Add New Leadership', 'leadership' ),
        'new_item'              => __( 'New Leadership', 'leadership' ),
        'edit_item'             => __( 'Edit Leadership', 'leadership' ),
        'view_item'             => __( 'View Leadership', 'leadership' ),
        'all_items'             => __( 'All Leadership', 'leadership' ),
        'search_items'          => __( 'Search Leadership', 'leadership' ),
        'parent_item_colon'     => __( 'Parent Leadership:', 'leadership' ),
        'not_found'             => __( 'No leadership found.', 'leadership' ),
        'not_found_in_trash'    => __( 'No leadership found in Trash.', 'leadership' )
    );     

    $args = array(
        'labels'             => $labels,
        'description'        => 'Leadership custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'leadership' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array(),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-megaphone'
    );
    
    register_post_type( 'Leadership', $args );

    // CLINICIANS

    $labels = array(
        'name'                  => _x( 'Clinicians', 'Post type general name', 'clinician' ),
        'singular_name'         => _x( 'Clinician', 'Post type singular name', 'clinician' ),
        'menu_name'             => _x( 'Clinicians', 'Admin Menu text', 'clinician' ),
        'name_admin_bar'        => _x( 'Clinicians', 'Add New on Toolbar', 'clinician' ),
        'add_new'               => __( 'Add New Clinician', 'clinician' ),
        'add_new_item'          => __( 'Add New Clinician', 'clinician' ),
        'new_item'              => __( 'New Clinician', 'clinician' ),
        'edit_item'             => __( 'Edit Clinician', 'clinician' ),
        'view_item'             => __( 'View Clinician', 'clinician' ),
        'all_items'             => __( 'All Clinicians', 'clinician' ),
        'search_items'          => __( 'Search Clinicians', 'clinician' ),
        'parent_item_colon'     => __( 'Parent Clinician:', 'clinician' ),
        'not_found'             => __( 'No clinicians found.', 'clinician' ),
        'not_found_in_trash'    => __( 'No clinicians found in Trash.', 'clinician' )
    );     

    $args = array(
        'labels'             => $labels,
        'description'        => 'Clinicians custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'clinician' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array(),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-heart'
    );
    
    register_post_type( 'Clinicians', $args );

    // OUR BOARD OF DIRECTORS

    $labels = array(
        'name'                  => _x( 'Board of Directors', 'Post type general name', 'board-member' ),
        'singular_name'         => _x( 'Board Member', 'Post type singular name', 'board-member' ),
        'menu_name'             => _x( 'Board Of Directors', 'Admin Menu text', 'board-member' ),
        'name_admin_bar'        => _x( 'Board of Directors', 'Add New on Toolbar', 'board-member' ),
        'add_new'               => __( 'Add New Board Member', 'board-member' ),
        'add_new_item'          => __( 'Add New Board Member', 'board-member' ),
        'new_item'              => __( 'New Board Member', 'board-member' ),
        'edit_item'             => __( 'Edit Board Member', 'board-member' ),
        'view_item'             => __( 'View Board Member', 'board-member' ),
        'all_items'             => __( 'All Board Members', 'board-member' ),
        'search_items'          => __( 'Search Board Members', 'board-member' ),
        'parent_item_colon'     => __( 'Parent Board Member:', 'board-member' ),
        'not_found'             => __( 'No board members found.', 'board-member' ),
        'not_found_in_trash'    => __( 'No board members found in Trash.', 'board-member' )
    );     

    $args = array(
        'labels'             => $labels,
        'description'        => 'Board of Directors custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'board-member' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array(),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-groups'
    );
    
    register_post_type( 'Board of Directors', $args );

    // RESOURCES

    $labels = array(
        'name'                  => _x( 'Resources', 'Post type general name', 'resource' ),
        'singular_name'         => _x( 'Resource', 'Post type singular name', 'resource' ),
        'menu_name'             => _x( 'Resources', 'Admin Menu text', 'resource' ),
        'name_admin_bar'        => _x( 'Resources', 'Add New on Toolbar', 'resource' ),
        'add_new'               => __( 'Add New Resource', 'resource' ),
        'add_new_item'          => __( 'Add New Resource', 'resource' ),
        'new_item'              => __( 'New Resource', 'resource' ),
        'edit_item'             => __( 'Edit Resource', 'resource' ),
        'view_item'             => __( 'View Resource', 'resource' ),
        'all_items'             => __( 'All Resources', 'resource' ),
        'search_items'          => __( 'Search Resources', 'resource' ),
        'parent_item_colon'     => __( 'Parent Resource:', 'resource' ),
        'not_found'             => __( 'No resources found.', 'resource' ),
        'not_found_in_trash'    => __( 'No resources found in Trash.', 'resource' )
    );     

    $args = array(
        'labels'             => $labels,
        'description'        => 'Resources custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'resource' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array(),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-text-page'
    );
    
    register_post_type( 'Resources', $args );
}
add_action( 'init', 'custom_post_types' );

// CUSTOM TAXONOMIES 
function create_taxonomies() 
{
    $audienceLabels = array(
        'name' => _x( 'Audiences', 'taxonomy general name' ),
        'singular_name' => _x( 'Audience', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Audiences' ),
        'popular_items' => __( 'Popular Audiences' ),
        'all_items' => __( 'All Audiences' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Audience' ), 
        'update_item' => __( 'Update Audience' ),
        'add_new_item' => __( 'Add New Audience' ),
        'new_item_name' => __( 'New Audience Name' ),
        'separate_items_with_commas' => __( 'Separate audiences with commas' ),
        'add_or_remove_items' => __( 'Add or remove audiences' ),
        'choose_from_most_used' => __( 'Choose from the most used audiences' ),
        'menu_name' => __( 'Audiences' ),
    ); 

    register_taxonomy('audiences','resources', array(
        'hierarchical' => false,
        'labels' => $audienceLabels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'audience' ),
    ));


    $mediaLabels = array(
        'name' => _x( 'Media Types', 'taxonomy general name' ),
        'singular_name' => _x( 'Media Type', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Media Types' ),
        'popular_items' => __( 'Popular Media Types' ),
        'all_items' => __( 'All Media Types' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Media Type' ), 
        'update_item' => __( 'Update Media Type' ),
        'add_new_item' => __( 'Add New Media Type' ),
        'new_item_name' => __( 'New Media Type Name' ),
        'separate_items_with_commas' => __( 'Separate media types with commas' ),
        'add_or_remove_items' => __( 'Add or remove media types' ),
        'choose_from_most_used' => __( 'Choose from the most used media types' ),
        'menu_name' => __( 'Media Types' ),
    ); 

    register_taxonomy('media_type','resources',array(
        'hierarchical' => false,
        'labels' => $mediaLabels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'media_type' ),
    ));

    $topicLabels = array(
        'name' => _x( 'Topics', 'taxonomy general name' ),
        'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Topics' ),
        'popular_items' => __( 'Popular Topics' ),
        'all_items' => __( 'All Topics' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Topic' ), 
        'update_item' => __( 'Update Topic' ),
        'add_new_item' => __( 'Add New Topic' ),
        'new_item_name' => __( 'New Topic Name' ),
        'separate_items_with_commas' => __( 'Separate topics with commas' ),
        'add_or_remove_items' => __( 'Add or remove topics' ),
        'choose_from_most_used' => __( 'Choose from the most used topics' ),
        'menu_name' => __( 'Topics' ),
    ); 

    register_taxonomy('topics','resources',array(
        'hierarchical' => false,
        'labels' => $topicLabels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'topic' ),
    ));
}
add_action( 'init', 'create_taxonomies', 0 );

include('includes/google_client.php');
include('includes/google_calendar.php');

?>