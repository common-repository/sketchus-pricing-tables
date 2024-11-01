<?php

/**
 *
 * @link              https://www.hostrider.us
 * @since             3.5.3
 * @package           Skpricing_Tables
 *
 * @wordpress-plugin
 * Plugin Name:       Pricing Tables by HostRider
 * Plugin URI:        https://www.hostrider.us/pricing-tables/
 * Description:       Free and easy way to create your Services / Products Packages with HostRider Pricing Tables.
 * Version:           3.6.2
 * Author:            HostRider
 * Author URI:        https://www.hostrider.us/pricing-tables/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       skpricing-table
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-skpricing-table-activator.php
 */
function activate_skpricing_table() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-skpricing-table-activator.php';
	Skpricing_Table_Activator::activate();
	
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-skpricing-table-deactivator.php
 */
function deactivate_skpricing_table() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-skpricing-table-deactivator.php';
	Skpricing_Table_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_skpricing_table' );
register_deactivation_hook( __FILE__, 'deactivate_skpricing_table' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-skpricing-table.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */


  //echo $file ;
function run_skpricing_table() {

	$plugin = new skpricing_table();
	$plugin->run();

}
run_skpricing_table();


