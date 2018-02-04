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
		'name'             => esc_html__( 'Show Page Title', 'flexia_core' ),
		'desc'             => esc_html__( 'Show or hide the page title.', 'flexia_core' ),
		'id'               => $prefix . 'page_title',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'1' 	=> esc_html__( 'Yes', 'flexia_core' ),
			'0'   	=> esc_html__( 'No', 'flexia_core' ),
		),
	) );

}
// global $post;
// if( !empty( $post ) ) {
//     $page_template = get_post_meta( $post->ID, '_wp_page_template', true );
//     if( $page_template != 'page-templates/template-portfolio.php' ) {
//         add_action( 'cmb2_admin_init', 'flexia_core_register_page_metaboxs' );
//     }
// }
add_action( 'cmb2_admin_init', 'flexia_core_register_page_metaboxs' );