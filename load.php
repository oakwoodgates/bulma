<?php
/*
Plugin Name: bulma
Description: 
Version: 0.1
Author: OakwoodGates
Author URI: http://www.github.com/oakwoodgates/bulma
License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */
if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

require_once dirname( __FILE__ ) . '/lib/cmb2-conditionals.php';
require_once dirname( __FILE__ ) . '/lib/cmb-field-select2.php';
if (!function_exists('cmb2_post_search_render_field')) {
	require_once dirname( __FILE__ ) . '/lib/cmb2_post_search_field.php';
}
require_once dirname( __FILE__ ) . '/inc/functions-schema_types.php';
require_once dirname( __FILE__ ) . '/inc/functions-iso_countries.php';
require_once dirname( __FILE__ ) . '/inc/functions-languages.php';

require_once dirname( __FILE__ ) . '/inc/filters-base.php';
require_once dirname( __FILE__ ) . '/inc/filters.php';

require_once dirname( __FILE__ ) . '/inc/options.php';

require_once dirname( __FILE__ ) . '/inc/metabox-general.php';
require_once dirname( __FILE__ ) . '/inc/metabox-location.php';
require_once dirname( __FILE__ ) . '/inc/metabox-hours.php';

// Holiday Hours
require_once dirname( __FILE__ ) . '/inc/metabox-althours.php';

// Social Profile Links
require_once dirname( __FILE__ ) . '/inc/metabox-social.php';

// Corporate Contact Points
require_once dirname( __FILE__ ) . '/inc/metabox-contactpoint.php';

// Multiple Departments
require_once dirname( __FILE__ ) . '/inc/metabox-departments.php';


// Badda bing, badda boom
require_once dirname( __FILE__ ) . '/inc/output.php';

add_action( 'init', 'json_schema_guru_init' );
function json_schema_guru_init() {
	$args = array(
//		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => false,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui'            => true,
		'show_in_nav_menus'	=> false,
		'show_in_menu'       => 'json_schema_guru_options',
//		'query_var'          => true,
//		'rewrite'            => array( 'slug' => 'book' ),
//		'capability_type'    => 'post',
//		'has_archive'        => false,
		'hierarchical'       => false,
//		'menu_position'      => null,
		'supports' => array( 'title' ),
		'label'  => 'Organizations'
	);
	register_post_type( 'jsg_organization', $args );
}

add_action( 'init', 'codex_custom_init1' );
function codex_custom_init1() {
	$args = array(
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => 'json_schema_guru_options',
		'hierarchical' => true,
		'supports' => array( 'title' ),
		'label'  => 'Contact Points'
	);
	register_post_type( 'jsg_contactpoint', $args );
}
/*
add_action( 'init', 'create_book_taxonomies', 0 );
function create_book_taxonomies() {
	$args = array(
		'public' => true,
		'show_ui' => true,		
		'hierarchical'      => true,
		'label'            =>  'Genre',
	//	'show_in_menu' => 'myprefix_options',		
	);

	register_taxonomy( 'genre', array( 'location' ), $args );

}
add_action('admin_menu', 'register_my_custom_submenu_page');
function register_my_custom_submenu_page() {
  
add_submenu_page( 
			'myprefix_options', 
			__( 'Shipping Classes', 'woocommerce' ), 
			__( 'Shipping Classes', 'woocommerce' ), 
			'manage_product_terms', 
			'edit-tags.php?taxonomy=genre&post_type=location'
    );

}
*/