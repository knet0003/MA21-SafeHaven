<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

		<section class="error-404 not-found">
			<header class="page-header">
				<h2 class="page-title"><?php esc_html_e( 'The page you are looking for is not found!', 'aribull' ); ?></h2>
			</header><!-- .page-header -->
			<div class="page-content">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="more-link theme-button">
			<?php esc_html_e( 'Back To Home', 'aribull' ); ?> <i class="fa fa-angle-right"></i></a>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
