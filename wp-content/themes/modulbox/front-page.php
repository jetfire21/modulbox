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
					 else echo "<a href='/'><img src='" . get_template_directory_uri() ."/images/head/mdbx_logo_blue.svg' alt='logo'></a>";
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
					 else echo "<a href='/'><img src='" . get_template_directory_uri() ."/images/head/mdbx_logo_white.svg' alt='logo'></a>";
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

<?php if( is_front_page() ): ?>

	<div class="head-center index-page">
		<div class="container">
			<div class="hc-left index-page-text">
				<!-- Производство модульных конструкций в Санкт-Петербурге -->
				<?php bloginfo('name'); ?>
			</div>
			<div class="hc-right">
				<!-- ModulBox – высокое качество по честной цене! -->
				<?php bloginfo('description'); ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="head-bottom">
		<div class="container-1780">
			<!--<div class="control-prev next"></div>-->
			<div class="carusel">

				<?php
				/* ****** без плагина Taxonomy Images в рубриках не будет возможности добавить изображение******** */
				$cat = get_category_by_slug( 'catalog' );

				$args = array(
					'parent' => '',
					'child_of' => $cat->cat_ID,
					'hide_empty' => 0,
					'exclude' => '', // ID рубрики, которую нужно исключить
					'number' => '0',
					'taxonomy' => 'category', // таксономия, для которой нужны изображения
					'pad_counts' => true
				);
				$catlist = get_categories($args); // получаем список рубрик
				 
				foreach($catlist as $categories_item)
					{
					// получаем данные из плагина Taxonomy Images
					$terms = apply_filters('taxonomy-images-get-terms', '', array(
						'taxonomy' => 'category' // таксономия, для которой нужны изображения
					));
					if (!empty($terms))
						{
						$i = 1;
						foreach((array)$terms as $term)
							{
							if ($term->term_id == $categories_item->term_id)
								{
								// выводим изображение рубрики (изображение не прикрепится если рубрика не имеет ни 1 записи)
								$html =
								'<a href="' . esc_url(get_term_link($term, $term->taxonomy)) . '" title="Нажмите, чтобы перейти в рубрику">
								     <div class="c-item">' 
								     . wp_get_attachment_image($term->image_id, 'thumbnail') . '<span>'. $categories_item->cat_name . '</span>
								     </div>
								 </a>';
								 $html = str_replace('width="1"', '', $html);
								 $html = str_replace('height="1"', '', $html);
								 if( $i == count($terms)-1 ) $html = str_replace('class="attachment-thumbnail"', 'class="sea"', $html);
								 if( $i == count($terms)-0 ) $html = str_replace('class="attachment-thumbnail"', 'class="bru"', $html);
								 echo $html;								
								}
								$i++;
							}							 
						}						
				// выводим описание и название рубрики
				// echo "<a href=\"#\">" . $categories_item->cat_name . "</a> . $categories_item->category_description . ";
				}
	   		 ?>
<!-- 
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/block_box.svg" alt=""/><span>Блок-контейнеры</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/modul_box.svg" alt=""/><span>Модульные здания</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/protection_box.svg" alt=""/><span>Посты охраны</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/garden_house.svg" alt=""/><span>Садовые домики</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/bath_house.svg" alt=""/><span>Бани</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/shipping_box.svg" class="sea" alt=""/><span>Морские контейнеры</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/tiles.svg" class="bru" alt=""/><span>Благоустройство</span></div></a>
 -->				
			</div>			
			<!--<div class="control-next prev"></div>-->
			<div class="clear"></div>
		</div>
	</div>
	<?php endif; // is_front_page() ?>

	<div class="header-bg-img"></div>
</header>

<section class="content">
	<object type="image/svg+xml" class="c-bg" data="<?php echo get_template_directory_uri(); ?>/images/content/comb_bg.svg" fill="#f00" alt="The image wasn't found"></object>
	<div class="container">
		<div class="content-left">
<!-- 
			<h1>О компании</h1>
			<p>Компания Modulbox имеет большой опыт в сфере производства быстро возводимых строений. Наша компания занимается собственным производсвом и продажей блок-контейнеров, модульных зданий, а также деревянных бытовок в Санкт-Петербурге и Ленинградской области.</p>

			<p>Всегда рады приветствовать вас на нашей производственной площадке, где вы можете посмотреть и «пощупать» нашу продукцию. Там же вы можете сделать заказ и обсудить все в мельчайших подробностях.</p>

			<p>В компании имеются собственные манипуляторы, которые доставят и установят ваш заказ в кратчайшие сроки. <strong>Быстро, выгодно, удобно!</strong></p>
 -->			
		    <?php if(have_posts() ): ?>
		    <?php while(have_posts() ) : the_post();?>    
		    		<h1><?php echo the_title(); ?></h1>    
		           <?php the_content(); ?>
		    <?php endwhile; ?>
		    <?php else: ?>
		       	<p>Контент еще не добавлен!</p>
		    <?php endif; ?>	 

		</div>
		<div class="content-right">
<!-- 
			<img src="<?php echo get_template_directory_uri(); ?>/images/content/V1_1.png" alt="Block" class="cr-image"/>
			<h1>Только до 30 ноября:</h1>
			<h3>Блок-контейнер 6м –</h3>
			<h2>42 000 <span>Г</span></h2>		
			<a class="podr-but" href="#">Подробнее о продукте</a>
 -->
			<?php if(!dynamic_sidebar( 'offer_honme' )):?>
				<p>Не один видже не установлен!</p>
			<?php endif;?>
						
		</div>
		<div class="clear"></div>
	</div>
</section>



 <footer>
	<div class="container">
		<div class="f-left">
			<div class="f-menu">
<!-- 
				<ul>
					<li><a href="#">Каталог продукции</a></li>
					<li><a href="#">Аренда</a></li>
					<li><a href="#">О компании</a></li>
					<li><a href="#">Условия доставки</a></li>
					<li><a href="#">Информация</a></li>
					<li><a href="#">Контакты</a></li>
					<div class="clear"></div>
				</ul>
 -->			
 			<?php
				
				$args = array(
				  'theme_location'  => 'footer_location',
				  'menu'            => 'footer-menu', 
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
				  'items_wrap'      => '<ul>%3$s <div class="clear"></div></ul>',
				  'depth'           => 1
				);

				 wp_nav_menu( $args );
		    ?>
		    	

			</div>
			<div class="f-copy">
				<span>Modulbox.ru © 2015 Все права защищены. <br/>Дизайн: <a href="#">Ханкина</a></span>
			</div>
		</div>
		<div class="f-right">
			<div class="f-logo">
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/images/footer/mdbx_logo_tiny.svg" alt=""/> -->
				<?php
					 $option= get_option('alex_upload_file_option');
					 if( !empty($option['url_file2']) ) 
					 {
					 	echo "<a href='/'><img src='" . $option['url_file2'] . "' alt='logo' > </a> ";
					 }
					 //else echo "no logo image!";
					 else echo "<img src='" . get_template_directory_uri() ."/images/footer/mdbx_logo_tiny.svg' alt='logo'>";
				 ?>
			</div>
			<div class="f-kont"><strong>
				<?php
					 $option = get_option('alex_upload_file_option');
					 if( !empty($option['phone']) ) echo $option['phone'];
				 ?>
				</strong><br/>
				<!-- Комсомольский пр., д. 42, стр. 3<br/>Москва, 119048, Россия -->
				<?php if(!dynamic_sidebar( 'footer' )):?>
					<p>Не один видже не установлен!</p>
				<?php endif;?>
			</div>
		</div>
		
		<div class="f-copy-m">
				<span>Modulbox.ru © 2015 Все права защищены.<br/>Дизайн: <a href="#">Ханкина</a></span>
			</div>
		
		<div class="clear"></div>
	</div>
</footer>

<?php wp_footer(); ?>


<!-- модальное окно с меню -->
<div id="modal_form">	
	<div class="form-container">
		<h2 class="fc-h2">Меню</h2>
<!-- 
		<ul>
			<li><a href="#">Каталог продукции</a>
				<ul class="drop-menu-m">
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
				<ul class="drop-menu-m">
					<li><a href="#">Аренда техники</a></li>
					<li><a href="#">Аренда продукции</a></li>
				</ul>
			</li>
			<li><a href="#">О компании</a></li>
			<li><a href="#" class="a-cur">Условия доставки</a></li>
			<li><a href="#">Информация</a></li>
			<li><a href="#">Контакты</a></li>
		</ul>
 -->
			<!-- modal menu -->
			<?php
				
				function change_submenu_class_m($menu) {  
				  $menu = preg_replace('/ class="drop-menu"/','/ class="drop-menu-m" /',$menu);  
				  return $menu;  
				}  
				add_filter('wp_nav_menu','change_submenu_class_m');

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
</div>

<!-- модальное окно с телефоном -->
<div id="modal_form2">
	<div class="form-container">
		<h2 class="fc-h2">
				<?php
					 $option = get_option('alex_upload_file_option');
					 if( !empty($option['phone']) ) echo $option['phone'];
				 ?>
		</h2>
	</div>
</div>

<!-- фон вспливающих окон -->
<span class="modal_close"></span>
<div id="overlay"></div>   

</body>
</html>