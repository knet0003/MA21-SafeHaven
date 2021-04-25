<?php
/**
 * Extra functions for this theme.
 *
 * @package atrium
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function atrium_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'atrium_page_menu_args' );

/**
* Defines new blog excerpt length and link text.
*/
if (!is_admin()) {
	/**
	* Defines new blog excerpt length and link text.
	*/
	function atrium_new_excerpt_length($length) {
		return 30;
	}
	add_filter('excerpt_length', 'atrium_new_excerpt_length');

	function atrium_new_excerpt_more($more) {
		global $post;
		return '';
	}
	add_filter('excerpt_more', 'atrium_new_excerpt_more');
}

/**
* Manages display of archive titles.
*/
function atrium_get_the_archive_title( $title ) {
   if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format','atrium-lite' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format','atrium-lite' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format','atrium-lite' ) );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = esc_html__( 'Archives', 'atrium-lite' );
    }
    return $title;
};
add_filter( 'get_the_archive_title', 'atrium_get_the_archive_title', 10, 1 );

function atrium_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#contentwrapper">' . esc_html__( 'Skip to the content', 'atrium-lite' ) . '</a>';
}
add_action( 'wp_body_open', 'atrium_skip_link', 5 );

// display custom admin notice

function atrium_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	if (!get_user_meta($user_id, 'atrium_notice_ignore')) {
		echo '<div class="updated notice"><p>'. esc_html__('Thanks for installing Atrium Lite! Want more features?', 'atrium-lite') .' <a href="https://vivathemes.com/wordpress-theme/atrium/" target="blank">'. esc_html__('Check Out the Pro Version  &#8594;', 'atrium-lite') .'</a><a class="notice-dismiss" href="?atrium-ignore-notice"><span class="screen-reader-text">Dismiss Notice</span></a></p></div>';
		}
}
add_action('admin_notices', 'atrium_notice');

function atrium_notice_ignore() {
	global $current_user;
	$user_id = $current_user->ID;
	if (isset($_GET['atrium-ignore-notice'])) {
		add_user_meta($user_id, 'atrium_notice_ignore', 'true', true);
	}
}
add_action('admin_init', 'atrium_notice_ignore');

add_action('admin_head', 'atrium_admin_style');
function atrium_admin_style() {
	echo '<style>
	.notice {position: relative;}
	a.notice-dismiss {text-decoration:none;}
	</style>';
}
