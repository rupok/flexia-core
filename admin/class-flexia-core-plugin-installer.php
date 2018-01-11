<?php

if ( ! class_exists( 'Flexia_Core_Plugin_Installer' ) ) :

/**
 * Flexia Core Plugin Installer Class
 *
 * @since 	1.0.0
 */
class Flexia_Core_Plugin_Installer {

	public $free_plugins;
	public $pro_plugins;

	public function __construct() {
		add_action( 'init', array( $this, 'init_hooks' ) );
	}

	/**
	 * Initialized Hooks
	 *
	 * @since   1.0.0
	 */
	public function init_hooks() {
		if( !current_user_can( 'manage_options' ) ) {
			return;
		}

		add_action( 'admin_notices', array( $this, 'free_plugins_activation_script' ) );
		add_action( 'wp_ajax_fc_free_plugin_installer', array( $this, 'free_plugins_installer' ) );
	}

	/**
	 * Fail if plugin install/activation fails
	 *
	 * @since   1.0.0
	 */
	public function fail_on_error( $thing ) {
        if ( is_wp_error( $thing ) ) {
            wp_send_json_error( $thing->get_error_message() );
        }
    }

    /**
     * Generates all free plugins
	 *
	 * @since   1.0.0
     */
    public function free_plugins() {
    	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
    	include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

    	$this->free_plugins = array(
			array(
				'slug' 	=> 'elementor',
				'file'	=> 'elementor.php',
			),
			array(
				'slug' 	=> 'essential-addons-for-elementor-lite',
				'file'	=> 'essential-addons-for-elementor.php',
			),
			array(
				'slug' 	=> 'woocommerce',
				'file'	=> 'woocommerce.php',
			),
			array(
				'slug' 	=> 'wordpress-seo',
				'file'	=> 'wp-seo-main.php',
			),
		);

    	foreach( $this->free_plugins as $plugin ) {
	    	$plugin_basename = $plugin['slug'] . '/' . $plugin['file'];

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
	    	$main_plugin_file = $this->get_plugin_file( $plugin['slug'] );
	    	if( !empty( $main_plugin_file ) && !is_plugin_active( $main_plugin_file ) ) {
	    		$btn_class = 'button button-primary';
	    		$btn_text = __( 'Activate', 'flexia-core' );
	    	}else if( is_plugin_active( $main_plugin_file ) ) {
	    		$btn_class = 'button button-secondary disabled';
	    		$btn_text = __( 'Activated', 'flexia-core' );
	    	}else {
	    		$btn_class = 'activate button button-secondary';
	    		$btn_text = __( 'Install Now', 'flexia-core' );
	    	}

	    	$slug_name = $plugin['slug'];
	    	$file_name = $plugin['file'];
	    	self::render_template( $plugin, $api, $slug_name, $file_name, $btn_class, $btn_text );
	    	
	    	
    	}
    }

    /**
	 * A method to get the main plugin file
	 *
	 * @since   1.0.0
	 */
	public function get_plugin_file( $plugin_slug ) {
		require_once( ABSPATH . '/wp-admin/includes/plugin.php' ); // Load plugin lib

		$plugins = get_plugins();

		foreach( $plugins as $plugin_file => $plugin_info ) {

			// Get the basename of the plugin e.g. [askismet]/askismet.php
			$slug = dirname( plugin_basename( $plugin_file ) );

			if( $slug ) {
				if ( $slug == $plugin_slug ) {
					return $plugin_file; // If $slug = $plugin_name
				}
			}
		}

		return null;
	}

    /**
     * Plugin Activation Script
	 *
	 * @since   1.0.0
     */
    public function free_plugins_activation_script() {
    	?>
		<script type="text/javascript">
            jQuery(document).ready( function($) {
                $( '.install-btn' ).on( 'click', function(e) {
                    var self = $(this);
                    e.preventDefault();
                    var fileName = self.attr( 'data-file-name' );
                    var slugName = self.attr( 'data-slug' );
                    self.addClass('install-now updating-message');
                    self.text('<?php echo esc_js( 'processing...' ); ?>');

                    $.ajax({
                        url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
                        type: 'post',
                        data: {
                            action: 'fc_free_plugin_installer',
                            slug: slugName,
                            file: fileName,
                            _wpnonce: '<?php echo wp_create_nonce('fc_free_plugin_installer'); ?>'
                        },
                        success: function(response) {
                            self.text('<?php echo esc_js( 'Activated' ); ?>');
                            self.removeClass('button-primary');
                            self.addClass('button-secondary');
                            self.attr('disabled', 'disabled');
                            // console.log( response );
                        },
                        error: function(error) {
                        	self.text('<?php echo esc_js( 'Try Again!' ); ?>');
                            self.removeClass('install-now updating-message');
                            // console.log( error );
                        },
                        complete: function() {
                            self.removeClass('install-now updating-message');
                        }
                    });
                });
            } );
        </script>
    	<?php
    }

    /**
     * Install \ Activate a plugin
	 *
	 * @since   1.0.0
     */
    public function free_plugins_installer() {
    	check_ajax_referer( 'fc_free_plugin_installer' );

        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( __( 'You don\'t have permission to install the plugins' ) );
        }

        $slug_name = $_POST['slug'];
        $file_name = $_POST['file'];

        $install_status = $this->install_a_free_plugin( $slug_name, $file_name );
        $this->fail_on_error( $install_status );

        wp_send_json_success();
    }

    /**
     * Install a free plugin
	 *
	 * @since   1.0.0
     */
    public function install_a_free_plugin( $slug, $file ) {
    	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
        include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

        $plugin_basename = $slug . '/' . $file;

        // if exists and not activated
        if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin_basename ) ) {
            return activate_plugin( $plugin_basename );
        }

        // seems like the plugin doesn't exists. Download and activate it
        $upgrader = new Plugin_Upgrader( new WP_Ajax_Upgrader_Skin() );

        $api      = plugins_api( 'plugin_information', array( 'slug' => $slug, 'fields' => array( 'sections' => false ) ) );
        $result   = $upgrader->install( $api->download_link );

        if ( is_wp_error( $result ) ) {
            return $result;
        }

        return activate_plugin( $plugin_basename );
    }

    /**
     * This method will render recomended plugin block
	 *
	 * @since   1.0.0
     */
    public static function render_template( $plugin, $api, $slug_name, $file_name, $btn_class, $btn_text ) {
    	?>
		<div class="flexia-plugins">
		    <div class="header">
		        <img src="<?php echo $api->banners['high']; ?>" alt="<?php echo esc_attr( $slug_name ); ?>">
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
		                    <button type="submit" class="<?php echo esc_attr( $btn_class ) ?> install-btn" data-slug = "<?php echo esc_attr( $slug_name ); ?>" data-file-name="<?php echo esc_attr( $file_name ); ?>"><?php echo $btn_text; ?></button>
		                </li>
		                <li><a href="https://wordpress.org/plugins/<?php echo $api->slug; ?>/" target="_blank"><?php _e( 'More Details', 'flexia-core' ); ?></a></li>
		            </ul>
		        </div>
		        <div class="footer-right">
		            <span class="tag-free"><?php  _e( 'Free', 'flexia-core' ) ?></span>
		        </div>
		    </div>
		</div>
    	<?php
    }

    /**
     * Generates all premium plugins
	 *
	 * @since   1.0.0
     */
    public function premium_plugins() {
    	$this->pro_plugins = array(
    		array(
				'name' 	=> 'Essential Addons for Elementor - Pro',
				'url'	=> 'https://wpdeveloper.net/flexia-essential-addons-elementor',
				'desc'	=> 'Ultimate elements  library for Elementor WordPress Page Builder. 30+ stunning elements for Elementor.',
				'author' => 'Codetic',
				'author_url' => 'https://essential-addons.com',
				'banner' =>  plugins_url( 'img/eael-pro-banner.png', __FILE__ ),
				'doc_url' => 'https://essential-addons.com/elementor',
			),
		);

    	foreach( $this->pro_plugins as $plugin ) {
	    	self::render_premium_template(
	    		$plugin['name'],
	    		$plugin['url'],
	    		$plugin['desc'],
	    		$plugin['author'],
	    		$plugin['author_url'],
	    		$plugin['banner'],
	    		$plugin['doc_url']
	    	);
    	}
    }

    /**
     * This method will render premium plugin block
	 *
	 * @since   1.0.0
     */
    public static function render_premium_template( $name, $url, $desc, $author, $author_url, $banner, $doc_url ) {
    	?>
		<div class="flexia-plugins">
		    <div class="header">
		        <img src="<?php echo esc_url( $banner ); ?>" alt="<?php echo esc_attr( $name ); ?>">
		    </div>
		    <div class="content">
		        <h4 class="title"><?php _e( $name, 'felxia-core' ); ?></h4>
		        <p><?php echo esc_html( $desc, 'flexia-core' ); ?></p>
		        <span class="by-author"><?php _e( 'By:', 'flexia-core' ); ?> <a href="<?php echo esc_url( $author_url ); ?>"><?php echo esc_html( $author, 'flexia-core' ); ?></a></span>
		    </div>
		    <div class="footer">
		        <div class="footer-left">
		            <ul>
		                <li>
		                    <a href="<?php echo esc_url( $url ); ?>" class="button button-secondary"><?php _e( 'Get Now', 'flexia-core' ); ?></a>
		                </li>
		                <li><a href="<?php echo esc_url( $doc_url ); ?>" target="_blank"><?php _e( 'More Details', 'flexia-core' ); ?></a></li>
		            </ul>
		        </div>
		        <div class="footer-right">
		            <span class="tag-pro"><?php  _e( 'Premium', 'flexia-core' ) ?></span>
		        </div>
		    </div>
		</div>
    	<?php
    }

}
endif;