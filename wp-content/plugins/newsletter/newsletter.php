<?php
   /*
   Plugin Name: Newsletter
   Description:
   Version: 1.0
   Author: Arturs Juhnevics
   */
   
if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}
function install_newsletter(){      
    global $wpdb;
  $db_table_name = $wpdb->prefix . 'newsletter';
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $db_table_name (
                id int(4) NOT NULL auto_increment,
                email varchar(100) NOT NULL,
                UNIQUE KEY id (id)
        ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
} 

register_activation_hook( __FILE__, 'install_newsletter' );

function load_scripts_newsletter() {  
  
  wp_enqueue_script( 'newsletter', plugins_url( 'assets/js/newsletter.js', __FILE__ ), array( 'jquery' ), '', true );
  wp_localize_script( 'newsletter', 'postnewsletter', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));
}

add_action('wp_enqueue_scripts', 'load_scripts_newsletter');

add_action( 'admin_menu', 'newsletter_admin_menu' );

function newsletter_admin_menu() {
	add_menu_page( 'Newsletter', 'Newsletter', 'manage_options', 'newsletter/newsletter-admin.php', 'newsletter_admin_page', '', 6  );
}

function newsletter_admin_page(){
    global $wpdb;
    $result = $wpdb->get_results( "SELECT * FROM wp_newsletter");
    
    include 'newsletter-admin.php';
}
add_action('wp_ajax_saveEmail', 'saveEmail');
add_action('wp_ajax_nopriv_saveEmail', 'saveEmail');
function saveEmail(){
    global $wpdb;
    $messageReturn = ["success"=>"", "exists"=>"", "v"=>""];
    $email = $_POST['email'];
    $verifyUnique = recordExists($email);
    $messageReturn["v"] = $verifyUnique;
    if($verifyUnique == true){
        $saveEmail = $wpdb->insert('wp_newsletter' , array(  
            "email" =>$email ,
        ));
    }else{
        $messageReturn["exists"] = "true";
    }
    
    if($saveEmail){
        $messageReturn["success"] = "true";
    }else{
        
       $messageReturn["success"] = "false";
    }
    echo json_encode($messageReturn);
    die();
}
function recordExists($email) {
        global $wpdb;
        $result = $wpdb->get_results( "SELECT * FROM wp_newsletter WHERE email = '$email'");

        if(!$result) {
                return true; 
        }else{
            return false;
        }   
}