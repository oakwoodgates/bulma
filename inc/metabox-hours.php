<?php
add_action( 'cmb2_init', 'jsg4u_hours_add_metabox' );
function jsg4u_hours_add_metabox() {

	$prefix = '_jsg4u_hours_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Regular Hours', 'jsg4u' ),
		'object_types' => array( 'jsg_organization' ),
		'context'      => 'normal',
		'priority'     => 'default',
		'closed'     => true, // Keep the metabox closed by default
	) );

	$group_field_id = $cmb->add_field( array(
		'id'          => $prefix . 'openinghours',
		'type'        => 'group',
		'description' => __( 'Generates reusable form entries', 'jsg4u' ),
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'jsg4u' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Set', 'jsg4u' ),
			'remove_button' => __( 'Delete', 'jsg4u' ),
			'sortable'      => true, // beta
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Days', 'jsg4u' ),
		'id' => 'days',
		'type' => 'multicheck',
		'desc' => __( 'description', 'jsg4u' ),
		'options' => array(
			'Mo' => __( 'monday', 'jsg4u' ),
			'Tu' => __( 'tuesday', 'jsg4u' ),
			'We' => __( 'wednesday', 'jsg4u' ),
			'Th' => __( 'thursday', 'jsg4u' ),
			'Fr' => __( 'friday', 'jsg4u' ),
			'Sa' => __( 'saturday', 'jsg4u' ),
			'Su' => __( 'sunday', 'jsg4u' ),
		),
	) );

	$cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Open', 'jsg4u' ),
		'id' => 'open',
		'type' => 'text_time',
	) );

	$cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Close', 'jsg4u' ),
		'id' => 'close',
		'type' => 'text_time',
	) );

}