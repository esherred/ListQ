<header class="header header-v1 stricky clearfix">
  <?php if( get_field( 'logo', 'options' ) ): ?>
    <div class="logo">
       <a href="/"><img src="<?php the_field( 'logo', 'options' ) ?>" alt="<?php bloginfo('name'); ?>"></a>
    </div>
  <?php endif; ?>
  <?php 
    wp_nav_menu( 
      array(
      'theme_location' => 'main-menu',
      'container_class' => 'main-menu',
      ) 
    ); 
  ?>
  <div class="bars open">
     <span></span>
     <span></span>
     <span></span>
     <span></span>
  </div>
  <div class="mobile-menu">
    <?php 
      wp_nav_menu( 
        array(
        'theme_location' => 'main-menu',
        'container' => 'nav',
        'container_class' => 'nav-holder',
        ) 
      ); 
    ?>
  </div>
</header>