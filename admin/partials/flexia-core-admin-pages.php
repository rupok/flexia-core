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

	public function __construct() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'class-flexia-core-plugin-installer.php';
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
			'flexia-core-settings',
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
			'flexia-core-settings',
			'Rec. Plugins',
			'Rec. Plugins',
			'manage_options',
			'flexia-core-recommended-plugins',
			array( $this, 'flexia_core_rec_plugins_page' )
		);

	}

	/**
	 * Generates Admin Recommended Plugins Page
	 *
	 * @since   1.0.0
	 */
	public function flexia_core_rec_plugins_page() {

		$free_plugins = array(
			array(
				'slug' 	=> 'elementor',
				'file'	=> 'elementor.php',
			),
			array(
				'slug' 	=> 'woocommerce',
				'file'	=> 'woocommerce.php',
			),
			array(
				'slug' 	=> 'contact-form-7',
				'file'	=> 'wp-contact-form-7.php',
			),
			array(
				'slug' 	=> 'ninja-forms',
				'file'	=> 'ninja-forms.php',
			),
		);
		?>
		<div class="flexia-core-admin-wrapper">
			<div class="flexia-core-admin-header">
				<h2 class="title">Recommended Plugins</h2>
			</div>
			<!-- Free Plugins -->
			<?php
			if( class_exists( 'Flexia_Core_Plugin_Installer' ) ) {
				echo Flexia_Core_Plugin_Installer::free_plugins_installer( $free_plugins );
			}
			?>
			<!-- Premium Plugins -->
			<!-- <div class="flexia-plugins">
				<div class="header">
					<img src="<?php echo plugins_url( '../img/placeholder.png', __FILE__ ) ?>" alt="">
				</div>
				<div class="content">
					<h4 class="title">Elementor Page Builder</h4>
					<p>The most advanced frontend drag &amp; drop page builder. Create high-end, pixel perfect websites at record speeds. Any theme, any page, any design.</p>
					<span class="by-author">By: <a href="#">Elementor</a></span>
				</div>
				<div class="footer">
					<div class="footer-left">
						<ul>
							<li><button type="submit" class="button button-secondary">Install Now</button></li>
							<li><a href="#">More Details</a></li>
						</ul>
					</div>
					<div class="footer-right">
						<span class="tag-pro">Premium</span>
					</div>
				</div>
			</div>
			<div class="flexia-plugins">
				<div class="header">
					<img src="<?php echo plugins_url( '../img/placeholder.png', __FILE__ ) ?>" alt="">
				</div>
				<div class="content">
					<h4 class="title">Contact Form 7</h4>
					<p>The most advanced frontend drag &amp; drop page builder. Create high-end, pixel perfect websites at record speeds. Any theme, any page, any design.</p>
					<span class="by-author">By: <a href="#">Contact Form 7</a></span>
				</div>
				<div class="footer">
					<div class="footer-left">
						<ul>
							<li><button type="submit" class="button button-secondary">Install Now</button></li>
							<li><a href="#">More Details</a></li>
						</ul>
					</div>
					<div class="footer-right">
						<span class="tag-pro">Premium</span>
					</div>
				</div>
			</div>
			<div class="flexia-plugins">
				<div class="header">
					<img src="<?php echo plugins_url( '../img/placeholder.png', __FILE__ ) ?>" alt="">
				</div>
				<div class="content">
					<h4 class="title">Yoast SEO</h4>
					<p>The most advanced frontend drag &amp; drop page builder. Create high-end, pixel perfect websites at record speeds. Any theme, any page, any design.</p>
					<span class="by-author">By: <a href="#">Yoast SEO</a></span>
				</div>
				<div class="footer">
					<div class="footer-left">
						<ul>
							<li><button type="submit" class="button button-secondary">Install Now</button></li>
							<li><a href="#">More Details</a></li>
						</ul>
					</div>
					<div class="footer-right">
						<span class="tag-pro">Premium</span>
					</div>
				</div>
			</div>
			<div class="flexia-plugins">
				<div class="header">
					<img src="<?php echo plugins_url( '../img/placeholder.png', __FILE__ ) ?>" alt="">
				</div>
				<div class="content">
					<h4 class="title">Essential Addons Elementor</h4>
					<p>The most advanced frontend drag &amp; drop page builder. Create high-end, pixel perfect websites at record speeds. Any theme, any page, any design.</p>
					<span class="by-author">By: <a href="#">Codetic</a></span>
				</div>
				<div class="footer">
					<div class="footer-left">
						<ul>
							<li><button type="submit" class="button button-secondary">Install Now</button></li>
							<li><a href="#">More Details</a></li>
						</ul>
					</div>
					<div class="footer-right">
						<span class="tag-pro">Premium</span>
					</div>
				</div>
			</div> -->
			<div class="flexia-core-admin-footer">
				<p>Flexia admin footer area.</p>
			</div>
		</div>
		<?php
	}
}
