<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aribull
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="imgArea">
		<?php
		if ( has_post_thumbnail() && is_singular() || has_post_thumbnail() ) {
			$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'full' );
			echo '<div class="blogImg" style="background: url(' . esc_url( $featured_img[0] ) . ') no-repeat center center; background-size: cover;">';
		}

		
		?>
	</div>

	<header class="entry-header">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				aribull_posted_by();
				aribull_posted_on();
				if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'aribull' ) );
			if ( $categories_list ) {
				echo '<span class="cat-ats">' . $categories_list . '</span>';
			}
		}
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_excerpt();
		echo '<br><a class="more-link theme-button" href="' . esc_url( get_permalink( $post->ID ) ) . '">' .
				esc_html__( 'Read More', 'aribull' ) . ' <span class="screen-reader-text">' . esc_html( get_the_title( $post->ID ) ) . '</span><i class="fa fa-angle-right"></i></a>';
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
