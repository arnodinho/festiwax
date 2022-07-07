<?php
/**
 * Wizard
 *
 * @package Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */

class Whizzie {

	protected $version = '1.1.0';

	public static $is_valid_key = 'false';
	public static $theme_key 		= '';

	/** @var string Current theme name, used as namespace in actions. */
	protected $theme_name = '';
	protected $theme_title = '';

	/** @var string Wizard page slug and title. */
	protected $page_slug = '';
	protected $page_title = '';

	/** @var array Wizard steps set by user. */
	protected $config_steps = array();

	/**
	 * Relative plugin url for this plugin folder
	 * @since 1.0.0
	 * @var string
	 */
	protected $plugin_url = '';

	/**
	 * TGMPA instance storage
	 *
	 * @var object
	 */
	protected $tgmpa_instance;

	/**
	 * TGMPA Menu slug
	 *
	 * @var string
	 */
	protected $tgmpa_menu_slug = 'tgmpa-install-plugins';

	/**
	 * TGMPA Menu url
	 *
	 * @var string
	 */
	protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';

	// Where to find the widget.wie file
	protected $widget_file_url = '';

	/**
	 * Constructor
	 *
	 * @param $config	Our config parameters
	 */
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();
	}

	public static function get_the_validation_status() {
		return get_option('drop_shipping_pro_theme_validation_status');
	}

	public static function set_the_validation_status($is_valid) {
		update_option('drop_shipping_pro_theme_validation_status', $is_valid);
	}
	public static function get_the_suspension_status() {
		return get_option( 'drop_shipping_pro_theme_suspension_status' );
	}

	public static function set_the_suspension_status( $is_suspended ) {
		update_option( 'drop_shipping_pro_theme_suspension_status' , $is_suspended );
	}
	public static function set_the_theme_key($the_key) {
		update_option('drop_shipping_pro_theme_key', $the_key);
	}

	public static function remove_the_theme_key() {
		delete_option('drop_shipping_pro_theme_key');
	}

	public static function get_the_theme_key() {
		return get_option('drop_shipping_pro_theme_key');
	}

	/**
	 * Set some settings
	 * @since 1.0.0
	 * @param $config	Our config parameters
	 */
	public function set_vars( $config ) {

		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/class-tgm-plugin-activation.php';
		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/tgm.php';
		require_once trailingslashit( WHIZZIE_DIR ) . 'widgets/class-bwp-widget-importer.php';

		if( isset( $config['page_slug'] ) ) {
			$this->page_slug = esc_attr( $config['page_slug'] );
		}
		if( isset( $config['page_title'] ) ) {
			$this->page_title = esc_attr( $config['page_title'] );
		}
		if( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}

		$this->plugin_path = trailingslashit( dirname( __FILE__ ) );
		$relative_url = str_replace( get_template_directory(), '', $this->plugin_path );
		$this->plugin_url = trailingslashit( get_template_directory_uri() . $relative_url );
		$current_theme = wp_get_theme();
		$this->theme_title = $current_theme->get( 'Name' );
		$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $current_theme->get( 'Name' ) ) );
		$this->page_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_page_slug', $this->theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_parent_slug', '' );

		$this->widget_file_url = trailingslashit( WHIZZIE_DIR ) . 'widgets/dropshipping-store-pro-widgets.wie';

	}

	/**
	 * Hooks and filters
	 * @since 1.0.0
	 */
	public function init() {

		add_action( 'after_switch_theme', array( $this, 'redirect_to_wizard' ) );
		if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
			add_action( 'init', array( $this, 'get_tgmpa_instance' ), 30 );
			add_action( 'init', array( $this, 'set_tgmpa_url' ), 40 );
		}
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'admin_init', array( $this, 'get_plugins' ), 30 );
		add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10, 1 );
		add_action( 'wp_ajax_setup_plugins', array( $this, 'setup_plugins' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );

		add_action( 'wp_ajax_wz_activate_drop_shipping_pro', array( $this, 'wz_activate_drop_shipping_pro' ) );
	}

	public function redirect_to_wizard() {
		global $pagenow;
		if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
			wp_redirect( admin_url( 'themes.php?page=' . esc_attr( $this->page_slug ) ) );
		}
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'theme-wizard-style', get_template_directory_uri() . '/theme-wizard/assets/css/theme-wizard-style.css');
		wp_register_script( 'theme-wizard-script', get_template_directory_uri() . '/theme-wizard/assets/js/theme-wizard-script.js', array( 'jquery' ), time() );
		wp_localize_script(
			'theme-wizard-script',
			'drop_shipping_pro_whizzie_params',
			array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'wpnonce' 		=> wp_create_nonce( 'whizzie_nonce' ),
				'verify_text'	=> esc_html( 'verifying', 'dropshipping-store-pro' )
			)
		);
		wp_enqueue_script( 'theme-wizard-script' );
		wp_enqueue_script( 'dropshipping-store-pro-notify-popup', get_template_directory_uri() . '/assets/js/notify.min.js');
	}

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function tgmpa_load( $status ) {
		return is_admin() || current_user_can( 'install_themes' );
	}

	/**
	 * Get configured TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function get_tgmpa_instance() {
		$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
	}

	/**
	 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function set_tgmpa_url() {
		$this->tgmpa_menu_slug = ( property_exists( $this->tgmpa_instance, 'menu' ) ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
		$this->tgmpa_menu_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug );
		$tgmpa_parent_slug = ( property_exists( $this->tgmpa_instance, 'parent_slug' ) && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';
		$this->tgmpa_url = apply_filters( $this->theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug );
	}

	/**
	 * Make a modal screen for the wizard
	 */
	public function menu_page() {
		add_menu_page(
			esc_html( $this->page_title ),
			esc_html( $this->page_title ),
			'manage_options',
			$this->page_slug,
			array( $this, 'drop_shipping_pro_mostrar_guide' )
		);
	}

	public function activation_page() {
		$theme_key 						= Whizzie::get_the_theme_key();
		$validation_status 		= Whizzie::get_the_validation_status();
		?>
		<div class="wrap">
			<label><?php esc_html_e('Enter Your Theme License Key:','dropshipping-store-pro'); ?></label>
			<form id="drop_shipping_pro_license_form">
				<input type="text" name="drop_shipping_pro_license_key" value="<?php echo $theme_key ?>" <?php if($validation_status === 'true') { echo "disabled"; } ?> required placeholder="License Key" />
				<div class="licence-key-button-wrap">
					<button class="button" type="submit" name="button" <?php if($validation_status === 'true') { echo "disabled"; } ?>>
						<?php if ($validation_status === 'true') {
						?>
							Activated
						<?php
						} else { ?>
							Activate
						<?php
						}
						?>
					</button>

					<?php if ($validation_status === 'true') { ?>
						<button id="change--key" class="button" type="button" name="button">
							Change Key
						</button>

						<div class="next-button">
						<button id="start-now-next" class="button" type="button" name="button">
							Next
						</button>
					</div>
					<?php } ?>
				</div>
			</form>
		</div>
		<?php
	}

	public function drop_shipping_pro_mostrar_guide() {

		$display_string = '';

		// Check the validation Start
		$drop_shipping_pro_license_key = Whizzie::get_the_theme_key();
		$endpoint = IBTANA_THEME_LICENCE_ENDPOINT.'ibtana_client_premium_theme_check_activation_status';
		$body = [
			'theme_license_key'  => $drop_shipping_pro_license_key,
			'site_url'					 => site_url(),
			'theme_text_domain'	 => wp_get_theme()->get( 'TextDomain' )
		];
		$body = wp_json_encode( $body );
		$options = [
			'body'        => $body,
			'headers'     => [
				'Content-Type' => 'application/json',
			]
		];
		$response = wp_remote_post( $endpoint, $options );
		if ( is_wp_error( $response ) ) {
			// Whizzie::set_the_validation_status('false');
		} else {
			$response_body = wp_remote_retrieve_body( $response );
			$response_body = json_decode($response_body);

			if ( $response_body->is_suspended == 1 ) {
				Whizzie::set_the_suspension_status( 'true' );
			} else {
				Whizzie::set_the_suspension_status( 'false' );
			}

			$display_string = isset($response_body->display_string) ? $response_body->display_string : '';

			if ($display_string != '') {
				if (strpos($display_string, '[THEME_NAME]') !== false) {
					$display_string = str_replace( "[THEME_NAME]", "Dropshipping Store Pro", $display_string );
				}
				if (strpos($display_string, '[THEME_PERMALINK]') !== false) {
					$display_string = str_replace("[THEME_PERMALINK]", "https://BuyWpTemplates.com/themes/dropshipping-store-pro/", $display_string);
				}
			}


			if ( $display_string != '' ) {
				echo '<div class="notice is-dismissible error thb_admin_notices">' . $display_string . '</div>';
			}

			if ($response_body->status === false) {
				Whizzie::set_the_validation_status('false');
			} else {
				Whizzie::set_the_validation_status('true');
			}
		}
		// Check the validation END

		$theme_validation_status = Whizzie::get_the_validation_status();

		//custom function about theme customizer
		$return = add_query_arg( array()) ;
		$theme = wp_get_theme( 'dropshipping-store-pro' );

		?>
		<div class="wrapper-info get-stared-page-wrap">

			<div class="tab-sec theme-option-tab">

				<div class="tab">
					<button class="tablinks active" data-tab="theme_activation">
						<?php _e( 'Key Activation', 'dropshipping-store-pro' ); ?>
					</button>
					<button class="tablinks wizard-tab" data-tab="demo_offer">
						<?php _e( 'BWT Setup Wizard', 'dropshipping-store-pro' ); ?>
					</button>
				</div>

				<div id="theme_activation" class="tabcontent open">
					<div class="theme_activation-wrapper">
						<span class="theme-license-message">
							<?php esc_html_e('Check your theme license key in ','dropshipping-store-pro'); ?>
							<a href="<?php echo esc_url('https://www.buywptemplates.com/my-account/'); ?>" target="_blank"><?php esc_html_e(' My Account','dropshipping-store-pro'); ?></a>
						</span>
						<div class="theme_activation_spinner">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="50px" height="50px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
								<g transform="translate(50,50)">
									<g transform="scale(0.7)">
										<circle cx="0" cy="0" r="50" fill="#0f81d0"></circle>
										<circle cx="0" cy="-28" r="15" fill="#cfd7dd">
											<animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 0 0;360 0 0"></animateTransform>
										</circle>
									</g>
								</g>
							</svg>
						</div>
						<div class="theme-wizard-key-status">
							<?php
							if ( $theme_validation_status === 'false' ) {
								esc_html_e('Theme License Key is not activated!','dropshipping-store-pro');
							} else {
								esc_html_e('Theme License is Activated!','dropshipping-store-pro');
							}
							?>
						</div>
						<?php $this->activation_page(); ?>
					</div>
				</div>

				<div id="demo_offer" class="tabcontent">
					<?php $this->wizard_page(); ?>
				</div>

			</div>

		</div>
		<?php
	}

	/**
	 * Make an interface for the wizard
	 */
	public function wizard_page() {

		tgmpa_load_bulk_installer();

		// install plugins with TGM.
		if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
			die( 'Failed to find TGM' );
		}
		$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'whizzie-setup' );

		// copied from TGM
		$method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
		$fields = array_keys( $_POST ); // Extra fields to pass to WP_Filesystem.
		if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
			return true; // Stop the normal page form from displaying, credential request form will be shown.
		}
		// Now we have some credentials, setup WP_Filesystem.
		if ( ! WP_Filesystem( $creds ) ) {
			// Our credentials were no good, ask the user for them again.
			request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
			return true;
		}

		/* If we arrive here, we have the filesystem */ ?>
		<div class="">
			<?php
			//printf( '<h1>%s</h1>', esc_html( $this->page_title ) );
			echo '<div class="card whizzie-wrap">';
				// The wizard is a list with only one item visible at a time
				$steps = $this->get_steps();
				echo '<ul class="whizzie-menu">';
				foreach( $steps as $step ) {
					$class = 'step step-' . esc_attr( $step['id'] );
					echo '<li data-step="' . esc_attr( $step['id'] ) . '" class="' . esc_attr( $class ) . '">';
						printf(
							'<h2>%s</h2>',
							esc_html( $step['title'] )
						);
						// $content is split into summary and detail
						$content = call_user_func( array( $this, $step['view'] ) );
						if( isset( $content['summary'] ) ) {
							printf(
								'<div class="summary">%s</div>',
								wp_kses_post( $content['summary'] )
							);
						}
						if( isset( $content['detail'] ) ) {
							// Add a link to see more detail
							//printf( '<p><a href="#" class="more-info">%s</a></p>', __( 'More Info', 'dropshipping-store-pro' ) );
							printf(
								'<div class="detail">%s</div>',
								$content['detail'] // Need to escape this
							);
						}


						printf('<div class="wizard-button-wrapper">');
						if (Whizzie::get_the_validation_status() === 'true') {
							// The next button
							if( isset( $step['button_text'] ) && $step['button_text'] ) {
								printf(
									'<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( $step['callback'] ),
									esc_attr( $step['id'] ),
									esc_html( $step['button_text'] )
								);
							}
							// The skip button
							if( isset( $step['can_skip'] ) && $step['can_skip'] ) {
								printf(
									'<div class="button-wrap" style="margin-left: 0.5em;"><a href="#" class="button button-secondary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									'do_next_step',
									esc_attr( $step['id'] ),
									__( 'Skip', 'dropshipping-store-pro' )
								);
							}
						} else {
							printf(
								'<div class="button-wrap"><a href="#" class="button button-primary key-activation-tab-click">%s</a></div>',
								esc_html( __( 'Activate Your License', 'dropshipping-store-pro' ) )
							);
						}
						printf('</div>');

					echo '</li>';
				}
				echo '</ul>';
				echo '<ul class="whizzie-nav">';
					foreach( $steps as $step ) {
						if( isset( $step['icon'] ) && $step['icon'] ) {
							echo '<li class="nav-step-' . esc_attr( $step['id'] ) . '"><span class="dashicons dashicons-' . esc_attr( $step['icon'] ) . '"></span></li>';
						}
					}
				echo '</ul>';
				?>
				<div class="step-loading"><span class="spinner"></span></div>
			</div><!-- .whizzie-wrap -->

		</div><!-- .wrap -->
	<?php }

	/**
	 * Set options for the steps
	 * Incorporate any options set by the theme dev
	 * Return the array for the steps
	 * @return Array
	 */
	public function get_steps() {
		$dev_steps = $this->config_steps;
		$steps = array(
			'intro' => array(
				'id'			=> 'intro',
				'title'			=> __( 'Welcome to ', 'dropshipping-store-pro' ) . $this->theme_title,
				'icon'			=> 'dashboard',
				'view'			=> 'get_step_intro', // Callback for content
				'callback'		=> 'do_next_step', // Callback for JS
				'button_text'	=> __( 'Start Now', 'dropshipping-store-pro' ),
				'can_skip'		=> false // Show a skip button?
			),
			'plugins' => array(
				'id'			=> 'plugins',
				'title'			=> __( 'Plugins', 'dropshipping-store-pro' ),
				'icon'			=> 'admin-plugins',
				'view'			=> 'get_step_plugins',
				'callback'		=> 'install_plugins',
				'button_text'	=> __( 'Install Plugins', 'dropshipping-store-pro' ),
				'can_skip'		=> true
			),
			'widgets' => array(
				'id'			=> 'widgets',
				'title'			=> __( 'Demo Importer', 'dropshipping-store-pro' ),
				'icon'			=> 'welcome-widgets-menus',
				'view'			=> 'get_step_widgets',
				'callback'		=> 'install_widgets',
				'button_text'	=> __( 'Import Demo', 'dropshipping-store-pro' ),
				'can_skip'		=> true
			),
			'done' => array(
				'id'			=> 'done',
				'title'			=> __( 'All Done', 'dropshipping-store-pro' ),
				'icon'			=> 'yes',
				'view'			=> 'get_step_done',
				'callback'		=> ''
			)
		);

		// Iterate through each step and replace with dev config values
		if( $dev_steps ) {
			// Configurable elements - these are the only ones the dev can update from config.php
			$can_config = array( 'title', 'icon', 'button_text', 'can_skip' );
			foreach( $dev_steps as $dev_step ) {
				// We can only proceed if an ID exists and matches one of our IDs
				if( isset( $dev_step['id'] ) ) {
					$id = $dev_step['id'];
					if( isset( $steps[$id] ) ) {
						foreach( $can_config as $element ) {
							if( isset( $dev_step[$element] ) ) {
								$steps[$id][$element] = $dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $steps;
	}

	/**
	 * Print the content for the intro step
	 */
	public function get_step_intro() { ?>
		<div class="summary">
			<p>
				<?php esc_html_e('Thank you for choosing this '.$this->theme_title.' Theme. Using this quick setup wizard, you will be able to configure your new website and get it running in just a few minutes. Just follow these simple steps mentioned in the wizard and get started with your website.','dropshipping-store-pro'); ?>
			</p>
			<p>
				<?php esc_html_e('You may even skip the steps and get back to the dashboard if you have no time at the present moment. You can come back any time if you change your mind.','dropshipping-store-pro'); ?>
			</p>
		</div>
	<?php }

	/**
	 * Get the content for the plugins step
	 * @return $content Array
	 */
	public function get_step_plugins() {
		$plugins = $this->get_plugins();
		$content = array(); ?>
			<div class="summary">
				<p>
					<?php esc_html_e('Additional plugins always make your website exceptional. Install these plugins by clicking the install button. You may also deactivate them from the dashboard.','dropshipping-store-pro') ?>
				</p>
			</div>
		<?php // The detail element is initially hidden from the user
		$content['detail'] = '<ul class="whizzie-do-plugins">';
		// Add each plugin into a list
		foreach( $plugins['all'] as $slug=>$plugin ) {
			$content['detail'] .= '<li data-slug="' . esc_attr( $slug ) . '">' . esc_html( $plugin['name'] ) . '<span>';
			$keys = array();
			if ( isset( $plugins['install'][ $slug ] ) ) {
			    $keys[] = 'Installation';
			}
			if ( isset( $plugins['update'][ $slug ] ) ) {
			    $keys[] = 'Update';
			}
			if ( isset( $plugins['activate'][ $slug ] ) ) {
			    $keys[] = 'Activation';
			}
			$content['detail'] .= implode( ' and ', $keys ) . ' required';
			$content['detail'] .= '</span></li>';
		}
		$content['detail'] .= '</ul>';

		return $content;
	}

	/**
	 * Print the content for the widgets step
	 * @since 1.1.0
	 */
	public function get_step_widgets() { ?>
		<div class="summary">
			<p>
				<?php esc_html_e('This theme supports importing the demo content and adding widgets. Get them installed with the below button. Using the Customizer, it is possible to update or even deactivate them','dropshipping-store-pro'); ?>
			</p>
		</div>
	<?php }

	/**
	 * Print the content for the final step
	 */
	public function get_step_done() { ?>
		<div id="bwt-demo-setup-guid">
			<p>
				<?php echo esc_html('Your demo content has been imported successfully . Click on the finish button for more information.'); ?>
			</p>
			<div class="finish-buttons">
				<a href="<?php echo esc_url(admin_url('/customize.php')); ?>" class="wz-btn-customizer" target="_blank"><?php esc_html_e('Customize Your Demo','dropshipping-store-pro') ?></a>
				<a href="<?php echo esc_url(site_url()); ?>" class="wz-btn-visit-site" target="_blank"><?php esc_html_e('Visit Your Site','dropshipping-store-pro'); ?></a>
			</div>
			<div class="bwt-setup-finish">
				<a href="<?php echo esc_url(admin_url()); ?>" class="button button-primary">Finish</a>
			</div>
		</div>

	<?php }

	/**
	 * Get the plugins registered with TGMPA
	 */
	public function get_plugins() {
		$instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		$plugins = array(
			'all' 		=> array(),
			'install'	=> array(),
			'update'	=> array(),
			'activate'	=> array()
		);
		foreach( $instance->plugins as $slug=>$plugin ) {
			if( $instance->is_plugin_active( $slug ) && false === $instance->does_plugin_have_update( $slug ) ) {
				// Plugin is installed and up to date
				continue;
			} else {
				$plugins['all'][$slug] = $plugin;
				if( ! $instance->is_plugin_installed( $slug ) ) {
					$plugins['install'][$slug] = $plugin;
				} else {
					if( false !== $instance->does_plugin_have_update( $slug ) ) {
						$plugins['update'][$slug] = $plugin;
					}
					if( $instance->can_plugin_activate( $slug ) ) {
						$plugins['activate'][$slug] = $plugin;
					}
				}
			}
		}
		return $plugins;
	}

	/**
	 * Get the widgets.wie file from the /content folder
	 * @return Mixed	Either the file or false
	 * @since 1.1.0
	 */
	public function has_widget_file() {
		if( file_exists( $this->widget_file_url ) ) {
			return true;
		}
		return false;
	}

	public function setup_plugins() {
		if ( ! check_ajax_referer( 'whizzie_nonce', 'wpnonce' ) || empty( $_POST['slug'] ) ) {
			wp_send_json_error( array( 'error' => 1, 'message' => esc_html__( 'No Slug Found','dropshipping-store-pro' ) ) );
		}
		$json = array();
		// send back some json we use to hit up TGM
		$plugins = $this->get_plugins();

		// what are we doing with this plugin?
		foreach ( $plugins['activate'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-activate',
					'action2'       => - 1,
					'message'       => esc_html__( 'Activating Plugin','dropshipping-store-pro' ),
				);
				break;
			}
		}
		foreach ( $plugins['update'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-update',
					'action2'       => - 1,
					'message'       => esc_html__( 'Updating Plugin','dropshipping-store-pro' ),
				);
				break;
			}
		}
		foreach ( $plugins['install'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-install',
					'action2'       => - 1,
					'message'       => esc_html__( 'Installing Plugin','dropshipping-store-pro' ),
				);
				break;
			}
		}
		if ( $json ) {
			$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
			wp_send_json( $json );
		} else {
			wp_send_json( array( 'done' => 1, 'message' => esc_html__( 'Success','dropshipping-store-pro' ) ) );
		}
		exit;
	}

	public function theme_create_customizer_nav_menu(){

		 // ------- Create Nav Menu --------
        $menuname = $lblg_themename . 'Primary Menu';
		$bpmenulocation = 'primary';
		$menu_exists = wp_get_nav_menu_object( $menuname );

		if( !$menu_exists){
		    $menu_id = wp_create_nav_menu($menuname);
		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Home','dropshipping-store-pro'),
		        'menu-item-classes' => 'fa fa-home home',
		        'menu-item-url' => home_url( '/' ),
		        'menu-item-status' => 'publish'));

		    $parent_shop_item = wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Shops','dropshipping-store-pro'),
		        'menu-item-classes' => 'fas fa-shopping-basket shop',
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Product List','dropshipping-store-pro'),
		        'menu-item-classes' => 'shop',
		        'menu-item-url' => home_url( '/index.php/shop/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $parent_shop_item
		    ));	

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Simple Product','dropshipping-store-pro'),
		        'menu-item-classes' => 'simple-product',
		        'menu-item-url' => home_url( '/index.php/product/powerbeats3-wireless-earphones/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $parent_shop_item
		    ));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Variable Product','dropshipping-store-pro'),
		        'menu-item-classes' => 'variable-product',
		        'menu-item-url' => home_url( '/index.php/product/classic-watch/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $parent_shop_item
		    )); 

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Wishlist','dropshipping-store-pro'),
		        'menu-item-classes' => 'wishlist',
		        'menu-item-url' => home_url( '/index.php/wishlist/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $parent_shop_item
		    )); 

		    $pageparent_item = wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Pages','dropshipping-store-pro'),
		        'menu-item-classes' => 'far fa-file-alt pages',
		        'menu-item-status' => 'publish',));

	      	wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Page with Left Sidebar','dropshipping-store-pro'),
		        'menu-item-classes' => 'page-with-left-sidebar',
		        'menu-item-url' => home_url( '/index.php/page-with-left-sidebar/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $pageparent_item
		    ));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Page with Right Sidebar','dropshipping-store-pro'),
		        'menu-item-classes' => 'page-with-right-sidebar',
		        'menu-item-url' => home_url( '/index.php/page-with-right-sidebar/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $pageparent_item
		    ));

	        wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('404','dropshipping-store-pro'),
		        'menu-item-classes' => 'error',
		        'menu-item-url' => home_url( '/index.php/404.php/' ), 
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $pageparent_item
		    ));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('FAQ','dropshipping-store-pro'),
				'menu-item-classes' => 'faq',
				'menu-item-url' => home_url( '/index.php/faq/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $pageparent_item
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Typography','dropshipping-store-pro'),
				'menu-item-classes' => 'typography',
				'menu-item-url' => home_url( '/index.php/typography/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $pageparent_item
			));

		    $parent_item = wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Blog','dropshipping-store-pro'),
		        'menu-item-classes' => 'fas fa-blog blog',
		        'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Blog With No Sidebar','dropshipping-store-pro'),
		        'menu-item-classes' => 'blog',
		        'menu-item-url' => home_url( '/index.php/blog/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $parent_item
		    ));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Blog with Left Sidebar','dropshipping-store-pro'),
		        'menu-item-classes' => 'blog-with-left-sidebar',
		        'menu-item-url' => home_url( '/index.php/blog-with-left-sidebar/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $parent_item
		    ));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Blog with Right Sidebar','dropshipping-store-pro'),
		        'menu-item-classes' => 'blog-with-right-sidebar',
		        'menu-item-url' => home_url( '/index.php/blog-with-right-sidebar/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $parent_item
		    ));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Contact Us','dropshipping-store-pro'),
		        'menu-item-classes' => 'far fa-address-book contact-us',
		        'menu-item-url' => home_url( '/index.php/contact-us/' ),
		        'menu-item-type' => 'custom',
		        'menu-item-status' => 'publish'));

		    if( !has_nav_menu( $bpmenulocation ) ){
		        $locations = get_theme_mod('nav_menu_locations');
		        $locations[$bpmenulocation] = $menu_id;
		        set_theme_mod( 'nav_menu_locations', $locations );
		    }
		}
	}

	public function theme_create_customizer_footer_menu1(){

		// ------- Create Nav Menu --------
        $menuname = $lblg_themename . 'Footer Menu 1';
		$bpmenulocation = 'footer 1';
		$menu_exists = wp_get_nav_menu_object( $menuname );

		if( !$menu_exists){
		    $menu_id = wp_create_nav_menu($menuname);

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Home','dropshipping-store-pro'),
		        'menu-item-classes' => 'home',
		        'menu-item-url' => home_url( '/' ),
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Contact Us','dropshipping-store-pro'),
		        'menu-item-classes' => 'contact',
		        'menu-item-url' => home_url( '/index.php/contact/' ),
		        'menu-item-type' => 'custom',
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('About Us','dropshipping-store-pro'),
		        'menu-item-classes' => 'about',
		        'menu-item-url' => home_url( '/index.php/about/' ),
		        'menu-item-type' => 'custom',
		        'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('FAQ','dropshipping-store-pro'),
				'menu-item-classes' => 'faq',
				'menu-item-url' => home_url( '/index.php/faq/' ),
				'menu-item-status' => 'publish'
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Privacy Policy','dropshipping-store-pro'),
				'menu-item-classes' => 'privacy-policy',
				'menu-item-url' => home_url( '/index.php/privacy-policy/' ),
				'menu-item-status' => 'publish'
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Terms & Conditions','dropshipping-store-pro'),
				'menu-item-classes' => 'refund-and-return-policy',
				'menu-item-url' => home_url( '/index.php/refund-and-return-policy/' ),
				'menu-item-status' => 'publish'
			));

			wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Blog','dropshipping-store-pro'),
		        'menu-item-classes' => 'blog',
		        'menu-item-url' => home_url( '/index.php/blog/' ),
		        'menu-item-status' => 'publish'
		    ));

		    if( !has_nav_menu( $bpmenulocation ) ){
		        $locations = get_theme_mod('nav_menu_locations');
		        $locations[$bpmenulocation] = $menu_id;
		        set_theme_mod( 'nav_menu_locations', $locations );
		    }
		}
	}

	public function theme_create_customizer_footer_menu2(){

		// ------- Create Nav Menu --------
        $menuname = $lblg_themename . 'Footer Menu 2';
		$bpmenulocation = 'footer 2';
		$menu_exists = wp_get_nav_menu_object( $menuname );

		if( !$menu_exists){
		    $menu_id = wp_create_nav_menu($menuname);

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Delivery Information','dropshipping-store-pro'),
		        'menu-item-url' => home_url( '#' ),
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Terms & Conditions','dropshipping-store-pro'),
		        'menu-item-url' => home_url( '#' ),
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Shopping Information','dropshipping-store-pro'),
		        'menu-item-url' => home_url( '#' ),
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Size Cart Information','dropshipping-store-pro'),
		        'menu-item-url' => home_url( '#' ),
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('About Product Information','dropshipping-store-pro'),
		        'menu-item-url' => home_url( '#' ),
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Returns Information','dropshipping-store-pro'),
		        'menu-item-url' => home_url( '#' ),
		        'menu-item-status' => 'publish'));


		    if( !has_nav_menu( $bpmenulocation ) ){
		        $locations = get_theme_mod('nav_menu_locations');
		        $locations[$bpmenulocation] = $menu_id;
		        set_theme_mod( 'nav_menu_locations', $locations );
		    }
		}
	}

function isAssoc( array $arr ) {
	if (array() === $arr) return false;
	return array_keys($arr) !== range(0, count($arr) - 1);
}
	/**
	 * Imports the Demo Content
	 * @since 1.1.0
	 */
	public function setup_widgets(){

        $home_title = 'Home';
   		$home_check = get_page_by_title($home_title);
	   	$home = array(
   		   'post_type' => 'page',
   		   'post_title' => $home_title,
   		   'post_status' => 'publish',
   		   'post_author' => 1,
   		   'post_slug' => 'home'
		   );
         $home_id = wp_insert_post($home);
         //Set the home page template
         add_post_meta( $home_id, '_wp_page_template', 'page-template/home-page.php' );

         //Set the static front page
         $home = get_page_by_title( 'Home' );
         update_option( 'page_on_front', $home->ID );
         update_option( 'show_on_front', 'page' );

         // Create a blog page and assigned the template
         $bwp_blog_title = 'Blog';
         $blog_check = get_page_by_title($bwp_blog_title);
         $blog = array(
            'post_type' => 'page',
            'post_title' => $bwp_blog_title,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_slug' => 'blog'
         );
         $bwp_blog_id = wp_insert_post($blog);

         //Set the blog page template
         add_post_meta( $bwp_blog_id, '_wp_page_template', 'page-template/blog-fullwidth-extend.php' );

          $bwtblogleft_title = 'Blog with Left Sidebar';
		    $blogleft         = array(
		        'post_type' => 'page',
		        'post_title' => $bwtblogleft_title,
		        'post_status' => 'publish',
		        'post_author' => 1,
		        'post_slug' => 'blog-with-left-sidebar'
		    );
		    $bwtblogleft_id    = wp_insert_post($blogleft);

		    //Set the blog page template
		    add_post_meta($bwtblogleft_id, '_wp_page_template', 'page-template/blog-with-left-sidebar.php');

		    $bwtblogright_title = 'Blog with Right Sidebar';
		    $blogright         = array(
		        'post_type' => 'page',
		        'post_title' => $bwtblogright_title,
		        'post_status' => 'publish',
		        'post_author' => 1,
		        'post_slug' => 'blog-with-right-sidebar'
		    );
		    $bwtblogright_id    = wp_insert_post($blogright);

		    //Set the blog page template
		    add_post_meta($bwtblogright_id, '_wp_page_template', 'page-template/blog-with-right-sidebar.php');


         // Create a Page
         $page_title = 'Page ';
         $content = 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Absit a longe et verbum post tergum montibus procul a terris Vokalia et consonantia, est vivere caecorum texts. In Bookmarksgrove separata vivunt jus ad oram de Semantics, magno lingua Oceanum. Parva supplet locum et defluat amnis nomine Duden regelialia necessariis.';

         $page_check = get_page_by_title($page_title);
         $bwp_page = array(
         'post_type' => 'page',
         'post_title' => $page_title,
         'post_content'  => $content,
         'post_status' => 'publish',
         'post_author' => 1,
         'post_slug' => 'page'
         );
         $page_id = wp_insert_post($bwp_page);

             // Create a Page
	    $pageleft_title = 'Page With Left Sidebar ';
	    $content    = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel, et argentum simul reddere parentibus meis, debitum eo - aliam putant quinque aut sex annos - ut certus quid faciam. Quod suus Faciam, cum magna mutatio. Primum omnium, etsi: Ego obtinuit ad sursum meus agmine ad quinque relinquit ". Et respexit super ad terror horologium, in pectore et
	    	Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel, et argentum simul reddere parentibus meis, debitum eo - aliam putant quinque aut sex annos - ut certus quid faciam. Quod suus Faciam, cum magna mutatio. Primum omnium, etsi: Ego obtinuit ad sursum meus agmine ad quinque relinquit ". Et respexit super ad terror horologium, in pectore et';

	    $bwtpageleft  = array(
	        'post_type' => 'page',
	        'post_title' => $pageleft_title,
	        'post_content' => $content,
	        'post_status' => 'publish',
	        'post_author' => 1,
	        'post_slug' => 'page-with-left-sidebar'
	    );
	    $pageleft_id = wp_insert_post($bwtpageleft);

	    add_post_meta($pageleft_id, '_wp_page_template', 'page-template/page-with-left-sidebar.php');


	      // Create a Page
	    $pageright_title = 'Page With Right Sidebar ';
	    $content    = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel, et argentum simul reddere parentibus meis, debitum eo - aliam putant quinque aut sex annos - ut certus quid faciam. Quod suus Faciam, cum magna mutatio. Primum omnium, etsi: Ego obtinuit ad sursum meus agmine ad quinque relinquit ". Et respexit super ad terror horologium, in pectore et
	    	Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel, et argentum simul reddere parentibus meis, debitum eo - aliam putant quinque aut sex annos - ut certus quid faciam. Quod suus Faciam, cum magna mutatio. Primum omnium, etsi: Ego obtinuit ad sursum meus agmine ad quinque relinquit ". Et respexit super ad terror horologium, in pectore et';

	    $bwtpageright  = array(
	        'post_type' => 'page',
	        'post_title' => $pageright_title,
	        'post_content' => $content,
	        'post_status' => 'publish',
	        'post_author' => 1,
	        'post_slug' => 'page-with-right-sidebar'
	    );
	    $pageright_id = wp_insert_post($bwtpageright);
	    add_post_meta($pageright_id, '_wp_page_template', 'page-template/page-with-right-sidebar.php');


         // Create a contact page and assigned the template
         $contact_title = 'Contact Us';
         $contact_check = get_page_by_title($contact_title);
         $contact = array(
         'post_type' => 'page',
         'post_title' => $contact_title,
         'post_status' => 'publish',
         'post_author' => 1,
         'post_slug' => 'contact-us'
         );
		   $contact_id = wp_insert_post($contact);

         //Set the blog with right sidebar template
         add_post_meta( $contact_id, '_wp_page_template', 'page-template/contact-us.php');

         // Create a about page and assigned the template
         $about_title = 'About Us';
         $about_check = get_page_by_title($about_title);
         $about = array(
         'post_type' => 'page',
         'post_title' => $about_title,
         'post_status' => 'publish',
         'post_author' => 1,
         'post_slug' => 'contact'
         );
		   $about_id = wp_insert_post($about);

         //Set the blog with right sidebar template
         add_post_meta( $about_id, '_wp_page_template', 'page-template/about.php');

         // Create a services page and assigned the template
         $services_title = 'Services';
         $services_check = get_page_by_title($services_title);
         $services = array(
         'post_type' => 'page',
         'post_title' => $services_title,
         'post_status' => 'publish',
         'post_author' => 1,
         'post_slug' => 'services'
         );
		   $service_id = wp_insert_post($services);

         //Set the services template
         	add_post_meta( $service_id, '_wp_page_template', 'page-template/services.php');


         // Create a hosted services page and assigned the template
         $our_successful_events_title = "Our Successful Events";
         $our_successful_events_check = get_page_by_title($our_successful_events_title);
         $our_successful_events = array(
         'post_type' => 'page',
         'post_title' => $our_successful_events_title,
         'post_status' => 'publish',
         'post_author' => 1,
         'post_slug' => 'our-successful-events'
         );
		   $our_successful_events_id = wp_insert_post($our_successful_events);

         //Set the Hosted Services template
         add_post_meta( $our_successful_events_id, '_wp_page_template', 'page-template/our-successful-events.php');

        // Create a contact page and assigned the template
		$faq_title = 'faq';
		$faq = array(
			'post_type' 	=> 'page',
			'post_title' 	=> $faq_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' 	=> 'faq'
		);
		$faq_id = wp_insert_post($faq);

		//Set the blog with right sidebar template
		add_post_meta( $faq_id, '_wp_page_template', 'page-template/faq.php' );

		$typography_title = 'Typography';
		$typography = array(
			'post_type' 	=> 'page',
			'post_title' 	=> $typography_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' 	=> 'typography'
		);
		$typography_id = wp_insert_post($typography);

		//Set the blog with right sidebar template
		add_post_meta( $typography_id, '_wp_page_template', 'page-template/typography-template.php' );

		set_theme_mod('drop_shipping_pro_section_ordering_settings_repeater', "feature,our-product,all-category,product-banner1,product-category,deals,product-banner2,new-arrival,featured-blog,product-brands");

	    /*---------Topbar----------------------*/
	    set_theme_mod('drop_shipping_pro_topbar_notice','Welcome To Dropshipping Online');
	    set_theme_mod('drop_shipping_pro_topbar_section_shipping_title','Track Your Order');
	    set_theme_mod('drop_shipping_pro_topbar_shipping_shortcode','[woocommerce_order_tracking]');
	    set_theme_mod('drop_shipping_pro_topbar_compare','Compare');
	    set_theme_mod('drop_shipping_pro_topbar_compare_url', home_url( '/index.php/product/classic-watch/'));
	    set_theme_mod('drop_shipping_pro_topbar_location_url',home_url( '/index.php/contact-us/') );
	    set_theme_mod('drop_shipping_pro_topbar_location_icon','fas fa-map-marker-alt');
	    set_theme_mod('drop_shipping_pro_topbar_location','Location');

	    set_theme_mod('drop_shipping_pro_header_category_title','All Categories');
	    set_theme_mod('drop_shipping_pro_category_title_icon','fas fa-chevron-down');
	    set_theme_mod('drop_shipping_pro_header_support_text','24/7 support');
	    set_theme_mod('drop_shipping_pro_header_support_icon','fas fa-headset');
	    set_theme_mod('drop_shipping_pro_header_number','+123 456 7890');
	    set_theme_mod('drop_shipping_pro_header_shopping_basket_image',get_template_directory_uri() . '/assets/images/shopping-cart.png');
	    set_theme_mod('drop_shipping_pro_header_shopping_text','Shopping Cart');

	   	/*--------------Header----------*/
	     set_theme_mod('drop_shipping_pro_header_search_image', get_template_directory_uri() . '/assets/images/search.png');
	     set_theme_mod('drop_shipping_pro_header_section_button_title', '  Request A Quote ');

	     /* --------------- Slider---------------*/
	    set_theme_mod('drop_shipping_pro_slide_number', '2');
	    $slide_head = array("HEADSET", "SMART WATCHES");
	    //Slider Images section
	    for($i=1; $i<=2; $i++) {
		    set_theme_mod('drop_shipping_pro_slide_image'.$i, get_template_directory_uri() . '/assets/images/slider/sliderbg'.$i.'.png');
		    set_theme_mod('drop_shipping_pro_slide_right_image'.$i, get_template_directory_uri() . '/assets/images/slider/left'.$i.'.png');
		    set_theme_mod('drop_shipping_pro_slide_small_heading'.$i, "Best Deals!");
		    set_theme_mod('drop_shipping_pro_slide_main_heading'.$i, $slide_head[$i-1]);
		    set_theme_mod('drop_shipping_pro_slide_text'.$i, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,");
		    set_theme_mod('drop_shipping_pro_slide_btntext'.$i, "Shop Now");
		    set_theme_mod('drop_shipping_pro_slide_btnurl'.$i, " # ");

		}
		

		/*---------Feature Section-------------*/
		set_theme_mod('drop_shipping_pro_feature_number','4');
		$feature_head = array("FREE SHIPPING", "100% PAYMENT SECURE","30 DAYS GUARANTEE","24/7 SUPPORT");
		$feature_text = array("On all orders over $50.00", "We ensure secure payment","30-days free return policy","Dedicated support");
		$feature_icon = array("fas fa-shipping-fast", "fas fa-money-check-alt","fas fa-undo-alt","fas fa-undo-alt");
	    for( $j=1; $j<=4; $j++ ) {
			set_theme_mod( 'drop_shipping_pro_feature_heading'.$j, $feature_head[$j-1] );
			set_theme_mod( 'drop_shipping_pro_feature_icon'.$j, $feature_icon[$j-1]);
			set_theme_mod( 'drop_shipping_pro_feature_text'.$j,$feature_text[$j-1]);
		}

		/*-----------------Our product--------------*/
		set_theme_mod('drop_shipping_pro_our_product_heading','Our Product');
		set_theme_mod('drop_shipping_pro_all_product_bg_color','#f9f9f9');
		set_theme_mod('drop_shipping_pro_our_product_tag','new-arrival');
		set_theme_mod('drop_shipping_pro_our_product_text','See All Products');
		set_theme_mod('drop_shipping_pro_our_product_btnurl',home_url( '/index.php/product-tag/new-arrival/'));

		/*----------------- New Arrival --------------*/
		set_theme_mod('drop_shipping_pro_new_arrival_heading','New Arrival');
		set_theme_mod('drop_shipping_pro_new_arrival_bg_color','#f9f9f9');
		set_theme_mod('drop_shipping_pro_new_arrival_tag','new-arrival');
		set_theme_mod('drop_shipping_pro_new_arrival_text','See All Products');
		set_theme_mod('drop_shipping_pro_new_arrival_btnurl',home_url( '/index.php/product-tag/new-arrival/'));

		/*--------- Category Section--------------*/

	    set_theme_mod( 'drop_shipping_pro_category_title', 'Category' );

     	$product_cat = array('Speakers','Headphones','Watches','Cameras','Laptops','Mobiles');
		$product_cat_slug = array('speakers','headphones','watches','cameras','laptops','mobiles');

	        for($i=1;$i<=5;$i++){
	            $cid = wp_insert_term(
	               $product_cat[$i-1], // the term 
	               'product_cat', // the taxonomy
	               array(
	               'description'=> 'This is Product Category',
	               'slug' => $product_cat_slug[$i-1],
	               'term_id'=>12,
	               'term_taxonomy_id'=>34,
	               )
	            );

	            $image_url = get_template_directory_uri().'/assets/images/categories/category/img'.$i.'.png';

	            $image_name= 'img'.$i.'.png';
	            $upload_dir       = wp_upload_dir(); 
	            // Set upload folder
	            $image_data= file_get_contents($image_url); 
	            // Get image data
	            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
	            // Generate unique name
	            $filename= basename( $unique_file_name ); 
	            // Create image file name

	            // Check folder permission and define file location
	            if( wp_mkdir_p( $upload_dir['path'] ) ) {
	            $file = $upload_dir['path'] . '/' . $filename;
	            } else {
	            $file = $upload_dir['basedir'] . '/' . $filename;
	            }

	            // Create the image  file on the server
	            file_put_contents( $file, $image_data );

	            // Check image file type
	            $wp_filetype = wp_check_filetype( $filename, null );

	            // Set attachment data
	            $attachment = array(
	            'post_mime_type' => $wp_filetype['type'],
	            'post_title'     => sanitize_file_name( $filename ),
	            'post_content'   => '',
	            'post_type'     => 'post',
	            'post_status'    => 'inherit'
	            );

	            // Create the attachment
	            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

	            // Include image.php
	            require_once(ABSPATH . 'wp-admin/includes/image.php');

	            // Define attachment metadata
	            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	            // Assign metadata to attachment
	            wp_update_attachment_metadata( $attach_id, $attach_data );

	            update_woocommerce_term_meta( $cid['term_id'], 'thumbnail_id', $attach_id );
	        }

 		    // Product For Watches

	        if ( class_exists( 'WooCommerce' ) ) {

			$review_text = array(
				'Nice product',
				'Good Quality Product',
				'Nice Product. Must buy It.',
				'I like this Product',
				'Nice Product',
			);

 			wp_insert_term(
	            'Watches', // the term 
	            'product_cat', // the taxonomy
	            array(
		            'slug' => 'watches'
        		)
        	);

        	$_product_image_gallery = array();
			$_product_ids = array();

                $product_name = array('Watch Series 3','Galaxy Watch Active2','Classic Watch','Chronograph Leather Belt Men’s Watch');
	        	  	for($i=1;$i<=4;$i++){
		            $title = $product_name[$i-1];
		            $content = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
		            $excerpt = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
                    // Create post object
		            $my_post = array(
			            'post_title'    => wp_strip_all_tags( $title ),
			            'post_content'  => $content,
			            'post_status'   => 'publish',
			            'post_type'     => 'product',
			            'post_excerpt'	=> $excerpt
		            );
		         
		            // Insert the post into the database
		            $post_id = wp_insert_post( $my_post );
		            array_push( $_product_ids, $post_id );

		            // Add Product Tags
		            wp_set_object_terms($post_id, array('watches'), 'product_cat');

        			for ( $c=0; $c <= 5; $c++ ) {
						$comment_id = wp_insert_comment( array(
							'comment_post_ID'      => $post_id,
							'comment_author'       => get_the_author_meta( 'display_name' ),
							'comment_author_email' => get_the_author_meta( 'user_email' ),
							'comment_content'      => $review_text[$c],
							'comment_parent'       => 0,
							'user_id'              => get_current_user_id(), // <== Important
							'comment_date'         => date('Y-m-d H:i:s'),
							'comment_approved'     => 1,
						) );

						update_comment_meta( $comment_id, 'rating', 
						3 );
					}

		            update_post_meta( $post_id, '_regular_price', "500" );
		            update_post_meta( $post_id, '_sale_price', "450" );
		            update_post_meta( $post_id, '_price', "450" );

		            $image_url = get_template_directory_uri().'/assets/images/categories/watches/img'.$i.'.png';

		            $image_name= 'img'.$i.'.png';
		            $upload_dir       = wp_upload_dir(); 
		            // Set upload folder
		            $image_data= file_get_contents($image_url); 
		            // Get image data
		            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
		            // Generate unique name
		            $filename= basename( $unique_file_name ); 
		            // Create image file name

		            // Check folder permission and define file location
		            if( wp_mkdir_p( $upload_dir['path'] ) ) {
		            	$file = $upload_dir['path'] . '/' . $filename;
		            } else {
		            	$file = $upload_dir['basedir'] . '/' . $filename;
	            	}

		            // Create the image  file on the server
		            file_put_contents( $file, $image_data );

		            // Check image file type
		            $wp_filetype = wp_check_filetype( $filename, null );

		            // Set attachment data
		            $attachment = array(
		            'post_mime_type' => $wp_filetype['type'],
		            'post_title'     => sanitize_file_name( $filename ),
		            'post_content'   => '',
		            'post_type'     => 'post',
		            'post_status'    => 'inherit'
		            );

		            // Create the attachment
		            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

		            // Include image.php
		            require_once(ABSPATH . 'wp-admin/includes/image.php');

		            // Define attachment metadata
		            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

		            // Assign metadata to attachment
		            wp_update_attachment_metadata( $attach_id, $attach_data );
		            if ( count( $_product_image_gallery ) < 3 ) {
						array_push( $_product_image_gallery, $attach_id );
					}

		            // And finally assign featured image to post
		            set_post_thumbnail( $post_id, $attach_id );
		        }
 			}

		// Add Gallery in first simple product and second variable product START
		$_product_image_gallery = implode( ',', $_product_image_gallery );
		foreach ( $_product_ids as $_product_id ) {
			update_post_meta( $_product_id, '_product_image_gallery', $_product_image_gallery );
		}
		// Add Gallery in first simple product and second variable product END

		// Attribute Creation Code if a variable product needed to create
		$attribute_data = array(
			array(
				'name'					=>	'Color',
				'type'					=>	'button',
				'taxonomy'			=>	'pa_color',
				'data'					=>	array(
					'Black',
					'Red',
					'Yellow'
				)
			)
		);
		$new_attribute_data = array();
		$old_attribute_taxonomies = wc_get_attribute_taxonomies();
		foreach ( $attribute_data as $attribute_data_single ) {
			$is_attribute_found	=	false;
			foreach ( $old_attribute_taxonomies as $old_attribute_taxonomy ) {
				if ( $attribute_data_single['type'] === $old_attribute_taxonomy->attribute_type ) {
					$is_attribute_found = true;
					break;
				}
			}
			if ( !$is_attribute_found ) {
				array_push( $new_attribute_data, $attribute_data_single );
			}
		}
		foreach ( $new_attribute_data as $attribute_single_args ) {
			$args = array(
				// 'slug'					=> 'my_color',
				'name'					=>	__( $attribute_single_args['name'], 'dropshipping-store-pro' ),
				'type'					=>	$attribute_single_args['type'],
				'orderby'				=>	'menu_order',
				'has_archives'	=>	false,
			);
			$wc_create_attribute	=	wc_create_attribute( $args );
			register_taxonomy( $attribute_single_args['taxonomy'], array( 'product' ), array() );

			if ( !is_wp_error( $wc_create_attribute ) ) {

				if ( $this->isAssoc( $attribute_single_args['data'] ) ) {
					foreach ( $attribute_single_args['data'] as $single_data_key => $single_data ) {
						$wp_insert_term	=	 wp_insert_term( $single_data_key, $attribute_single_args['taxonomy'] );
						if ( !is_wp_error( $wp_insert_term ) ) {
							update_term_meta( $wp_insert_term['term_id'], '_product_attributes' . $attribute_single_args['type'], $single_data );
						}
					}
				} else {
					foreach ( $attribute_single_args['data'] as $single_data_key => $single_data ) {
						wp_insert_term( $single_data, $attribute_single_args['taxonomy'] );
					}
				}
			}
		}
		// Attribute Creation Code ENDs

		// Variable Product Creation STARTS
		$post_id		=	$_product_ids[0];
		wp_set_object_terms( $post_id, 'variable', 'product_type' );

		if ( class_exists( 'WC_Meta_Box_Product_Data' ) && class_exists( 'WC_Product_Factory' ) ) {

			// Attribute Creation in new pattern
			$attribute_taxonomies = wc_get_attribute_taxonomies();
			$attributes_data_to_insert	=	array();
			$index = 0;
			foreach ( $attribute_taxonomies as $key => $attribute_taxonomy ) {

				$taxonomy_name	=	'pa_' . $attribute_taxonomy->attribute_name;
				$terms_by_taxonomy_name = get_terms( array(
					'taxonomy' 		=> 	$taxonomy_name,
					'hide_empty'	=> false
				) );
				if ( empty( $terms_by_taxonomy_name ) ) {
					continue;
				}

				$attributes_data_to_insert['attribute_names'][]				=	$taxonomy_name;
				$attributes_data_to_insert['attribute_position'][]		=	$index;
				foreach ( $terms_by_taxonomy_name as $term_by_taxonomy_name ) {
					$attributes_data_to_insert['attribute_values'][$index][]			=	$term_by_taxonomy_name->term_id;
				}
				$attributes_data_to_insert['attribute_visibility'][]	=	1;
				$attributes_data_to_insert['attribute_variation'][]		=	1;
				++$index;
			}

			$attributes   = WC_Meta_Box_Product_Data::prepare_attributes( $attributes_data_to_insert );
			$product_id 	= $post_id;
			$product_type	=	'variable';
			$classname    = WC_Product_Factory::get_product_classname( $product_id, $product_type );
			$product      = new $classname( $product_id );
			$product->set_attributes( $attributes );
			$product->save();
			// Attribute Creation in new pattern ends here

			// new product variation creation code.
			$product    = wc_get_product( $post_id );
			$data_store = $product->get_data_store();
			$data_store->create_all_product_variations( $product, 50 );
			$data_store->sort_all_product_variations( $product->get_id() );


			$product    = wc_get_product( $post_id );
			foreach( $product->get_children() as $variation_id ) {
				// 1. Updating the stock quantity
				update_post_meta( $variation_id, '_stock', 10 );
				// 2. Updating the stock quantity
				update_post_meta( $variation_id, '_stock_status', wc_clean( 'instock' ) );
				// 3. Updating post term relationship
				wp_set_post_terms( $variation_id, 'instock', 'product_visibility', true );
				// And finally (optionally if needed)

				// Updating active price and regular price
				update_post_meta( $variation_id, '_regular_price', '500' );
				update_post_meta( $variation_id, '_sale_price', "450" );
				update_post_meta( $variation_id, '_price', '450' );
				wc_delete_product_transients( $variation_id ); // Clear/refresh the variation cache
			}
			// Clear/refresh the variable product cache
			wc_delete_product_transients( $post_id );
			// Update the prices for all the variations ends here
		}
		// Variable Product Creation ENDS


 		    // Product For New Arrivals

	        if ( class_exists( 'WooCommerce' ) ) {

			$review_text = array(
				'Nice product',
				'Good Quality Product',
				'Nice Product. Must buy It.',
				'I like this Product',
				'Nice Product',
			);

 			wp_insert_term(
	            'New Arrival', // the term 
	            'product_tag', // the taxonomy
	            array(
		            'slug' => 'new-arrival'
        		)
        	);

                $product_name = array('Apple Watch Series 3','Powerbeats3 Wireless Earphones','Sony Alpha A6000 + 16-50mm - Black','Kinla Product Sample');
	        	  	for($i=1;$i<=4;$i++){
		            $title = $product_name[$i-1];
		            $content = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
		            $excerpt = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
                    // Create post object
		            $my_post = array(
			            'post_title'    => wp_strip_all_tags( $title ),
			            'post_content'  => $content,
			            'post_status'   => 'publish',
			            'post_type'     => 'product',
			            'post_excerpt'	=> $excerpt
		            );
		         
		            // Insert the post into the database
		            $post_id = wp_insert_post( $my_post );

		            // Add Product Tags
		            wp_set_object_terms($post_id, array('new-arrival'), 'product_tag');

        			for ( $c=0; $c <= 5; $c++ ) {
						$comment_id = wp_insert_comment( array(
							'comment_post_ID'      => $post_id,
							'comment_author'       => get_the_author_meta( 'display_name' ),
							'comment_author_email' => get_the_author_meta( 'user_email' ),
							'comment_content'      => $review_text[$c],
							'comment_parent'       => 0,
							'user_id'              => get_current_user_id(), // <== Important
							'comment_date'         => date('Y-m-d H:i:s'),
							'comment_approved'     => 1,
						) );

						update_comment_meta( $comment_id, 'rating', 
						3 );
					}

		            update_post_meta( $post_id, '_regular_price', "500" );
		            update_post_meta( $post_id, '_sale_price', "450" );
		            update_post_meta( $post_id, '_price', "450" );

		            $product_badge = array('New','','Hot','');

		            update_post_meta( $post_id, '_bhww_ingredients_wysiwyg', $product_badge[$i-1]);

		            $image_url = get_template_directory_uri().'/assets/images/categories/new/img'.$i.'.png';

		            $image_name= 'img'.$i.'.png';
		            $upload_dir       = wp_upload_dir(); 
		            // Set upload folder
		            $image_data= file_get_contents($image_url); 
		            // Get image data
		            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
		            // Generate unique name
		            $filename= basename( $unique_file_name ); 
		            // Create image file name

		            // Check folder permission and define file location
		            if( wp_mkdir_p( $upload_dir['path'] ) ) {
		            	$file = $upload_dir['path'] . '/' . $filename;
		            } else {
		            	$file = $upload_dir['basedir'] . '/' . $filename;
	            	}

		            // Create the image  file on the server
		            file_put_contents( $file, $image_data );

		            // Check image file type
		            $wp_filetype = wp_check_filetype( $filename, null );

		            // Set attachment data
		            $attachment = array(
		            'post_mime_type' => $wp_filetype['type'],
		            'post_title'     => sanitize_file_name( $filename ),
		            'post_content'   => '',
		            'post_type'     => 'post',
		            'post_status'    => 'inherit'
		            );

		            // Create the attachment
		            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

		            // Include image.php
		            require_once(ABSPATH . 'wp-admin/includes/image.php');

		            // Define attachment metadata
		            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

		            // Assign metadata to attachment
		            wp_update_attachment_metadata( $attach_id, $attach_data );

		            // And finally assign featured image to post
		            set_post_thumbnail( $post_id, $attach_id );
		        }
 			}

        // Product For Featured Product
 		set_theme_mod('drop_shipping_pro_featured_product_main_heading','Featured Product');
 		set_theme_mod('drop_shipping_pro_featured_product_tag','featured');

	        if ( class_exists( 'WooCommerce' ) ) {

	        	$review_text = array(
					'Nice product',
					'Good Quality Product',
					'Nice Product. Must buy It.',
					'I like this Product',
					'Nice Product',
				);

	 			wp_insert_term(
		            'Featured', // the term 
		            'product_tag', // the taxonomy
		            array(
			            'slug' => 'featured'
            		)
	        	);

                $product_name = array('Boat Stone 170 5W Bluetooth Speaker','Realme Smart Watch 2 Pro','Acer Nitro 5 AN515- 57 Gaming Laptop','OnePlus 108 cm (43 inches)');
	        	  	for($i=1;$i<=4;$i++){
		            $title = $product_name[$i-1];
		            $content = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
		            $excerpt = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
                    // Create post object
		            $my_post = array(
			            'post_title'    => wp_strip_all_tags( $title ),
			            'post_content'  => $content,
			            'post_status'   => 'publish',
			            'post_type'     => 'product',
			            'post_excerpt'	=> $excerpt
		            );
		         
		            // Insert the post into the database
		            $post_id = wp_insert_post( $my_post );

		            // Add Product Tags
		            wp_set_object_terms($post_id, array('featured'), 'product_tag');

		            update_post_meta( $post_id, '_regular_price', "500" );
		            update_post_meta( $post_id, '_price', "450" );
		            update_post_meta( $post_id, '_sale_price', "450" );

		            for ( $c=0; $c <= 5; $c++ ) {
						$comment_id = wp_insert_comment( array(
							'comment_post_ID'      => $post_id,
							'comment_author'       => get_the_author_meta( 'display_name' ),
							'comment_author_email' => get_the_author_meta( 'user_email' ),
							'comment_content'      => $review_text[$c],
							'comment_parent'       => 0,
							'user_id'              => get_current_user_id(), // <== Important
							'comment_date'         => date('Y-m-d H:i:s'),
							'comment_approved'     => 1,
						) );

						update_comment_meta( $comment_id, 'rating', 
						3 );
					}


		            $image_url = get_template_directory_uri().'/assets/images/categories/featured/img'.$i.'.png';

		            $image_name= 'img'.$i.'.png';
		            $upload_dir       = wp_upload_dir(); 
		            // Set upload folder
		            $image_data= file_get_contents($image_url); 
		            // Get image data
		            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
		            // Generate unique name
		            $filename= basename( $unique_file_name ); 
		            // Create image file name

		            // Check folder permission and define file location
		            if( wp_mkdir_p( $upload_dir['path'] ) ) {
		            	$file = $upload_dir['path'] . '/' . $filename;
		            } else {
		            	$file = $upload_dir['basedir'] . '/' . $filename;
	            	}

		            // Create the image  file on the server
		            file_put_contents( $file, $image_data );

		            // Check image file type
		            $wp_filetype = wp_check_filetype( $filename, null );

		            // Set attachment data
		            $attachment = array(
		            'post_mime_type' => $wp_filetype['type'],
		            'post_title'     => sanitize_file_name( $filename ),
		            'post_content'   => '',
		            'post_type'     => 'post',
		            'post_status'    => 'inherit'
		            );

		            // Create the attachment
		            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

		            // Include image.php
		            require_once(ABSPATH . 'wp-admin/includes/image.php');

		            // Define attachment metadata
		            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

		            // Assign metadata to attachment
		            wp_update_attachment_metadata( $attach_id, $attach_data );

		            // And finally assign featured image to post
		            set_post_thumbnail( $post_id, $attach_id );
		        }

 			}

 		/*---------Brand------------------*/
		set_theme_mod('drop_shipping_pro_popular_brands_box_number', '5');

	    for($i=1; $i<=5; $i++) {
		    set_theme_mod('drop_shipping_pro_popular_brands_image'.$i, get_template_directory_uri() . '/assets/images/brand/img'.$i.'.png');
		}

		/*------------------Product Banner Section------------*/
		set_theme_mod('drop_shipping_pro_product_banner1_box_bgimage1', get_template_directory_uri() . '/assets/images/banner-category/bg1.png');
		set_theme_mod('drop_shipping_pro_product_banner1_main_title1','Iwatches');
		set_theme_mod('drop_shipping_pro_product_banner1_small_title1','Feel like a whole new watch');
		set_theme_mod('drop_shipping_pro_product_banner1_btn_text1','Shop Now');
		set_theme_mod('drop_shipping_pro_product_banner1_btn_url1','#');
		set_theme_mod('drop_shipping_pro_product_banner1_image1', get_template_directory_uri() . '/assets/images/banner-category/product1.png');

		set_theme_mod('drop_shipping_pro_product_banner1_box_bgimage2', get_template_directory_uri() . '/assets/images/banner-category/bg2.png');
		set_theme_mod('drop_shipping_pro_product_banner1_main_title2','Headphones wireless');
		set_theme_mod('drop_shipping_pro_product_banner1_small_title2','With RealMe');
		set_theme_mod('drop_shipping_pro_product_banner1_btn_text2','Shop Now');
		set_theme_mod('drop_shipping_pro_product_banner1_btn_url2','#');
		set_theme_mod('drop_shipping_pro_product_banner1_image2', get_template_directory_uri() . '/assets/images/banner-category/product2.png');

		/* ------------------Product Banner 2 Section------------ */
		set_theme_mod('drop_shipping_pro_product_banner2_box_bgimage1', get_template_directory_uri() . '/assets/images/banner-category2/bg1.png');
		set_theme_mod('drop_shipping_pro_product_banner2_main_title1','Microsoft');
		set_theme_mod('drop_shipping_pro_product_banner2_small_title1','Look and sound your best');
		set_theme_mod('drop_shipping_pro_product_banner2_btn_text1','Shop Now');
		set_theme_mod('drop_shipping_pro_product_banner2_btn_url1','#');
		set_theme_mod('drop_shipping_pro_product_banner2_image1', get_template_directory_uri() . '/assets/images/banner-category2/img1.png');


		set_theme_mod('drop_shipping_pro_product_banner2_box_bgimage2', get_template_directory_uri() . '/assets/images/banner-category2/bg2.png');
		set_theme_mod('drop_shipping_pro_product_banner2_main_title2','Digital SLR Camera');
		set_theme_mod('drop_shipping_pro_product_banner2_small_title2','Your life through your lence');
		set_theme_mod('drop_shipping_pro_product_banner2_btn_text2','Shop Now');
		set_theme_mod('drop_shipping_pro_product_banner2_btn_url2','#');
		set_theme_mod('drop_shipping_pro_product_banner2_image2', get_template_directory_uri() . '/assets/images/banner-category2/img2.png');


		set_theme_mod('drop_shipping_pro_product_banner3_box_bgimage3', get_template_directory_uri() . '/assets/images/banner-category2/bg3.png');
		set_theme_mod('drop_shipping_pro_product_banner3_main_title3','Wireless Speakers');
		set_theme_mod('drop_shipping_pro_product_banner3_small_title3','Best wireless speaker for you');
		set_theme_mod('drop_shipping_pro_product_banner3_btn_text3','Shop Now');
		set_theme_mod('drop_shipping_pro_product_banner3_btn_url3','#');
		set_theme_mod('drop_shipping_pro_product_banner3_image3', get_template_directory_uri() . '/assets/images/banner-category2/img3.png');

		/*------------------ Trending Now --------------------*/
		set_theme_mod('drop_shipping_pro_product_category_trending_heading','Trending Now');
		set_theme_mod('drop_shipping_pro_product_category_top_rated_heading','Top Rated');
		set_theme_mod('drop_shipping_pro_product_category_most_popular_heading','Most Popular');
		set_theme_mod('drop_shipping_pro_product_category_top_selling_heading','Top Selling');

		set_theme_mod('drop_shipping_pro_trending_now_category','trending-now');
		set_theme_mod('drop_shipping_pro_top_rated_category','top-rated');
		set_theme_mod('drop_shipping_pro_most_popular_category','most-popular');
		set_theme_mod('drop_shipping_pro_top_selling_category','top-selling');

	    // Product For Trending Now
	    if ( class_exists( 'WooCommerce' ) ) {

	    	$review_text = array(
				'Nice product',
				'Good Quality Product',
				'Nice Product. Must buy It.',
				'I like this Product',
				'Nice Product',
			);

			wp_insert_term(
	            'Trending Now', // the term 
	            'product_tag', // the taxonomy
	            array(
		            'slug' => 'trending-now'
	    		)
	    	);

	        $product_name = array('Fossil Watch','Wire Earphones','Samsung Galaxy M52 5G','Sony Alpha Digital Camera','Imou 360 Degree Security Camera','Acer 80 cm (32 inches) P series HD','BoAt Xtend Smart -watch','Powerbeats3 Wireless Earphones');
	    	  	for($i=1;$i<=8;$i++){
	            $title = $product_name[$i-1];
	            $content = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
	            $excerpt = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
	            // Create post object
	            $my_post = array(
		            'post_title'    => wp_strip_all_tags( $title ),
		            'post_content'  => $content,
		            'post_status'   => 'publish',
		            'post_type'     => 'product',
		            'post_excerpt'	=> $excerpt
	            );
	         
	            // Insert the post into the database
	            $post_id = wp_insert_post( $my_post );

	            // Add Product Tags
	            wp_set_object_terms($post_id, array('trending-now'), 'product_tag');

	            update_post_meta( $post_id, '_regular_price', "100" );
	            update_post_meta( $post_id, '_price', "100" );

	            for ( $c=0; $c <= 5; $c++ ) {
					$comment_id = wp_insert_comment( array(
						'comment_post_ID'      => $post_id,
						'comment_author'       => get_the_author_meta( 'display_name' ),
						'comment_author_email' => get_the_author_meta( 'user_email' ),
						'comment_content'      => $review_text[$c],
						'comment_parent'       => 0,
						'user_id'              => get_current_user_id(), // <== Important
						'comment_date'         => date('Y-m-d H:i:s'),
						'comment_approved'     => 1,
					) );

					update_comment_meta( $comment_id, 'rating', 
					3 );
				}

	            $image_url = get_template_directory_uri().'/assets/images/categories/trending/img'.$i.'.png';

	            $image_name= 'img'.$i.'.png';
	            $upload_dir       = wp_upload_dir(); 
	            // Set upload folder
	            $image_data= file_get_contents($image_url); 
	            // Get image data
	            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
	            // Generate unique name
	            $filename= basename( $unique_file_name ); 
	            // Create image file name

	            // Check folder permission and define file location
	            if( wp_mkdir_p( $upload_dir['path'] ) ) {
	            	$file = $upload_dir['path'] . '/' . $filename;
	            } else {
	            	$file = $upload_dir['basedir'] . '/' . $filename;
	        	}

	            // Create the image  file on the server
	            file_put_contents( $file, $image_data );

	            // Check image file type
	            $wp_filetype = wp_check_filetype( $filename, null );

	            // Set attachment data
	            $attachment = array(
	            'post_mime_type' => $wp_filetype['type'],
	            'post_title'     => sanitize_file_name( $filename ),
	            'post_content'   => '',
	            'post_type'     => 'post',
	            'post_status'    => 'inherit'
	            );

	            // Create the attachment
	            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

	            // Include image.php
	            require_once(ABSPATH . 'wp-admin/includes/image.php');

	            // Define attachment metadata
	            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	            // Assign metadata to attachment
	            wp_update_attachment_metadata( $attach_id, $attach_data );

	            // And finally assign featured image to post
	            set_post_thumbnail( $post_id, $attach_id );
	        }

		}

	    // Product For Top Rated
	    if ( class_exists( 'WooCommerce' ) ) {

			$review_text = array(
				'Nice product',
				'Good Quality Product',
				'Nice Product. Must buy It.',
				'I like this Product',
				'Nice Product',
			);

			wp_insert_term(
	            'Top Rated', // the term 
	            'product_tag', // the taxonomy
	            array(
		            'slug' => 'top-rated'
	    		)
	    	);

	        $product_name = array("Smallest Wireless Bluetooth Speaker","Acer 80 cm (32 inches) P series HD","Fossil Watch","Wireless boat Earphones","Fossil Watch","Wire Earphones","Samsung Galaxy M52 5G","Sony Alpha Digital Camera");
	    	  	for($i=1;$i<=8;$i++){
	            $title = $product_name[$i-1];
	            $content = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
	            $excerpt = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
	            // Create post object
	            $my_post = array(
		            'post_title'    => wp_strip_all_tags( $title ),
		            'post_content'  => $content,
		            'post_status'   => 'publish',
		            'post_type'     => 'product',
		            'post_excerpt'	=> $excerpt
	            );
	         
	            // Insert the post into the database
	            $post_id = wp_insert_post( $my_post );

	            // Add Product Tags
	            wp_set_object_terms($post_id, array('top-rated'), 'product_tag');

	            update_post_meta( $post_id, '_regular_price', "100" );
	            update_post_meta( $post_id, '_price', "100" );

	            for ( $c=0; $c <= 5; $c++ ) {
					$comment_id = wp_insert_comment( array(
						'comment_post_ID'      => $post_id,
						'comment_author'       => get_the_author_meta( 'display_name' ),
						'comment_author_email' => get_the_author_meta( 'user_email' ),
						'comment_content'      => $review_text[$c],
						'comment_parent'       => 0,
						'user_id'              => get_current_user_id(), // <== Important
						'comment_date'         => date('Y-m-d H:i:s'),
						'comment_approved'     => 1,
					) );

					update_comment_meta( $comment_id, 'rating', 
					3 );
				}

	            $image_url = get_template_directory_uri().'/assets/images/categories/top-rated/img'.$i.'.png';

	            $image_name= 'img'.$i.'.png';
	            $upload_dir       = wp_upload_dir(); 
	            // Set upload folder
	            $image_data= file_get_contents($image_url); 
	            // Get image data
	            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
	            // Generate unique name
	            $filename= basename( $unique_file_name ); 
	            // Create image file name

	            // Check folder permission and define file location
	            if( wp_mkdir_p( $upload_dir['path'] ) ) {
	            	$file = $upload_dir['path'] . '/' . $filename;
	            } else {
	            	$file = $upload_dir['basedir'] . '/' . $filename;
	        	}

	            // Create the image  file on the server
	            file_put_contents( $file, $image_data );

	            // Check image file type
	            $wp_filetype = wp_check_filetype( $filename, null );

	            // Set attachment data
	            $attachment = array(
	            'post_mime_type' => $wp_filetype['type'],
	            'post_title'     => sanitize_file_name( $filename ),
	            'post_content'   => '',
	            'post_type'     => 'post',
	            'post_status'    => 'inherit'
	            );

	            // Create the attachment
	            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

	            // Include image.php
	            require_once(ABSPATH . 'wp-admin/includes/image.php');

	            // Define attachment metadata
	            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	            // Assign metadata to attachment
	            wp_update_attachment_metadata( $attach_id, $attach_data );

	            // And finally assign featured image to post
	            set_post_thumbnail( $post_id, $attach_id );
	        }

		}

	    if ( class_exists( 'WooCommerce' ) ) {
	    	$review_text = array(
				'Nice product',
				'Good Quality Product',
				'Nice Product. Must buy It.',
				'I like this Product',
				'Nice Product',
			);
			wp_insert_term(
	            'Most Popular', // the term 
	            'product_tag', // the taxonomy
	            array(
		            'slug' => 'most-popular'
	    		)
	    	);

	        $product_name = array("Imou 360 Degree Security Camera","Acer 80 cm (32 inches) P series HD","BoAt Xtend Smart -watch","Timex Analog Blue Dial Men's Watch","Smallest Wireless Bluetooth Speaker","Acer 80 cm (32 inches) P series HD","Fossil Watch","Wireless boat Earphones");
	    	  	for($i=1;$i<=8;$i++){
	            $title = $product_name[$i-1];
	            $content = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
	            $excerpt = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
	            // Create post object
	            $my_post = array(
		            'post_title'    => wp_strip_all_tags( $title ),
		            'post_content'  => $content,
		            'post_status'   => 'publish',
		            'post_type'     => 'product',
		            'post_excerpt'	=> $excerpt
	            );
	         
	            // Insert the post into the database
	            $post_id = wp_insert_post( $my_post );

	            // Add Product Tags
	            wp_set_object_terms($post_id, array('most-popular'), 'product_tag');

	            update_post_meta( $post_id, '_regular_price', "100" );
	            update_post_meta( $post_id, '_price', "100" );

	            for ( $c=0; $c <= 5; $c++ ) {
					$comment_id = wp_insert_comment( array(
						'comment_post_ID'      => $post_id,
						'comment_author'       => get_the_author_meta( 'display_name' ),
						'comment_author_email' => get_the_author_meta( 'user_email' ),
						'comment_content'      => $review_text[$c],
						'comment_parent'       => 0,
						'user_id'              => get_current_user_id(), // <== Important
						'comment_date'         => date('Y-m-d H:i:s'),
						'comment_approved'     => 1,
					) );

					update_comment_meta( $comment_id, 'rating', 
					3 );
				}

	            $image_url = get_template_directory_uri().'/assets/images/categories/most-popular/img'.$i.'.png';

	            $image_name= 'img'.$i.'.png';
	            $upload_dir       = wp_upload_dir(); 
	            // Set upload folder
	            $image_data= file_get_contents($image_url); 
	            // Get image data
	            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
	            // Generate unique name
	            $filename= basename( $unique_file_name ); 
	            // Create image file name

	            // Check folder permission and define file location
	            if( wp_mkdir_p( $upload_dir['path'] ) ) {
	            	$file = $upload_dir['path'] . '/' . $filename;
	            } else {
	            	$file = $upload_dir['basedir'] . '/' . $filename;
	        	}

	            // Create the image  file on the server
	            file_put_contents( $file, $image_data );

	            // Check image file type
	            $wp_filetype = wp_check_filetype( $filename, null );

	            // Set attachment data
	            $attachment = array(
	            'post_mime_type' => $wp_filetype['type'],
	            'post_title'     => sanitize_file_name( $filename ),
	            'post_content'   => '',
	            'post_type'     => 'post',
	            'post_status'    => 'inherit'
	            );

	            // Create the attachment
	            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

	            // Include image.php
	            require_once(ABSPATH . 'wp-admin/includes/image.php');

	            // Define attachment metadata
	            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	            // Assign metadata to attachment
	            wp_update_attachment_metadata( $attach_id, $attach_data );

	            // And finally assign featured image to post
	            set_post_thumbnail( $post_id, $attach_id );
	        }

		}

	    if ( class_exists( 'WooCommerce' ) ) {

	    	$review_text = array(
				'Nice product',
				'Good Quality Product',
				'Nice Product. Must buy It.',
				'I like this Product',
				'Nice Product',
			);

			wp_insert_term(
	            'Top Selling', // the term 
	            'product_tag', // the taxonomy
	            array(
		            'slug' => 'top-selling'
	    		)
	    	);

	        $product_name = array("HP 15s 11th Gen Intel Core i3 Laptop","Conbre MultipleXR2 Pro","boult audio probass q charge earphones","Timex Analog Blue Dial Men's Watch","Imou 360 Degree Security Camera","Acer 80 cm (32 inches) P series HD","BoAt Xtend Smart -watch","Timex Analog Blue Dial Men's Watch");
	    	  	for($i=1;$i<=8;$i++){
	            $title = $product_name[$i-1];
	            $content = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
	            $excerpt = 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industrys standard dummy text ever since the 1500 when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
	            // Create post object
	            $my_post = array(
		            'post_title'    => wp_strip_all_tags( $title ),
		            'post_content'  => $content,
		            'post_status'   => 'publish',
		            'post_type'     => 'product',
		            'post_excerpt'	=> $excerpt
	            );
	         
	            // Insert the post into the database
	            $post_id = wp_insert_post( $my_post );

	            // Add Product Tags
	            wp_set_object_terms($post_id, array('top-selling'), 'product_tag');

	            update_post_meta( $post_id, '_regular_price', "100" );
	            update_post_meta( $post_id, '_price', "100" );

	            for ( $c=0; $c <= 5; $c++ ) {
					$comment_id = wp_insert_comment( array(
						'comment_post_ID'      => $post_id,
						'comment_author'       => get_the_author_meta( 'display_name' ),
						'comment_author_email' => get_the_author_meta( 'user_email' ),
						'comment_content'      => $review_text[$c],
						'comment_parent'       => 0,
						'user_id'              => get_current_user_id(), // <== Important
						'comment_date'         => date('Y-m-d H:i:s'),
						'comment_approved'     => 1,
					) );

					update_comment_meta( $comment_id, 'rating', 
					3 );
				}
	            $image_url = get_template_directory_uri().'/assets/images/categories/top-selling/img'.$i.'.png';

	            $image_name= 'img'.$i.'.png';
	            $upload_dir       = wp_upload_dir(); 
	            // Set upload folder
	            $image_data= file_get_contents($image_url); 
	            // Get image data
	            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
	            // Generate unique name
	            $filename= basename( $unique_file_name ); 
	            // Create image file name

	            // Check folder permission and define file location
	            if( wp_mkdir_p( $upload_dir['path'] ) ) {
	            	$file = $upload_dir['path'] . '/' . $filename;
	            } else {
	            	$file = $upload_dir['basedir'] . '/' . $filename;
	        	}

	            // Create the image  file on the server
	            file_put_contents( $file, $image_data );

	            // Check image file type
	            $wp_filetype = wp_check_filetype( $filename, null );

	            // Set attachment data
	            $attachment = array(
	            'post_mime_type' => $wp_filetype['type'],
	            'post_title'     => sanitize_file_name( $filename ),
	            'post_content'   => '',
	            'post_type'     => 'post',
	            'post_status'    => 'inherit'
	            );

	            // Create the attachment
	            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

	            // Include image.php
	            require_once(ABSPATH . 'wp-admin/includes/image.php');

	            // Define attachment metadata
	            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	            // Assign metadata to attachment
	            wp_update_attachment_metadata( $attach_id, $attach_data );

	            // And finally assign featured image to post
	            set_post_thumbnail( $post_id, $attach_id );
	        }
		}

		/*------------ Deal Of The Day -----------------------*/

		set_theme_mod('drop_shipping_pro_deals_bgcolor','#F9F9F9');
		set_theme_mod('drop_shipping_pro_deals_section_main_heading','Deal Of The Day');
		set_theme_mod('drop_shipping_pro_deals_section_clock_timer_end','December 12, 2022 11:00:00');
		set_theme_mod('drop_shipping_pro_deals_section_category','deals');
		
	    if ( class_exists( 'WooCommerce' ) ) {
			$review_text = array(
				'Nice product',
				'Good Quality Product',
				'Nice Product. Must buy It.',
				'I like this Product',
				'Nice Product',
			);
			wp_insert_term(
	            'Deal Of The Day', // the term 
	            'product_tag', // the taxonomy
	            array(
		            'slug' => 'deals'
	    		)
	    	);

	        $product_name = array("Boat Rockerz 510 Wireless Bluetooth On Ear Headphones","P Tron Quinto 5W Wireless Bluetooth 5.0 Speaker","Canon EOS 1500D DSLR Camera");
	    	  	for($i=1;$i<=3;$i++){
	            $title = $product_name[$i-1];
	            $content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard since the 1500.';
	            $excerpt = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard since the 1500.';
	            // Create post object
	            $my_post = array(
		            'post_title'    => wp_strip_all_tags( $title ),
		            'post_content'  => $content,
		            'post_status'   => 'publish',
		            'post_type'     => 'product',
		            'post_excerpt'	=> $excerpt
	            );
	         
	            // Insert the post into the database
	            $post_id = wp_insert_post( $my_post );

	            // Add Product Tags
	            wp_set_object_terms($post_id, array('deals'), 'product_tag');

	            update_post_meta( $post_id, '_regular_price', "500" );
	            update_post_meta( $post_id, '_price', "500" );

	            for ( $c=0; $c <= 5; $c++ ) {
					$comment_id = wp_insert_comment( array(
						'comment_post_ID'      => $post_id,
						'comment_author'       => get_the_author_meta( 'display_name' ),
						'comment_author_email' => get_the_author_meta( 'user_email' ),
						'comment_content'      => $review_text[$c],
						'comment_parent'       => 0,
						'user_id'              => get_current_user_id(), // <== Important
						'comment_date'         => date('Y-m-d H:i:s'),
						'comment_approved'     => 1,
					) );

					update_comment_meta( $comment_id, 'rating', 
					3 );
				}

	            $image_url = get_template_directory_uri().'/assets/images/categories/deals/img'.$i.'.png';

	            $image_name= 'img'.$i.'.png';
	            $upload_dir       = wp_upload_dir(); 
	            // Set upload folder
	            $image_data= file_get_contents($image_url); 
	            // Get image data
	            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); 
	            // Generate unique name
	            $filename= basename( $unique_file_name ); 
	            // Create image file name

	            // Check folder permission and define file location
	            if( wp_mkdir_p( $upload_dir['path'] ) ) {
	            	$file = $upload_dir['path'] . '/' . $filename;
	            } else {
	            	$file = $upload_dir['basedir'] . '/' . $filename;
	        	}

	            // Create the image  file on the server
	            file_put_contents( $file, $image_data );

	            // Check image file type
	            $wp_filetype = wp_check_filetype( $filename, null );

	            // Set attachment data
	            $attachment = array(
	            'post_mime_type' => $wp_filetype['type'],
	            'post_title'     => sanitize_file_name( $filename ),
	            'post_content'   => '',
	            'post_type'     => 'post',
	            'post_status'    => 'inherit'
	            );

	            // Create the attachment
	            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

	            // Include image.php
	            require_once(ABSPATH . 'wp-admin/includes/image.php');

	            // Define attachment metadata
	            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	            // Assign metadata to attachment
	            wp_update_attachment_metadata( $attach_id, $attach_data );

	            // And finally assign featured image to post
	            set_post_thumbnail( $post_id, $attach_id );
	        }
		}


		/*----------- Blog Page --------------------*/
		set_theme_mod('drop_shipping_pro_our_blog_main_title','Our Blog');
    	$blog_title = 'THE STANDARD CHUNK OF LOREM IPSUM USED SINCE';
    	$blog_text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud exercitation ulla.';

        for($i=1;$i<=2;$i++){
          $title = $blog_title;
          $content = $blog_text;
            // Create post object
          $my_post = array(
          'post_title'    => wp_strip_all_tags( $title ),
          'post_content'  => $content,
          'post_status'   => 'publish',
          'post_type'     => 'post',
          );

          // Insert the post into the database
          $post_id = wp_insert_post( $my_post );

          $image_url = get_template_directory_uri().'/assets/images/blog/img'.$i.'.png';

          $image_name       = 'img'.$i.'.png';
          $upload_dir       = wp_upload_dir(); // Set upload folder
          $image_data       = file_get_contents($image_url); // Get image data
          $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
          $filename         = basename( $unique_file_name ); // Create image file name

          // Check folder permission and define file location
          if( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
          } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
          }

          // Create the image  file on the server
          file_put_contents( $file, $image_data );

          // Check image file type
          $wp_filetype = wp_check_filetype( $filename, null );

          // Set attachment data
          $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title'     => sanitize_file_name( $filename ),
            'post_content'   => '',
            'post_type'     => 'post',
            'post_status'    => 'inherit'
          );

          // Create the attachment
          $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

          // Include image.php
          require_once(ABSPATH . 'wp-admin/includes/image.php');

          // Define attachment metadata
          $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

          // Assign metadata to attachment
          wp_update_attachment_metadata( $attach_id, $attach_data );

          // And finally assign featured image to post
          set_post_thumbnail( $post_id, $attach_id );
        }

        //Insert Image for Hello World

			// Insert the post into the database
			$bwt_post_id = 1;

			$image_url = get_template_directory_uri().'/assets/images/blog/default.png';

			$image_name       = 'default.png';
			$upload_dir       = wp_upload_dir(); // Set upload folder
			$image_data       = file_get_contents($image_url); // Get image data
			$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
			$filename         = basename( $unique_file_name ); // Create image file name

			// Check folder permission and define file location
			if( wp_mkdir_p( $upload_dir['path'] ) ) {
				$file = $upload_dir['path'] . '/' . $filename;
			} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
			}

			// Create the image  file on the server
			file_put_contents( $file, $image_data );

			// Check image file type
			$wp_filetype = wp_check_filetype( $filename, null );

			// Set attachment data
			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title'     => sanitize_file_name( $filename ),
				'post_content'   => '',
				'post_type'     => 'post',
				'post_status'    => 'inherit'
			);

			// Create the attachment
			$attach_id = wp_insert_attachment( $attachment, $file, $bwt_post_id );

			// Include image.php
			require_once(ABSPATH . 'wp-admin/includes/image.php');

			// Define attachment metadata
			$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

			// Assign metadata to attachment
			wp_update_attachment_metadata( $attach_id, $attach_data );

			// And finally assign featured image to post
			set_post_thumbnail( $bwt_post_id, $attach_id );

        

		/*----------------Footer Copyright-------------------*/
		set_theme_mod('drop_shipping_pro_scroll_to_top_icon','fas fa-chevron-up');
		set_theme_mod('drop_shipping_pro_section_footer_bgcolor','#F3F3F3');
		set_theme_mod('drop_shipping_pro_footer_copy','Copyrights © 2021 - Dropshipping WordPress Theme');

		set_theme_mod('drop_shipping_pro_footer_social_icon_link_number','4');

		$social_icon = array("fab fa-instagram", "fab fa-pinterest-p","fab fa-twitter","fab fa-facebook-f");
		$social_link = array("https://www.instagram.com/", "https://in.pinterest.com/","https://twitter.com/","https://www.facebook.com/");
	    for( $j=1; $j<=4; $j++ ) {
			set_theme_mod( 'drop_shipping_pro_footer_social_icon_link'.$j, $social_link[$j-1] );
			set_theme_mod( 'drop_shipping_pro_footer_social_icon_picker'.$j, $social_icon[$j-1]);
		}

		// newsletter form shortcode
         	$cf7title1 = "Newsletter";
			$cf7content1 = '
				[email* your-email placeholder"Enter Your Mail"][submit "Subscribe"]
			[_site_title] "[your-subject]"
			[_site_title] <vowelweb@gmail.com>
			From: [your-name] <[your-email]>
			Subject: [your-subject]

			Message Body:
			[your-message]

			--
			This e-mail was sent from a contact form on [_site_title] ([_site_url])
			[_site_admin_email]
			Reply-To: [your-email]

			0
			0

			[_site_title] "[your-subject]"
			[_site_title] <vowelweb@gmail.com>
			Message Body:
			[your-message]

			--
			This e-mail was sent from a contact form on [_site_title] ([_site_url])
			[your-email]
			Reply-To: [_site_admin_email]

			0
			0
			Thank you for your message. It has been sent.
			There was an error trying to send your message. Please try again later.
			One or more fields have an error. Please check and try again.
			There was an error trying to send your message. Please try again later.
			You must accept the terms and conditions before sending your message.
			The field is required.
			The field is too long.
			The field is too short.
			There was an unknown error uploading the file.
			You are not allowed to upload files of this type.
			The file is too big.
			There was an error uploading the file.';

			$cf7_post1 = array(
			'post_title'    => wp_strip_all_tags( $cf7title1 ),
			'post_content'  => $cf7content1,
			'post_status'   => 'publish',
			'post_type'     => 'wpcf7_contact_form',
			);
			// Insert the post into the database
			$cf7post_id1 = wp_insert_post( $cf7_post1 );

			add_post_meta($cf7post_id1, "_form", '
				[email* your-email placeholder"Enter Your Mail"][submit "Subscribe"]');

			$cf7mail_data1  = array('subject' => '[_site_title] "[your-subject]"',
			    'sender' => '[_site_title] <vowelweb@gmail.com>',
			    'body' => 'From: [your-name] <[your-email]>
			Subject: [your-subject]

			Message Body:
			[your-message]

			--
			This e-mail was sent from a contact form on [_site_title] ([_site_url])',
			    'recipient' => '[_site_admin_email]',
			    'additional_headers' => 'Reply-To: [your-email]',
			    'attachments' => '',
			    'use_html' => 0,
			    'exclude_blank' => 0 );

		add_post_meta($cf7post_id1, "_mail", $cf7mail_data1);
			          // Gets term object from Tree in the database.

		$cf7shortcode1 = '[contact-form-7 id="'.$cf7post_id1.'" title="'.$cf7title1.'"]';

        //404
          set_theme_mod( 'drop_shipping_pro_error_page_title', '404' );
          set_theme_mod( 'drop_shipping_pro_error_page_content', 'Sorry, but the page you are looking for does not existing');
          set_theme_mod( 'drop_shipping_pro_error_page_small_head' ,'Oops! That page can’t be found');
          set_theme_mod( 'drop_shipping_pro_error_page_button_text', 'Go To Home Page');

        //Faq
        set_theme_mod('drop_shipping_pro_faq_page_main_title','Frequently Asked Questions');
		set_theme_mod( 'drop_shipping_pro_faq_temp_faq_number', '4' );
		$faqque = array("Lorem ipsum dolor sit amet, vix an natum labitur eleifd", "Lorem ipsum dolor sit amet, vix an natum labitur eleifd", "Lorem ipsum dolor sit amet, vix an natum labitur eleifd", "Lorem ipsum dolor sit amet, vix an natum labitur eleifd");

		$faqans = array("Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem. An utinam consulatu eos, est facilis", "Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem. An utinam consulatu eos, est facilis.","Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem. An utinam consulatu eos, est facilis.","Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem. An utinam consulatu eos, est facilis.","Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem. An utinam consulatu eos, est facilis.");

		for( $i=1; $i<=4; $i++ ) {
			//counter Number
			set_theme_mod( 'drop_shipping_pro_faq_temp_faq_que'.$i, $faqque[$i-1] );
			//Counter Title
			set_theme_mod( 'drop_shipping_pro_faq_temp_faq_ans'.$i, $faqans[$i-1] );
		}

	   /*-------------- Blog Page ----------------------*/
	   set_theme_mod('event_management_pro_blog_category_prev_title', 'Previous');
       set_theme_mod('event_management_pro_blog_category_next_title','Next');

	//Contact Page
	    set_theme_mod('drop_shipping_pro_address_latitude','21.145800');
	    set_theme_mod('drop_shipping_pro_address_longitude','79.088155');
	    set_theme_mod('event_management_pro_contact_page_main_title','Leave Message');
	    set_theme_mod('drop_shipping_pro_contact_page_block_main_title','Get In Touch');
	    set_theme_mod('drop_shipping_pro_contact_box_number', 3);

	       $contact_icon = array(
	        'fas fa-envelope',
	        'fas fa-map-marker-alt',
	        'fa fa-phone '
	        );
	       $contact_head = array('Email Address','Our Location','Call Us');

	       $contact_text = array('Info@gmail.com','123, New Lenox, Chicago il New york.','+ 123 4567 8910');

	    for($i=1; $i<=6; $i++) {

	        set_theme_mod('drop_shipping_pro_contact_box_icon' . $i, $contact_icon[$i-1]);
	        set_theme_mod('drop_shipping_pro_contact_box_heading' . $i, $contact_head[$i-1]);
	        set_theme_mod('drop_shipping_pro_contact_box_text'.$i, $contact_text[$i-1]);
	    }

	    set_theme_mod('drop_shipping_pro_contact_page_main_title', 'Leave Message ');
	    

 		// contact form shortcode
         	$cf7title = "Contact Page";
			$cf7content = '
			<div class="row">
				<div class="">
					[text* your-name placeholder "Name"] 
			  </div>
			</div>
			<div class="row">
				<div class="col-md-6 col-12">
					[email* your-email placeholder "Email"] 
				</div>
				<div class="col-md-6 col-12">
					[tel tel placeholder "Phone Number"]
				</div>
			</div>
			<div class="row">
				<div class="">
					[textarea* your-message placeholder "Message"] </label>
				</div>
			</div>
			<div class="text-center pt-2 pb-5">
				[submit "Send Message"]
			</div>
			[_site_title] "[your-subject]"
			[_site_title] <vowelweb@gmail.com>
			From: [your-name] <[your-email]>
			Subject: [your-subject]

			Message Body:
			[your-message]

			-- 
			This e-mail was sent from a contact form on [_site_title] ([_site_url])
			[_site_admin_email]
			Reply-To: [your-email]

			0
			0

			[_site_title] "[your-subject]"
			[_site_title] <vowelweb@gmail.com>
			Message Body:
			[your-message]

			-- 
			This e-mail was sent from a contact form on [_site_title] ([_site_url])
			[your-email]
			Reply-To: [_site_admin_email]

			0
			0
			Thank you for your message. It has been sent.
			There was an error trying to send your message. Please try again later.
			One or more fields have an error. Please check and try again.
			There was an error trying to send your message. Please try again later.
			You must accept the terms and conditions before sending your message.
			The field is required.
			The field is too long.
			The field is too short.
			There was an unknown error uploading the file.
			You are not allowed to upload files of this type.
			The file is too big.
			There was an error uploading the file.';

			$cf7_post = array(
			'post_title'    => wp_strip_all_tags( $cf7title ),
			'post_content'  => $cf7content,
			'post_status'   => 'publish',
			'post_type'     => 'wpcf7_contact_form',
			);
			// Insert the post into the database
			$cf7post_id = wp_insert_post( $cf7_post );

			add_post_meta($cf7post_id, "_form", '
			<div class="row">
				<div class="">
					[text* your-name placeholder "Name"] 
			  </div>
			</div>
			<div class="row">
				<div class="col-md-6 col-12">
					[email* your-email placeholder "Email"] 
				</div>
				<div class="col-md-6 col-12">
					[tel tel placeholder "Phone Number"]
				</div>
			</div>
			<div class="row">
				<div class="">
					[textarea* your-message placeholder "Message"] </label>
				</div>
			</div>
			<div class="text-center pt-2 pb-5">
				[submit "Send Message"]
			</div>
			');

			$cf7mail_data  = array('subject' => '[_site_title] "[your-subject]"',
			    'sender' => '[_site_title] <vowelweb@gmail.com>',
			    'body' => 'From: [your-name] <[your-email]>
			Subject: [your-subject]

			Message Body:
			[your-message]

			-- 
			This e-mail was sent from a contact form on [_site_title] ([_site_url])',
			    'recipient' => '[_site_admin_email]',
			    'additional_headers' => 'Reply-To: [your-email]',
			    'attachments' => '',
			    'use_html' => 0,
			    'exclude_blank' => 0 );

		add_post_meta($cf7post_id, "_mail", $cf7mail_data);
			          // Gets term object from Tree in the database.

		$cf7shortcode = '[contact-form-7 id="'.$cf7post_id.'" title="'.$cf7title.'"]';

		set_theme_mod( 'drop_shipping_pro_contact_page_shortcode',$cf7shortcode );

		set_theme_mod('drop_shipping_pro_banner_bgimage',get_template_directory_uri() . '/assets/images/banner.png');

    	$this->theme_create_customizer_nav_menu();
    	$this->theme_create_customizer_footer_menu1();
    	$this->theme_create_customizer_footer_menu2();

    	$BWP_Widget_Importer = new BWP_Widget_Importer;
		$BWP_Widget_Importer->import_widgets( $this->widget_file_url );
	    exit;
	}



	public function wz_activate_drop_shipping_pro() {
		$drop_shipping_pro_license_key = $_POST['drop_shipping_pro_license_key'];

		$endpoint = IBTANA_THEME_LICENCE_ENDPOINT.'ibtana_client_activate_premium_theme';

		$body = [
			'theme_license_key'  => $drop_shipping_pro_license_key,
			'site_url'					 => site_url(),
			'theme_text_domain'	 => wp_get_theme()->get( 'TextDomain' )
		];
		$body = wp_json_encode( $body );
		$options = [
			'body'        => $body,
			'headers'     => [
				'Content-Type' => 'application/json',
			]
		];
		$response = wp_remote_post( $endpoint, $options );
		if ( is_wp_error( $response ) ) {
			Whizzie::remove_the_theme_key();
			Whizzie::set_the_validation_status('false');
			$response = array('status' => false, 'msg' => 'Something Went Wrong!');
			wp_send_json($response);
			exit;
		} else {
			$response_body = wp_remote_retrieve_body( $response );
			$response_body = json_decode($response_body);

			if ( $response_body->is_suspended == 1 ) {
				Whizzie::set_the_suspension_status( 'true' );
			} else {
				Whizzie::set_the_suspension_status( 'false' );
			}

			if ($response_body->status === false) {
				Whizzie::remove_the_theme_key();
				Whizzie::set_the_validation_status('false');
				$response = array('status' => false, 'msg' => $response_body->msg);
				wp_send_json($response);
				exit;
			} else {
				Whizzie::set_the_validation_status('true');
				Whizzie::set_the_theme_key($drop_shipping_pro_license_key);
				$response = array('status' => true, 'msg' => 'Theme Activated Successfully!');
				wp_send_json($response);
				exit;
			}
		}
	}
}
