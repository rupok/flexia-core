<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.codetic.net
 * @since      1.0.0
 *
 * @package    Flexia_Core
 * @subpackage Flexia_Core/admin/partials
 */
class Flexia_Core_Admin_Pages {

	public $fc;

	public function __construct() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'class-flexia-core-plugin-installer.php';
		$this->fc = new Flexia_Core_Plugin_Installer();
	}

	/**
	 * Create Admin Menu Page [Home Page]
	 *
	 * @since 	1.0.0
	 */
	public function create_flexia_core_admin_page() {

		add_menu_page(
			'Flexia',
			'Flexia',
			'manage_options',
			'flexia-settings',
			array( $this, 'flexia_core_admin_home_page' ),
			'',
			199
		);

	}

	/**
	 * Generates Admin Home Page
	 *
	 * @since   1.0.0
	 */
	public function flexia_core_admin_home_page() {

		?>
		<div class="flexia-core-admin-wrapper">
			<div class="flexia-core-admin-header">
				<h2 class="title">Flexia Settings</h2>
			</div>
			<div class="flexia-core-content">
				<div class="flexia-core-admin-widget">
					<?php echo '<img class="flexia-preview-img" src="' . plugins_url( 'img/flexia-preview.png', dirname(__FILE__) ) . '" > '; ?>
				</div>
			</div>
			<div class="flexia-core-sidebar">
				<div class="flexia-core-sidebar-widget">
					<h4 class="title">Show your love</h4>
					<p>We love to have you in Flexia family. We are making it more awesome everyday. Take your 2 minutes to review the theme and spread the love to encourage us to keep it going.</p>

					<a href="https://wordpress.org/support/theme/flexia/reviews/#new-post" class="review-flexia button button-primary" target="_blank">Leave a Review</a>
				</div>
				<div class="flexia-core-sidebar-widget">
					<h4 class="title">Contribute to Flexia</h4>
					<p>Flexia is a free theme and always will be. You can contribute to make it better creating issues, pull requests at <a href="https://github.com/rupok/flexia" target="_blank">Github.</a></p>
				</div>
				<div class="flexia-core-sidebar-widget">
					<h4 class="title">Need help?</h4>
					<p>We are crafting the documentation and creating support forum. Meantime, if you need help, feel free to get in touch via live chat support at <a href="https://wpdeveloper.net" target="_blank">WPDeveloper.net.</a></p>
				</div>
			</div>
		</div>
		<?php
	}



	/**
	 * Create Admin Menu Page [Rec. Plugins Page]
	 *
	 * @since 	1.0.0
	 */
	public function create_flexia_core_rec_plugins_page() {

		add_submenu_page(
			'flexia-settings',
			'Rec. Plugins',
			'Rec. Plugins',
			'manage_options',
			'flexia-recommended-plugins',
			array( $this, 'flexia_core_rec_plugins_page' )
		);

	}

	/**
	 * Generates Admin Recommended Plugins Page
	 *
	 * @since   1.0.0
	 */
	public function flexia_core_rec_plugins_page() {


		?>
		<div class="flexia-core-admin-wrapper">
			<div class="flexia-core-admin-header">
				<h2 class="title">Recommended Plugins</h2>
				<p>If you want extra functionality, you can add the below plugins. None of these plugins are required for the theme to work, they simply add additional functionality.</p>
			</div>
			<div class="flexia-plugins-wrapper">
				<?php
					if( class_exists( 'Flexia_Core_Plugin_Installer' ) ) {
						echo $this->fc->free_plugins();
						echo $this->fc->premium_plugins();
					}
				?>
			</div>
		</div>
		<?php
	}
}
