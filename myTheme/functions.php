<?php 

add_action('wp_enqueue_scripts', 'zal_styles');
add_action('wp_enqueue_scripts', 'zal_scripts');

function zal_styles() {
  wp_enqueue_style( 'zal-style', get_stylesheet_uri() );
  wp_enqueue_style( 'swiper-style', "https://unpkg.com/swiper/swiper-bundle.min.css" );
}

function zal_scripts() {
  wp_enqueue_script( 'zal-scripts', get_template_directory_uri() . '/assets/js/bundle.js', array(), null, true );
  wp_enqueue_script( 'swiper-scripts', "https://unpkg.com/swiper/swiper-bundle.min.js", array(), null, true );
}

add_theme_support( 'custom-logo' );
add_theme_support( 'menus' );

?>