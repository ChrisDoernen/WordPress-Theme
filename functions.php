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
    wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700', array(), null, all );
    wp_enqueue_style( 'rocksalt', 'https://fonts.googleapis.com/css?family=Rock+Salt', array(), null, all );
    wp_enqueue_style( 'muli', 'https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i', array(), null, all);
    
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
function create_posttype() {
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
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes',),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-megaphone',
            'show_in_rest'       => true,
      		'rest_base'          => 'events-api',
      		'rest_controller_class' => 'WP_REST_Posts_Controller',
        )
    );
}
add_action( 'init', 'create_posttype', 0 );

function create_event_taxonomy() {
    register_taxonomy(
        'Anzeigeeinstellungen',
        'events',
        array(
            'label' => __( 'Anzeigeeinstellungen' ),
            'rewrite' => array( 'slug' => 'anzeigeeinstellungen' ),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'create_event_taxonomy');



/**
 * Define meta boxes
 */
add_filter( 'rwmb_meta_boxes', 'YOURPREFIX_register_meta_boxes' );
function YOURPREFIX_register_meta_boxes( $meta_boxes ) {
    $prefix = '';

////////////////////////////////////////// Frontpage Feature
$meta_boxes[] = array(
    'title'    => 'Featured',
    'post_types' => array( 'page' ),
    'context'  => 'normal',
    'priority' => 'high',
    'fields' => array(
		array (
			'name'  => '600x400px',
			'id'    => 'ctdn_home_featured_image',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Text',
         	'desc'  => '',
			'id'    => 'ctdn_home_featured_text',
			'type'  => 'text',
			'std'   => '',
			'class' => 'custom-class',
			'clone' => false,
        ),
        array(
			'name'  => 'Sub-Text',
         	'desc'  => '',
			'id'    => 'ctdn_home_featured_subtext',
			'type'  => 'text',
			'std'   => '',
			'class' => 'custom-class',
			'clone' => false,
        ),
       	array(
			'name'  => 'Link',
         	'desc'  => '',
			'id'    => 'ctdn_home_featured_link',
			'type'  => 'text',
			'std'   => '',
			'class' => 'custom-class',
			'clone' => false,
       	),
    ),
    'only_on'    => array(
		'id'       => array( '5', ),
	),
);	

////////////////////////////////////////// Über uns
$meta_boxes[] = array(
    'title'    => 'Abschnitt 3',
    'post_types' => array( 'page' ),
    'context'  => 'normal',
    'priority' => 'high',
    'fields' => array(
		array(
			'name'  => 'Textbox',
			'id'    => 'ctdn_section_3',
			'type'  => 'wysiwyg',
        ),
    ),
    'only_on'    => array(
		'id'       => array( '130', ),
	),
);	

$meta_boxes[] = array(
    'title'    => 'Abschnitt 5',
    'post_types' => array( 'page' ),
    'context'  => 'normal',
    'priority' => 'high',
    'fields' => array(
		array(
			'name'  => 'Textbox',
			'id'    => 'ctdn_section_5',
			'type'  => 'wysiwyg',
        ),
    ),
    'only_on'    => array(
		'id'       => array( '130', ),
	),
);

////////////////////////////////////////// Helfen und Geben
$meta_boxes[] = array(
    'title'    => 'Cards Projekte und Organisationen',
    'post_types' => array( 'page' ),
    'context'  => 'normal',
    'priority' => 'high',
    'fields' => array(
        array (
			'name'  => 'Logo Card 1',
			'id'    => 'ctdn_partnerlogo1',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Beschreibung Card 1',
			'id'    => 'ctdn_partnertext1',
			'type' => 'WYSIWYG',
			'raw' => 'true',
			'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
        ),
        array (
			'name'  => 'Großes Bild Card 1',
			'id'    => 'ctdn_partnerbild1',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
        array (
			'name'  => 'Logo Card 2',
			'id'    => 'ctdn_partnerlogo2',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Beschreibung Card 2',
			'id'    => 'ctdn_partnertext2',
			'type' => 'WYSIWYG',
			'raw' => 'true',
			'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
        ),
        array (
			'name'  => 'Logo Card 3',
			'id'    => 'ctdn_partnerlogo3',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Beschreibung Card 3',
			'id'    => 'ctdn_partnertext3',
			'type' => 'WYSIWYG',
			'raw' => 'true',
			'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
        ),
        array (
			'name'  => 'Logo Card 4',
			'id'    => 'ctdn_partnerlogo4',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Beschreibung Card 4',
			'id'    => 'ctdn_partnertext4',
			'type' => 'WYSIWYG',
			'raw' => 'true',
			'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
        ),
        array (
			'name'  => 'Logo Card 5',
			'id'    => 'ctdn_partnerlogo5',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
        array (
			'name'  => 'Bild Card 5',
			'id'    => 'ctdn_partnerbild5',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Beschreibung Card 5',
			'id'    => 'ctdn_partnertext5',
			'type' => 'WYSIWYG',
			'raw' => 'true',
			'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
        ),
    ),
    'only_on'    => array(
		'id'       => array( '156', ),
	),
);	


// Autor/Leiter Meta Boxes auf Gruppenseiten
// MetaInfos

$meta_boxes[] = array(
        'title'    => 'Anspechpartner/Leiter',
        'post_types' => array( 'page' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
			array(
				'name'  => 'Name',
				'id'    => 'ctdn_authorleader_name',
				'type'  => 'text',
				'class' => 'custom-class',
				'clone' => false,
           	),
           	array(
				'name'  => 'Position',
				'id'    => 'ctdn_authorleader_position',
				'type'  => 'text',
				'class' => 'custom-class',
				'clone' => false,
           	),
			array (
				'name'  => 'Profilbild (500x500px)',
				'id'    => 'ctdn_authorleader_image',
				'type'  => 'image_advanced',
				'max_file_uploads' => '1',
				'force_delete' => false,
			),
		),
        'only_on'    => array(
			'parent'	=> array('81', '85', ),
			'id' => array( '156' ),
		),
	);
	
	$meta_boxes[] = array(
        'title'    => 'Meta-Infos',
        'post_types' => array( 'page' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
			array(
				'name'  => 'Beschreibung für Cards',
             	'desc'  => '',
				'id'    => 'ctdn_card_description',
				'type'  => 'text',
				'std'   => '',
				'class' => 'custom-class',
				'clone' => false,
           	),
			array (
				'name'  => 'Logo der Gruppe, falls vorhanden',
				'id'    => 'ctdn_group_logo',
				'type'  => 'image_advanced',
				'max_file_uploads' => '1',
				'force_delete' => false,
			),
		),
        'only_on'    => array(
			'parent'	=> array('81', '85', ),
		),
	);
	
	$meta_boxes[] = array(
        'title'    => 'Verwandte Seiten',
        'post_types' => array( 'page' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
			array(
				'name'  => 'Verwandte Seiten, max. 3',
             	'desc'  => '',
				'id'    => 'ctdn_related_pages',
				'type'  => 'text',
				'std'   => '',
				'class' => 'custom-class',
				'clone' => true,
				'max_clone' => 3,
           	),
		),
        'only_on'    => array(
			'parent'	=> array('81', '85', ),
		),
	);
	
	$meta_boxes[] = array(
        'title'    => 'Kontakt-Paramater',
        'post_types' => array( 'page' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
			array(
				'name'  => 'Get-Parameter',
				'id'    => 'ctdn_contact_get_parameter',
				'type'  => 'text',
				'class' => 'custom-class',
				'clone' => false,
           	),
		),
        'only_on'    => array(
			'parent'	=> array('81', '85', ),
		),
	);

// Meta Boxes auf Beitragsseiten

	$meta_boxes[] = array(
        'title'    => 'Untertitel',
        'post_types' => array( 'post' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
			array(
				'name'  => 'Untertitel',
             	'desc'  => '',
				'id'    => 'ctdn_SubTitle',
				'type'  => 'text',
				'std'   => '',
				'class' => 'custom-class',
				'clone' => false,
           	),
		),
	);
	
	$meta_boxes[] = array(
        'title'    => 'Verwandte Beiträge',
        'post_types' => array( 'post' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
			array(
				'name'  => 'Verwandte Beiträge, max. 3',
             	'desc'  => '',
				'id'    => 'ctdn_related_posts',
				'type'  => 'text',
				'std'   => '',
				'class' => 'custom-class',
				'clone' => true,
				'max_clone' => 3,
           	),
		),
        
	);


// Meta Boxes auf Events	
	
	$meta_boxes[] = array(
        'title'    => 'Flyer',
        'post_types' => array( 'events' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
			array (
				'name'  => 'Flyer, erste Datei wird bei Events und Termine angezeigt',
				'id'    => 'ctdn_event_gx',
				'type'  => 'image_advanced',
				'max_file_uploads' => '2',
				'force_delete' => false,
			),
		),
	);
	
	$meta_boxes[] = array(	
		'title'    => 'Datum und Zeit',
        'post_types' => array( 'events' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
				'name'       => 'Starttermin',
				'id'         => 'ctdn_event_start_datetime',
				'type'       => 'datetime',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'showTimepicker' => true,
					'stepMinute' => '5',
					'separator' => ', ',
					'dateFormat' => 'yymmdd',
					'timeFormat' => 'HH:mm',
					'regional' => 'de',
				),
			),
            array(
				'name'       => 'Endtermin',
				'id'         => 'ctdn_event_end_datetime',
				'type'       => 'datetime',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'showTimepicker' => true,
					'stepMinute' => '5',
					'separator' => ', ',
					'dateFormat' => 'yymmdd',
					'timeFormat' => 'HH:mm',
					'regional' => 'de',
				),
			),
			array(
				'name'       => 'Location',
				'id'         => 'ctdn_event_location',
				'type'       => 'text',
			),
		),
	);

	foreach ( $meta_boxes as $k => $meta_box ) {
		if ( isset( $meta_box['only_on'] ) && ! rw_maybe_include( $meta_box['only_on'] ) ) {
			unset( $meta_boxes[ $k ] );
		}
	}

    return $meta_boxes;
}


/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include( $conditions ) {
	// Always include in the frontend to make helper function work
	if ( ! is_admin() ) {
		return true;
	}
	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}
	if ( isset( $_GET['post'] ) ) {
		$post_id = intval( $_GET['post'] );
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = intval( $_POST['post_ID'] );
	} else {
		$post_id = false;
	}
	$post_id = (int) $post_id;
	$post    = get_post( $post_id );
	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}
		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
				break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
				break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
				break;
			case 'category': // Post must be saved or published first
				$categories = get_the_category( $post->ID );
				$catslugs   = array();
				foreach ( $categories as $category ) {
					array_push( $catslugs, $category->slug );
				}
				if ( array_intersect( $catslugs, $v ) ) {
					return true;
				}
				break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) ) {
					return true;
				}
				break;
		} // End switch().
	} // End foreach().
	// If no condition matched
	return false;
}


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
	return get_post_meta($post['id'], 'ctdn_event_start_datetime', true );
}

function get_event_enddatetime($post, $field_name, $request) {
	return get_post_meta($post['id'], 'ctdn_event_end_datetime', true );
}

function get_event_artwork($post, $field_name, $request) {
	return get_post_meta($post['id'], 'ctdn_event_gx', true );
}

 

 
