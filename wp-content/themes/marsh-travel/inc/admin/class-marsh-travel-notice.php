<?php
/**
 * Marsh Travel main admin class
 *
 * @package Marsh Travel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class marsh_travel_Admin_Main
 */
class marsh_travel_Notice {
    public $theme_name;

    /**
     * Marsh Travel Notice constructor.
     */
    public function __construct() {

        global $admin_main_class;

        add_action( 'admin_enqueue_scripts', array( $this, 'marsh_travel_enqueue_scripts' ) );

        add_action( 'wp_loaded', array( $this, 'marsh_travel_hide_welcome_notices' ) );
        add_action( 'wp_loaded', array( $this, 'marsh_travel_welcome_notice' ) );


        add_action( 'wp_ajax_marsh_travel_activate_plugin', array( $admin_main_class, 'marsh_travel_activate_demo_importer_plugin' ) );
        add_action( 'wp_ajax_marsh_travel_install_plugin', array( $admin_main_class, 'marsh_travel_install_demo_importer_plugin' ) );

        add_action( 'wp_ajax_marsh_travel_install_free_plugin', array( $admin_main_class, 'marsh_travel_install_free_plugin' ) );
        add_action( 'wp_ajax_marsh_travel_activate_free_plugin', array( $admin_main_class, 'marsh_travel_activate_free_plugin' ) );

        //theme details
        $theme = wp_get_theme();
        $this->theme_name = $theme->get( 'Name' );
    }

    /**
     * Localize array for import button AJAX request.
     */
    public function marsh_travel_enqueue_scripts() {
        wp_enqueue_style( 'marsh-travel-admin-style', get_template_directory_uri() . '/inc/admin/assets/css/admin.css', array(), 20151215 );

        wp_enqueue_script( 'marsh-travel-plugin-install-helper', get_template_directory_uri() . '/inc/admin/assets/js/plugin-handle.js', array( 'jquery' ), 20151215 );

        $demo_importer_plugin = WP_PLUGIN_DIR . '/creativ-demo-importer/creativ-demo-importer.php';
        if ( ! file_exists( $demo_importer_plugin ) ) {
            $action = 'install';
        } elseif ( file_exists( $demo_importer_plugin ) && !is_plugin_active( 'creativ-demo-importer/creativ-demo-importer.php' ) ) {
            $action = 'activate';
        } else {
            $action = 'redirect';
        }

        wp_localize_script( 'marsh-travel-plugin-install-helper', 'ogAdminObject',
            array(
                'ajax_url'      => esc_url( admin_url( 'admin-ajax.php' ) ),
                '_wpnonce'      => wp_create_nonce( 'marsh_travel_plugin_install_nonce' ),
                'buttonStatus'  => esc_html( $action )
            )
        );
    }

    /**
     * Add admin welcome notice.
     */
    public function marsh_travel_welcome_notice() {

        if ( isset( $_GET['activated'] ) ) {
            update_option( 'marsh_travel_admin_notice_welcome', true );
        }

        $welcome_notice_option = get_option( 'marsh_travel_admin_notice_welcome' );

        // Let's bail on theme activation.
        if ( $welcome_notice_option ) {
            add_action( 'admin_notices', array( $this, 'marsh_travel_welcome_notice_html' ) );
        }
    }

    /**
     * Hide a notice if the GET variable is set.
     */
    public static function marsh_travel_hide_welcome_notices() {
        if ( isset( $_GET['marsh-travel-hide-welcome-notice'] ) && isset( $_GET['_marsh_travel_welcome_notice_nonce'] ) ) {
            if ( ! wp_verify_nonce( $_GET['_marsh_travel_welcome_notice_nonce'], 'marsh_travel_hide_welcome_notices_nonce' ) ) {
                wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'marsh-travel' ) );
            }

            if ( ! current_user_can( 'manage_options' ) ) {
                wp_die( esc_html__( 'Cheat in &#8217; huh?', 'marsh-travel' ) );
            }

            $hide_notice = sanitize_text_field( $_GET['marsh-travel-hide-welcome-notice'] );
            update_option( 'marsh_travel_admin_notice_' . $hide_notice, false );
        }
    }

    /**
     * function to display welcome notice section
     */
    public function marsh_travel_welcome_notice_html() {
        $current_screen = get_current_screen();

        if ( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ) {
            return;
        }
        ?>
        <div id="marsh-travel-welcome-notice" class="marsh-travel-welcome-notice-wrapper updated notice">
            <a class="marsh-travel-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'marsh-travel-hide-welcome-notice', 'welcome' ) ), 'marsh_travel_hide_welcome_notices_nonce', '_marsh_travel_welcome_notice_nonce' ) ); ?>">
                <span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'marsh-travel' ); ?>
            </a>
            <div class="marsh-travel-welcome-title-wrapper">
                <h2 class="notice-title"><?php esc_html_e( 'Congratulations!', 'marsh-travel' ); ?></h2>
                <p class="notice-description">
                    <?php
                        printf( esc_html__( '%1$s is now installed and ready to use. Clicking on Get started with Marsh Travel will install and activate Creativ Demo Importer Plugin.', 'marsh-travel' ), $this->theme_name );
                    ?>
                </p>
            </div><!-- .marsh-travel-welcome-title-wrapper -->
            <div class="welcome-notice-details-wrapper">

                <div class="notice-detail-wrap general">
                    
                    <div class="general-info-links">
                        <div class="buttons-wrap">
                            <button class="marsh-travel-get-started button button-primary button-hero" data-done="<?php esc_attr_e( 'Done!', 'marsh-travel' ); ?>" data-process="<?php esc_attr_e( 'Processing', 'marsh-travel' ); ?>" data-redirect="<?php echo esc_url( wp_nonce_url( add_query_arg( 'marsh-travel-hide-welcome-notice', 'welcome', admin_url( 'admin.php' ).'?page=ct-options' ) , 'marsh_travel_hide_welcome_notices_nonce', '_marsh_travel_welcome_notice_nonce' ) ); ?>">
                                <?php printf( esc_html__( 'Get started with %1$s', 'marsh-travel' ), esc_html( $this->theme_name ) ); ?>
                            </button>
                        </div><!-- .buttons-wrap -->
                    </div><!-- .general-info-links -->
                </div><!-- .notice-detail-wrap.general -->

            </div><!-- .welcome-notice-details-wrapper -->
        </div><!-- .marsh-travel-welcome-notice-wrapper -->
<?php
    }
}
new marsh_travel_Notice();