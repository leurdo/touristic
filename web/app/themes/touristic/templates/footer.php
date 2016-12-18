<?php use Roots\Sage\Customizer; ?>

<footer class="main-footer">
  <div class="content-footer">
    <div class="bottom-menu">
      <?php
      if (has_nav_menu('footer_navigation')) :
        wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'b-menu__list', 'walker' => new \App\Footer_Walker_Nav_Menu]);
      endif;
      ?>
    </div>
    <div class="copyright-wrap">
      <div class="copyright-text"><?php echo get_theme_mod('copyright_text'); ?><a href="/" class="copyright-text__link"><?php echo get_theme_mod('copyright_link'); ?></a></div>
    </div>
  </div>
</footer>
