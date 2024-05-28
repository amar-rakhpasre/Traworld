<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_filter('admin_enqueue_scripts','creativ_demo_importer_dashboard_enqueue_scripts');
/**
 * Enqueue scripts.
 */
function creativ_demo_importer_dashboard_enqueue_scripts() {
    wp_enqueue_script( 'creativ-demo-importer', CREATIV_DEMO_IMPORTER_URL . 'assets/js/dashboard.js', array( 'jquery' ), '1.0.0', true );
    wp_localize_script(
        'creativ-demo-importer',
        'CREATIV_DEMO',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'redirect_url' => esc_url(admin_url('/themes.php?page=advanced-import')),
            'buttton_status' => array(
                'install' => __('Processing', 'creativ-demo-importer'),
                'activate' => __('Activating', 'creativ-demo-importer'),
                'redirect' => __('Redirecting', 'creativ-demo-importer'),
                
            ),
            'warning' => __('Failed to install and activate Advanced Import plugin. Please refresh and try again.', 'creativ-demo-importer'),
            'nonce'    => wp_create_nonce( 'ct-plugin-nonce' )
        )
    );
}

/**
 * Get plugin list.
 */
function creativ_demo_importer_get_plugin_list(){
    $plugin_list = array(
        array(
            'slug' => 'advanced-import',
            'path' => 'advanced-import/advanced-import.php'
        )
    );

    return $plugin_list;
}

/**
 * Activate plugin.
 */
function creativ_demo_importer_activate_plugin($path){
    if (!current_user_can('install_plugins')) {
        return;
    }

    if (!function_exists('activate_plugin')) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    $activation_status = activate_plugin($path,'', false, false);
    if(is_wp_error($activation_status)){
        return false;
    }else{
        return true;
    }
}

/**
 * Install plugin.
 */
function creativ_demo_importer_install_plugin($slug,$path){
    if (!current_user_can('install_plugins')) {
        return;
    }

    if (!function_exists('plugins_api')) {
        require_once ABSPATH . 'wp-admin/includes/plugin-install.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }
    if (!class_exists('WP_Upgrader')) {
        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }


    $api = plugins_api(
        'plugin_information',
        array(
            'slug'   => sanitize_key(wp_unslash($slug)),
            'fields' => array(
                'short_description' => false,
                'tested' => false,
                'requires' => false,
                'requires_php' => false,
                'rating' => false,
                'ratings' => false,
                'downloaded' => false,
                'last_updated' => false,
                'added' => false,
                'tags' => false,
                'compatibility' => false,
                'homepage' => false,
                'donate_link' => false,
            ),
        )
    );

    $download_link = $api->download_link;

    // Use AJAX upgrader skin instead of plugin installer skin.
    // ref: function wp_ajax_install_plugin().
    $upgrader = new Plugin_Upgrader(new WP_Ajax_Upgrader_Skin());

    $install_status = $upgrader->install($download_link);
    if($install_status === false){
        return false;
    }else{
        creativ_demo_importer_activate_plugin($path);
    }
}

add_filter('wp_ajax_creativ_demo_importer_plugin_install', 'creativ_demo_importer_ajax_plugin_install');

/**
 * Ajax plugin install and activate.
 */
function creativ_demo_importer_ajax_plugin_install(){
    $nonce = (isset($_POST['nonce'])) ? sanitize_key( $_POST['nonce']) : '';
    $nonce_status = wp_verify_nonce( $nonce, 'ct-plugin-nonce' );

    if ( $nonce_status === false ) {
        wp_send_json_error(
            array(
                'success'   => false,
            )
        );
    }
    $plugins = creativ_demo_importer_get_plugin_list();

    foreach($plugins as $plugin){

        if(file_exists(WP_PLUGIN_DIR . '/' . $plugin['slug'])){
            creativ_demo_importer_activate_plugin($plugin['path']);
        }else{
            creativ_demo_importer_install_plugin($plugin['slug'],$plugin['path']);
        }
        if(is_plugin_active($plugin['path'])){
            wp_send_json_success(
                array(
                    'success'   => true,
                )
            );
        }

        wp_send_json_error(
            array(
                'success'   => false,
            )
        );
    }
}