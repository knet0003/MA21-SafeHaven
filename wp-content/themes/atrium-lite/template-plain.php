<?php
/**
 * Template Name: Plain Page
 *
 * @package atrium
 */

get_header(); ?>

<div id="wrapper" class="animatedParent animateOnce">
    <div id="contentwrapper" class="animated fadeIn">
    <div id="contentplain">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="post" id="post-<?php the_ID(); ?>">
        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>
        <div class="entry">
          <?php the_content(); ?>
          <?php edit_post_link(); ?>
          <?php wp_link_pages(array('before' => '<p><strong>'. esc_html__( 'Pages:', 'atrium-lite' ) .'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          <?php comments_template(); ?>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
