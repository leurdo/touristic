<div class="wrapper">
  <header class="main-header">
    <div class="top-header">
      <div class="top-header__wrap">
        <div class="logotype-block">
          <div class="logo-wrap">
            <?php if(has_custom_logo()) : ?>

              <?php the_custom_logo(); ?>

            <?php else : ?>
            <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.svg" alt="Логотип" class="logo-wrap__logo-img"></a>
            <?php endif; ?>
          </div>
        </div>
        <nav class="main-navigation">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-list', 'walker' => new \App\My_Walker_Nav_Menu]);
          endif;
          ?>
        </nav>
      </div>
    </div>
    <div class="bottom-header">
      <div class="search-form-wrap">
        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ) ?>">
          <input type="text" placeholder="Поиск..." class="search-form__input" value="<?php echo get_search_query() ?>" name="s" id="s" />
          <button class="search-form__btn-search"><i class="icon icon-search"></i></button>
        </form>
      </div>
    </div>
  </header>
  <!-- header_end-->