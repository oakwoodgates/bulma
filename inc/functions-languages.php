<?php
add_filter( 'json_schema_guru_language_types', 'json_schema_guru_default_languages', 1 );
function json_schema_guru_default_languages( $content ) {
	$content = array(
		'English' => __( 'English', 'jsg4u' ),
		'Spanish' => __( 'Spanish', 'jsg4u' ),
		'Mandarin' => __( 'Mandarin', 'jsg4u' ),
		'Hindi' => __( 'Hindi', 'jsg4u' ),
		'Arabic' => __( 'Arabic', 'jsg4u' ),
		'Portuguese' => __( 'Portuguese', 'jsg4u' ),
		'Bengali' => __( 'Bengali', 'jsg4u' ),
		'Russian' => __( 'Russian', 'jsg4u' ),
		'Japanese' => __( 'Japanese', 'jsg4u' ),
		'Chinese' => __( 'Chinese', 'jsg4u' ),
		'Korean' => __( 'Korean', 'jsg4u' ),
		'French' => __( 'French', 'jsg4u' ),
		'German' => __( 'German', 'jsg4u' ),
		'Italian' => __( 'Italian', 'jsg4u' ),
		'Vietnamese' => __( 'Vietnamese', 'jsg4u' ),
		'' => __( '', 'jsg4u' ),
	);	
	return $content;
}

// add_filter( 'json_schema_guru_language_types', 'my_special_languages', 25 );
// function my_special_languages( $content ) {
//	$new = array(
//			'' => __( '', 'jsg4u' ),
//			'' => __( '', 'jsg4u' ),
//		);	
//	return $content = array_merge( $content, $new );
// }