<?php
/**
 * Templates handler
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;

/**
 * Render PHP templates
 */
class Templates {

	/**
	 * Render template
	 *
	 * @param string $template the template file to render
	 * @param array  $data passed through to the template file
	 * @return string the compiled template
	 */
	public static function render( $template, $data = array() ) {
		ob_start();
		include PLUGIN_DIR . '/src/templates/' . $template;
		return ob_get_clean();
	}
}
