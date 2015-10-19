<?php
add_action( 'cmb2_init', 'json_schema_guru_general_add_metabox' );
function json_schema_guru_general_add_metabox() {

	$prefix = '_jsg4u_general_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'General Info', 'jsg4u' ),
		'object_types' => array( 'jsg_organization' ),
		'context'      => 'normal',
		'priority'     => 'default',
		'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name' => __( 'Name of Business', 'jsg4u' ),
		'id' => $prefix . 'name',
		'type' => 'text',
		'attributes' => array(
			'required' => true,
		),
	) );

	$cmb->add_field( array(
		'name'    => 'Schema Type',
		'id'      => $prefix . 'schema_type',
		'desc'    => 'From <a href="http://schema.org/docs/full.html#LocalBusiness">click here</a>',
		'type'    => 'select',
		'options' => apply_filters( 'json_schema_guru_schema_types', '' ),
	) );

	$cmb->add_field( array(
		'name' => __( 'Description of Business', 'jsg4u' ),
		'id' => $prefix . 'description',
		'type' => 'textarea',
	) );

	$cmb->add_field( array(
		'name' => __( 'Logo', 'jsg4u' ),
		'id' => $prefix . 'logo',
		'type' => 'file',
		'desc' => __( 'Upload a logo, select an image from the Media Library, or add the url of the image of your logo.', 'jsg4u' ),		
		'options' => array(
        	'url' => true, // show the text input for the url
    	),
	) );

	$cmb->add_field( array(
		'name' => __( 'Main url of business', 'jsg4u' ),
		'id' => $prefix . 'url',
		'type' => 'text_url',
	) );

	$cmb->add_field( array(
		'name' => __( 'Telephone', 'jsg4u' ),
		'id' => $prefix . 'telephone',
		'type' => 'text_small',
	) );

	$cmb->add_field( array(
		'name' => __( 'Fax', 'jsg4u' ),
		'id' => $prefix . 'fax',
		'type' => 'text_small',
	) );	

}