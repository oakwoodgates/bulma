<?php
add_action( 'json_schema_guru_main_output', 'jsg4u_main_output', 10, 1 );
function jsg4u_main_output( $jsgid ){
//	 $jsgid = 1747;
$content = '';
	//	"@type": "Pharmacy",
	 $content .= jsg4u_attr( 'general', 'schema_type', $jsgid, '@type' );
	//	"name": "Philippa's Pharmacy",
	 $content .= jsg4u_attr( 'general', 'name', $jsgid );
	//	"logo": "http://www.example.com/images/logo.png",
	 $content .= jsg4u_attr( 'general', 'logo', $jsgid );
	//	"description": "A superb collection of fine pharmaceuticals.",
	 $content .= jsg4u_attr( 'general', 'description', $jsgid );
	//	"telephone": "+18005551234",
	 $content .= jsg4u_attr( 'general', 'telephone', $jsgid );
	//	"faxNumber": "+18005551234",
	 $content .= jsg4u_attr( 'general', 'fax', $jsgid, 'faxNumber' );
	//	"email": "yea@example.com",
	 $content .= jsg4u_attr( 'general', 'email', $jsgid );

echo $content;

}

add_action( 'json_schema_guru_secondary_output', 'json_schema_guru_secondary_output_2', 20, 1 );
function json_schema_guru_secondary_output_2( $jsgid ) {
//	$jsgid = 1747;
if ( get_post_meta( $jsgid, '_jsg4u_social_url', true ) )	
	echo '"sameAs":' . json_encode( get_post_meta( $jsgid, '_jsg4u_social_url', true ) ) . ',';
}

add_action( 'json_schema_guru_secondary_output', 'json_schema_guru_secondary_output_3', 25, 1 );
function json_schema_guru_secondary_output_3( $jsgid ) {
//	$jsgid = 1747;
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
		$content = '"address":' . json_encode($output) . ',';
	//	return $content;
	 echo $content;		
	}

}


add_action( 'json_schema_guru_secondary_output', 'jsg4u_opening_hours', 15, 1 );
function jsg4u_opening_hours( $jsgid ) {
//	$jsgid = 1747;
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

		$content = '"openingHours":' . json_encode($var) . ',';
		echo $content;		
	}

}

add_action( 'json_schema_guru_secondary_output', 'jsg4u_holiday_hours', 20, 1 );
function jsg4u_holiday_hours( $jsgid ) {
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
	
			$out[] = $var;;
		}

		if ( $var ) {
		//	$output = array_merge($schema,$var);
			$content = '"openingHoursSpecification":' . json_encode($out) . ',';
		//	return $content;
		 echo $content;		
		}		
	}

}

add_action( 'json_schema_guru_secondary_output', 'jsg4u_departments', 40, 1 );
function jsg4u_departments( $jsgid ) {
	$entries = get_post_meta( $jsgid, '_jsg4u_department_department', true );
	if ($entries) {
		$out = '';

		foreach ( $entries as $key => $entry ) {

//		    $validFrom = $validThrough = $opens = $closes = '';
//			$schema = array( '@type'=>'OpeningHoursSpecification');	

		    if ( isset( $entry['dept_post'] ) )
		        $dept_id = esc_html( $entry['dept_post'] );

/*	
			$var = array(
//		"@type": "Pharmacy",
	 jsg4u_attr( 'general', 'schema_type', $dept_id, '@type' ),
	//	"name": "Philippa's Pharmacy",
	 jsg4u_attr( 'general', 'name', $dept_id ),
	//	"logo": "http://www.example.com/images/logo.png",
	  jsg4u_attr( 'general', 'logo', $dept_id ),
	//	"description": "A superb collection of fine pharmaceuticals.",
	 jsg4u_attr( 'general', 'description', $dept_id ),
	//	"telephone": "+18005551234",
	  jsg4u_attr( 'general', 'telephone', $dept_id ),
	//	"faxNumber": "+18005551234",
	  jsg4u_attr( 'general', 'fax', $dept_id, 'faxNumber' ),
	//	"email": "yea@example.com",
	  jsg4u_attr( 'general', 'email', $dept_id ),
				);
	
			$out[] = $var;
			*/
		//	$schema = array( '@type'=>'PostalAddress');	
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

		if ( $var ) {
		//	$output = array_merge($schema,$var);
			$content = '"department":' . json_encode($out) . ',';
		//	return $content;
		 echo $content;		
		}
	}

}