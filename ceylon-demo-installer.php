<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}


/*
Plugin Name: 	Ceylon Demo Installer
Description: 	Plugin used to install demo data for themes developed and submitted by Ceylon Themes.
Version: 		1.1.4
Author: 		ceylonthemes
Author URI: 	www.ceylonthemes.com
Tested up to: 	5.8
Text Domain: 	ceylon-demo-nstaller
Generated By: 	http://ceylonthemes.com
License:        GPL-2.0+
Domain Path:    /languages
*/

/*Define Constants for this plugin*/
define( 'CEYLON_DEMO_SETUP_VERSION', '1.1.5' );
define( 'CEYLON_DEMO_SETUP_PLUGIN_NAME', 'ceylon-demo-installer' );
define( 'CEYLON_DEMO_SETUP_PATH', plugin_dir_path( __FILE__ ) );
define( 'CEYLON_DEMO_SETUP_URL', plugin_dir_url( __FILE__ ) );
define( 'CEYLON_DEMO_SETUP_TEMPLATE_URL', CEYLON_DEMO_SETUP_URL.'includes/demo-data/' );
define( 'CEYLON_DEMO_SETUP_SCRIPT_PREFIX', ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ceylon-demo-installer-activator.php
 */
function activate_ceylon_demo_setup() {
    require_once CEYLON_DEMO_SETUP_PATH . 'includes/activator.php';
    Ceylon_Demo_Setup_Activator::activate();
}


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require CEYLON_DEMO_SETUP_PATH . 'includes/init.php';


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ceylon-demo-installer-deactivator.php
 */
function deactivate_ceylon_demo_setup() {
    require_once CEYLON_DEMO_SETUP_PATH . 'includes/deactivator.php';
    Ceylon_Demo_Setup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ceylon_demo_setup' );
register_deactivation_hook( __FILE__, 'deactivate_ceylon_demo_setup' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
if( !function_exists( 'run_ceylon_demo_setup')){

    function run_ceylon_demo_setup() {

        return Ceylon_Demo_Setup::instance();
    }
    run_ceylon_demo_setup()->run();
}