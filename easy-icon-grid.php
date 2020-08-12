<?php
/**
 * Plugin Name: Easy Icon Grid
 * Plugin URI: https://websitesbuiltforyou.com/plugins/wordpress/easy-icon-grid
 * Description: Easily display grids of icons using shortcodes, widgets and Gutenberg blocks
 * Author: Websites Built For You
 * Author URI: https://websitesbuiltforyou.com
 * Version: 1.0.11
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses
 * Text Domain: easy-icon-grid
 * Domain Path: /assets/languages
 * Requires at least: 5.0
 * Requires PHP: 5.6
 *
 * (c) 2019 Steve Perkins, Websites Built For You
 *
 * Easy Icon Grid is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free Software
 * Foundation, either version 2 of the License, or any later version.
 *
 * Easy Icon Grid is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Easy Icon Grid If not, see https://www.gnu.org/licenses.
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( '\WBFY\EasyIconGrid\Controller' ) ) {
	define( 'WBFY\EasyIconGrid\VERSION', '1.0.11' );
	define( 'WBFY\EasyIconGrid\PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
	define( 'WBFY\EasyIconGrid\MAX_ITEMS', 15 );
	define( 'WBFY\EasyIconGrid\DEFAULT_TITLE_TAG', 'h2' );
	define( 'WBFY\EasyIconGrid\DEFAULT_TITLE_ALIGN', 'center' );
	define( 'WBFY\EasyIconGrid\DEFAULT_ICON_COLOR', '#ffa500' );
	define( 'WBFY\EasyIconGrid\DEFAULT_ICON_SIZE', 'large' );
	define( 'WBFY\EasyIconGrid\DEFAULT_MAX_COLS', '5' );

	require_once PLUGIN_DIR . '/src/includes/class-autoloader.php';
	Autoloader::register();

	$easy_icon_grid = ( new Controller() );
}
