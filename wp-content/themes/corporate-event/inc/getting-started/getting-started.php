<?php
/**
 * Corporate_Event Notice Handler
 *
 * @package Corporate_Event
 * @since   1.0.3
 */

defined( 'ABSPATH' ) || exit;



add_action( 'admin_enqueue_scripts', 'corporate_event_widgets_backend_enqueue' );
function corporate_event_widgets_backend_enqueue() {
    wp_enqueue_style( 'corporate-event-getting-started', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
    wp_register_script( 'corporate-event-custom-widgets', get_template_directory_uri() . '/inc/getting-started/getting-started.js', array('jquery'), true );
    $translation = array(
        'btn_text' => esc_html__( 'Processing...', 'corporate-event' ),
        'nonce'    => wp_create_nonce( 'corporate_event_demo_import_nonce' ),
        'noncen'    => 'corporate_event_demo_import_nonce',
        'adminurl'    => admin_url(),
    );
    wp_localize_script( 'corporate-event-custom-widgets', 'corporate_event_adi_install', $translation );

    wp_enqueue_media();
    wp_enqueue_script( 'corporate-event-custom-widgets' );
}



/**
 * Class to handle notices and Advanced Demo Import
 *
 * Class Corporate_Event_Notice_Handler
 */
class Corporate_Event_Notice_Handler {

	/**
	 * Empty Constructor
	 */
	public function __construct() {
        $theme = wp_get_theme();
        if ( is_child_theme() ) {
            $this->theme_name = esc_attr( $theme->parent()->get( 'Name' ) );
        } else {
            $this->theme_name = esc_attr ( $theme->get( 'Name' ) );
        }
        /* activation notice */
        
        add_action( 'switch_theme', array( $this, 'flush_dismiss_status' ) );
        add_action( 'admin_init', array($this,'getting_started_notice_dismissed') );
        add_action( 'admin_notices', array( $this, 'corporate_event_info_welcome_admin_notice' ), 3 );
        add_action( 'wp_ajax_corporate_event_getting_started', array( $this, 'getting_started' ) );
    }

    /**
     * Display an admin notice linking to the about page
     */
    public function corporate_event_info_welcome_admin_notice() {
        if ( is_admin() && !get_user_meta( get_current_user_id(), 'corporate_event_notice_dismissed' ) ){
            echo '<div class="updated notice is-dismissible getting-started">';
            echo ( '<p>' . sprintf( __('Welcome! Thank you for choosing %1$s!. To fully take advantage of the best our theme can offer, get started.','corporate-event'), $this->theme_name ) . '<p class="plugin-notice" style="font-size: 10px">'.esc_html__('Clicking on get started will activate Advanced Import, WP Event Partners and Wep Demo Import', 'corporate-event').'</p></p>'.'<p><a href="#" class="corporate-event-install-plugins button" style="text-decoration: none;">' . sprintf( __('Get started with %s','corporate-event'), $this->theme_name ) . '</a></p>' );
            echo '<a href="' . esc_url( wp_nonce_url( add_query_arg( 'corporate-event-notice-dismissed', 'dismiss_admin_notices' ) ) ) . '" class="getting-started-notice-dismiss">Dismiss</a>';
            echo '</div>';
        }
    }


    /**
     * Register dismissal of the getting started notification.
     * Acts on the dismiss link.
     * If clicked, the admin notice disappears and will no longer be visible to this user.
     */
    public function getting_started_notice_dismissed() {
        
        if ( isset( $_GET['corporate-event-notice-dismissed'] ) ){
            add_user_meta( get_current_user_id(), 'corporate_event_notice_dismissed', 'true', true );
        }
    }

    /**
     * Deletes the getting started notice's dismiss status upon theme switch. 
     */
    public function flush_dismiss_status(){
        delete_user_meta( get_current_user_id(), 'corporate_event_notice_dismissed', 'true', true );
    }


	/**
	 * Get Started Notice
	 * Active callback of wp_ajax
	 * return void
	 */
	public function getting_started() {

		check_ajax_referer( 'corporate_event_demo_import_nonce', 'security' );

        $slug   = $_POST['slug'];
        $plugin_filename = $_POST['filename'];
        $plugin = $slug.'/'.$plugin_filename.'.php';
        $request = $_POST['request'];


        $status = array(
            'install' => 'plugin',
            'slug'    => sanitize_key( wp_unslash( $slug ) ),
        );
        $status['redirect'] = admin_url( '/themes.php?page=advanced-import&browse=all&at-gsm-hide-notice=welcome' );

        if ( is_plugin_active_for_network( $plugin ) || is_plugin_active( $plugin ) ) {
            // Plugin is activated
            wp_send_json_success($status);
        }


        if ( ! current_user_can( 'install_plugins' ) ) {
            $status['errorMessage'] = __( 'Sorry, you are not allowed to install plugins on this site.', 'corporate-event' );
            wp_send_json_error( $status );
        }

        if( $request > 3 ) {
            wp_send_json_error( );
        }

        include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

        // Looks like a plugin is installed, but not active.
        if( $request == 1 && strpos($slug, 'advanced-import') === false){
            wp_send_json_error( );
        }
        if( $request == 2 && strpos($slug, 'wp-event-partners') === false){
            wp_send_json_error();
        }
        if( $request == 3 && strpos($slug, 'wep-demo-import') === false){
            wp_send_json_error();
        }
        if ( file_exists( WP_PLUGIN_DIR . '/' . $slug ) ) {
            $plugin_data          = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
            $status['plugin']     = $plugin;
            $status['pluginName'] = $plugin_data['Name'];

            if ( current_user_can( 'activate_plugin', $plugin ) && is_plugin_inactive( $plugin ) ) {
                $result = activate_plugin( $plugin );

                if ( is_wp_error( $result ) ) {
                    $status['errorCode']    = $result->get_error_code();
                    $status['errorMessage'] = $result->get_error_message();
                    wp_send_json_error( $status );
                }

                wp_send_json_success( $status );
            }
        }

        $api = plugins_api(
            'plugin_information',
            array(
                'slug'   => sanitize_key( wp_unslash( $slug ) ),
                'fields' => array(
                    'sections' => false,
                ),
            )
        );

        if ( is_wp_error( $api ) ) {
            $status['errorMessage'] = $api->get_error_message();
            wp_send_json_error( $status );
        }

        $status['pluginName'] = $api->name;

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );

        if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
            $status['debug'] = $skin->get_upgrade_messages();
        }

        if ( is_wp_error( $result ) ) {
            $status['errorCode']    = $result->get_error_code();
            $status['errorMessage'] = $result->get_error_message();
            wp_send_json_error( $status );
        } elseif ( is_wp_error( $skin->result ) ) {
            $status['errorCode']    = $skin->result->get_error_code();
            $status['errorMessage'] = $skin->result->get_error_message();
            wp_send_json_error( $status );
        } elseif ( $skin->get_errors()->get_error_code() ) {
            $status['errorMessage'] = $skin->get_error_messages();
            wp_send_json_error( $status );
        } elseif ( is_null( $result ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
            WP_Filesystem();
            global $wp_filesystem;

            $status['errorCode']    = 'unable_to_connect_to_filesystem';
            $status['errorMessage'] = __( 'Unable to connect to the filesystem. Please confirm your credentials.', 'corporate-event' );

            // Pass through the error from WP_Filesystem if one was raised.
            if ( $wp_filesystem instanceof WP_Filesystem_Base && is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->get_error_code() ) {
                $status['errorMessage'] = esc_html( $wp_filesystem->errors->get_error_message() );
            }

            wp_send_json_error( $status );
        }

        $install_status = install_plugin_install_status( $api );

        if ( current_user_can( 'activate_plugin', $install_status['file'] ) && is_plugin_inactive( $install_status['file'] ) ) {
            $result = activate_plugin( $install_status['file'] );

            if ( is_wp_error( $result ) ) {
                $status['errorCode']    = $result->get_error_code();
                $status['errorMessage'] = $result->get_error_message();
                wp_send_json_error( $status );
            }
        }

        wp_send_json_success( $status );
	}
}
new Corporate_Event_Notice_Handler;