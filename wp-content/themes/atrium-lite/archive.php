<?php
/**
 * The template for displaying Archive pages.
 *
 *
 * @package atrium
 */

get_header(); ?>

<div id="header">
  <div class="headersquare"></div>
  <div class="pagetop">
    <?php
    the_archive_title( '<h1 class="entry-title">', '</h1>' );
    the_archive_description( '<span class="addedsubtitle">', '</span>' );
    ?>
  </div>
</div>

  <div id="wrapper" class="animatedParent animateOnce">
    <div id="contentwrapper" class="animated fadeIn">

      <?php if ( have_posts() ) : ?>
      <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'content', get_post_format() );
        endwhile;
        ?>
      <?php the_posts_pagination(); ?>
      <?php else : ?>
      <h2 class="center">
        <?php esc_html_e( 'Not Found', 'atrium-lite' ); ?>
      </h2>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
