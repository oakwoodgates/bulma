<?php
add_action( 'cmb2_init', 'json_schema_guru_organization_althours_metabox' );
function json_schema_guru_organization_althours_metabox() {

	$prefix = '_jsg4u_althours_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Holiday or Alternative Hours', 'jsg4u' ),
		'object_types' => array( 'jsg_organization' ),
		'context'      => 'normal',
		'priority'     => 'default',
		'closed'     => true, // Keep the metabox closed by default
	) );

	$group_field_id = $cmb->add_field( array(
		'id'          => $prefix . 'group',
		'type'        => 'group',
		'description' => __( 'Generates reusable form entries', 'cmb' ),
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'jsg4u' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Set', 'jsg4u' ),
			'remove_button' => __( 'Delete', 'jsg4u' ),
			'sortable'      => true, // beta
		),
	) );
		$cmb->add_group_field( $group_field_id, array(
			'name' => __( 'Date from', 'jsg4u' ),
			'id' => 'datefrom',
			'type' => 'text_date',
		) );

		$cmb->add_group_field( $group_field_id, array(
			'name' => __( 'Date until', 'jsg4u' ),
			'id' => 'dateto',
			'type' => 'text_date',
		) );

		$cmb->add_group_field( $group_field_id, array(
			'name' => __( 'Open Time', 'jsg4u' ),
			'id' => 'open',
			'type' => 'text_time',
		//	'time_format' => 'c'
		) );

		$cmb->add_group_field( $group_field_id, array(
			'name' => __( 'Close Time', 'jsg4u' ),
			'id' => 'close',
			'type' => 'text_time',
		//	'time_format' => 'c'

		) );
	apply_filters( 'json_schema_guru_organization_althours_content', $content = '', $prefix, $cmb, $group_field_id );
}

// add_filter( 'json_schema_guru_organization_althours_content', 'jsg4u_organization_althours_filter_start_time', 10, 4 );
function jsg4u_organization_althours_filter_start_time( $content, $prefix, $cmb, $group_field_id ) {
	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$content = $cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Start Date and Time', 'jsg4u' ),
		'id' => 'start',
		'type' => 'text_datetime_timestamp',
	) );
return $content;
}
// add_filter( 'json_schema_guru_organization_althours_content', 'jsg4u_organization_althours_filter_2', 10, 4 );
function jsg4u_organization_althours_filter_2( $content, $prefix, $cmb, $group_field_id ) {
	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$content = $cmb->add_group_field( $group_field_id, array(
		'name' => __( 'End Date and Time', 'jsg4u' ),
		'id' => 'end',
		'type' => 'text_datetime_timestamp',
	) );
return $content;
}