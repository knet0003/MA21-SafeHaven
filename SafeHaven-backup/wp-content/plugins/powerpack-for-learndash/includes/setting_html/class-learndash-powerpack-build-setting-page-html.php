<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'LearnDash_PowerPack_Build_Setting_Page_Html', false ) ) {
	/**
	 * LearnDash_PowerPack_Build_Setting_Page_Html Class.
	 */
	class LearnDash_PowerPack_Build_Setting_Page_Html {
		/**
		 * Hook.
		 */
		public function __construct() {
		}

		/**
		 * Creates the content for the settings page.
		 *
		 * @param String $class_name The name of the class.
		 *
		 * @return String The HTML code to show the settings page.
		 */
		public static function settings_page_html( $class_name ) {
			if ( ! check_if_file_exist_using_class_name( $class_name ) or ! class_exists( $class_name ) ) {
				return '';
			}

			$class_details = ( new $class_name )->learndash_powerpack_class_details();

			ob_start();
			?>
            <div
                class="learndash_snippet_list_item imm-bg-white imm-p-6 imm-rounded imm-h-52 imm-space-y-5 imm-relative"
                id="<?php esc_attr_e( $class_details['ld_type'] ); ?>">
                <div class="imm-flex">
                    <div class="learndash-powerpack-header-left imm-flex">
                        <div class="learndash-powerpack-title imm-capitalize imm-font-semibold imm-text-lg imm-leading-6 imm-pr-20">
							<?php esc_html_e( $class_details['title'], 'learndash-powerpack' ); ?>
                        </div>
                    </div>
                    <div class="learndash-powerpack-status imm-absolute imm-right-6 imm-top-6">
                        <label class="learndash_powerpack_switch">
                            <input
                                class="enable_disable_class" <?php esc_attr_e( setting_is_active( $class_name ) ? 'checked' : '' ); ?>
                                type="checkbox" value="<?php esc_attr_e( $class_name ); ?>">
                            <span class="learndash_powerpack_slider learndash_powerpack_round"></span>
                        </label>
                    </div>
                </div>

                <div>
					<?php echo esc_html( $class_details['description'] ); ?>
                </div>

                <div class="learndash-powerpack-actions imm-absolute imm-bottom-6">
					<?php if ( ! empty( $class_details['settings'] ) ): ?>
                        <div
                            class="ldt-btn--setting imm-py-1 imm-px-5 imm-border-solid imm-border-2 imm-border-gray-500 imm-rounded imm-font-semibold imm-cursor-pointer"
                            data-class="<?php esc_attr_e( $class_name ); ?>"
                        >
							<?php esc_html_e( 'Settings', 'learndash-powerpack' ); ?>
                        </div>
					<?php endif; ?>
                </div>
            </div>
			<?php
			return ob_get_clean();
		}

		/**
		 * Retrieve all the options.
		 *
		 * @return array The options array.
		 */
		public static function get_all_option_data() {
			$select_option_array               = [];
			$select_option_array['all']        = esc_html__( 'All Snippets', 'learndash-powerpack' );
			$select_option_array['button']     = esc_html__( 'Button', 'learndash-powerpack' );
			$select_option_array['comment']    = esc_html__( 'Comment', 'learndash-powerpack' );
			$select_option_array['course']     = esc_html__( 'Course', 'learndash-powerpack' );
			$select_option_array['editor']     = esc_html__( 'Editor', 'learndash-powerpack' );
			$select_option_array['lesson']     = esc_html__( 'Lesson', 'learndash-powerpack' );
			$select_option_array['quiz']       = esc_html__( 'Quiz', 'learndash-powerpack' );
			$select_option_array['stripe']     = esc_html__( 'Stripe', 'learndash-powerpack' );
			$select_option_array['taxonomy']   = esc_html__( 'Taxonomy', 'learndash-powerpack' );
			$select_option_array['transients'] = esc_html__( 'Transients', 'learndash-powerpack' );
			$select_option_array['video']      = esc_html__( 'Video', 'learndash-powerpack' );

			return apply_filters( 'learndash_filter_select_option', $select_option_array );
		}

		/**
		 * Creates the select input with the options.
		 */
		public static function settings_select_option() {
			$get_all_option_data = self::get_all_option_data();
			ob_start();
			?>

            <select id="ld_snippet_powerpack_filter_select" class="ld-powerpack-filter">
				<?php if ( is_array( $get_all_option_data ) ) { ?>
					<?php foreach ( $get_all_option_data as $option_val => $option_text ) { ?>
                        <option
                            value="<?php echo esc_html( $option_val ); ?>"><?php echo esc_html( $option_text ); ?></option>
					<?php } ?>
				<?php } ?>
            </select>

			<?php
			$html_options = ob_get_clean();

			return apply_filters( 'learndash_filter_select_option_html', $html_options );
		}
	}
}
