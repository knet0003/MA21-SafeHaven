<?php
/**
 * Template Name: Full Width
 *
 * @package atrium
 */

get_header(); ?>

<div id="header">
  <div class="headersquare"></div>
  <?php if (has_post_thumbnail()): ?>
    <div class="featuredthumb"><?php the_post_thumbnail('atrium-singlethumb'); ?></div>
  <?php endif ?>
  <div class="pagetop">
      <h1 class="entry-title">
          <?php the_title(); ?>
      </h1>
  </div>
</div>

<div id="wrapper" class="animatedParent animateOnce">
    <div id="contentwrapper" class="animated fadeIn">
    <div id="contentfull">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="post" id="post-<?php the_ID(); ?>">
        <div class="entry">
          <?php the_content(); ?>
          <?php edit_post_link(); ?>
          <?php wp_link_pages(array('before' => '<p><strong>'. esc_html__( 'Pages:', 'atrium-lite' ) .'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          <?php comments_template(); ?>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
