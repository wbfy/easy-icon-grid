<?php
/**
 * Grid content and output handler
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;

/**
 * Grid class
 */
class Grid {

	const FONT_ID = 'easy-icon-grid-font';

	/**
	 * Render icon grid html
	 *
	 * @param array $content grid content.
	 */
	public static function render( $content ) {
		self::register_styles();
		self::register_font();

		return Templates::render(
			'grid.php',
			array(
				'content'  => $content,
				'settings' => Settings::instance(),
			)
		);
	}

	/**
	 * Default grid properties
	 *
	 * @return array $template list of default properties
	 */
	public static function default_props() {
		$template = array(
			'title'       => '',
			'title_align' => DEFAULT_TITLE_ALIGN,
			'title_tag'   => DEFAULT_TITLE_TAG,
			'icon_color'  => DEFAULT_ICON_COLOR,
			'icon_size'   => DEFAULT_ICON_SIZE,
			'max_cols'    => DEFAULT_MAX_COLS,
		);

		for ( $i = 1; $i <= MAX_ITEMS; $i++ ) {
			$template[ 'item' . $i . '_icon' ] = '';
			$template[ 'item' . $i . '_text' ] = '';
		}

		return $template;
	}

	/**
	 * Register font style or script link
	 * The link can be a .js script or .css file
	 *
	 * @param boolean $enqueue whether to engueue the font loader as well as register it.
	 */
	public static function register_font( $enqueue = true ) {
		$settings = Settings::instance();

		if ( preg_match( '/\.js$/', $settings->font['url'] ) ) {
			wp_register_script(
				self::FONT_ID,
				$settings->font['url'],
				null,
				VERSION,
				true
			);
			if ( $enqueue ) {
				wp_enqueue_script( self::FONT_ID );
			}
		} else {
			wp_register_style(
				self::FONT_ID,
				$settings->font['url'],
				null,
				VERSION
			);
			if ( $enqueue ) {
				wp_enqueue_style( self::FONT_ID );
			}
		}
	}

	/**
	 * Register CSS styles for grid
	 *
	 * @param boolean $enqueue whether to engueue the style as well as register it.
	 * @return $id the ID used for the registered style.
	 */
	public static function register_styles( $enqueue = true ) {
		$id = 'easy-icon-grid-frontend-css';

		// Frontend CSS.
		wp_register_style(
			$id,
			plugins_url( '/easy-icon-grid/assets/css/easy-icon-grid-frontend.min.css' ),
			null,
			VERSION
		);

		if ( $enqueue ) {
			wp_enqueue_style( $id );
		}

		return $id;
	}

}
