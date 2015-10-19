<?php
function jsg4u_outr() {

}
/**
 * Handles output of Google structured data markup
 */
add_action('wp_head','hook_css');
function hook_css() {
//	$details = cmb2_get_option( 'happyhour_options', 'happyhour_location_post' );
	$entries = cmb2_get_option( 'json_schema_guru_options', 'json_schema_guru_related' );

	foreach ( $entries as $key => $entry ) {

	    $organization = $page = '';

	    if ( isset( $entry['jsg_organization'] ) )
	        $jsgid = esc_html( $entry['jsg_organization'] );

	    if ( isset( $entry['output_page'] ) )
	        $page = esc_html( $entry['output_page'] );

		if( is_single( $page ) || is_page( $page ) ) {
			echo apply_filters('hook_css', $output = '', $jsgid );		    
		}
//	$outr = array( 'org' => $jsgid, 'page' => $page );
//	return $outr;
	}
//	$wtf = jsg4u_outr();
//		if( is_page( $wtf['page'] ))
//			echo apply_filters('hook_css', $output = '', $wtf['org'] );	

}
add_filter('hook_css','hook_css_check', 10, 2);
function hook_css_check( $output, $jsgid ) {

// Let's set some variables
// Post for our location settings
// $location_id = cmb2_get_option( 'happyhour_weekly', 'happyhour_weekly_venue_post' );
// Location post content
// $description = json_encode( get_post( $location_id )->post_content );
// Logo from JetPack
// $jsgid = 162;
// $logo = jsg4u_general_attr( "logo", $tid );

echo '<script type="application/ld+json">{
	"@context": "http://schema.org",';
//	$output .= apply_filters( 'json_schema_guru_main_output', $content = '', $jsgid );
//	$output .= apply_filters( 'json_schema_guru_secondary_output', $content = '', $jsgid );

	do_action( 'json_schema_guru_main_output', $jsgid );
	do_action( 'json_schema_guru_secondary_output', $jsgid );
//	Allow devs to add more info
//	echo apply_filters( 'json_schema_guru_extra_output', $output = '' );

//	"url": "http://www.example.com"
//	last bit of data has no comma at the end or it won't verify with google	

echo jsg4u_attr( 'general', 'url', $jsgid, '', false ) . '}</script>';
// return $output;
}
