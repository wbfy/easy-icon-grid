<?php
/**
 * Easy Icon Grid Gutenberg block editor handler
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;

/**
 * (Guten)Block class
 */
class Block {

	/**
	 * Enqueue assets for front end
	 */
	public function init_front_end() {
		Grid::register_styles();
		Grid::register_font();
	}

	/**
	 * Register block for admin and enqueue assets
	 */
	public function init_admin() {
		wp_register_script(
			'easy-icon-grid-block-js',
			plugins_url( '/easy-icon-grid/assets/js/easy-icon-grid-block.min.js' ),
			array( 'wp-blocks', 'wp-editor', 'wp-components', 'wp-i18n', 'wp-element' ),
			VERSION,
			false
		);
		// Pass settings to script.
		wp_localize_script(
			'easy-icon-grid-block-js',
			'eigSettings',
			array_merge(
				array(
					'defaults' => array(
						'title_tag'   => DEFAULT_TITLE_TAG,
						'title_align' => DEFAULT_TITLE_ALIGN,
						'icon_color'  => DEFAULT_ICON_COLOR,
						'icon_size'   => DEFAULT_ICON_SIZE,
						'max_cols'    => DEFAULT_MAX_COLS,
						'max_items'   => MAX_ITEMS,
					),
				),
				Settings::instance()->get_all()
			)
		);
		// Translations for script.
		wp_set_script_translations( 'easy-icon-grid-block-js', 'easy-icon-grid' );

		Grid::register_font();

		register_block_type(
			'wbfy/easy-icon-grid',
			array(
				'editor_script' => 'easy-icon-grid-block-js',
				'editor_style'  => 'easy-icon-grid-block-editor-css',
				'style'         => Grid::register_styles( false ),
			)
		);
	}
}
