<?php
/**
 * Load class
 *
 * @version 1.0.0
 * @package LearnDash PowerPack
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'LearnDash_PowerPack_Enable_Comments_On_Focus_Mode', false ) ) {
	/**
	 * LearnDash_PowerPack_Enable_Comments_On_Focus_Mode Class.
	 */
	class LearnDash_PowerPack_Enable_Comments_On_Focus_Mode {
		public $current_class = '';

		/**
		 * Hook.
		 */
		public function __construct() {
			$this->current_class = get_class( $this );

			if ( if_current_class_is_active( $this->current_class ) === 'active' ) {
				add_filter( 'learndash_focus_mode_comments', [ $this, 'learndash_focus_mode_comments_func' ], 10, 2 );
			}
		}

		/**
		 * Returns the status of the comments.
		 *
		 * @param String $comment_status The status of the comments.
		 * @param Post $post The post.
		 *
		 * @return String The status of the comments.
		 */
		public function learndash_focus_mode_comments_func( $comment_status = 'closed', $post ) {
			$option_active_status = if_current_class_is_active( $this->current_class );

			// Example Only allow comments on Quiz post type.
			if ( 'sfwd-quiz' === $post->post_type && 'active' === $option_active_status ) {
				$comment_status = 'open';
			}

			return $comment_status;
		}

		/**
		 * Add the class details.
		 *
		 * @return array The class details.
		 */
		public function learndash_powerpack_class_details() {
			$ld_type           = esc_html__( 'quiz', 'learndash-powerpack' );
			$class_title       = esc_html__( 'Comments on Quiz post type', 'learndash-powerpack' );
			$class_description = esc_html__( 'Only allow comments on Quiz post type.', 'learndash-powerpack' );

			return [
				'title'       => $class_title,
				'ld_type'     => $ld_type,
				'description' => $class_description,
				'settings'    => false,
			];
		}
	}

	new LearnDash_PowerPack_Enable_Comments_On_Focus_Mode();
}

