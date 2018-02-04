<?php
/**
 * This function will create custom metaboxes into post page.
 */
function flexia_core_register_post_metaboxs() {
    $prefix = '_flexia_post_meta_key_';

    /**
     * Flexia Post Metaboxes
     */
    $cmb_post = new_cmb2_box(array(
        'id' => $prefix . 'metaboxs',
        'title' => esc_html__('Flexia Post Settings', 'flexia_core'),
        'object_types' => array('post'), // Post type
        'priority' => 'high',
    ));
    /**
     * Additional Body Class
     */
    $cmb_post->add_field(array(
        'name' => esc_html__('Additional Body Class', 'flexia_core'),
        'desc' => esc_html__('Add an extra class to body for this post.', 'flexia_core'),
        'id' => $prefix . 'body_class',
        'type' => 'text',
    ));
    /**
     * Post Page Title
     */
    $cmb_post->add_field( array(
		'name'             => esc_html__( 'Post Layout', 'flexia_core' ),
		'desc'             => esc_html__( 'Set individual layout for this post.', 'flexia_core' ),
		'id'               => $prefix . 'page_title',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'default' 	=> esc_html__( 'Default (from Customizer)', 'flexia_core' ),
			'large'   	=> esc_html__( 'Large Header (Featured Image Background)', 'flexia_core' ),
			'simple'    => esc_html__( 'Simple Header', 'flexia_core' ),
			'none'      => esc_html__( 'No Header', 'flexia_core' ),
		),
	) );
	/**
     * Show Header Neta
     */
    $cmb_post->add_field( array(
		'name'             => esc_html__( 'Show Header Meta', 'flexia_core' ),
		'desc'             => esc_html__( 'Show or hide the header meta (post date, post category, post comments).', 'flexia_core' ),
		'id'               => $prefix . 'header_meta',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'yes' 	=> esc_html__( 'Yes', 'flexia_core' ),
			'no'   	=> esc_html__( 'No', 'flexia_core' ),
		),
	) );
	/**
     * Show Post Author
     */
    $cmb_post->add_field( array(
		'name'             => esc_html__( 'Show Post Author', 'flexia_core' ),
		'desc'             => esc_html__( 'Show or hide the post author.', 'flexia_core' ),
		'id'               => $prefix . 'header_author_meta',
		'classes'		   => 'js-flexia-core-alter',
		'type'             => 'select',
		'show_option_none' => false,
		// 'show_on_cb'	   => 'show_if_header_meta_active',
		'options'          => array(
			'yes' 	=> esc_html__( 'Yes', 'flexia_core' ),
			'no'   	=> esc_html__( 'No', 'flexia_core' ),
		),
	) );
	/**
     * Show Post Date
     */
    $cmb_post->add_field( array(
		'name'             => esc_html__( 'Show Post Date', 'flexia_core' ),
		'desc'             => esc_html__( 'Show or hide the post date.', 'flexia_core' ),
		'id'               => $prefix . 'header_post_date',
		'classes'		   => 'js-flexia-core-alter',
		'type'             => 'select',
		'show_option_none' => false,
		// 'show_on_cb'	   => 'show_if_header_meta_active',
		'options'          => array(
			'yes' 	=> esc_html__( 'Yes', 'flexia_core' ),
			'no'   	=> esc_html__( 'No', 'flexia_core' ),
		),
	) );
	/**
     * Show Post Category
     */
    $cmb_post->add_field( array(
		'name'             => esc_html__( 'Show Post Category', 'flexia_core' ),
		'desc'             => esc_html__( 'Show or hide the post category.', 'flexia_core' ),
		'id'               => $prefix . 'header_post_category',
		'classes'		   => 'js-flexia-core-alter',
		'type'             => 'select',
		'show_option_none' => false,
		// 'show_on_cb'	   => 'show_if_header_meta_active',
		'options'          => array(
			'yes' 	=> esc_html__( 'Yes', 'flexia_core' ),
			'no'   	=> esc_html__( 'No', 'flexia_core' ),
		),
	) );
	/**
     * Show Post Comments Count
     */
    $cmb_post->add_field( array(
		'name'             => esc_html__( 'Show Post Comments Count', 'flexia_core' ),
		'desc'             => esc_html__( 'Show or hide post comments count.', 'flexia_core' ),
		'id'               => $prefix . 'header_post_comments',
		'classes'		   => 'js-flexia-core-alter',
		'type'             => 'select',
		'show_option_none' => false,
		// 'show_on_cb'	   => 'show_if_header_meta_active',
		'options'          => array(
			'yes' 	=> esc_html__( 'Yes', 'flexia_core' ),
			'no'   	=> esc_html__( 'No', 'flexia_core' ),
		),
	) );
	/**
     * Show Footer Meta
     */
    $cmb_post->add_field( array(
		'name'             => esc_html__( 'Show Footer Meta', 'flexia_core' ),
		'desc'             => esc_html__( 'Show or hide the footer meta (author info).', 'flexia_core' ),
		'id'               => $prefix . 'footer_meta',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'yes' 	=> esc_html__( 'Yes', 'flexia_core' ),
			'no'   	=> esc_html__( 'No', 'flexia_core' ),
		),
	) );
	/**
     * Show Footer Meta
     */
    $cmb_post->add_field( array(
		'name'             => esc_html__( 'Show Social Sharer', 'flexia_core' ),
		'desc'             => esc_html__( 'Show or hide the the post social sharing options.', 'flexia_core' ),
		'id'               => $prefix . 'post_sharer',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'yes' 	=> esc_html__( 'Yes', 'flexia_core' ),
			'no'   	=> esc_html__( 'No', 'flexia_core' ),
		),
	) );
	/**
     * Show Post Navigation
     */
    $cmb_post->add_field( array(
		'name'             => esc_html__( 'Show Post Navigation', 'flexia_core' ),
		'desc'             => esc_html__( 'Show or hide the next/previous post navigation.', 'flexia_core' ),
		'id'               => $prefix . 'post_navigation',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'yes' 	=> esc_html__( 'Yes', 'flexia_core' ),
			'no'   	=> esc_html__( 'No', 'flexia_core' ),
		),
	) );

}
add_action( 'cmb2_admin_init', 'flexia_core_register_post_metaboxs' );

/**
 * Show specific fields if header_meta is set to "yes"
 */
function show_if_header_meta_active( $cmb_post ) {
	$status = get_post_meta( $cmb_post->object_id(), '_flexia_post_meta_key_header_meta', true );
	// Only show if status is 'external'
	return 'yes' === $status;
}