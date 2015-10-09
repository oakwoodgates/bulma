<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "Pharmacy",
	"name": "Philippa's Pharmacy",
	"logo": "http://www.example.com/images/logo.png",
	"description": "A superb collection of fine pharmaceuticals for your beauty and healthcare convenience, a department of Delia's Drugstore.",
	"openingHours": "Mo,Tu,We,Th 09:00-12:00",
	"telephone": "+18005551234",
	"faxNumber": "+18005551234",
	"email": "yea@example.com",
	"address" : {
		"@type": "PostalAddress",
			"streetAddress": "Unit 42, Land of Bargains Shopping Paradise, 12 Highway 101",
		//	"postOfficeBoxNumber": "1234",
			"addressLocality": "Boston",
			"addressRegion": "MA",
			"addressCountry": "USA",
			"postalCode": "94043"
	},
	"contactPoint" : [{
		"@type" : "ContactPoint",
		"telephone" : "+1-401-555-1212",
		"contactType" : "customer service",
		"areaServed" : [
			"US",
			"CA"
		],
		"contactOption" : [
			"HearingImpairedSupported",
			"TollFree"
		],
		"availableLanguage" : [
			"English",
			"French"
		]
	}],
	"events" : "http://other-event-site.com/your-event-listing-page/",
	"sameAs" : [
		"http://www.facebook.com/your-profile",
		"http://www.twitter.com/yourProfile",
		"http://plus.google.com/your_profile"
	],
	"url": "http://www.example.com"
}
</script>

if LocalBusiness has department, and the department has a contactPoint, department must also have url
<?php
// some magic here to get the post id, let's call it $id
$id = some_cool_function();
$is_street_or_box = some_cool_function();

$type = get_post_meta( $id, '_jsg4u_general_schema_type', true );
$name = get_post_meta( $id, '_jsg4u_general_name', true );
$logo = get_post_meta( $id, '_jsg4u_general_logo', true );
$desc = get_post_meta( $id, '_jsg4u_general_description', true );
$tele = get_post_meta( $id, '_jsg4u_general_telephone', true );
$fax = get_post_meta( $id, '_jsg4u_general_faxnumber', true );
$url = get_post_meta( $id, '_jsg4u_general_url', true );

// Address
$addr = get_post_meta( $id, '_jsg4u_location_streetaddress', true );
$pobox = get_post_meta( $id, '_jsg4u_location_pobox', true );
$city = get_post_meta( $id, '_jsg4u_location_addresslocality', true );
$state = get_post_meta( $id, '_jsg4u_location_addressregion', true );
$zip = get_post_meta( $id, '_jsg4u_location_postalcode', true );
$country = get_post_meta( $id, '_jsg4u_location_addresscountry', true );

// Social Links
$social = some_cool_function();

function guru_attr( $slug, $context = '', $attr = array()  ) {
	echo guru_get_attr( $slug, $context, $attr );
}
function guru_get_attr( $slug, $context = '', $attr = array() ) {
	$out    = '';
	$attr   = wp_parse_args( $attr, apply_filters( "guru_attr_{$slug}", $context, array() ) );
	if ( empty( $attr ) )
		$attr[$slug] = $context;
	foreach ( $attr as $name => $value )
		$out .= $value ? sprintf( ' "%s":"%s",', esc_html( $name ), esc_attr( $value ) ) : esc_html( " {$name}" );
	return trim( $out );
}

function jspg4u_general_attr( $slug, $id = '', $context = '', $attr = array()  ) {
	jpsg4u_get_general_attr( $slug, $id, $context, $attr );
}
function jpsg4u_get_general_attr( $slug, $id, $context = '', $attr = array() ) {
	$out    = '';
	$attr   = wp_parse_args( $attr, apply_filters( "jspg4u_general_attr_{$slug}", $id, $context, array() ) );

	if ( empty( $attr ) ) {
		$field = '_jsg4u_general_' . $slug;
		$meta = get_post_meta( $id, $field, true );
		$label = ( !empty($context) ? $context : $slug );
		$attr[$label] = $meta;
	}
	foreach ( $attr as $name => $value )
		if ( !empty($value) ){
			$out .= $value ? sprintf( ' "%s":"%s",', esc_html( $name ), esc_attr( $value ) ) : esc_html( " {$name}" );				
		}
	return trim( $out );		

}

?>


<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "Pharmacy",
	"name": "Philippa's Pharmacy",
	"logo": "http://www.example.com/images/logo.png",
	"description": "A superb collection of fine pharmaceuticals for your beauty and healthcare convenience, a department of Delia's Drugstore.",
	"openingHours": "Mo,Tu,We,Th 09:00-12:00",
	"telephone": "+18005551234",
	"faxNumber": "+18005551234",
	"email": "yea@example.com",
	"address" : {
		"@type": "PostalAddress",
			"streetAddress": "Unit 42, Land of Bargains Shopping Paradise, 12 Highway 101",
		//	"postOfficeBoxNumber": "1234",
			"addressLocality": "Boston",
			"addressRegion": "MA",
			"addressCountry": "USA",
			"postalCode": "94043"
	},
	"contactPoint" : [{
		"@type" : "ContactPoint",
		"telephone" : "+1-401-555-1212",
		"contactType" : "customer service",
		"areaServed" : [
			"US",
			"CA"
		],
		"contactOption" : [
			"HearingImpairedSupported",
			"TollFree"
		],
		"availableLanguage" : [
			"English",
			"French"
		]
	}],
	"sameAs" : [
		"http://www.facebook.com/your-profile",
		"http://www.twitter.com/yourProfile",
		"http://plus.google.com/your_profile"
	],
	"url": "http://www.example.com"
}
</script>

// add_filter( 'json_schema_guru_build_contactpoint_content', 'test_mb_filter_it', 25, 3 );
function test_mb_filter_it( $content, $prefix, $cmb ) {
	
	$content =	$cmb->add_field( array(
		'name' => __( 'Days', 'jsg4u' ),
		'id' => $prefix . 'mb_filter',
		'type' => 'multicheck',
		'desc' => __( 'Optional details about the phone number. Currently only these two values are supported.', 'jsg4u' ),
		'options' => array(
			'TollFree' => __( 'Toll Free', 'jsg4u' ),
			'HearingImpairedSupported' => __( 'Hearing Impaired Supported', 'jsg4u' ),
		),			
	) );
return $content;
}


// add_filter( 'jsg4u_attr_general_url', 'jsg4u_attr_general_url_filter', 10, 1 );
function jsg4u_attr_general_url_filter( $id ){
	$attr['class'] = 'sidebar';
	$attr['role']  = 'complementary';

	if ( $label ) {

		$attr['class'] .= " sidebar-{$label}";
		$attr['id']     = "sidebar-{$label}";

	}

	$attr['itemscope'] = 'itemscope';
	$attr['itemtype']  = 'http://schema.org/WPSideBar';
	$data = '_jsg4u_general_name';
	$var = get_post_meta( $id, $data, true );
	$attr['waka']  = $var;
	$yea = '';
		foreach ( $attr as $name => $value )
			$yea .= $value ? sprintf( ' "%s":"%s"', esc_html( $name ), esc_attr( $value ) ) : esc_html( " {$name}" );
	//	return trim( $yea );
	return $attr;

}

// add_filter( 'json_schema_guru_extra_output', 'jsg4u_address_output', 10, 4 );
function jsg4u_address_output( $output ){
	$tid = 162;
	$output = '"address":{"@type":"PostalAddress",';
	if ( get_post_meta( $tid, '_jsg4u_location_street_or_box', true ) != 'pobox' ) {
		$output .= jsg4u_attr( 'location', 'streetaddress', $tid, 'streetAddress' );
	} else {
		$output .= jsg4u_attr( 'location', 'pobox', $tid, 'postOfficeBoxNumber' );		
	}
	$output .= jsg4u_attr( 'location', 'addresslocality', $tid, 'addressLocality' );
	$output .= jsg4u_attr( 'location', 'addressregion', $tid, 'addressRegion' );
	$output .= jsg4u_attr( 'location', 'postalcode', $tid, 'postalCode' );
	$output .= jsg4u_attr( 'location', 'addresscountry', $tid, 'addressCountry', false );
	$output .= '},';

return $output;

}

// add_filter( 'json_schema_guru_secondary_output', 'json_schema_guru_secondary_output_1', 15, 4 );
function json_schema_guru_secondary_output_1( $content, $prefix, $cmb, $group_field_id ) {
	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$tid = 162;
	$type = array( '@type'=>'PostalAddress');
	if ( get_post_meta( $tid, '_jsg4u_location_street_or_box', true ) != 'pobox' ) {
		$addr = jsg4u_array( 'location', 'streetaddress', $tid, 'streetAddress' );
	} else {
		$addr = jsg4u_array( 'location', 'pobox', $tid, 'postOfficeBoxNumber' );		
	}
	$location = jsg4u_array( 'location', 'addresslocality', $tid, 'addressLocality' );
	$region = jsg4u_array( 'location', 'addressregion', $tid, 'addressRegion' );
	$zip = jsg4u_array( 'location', 'postalcode', $tid, 'postalCode' );
	$iso = jsg4u_array( 'location', 'addresscountry', $tid, 'addressCountry', false );
	$content = array_merge($type,$addr,$location,$region,$zip,$iso);
	echo '"address":' . json_encode($content) . ',';
}