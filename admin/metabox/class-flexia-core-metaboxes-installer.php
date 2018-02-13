<?php
/**
 * This function will generate custom metaboxes into the pages
 */
function flexia_core_register_page_metaboxs() {
    $prefix = '_flexia_meta_key_';

    /**
     * Flexia Post Metaboxes
     */
    $cmb_post = new_cmb2_box(array(
        'id' 			=> $prefix . 'metaboxs',
        'title' 		=> esc_html__('Flexia Pages Settings', 'flexia_core'),
        'object_types' 	=> array( 'page' ), // Post type
        'priority' 		=> 'high',
    ));
    /**
     * Additional Body Class
     */
    $cmb_post->add_field(array(
        'name' 			=> esc_html__('Additional Body Class', 'flexia_core'),
        'desc' 			=> esc_html__('Add an extra class to body for this post.', 'flexia_core'),
        'id' 			=> $prefix . 'body_class',
        'type' 			=> 'text',
    ));
	/**
     * Show Page Title
     */
    $cmb_post->add_field( array(
		'name'             => esc_html__( 'Page Header', 'flexia_core' ),
		'desc'             => esc_html__( 'Choose page header.', 'flexia_core' ),
		'id'               => $prefix . 'page_header',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'flexia_core_page_header_default' 	  => esc_html__( 'Default Header ( From Customizer )', 'flexia_core' ),
            'flexia_core_page_header_large'       => esc_html__( 'Large Header', 'flexia_core' ),
            'flexia_core_page_header_mini'        => esc_html__( 'Mini Header', 'flexia_core' ),
			'flexia_core_page_header_none'        => esc_html__( 'No Header', 'flexia_core' ),
		),
	) );

}
add_action( 'cmb2_admin_init', 'flexia_core_register_page_metaboxs' );