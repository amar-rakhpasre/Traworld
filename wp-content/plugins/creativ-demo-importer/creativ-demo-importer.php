<?php
/**
 * Plugin Name: Creativ Demo Importer
 * Description: Creativ Themes starter sites importer.
 * Version:     1.0.9
 * Author:      creativthemes
 * Author URI:  
 * License:     GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: creativ-demo-importer
 * Creativ Demo Importer is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * @package Creativ Demo Importer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define('CREATIV_DEMO_IMPORTER_URL', plugin_dir_url(__FILE__));

register_activation_hook(__FILE__, 'creativ_demo_importer_activation_redirect_status');
/**
 * Add Option required to check whether to perform redirect.
 */
function creativ_demo_importer_activation_redirect_status() {
    $activation_status = apply_filters('creativ_demo_importer_enable_activation_redirect', true);
    add_option('creativ_demo_importer_activation_redirect_status', $activation_status);
}

add_action('admin_init', 'creativ_demo_importer_dashboard_redirect');
/**
 * Redirect to dashboard.
 */
function creativ_demo_importer_dashboard_redirect() {

    if (get_option('creativ_demo_importer_activation_redirect_status')) {

        // Delete option value so no more redirects.
        delete_option('creativ_demo_importer_activation_redirect_status');

        $redirect_url = defined('ADVANCED_IMPORT_VERSION') ? esc_url(admin_url('/themes.php?page=advanced-import')) : esc_url(admin_url('admin.php?page=ct-options'));
        wp_safe_redirect($redirect_url);
        exit;
    }
}

/**
 *  Creativ demo importer dashboard.
 */
require plugin_dir_path( __FILE__ ) . 'lib/admin/plugin-dashboard.php';

/**
 *  Importer functions.
 */
require plugin_dir_path( __FILE__ ) . 'includes/import-functions.php';

/**
 *  Creativ demo importer dashboard functions.
 */
if(!class_exists( 'Advanced_Import' )){
    require plugin_dir_path( __FILE__ ) . 'lib/admin/install-functions.php';
}