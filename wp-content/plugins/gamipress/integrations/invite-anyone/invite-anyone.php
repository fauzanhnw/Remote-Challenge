<?php
/**
 * Plugin Name:           GamiPress - Invite Anyone integration
 * Plugin URI:            https://wordpress.org/plugins/gamipress-invite-anyone-integration/
 * Description:           Connect GamiPress with Invite Anyone.
 * Version:               1.0.1
 * Author:                GamiPress
 * Author URI:            https://gamipress.com/
 * Text Domain:           gamipress-invite-anyone-integration
 * Domain Path:           /languages/
 * Requires at least:     4.4
 * Tested up to:          6.2
 * License:               GNU AGPL v3.0 (http://www.gnu.org/licenses/agpl.txt)
 *
 * @package               GamiPress\Invite_Anyone
 * @author                GamiPress
 * @copyright             Copyright (c) GamiPress
 */

final class GamiPress_Integration_Invite_Anyone {

    /**
     * @var         GamiPress_Integration_Invite_Anyone $instance The one true GamiPress_Integration_Invite_Anyone
     * @since       1.0.0
     */
    private static $instance;

    /**
     * Get active instance
     *
     * @access      public
     * @since       1.0.0
     * @return      GamiPress_Integration_Invite_Anyone self::$instance The one true GamiPress_Integration_Invite_Anyone
     */
    public static function instance() {
        if( !self::$instance ) {
            self::$instance = new GamiPress_Integration_Invite_Anyone();
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
        define( 'GAMIPRESS_INVITE_ANYONE_VER', '1.0.1' );

        // Plugin path
        define( 'GAMIPRESS_INVITE_ANYONE_DIR', plugin_dir_path( __FILE__ ) );

        // Plugin URL
        define( 'GAMIPRESS_INVITE_ANYONE_URL', plugin_dir_url( __FILE__ ) );
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

            require_once GAMIPRESS_INVITE_ANYONE_DIR . 'includes/admin.php';
            require_once GAMIPRESS_INVITE_ANYONE_DIR . 'includes/listeners.php';
            require_once GAMIPRESS_INVITE_ANYONE_DIR . 'includes/triggers.php';

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
    function activate() {

        if( $this->meets_requirements() ) {

        }

    }

    /**
     * Deactivation hook for the plugin.
     *
     * @since  1.0.0
     */
    function deactivate() {

    }

    /**
     * Check if there are all plugin requirements
     *
     * @since  1.0.0
     *
     * @return bool True if installation meets all requirements
     */
    private function meets_requirements() {

        if ( ! class_exists( 'GamiPress' ) ) {
            return false;
        }

        // Multisite feature requires GamiPress 1.4.8
        if( is_multisite() ) {

            // Requirements on multisite install
            if( is_main_site() && function_exists('gamipress_is_network_wide_active') && gamipress_is_network_wide_active() ) {

                // On main site, need to check if integrated plugin is installed on any sub site to load all configuration files
                if( gamipress_is_plugin_active_on_network( 'invite-anyone/invite-anyone.php' ) ) {
                    return true;
                }

            }

        }

        if ( ! function_exists( 'invite_anyone_init' ) ) {
            return false;
        }

        return true;

    }

}

/**
 * The main function responsible for returning the one true GamiPress_Integration_Invite_Anyone instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \GamiPress_Integration_Invite_Anyone The one true GamiPress_Integration_Invite_Anyone
 */
function GamiPress_Integration_Invite_Anyone() {
    return GamiPress_Integration_Invite_Anyone::instance();
}
add_action( 'gamipress_pre_init', 'GamiPress_Integration_Invite_Anyone' );
