<?php

/**
 * Set locale and timezone
 */
setlocale(LC_TIME, "de_DE.utf-8");
date_default_timezone_set('Europe/Berlin');

/**
 * Hide Admin Bar
 */ 
add_filter('show_admin_bar', '__return_false');

function arche_theme_setup (){
	add_theme_support( 'post-thumbnails' ); 
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
}
add_action( 'after_setup_theme', 'arche_theme_setup' );

function login_error_override()
{
    return 'Benutzername oder Passwort nicht korrekt.';
}
add_filter('login_errors', 'login_error_override');

/**
 * Enqueue scripts and styles
 */
function enqueue_styles_and_scripts() {
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri().'/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-improve', get_template_directory_uri().'/css/bootstrap-improve.css' );
	wp_enqueue_style( 'mailchimp', '//cdn-images.mailchimp.com/embedcode/classic-10_7.css' );
	wp_enqueue_style( 'arche-theme', get_stylesheet_uri() );
    wp_enqueue_style( 'backTop', get_template_directory_uri().'/css/backTop.css' );
    wp_enqueue_style( 'simle-likes', get_template_directory_uri().'/css/simple-likes-public.css' );
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles.css' );
    
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700', array(), null );
    wp_enqueue_style( 'rocksalt', 'https://fonts.googleapis.com/css?family=Rock+Salt', array(), null );
    wp_enqueue_style( 'muli', 'https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i', array(), null);
    
    wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
    wp_enqueue_script( 'backTop', get_template_directory_uri() . '/js/backTop.js', array(), '', true );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '', true );
    wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/js/fastclick.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles_and_scripts' );

/**
 * Change login page logo
 */
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/backend-login.css" />';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


/**
 * Create custom type for events
 */
function create_posttype_events() {
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' )
            ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'has_archive' => false,
            'rewrite' => array(
            	'slug' => 'events-termine',
            	'with_front'  => false,
            	),
            'supports' => array('title', 'editor', 'page-attributes',),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-megaphone',
            'show_in_rest'       => true,
      		'rest_base'          => 'events-api',
      		'rest_controller_class' => 'WP_REST_Posts_Controller',
        )
    );
}
add_action( 'init', 'create_posttype_events', 0 );

/**
 * Create taxonomy for events
 */
function create_event_taxonomy() {
    register_taxonomy(
        'Werbekanäle',
        'events',
        array(
            'label' => __( 'Werbekanäle' ),
            'rewrite' => array( 'slug' => 'werbekanaele' ),
            'hierarchical' => true,
        )
    );
}

add_action('init', 'create_event_taxonomy', 0);

/**
 * Create custom type for jobs
 */
function create_posttype_jobs() {
    register_post_type( 'jobs',
        array(
            'labels' => array(
                'name' => __( 'Jobs' ),
                'singular_name' => __( 'Job' )
            ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,

            'has_archive' => false,
            'rewrite' => array(
            	'slug' => 'mitarbeiten',
            	'with_front'  => false,
            	),
            'supports' => array('title', 'editor', 'page-attributes',),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-heart',
            'show_in_rest'       => true,
      		'rest_base'          => 'jobs-api',
      		'rest_controller_class' => 'WP_REST_Posts_Controller',
        )
    );
}
add_action( 'init', 'create_posttype_jobs', 0 );

/**
 * Create taxonomy for jobs
 */
function create_jobs_taxonomy() {
    register_taxonomy(
        'Job-Kategorie',
        'jobs',
        array(
            'label' => __( 'Job-Kategorien' ),
            'rewrite' => array( 'slug' => 'job-kategorien' ),
            'hierarchical' => true,
        )
    );
    
    register_taxonomy(
        'Arbeitsbereich',
        'jobs',
        array(
            'label' => __( 'Arbeitsbereiche' ),
            'rewrite' => array( 'slug' => 'arbeitsbereich' ),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'create_jobs_taxonomy', 0);


/**
 * Jobs filter function
 */
function aa_jobs_loop_and_filter(){
	$args = array(
		'post_type' => 'jobs',
	);
	
	if( ! empty( $_POST['post_per_page'] ) &&  $_POST['post_per_page'] != '') {
        $args['posts_per_page'] = $_POST['post_per_page'];
    }
	
	if( ! empty( $_POST['post_offset'] ) ) {
        $args['offset'] = $_POST['post_offset'];
    }
	
	if( isset( $_POST['category-filter']) && $_POST['category-filter'] != '' ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'Job-Kategorie',
				'field' => 'id',
				'terms' => $_POST['category-filter']
			),
			'relation' => 'AND',
		);
	}
	
	if( isset( $_POST['ou-filter'] ) && $_POST['ou-filter'] != ''){
		$args['tax_query'][] = array(
			array(
				'taxonomy' => 'Arbeitsbereich',
				'field' => 'id',
				'terms' => $_POST['ou-filter']
			)
		);
	}
	
	$count_results = '0';
	$query = new WP_Query( $args );
 
	if( $query->have_posts() ) 
	{
		$count_results = $query->post_count;
		$count_total = $query->found_posts;
		$results_html = '';
        ob_start();
		while( $query->have_posts() )
		{ 
			$query->the_post();
    		include (get_template_directory()."/card-jobs.php");
		}
		$results_html = ob_get_clean();
		wp_reset_postdata();
	}
	else {
		$results_html = "Es wurden keine Einträge gefunden.";
		$count_total = 0;
	}
	
	$response = array();
    array_push ( $response, $results_html, $count_results, $count_total );
    echo json_encode( $response );
	
	die();
}
 
 
add_action('wp_ajax_jobfilter', 'aa_jobs_loop_and_filter'); 
add_action('wp_ajax_nopriv_jobfilter', 'aa_jobs_loop_and_filter');

/**
 * Define meta boxes
 */
include_once( __DIR__ . '/metaboxes.php' );

/**
 * Button shortcode
 */
function button_func( $atts ) {
    $a = shortcode_atts( array(
        'link-text' => '',
        'link' => '',
        'oneline' => '',
    ), $atts );

    return '<a class="btn btn-default '.$a['oneline'].'" href="'.$a['link'].'">'.$a['link-text'].'</a>';
}
add_shortcode( 'button', 'button_func' );


/**
 * Include post-like plugin
 */ 
 include 'post-like.php';
 
 
 /**
 * Add meta_fiels to Rest API response
 */ 
add_action( 'rest_api_init', function () {
	register_rest_field( 
		'events',
		'eventStartDatetime',
		array(
			'get_callback' => 'get_event_startdatetime',
			'update_callback' => null,
			'schema' => array(
    			'description' => __( 'Event start datetime' ),
    			'type'        => 'string'
    		),
    ) );
} );

add_action( 'rest_api_init', function () {
	register_rest_field( 
		'events',
		'eventEndDatetime',
		array(
			'get_callback' => 'get_event_enddatetime',
			'update_callback' => null,
			'schema' => array(
    			'description' => __( 'Event end datetime' ),
    			'type'        => 'string'
    		),
    ) );
} );

add_action( 'rest_api_init', function () {
	register_rest_field( 
		'events',
		'eventArtwork',
		array(
			'get_callback' => 'get_event_artwork',
			'update_callback' => null,
			'schema' => array(
    			'description' => __( 'Event artwork' ),
    			'type'        => 'integer'
    		),
    ) );
} );

function get_event_startdatetime($post, $field_name, $request) {
	return get_post_meta($post['id'], 'aa_event_start_datetime', true );
}

function get_event_enddatetime($post, $field_name, $request) {
	return get_post_meta($post['id'], 'aa_event_end_datetime', true );
}

function get_event_artwork($post, $field_name, $request) {
	return get_post_meta($post['id'], 'aa_event_gx', true );
}

 
 
 /**
 * Disable all other than p, h3, h4 in Editor
 */ 
function aa_disable_block_formats($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4;';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'aa_disable_block_formats');
 
