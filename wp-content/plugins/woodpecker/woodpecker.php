<?php
/**
 * The plugin Woodpecker for WordPress
 *
 * @link              #
 * @since             1.0.0
 * @package           Woodpecker_For_Wordpress_Connector
 *
 * @wordpress-plugin
 * Plugin Name:       Woodpecker
 * Plugin URI:        https://woodpecker.co/plugins/wordpress-leadform/
 * Description:       Add Woodpecker for WordPress to your Wordpress and enjoy automatic transfer of data from the Woodpecker for WordPress into your Woodpecker campaign. Never lose a lead again.
 * Version:           2.0.3
 * Author:            Woodpecker.co
 * Author URI:        https://woodpecker.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wfw
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('WOODPECKER_PLUGIN_NAME_VERSION', '2.0.3');
define('WOODPECKER_PLUGIN_DATABASE_VERSION', '2.0.1' );
define('WOODPECKER_PLUGIN_URL', plugin_dir_url( __FILE__ ));

function activate_woodpecker_for_wordpress() {
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
}

register_activation_hook( __FILE__, 'activate_woodpecker_for_wordpress' );

require plugin_dir_path( __FILE__ ) . 'includes/class-wfw.php';

/**
 * @since    1.0.0
 */
function run_woodpecker_for_wordpress() {
	$plugin = new Woodpecker_For_Wordpress_Connector();
	$plugin->run();
}
run_woodpecker_for_wordpress();


/**
 * Link to settings
 * @since    1.0.3
 */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );

function add_action_links( $links ) {
	$settings_link = array(
		'<a href="' . admin_url( 'admin.php?page=wfw') . '">' . __('Settings', 'wfw') . '</a>',
	);
	return array_merge($links, $settings_link);
}
