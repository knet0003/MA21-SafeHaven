<?php
/**
 * Aribull Theme Customizer
 *
 * @package Aribull
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aribull_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	 

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'aribull_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'aribull_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_section(
		'layout_section',
		array(
			'title'    => __( 'Layout (site width) ', 'aribull' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_section(
		'header_content',
		array(
			'title'    => __( 'Header Settings', 'aribull' ),
			'priority' => 40,
		)
	);

	

	$wp_customize->add_section(
		'service_section',
		array(
			'title' => __( 'Service Section', 'aribull' ),
		)
	);

	$wp_customize->add_section(
		'footer_section',
		array(
			'title' => __( 'Footer', 'aribull' ),
		)
	);

	

	

	$wp_customize->add_setting(
		'show_breadcrumb',
		array(
			'default'           => true,
			'sanitize_callback' => 'aribull_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'show_breadcrumb',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Enable breadcrumbs', 'aribull' ),
			'section' => 'header_content',
		)
	);
	
	 

	$wp_customize->add_setting(
		'header__main_heading',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'header__main_heading',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter Main Heading :', 'aribull' ),
			'description' => __( 'Leave this setting blank to disable it.', 'aribull' ),
			'section'     => 'header_content',
		)
	);

	$wp_customize->add_setting(
		'header__sub_heading',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'header__sub_heading',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter Sub Heading:', 'aribull' ),
			'description' => __( 'Leave this setting blank to disable it.', 'aribull' ),
			'section'     => 'header_content',
		)
	);
	
	 
	
	$wp_customize->add_setting(
		'service_title_one',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'service_title_one',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter Title 1:', 'aribull' ),
			'description' => __( 'Leave this setting blank to disable it.', 'aribull' ),
			'section'     => 'service_section',
		)
	);
	$wp_customize->add_setting(
		'service_description_one',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'service_description_one',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter Description 1:', 'aribull' ),
			'description' => __( 'Leave this setting blank to disable it.', 'aribull' ),
			'section'     => 'service_section',
		)
	);
	
	
	
	
	
	
	
	$wp_customize->add_setting(
		'service_title_two',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'service_title_two',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter Title 2:', 'aribull' ),
			'description' => __( 'Leave this setting blank to disable it.', 'aribull' ),
			'section'     => 'service_section',
		)
	);
	$wp_customize->add_setting(
		'service_description_two',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'service_description_two',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter Description 2:', 'aribull' ),
			'description' => __( 'Leave this setting blank to disable it.', 'aribull' ),
			'section'     => 'service_section',
		)
	);
	
	
	
	
	
	$wp_customize->add_setting(
		'service_title_three',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'service_title_three',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter Title 3:', 'aribull' ),
			'description' => __( 'Leave this setting blank to disable it.', 'aribull' ),
			'section'     => 'service_section',
		)
	);
	$wp_customize->add_setting(
		'service_description_three',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'service_description_three',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter Description 3:', 'aribull' ),
			'description' => __( 'Leave this setting blank to disable it.', 'aribull' ),
			'section'     => 'service_section',
		)
	);
	
	
	
	
	

	

	$wp_customize->add_setting(
		'copyright_text',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'copyright_text',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter a copyright text:', 'aribull' ),
			'input_attrs' => array(
				'placeholder' => __( 'Copyright: ', 'aribull' ) . gmdate( 'Y' ),
			),
			'section'     => 'footer_section',
		)
	);

	 

	

	 

}
add_action( 'customize_register', 'aribull_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aribull_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aribull_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aribull_customize_preview_js() {
	wp_enqueue_script( 'aribull-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), null, true );
}
add_action( 'customize_preview_init', 'aribull_customize_preview_js' );

/**
 * Checkbox sanitization callback, from
 * https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function aribull_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * Select sanitization callback example.
 *
 * - Sanitization: select
 * - Control: select, radio
 * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes `$input`
 * as a slug, and then validates `$input` against the choices defined for the control.
 *
 * @see sanitize_text_field()               https://developer.wordpress.org/reference/functions/sanitize_text_field/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function aribull_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_text_field( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
