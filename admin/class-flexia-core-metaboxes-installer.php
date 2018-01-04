<?php
/**
 *
 */
if( ! class_exists( 'Flexia_Core_Metabox_Installer' ) ) {

	/**
	 * Flexia Core Metabox Installer
	 *
	 * @since  1.1.0
	 */
	class Flexia_Core_Metabox_Installer {

		public function __construct() {

			add_action( 'add_meta_boxes', array( $this, 'flexia_core_add_metabox' ) );
			add_action( 'save_post', array( $this, 'flexia_core_save_metabox_value' ) );
			add_filter( 'body_class', array( $this, 'flexia_core_fetch_body_class' ), 10, 1 );

		}

		/**
		 * This method will get all post types available
		 *
		 * @since   1.1.0
		 */
		public function flexia_core_get_post_types() {
			$post_types = get_post_types( '', 'names' );
			foreach( $post_types as $post_type ) {
				$all_post_types[] = $post_type;
			}
			return $all_post_types;
		}

		/**
		 * This method will create metaboxes
		 *
		 * @since   1.1.0
		 */
		public function flexia_core_add_metabox() {

			$screens = $this->flexia_core_get_post_types();
			foreach( $screens as $screen ) {
				add_meta_box(
					'flexia_core_page_settings',
					'Flexia Page Settings',
					array( $this, 'flexia_core_metabox_html' ),
					$screen
				);
			}

		}

		/**
		 * This method will save metabox's data
		 *
		 * @since   1.1.0
		 */
		public function flexia_core_save_metabox_value( $post_id ) {

			if( array_key_exists( 'flexia_hide_page_title', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_meta_key_page_title',
					$_POST['flexia_hide_page_title']
				);
			}

			if( array_key_exists( 'flexia_add_body_class', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_meta_key_body_class',
					$_POST['flexia_add_body_class']
				);
			}

		}

		/**
		 * This method will generate metabox markup
		 *
		 * @since   1.1.0
		 */
		public function flexia_core_metabox_html( $post ) {

			$page_title = get_post_meta( $post->ID, '_flexia_meta_key_page_title', true );
			$body_class = get_post_meta( $post->ID, '_flexia_meta_key_body_class', true );
			?>
			<div class="flexia-core-metabox-wrapper">
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_hide_page_title"><?php _e( 'Page Title: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_hide_page_title" id="flexia_show_page_title" class="regular-text">
				            <option value="1" <?php selected( $page_title, '1' ); ?>>Show</option>
				            <option value="0" <?php selected( $page_title, '0' ); ?>>Hide</option>
				        </select>
				        <p class="description">It will allow you to show/hide the page title.</p>
					</div>
				</div>
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_add_body_class"><?php _e( 'Add Body Class: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
						<input type="text" name="flexia_add_body_class" class="regular-text" value="<?php echo $body_class; ?>">
						<p class="description">This class will be added in the body tag of your theme.</p>
					</div>
				</div>
			</div>
			<?php
		}

		/**
		 *
		 */
		public function flexia_core_fetch_body_class( $classes ) {

			global $post;
			$classes[] = get_post_meta( $post->ID, '_flexia_meta_key_body_class', true );
			return $classes;

		}


	}

	$flexia_metaboxes = new Flexia_Core_Metabox_Installer();

}