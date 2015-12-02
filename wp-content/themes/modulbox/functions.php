<?php 

/* ************* include css and js files ******** */

add_action( 'wp_enqueue_scripts', 'css_js_for_theme' );

function css_js_for_theme(){

  wp_register_style( "font-awesome-css", "https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" );
  wp_register_style( "custom-css", get_template_directory_uri() ."/css/custom.css" );
  wp_register_style( "responsive-css", get_template_directory_uri() ."/css/responsive.css" );

    wp_enqueue_style( 'font-awesome-css' );
    wp_enqueue_style( 'custom-css' );
    wp_enqueue_style( 'responsive-css' );


     wp_enqueue_script('jquery-custom-js', "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js");
    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() ."/js/owl.carousel.min.js");
    wp_enqueue_script('plaxmove-js', get_template_directory_uri() ."/js/jquery.plaxmove.js");
   wp_enqueue_script('threesixty', "http://cdn.rawgit.com/matdumsa/jQuery.threesixty/master/jquery.threesixty.js");
   wp_enqueue_script('custom-js', get_template_directory_uri() ."/js/custom.js");

}

/* ******hide admin-bar******** */

add_filter('show_admin_bar', '__return_false');


?>