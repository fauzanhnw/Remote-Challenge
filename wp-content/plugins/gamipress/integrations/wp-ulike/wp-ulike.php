<?php
/**
 * Plugin Name:           GamiPress - WP Ulike integration
 * Plugin URI:            https://wordpress.org/plugins/gamipress-wp-ulike-integration/
 * Description:           Connect GamiPress with WP Ulike.
 * Version:               1.0.2
 * Author:                GamiPress
 * Author URI:            https://gamipress.com/
 * Text Domain:           gamipress-wp-ulike-integration
 * Domain Path:           /languages/
 * Requires at least:     4.4
 * Tested up to:          6.2
 * License:               GNU AGPL v3.0 (http://www.gnu.org/licenses/agpl.txt)
 *
 * @package               GamiPress\WP_Ulike
 * @author                GamiPress
 * @copyright             Copyright (c) GamiPress
 */

final class GamiPress_Integration_WP_Ulike {

    /**
     * @var         GamiPress_Integration_WP_Ulike $instance The one true GamiPress_Integration_WP_Ulike
     * @since       1.0.0
     */
    private static $instance;

    /**
     * Get active instance
     *
     * @access      public
     * @since       1.0.0
     * @return      object self::$instance The one true GamiPress_Integration_WP_Ulike
     */
    public static function instance() {
        if( !self::$instance ) {
            self::$instance = new GamiPress_Integration_WP_Ulike();
            self::$instance->constants();
            self::$instance->includes();
            self::$instance->hooks();
            
        }

        return self::$instance;
    }

    /**
     * Setup plugin constants
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function constants() {
        // Plugin version
        define( 'GAMIPRESS_WP_ULIKE_VER', '1.0.2' );

        // Plugin path
        define( 'GAMIPRESS_WP_ULIKE_DIR', plugin_dir_path( __FILE__ ) );

        // Plugin URL
        define( 'GAMIPRESS_WP_ULIKE_URL', plugin_dir_url( __FILE__ ) );
    }

    /**
     * Include plugin files
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function includes() {

        if( $this->meets_requirements() ) {

            require_once GAMIPRESS_WP_ULIKE_DIR . 'includes/admin.php';
            require_once GAMIPRESS_WP_ULIKE_DIR . 'includes/listeners.php';
            require_once GAMIPRESS_WP_ULIKE_DIR . 'includes/requirements.php';
            require_once GAMIPRESS_WP_ULIKE_DIR . 'includes/rules-engine.php';
            require_once GAMIPRESS_WP_ULIKE_DIR . 'includes/scripts.php';
            require_once GAMIPRESS_WP_ULIKE_DIR . 'includes/triggers.php';

        }
    }

    /**
     * Setup plugin hooks
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function hooks() {
        // Setup our activation and deactivation hooks
        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        
    }

    /**
     * Activation hook for the plugin.
     *
     * @since  1.0.0
     */
    public function activate() {

        if( $this->meets_requirements() ) {

        }

    }

    /**
     * Deactivation hook for the plugin.
     *
     * @since  1.0.0
     */
    public function deactivate() {

    }

    /**
     * Check if there are all plugin requirements
     *
     * @since  1.0.0
     *
     * @return bool True if installation meets all requirements
     */
    private function meets_requirements() {

        if ( ! class_exists( 'GamiPress' ) )
            return false;

        // Requirements on multisite install
        if( is_multisite() && is_main_site() && function_exists('gamipress_is_network_wide_active') && gamipress_is_network_wide_active() ) {

            // On main site, need to check if integrated plugin is installed on any sub site to load all configuration files
            if( gamipress_is_plugin_active_on_network( 'wp-ulike/wp-ulike.php' ) ) {
                return true;
            }

        }

        if ( ! class_exists( 'WpUlikeInit' ) ) {

            // Backward compatibility
            if ( class_exists( 'WPULIKE' ) )
                return true;

            return false;
        }

        return true;

    }

}

/**
 * The main function responsible for returning the one true GamiPress_Integration_WP_Ulike instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \GamiPress_Integration_WP_Ulike The one true GamiPress_Integration_WP_Ulike
 */
function GamiPress_Integration_WP_Ulike() {
    return GamiPress_Integration_WP_Ulike::instance();
}
add_action( 'gamipress_pre_init', 'GamiPress_Integration_WP_Ulike' );
