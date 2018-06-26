<?php
  
  /*
   * Theme Support Hooks
   */
  add_theme_support( 'post-thumbnails' );
  add_image_size('listing-card', 270, 232, true);

  /*
   * Register Menu
   */
  function listq_register_menu() {
    register_nav_menu('main-menu',__( 'Main Menu' ));
  }
  add_action( 'init', 'listq_register_menu' );

  /*
   * Add 'active' To Curent Menu Item
   */
  add_filter( 'nav_menu_css_class' , 'listq_active_nav' , 10 , 2 );
  function listq_active_nav ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
  }

  /*
   * Theme Styles and Scripts
   */
  function listq_enqueue_scripts() {
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', '4.1.1' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', '3.5.0' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', '3.3.7' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', '4.7.0' );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', '1.12.1' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array( 'normalize', 'bootstrap', 'font-awesome', 'jquery-ui' ) );
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array( 'style' ) );

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, '1.12.4', true );
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script ( 'jquery-ui-js', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array( 'jquery' ), '1.12.1', true );
    wp_enqueue_script ( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
    wp_enqueue_script ( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );

  }
  add_action ( 'wp_enqueue_scripts', 'listq_enqueue_scripts' );

  /*
   * Home Query Reset for Listings
   */
  function listq_update_query( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
      if( is_front_page() ) {
        $query->set( 'posts_per_page', 8 );
        $query->set( 'post_type', 'listing' );
      }
    }
  }
  add_action( 'pre_get_posts', 'listq_update_query' );

  /*
   * ACF Options Pages
   */
  if( function_exists('acf_add_options_page') ) {
    $acf_theme = acf_add_options_page(array(
      'page_title'  => 'Theme Settings',
      'menu_title'  => 'Theme Settings',
      'capability'  => 'manage_options',
      'redirect'    => true,
      'position'   => "50.1",
      'icon_url'   => 'dashicons-welcome-widgets-menus',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'General',
      'menu_title'  => 'General',
      'capability'  => 'manage_options',
      'parent_slug' => $acf_theme['menu_slug'],
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Homepage',
      'menu_title'  => 'Homepage',
      'capability'  => 'manage_options',
      'parent_slug' => $acf_theme['menu_slug'],
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Listings',
      'menu_title'  => 'Listings',
      'capability'  => 'manage_options',
      'parent_slug' => $acf_theme['menu_slug'],
    ));
  }

  /*
   * Create Listing Custom Post Type
   */
  function cptui_register_my_cpts_listing() {
    $labels = array(
      "name" => __( "Listings", "" ),
      "singular_name" => __( "Listing", "" ),
    );
    $args = array(
      "label" => __( "Listings", "" ),
      "labels" => $labels,
      "description" => "",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "show_in_rest" => false,
      "rest_base" => "",
      "has_archive" => false,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "rewrite" => array( "slug" => "listing", "with_front" => true ),
      "query_var" => true,
      "menu_icon" => "dashicons-location",
      "supports" => array( "title", "thumbnail" ),
    );
    register_post_type( "listing", $args );
  }
  add_action( 'init', 'cptui_register_my_cpts_listing' );

  function cptui_register_my_taxes_listing_type() {
    $labels = array(
      "name" => __( "Types", "" ),
      "singular_name" => __( "Type", "" ),
    );
    $args = array(
      "label" => __( "Types", "" ),
      "labels" => $labels,
      "public" => true,
      "hierarchical" => false,
      "label" => "Types",
      "show_ui" => true,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "query_var" => true,
      "rewrite" => array( 'slug' => 'listing_type', 'with_front' => true, ),
      "show_admin_column" => false,
      "show_in_rest" => false,
      "rest_base" => "listing_type",
      "show_in_quick_edit" => true,
      'meta_box_cb' => false,
    );
    register_taxonomy( "listing_type", array( "listing" ), $args );
  }
  add_action( 'init', 'cptui_register_my_taxes_listing_type' );
