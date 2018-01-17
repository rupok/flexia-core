<?php

/**
 * @link       https://www.codetic.net
 * @since      1.0.0
 *
 * @package    Flexia_Core
 * @subpackage Flexia_Core/admin
 */


// write header script

function flexia_core_add_custom_js_in_wp_head() {
	$flexia_core_header_script = get_theme_mod('flexia_core_header_script', '');

	if ( ! empty( $flexia_core_header_script)) { ?>
	<script type="text/javascript">
		/* <![CDATA[ */
			<?php echo $flexia_core_header_script; ?>
		/* ]]> */
	</script>
	<?php }

}
add_action( 'wp_head', 'flexia_core_add_custom_js_in_wp_head' );


// write footer script

function flexia_core_add_custom_js_in_wp_footer() {
	$flexia_core_footer_script = get_theme_mod('flexia_core_footer_script', '');
	
	if (! empty( $flexia_core_footer_script)) { ?>
	<script type="text/javascript">
		/* <![CDATA[ */
			<?php echo get_theme_mod('flexia_core_footer_script'); ?>
		/* ]]> */
	</script>
	<?php }

}
add_action( 'wp_footer', 'flexia_core_add_custom_js_in_wp_footer' );

// write Google Analytics script

function flexia_core_add_ga_script_in_wp_footer() {
	$flexia_core_ga_script = get_theme_mod('flexia_core_ga_script', '');

	if (! empty( $flexia_core_ga_script)) {
		echo $flexia_core_ga_script;
	}

}
add_action( 'wp_footer', 'flexia_core_add_ga_script_in_wp_footer' );
