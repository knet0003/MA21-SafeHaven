<?php
/**
 *
 * @package atrium
 */

/**
 * Setup the WordPress core custom header feature.
 */
function atrium_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'atrium_custom_header_args', array(
		'width'         => 2000,
		'height'        => 1000,
		'uploads'       => true,
		'default-text-color'     => '000000',
		'wp-head-callback'       => 'atrium_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'atrium_custom_header_setup' );

if ( ! function_exists( 'atrium_header_style' ) ) :
        function atrium_header_style() {
                wp_enqueue_style( 'atrium-style', get_stylesheet_uri() );
                $header_text_color = get_header_textcolor();
                $position = "absolute";
                $clip ="rect(1px, 1px, 1px, 1px)";
                if ( ! display_header_text() ) {
                        $custom_css = '.site-title, .site-description {
                                position: '.$position.';
                                clip: '.$clip.';
                        }';
                } else{

                        $custom_css = 'h1.site-title, h2.site-description  {
                                color: #' . esc_attr($header_text_color) . ';
                        }';
                }
                wp_add_inline_style( 'atrium-style', $custom_css );
        }
        add_action( 'wp_enqueue_scripts', 'atrium_header_style' );

endif;
