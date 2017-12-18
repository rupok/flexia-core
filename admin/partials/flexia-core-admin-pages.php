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
				<h2 class="title">Flexia Core Admin Panel</h2>
			</div>
			<div class="flexia-core-content">
				<div class="flexia-core-admin-widget">
					<h2 class="title">Flexia Pro</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla optio illo, reprehenderit officia iste quaerat voluptatem numquam a similique. Amet explicabo, veniam fugit. Dolorem commodi accusantium ipsa omnis, laudantium at.</p>
				</div>
				<div class="flexia-core-admin-widget">
					<h2 class="title">Flexia Pro</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla optio illo, reprehenderit officia iste quaerat voluptatem numquam a similique. Amet explicabo, veniam fugit. Dolorem commodi accusantium ipsa omnis, laudantium at.</p>
				</div>
			</div>
			<div class="flexia-core-sidebar">
				<div class="flexia-core-sidebar-widget">
					<h4 class="title">Sidebar Title</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam illo praesentium sequi in cum, beatae maiores quae qui temporibus sint quos atque incidunt doloribus soluta minus molestias quo fuga facilis?</p>
				</div>
				<div class="flexia-core-sidebar-widget">
					<h4 class="title">Sidebar Title</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam illo praesentium sequi in cum, beatae maiores quae qui temporibus sint quos atque incidunt doloribus soluta minus molestias quo fuga facilis?</p>
				</div>
			</div>
			<div class="flexia-core-admin-footer">
				<p>Flexia admin footer area.</p>
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
			</div>
			<div class="flexia-plugins-wrapper">
				<?php
					if( class_exists( 'Flexia_Core_Plugin_Installer' ) ) {
						echo $this->fc->free_plugins();
						echo $this->fc->premium_plugins();
					}
				?>
			</div>
			<div class="flexia-core-admin-footer">
				<p>Flexia admin footer area.</p>
			</div>
		</div>
		<?php
	}
}
