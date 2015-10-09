<?php
add_action( 'cmb2_init', 'json_schema_guru_organization_location_metabox' );
function json_schema_guru_organization_location_metabox() {

	$prefix = '_jsg4u_location_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Location Info', 'jsg4u' ),
		'object_types' => array( 'jsg_organization' ),
		'context'      => 'normal',
		'priority'     => 'default',
		'closed'     => true, // Keep the metabox closed by default
	) );

	apply_filters( 'json_schema_guru_organization_location_content', $content = '', $prefix, $cmb );
}

add_filter( 'json_schema_guru_organization_location_content', 'jsg4u_organization_location_filter', 10, 4 );
function jsg4u_organization_location_filter( $content, $prefix, $cmb ) {
	$content = $cmb->add_field( array(
		'name' => __( 'Street or PO Box', 'jsg4u' ),
		'id' => $prefix . 'street_or_box',
		'type' => 'radio',
		'desc' => __( 'Is your address a street address or a PO box?', 'jsg4u' ),
		'options' => array(
			'street' => __( 'Street Address', 'jsg4u' ),
			'pobox' => __( 'PO Box', 'jsg4u' ),
		),
	) );

	$content .= $cmb->add_field( array(
		'name' => __( 'Street Address', 'jsg4u' ),
		'id' => $prefix . 'streetaddress',
		'type' => 'text_medium',
		'desc' => __( 'description', 'jsg4u' ),
		'attributes' => array(
			'data-conditional-id' => $prefix . 'street_or_box',
			'data-conditional-value' => 'street',
		),
	) );

	$content .= $cmb->add_field( array(
		'name' => __( 'PO Box', 'jsg4u' ),
		'id' => $prefix . 'pobox',
		'type' => 'text_medium',
		'desc' => __( 'description', 'jsg4u' ),
		'attributes' => array(
			'data-conditional-id' => $prefix . 'street_or_box',
			'data-conditional-value' => 'pobox',
		),
	) );

	$content .= $cmb->add_field( array(
		'name' => __( 'City', 'jsg4u' ),
		'id' => $prefix . 'addresslocality',
		'type' => 'text_medium',
		'desc' => __( 'description', 'jsg4u' ),
	) );

	$content .= $cmb->add_field( array(
		'name' => __( 'Region', 'jsg4u' ),
		'id' => $prefix . 'addressregion',
		'type' => 'text_small',
		'desc' => __( 'For US addresses, this is the state.', 'jsg4u' ),
	) );

	$content .= $cmb->add_field( array(
		'name' => __( 'Postal or Zip Code', 'jsg4u' ),
		'id' => $prefix . 'postalcode',
		'type' => 'text_small',
	) );

	$content .= $cmb->add_field( array(
		'name' => __( 'Country', 'jsg4u' ),
		'id' => $prefix . 'addresscountry',
		'type' => 'pw_select',
		'options' => apply_filters( 'json_schema_guru_iso_countries', '' ),			
	) );
return $content;
}