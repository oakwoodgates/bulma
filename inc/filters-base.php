<?php
function jsg4u_build( $type, $slug, $id = '', $attr = array() ) {
	return jsg4u_get_build( $type, $slug, $id, $attr );
}
function jsg4u_get_build( $type, $slug, $id, $attr = array() ) {
	$attr = wp_parse_args( $attr, apply_filters( "jsg4u_build_{$type}_{$slug}", $id, array() ) );
	$out = '';
	$out = array();
	foreach ( $attr as $name => $value ){
		$field = '_jsg4u_' . $type . '_' . $value;
		$meta = get_post_meta( $id, $field, true );
		// let's not output a name unless it has value
		if ( $meta ) {
			$out[$name] = $meta;
		}
	//	$out[$name] = $meta;	
	}

	return $out;
}

function jsg4u_attr( $type, $slug, $id = '', $label = '', $comma = true, $attr = array() ) {
	return jsg4u_get_attr( $type, $slug, $id, $label, $comma, $attr );
}
function jsg4u_get_attr( $type, $slug, $id, $label, $comma, $attr = array() ) {
	$out    = '';
	$attr   = wp_parse_args( $attr, apply_filters( "jsg4u_attr_{$type}_{$slug}", $id, $label, $comma, array() ) );
	// if we don't send $attr = array() then figure out what we want and do it
	if ( empty( $attr ) ) {
		$field = '_jsg4u_' . $type . '_' . $slug;
		// get_post_meta from _jsg4u_$type_$slug 
		// give cmb2 inputs smart names to start with so it's easy to pull :)
		$meta = get_post_meta( $id, $field, true );
		// for our output of "name":"value"
		// default "name" = $slug, or pass $label
		$name = ( !empty($label) ? $label : $slug );
		$attr[$name] = $meta;
	}
	foreach ( $attr as $name => $value ) {
		// let's not output a name unless it has value
		if ( !empty($value) ){
			// "name":"value"
		//	$out .= '"' . esc_js( $name ) . '":"' . esc_js( $value ) . '"';
			$out .= '"' . esc_js( $name ) . '":';
			$var[] = esc_js( $value );
			$out .= json_encode($var, JSON_PRETTY_PRINT);
			// $comma = true by default, use false for the last item of a data set					
			if ( $comma ) 
				$out .= ',';
		}		
	}

	return $out;

}

function jsg4u_array( $type, $slug, $id = '', $label = '', $comma = true, $attr = array() ) {
	return jsg4u_get_array( $type, $slug, $id, $label, $comma, $attr );
}
function jsg4u_get_array( $type, $slug, $id, $label, $comma, $attr = array() ) {
	$attr   = wp_parse_args( $attr, apply_filters( "jsg4u_array_{$type}_{$slug}", $id, $label, $comma, array() ) );
	// if we don't send $attr = array() then figure out what we want and do it
	if ( empty( $attr ) ) {
		$field = '_jsg4u_' . $type . '_' . $slug;
		// get_post_meta from _jsg4u_$type_$slug 
		// give cmb2 inputs smart names to start with so it's easy to pull :)
		$meta = get_post_meta( $id, $field, true );
		// for our output of "name":"value"
		// default "name" = $slug, or pass $label
		$name = ( !empty($label) ? $label : $slug );
		$attr[$name] = $meta;
	}

	return $attr;

}