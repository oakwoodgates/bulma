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

	if ( $entries ) {
		foreach ( $entries as $key => $entry ) {

		    $organization = $page = '';

		    if ( isset( $entry['jsg_organization'] ) )
		        $jsgid = esc_html( $entry['jsg_organization'] );

		    if ( isset( $entry['output_page'] ) )
		        $page = esc_html( $entry['output_page'] );

			if( is_single( $page ) || is_page( $page ) ) {
				echo do_action('hook_css', $output = '', $jsgid );		    
			}
		}	
	}
	//	echo apply_filters('hook_css', $output = '', $wtf['org'] );
}

add_action('hook_css','hook_css_check', 10, 2);
function hook_css_check( $output, $jsgid ) {
	$var = apply_filters('json_schema_guru_main_output', $content = '', $jsgid);
	echo '<!-- markup -->';
	echo '<script type="application/ld+json">' . json_encode($var, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), "\n" . '</script>';
	echo '<!-- /markup -->';
}
