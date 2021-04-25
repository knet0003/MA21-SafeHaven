<?php
/**
 * Theme Customizer
 *
 * @package atrium
 */
function atrium_customize_register($wp_customize){

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section('atrium_theme_options', array(
        'title'    => esc_html__('Theme Options', 'atrium-lite'),
        'priority' => 125,
	));

	$wp_customize->add_setting(
    	'copyright_text',
    		array(
        'default' => '',
				'sanitize_callback' => 'atrium_sanitize_text',
				'transport' => 'postMessage'
    		)
	);

	$wp_customize->add_control(
    	'copyright_text',
    		array(
        		'label' => esc_html__('Add copyright text in the footer.', 'atrium-lite'),
        		'section' => 'atrium_theme_options',
        		'type' => 'textarea'
    		)
	);

}
add_action('customize_register', 'atrium_customize_register');

function atrium_customize_preview_js() {
	wp_enqueue_script( 'atrium_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'atrium_customize_preview_js' );
