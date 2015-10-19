<?php
add_action( 'cmb2_init', 'jsg4u_social_add_metabox' );
function jsg4u_social_add_metabox() {

	$prefix = '_jsg4u_social_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Social Links', 'jsg4u' ),
		'object_types' => array( 'jsg_organization' ),
		'context'      => 'normal',
		'priority'     => 'default',
		 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name' => __( 'Social Link', 'jsg4u' ),
		'id' => $prefix . 'url',
		'type' => 'text_url',
		'desc' => __( 'Enter a link to the social profile for this business. Please note: while Google recommends adding any of your profiles, it currently only supports Facebook, Twitter, Google+, Instagram, YouTube, LinkedIn, Myspace, Pinterest, SoundCloud, and Tumblr in the search results. It may also be a good idea to add links from authority websites such as Wikipedia, etc.', 'jsg4u' ),
		'repeatable'      => true,
		'options' => array(
			'add_row_text'    => __( 'Add Another Link', 'jsg4u' ),
		)
	) );	
}