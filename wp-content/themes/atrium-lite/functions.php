<?php
/**
 * Themes functions and definitions
 *
 * @package atrium
 */
function atrium_setup() {
	global $content_width;
		if ( ! isset( $content_width ) ){
      		$content_width = 1600;
		}
	load_theme_textdomain( 'atrium-lite', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo');

	add_theme_support( 'responsive-embeds' );

	add_post_type_support( 'page', 'excerpt');

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'align-wide' );

	add_theme_support( 'html5', array( 'gallery', 'caption' ) );

	add_theme_support( 'editor-font-sizes', array(
    	array(
        	'name' => esc_html__( 'Small', 'atrium-lite' ),
        	'size' => 13,
        	'slug' => 'small'
    	),
    	array(
        	'name' => esc_html__( 'Regular', 'atrium-lite' ),
        	'size' => 16,
        	'slug' => 'regular'
    	),
    	array(
        	'name' => esc_html__( 'Large', 'atrium-lite' ),
        	'size' => 36,
        	'slug' => 'large'
    	),
    	array(
        	'name' => esc_html__( 'Huge', 'atrium-lite' ),
        	'size' => 50,
        	'slug' => 'huge'
    	)
	) );

	add_theme_support( 'editor-styles' );

	add_editor_style( 'style-editor.css' );
	add_editor_style( atrium_nunito_font_url() );

	register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary Menu', 'atrium-lite' ),
			'front-menu' => esc_html__( 'Front Menu', 'atrium-lite' ),
			'footer-menu' 	=> esc_html__( 'Footer Menu', 'atrium-lite' )
		) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );

	add_theme_support( 'post-thumbnails' );
	add_image_size('atrium-blogthumb', 600, 400, true);
	add_image_size('atrium-singlethumb', 600, 600, true);
}
add_action( 'after_setup_theme', 'atrium_setup' );

/**
 * Register widget areas.
 *
 */
function atrium_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'atrium-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Widget', 'atrium-lite' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Widget', 'atrium-lite' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s animated fadeInRightShort delay-500">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'atrium-lite' ),
		'id'            => 'sidebar-7',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


}
add_action( 'widgets_init', 'atrium_widgets_init' );

/**
 * Register Nunito Sans for Atrium.
 *
 * @return string
 */
function atrium_nunito_font_url() {
	$nunito_font_url = '';

	/* translators: If there are characters in your language that are not supported
	   by this font, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Nunito font: on or off', 'atrium-lite' ) ) {

		$nunito_font_url = add_query_arg( 'family', urlencode( 'Nunito Sans:300,400,600,700,900' ), "https://fonts.googleapis.com/css" );
	}

	return $nunito_font_url;
}

/**
 * Including theme scripts and styles.
 */
function atrium_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if (!is_admin()) {
		wp_enqueue_script( 'atrium-menu', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'mobile-menu', get_template_directory_uri() . '/js/reaktion.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'responsive-videos', get_template_directory_uri() . '/js/responsive-videos.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'animate', get_template_directory_uri() . '/js/css3-animate.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'atrium-nunito', atrium_nunito_font_url(), array(), null );
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
		wp_enqueue_style('animate-style', get_template_directory_uri().'/animate.css', array(), '1', 'screen');
		wp_enqueue_style( 'atrium-style', get_stylesheet_uri());
	}
}
add_action( 'wp_enqueue_scripts', 'atrium_scripts_styles' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
