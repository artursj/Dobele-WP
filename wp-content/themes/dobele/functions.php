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
  wp_register_script( 'googlemap', get_template_directory_uri() .'/assets/js/googlemap.js', true);
  wp_register_script( 'googlemapapi','https://maps.googleapis.com/maps/api/js?key=AIzaSyBXhzDW_CJKLtsgoQgy1k959kiQFEqJQhE&callback=initMap',array(), null, true);
  
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'popper' );
  wp_enqueue_script( 'moment' );
  wp_enqueue_script( 'bootstrap' );
  wp_enqueue_script( 'bootstrap-datepicker' );
  
  wp_enqueue_script( 'main' );
}

add_action('wp_enqueue_scripts', 'load_scripts_dobele');

add_theme_support('post-thumbnails');

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

// Custom post type for Team members
function team_posttype() {
 
    $labels = array(
		'name'               => 'Team',
		'menu_name'          => 'Team',
		'name_admin_bar'     => 'Team',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Team member',
		'new_item'           => 'New Team Member',
		'edit_item'          => 'Edit Team Member',
		'view_item'          => 'View Team Member',
		'all_items'          => 'All Team Members',
		'search_items'       => 'Search Team Member',
		'parent_item_colon'  => 'Parent Team Member:',
		'not_found'          => 'No Team Member found.',
		'not_found_in_trash' => 'No Team Member found in Trash.'
	);

	$args = array( 
		'labels'		      => $labels,
		'public'		      => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => false,
        'rewrite'             => false, 
		'has_archive'         => false,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-groups',
		'taxonomies'		  => array(),
		'supports'          => array( 'thumbnail', 'title')
	);
	register_post_type( 'team', $args );
}
// Change "Enter title here" 
function team_change_title_text( $title ){
     $screen = get_current_screen();
  
     if  ( 'team' == $screen->post_type ) {
          $title = 'Name';
     }
  
     return $title;
}
  
add_filter( 'enter_title_here', 'team_change_title_text' );

add_action( 'init', 'team_posttype' );

 
function team_member_init(){
  add_meta_box("team_member_fields", "Team Member Information", "team_member_fields", "team", "normal", "low");
}

add_action("admin_init", "team_member_init");

//Creating custom fields for Team members
function team_member_fields() {
  global $post;
  $custom = get_post_custom($post->ID);
  $occupation = $custom["occupation"][0];
  $phone = $custom["phone"][0];
  $email = $custom["email"][0];
  
  ?>
  <label>Occupation</label>
  <input type="text" name="occupation" value="<?php echo  $occupation; ?>"/></br>
  <label>Phone</label>
  <input type="text" name="phone" value="<?php echo $phone; ?>"/></br>
  <label>E-mail</label>
  <input type="text" name="email" value="<?php echo $email; ?>"/></br>
  <?php
}

//Saving Team members details
function save_team_member(){
  global $post;
 
  update_post_meta($post->ID, "name", $_POST["name"]);
  update_post_meta($post->ID, "occupation", $_POST["occupation"]);
  update_post_meta($post->ID, "phone", $_POST["phone"]);
  update_post_meta($post->ID, "email", $_POST["email"]);
}
add_action('save_post', 'save_team_member');

//adding columns in view "All Team Members"
function team_edit_columns($columns){
  $columns = array(
    "title" => "Name",
    "occupation" => "Occupation",
    "phone" => "Phone",
    "email" => "E-Mail",
  );
 
  return $columns;
}
function team_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "occupation":
      $custom = get_post_custom();
      echo $custom["occupation"][0];
      break;
    case "phone":
      $custom = get_post_custom();
      echo $custom["phone"][0];
      break;
    case "email":
      $custom = get_post_custom();
      echo $custom["email"][0];
      break;
  }
}
add_action("manage_posts_custom_column",  "team_custom_columns");
add_filter("manage_edit-team_columns", "team_edit_columns");

// Custom post type for google maps
function googlemaps_posttype() {
 
    $labels = array(
		'name'               => 'Google Maps',
		'menu_name'          => 'Google Maps',
		'name_admin_bar'     => 'Google maps',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Location',
		'new_item'           => 'New Position',
		'edit_item'          => 'Edit Position',
		'view_item'          => 'View Position',
		'all_items'          => 'All Positions',
	);

	$args = array( 
		'labels'		      => $labels,
		'public'		      => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => false,
        'rewrite'             => false, 
		'has_archive'         => false,
		'menu_position'       => 30,
		'menu_icon'           => 'dashicons-location-alt',
		'taxonomies'		  => array(),
		'supports'          => array( 'thumbnail', 'title')
	);
	register_post_type( 'googlemaps', $args );
}

add_action( 'init', 'googlemaps_posttype' );

// Change "Enter title here" 
function googlemaps_change_title_text( $title ){
     $screen = get_current_screen();
  
     if  ( 'googlemaps' == $screen->post_type ) {
          $title = 'Title';
     }
  
     return $title;
}
  
add_filter( 'enter_title_here', 'googlemaps_change_title_text' );

function googlemap_init(){
  add_meta_box("googlemap_fields", "Position", "googlemap_fields", "googlemaps", "normal", "low");
}
add_action("admin_init", "googlemap_init");

//Creating custom fields for google maps
function googlemap_fields() {
  global $post;
  $custom = get_post_custom($post->ID);
  $latitude = $custom["latitude"][0];
  $longitude = $custom["longitude"][0];
  
  ?>
  <label>Latitude</label>
  <input type="text" name="latitude" value="<?php echo  $latitude; ?>"/></br>
  <label>longitude</label>
  <input type="text" name="longitude" value="<?php echo $longitude; ?>"/></br>
  <?php
}

//Saving google maps position
function save_google_location(){
  
  global $post;
  
  update_post_meta($post->ID, "shortcode", "[google_map id='$post->ID']");
  update_post_meta($post->ID, "longitude", $_POST["longitude"]);
  update_post_meta($post->ID, "latitude", $_POST["latitude"]);
  
}

add_action('save_post', 'save_google_location');

//Creating google map from shortcode
function getGoogleMapShortcode($id){
  ob_start();

  extract( shortcode_atts( array(
        'id' => '0',
    ), $id ) );
  
  $custom = get_post_custom($id);
  $image = get_the_post_thumbnail_url( $id, 'post-thumbnail');
  $latitude = $custom["latitude"][0];
  $longitude = $custom["longitude"][0];
  
  $template = include "partials/googlemap.php";
  
  $template .= ob_get_clean();
  
  echo $template;
  
  wp_enqueue_script( 'googlemap' );
  wp_enqueue_script( 'googlemapapi' );
};
add_shortcode('google_map', 'getGoogleMapShortcode');

//adding columns in view "All Poitions"
function google_edit_columns($columns){
  
  $columns = array(
    "title" => "Title",
    "longitude" => "Longitude",
    "latitude" => "Latitude",
    "shortcode" => "Shortcode",
  );
 
  return $columns;
}

function google_custom_columns($column){
  
  global $post;
 
  switch ($column) {
    case "longitude":
      $custom = get_post_custom();
      echo $custom["longitude"][0];
      break;
    case "latitude":
      $custom = get_post_custom();
      echo $custom["latitude"][0];
      break;
    case "shortcode":
      $custom = get_post_custom();
      echo $custom["shortcode"][0];
      break;
  }
}
add_action("manage_posts_custom_column",  "google_custom_columns");
add_filter("manage_edit-googlemaps_columns", "google_edit_columns");