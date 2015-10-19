<?php
add_action( 'cmb2_init', 'json_schema_guru_organization_department_metabox' );
function json_schema_guru_organization_department_metabox() {
// Classic CMB2 declaration
	$prefix = '_jsg4u_department_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Departments', 'jsg4u' ),
		'object_types' => array( 'jsg_organization' ),
		'context'      => 'normal',
		'priority'     => 'default',
		'closed'     => true, // Keep the metabox closed by default
	) );
	$group_field_id = $cmb->add_field( array(
		'id'          => $prefix . 'group',
		'type'        => 'group',
		'description' => __( 'Add Departments to this business', 'jsg4u' ),
		'options'     => array(
			'group_title'   => __( 'Department {#}', 'jsg4u' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Department', 'jsg4u' ),
			'remove_button' => __( 'Delete', 'jsg4u' ),
			'sortable'      => true, // beta
		),
	) );

	apply_filters( 'json_schema_guru_organization_department_content', $content = '', $prefix, $cmb, $group_field_id );
}

add_filter( 'json_schema_guru_organization_department_content', 'jsg4u_organization_department_filter_3', 10, 4 );
function jsg4u_organization_department_filter_3( $content, $prefix, $cmb, $group_field_id ) {
	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$content = $cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Department', 'jsg4u' ),
		'id' => 'dept_post',
		'type' => 'select',
		'show_option_none' => true,
		'desc' => __( 'description', 'jsg4u' ),
		'options' => apply_filters( 'json_schema_guru_dept_posts', '' ),
	) );
return $content;
}
add_filter( 'json_schema_guru_organization_department_content', 'jsg4u_organization_department_filter_2', 10, 4 );
function jsg4u_organization_department_filter_2( $content, $prefix, $cmb, $group_field_id ) {
	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$content = $cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Is the address for this department the same as the address for the organization?', 'jsg4u' ),
		'id' => 'address_same',
		'default' => '0',
		'type' => 'radio',
		'desc' => __( 'For many businesses, the departement address is the same as the main store or organization address.', 'jsg4u' ),
		'options' => array(
			'0' => __( 'Yes, use address from parent organization', 'jsg4u' ),
			'1' => __( 'No, the addresses are different', 'jsg4u' ),
		),
	) );
return $content;
}

add_filter( 'json_schema_guru_dept_posts', 'jsg4u_dept_posts', 1 );
function jsg4u_dept_posts( $content ) {
$content = array();
	$args = array(
		'post_type' => 'jsg_organization',
		);

	$myposts = get_posts( $args );
	foreach ( $myposts as $post ) {
		setup_postdata( $post );
		$content[$post->ID] = $post->post_title;
	}
//	$content = array($out);
	wp_reset_postdata(); 	

	return $content;
}