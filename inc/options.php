<?php
/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class JSON_Schema_Guru_Admin {

	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	private $key = 'json_schema_guru_options';

	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	private $metabox_id = 'json_schema_guru_option_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	public function __construct() {
		// Set our title
		$this->title = __( 'JSON Schema', 'jsg4u' );
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_init', array( $this, 'add_options_page_metabox' ) );
	}


	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
	//	$this->options_page = add_submenu_page( 'edit.php?post_type=location', $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
		$this->options_subpage = add_submenu_page( 'json_schema_guru_options', $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );

		// Include CMB CSS in the head to avoid FOUT
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
		</div>
		<?php
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {

		$cmb = new_cmb2_box( array(
			'id'         => $this->metabox_id,
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );

		$group_field_id = $cmb->add_field( array(
		    'id'          => 'json_schema_guru_related',
		    'type'        => 'group',
		    'description' => __( 'Generates reusable form entries', 'jsg4u' ),
		    'options'     => array(
		        'group_title'   => __( 'Output #{#}', 'jsg4u' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Output', 'jsg4u' ),
		        'remove_button' => __( 'Delete', 'jsg4u' ),
		        'sortable'      => false, // beta
		    ),
		) );

		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$cmb->add_group_field( $group_field_id, array(
		    'name'        => __( 'Select an Organization', 'jsg4u' ),
		    'id'          => 'jsg_organization',
		    'type'        => 'post_search_text',
		    'post_type'   => 'jsg_organization',
		    'select_type' => 'radio',
		    'select_behavior' => 'replace',
		) );

		$cmb->add_group_field( $group_field_id, array(
		    'name'        => __( 'Page to output schema data', 'jsg4u' ),
		    'id'          => 'output_page',
		    'type'        => 'post_search_text',
		    'post_type'   => 'page',
		    'select_type' => 'radio',
		    'select_behavior' => 'replace',
		) );

	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

/**
 * Helper function to get/return the Myprefix_Admin object
 * @since  0.1.0
 * @return Myprefix_Admin object
 */
function json_schema_guru_admin() {
	static $object = null;
	if ( is_null( $object ) ) {
		$object = new JSON_Schema_Guru_Admin();
		$object->hooks();
	}

	return $object;
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function json_schema_guru_get_option( $key = '' ) {
	return cmb2_get_option( json_schema_guru_admin()->key, $key );
}

// Get it started
json_schema_guru_admin();