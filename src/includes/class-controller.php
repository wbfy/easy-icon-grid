<?php
/**
 * Main plugin loader
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;

/**
 * Main plugin controller
 */
class Controller {

	/**
	 * Initialise plugin and menus
	 */
	public function __construct() {
		// Add activate/deactivate handlers
		register_activation_hook( PLUGIN_DIR . '/easy-icon-grid.php', array( $this, 'activate' ) );
		register_deactivation_hook( PLUGIN_DIR . '/easy-icon-grid.php', array( $this, 'deactivate' ) );

		// Add admin handler
		add_action( 'admin_init', array( new Admin(), 'init' ) );
		add_action( 'admin_menu', array( new Admin(), 'settings_menu_link' ) );

		// Add shortcode handler
		add_action( 'init', array( new Shortcode(), 'init' ) );

		// Enqueue Gutenberg editor only assets
		add_action( 'enqueue_block_editor_assets', array( new Block(), 'init_admin' ) );
		// Enqueue Gutenberg editor and front end assets
		add_action( 'enqueue_block_assets', array( new Block(), 'init_front_end' ) );

		// Add widget handler
		add_action( 'widgets_init', array( new Widget(), 'init' ) );

		// Load translations
		add_action( 'plugins_loaded', array( $this, 'load_i18n' ) );
	}

	/**
	 * Load I18N data
	 */
	public function load_i18n() {
		load_plugin_textdomain( 'easy-icon-grid', false, dirname( plugin_basename( __FILE__ ) ) . '/assets/languages/' );
	}

	/**
	 * Initialise plugin and settings
	 */
	public function activate() {
		Settings::instance()->init();
	}

	/**
	 * Deactivate plugin and remove settings if required
	 */
	public function deactivate() {
		$settings = Settings::instance();
		if ( ! isset( $settings->config_data['on_deactivate'] ) || $settings->config_data['on_deactivate'] ) {
			$settings->drop();
		}
	}
}
