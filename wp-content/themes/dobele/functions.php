<?php

function enqueue_style_dobele() {
  wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css' );

}




function load_scripts_dobele() {  
  wp_register_script( 'popper','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js',array(), null, true);
  wp_register_script( 'bootstrap', get_template_directory_uri() .'/assets/js/bootstrap.min.js', true);
  wp_register_script( 'moment', get_template_directory_uri() .'/assets/js/moment.min.js', true);
  wp_register_script( 'bootstrap-datepicker', get_template_directory_uri() .'/assets/js/bootstrap-datetimepicker.min.js', true);
  wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', true);
  wp_register_script( 'main', get_template_directory_uri() .'/assets/js/main.min.js', true);
  wp_register_script( 'googlemap','https://maps.googleapis.com/maps/api/js?key=AIzaSyBXhzDW_CJKLtsgoQgy1k959kiQFEqJQhE&callback=initMap',array(), null, true);
  
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'popper' );
  wp_enqueue_script( 'moment' );
  wp_enqueue_script( 'bootstrap' );
  wp_enqueue_script( 'bootstrap-datepicker' );
  wp_enqueue_script( 'googlemap' );
  wp_enqueue_script( 'main' );
}

add_action('wp_enqueue_scripts', 'load_scripts_dobele');

function register_menu() {
  register_nav_menu('main-header-menu',__( 'Main Header Menu' ));
  register_nav_menu('top-header-menu',__( 'Top Header Menu' ));
}


add_action( 'init', 'register_menu' );

add_action( 'wp_enqueue_scripts', 'enqueue_style_dobele' );

function dobele_custom_logo_setup() {
    add_theme_support( 'custom-logo');
}
add_action( 'after_setup_theme', 'dobele_custom_logo_setup' );
