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


/* ******Custom Admin Submenu Order******** */

function order_menu_page( $menu_ord ) {
  global $submenu;

  // Enable the next line to see all menus and their orders
  // echo '<pre>'; print_r( $submenu ); echo '</pre>'; exit();

  // Enable the next line to see a specific menu and it's order positions
  //echo '<pre>'; print_r( $submenu['plugins.php'] ); echo '</pre>'; exit();

  // unset($submenu['users.php']);

  // Sort the menu according to your preferences...1 - главные опции, 2 - общие
  $submenu['options-general.php'][11] =  $submenu['options-general.php'][10];
  $submenu['options-general.php'][10] =  $submenu['options-general.php'][41];

  unset( $submenu['options-general.php'][41] );
  ksort( $submenu['options-general.php']);

  return $menu_ord;
}

// add the filter to wordpress
add_filter( 'custom_menu_order', 'order_menu_page' );

register_sidebar(
         array(
          'name' => 'Подвал',
          'id' => 'footer',
          'description' => 'Блоки которые будут выводиться внизу страницы',
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '',
          'after_title' => ''
        ) 
 );

/* *************** new custom widget *********** */

class FooterAddress_Widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'footer_address_widget', // Base ID
      'Aдрес', // Name
      array( 'description' => 'Виджет для вывода адреса')// Args
    );
  }

  public function widget( $args, $instance ) {
     extract($instance);
 
        if($title) echo $title;


  }

  public function form( $instance ) {

    extract($instance);

    ?>

    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label> 
    <textarea class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text">
       <?php if($title) { echo esc_attr( $title ); }?>
    </textarea> 
    </p>

    <?php 
  }

} 

function register_footer_address_widget() {
  register_widget( 'FooterAddress_Widget' );
}

add_action( 'widgets_init', 'register_footer_address_widget' );

/* *************** new custom widget *********** */


register_nav_menus( array(
  'header_menu' => 'main_menu'
) );

register_nav_menus( array(
  'category_location' => 'cat_menu'
) );

function change_submenu_class($menu) {  
  $menu = preg_replace('/ class="sub-menu"/','/ class="drop-menu-m" /',$menu);  
  return $menu;  
}  
add_filter('wp_nav_menu','change_submenu_class');  

function additional_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'additional_mime_types');

?>