<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Home</title>
	
<?php wp_head(); ?>
	
</head>
<body>
<header class="padd-block"> 
	
	<div class="head-top">
		<div class="container-1780">
			<div class="h-menu-but">
				<a href="#"><i class="fa fa-bars"></i><span>Меню</span></a>
			</div>
			<div class="h-logo-b">
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/images/head/mdbx_logo_blue.svg" alt=""/>  -->

				<?php
					 $option= get_option('alex_upload_file_option');
					 if( !empty($option['url_file_bigres']) ) 
					 {
					 	echo "<a href='/'><img src='" . $option['url_file_bigres'] . "' alt='logo' > </a> ";
					 }
					 //else echo "no logo image!";
					 else echo "<img src='" . get_template_directory_uri() ."/images/head/mdbx_logo_blue.svg' alt='logo'>";
				 ?>

			</div>
			<div class="h-logo">
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/images/head/mdbx_logo_white.svg" alt=""/>  -->
				<?php
					 $option= get_option('alex_upload_file_option');
					 if( !empty($option['url_file']) ) 
					 {
					 	echo "<a href='/'><img src='" . $option['url_file'] . "' alt='logo' > </a> ";
					 }
					 //else echo "no logo image!";
					 else echo "<img src='" . get_template_directory_uri() ."/images/head/mdbx_logo_white.svg' alt='logo'>";
				 ?>				
			</div>

			<div class="h-menu">
<!-- 				
					<ul>
					<li><a href="#">Каталог продукции</a>
						<ul class="drop-menu">
							<li><a href="#">Блок-контейнеры</a></li>
							<li><a href="#">Модульные здания</a></li>
							<li><a href="#">Посты охраны</a></li>
							<li><a href="#">Садовые домики</a></li>
							<li><a href="#">Бани</a></li>
							<li><a href="#">Морские контейнеры</a></li>
							<li><a href="#">Благоустройство</a></li>
						</ul>
							
					</li>
					<li><a href="#">Аренда</a>
						<ul class="drop-menu">
							<li><a href="#">Аренда техники</a></li>
							<li><a href="#">Аренда продукции</a></li>
						</ul>
					</li>
					<li><a href="#">О компании</a></li>
					<li><a href="#">Условия доставки</a></li>
					<li><a href="#">Информация</a></li>
					<li><a href="#">Контакты</a></li>
					<div class="clear"></div>
				</ul>
 -->				
				<!-- modal menu -->
				<?php

					function change_submenu_class_b($menu) {  
					  $menu = preg_replace('/ class="sub-menu"/','/ class="drop-menu" /',$menu);  
					  return $menu;  
					}  
					add_filter('wp_nav_menu','change_submenu_class_b');

					$args = array(
					  'theme_location'  => 'header_menu',
					  'menu'            => 'main-menu', 
					  'container'       => '', 
					  'container_class' => '', 
					  'container_id'    => '',
					  'menu_class'      => '', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => 'wp_page_menu',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
					  'depth'           => 0
					);

					 wp_nav_menu( $args );
			    ?>
				<!-- modal menu -->	

			</div>
			
			<div class="h-phone-but">
				<a href="#"><i class="fa fa-phone"></i></a>
			</div>
			<div class="h-phone">
				<!-- <span>+7 (812) 408 01 11</span> -->
				<span>
				<?php
					 $option = get_option('alex_upload_file_option');
					 if( !empty($option['phone']) ) echo $option['phone'];
				 ?>
				 </span>
			</div>
		</div>
	</div>

<!-- 
	<div class="header-bg-img"></div>
</header>

это закрывающая чась шапки
 -->