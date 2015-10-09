<?php
add_action( 'cmb2_init', 'json_schema_guru_organization_contactpoint_metabox' );
function json_schema_guru_organization_contactpoint_metabox() {
	$prefix = '_jsg4u_contactpoint_relate_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Contact Point', 'jsg4u' ),
		'object_types' => array( 'jsg_organization' ),
		'context'      => 'normal',
		'priority'     => 'default',
		'closed'     => true, // Keep the metabox closed by default
	) );

	$group_field_id = $cmb->add_field( array(
		'id'          => $prefix . 'group',
		'type'        => 'group',
		'description' => __( 'Add Contact Points to this business', 'jsg4u' ),
		'options'     => array(
			'group_title'   => __( 'Contact Point {#}', 'jsg4u' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Contact', 'jsg4u' ),
			'remove_button' => __( 'Delete', 'jsg4u' ),
			'sortable'      => true, // beta
		),
	) );	

	apply_filters( 'json_schema_guru_organization_contactpoint_content', $content = '', $prefix, $cmb, $group_field_id );
	
}

add_filter( 'json_schema_guru_organization_contactpoint_content', 'jsg4u_organization_contactpoint_filter', 10, 4 );
function jsg4u_organization_contactpoint_filter( $content, $prefix, $cmb, $group_field_id ) {
	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$content = $cmb->add_group_field( $group_field_id, array(
	    'name'        => __( 'Contact Point', 'jsg4u' ),
	    'id'          => 'related_post',
	    'type'        => 'post_search_text', // This field type
	    'post_type'   => 'contactpoint',
	    'select_type' => 'radio',
	    'select_behavior' => 'replace',
	) );
return $content;
}

add_action( 'cmb2_init', 'json_schema_guru_contactpoint_general_metabox' );
function json_schema_guru_contactpoint_general_metabox() {

	$prefix = '_jsg4u_contactpoint_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Contact Point', 'jsg4u' ),
		'object_types' => array( 'jsg_contactpoint' ),
		'context'      => 'normal',
		'priority'     => 'default',
	//	'closed'     => true, // Keep the metabox closed by default
	) );

	apply_filters( 'json_schema_guru_contactpoint_general_content', $content = '', $prefix, $cmb );

}

add_filter( 'json_schema_guru_contactpoint_general_content', 'jsg4u_contactpoint_general_filter', 10, 3 );
function jsg4u_contactpoint_general_filter( $content, $prefix, $cmb ) {
	
	$content = $cmb->add_field( array(
		'name' => __( 'Telephone', 'jsg4u' ),
		'id' => $prefix . 'telephone',
		'type' => 'text_medium',
		'attributes' => array(
			'required' => true,			
		),		
	) );

	$content .= $cmb->add_field( array(
		'name' => __( 'Fax', 'jsg4u' ),
		'id' => $prefix . 'faxnumber',
		'type' => 'text_medium',	
	) );

	$content .= $cmb->add_field( array(
		'name' => __( 'Email', 'jsg4u' ),
		'id' => $prefix . 'email',
		'type' => 'text_email',		
	) );

	$content .= $cmb->add_field( array(
		'id' => $prefix . 'contacttype',
		'type' => 'radio',
		'desc' => __( 'description', 'jsg4u' ),
		'options' => array(
			'customer support' => __( 'customer support', 'jsg4u' ),
			'technical support' => __( 'technical support', 'jsg4u' ),
			'billing support' => __( 'billing support', 'jsg4u' ),
			'bill payment' => __( 'bill payment', 'jsg4u' ),
			'sales' => __( 'sales', 'jsg4u' ),
			'reservations' => __( 'reservations', 'jsg4u' ),
			'credit card support' => __( 'credit card support', 'jsg4u' ),
			'emergency' => __( 'emergency', 'jsg4u' ),
			'baggage tracking' => __( 'baggage tracking', 'jsg4u' ),
			'roadside assistance' => __( 'roadside assistance', 'jsg4u' ),
			'package tracking' => __( 'package tracking', 'jsg4u' ),
		),
	) );

	$content .= $cmb->add_field( array(
		'name'    => __( 'Area Served', 'jsg4u' ),
		'id'      => $prefix . 'areaserved',
		'desc'    => __( 'Select countries. Drag to reorder', 'jsg4u' ),
		'type'    => 'pw_multiselect',
		'options' => apply_filters( 'jsg4u_iso_countries', '' ),			
	) );

	$content .= $cmb->add_field( array(
		'name' => __( 'Days', 'jsg4u' ),
		'id' => $prefix . 'contactoption',
		'type' => 'multicheck',
		'desc' => __( 'Optional details about the phone number. Currently only these two values are supported.', 'jsg4u' ),
		'options' => array(
			'TollFree' => __( 'Toll Free', 'jsg4u' ),
			'HearingImpairedSupported' => __( 'Hearing Impaired Supported', 'jsg4u' ),
		),			
	) );

	$content .= $cmb->add_field( array(
		'name' => __( 'Available Language', 'jsg4u' ),
		'desc' => __( 'Optional details about the language spoken. If omitted, the language defaults to English.', 'jsg4u' ),
		'id' => $prefix . 'availablelanguage',
		'type' => 'pw_multiselect',
		'options' => apply_filters( 'json_schema_guru_language_types', '' ),			
	) );

return $content;
}

add_filter( 'json_schema_guru_organization_department_content', 'jsg4u_organization_department_filter_contactpoint', 20, 4 );
function jsg4u_organization_department_filter_contactpoint( $content, $prefix, $cmb, $group_field_id ) {
	// Id's for group's fields only need to be unique for the group. Prefix is not needed.

	$content = $cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Are the contact points for this department the same as the contact points for the organization?', 'jsg4u' ),
		'id' => 'contactpoint_same',
		'type' => 'radio',
		'desc' => __( '', 'jsg4u' ),
		'options' => array(
			'0' => __( 'Yes, inherit contact points from parent organization', 'jsg4u' ),
			'1' => __( 'No, the contact points are different', 'jsg4u' ),
		),
	) );

return $content;
}