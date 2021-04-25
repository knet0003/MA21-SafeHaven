<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package atrium
 */

get_header(); ?>

<div id="header">
  <div class="headersquare"></div>

  <div class="pagetop">
    <h1 class="entry-title">
  		<?php printf( esc_html__( 'Search Results for: %s', 'atrium-lite' ), '<span>' . get_search_query() . '</span>' ); ?>
    </h1>
  </div>
</div>

<div id="wrapper" class="animatedParent animateOnce">
    <div id="contentwrapper" class="animated fadeIn">


  <div id="contentfull">
    	<?php if (have_posts()) : ?>

          <?php
              while ( have_posts() ) : the_post();
                  get_template_part( 'content', get_post_format() );
              endwhile;
          ?>
          <?php the_posts_pagination(); ?>
    	<?php else : ?>
    		<p class="center">
      			<?php esc_html_e( 'No results.', 'atrium-lite' ); ?>
    		</p>
    	<?php endif; ?>
  	</div>
</div>
</div>
<?php get_footer(); ?>
