<?php
/**
 * The Header for our theme.
 *
 *
 * @package atrium
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=2.0, user-scalable=yes" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
} ?>

	<div id="container">
			<div class="headertop">
				<div id="logo">
        	<?php the_custom_logo(); ?>
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        		<h1 class="site-title">
          		<?php bloginfo( 'name' ); ?>
        		</h1>
        	</a>
      	</div>

				<?php if ( has_nav_menu( 'main-menu' ) ) {
	    				wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container_id'   => 'mainmenu',
								'menu_class' 	 => 'superfish sf-menu',
								'fallback_cb'	 => false
							)
						);
	  		} ?>

				<?php if ( has_nav_menu( 'main-menu' ) ) {
					wp_nav_menu(
						array(
								'theme_location' => 'main-menu',
								'container_class'   => 'mmenu',
								'menu_class' 	 => 'navmenu',
								'fallback_cb'	 => false
						)
						);
					} ?>

			</div>

			<?php if (is_front_page()): ?>
				<h2 class="site-description">
					<?php bloginfo( 'description' ); ?>
				</h2>
				<div id="header">
				<div class="headerimage animated fadeIn go" style="background-image: url('<?php header_image(); ?>')"></div>
					<?php if ( is_active_sidebar( 'sidebar-2' )  ) : ?>
					  <div class="topwidget animated fadeInLeftShort go delay-500">
					  	<?php dynamic_sidebar( 'sidebar-2' ); ?>
					  </div>
					<?php endif ?>
					<?php if ( has_nav_menu( 'front-menu' ) ) {
						wp_nav_menu(
							array(
									'theme_location' => 'front-menu',
									'container_class'   => 'frontmenu',
									'menu_class' 	 => 'frontmenu',
									'fallback_cb'	 => false
							)
							);
						} ?>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-3' )  ) : ?>
		      <div class="frontwidget animatedParent animateOnce">
		          <?php dynamic_sidebar( 'sidebar-3' ); ?>
		      </div>
		  <?php endif ?>
		<?php endif ?>
