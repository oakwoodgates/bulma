<?php
add_filter( 'json_schema_guru_main_output', 'jsg4u_context_output', 1, 2 );
function jsg4u_context_output( $content, $jsgid ){

	$content['@context'] = 'http://schema.org';	

	return $content;

}
add_filter( 'json_schema_guru_main_output', 'jsg4u_main_output', 5, 2 );
function jsg4u_main_output( $content, $jsgid ){

	$prefix = '_jsg4u_general_';

//	$content['@context'] = 'http://schema.org';
	$attr = array(
		'@type' => 'schema_type',
		'name' => 'name',
		'logo' => 'logo',
		'telephone' => 'telephone',
		'faxNumber' => 'faxNumber',
		'email' => 'email',
		'url' => 'url',
	);	

	foreach ( $attr as $name => $value ){
		$field = $prefix . $value;
		$meta = get_post_meta( $jsgid, $field, true );
		// let's not output a name unless it has value
		if ( $meta )
		//	$out[$name] = $meta;
			$content[$name] = $meta;
	}
//	$content = array_merge($content,$out);

	return $content;

}

add_filter( 'json_schema_guru_main_output', 'jsg4u_social_url_main_output', 10, 2 );
function jsg4u_social_url_main_output( $content, $jsgid ) {

	if ( get_post_meta( $jsgid, '_jsg4u_social_url', true ) )	
		$content['sameAs'] = get_post_meta( $jsgid, '_jsg4u_social_url', true );

	return $content;
}

add_filter( 'json_schema_guru_main_output', 'jsg4u_address_main_output', 10, 2 );
function jsg4u_address_main_output( $content, $jsgid ) {

	$schema = array( '@type'=>'PostalAddress');	
	$var = jsg4u_build( 'location', 'slug', $jsgid, $attr = array(
			'streetAddress' => 'streetaddress',
			'postOfficeBoxNumber' => 'pobox',
			'addressLocality' => 'addresslocality',
			'addressRegion' => 'addressregion',
			'postalCode' => 'postalcode',
			'addressCountry' => 'addresscountry'
		) );
	if ( $var ) {
		$output = array_merge($schema,$var);
		$content['address'] = $output;
	}
	
	return $content;		

}


add_filter( 'json_schema_guru_main_output', 'jsg4u_opening_hours_main_output', 10, 2 );
function jsg4u_opening_hours_main_output( $content, $jsgid ) {

	if ( get_post_meta( $jsgid, '_jsg4u_hours_openinghours', true ) ) {

		$entries = get_post_meta( $jsgid, '_jsg4u_hours_openinghours', true );
		$var = '';
		foreach ( $entries as $key => $entry ) {

		    $days = $open = $close = '';

		    if ( isset( $entry['days'] ) )
		        $days = $entry['days'];
			$arr = $days;
			reset($arr);

			$string = implode(',', $arr);
		    if ( isset( $entry['open'] ) )
		        $open = esc_html( $entry['open'] );

		    if ( isset( $entry['close'] ) )
		        $close = esc_html( $entry['close'] );

		    $var[] = $string . ' ' . date("H:i", strtotime($open)) . '-' . date("H:i", strtotime($close));    

		}

		$content['openingHours'] = $var;
	}

	return $content;		

}

add_filter( 'json_schema_guru_main_output', 'jsg4u_holiday_hours_main_output', 10, 2 );
function jsg4u_holiday_hours_main_output( $content, $jsgid ) {

	$entries = get_post_meta( $jsgid, '_jsg4u_althours_group', true );
	if ($entries) {
		$out = '';

		foreach ( $entries as $key => $entry ) {

		    $validFrom = $validThrough = $opens = $closes = '';
			$schema = array( '@type'=>'OpeningHoursSpecification');	

		    if ( isset( $entry['datefrom'] ) )
		        $validFrom = esc_html( $entry['datefrom'] );

		    if ( isset( $entry['dateto'] ) )
		        $validThrough = esc_html( $entry['dateto'] );

		    if ( isset( $entry['open'] ) ){
		        $open = esc_html( $entry['open'] );
		    	$opens = date("H:i", strtotime($open));    	
		    }

		    if ( isset( $entry['close'] ) ){
		        $close = esc_html( $entry['close'] );
		    	$closes = date("H:i", strtotime($close));    	
		    }
	
			$var = array(
					'@type'=>'OpeningHoursSpecification',
					'validFrom' => $validFrom,
					'validThrough' => $validThrough,
					'opens' => $opens,
					'closes' => $closes,
				);
	
			$out[] = $var;
		}

		if ( $var )
			$content['openingHoursSpecification'] = $out;	
	}

	return $content;		
}
/*
add_filter( 'json_schema_guru_main_output', 'jsg4u_departments_main_output', 10, 2 );
function jsg4u_departments_main_output( $content, $jsgid ) {

	$entries = get_post_meta( $jsgid, '_jsg4u_department_group', true );
	if ($entries) {
		$out = '';

		foreach ( $entries as $key => $entry ) {	

		    if ( isset( $entry['dept_post'] ) )
		        $dept_id = esc_html( $entry['dept_post'] );

			$var = jsg4u_build( 'general', 'slug', $dept_id, $attr = array(
				'@type' => 'schema_type',
				'name' => 'name',
				'logo' => 'logo',
				'description' => 'description',
				'telephone' => 'telephone',
				'faxNumber' => 'fax',
				'email' => 'email',
				'url' => 'url',
			) );

			$out[] = $var;			
		}

		if ( $var )
			$content['department'] = $out;	 
	}

	return $content;
}
add_filter( 'json_schema_guru_main_output', 'jsg4u_departments_main_output_1', 20, 2 );
function jsg4u_departments_main_output_1( $content, $jsgid ) {
	$prefix = '_jsg4u_general_';
	$entries = get_post_meta( $jsgid, '_jsg4u_department_group', true );
	if ($entries) {
		$out = $var = '';

		foreach ( $entries as $key => $entry ) {	

		    if ( isset( $entry['dept_post'] ) )
		        $dept_id = esc_html( $entry['dept_post'] );
		    $attr = $name = $value = $var = '';
			$attr = array(
				'@type' => 'schema_type',
				'name' => 'name',
				'logo' => 'logo',
				'description' => 'description',
				'telephone' => 'telephone',
				'faxNumber' => 'fax',
				'email' => 'email',
				'url' => 'url',
			);
			foreach ( $attr as $name => $value ){
				$field = $prefix . $value;
				$meta = get_post_meta( $dept_id, $field, true );
				// let's not output a name unless it has value
				if ( $meta )
					$var[$name] = $meta;
			}
			$out[] = $var;			
		}

		if ( $var )
			$content['department'] = $out;	 
	}

	return $content;
}
*/
add_filter( 'json_schema_guru_main_output', 'jsg4u_departments_main_output', 30, 2 );
function jsg4u_departments_main_output( $content, $jsgid ) {

	$entries = get_post_meta( $jsgid, '_jsg4u_department_group', true );
	if ($entries) {
		$out = '';

		foreach ( $entries as $key => $entry ) {	
			$var = '';
		    if ( isset( $entry['dept_post'] ) )
		        $dept_id = esc_html( $entry['dept_post'] );
				$var = apply_filters('jsg4u_dept_output_builder', $dept_content = '', $jsgid, $dept_id, $entry );

			$out[] = $var;	
		}

		if ( $var )
			$content['department'] = $out;	 
	}

	return $content;
}
add_filter( 'jsg4u_dept_output_builder', 'jsg4u_dept_output_builder_1', 10, 4 );
function jsg4u_dept_output_builder_1( $dept_content, $jsgid, $dept_id, $entry ) {
		
	$dept_content = jsg4u_main_output( $dept_content, $dept_id );

	return $dept_content;

}

add_filter( 'jsg4u_dept_output_builder', 'jsg4u_dept_output_builder_2', 20, 4 );
function jsg4u_dept_output_builder_2( $dept_content, $jsgid, $dept_id, $entry ) {

	$prefix = '_jsg4u_general_';
	if ($entry['address_same']){
		$dept_content = jsg4u_address_main_output( $dept_content, $dept_id );

	}
		
	return $dept_content;
}