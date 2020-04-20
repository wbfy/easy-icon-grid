<?PHP
/**
 * Autoloader for WBFY/EasyIconGrid namespace
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;

/**
 * Autoloader class
 */
class Autoloader {

	/**
	 * Register autoloader
	 */
	public static function register() {
		spl_autoload_register( array( __NAMESPACE__ . '\Autoloader', 'autoload' ) );
	}

	/**
	 * Dynamically autoload classes as needed
	 *
	 * @param string $class class to be autoloaded
	 */
	public static function autoload( $class ) {
		$prefix = __NAMESPACE__ . '\\';
		if ( $prefix !== substr( $class, 0, strlen( $prefix ) ) ) {
			return;
		}

		$class = strtolower( str_replace( $prefix, '', $class ) );
		if ( empty( $class ) ) {
			return;
		}

		$file = PLUGIN_DIR . '/src/includes/class-' . $class . '.php';
		include_once $file;
	}
}
