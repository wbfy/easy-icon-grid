<?php
/**
 * Render PHP templates
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;

/**
 * Templates class
 */
class Templates {

	/**
	 * Render template
	 *
	 * @param string $template the template file to render.
	 * @param array  $data passed through to the template file.
	 * @return string the compiled template.
	 */
	public static function render( $template, $data = array() ) {
		ob_start();
		include PLUGIN_DIR . '/src/templates/' . $template;
		return ob_get_clean();
	}
}
