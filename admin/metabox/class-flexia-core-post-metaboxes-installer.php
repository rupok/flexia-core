<?php
/**
 *
 */
if( ! class_exists( 'Flexia_Core_Post_Metabox' ) ) {

	/**
	 * Flexia Core Post Metabox Installer
	 *
	 * @since  1.2.0
	 */
	class Flexia_Core_Post_Metabox {

		public function __construct() {

			add_action( 'add_meta_boxes', array( $this, 'flexia_core_add_metabox' ) );
			add_action( 'save_post', array( $this, 'flexia_core_save_metabox_value' ) );

		}

		/**
		 * This method will create metaboxes
		 *
		 * @since   1.2.0
		 */
		public function flexia_core_add_metabox() {
				add_meta_box(
					'flexia_core_page_settings',
					'Flexia Post Settings',
					array( $this, 'flexia_core_metabox_html' ),
					'post',
					'normal',
					'high'
				);
		}

		/**
		 * This method will save metabox's data
		 *
		 * @since   1.2.0
		 */
		public function flexia_core_save_metabox_value( $post_id ) {

			if( !isset( $_POST['flexia_post_metabox_nonce'] ) || !wp_verify_nonce( $_POST['flexia_post_metabox_nonce'], 'flexia_post_metabox_nonce_id' ) ) {
				return false;
			}

			if( !current_user_can( 'edit_post', $post_id ) ) {
				return false;
			}

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

			if( array_key_exists( 'flexia_post_header_meta', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_post_meta_key_header_meta',
					$_POST['flexia_post_header_meta']
				);
			}

			if( array_key_exists( 'flexia_post_header_author_meta', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_post_meta_key_header_author_meta',
					$_POST['flexia_post_header_author_meta']
				);
			}

			if( array_key_exists( 'flexia_post_header_post_date', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_post_meta_key_header_post_date',
					$_POST['flexia_post_header_post_date']
				);
			}

			if( array_key_exists( 'flexia_post_header_post_category', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_post_meta_key_header_post_category',
					$_POST['flexia_post_header_post_category']
				);
			}

			if( array_key_exists( 'flexia_post_header_post_comments', $_POST ) ) {
				update_post_meta(
					$post_id,
					'_flexia_post_meta_key_header_post_comments',
					$_POST['flexia_post_header_post_comments']
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
		 * @since   1.2.0
		 */
		public function flexia_core_metabox_html( $post ) {

			$page_title 		= get_post_meta( $post->ID, '_flexia_post_meta_key_page_title', true );
			$body_class 		= get_post_meta( $post->ID, '_flexia_post_meta_key_body_class', true );
			$header_meta 		= get_post_meta( $post->ID, '_flexia_post_meta_key_header_meta', true );
			$header_author_meta = get_post_meta( $post->ID, '_flexia_post_meta_key_header_author_meta', true );
			$header_post_date 	= get_post_meta( $post->ID, '_flexia_post_meta_key_header_post_date', true );
			$header_post_category 	= get_post_meta( $post->ID, '_flexia_post_meta_key_header_post_category', true );
			$header_post_comments 	= get_post_meta( $post->ID, '_flexia_post_meta_key_header_post_comments', true );
			$footer_meta 		= get_post_meta( $post->ID, '_flexia_post_meta_key_footer_meta', true );
			$post_sharer 		= get_post_meta( $post->ID, '_flexia_post_meta_key_post_sharer', true );
			$post_navigation 	= get_post_meta( $post->ID, '_flexia_post_meta_key_post_navigation', true );
			?>
			<div class="flexia-core-metabox-wrapper">
				<!-- WP Nonce Field -->
				<?php wp_nonce_field( 'flexia_post_metabox_nonce_id', 'flexia_post_metabox_nonce' ); ?>

				<!-- Add Body Class -->
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_add_body_class"><?php _e( 'Additional Body Class: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
						<input type="text" name="flexia_add_body_class" class="regular-text" value="<?php echo $body_class; ?>">
						<p class="description">Add an extra class to body for this post.</p>
					</div>
				</div>

				<!-- Show/Hide Post Title -->
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_hide_post_title"><?php _e( 'Post Title: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_hide_post_title" id="flexia_hide_post_title" class="regular-text">
				            <option value="large" <?php selected( $page_title, 'large' ); ?>>Large Header (Featured Image Background)</option>
				            <option value="simple" <?php selected( $page_title, 'simple' ); ?>>Simple Header</option>
				            <option value="none" <?php selected( $page_title, 'none' ); ?>>No Header</option>
				        </select>
				        <p class="description">Show or hide the page title.</p>
					</div>
				</div>

				<!-- Show/Hide Header Meta -->
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_post_header_meta"><?php _e( 'Show Header Meta: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_post_header_meta" id="flexia_post_header_meta" class="regular-text">
				            <option value="yes" <?php selected( $header_meta, 'yes' ); ?>>Yes</option>
				            <option value="no" <?php selected( $header_meta, 'no' ); ?>>No</option>
				        </select>
				        <p class="description">Show or hide the header meta (post date, post category, post comments).</p>
					</div>
				</div>

				<!-- Show/Hide Post Author Meta ( if post header meta is active ) -->
				<div class="flexia-core-metabox-row js-flexia-core-alter flexia-hide-metabox">
					<div class="flexia-core-metabox-left">
						<label for="flexia_post_header_author_meta"><?php _e( 'Show Post Author: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_post_header_author_meta" id="flexia_post_header_author_meta" class="regular-text">
				            <option value="yes" <?php selected( $header_author_meta, 'yes' ); ?>>Yes</option>
				            <option value="no" <?php selected( $header_author_meta, 'no' ); ?>>No</option>
				        </select>
				        <p class="description">Show or hide the post author.</p>
					</div>
				</div>

				<!-- Show/Hide Post Date ( if post header meta is active ) -->
				<div class="flexia-core-metabox-row js-flexia-core-alter flexia-hide-metabox">
					<div class="flexia-core-metabox-left">
						<label for="flexia_post_header_post_date"><?php _e( 'Show Post Date: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_post_header_post_date" id="flexia_post_header_post_date" class="regular-text">
				            <option value="yes" <?php selected( $header_post_date, 'yes' ); ?>>Yes</option>
				            <option value="no" <?php selected( $header_post_date, 'no' ); ?>>No</option>
				        </select>
				        <p class="description">Show or hide the post date.</p>
					</div>
				</div>

				<!-- Show/Hide Post Category ( if post header meta is active ) -->
				<div class="flexia-core-metabox-row js-flexia-core-alter flexia-hide-metabox">
					<div class="flexia-core-metabox-left">
						<label for="flexia_post_header_post_category"><?php _e( 'Show Post Category: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_post_header_post_category" id="flexia_post_header_post_category" class="regular-text">
				            <option value="yes" <?php selected( $header_post_date, 'yes' ); ?>>Yes</option>
				            <option value="no" <?php selected( $header_post_date, 'no' ); ?>>No</option>
				        </select>
				        <p class="description">Show or hide the post category.</p>
					</div>
				</div>

				<!-- Show/Hide Post Comments ( if post header meta is active ) -->
				<div class="flexia-core-metabox-row js-flexia-core-alter flexia-hide-metabox">
					<div class="flexia-core-metabox-left">
						<label for="flexia_post_header_post_comments"><?php _e( 'Show Post Comments Count: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_post_header_post_comments" id="flexia_post_header_post_comments" class="regular-text">
				            <option value="yes" <?php selected( $header_post_comments, 'yes' ); ?>>Yes</option>
				            <option value="no" <?php selected( $header_post_comments, 'no' ); ?>>No</option>
				        </select>
				        <p class="description">Show or hide post comments count.</p>
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
				        <p class="description">Show or hide the footer meta (author info).</p>
					</div>
				</div>

				<!-- Show/Hide Footer Post Sharer -->
				<div class="flexia-core-metabox-row">
					<div class="flexia-core-metabox-left">
						<label for="flexia_post_sharer"><?php _e( 'Show Social Sharer: ', 'flexia-core' ); ?></label>
					</div>
					<div class="flexia-core-metabox-right">
				        <select name="flexia_post_sharer" id="flexia_post_sharer" class="regular-text">
				            <option value="yes" <?php selected( $post_sharer, 'yes' ); ?>>Yes</option>
				            <option value="no" <?php selected( $post_sharer, 'no' ); ?>>No</option>
				        </select>
				        <p class="description">Show or hide the the post social sharing options.</p>
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
				        <p class="description">Show or hide the next/previous post navigation.</p>
					</div>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($){
					var headerMetaStatus = $( '#flexia_post_header_meta' ).val();
					var target = $( '.js-flexia-core-alter' );
					// Default
					if( headerMetaStatus == 'yes' ) {
						target.removeClass( 'flexia-hide-metabox' ).addClass( 'flexia-show-metabox' );
					}else {
						target.removeClass( 'flexia-show-metabox' ).addClass( 'flexia-hide-metabox' );
					}
					// If Changed
					$( '#flexia_post_header_meta' ).on( 'change', function() {
						headerMetaStatus = $( '#flexia_post_header_meta' ).val();
						if( headerMetaStatus == 'yes' ) {
							target.removeClass( 'flexia-hide-metabox' ).addClass( 'flexia-show-metabox' );
						}else {
							target.removeClass( 'flexia-show-metabox' ).addClass( 'flexia-hide-metabox' );
						}
					});
				});
			</script>
			<?php
		}

	}

	$flexia_metaboxes = new Flexia_Core_Post_Metabox();

}