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
			plugins_url( 'img/flexia-logo-white.svg', dirname(__FILE__) ),
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
				<div class="flexia-logo-inline"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80.27 88.23"><defs><style>.flexia-logo-inline{fill:#ee3560;}</style></defs><title>Flexia Logo</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="flexia-logo-inline" d="M70.55,14.31,44.24,1.41a13.82,13.82,0,0,0-13.79.94L6.12,18.68A13.82,13.82,0,0,0,0,31.1L2,60.33A13.82,13.82,0,0,0,9.72,71.81L43.2,88.23l.07,0L14.74,45.69a9.66,9.66,0,0,1,2.64-13.41L37.32,18.9a6.69,6.69,0,0,1,10.37,4.67h0A6.69,6.69,0,0,1,44.78,30L28.28,41.09l6.3,9.38.27.41L42.31,62,43,63,54.73,80.48l19.42-13A13.82,13.82,0,0,0,80.24,55l-2-29.24A13.82,13.82,0,0,0,70.55,14.31Zm-19,41.48-5.46,3.66L38.63,48.34l5.46-3.66a6.69,6.69,0,0,1,10.37,4.67h0A6.69,6.69,0,0,1,51.55,55.79Z"/></g></g></svg>
				</div>
				<h2 class="title">Flexia Settings</h2>
			</div>
			<div class="flexia-core-content">
				<div class="flexia-core-content-inner">
					<div class="flexia-core-admin-block-large">
						<?php echo '<img class="flexia-preview-img" src="' . plugins_url( 'img/flexia-preview.png', dirname(__FILE__) ) . '" > '; ?>
					</div>
					<div class="flexia-core-admin-block-wrapper">
						<div class="flexia-core-admin-block flexia-core-admin-block-customize">
							<header class="flexia-core-admin-block-header">
								<div class="flexia-core-admin-block-header-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 45.91"><defs><style>.flexia-icon-customize{fill:#e74c3c;}</style></defs><title>Customization</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="flexia-icon-customize" d="M23,15.6q11.21,0,22.42,0c.44,0,.56.13.56.56q0,13.75,0,27.5a2,2,0,0,1-2.26,2.25H2.31A2,2,0,0,1,0,43.61Q0,29.91,0,16.2c0-.6,0-.6.59-.6ZM19.08,37.22c.48.2.91.41,1.36.54a.58.58,0,0,1,.49.58A1.9,1.9,0,0,0,22.64,40a1.77,1.77,0,0,0,2-1.25c.13-.86.64-1.09,1.29-1.31a1.18,1.18,0,0,0,.29-.14.55.55,0,0,1,.76.06,1.81,1.81,0,0,0,2.29,0,1.69,1.69,0,0,0,.66-2.17,1.66,1.66,0,0,1,0-2,.28.28,0,0,0,0-.08c.07-.47.31-.66.81-.72a1.88,1.88,0,0,0,1.62-1.73,1.72,1.72,0,0,0-1.27-1.84c-.83-.11-1.06-.6-1.26-1.22a1.26,1.26,0,0,0-.15-.33.58.58,0,0,1,.08-.8,1.79,1.79,0,0,0,0-2.25,1.72,1.72,0,0,0-2.22-.65,1.57,1.57,0,0,1-1.87,0,1.19,1.19,0,0,0-.39-.13c-.31-.05-.4-.22-.43-.53a1.92,1.92,0,0,0-1.69-1.72,1.77,1.77,0,0,0-2,1.27c-.12.83-.61,1-1.23,1.26a1.2,1.2,0,0,0-.29.14.63.63,0,0,1-.88-.06,1.8,1.8,0,0,0-2.25,0,1.71,1.71,0,0,0-.63,2.18,1.57,1.57,0,0,1,0,1.84,1,1,0,0,0-.1.3c-.05.32-.21.43-.55.46a1.91,1.91,0,0,0-1.7,1.65,1.76,1.76,0,0,0,1.24,2,1.57,1.57,0,0,1,1.31,1.29,1.14,1.14,0,0,0,.14.29.56.56,0,0,1-.06.76,1.83,1.83,0,0,0,.23,2.56A1.94,1.94,0,0,0,19.08,37.22Z"/><path class="flexia-icon-customize" d="M22.94,11.8H.61c-.61,0-.61,0-.61-.63Q0,6.73,0,2.29A2,2,0,0,1,2.31,0H43.59a2,2,0,0,1,2.3,2.3c0,3,0,6,0,9,0,.42-.12.54-.54.54ZM17.79,3.91a1.94,1.94,0,0,0-.07,3.89,2,2,0,0,0,2-1.92A2,2,0,0,0,17.79,3.91ZM6.46,5.81a1.94,1.94,0,1,0,2-1.9A1.94,1.94,0,0,0,6.46,5.81Z"/><path class="flexia-icon-customize" d="M22.95,27a3.7,3.7,0,1,1-3.71,3.73A3.7,3.7,0,0,1,22.95,27Z"/></g></g><head xmlns=""/></svg>
								</div>	
								<h4 class="flexia-core-admin-title">Customize Flexia</h4>
							</header>
							<div class="flexia-core-admin-block-content">
								<p>Flexia got lots of customization options to achieve almost anything you want. Take a minute to explore the power of Flexia.</p>
								<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="customize-flexia button button-primary" target="_blank">Customize Flexia</a>
							</div>
						</div>
						<div class="flexia-core-admin-block flexia-core-admin-block-review">
							<header class="flexia-core-admin-block-header">
								<div class="flexia-core-admin-block-header-icon">
									<svg style="enable-background:new 0 0 48 48;" version="1.1" viewBox="0 0 48 48" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Icons"><g><g id="Icons_7_"><g><path d="M35.72935,25.74662l0.8357-0.8271c1.611-1.611,2.4122-3.7475,2.4122-5.8668      c0-2.1279-0.8012-4.2558-2.4122-5.8668c-3.2221-3.2221-8.5031-3.2221-11.7337,0l-0.8271,0.8356l-0.8356-0.8356      c-3.222-3.2221-8.5031-3.2221-11.7251,0c-1.6196,1.611-2.4208,3.7389-2.4208,5.8668c0,2.1193,0.8012,4.2558,2.4208,5.8668      l0.8271,0.8271l11.3076,11.3077c0.2353,0.2352,0.6167,0.2351,0.8519-0.0002L35.72935,25.74662" style="fill:#EF4B53;"/></g></g><path d="M17.80325,12.24382c0,0-6.9318-0.5491-7.6524,7.3092c0,0,1.4413-5.765,7.8583-5.4905    c0,0,1.5941,0.1605,1.5901-0.8317C19.59495,12.14722,17.80325,12.24382,17.80325,12.24382z" style="fill:#F47682;"/></g></g></svg>
								</div>	
								<h4 class="flexia-core-admin-title">Show your love</h4>
							</header>
							<div class="flexia-core-admin-block-content">
								<p>We love to have you in Flexia family. We are making it more awesome everyday. Take your 2 minutes to review the theme and spread the love to encourage us to keep it going.</p>

								<a href="https://wordpress.org/support/theme/flexia/reviews/#new-post" class="review-flexia button button-primary" target="_blank">Leave a Review</a>
							</div>
						</div>
						<div class="flexia-core-admin-block flexia-core-admin-block-contribution">
							<header class="flexia-core-admin-block-header">
								<div class="flexia-core-admin-block-header-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 45.69"><defs><style>.flexia-icon-bug{fill:#9b59b6;}</style></defs><title>Bugs</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="flexia-icon-bug" d="M18.87,28.37,9.16,38.08A8.66,8.66,0,0,0,14.49,40h4.38a9.55,9.55,0,0,0,2.28-.38v5.14a1,1,0,0,0,1.9,0v-5.9A4.83,4.83,0,0,0,25,37.31l.76-.76a.92.92,0,0,0,0-1.33Z"/><path class="flexia-icon-bug" d="M11.64,21.13c-.19-.19-.57-.38-.76-.19H9c-.38,0-.57,0-.76.38L7.07,23H1.17a1,1,0,1,0,0,1.9H6.31a9.56,9.56,0,0,0-.38,2.28V31.6a8.66,8.66,0,0,0,1.9,5.33l9.71-9.71Z"/><path class="flexia-icon-bug" d="M24.39,14.47c.19.19.38.19.76.19a.7.7,0,0,0,.57-.19.92.92,0,0,0,.38-1.14,11.08,11.08,0,0,1-1-3,.87.87,0,0,0-1-.76H22.3a1,1,0,0,0-.76.38,1.14,1.14,0,0,0-.19.76,2.35,2.35,0,0,0,.76,1.52Z"/><path class="flexia-icon-bug" d="M35.81,28.56h3.43a1,1,0,0,0,0-1.9H33.91L20.77,13.52A5.2,5.2,0,0,1,19.25,9.9V6.66a.9.9,0,0,0-1-1h-.19A13.52,13.52,0,0,0,16.21,3,9.12,9.12,0,0,0,9.54,0a9.71,9.71,0,0,0-5.9,2.09,1.44,1.44,0,0,0-.38.76,1,1,0,0,0,.38.76L9.54,7a5.39,5.39,0,0,1-2.86,4.19l-5.14-3a.85.85,0,0,0-1,0c-.38.19-.57.38-.57.76a8.9,8.9,0,0,0,2.67,7,9.53,9.53,0,0,0,6.85,3,4.1,4.1,0,0,0,2.09-.38L26.87,33.89,37.15,44.17a5.2,5.2,0,0,0,3.62,1.52,5,5,0,0,0,4.95-4.95,5.2,5.2,0,0,0-1.52-3.62Z"/><path class="flexia-icon-bug" d="M34.86,24.75c.19.19.38.19.76.19H36a1,1,0,0,0,.57-1V21.51c0-.38-.38-1-.76-1a7,7,0,0,1-3.43-.76.92.92,0,0,0-1.14.38c-.19.38-.19,1,.19,1.14Z"/><path class="flexia-icon-bug" d="M45.71,9.9c-1.52-1.52-5.14-.38-7,.57L35.81,7.62c.76-2.09,1.9-5.71.57-7a.92.92,0,0,0-1.33,0,.92.92,0,0,0,0,1.33c.38.38,0,2.67-1,5.14L28,8a.87.87,0,0,0-.76,1C26.87,14.28,31.63,19,37.34,19c.38,0,1-.38,1-.76l1-6.09c2.47-1,4.76-1.33,5.14-1A.94.94,0,1,0,45.71,9.9Z"/></g></g><head xmlns=""/></svg>
								</div>	
								<h4 class="flexia-core-admin-title">Contribute to Flexia</h4>
							</header>
							<div class="flexia-core-admin-block-content">
								<p>Flexia is a free theme and always will be. You can contribute to make it better reporting bugs, creating issues, pull requests at <a href="https://github.com/rupok/flexia" target="_blank">Github.</a></p>
								<a href="https://github.com/rupok/flexia/issues/new" class="flexia-report-bug button button-primary" target="_blank">Report a bug</a>
							</div>
						</div>
						<div class="flexia-core-admin-block flexia-core-admin-block-support">
							<header class="flexia-core-admin-block-header">
								<div class="flexia-core-admin-block-header-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32.22 42.58"><defs><style>.flexia-icon-support{fill:#6c75ff;}</style></defs><title> Support Team</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="flexia-icon-support" d="M6.36,29.34l1.09-1.09h8l-5.08-9.18-3.76.76a2.64,2.64,0,0,0-2,1.91L.09,36.31a2.64,2.64,0,0,0,2.55,3.31H6.36V29.34Z"/><path class="flexia-icon-support" d="M32.13,36.31,27.67,21.75a2.64,2.64,0,0,0-2.06-1.92l-3.74-.71-5.06,9.13h8.56l1.09,1.09V39.62h3.12a2.64,2.64,0,0,0,2.55-3.31Z"/><polygon class="flexia-icon-support" points="8.54 39.62 8.24 39.62 8.24 39.62 23.98 39.62 23.98 39.62 24.28 39.62 24.28 30.43 8.54 30.43 8.54 39.62"/><rect class="flexia-icon-support" x="4.19" y="40.61" width="23.83" height="1.97"/><path class="flexia-icon-support" d="M7.62,12.65c0,.09.1.22.15.36a3.58,3.58,0,0,0,.68,1.22c1.21,3.94,4.33,6.68,7.64,6.67s6.38-2.77,7.55-6.72A3.61,3.61,0,0,0,24.31,13c.06-.14.11-.27.15-.36a2,2,0,0,0-.33-2.41V10.1C24.12,5.2,23.48,0,16,0S7.92,5,7.94,10.15c0,0,0,.06,0,.09A2,2,0,0,0,7.62,12.65Zm1-1.58h0A.55.55,0,0,0,9,10.83l1.3.2a.28.28,0,0,0,.3-.16L11.39,9a35.31,35.31,0,0,0,7.2,1,7.76,7.76,0,0,0,2.11-.25L21.23,11a.27.27,0,0,0,.25.17h.07l1.51-.43a.56.56,0,0,0,.31.3h0c.23.11.3.6.06,1.09-.06.12-.12.27-.18.43a4.18,4.18,0,0,1-.4.82.55.55,0,0,0-.26.33c-1,3.58-3.68,6.08-6.54,6.09s-5.6-2.48-6.63-6a.55.55,0,0,0-.26-.33,4.3,4.3,0,0,1-.41-.82c-.06-.15-.13-.3-.18-.42C8.37,11.68,8.44,11.19,8.67,11.08Z"/></g></g><head xmlns=""/></svg>
								</div>	
								<h4 class="flexia-core-admin-title">Need Help?</h4>
							</header>
							<div class="flexia-core-admin-block-content">
								<p>We are crafting the documentation and creating support forum. Meantime, if you need help, feel free to get in touch via live chat support at <a href="https://wpdeveloper.net" target="_blank">WPDeveloper.net.</a></p>
								<a href="https://wpdeveloper.net" class="flexia-support-btn button button-primary" target="_blank">Chat Now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="flexia-core-sidebar">
					<div class="flexia-core-sidebar-block">
						<div class="flexia-admin-sidebar-logo"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80.27 88.23"><defs><style>.cls-1{fill:#ee3560;}</style></defs><title>Flexia Logo</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M70.55,14.31,44.24,1.41a13.82,13.82,0,0,0-13.79.94L6.12,18.68A13.82,13.82,0,0,0,0,31.1L2,60.33A13.82,13.82,0,0,0,9.72,71.81L43.2,88.23l.07,0L14.74,45.69a9.66,9.66,0,0,1,2.64-13.41L37.32,18.9a6.69,6.69,0,0,1,10.37,4.67h0A6.69,6.69,0,0,1,44.78,30L28.28,41.09l6.3,9.38.27.41L42.31,62,43,63,54.73,80.48l19.42-13A13.82,13.82,0,0,0,80.24,55l-2-29.24A13.82,13.82,0,0,0,70.55,14.31Zm-19,41.48-5.46,3.66L38.63,48.34l5.46-3.66a6.69,6.69,0,0,1,10.37,4.67h0A6.69,6.69,0,0,1,51.55,55.79Z"/></g></g></svg>
						</div>
						<?php echo '<img class="flexia-admin-sidebar-logo-text" src="' . plugins_url( 'img/flexia-logo-text.png', dirname(__FILE__) ) . '" > '; ?>
					</div>
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
				<div class="flexia-logo-inline"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80.27 88.23"><defs><style>.cls-1{fill:#ee3560;}</style></defs><title>Flexia Logo</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M70.55,14.31,44.24,1.41a13.82,13.82,0,0,0-13.79.94L6.12,18.68A13.82,13.82,0,0,0,0,31.1L2,60.33A13.82,13.82,0,0,0,9.72,71.81L43.2,88.23l.07,0L14.74,45.69a9.66,9.66,0,0,1,2.64-13.41L37.32,18.9a6.69,6.69,0,0,1,10.37,4.67h0A6.69,6.69,0,0,1,44.78,30L28.28,41.09l6.3,9.38.27.41L42.31,62,43,63,54.73,80.48l19.42-13A13.82,13.82,0,0,0,80.24,55l-2-29.24A13.82,13.82,0,0,0,70.55,14.31Zm-19,41.48-5.46,3.66L38.63,48.34l5.46-3.66a6.69,6.69,0,0,1,10.37,4.67h0A6.69,6.69,0,0,1,51.55,55.79Z"/></g></g></svg>
				</div>
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
