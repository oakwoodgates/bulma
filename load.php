<?php
/*
Plugin Name: bulma
Description: 
Version: 2.1
Author: OakwoodGates
Author URI: http://www.github.com/oakwoodgates/bulma
Plugin URI: http://wc2bp.wpguru4u.com
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
require_once dirname( __FILE__ ) . '/inc/filters-1.php';

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
require_once dirname( __FILE__ ) . '/inc/output-1.php';

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

// add_filter( 'tribe_google_data_markup_json', 'jsg4u_ecjacker', 10 );
function jsg4u_ecjacker(){
	$html = '';
	return $html;
//	return false;
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

if ( get_option( 'api_manager_example_activated' ) != 'Activated' ) {
    add_action( 'admin_notices', 'API_Manager_Example::am_example_inactive_notice' );
}

class API_Manager_Example {

	/**
	 * Self Upgrade Values
	 */
	// Base URL to the remote upgrade API server
	public $upgrade_url = 'http://wc2bp.wpguru4u.com/'; // URL to access the Update API Manager.

	/**
	 * @var string
	 */
	public $version = '2.1';

	/**
	 * @var string
	 * This version is saved after an upgrade to compare this db version to $version
	 */
	public $api_manager_example_version_name = 'plugin_api_manager_example_version';

	/**
	 * @var string
	 */
	public $plugin_url;

	/**
	 * @var string
	 * used to defined localization for translation, but a string literal is preferred
	 *
	 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/issues/59
	 * http://markjaquith.wordpress.com/2011/10/06/translating-wordpress-plugins-and-themes-dont-get-clever/
	 * http://ottopress.com/2012/internationalization-youre-probably-doing-it-wrong/
	 */
	public $text_domain = 'api-manager-example';

	/**
	 * Data defaults
	 * @var mixed
	 */
	private $ame_software_product_id;

	public $ame_data_key;
	public $ame_api_key;
	public $ame_activation_email;
	public $ame_product_id_key;
	public $ame_instance_key;
	public $ame_deactivate_checkbox_key;
	public $ame_activated_key;

	public $ame_deactivate_checkbox;
	public $ame_activation_tab_key;
	public $ame_deactivation_tab_key;
	public $ame_settings_menu_title;
	public $ame_settings_title;
	public $ame_menu_tab_activation_title;
	public $ame_menu_tab_deactivation_title;

	public $ame_options;
	public $ame_plugin_name;
	public $ame_product_id;
	public $ame_renew_license_url;
	public $ame_instance_id;
	public $ame_domain;
	public $ame_software_version;
	public $ame_plugin_or_theme;

	public $ame_update_version;

	public $ame_update_check = 'am_example_plugin_update_check';

	/**
	 * Used to send any extra information.
	 * @var mixed array, object, string, etc.
	 */
	public $ame_extra;

    /**
     * @var The single instance of the class
     */
    protected static $_instance = null;

    public static function instance() {

        if ( is_null( self::$_instance ) )
            self::$_instance = new self();

        return self::$_instance;
    }

	public function __construct() {

		// Run the activation function
		register_activation_hook( __FILE__, array( $this, 'activation' ) );

		// Ready for translation
		load_plugin_textdomain( $this->text_domain, false, dirname( untrailingslashit( plugin_basename( __FILE__ ) ) ) . '/languages' );

		if ( is_admin() ) {

			/**
			 * Software Product ID is the product title string
			 * This value must be unique, and it must match the API tab for the product in WooCommerce
			 */
			$this->ame_software_product_id = __('bulma', 'api-manager-example');

			/**
			 * Set all data defaults here
			 */
			$this->ame_data_key 				= 'api_manager_example';
			$this->ame_api_key 					= 'api_key';
			$this->ame_activation_email 		= 'activation_email';
			$this->ame_product_id_key 			= 'api_manager_example_product_id';
			$this->ame_instance_key 			= 'api_manager_example_instance';
			$this->ame_deactivate_checkbox_key 	= 'api_manager_example_deactivate_checkbox';
			$this->ame_activated_key 			= 'api_manager_example_activated';

			/**
			 * Set all admin menu data
			 */
			$this->ame_deactivate_checkbox 			= 'am_deactivate_example_checkbox';
			$this->ame_activation_tab_key 			= 'api_manager_example_dashboard';
			$this->ame_deactivation_tab_key 		= 'api_manager_example_deactivation';
			$this->ame_settings_menu_title 			= 'API Manager Example';
			$this->ame_settings_title 				= 'API Manager Example';
			$this->ame_menu_tab_activation_title 	= __('License Activation', 'api-manager-example');
			$this->ame_menu_tab_deactivation_title 	= __('License Deactivation', 'api-manager-example');

			/**
			 * Set all software update data here
			 */
			$this->ame_options 				= get_option( $this->ame_data_key );
			$this->ame_plugin_name 			= untrailingslashit( plugin_basename( __FILE__ ) ); // same as plugin slug. if a theme use a theme name like 'twentyeleven'
			$this->ame_product_id 			= get_option( $this->ame_product_id_key ); // Software Title
			$this->ame_renew_license_url 	= 'http://wc2bp.wpguru4u.com/'; // URL to renew a license
			$this->ame_instance_id 			= get_option( $this->ame_instance_key ); // Instance ID (unique to each blog activation)
			$this->ame_domain 				= site_url(); // blog domain name
			$this->ame_software_version 	= $this->version; // The software version
			$this->ame_plugin_or_theme 		= 'plugin'; // 'theme' or 'plugin'

			// Performs activations and deactivations of API License Keys
			require_once( plugin_dir_path( __FILE__ ) . 'am/classes/class-wc-key-api.php' );
			$this->api_manager_example_key = new Api_Manager_Example_Key();

			// Checks for software updatess
			require_once( plugin_dir_path( __FILE__ ) . 'am/classes/class-wc-plugin-update.php' );

			// Admin menu with the license key and license email form
			require_once( plugin_dir_path( __FILE__ ) . 'am/admin/class-wc-api-manager-menu.php' );

			$options = get_option( $this->ame_data_key );

			/**
			 * Check for software updates
			 */
			if ( ! empty( $options ) && $options !== false ) {

				new API_Manager_Example_Update_API_Check(
					$this->upgrade_url,
					$this->ame_plugin_name,
					$this->ame_product_id,
					$this->ame_options[$this->ame_api_key],
					$this->ame_options[$this->ame_activation_email],
					$this->ame_renew_license_url,
					$this->ame_instance_id,
					$this->ame_domain,
					$this->ame_software_version,
					$this->ame_plugin_or_theme,
					$this->text_domain
					);

			}

		}

		/**
		 * Deletes all data if plugin deactivated
		 */
		register_deactivation_hook( __FILE__, array( $this, 'uninstall' ) );

	}

	public function plugin_url() {
		if ( isset( $this->plugin_url ) ) return $this->plugin_url;
		return $this->plugin_url = plugins_url( '/', __FILE__ );
	}

	/**
	 * Generate the default data arrays
	 */
	public function activation() {
		global $wpdb;

		$global_options = array(
			$this->ame_api_key 			=> '',
			$this->ame_activation_email 	=> '',
					);

		update_option( $this->ame_data_key, $global_options );

		require_once( plugin_dir_path( __FILE__ ) . 'am/classes/class-wc-api-manager-passwords.php' );

		$API_Manager_Example_Password_Management = new API_Manager_Example_Password_Management();

		// Generate a unique installation $instance id
		$instance = $API_Manager_Example_Password_Management->generate_password( 12, false );

		$single_options = array(
			$this->ame_product_id_key 			=> $this->ame_software_product_id,
			$this->ame_instance_key 			=> $instance,
			$this->ame_deactivate_checkbox_key 	=> 'on',
			$this->ame_activated_key 			=> 'Deactivated',
			);

		foreach ( $single_options as $key => $value ) {
			update_option( $key, $value );
		}

		$curr_ver = get_option( $this->api_manager_example_version_name );

		// checks if the current plugin version is lower than the version being installed
		if ( version_compare( $this->version, $curr_ver, '>' ) ) {
			// update the version
			update_option( $this->api_manager_example_version_name, $this->version );
		}

	}

	/**
	 * Deletes all data if plugin deactivated
	 * @return void
	 */
	public function uninstall() {
		global $wpdb, $blog_id;

		$this->license_key_deactivation();

		// Remove options
		if ( is_multisite() ) {

			switch_to_blog( $blog_id );

			foreach ( array(
					$this->ame_data_key,
					$this->ame_product_id_key,
					$this->ame_instance_key,
					$this->ame_deactivate_checkbox_key,
					$this->ame_activated_key,
					) as $option) {

					delete_option( $option );

					}

			restore_current_blog();

		} else {

			foreach ( array(
					$this->ame_data_key,
					$this->ame_product_id_key,
					$this->ame_instance_key,
					$this->ame_deactivate_checkbox_key,
					$this->ame_activated_key
					) as $option) {

					delete_option( $option );

					}

		}

	}

	/**
	 * Deactivates the license on the API server
	 * @return void
	 */
	public function license_key_deactivation() {

		$activation_status = get_option( $this->ame_activated_key );

		$api_email = $this->ame_options[$this->ame_activation_email];
		$api_key = $this->ame_options[$this->ame_api_key];

		$args = array(
			'email' => $api_email,
			'licence_key' => $api_key,
			);

		if ( $activation_status == 'Activated' && $api_key != '' && $api_email != '' ) {
			$this->api_manager_example_key->deactivate( $args ); // reset license key activation
		}
	}

    /**
     * Displays an inactive notice when the software is inactive.
     */
	public static function am_example_inactive_notice() { ?>
		<?php if ( ! current_user_can( 'manage_options' ) ) return; ?>
		<?php if ( isset( $_GET['page'] ) && 'api_manager_example_dashboard' == $_GET['page'] ) return; ?>
		<div id="message" class="error">
			<p><?php printf( __( 'The API Manager Example API License Key has not been activated, so the plugin is inactive! %sClick here%s to activate the license key and the plugin.', 'api-manager-example' ), '<a href="' . esc_url( admin_url( 'options-general.php?page=api_manager_example_dashboard' ) ) . '">', '</a>' ); ?></p>
		</div>
		<?php
	}

} // End of class

function AME() {
    return API_Manager_Example::instance();
}

// Initialize the class instance only once
AME();














add_action( 'cmb2_init', 'cmb2_add_metabox' );
function cmb2_add_metabox() {

	$prefix = '_cmb_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Metabox Title', 'cmb2' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(

	) );

$group_field_id = $cmb->add_field( array(
    'id'          => 'wiki_test_repeat_group',
    'type'        => 'group',
    'description' => __( 'Generates reusable form entries', 'cmb' ),
    'options'     => array(
        'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add Another Entry', 'cmb' ),
        'remove_button' => __( 'Remove Entry', 'cmb' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
    ),
) );

// Id's for group's fields only need to be unique for the group. Prefix is not needed.

$cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Type', 'cmb2' ),
		'id' => $prefix . 'type',
		'type' => 'radio',
		'options' => array(
			'a' => __( 'a', 'cmb2' ),
			'b' => __( 'b', 'cmb2' ),
			'c' => __( 'c', 'cmb2' ),
		),
) );

$cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Thing', 'cmb2' ),
		'id' => $prefix . 'thing',
		'type' => 'select',
	    'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)		
		'options' => array(
			'one' => __( 'one', 'cmb2' ),
			'two' => __( 'two', 'cmb2' ),
			'three' => __( 'three', 'cmb2' ),
		),
) );

}