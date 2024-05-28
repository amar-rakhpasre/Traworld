<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_action( 'current_screen', 'creativ_demo_importer_remove_admin_notices' );
/**
 * Remove notices from plugin dashboard.
 */
function creativ_demo_importer_remove_admin_notices(){
    $current_screen = get_current_screen();
    if ( $current_screen->id == 'toplevel_page_ct-options' ){
        remove_all_actions( 'admin_notices' );  
    }
}

add_filter('admin_enqueue_scripts','creativ_demo_importer_dashboard_enqueue_styles');
/**
 * Enqueue Styles.
 */
function creativ_demo_importer_dashboard_enqueue_styles() {
    wp_enqueue_style( 'creativ-demo-importer', CREATIV_DEMO_IMPORTER_URL . 'assets/css/dashboard.css', array(), '1.0.0' );
}

add_filter('admin_menu','creativ_demo_importer_options');
/**
 * Add menu page.
 */
function creativ_demo_importer_options() {

    $page_title     = esc_html__('Creativ Importer','creativ-demo-importer');
    $menu_title     = esc_html__('Creativ Importer','creativ-demo-importer');
    $capability     = 'manage_options';
    $menu_slug      = 'ct-options';
    $menu_func      = 'creativ_demo_importer_dashboard';
    $icon_url       = 'dashicons-columns';
    
    add_menu_page(
        $page_title,
        $menu_title,
        $capability,
        $menu_slug,
        $menu_func,
        $icon_url,
        59
    );
}

/**
 * Menu content.
 */
function creativ_demo_importer_dashboard() {
    ?>
    <div class="crt-d-menu-page-wrapper wrap">
        <div class="crt-d-page-header text-center">
            <h2>Creativ Demo Importer</h2>
        </div>
        <div class="starter-sites-install-notice" style="background-image:url(<?php echo esc_url(CREATIV_DEMO_IMPORTER_URL.'assets/img/dashboard.png'); ?>)">
            <h3 class="starter-site-title">Starter Sites</h3>
            <?php if(is_plugin_active('advanced-import/advanced-import.php')){ ?>
                <div class="starter-sites-install-content"><?php esc_html_e('Advanced Import plugin is activated. Proceed to demo import page to begin importing starter sites.', 'creativ-demo-importer'); ?></div>
                <a href="<?php echo esc_url(admin_url('/themes.php?page=advanced-import')); ?>" class="button ct-button-success"><?php esc_html_e('Starter Sites', 'creativ-demo-importer'); ?></a>
            <?php }else{ ?>
                
                <?php if(file_exists(WP_PLUGIN_DIR . '/' . 'advanced-import')){ ?>
                    <div class="starter-sites-install-content"><?php esc_html_e('Advanced Import plugin needs to be active to begin importing starter sites. Clicking the button will activate the Advanced Import plugin.', 'creativ-demo-importer'); ?></div>
                    <a href="#" class="button button-primary activate-ad-import ad-import-installed"><?php esc_html_e('Activate Advanced Import','creativ-demo-importer') ?></a>
                <?php }else{ ?>
                    <div class="starter-sites-install-content"><?php esc_html_e('Advanced Import plugin needs to be installed to begin importing starter sites. Clicking the button will install and activate the Advanced Import plugin.', 'creativ-demo-importer'); ?></div>
                    <a href="" class="button button-primary activate-ad-import"><?php esc_html_e('Install and Activate Advanced Import', 'creativ-demo-importer'); ?></a>
                <?php } ?>
            <?php } ?>
        </div>

    </div>

    <?php
}