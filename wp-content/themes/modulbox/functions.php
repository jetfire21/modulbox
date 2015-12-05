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

register_sidebar(
         array(
          'name' => 'Главная: Правая колонка',
          'id' => 'offer_honme',
          'description' => 'Добавьте сюда виджеты',
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

/* *************** new custom widget for add headings in part header *********** */

class Offer_Widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'offer_widget', // Base ID
      'Спецпредложение', // Name
      array( 'description' => 'Спецпредложение на главной странице')// Args
    );
  }

  public function widget( $args, $instance ) {
     extract($instance);
        
        if($link_img) echo '<img src="'.$link_img.'" alt="Block" class="cr-image"/>';
        if($date) echo '<h1>' . $date . '</h1>';
        if($product) echo '<h3>' . $product . '</h3>';
        if($price) echo '<h2>' . $price . ' <span>Г</span></h2>';
        if($link_product) echo '<a class="podr-but" href="'.$link_product.'">Подробнее о продукте</a>';

  }

  public function form( $instance ) {
    extract($instance);

    ?>

    <p>
    <label for="<?php echo $this->get_field_id( 'date' ); ?>">Дата окончания:</label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" type="text" 
    value="<?php if($date) { echo esc_attr( $date ); }?>">

     <label for="<?php echo $this->get_field_id( 'product' ); ?>">Название продукта:</label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'product' ); ?>" name="<?php echo $this->get_field_name( 'product' ); ?>"
    value="<?php if($product) { echo esc_attr( $product); }?>" />

     <label for="<?php echo $this->get_field_id( 'price' ); ?>">Цена:</label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'price' ); ?>" name="<?php echo $this->get_field_name( 'price' ); ?>"
         value="<?php if($price) { echo esc_attr( $price); }?>" />

   <label for="<?php echo $this->get_field_id( 'link_product' ); ?>">Ссылка на продукт:</label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'link_product' ); ?>" name="<?php echo $this->get_field_name( 'link_product' ); ?>" type="text" 
     value="<?php if($link_product) { echo esc_attr( $link_product); }?>">
    </p>

   <label for="<?php echo $this->get_field_id( 'link_img' ); ?>">Ссылка на изображение:</label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'link_img' ); ?>" name="<?php echo $this->get_field_name( 'link_img' ); ?>" type="text"
    value="<?php if($link_img) { echo esc_attr( $link_img); }?>">
    </p>

    <?php 
  }

} 

function register_offer_widget() {
  register_widget( 'Offer_Widget' );
}
add_action( 'widgets_init', 'register_offer_widget' );


/* *************** end new custom widget for add contacts in top part header *********** */


register_nav_menus( array(
  'header_menu' => 'main_menu'
) );

register_nav_menus( array(
  'footer_location' => 'footer_menu'
) );
  

function additional_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'additional_mime_types');



function my_shortcode_function($atts,$content = null) {
    // var_dump($atts);
    $row = explode(";", $content);
    unset( $row[count($row)-1] );
    // print_r($row);

    $html .= '<section id="flip-scroll">
                  <table class="cr-table1" cellspacing="0"><thead>';
    $i = 1;
    foreach ($row as $el) {
        $cell = explode("|", $el);


        if($i == 1) {

            $html .= '<tr class="row-title">';
            $j = 1;
             foreach ($cell as $item) {
               if($j == 1 ) $html .= '<th class="t1-name">'.$item. '</th>';
               if($j == 2 ) $html .= '<th class="t1-sost">'.$item. '</th>';
               if($j == 3 ) $html .= '<th class="t1-cost">'.$item. '</th>';
               if($j > 3)  $html .= '<th class="t1-cost">'.$item. '</th>';
                $j++;
             }
            
             $html .= "</tr></thead><tbody>";

        } else{

          $html .= '
                      <tr class="row-info">';
            $k = 1;
           foreach ($cell as $item) {
              if($k == 1 ) $html .= '<td class="t1-name">'.$item. '</td>';
               if($k == 2 ) $html .= '<td class="t1-sost">'.$item. '</td>';
               if($k == 3 ) $html .= '<td class="t1-cost">'.$item. '</td>';
               if($k > 3)  $html .= '<td class="t1-cost">'.$item. '</td>';
               $k++;
           }
           
           $html .= "</tr>";

        }
        $i++;
    }
      $html .= " </tbody></table>
          </section>";
    $html = str_replace("<br />", "", $html);
    return $html;
}
add_shortcode('table', 'my_shortcode_function');

?>