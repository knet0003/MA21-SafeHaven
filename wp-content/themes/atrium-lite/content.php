<?php
/**
 * The template for displaying posts on index view
 *
 * @package atrium
 */
?>

<div <?php post_class(); ?>>
 <a class="bloglink" href="<?php the_permalink(); ?>">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('atrium-blogthumb'); ?>
      <?php else : ?>
        <img src="<?php echo esc_url(get_template_directory_uri() .'/images/blogbg.jpg'); ?>" />
      <?php endif ?>
    <div class="entry">
    <h2 class="entry-title" id="post-<?php the_ID(); ?>">
      <?php the_title(); ?>
    </h2>
    <div class="postcat">
      <?php echo get_the_date(); ?>
    </div>
    <?php the_excerpt(); ?>
  </div>
  <span class="more-link"><?php esc_html_e( 'Read more', 'atrium-lite' ); ?></span>
  </a>
</div>
