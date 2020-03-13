<?php


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
			'id'    => 'aa_home_featured_image',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Text',
         	'desc'  => '',
			'id'    => 'aa_home_featured_text',
			'type'  => 'text',
			'std'   => '',
			'class' => 'custom-class',
			'clone' => false,
        ),
        array(
			'name'  => 'Sub-Text',
         	'desc'  => '',
			'id'    => 'aa_home_featured_subtext',
			'type'  => 'text',
			'std'   => '',
			'class' => 'custom-class',
			'clone' => false,
        ),
       	array(
			'name'  => 'Link',
         	'desc'  => '',
			'id'    => 'aa_home_featured_link',
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

$meta_boxes[] = array(
    'title'    => 'Altert Message',
    'post_types' => array( 'page' ),
    'context'  => 'normal',
    'priority' => 'high',
    'fields' => array(
		array(
			'name'  => 'Activate Alert box',
			'desc'  => 'Hier kann die Box aktiviert werden',
			'id'    => 'aa_home_alert_message_activate',
			'type'  => 'checkbox',
			'std'   => '',
			'class' => 'custom-class',
			'clone' => false,
		),
		array(
			'name'  => 'Alert-Message',
			'id'    => 'aa_home_alert_message',
			'type'  => 'textarea',
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
				'id'    => 'aa_section_3',
				'type'  => 'wysiwyg',
	        ),
	    ),
	    'only_on'    => array(
			'id'       => array( '130', ),
		),
	);	
	
	$meta_boxes[] = array(
	    'title'    => 'Leitungsteam',
	    'post_types' => array( 'page' ),
	    'context'  => 'normal',
	    'priority' => 'high',
	    'fields' => array(
			array(
				'name'  => 'Leitungsteam HTML',
				'id'    => 'aa_section_leadership',
				'type'  => 'textarea',
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
				'id'    => 'aa_section_5',
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
			'id'    => 'aa_partnerlogo1',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Beschreibung Card 1',
			'id'    => 'aa_partnertext1',
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
			'id'    => 'aa_partnerbild1',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
        array (
			'name'  => 'Logo Card 2',
			'id'    => 'aa_partnerlogo2',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Beschreibung Card 2',
			'id'    => 'aa_partnertext2',
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
			'id'    => 'aa_partnerlogo3',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Beschreibung Card 3',
			'id'    => 'aa_partnertext3',
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
			'id'    => 'aa_partnerlogo4',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Beschreibung Card 4',
			'id'    => 'aa_partnertext4',
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
			'id'    => 'aa_partnerlogo5',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
        array (
			'name'  => 'Bild Card 5',
			'id'    => 'aa_partnerbild5',
			'type'  => 'image_advanced',
			'max_file_uploads' => '1',
			'force_delete' => false,
		),
		array(
			'name'  => 'Beschreibung Card 5',
			'id'    => 'aa_partnertext5',
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
				'id'    => 'aa_authorleader_name',
				'type'  => 'text',
				'class' => 'custom-class',
				'clone' => false,
           	),
           	array(
				'name'  => 'Position',
				'id'    => 'aa_authorleader_position',
				'type'  => 'text',
				'class' => 'custom-class',
				'clone' => false,
           	),
			array (
				'name'  => 'Profilbild (500x500px)',
				'id'    => 'aa_authorleader_image',
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
				'id'    => 'aa_card_description',
				'type'  => 'text',
				'std'   => '',
				'class' => 'custom-class',
				'clone' => false,
           	),
			array (
				'name'  => 'Logo der Gruppe, falls vorhanden',
				'id'    => 'aa_group_logo',
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
				'id'    => 'aa_related_pages',
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
				'id'    => 'aa_contact_get_parameter',
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
				'id'    => 'aa_SubTitle',
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
				'id'    => 'aa_related_posts',
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
        'title'    => 'Text für ARCHE Termine print',
        'post_types' => array( 'events' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
			array (
				'name' => 'Text',
				'desc' => 'Dieser Text darf kein HTML enthalten und ist auf 450 Zeichen begrenzt.',
				'id'   => "aa_event_text_alternative",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 4,
			),
		),
		'validation' => array(
		    'rules'  => array(
		        'aa_event_text_alternative' => array(
		            'maxlength'  => 450,
		        ),
		    ),
		    'messages' => array(
		        'aa_event_text_alternative' => array(
		            'maxlength'  => 'Der Text darf maximal 450 Zeichen haben.',
		        ),
		    )
		),
	);
	
	$meta_boxes[] = array(
        'title'    => 'Designs/Flyer',
        'post_types' => array( 'events' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
			array (
				'name'  => 'Grafiken',
				'id'    => 'aa_event_gx',
				'desc' => 'Hier können Designs oder Flyer hochgeladen werden. Bei zweiseitigen Flyern bitte die Vorderseite auf
							die erste Position schieben.',
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
				'id'         => 'aa_event_start_datetime',
				'type'       => 'datetime',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'showTimepicker' => true,
					'stepMinute' => '5',
					'separator' => ', ',
					'dateFormat' => 'dd.mm.yy',
					'timeFormat' => "HH:mm 'Uhr'",
					'regional' => 'de',
					'defaultValue' => date('d.m.Y, H:i', time()).' Uhr',
				),
			),
            array(
				'name'       => 'Endtermin',
				'id'         => 'aa_event_end_datetime',
				'type'       => 'datetime',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'showTimepicker' => true,
					'stepMinute' => '5',
					'separator' => ', ',
					'dateFormat' => 'dd.mm.yy',
					'timeFormat' => "HH:mm 'Uhr'",
					'regional' => 'de',
					'defaultValue' => date('d.m.Y, H:i', time()).' Uhr', 
				),
			),
			array(
			    'name' => 'Ganztägig',
			    'label_description' => 'Bei ganztägigen Terminen wird nur das Datum angezeigt.',
			    'id'   => 'aa_event_show_date_only',
			    'type' => 'checkbox',
			    'std'  => 0, // 0 or 1
			),
		),
		'validation' => array(
		    'rules'  => array(
		        'aa_event_start_datetime' => array(
		            'required'  => true,
		        ),
		        'aa_event_end_datetime' => array(
		            'required'  => true,
		        ),
		    ),
		    'messages' => array(
		        'aa_event_start_datetime' => array(
		            'required'  => 'Bitte gib ein Starttermin an.',
		        ),
		        'aa_event_end_datetime' => array(
		            'required'  => 'Bitte gib ein Endtermin an.',
		        ),
		    )
		),
	);
	
	$meta_boxes[] = array(	
		'title'    => 'Veröffentlichungsdatum Werbekanäle',
        'post_types' => array( 'events' ),
         'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
				'name'       => 'Datum',
				'id'         => 'aa_event_publishing_start_datetime',
				'desc' => 'Ab diesem Datum wird auf den Kanälen ARCHE Termine print, ARCHE Termine online, Gottesdienst Ansagen und Gottesdienst Präsentation werbung gemacht.',
				'type'       => 'datetime',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'showTimepicker' => false,
					'separator' => ', ',
					'dateFormat' => 'dd.mm.yy',
					'regional' => 'de',
					'defaultValue' => date('d.m.Y', time()).' Uhr',
				),
			),
		),
		'validation' => array(
		    'rules'  => array(
		        'aa_event_publishing_start_datetime' => array(
		            'required'  => true,
		        ),
		    ),
		    'messages' => array(
		        'aa_event_publishing_start_datetime' => array(
		            'required'  => 'Bitte gib ein Starttermin an.',
		        ),
		    )
		),
	);
	
	$meta_boxes[] = array(
        'title'    => 'Location',
        'post_types' => array( 'events' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
			array(
			    'name'        => 'Location',
			    'id'          => 'aa_event_location_location',
			    'type'        => 'text',
			    'placeholder' => 'Z.B. FCG ARCHE Augsburg',
			    'size'        => 30,
			    'datalist'    => array(
			        'options' => array(
			            'FCG ARCHE Augsburg',
			        ),
			    ),
			),
			array(
			    'name'        => 'Straße und Hausnummer',
			    'id'          => 'aa_event_location_street',
			    'type'        => 'text',
			    'placeholder' => 'Z.B. Siegfried-Aufhäuser-Str. 19a',
			    'size'        => 30,
			    'datalist'    => array(
			        'options' => array(
			            'Siegfried-Aufhäuser-Str. 19a',
			        ),
			    ),
			),
			array(
			    'name'        => 'Postleitzahl und Ort',
			    'id'          => 'aa_event_location_city',
			    'type'        => 'text',
			    'placeholder' => 'Z.B. 86157 Augsburg',
			    'size'        => 30,
			    'datalist'    => array(
			        'options' => array(
			            '86157 Augsburg',
			        ),
			    ),
			),
			array(
			    'name'        => 'Zusatzinfo',
			    'id'          => 'aa_event_location_info',
			    'type'        => 'text',
			    'placeholder' => 'Z.B. Kleiner Saal (Raum E10)',
			    'size'        => 30,
			),
		),
		'validation' => array(
		    'rules'  => array(
		        'aa_event_location_location' => array(
		            'required'  => true,
		        ),
		    ),
		    'messages' => array(
		        'aa_event_location_location' => array(
		            'required'  => 'Bitte gib eine Location an.',
		        ),
		    ),
		),
	);
	
// Meta Boxes auf Jobs	
	
	$meta_boxes[] = array(
		'title'    => 'Kurzbeschreibung',
        'post_types' => array( 'jobs' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
        	array(
			'name'  => 'Knappe Beschreibung des Jobs für die Übersicht.',
			'id'    => 'aa_job_desc',
			'type' => 'textarea',
			),
		),
	);
	
	$meta_boxes[] = array(
		'title'    => 'Angaben zum Job',
        'post_types' => array( 'jobs' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
        	array (
				'name'        => 'Geschätzte Stunden Pro Woche',
			    'id'          => 'aa_job_estimated_time',
			    'type'        => 'text',
		    ),
		    array (
				'name'        => 'Leiter',
			    'id'          => 'aa_job_ou_leader',
			    'type'        => 'text',
		    ),
			array (
				'name'  => 'Bild des Leiters',
				'id'    => 'aa_job_ou_leader_image',
				'type'  => 'image_advanced',
				'max_file_uploads' => '1',
				'force_delete' => false,
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
 * Save datetime as timestamp in the database
 */

add_filter( 'rwmb_aa_event_start_datetime_value', function( $value ) {
    return $value ? date_create_from_format('d.m.Y, H:i \U\h\r', $value )->getTimestamp() : '';
} );
add_filter( 'rwmb_aa_event_start_datetime_field_meta', function( $value ) {
    return $value ? date( 'd.m.Y, H:i', $value ).' Uhr' : '';
} );

add_filter( 'rwmb_aa_event_end_datetime_value', function( $value ) {
    return $value ? date_create_from_format('d.m.Y, H:i \U\h\r', $value )->getTimestamp() : '';
} );
add_filter( 'rwmb_aa_event_end_datetime_field_meta', function( $value ) {
    return $value ? date( 'd.m.Y, H:i', $value ).' Uhr' : '';
} );

add_filter( 'rwmb_aa_event_publishing_start_datetime_value', function( $value ) {
    return $value ? date_create_from_format('d.m.Y', $value )->getTimestamp() : '';
} );
add_filter( 'rwmb_aa_event_publishing_start_datetime_field_meta', function( $value ) {
    return $value ? date( 'd.m.Y', $value ) : '';
} );


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
	if (!$post) {
		return false;
	}
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

?>