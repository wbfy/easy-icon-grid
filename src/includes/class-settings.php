<?php
/**
 * Singleton global plugin settings handler
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;

/**
 * Manage settings model
 */
class Settings {

	/**
	 * Internal settings variables
	 *
	 * @var array internal list of settings and values
	 */
	private $list = null;

	/**
	 * Get singleton instance
	 *
	 * @return object singleton instance
	 */
	public static function instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$me       = __CLASS__;
			$instance = new $me();
			return $instance;
		}
		return $instance;
	}

	/**
	 * Load settings from DB
	 * Extend existing settings to also include any new top level
	 * settings that may have been added during any plugin update
	 */
	public function __construct() {
		$this->init_defaults();
		$settings = get_option( 'easy_icon_grid' );
		if ( is_array( $settings ) ) {
			$this->list = Arrays::extend(
				$this->list,
				$settings
			);
		}
	}

	/**
	 * Magic check option exists
	 *
	 * @param string $option option name
	 */
	public function __isset( $option ) {
		return ( isset( $this->list[ $option ] ) ) ? true : false;
	}

	/**
	 * Magic option getter
	 *
	 * @param string $option option name
	 * @return mixed option value
	 */
	public function __get( $option ) {
		return ( isset( $this->list[ $option ] ) ) ? $this->list[ $option ] : null;
	}

	/**
	 * Magic option setter
	 *
	 * @param string $option option name
	 * @param mixed  $value option value
	 */
	public function __set( $option, $value ) {
		if ( isset( $this->list[ $option ] ) ) {
			$$this->list[ $option ] = $value;
		}
	}

	/**
	 * Get all settings as array
	 *
	 * @return array array of settings
	 */
	public function get_all() {
		return $this->list;
	}

	/**
	 * Delete settings from db
	 */
	public function drop() {
		delete_option( 'easy_icon_grid' );
	}

	/**
	 * Called on plugin initialisation
	 */
	public function init() {
		$this->init_defaults();
		add_option( 'easy_icon_grid', $this->list );
	}

	/**
	 * Set default settings
	 */
	private function init_defaults() {
		$this->list = array(
			'config_data' => array(
				'on_deactivate' => 0,
				'on_delete'     => 0,
			),
			'font'        => array(
				'url'          => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css',
				'class_prefix' => 'fas fa-',
			),
		);
	}
}
