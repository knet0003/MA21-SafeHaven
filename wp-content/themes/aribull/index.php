<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aribull
 */

get_header();
?>
<?php
			if ( get_theme_mod( 'show_breadcrumb', true ) === true ) {
				?>
				<div class="breadcrumb">
					 
         <?php aribull_breadcrumb_trail(); ?>
         
				</div>
				<?php
			}
			?>


	<main id="primary" class="site-main">
		<div class="contentBox">
			<?php
			if ( have_posts() ) {

				/* Start the Loop */
				while ( have_posts() ) {
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );
				}
				?>
				<div class="pagination-wrap">
					<?php
					the_posts_pagination(
						array(
							'mid_size'  => 3,
							'prev_text' => '<i class="fa fa-angle-left"></i><span class="screen-reader-text">' . esc_html__( 'Previous', 'aribull' ) . '</span>&nbsp;',
							'next_text' => '&nbsp;<i class="fa fa-angle-right"></i><span class="screen-reader-text">' . esc_html__( 'Next', 'aribull' ) . '</span>',
						)
					);
					?>
				</div>
				<?php

			} else {

				get_template_part( 'template-parts/content', 'none' );

			}
			?>
		</div>
		<?php
		get_sidebar();
		?>
	</main><!-- #main -->
<?php
get_footer();
