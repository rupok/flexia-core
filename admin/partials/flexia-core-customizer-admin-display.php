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

	if ( ! empty( get_theme_mod('flexia_core_header_script'))) { ?>
	<script type="text/javascript">
		/* <![CDATA[ */
			<?php echo get_theme_mod('flexia_core_header_script'); ?>
		/* ]]> */
	</script>
	<?php }

}
add_action( 'wp_head', 'flexia_core_add_custom_js_in_wp_head' );


// write footer script

function flexia_core_add_custom_js_in_wp_footer() {

	if (! empty( get_theme_mod('flexia_core_footer_script'))) { ?>
	<script type="text/javascript">
		/* <![CDATA[ */
			<?php echo get_theme_mod('flexia_core_footer_script'); ?>
		/* ]]> */
	</script>
	<?php }

}
add_action( 'wp_footer', 'flexia_core_add_custom_js_in_wp_footer' );
