<?php

if ( ! class_exists( 'Flexia_Core_Plugin_Installer' ) ) :

/**
 * Flexia Core Plugin Installer Class
 *
 * @since 	1.0.0
 */
class Flexia_Core_Plugin_Installer {

	public function __construct() {
		add_action( 'init', array( $this, 'init_hooks' ) );
	}

	/**
	 * Initialized Hooks
	 */
	public function init_hooks() {
		if( !current_user_can( 'manage_options' ) ) {
			return;
		}

		add_action( 'wp_ajax_free_plugins_installer', array( $this, 'free_plugins_installer' ) );
	}

	/**
	 * Fail if plugin install/activation fails
	 */
	public function fail_on_error( $thing ) {
        if ( is_wp_error( $thing ) ) {
            wp_send_json_error( $thing->get_error_message() );
        }
    }

    /**
     * Install or Acitavte a plugin
     */
    public static function free_plugins_installer( $plugins ) {
    	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
    	include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

    	foreach( $plugins as $plugin ) {
	    	$plugin_basename = $plugin['slug'] . '/' . $plugin['file'];

	    	// When plugin exists but not activated
	    	// if( file_exists( WP_PLUGIN_DIR . '/' . $plugin_basename ) ) {
	    	// 	return activate_plugin( $plugin_basename );
	    	// }

	    	// If plugin is not exists then Download and Activate it.
	    	$upgrader = new Plugin_Upgrader( new WP_Ajax_Upgrader_Skin() );

	    	$api = plugins_api( 'plugin_information',
	    		array(
	    			'slug' => $plugin['slug'],
	    			'fields' => array(
	    				'short_description' => true,
	    				'sections' 			=> false,
						'requires' 			=> false,
						'downloaded' 		=> true,
						'last_updated' 		=> false,
						'added' 			=> false,
						'tags' 				=> false,
						'compatibility' 	=> false,
						'homepage' 			=> false,
						'donate_link' 		=> false,
						'icons' 			=> false,
						'banners' 			=> true,
	    			),
	    		)
	    	);

	    	// $result = $upgrader->install( $api->download_link );
	    	// if( is_wp_error( $result ) ) {
	    	// 	return $result;
	    	// }

	    	self::render_template( $plugin, $api );
    	}
    }

    public static function render_template( $plugin, $api ) {
    	?>
		<div class="flexia-plugins">
		    <div class="header">
		        <img src="<?php echo $api->banners['high']; ?>" alt="">
		    </div>
		    <div class="content">
		        <h4 class="title"><?php echo $api->name; ?></h4>
		        <p><?php echo $api->short_description; ?></p>
		        <span class="by-author"><?php _e( 'By:', 'flexia-core' ); ?> <?php echo $api->author; ?></span>
		    </div>
		    <div class="footer">
		        <div class="footer-left">
		            <ul>
		                <li>
		                    <button type="submit" class="button button-secondary">Install Now</button>
		                </li>
		                <li><a href="https://wordpress.org/plugins/<?php echo $api->slug; ?>/" target="_blank"><?php _e( 'More Details', 'flexia-core' ); ?></a></li>
		            </ul>
		        </div>
		        <div class="footer-right">
		            <span class="tag-free">Free</span>
		        </div>
		    </div>
		</div>
    	<?php
    }

}
endif;