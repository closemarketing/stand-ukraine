<?php
/**
 * Plugin Name: Stand with Ukraine
 * Plugin URI:  https://close.technology
 * Description: Shows a flag in the footer to show that you stand with Ukraine.
 * Version:     1.2
 * Author:      Closemarketing
 * Author URI:  http://en.close.marketing
 * Text Domain: support-ukraine
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package     WordPress
 * @author      Closemarketing
 * @copyright   2022 Closemarketing
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 *
 * Prefix:      supuk
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

add_action( 'plugins_loaded', 'supuk_plugin_init' );
/**
 * Load localization files
 *
 * @return void
 */
function supuk_plugin_init() {
	load_plugin_textdomain( 'stand-ukraine', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action( 'wp_footer', 'supuk_show_flag' );
/**
 * Shows flag
 *
 * @return void
 */
function supuk_show_flag() {
	if ( wp_is_mobile() ) {
		$width = 200;
		$height = 54;
	} else {
		$width = 300;
		$height = 84;
	}
	echo '<div title="' . esc_html__( 'We stand with Ukraine', 'stand-ukraine' ) . '" style="position: fixed; left: -80px; bottom: 20px; width: ' . esc_html( $width ) . 'px; height: ' . esc_html( $height ) . 'px; transform: rotate(45deg); z-index: 999; background: linear-gradient(-180deg, rgb(0, 91, 187) 50%, rgb(255, 213, 0) 50%);"></div>';
}
