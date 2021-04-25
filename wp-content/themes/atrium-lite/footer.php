<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package atrium
 */
?>

<div id="footer">
  <div class="footersquare"></div>
  <div class="footerinner">
    <div id="footerwidgets">
      <?php dynamic_sidebar( 'sidebar-7' ); ?>
    </div>
    <div class="footerbottom">
      <?php if ( has_nav_menu( 'footer-menu' ) ) {
        wp_nav_menu(
          array(
              'theme_location' => 'footer-menu',
              'container_class'   => 'footermenu',
              'menu_class' 	 => 'footermenu',
              'fallback_cb'	 => false
          )
          );
        } ?>

        <div id="copyinfo">
          <?php if( get_theme_mod( 'copyright_text') == '' ) : ?>
            &copy; <?php echo date_i18n(__('Y','atrium-lite')); ?> <?php bloginfo('name'); ?>. <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'atrium-lite' ) ); ?>"> <?php printf( esc_html__( 'Powered by %s.', 'atrium-lite' ), 'WordPress' ); ?> </a> <?php printf( esc_html__( 'Theme by %1$s.', 'atrium-lite' ), '<a href="https://vivathemes.com/" rel="designer">Viva Themes</a>' ); ?>
          <?php else : ?>
            <?php echo wp_kses_post(get_theme_mod( 'copyright_text', '')); ?>
          <?php endif ?>
        </div>
      </div>
    </div>

</div>

</div>
<?php wp_footer(); ?>
</body></html>
