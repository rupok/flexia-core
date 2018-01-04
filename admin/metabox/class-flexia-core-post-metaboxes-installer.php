<?php
/**
 *
 */
if( ! class_exists( 'Flexia_Core_Post_Metabox' ) ) {

	/**
	 * Flexia Core Post Metabox Installer
	 *
	 * @since  1.1.0
	 */
	class Flexia_Core_Post_Metabox {

		public function __construct() {

			add_action( 'add_meta_boxes', array( $this, 'flexia_core_add_metabox' ) );
			add_action( 'save_post', array( $this, 'flexia_core_save_metabox_value' ) );

		}

		/**
		 * This method will create metaboxes
		 *
		 * @since   1.1.0
		 */
		public function flexia_core_add_metabox() {

			$screens = ['post'];
			foreach( $screens as $screen ) {
				add_meta_box(
					'flexia_core_page_settings',
					'Flexia Post Settings',
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

			if( array_key_exists( 'flexia_hide_post_title', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_post_meta_key_page_title',
					$_POST['flexia_hide_post_title']
				);
			}

			if( array_key_exists( 'flexia_add_body_class', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_post_meta_key_body_class',
					$_POST['flexia_add_body_class']
				);
			}

			if( array_key_exists( 'flexia_post_footer_meta', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_post_meta_key_footer_meta',
					$_POST['flexia_post_footer_meta']
				);
			}

			if( array_key_exists( 'flexia_post_sharer', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_post_meta_key_post_sharer',
					$_POST['flexia_post_sharer']
				);
			}

			if( array_key_exists( 'flexia_post_navigation', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_post_meta_key_post_navigation',
					$_POST['flexia_post_navigation']
				);
			}

		}

		/**
		 * This method will generate metabox markup
		 *
		 * @since   1.1.0
		 */
		public function flexia_core_metabox_html( $post ) {

			$page_title = get_post_meta( $post->ID, '_flexia_post_meta_key_page_title', true );
			$body_class = get_post_meta( $post->ID, '_flexia_post_meta_key_body_class', true );
			$footer_meta = get_post_meta( $post->ID, '_flexia_post_meta_key_footer_meta', true );
			$post_sharer = get_post_meta( $post->ID, '_flexia_post_meta_key_post_sharer', true );
			$post_navigation = get_post_meta( $post->ID, '_flexia_post_meta_key_post_navigation', true );
			?>
			<div class="flexia-core-metabox-wrapper">
				<!-- Add Body Class -->
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_add_body_class"><?php _e( 'Add Body Class: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
						<input type="text" name="flexia_add_body_class" class="regular-text" value="<?php echo $body_class; ?>">
						<p class="description">This class will be added in the body tag of your theme.</p>
					</div>
				</div>

				<!-- Show/Hide Post Title -->
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_hide_post_title"><?php _e( 'Post Title: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_hide_post_title" id="flexia_hide_post_title" class="regular-text">
				            <option value="large" <?php selected( $page_title, 'large' ); ?>>Large Header</option>
				            <option value="simple" <?php selected( $page_title, 'simple' ); ?>>Simple Header</option>
				            <option value="none" <?php selected( $page_title, 'none' ); ?>>No Header</option>
				        </select>
				        <p class="description">It will allow you to show/hide the page title.</p>
					</div>
				</div>

				<!-- Show/Hide Footer Meta -->
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_post_footer_meta"><?php _e( 'Show Footer Meta: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_post_footer_meta" id="flexia_post_footer_meta" class="regular-text">
				            <option value="yes" <?php selected( $footer_meta, 'yes' ); ?>>Yes</option>
				            <option value="no" <?php selected( $footer_meta, 'no' ); ?>>No</option>
				        </select>
				        <p class="description">It will allow you to show/hide the post footer meta.</p>
					</div>
				</div>

				<!-- Show/Hide Footer Post Sharer -->
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_post_sharer"><?php _e( 'Show Post Sharer: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_post_sharer" id="flexia_post_sharer" class="regular-text">
				            <option value="yes" <?php selected( $post_sharer, 'yes' ); ?>>Yes</option>
				            <option value="no" <?php selected( $post_sharer, 'no' ); ?>>No</option>
				        </select>
				        <p class="description">It will allow you to show/hide the post sharer.</p>
					</div>
				</div>

				<!-- Show/Hide Footer Post Navigation -->
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_post_navigation"><?php _e( 'Show Post Navigation: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_post_navigation" id="flexia_post_navigation" class="regular-text">
				            <option value="yes" <?php selected( $post_navigation, 'yes' ); ?>>Yes</option>
				            <option value="no" <?php selected( $post_navigation, 'no' ); ?>>No</option>
				        </select>
				        <p class="description">It will allow you to show/hide the post navigation.</p>
					</div>
				</div>
			</div>
			<?php
		}

	}

	$flexia_metaboxes = new Flexia_Core_Post_Metabox();

}