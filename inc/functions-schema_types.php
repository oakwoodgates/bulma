<?php
// function jsg4u_main_schema_type_option() {
//	return apply_filters( 'jsg4u_schema_types', '' );
// }


add_filter( 'json_schema_guru_schema_types', 'json_schema_guru_default_schemas', 1 );
function json_schema_guru_default_schemas( $content ) {
	$content = array(
			'LocalBusiness'  => 'LocalBusiness',
		);	
	return $content;
}

add_filter( 'json_schema_guru_schema_types', 'my_special_order3', 15 );
function my_special_order3( $content ) {
	$new = array(
		'NightClub' => __( 'NightClub', 'jsg4u' ),
		'BarOrPub' => __( 'BarOrPub', 'jsg4u' ),
	);	
	return $content = array_merge( $content, $new );
}