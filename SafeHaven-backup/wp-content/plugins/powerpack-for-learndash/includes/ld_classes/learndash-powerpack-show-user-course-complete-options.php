<?php
/**
 * Load class
 *
 * @version 1.0.0
 * @package LearnDash PowerPack
 */

defined( 'ABSPATH' ) || exit;
if ( ! class_exists( 'LearnDash_PowerPack_Show_User_Course_Complete_Options', false ) ) {

	/**
	 * LearnDash_PowerPack_Show_User_Course_Complete_Options Class.
	 */
	class LearnDash_PowerPack_Show_User_Course_Complete_Options {
		public $current_class = '';

		/**
		 * Hook.
		 */
		public function __construct() {
			$this->current_class = get_class( $this );

			add_filter( 'learndash_show_user_course_complete_options', array( $this, 'learndash_show_user_course_complete_options_func' ), 10, 2 );
		}

		/**
		 * Return whether the user is enabled. If its admin or group leader will be always enabled.
		 *
		 * @param bool $enabled If the user is enabled.
		 * @param int  $user_id The ID of the user.
		 * @return bool if the user is enabled.
		 */
		public function learndash_show_user_course_complete_options_func( $enabled, $user_id ) {
			$option_active_status = if_current_class_is_active( $this->current_class );
			if ( 'active' !== $option_active_status ) {
				$enabled = false;
				return $enabled;
			}
			global $pagenow; // This is set by WordPress for the current page being shown.
			if ( is_admin() ) {
				if ( ( ( 'profile.php' === $pagenow ) || ( 'user-edit.php' === $pagenow ) ) ) {
					if ( learndash_is_admin_user() ) {
						$enabled = true;
					} elseif ( learndash_is_group_leader_user() ) {
						$enabled = true;
					}
				}
			}

			return $enabled;
		}

		/**
		 * Add the class details.
		 *
		 * @return array The class details.
		 */
		public function learndash_powerpack_class_details() {
			$ld_type           = esc_html__( 'course', 'learndash-powerpack' );
			$class_title       = esc_html__( 'Show user course complete options for admin and group_leader_user.', 'learndash-powerpack' );
			$class_description = esc_html__( 'Enable this option to show user course complete options for admin and group_leader_user.', 'learndash-powerpack' );

			return array(
				'title'       => $class_title,
				'ld_type'     => $ld_type,
				'description' => $class_description,
				'settings'    => false,
			);
		}
	}
	new LearnDash_PowerPack_Show_User_Course_Complete_Options();
}

