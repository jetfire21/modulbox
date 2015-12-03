<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>mdbx_index_01</title>
	
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
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/images/head/mdbx_logo_blue.svg" alt=""/> -->

				<?php
					 $option= get_option('alex_upload_file_option');
					 if( !empty($option['url_file']) ) 
					 {
					 	echo "<a href='/'><img src='" . $option['url_file'] . "' alt='logo' > </a> ";
					 }
					 //else echo "no logo image!";
					 else echo "<img src='" . get_template_directory_uri() ."/images/head/mdbx_logo_blue.svg' alt='logo'>";
				 ?>

			</div>
			<div class="h-logo">
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/images/head/mdbx_logo_white.svg" alt=""/> -->
			</div>

			<div class="h-menu">
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
	<div class="head-center index-page">
		<div class="container">
			<div class="hc-left index-page-text">Производство модульных конструкций в Санкт-Петербурге</div>
			<div class="hc-right">ModulBox – высокое качество по честной цене!</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="head-bottom">
		<div class="container-1780">
			<!--<div class="control-prev next"></div>-->
			<div class="carusel">
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/block_box.svg" alt=""/><span>Блок-контейнеры</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/modul_box.svg" alt=""/><span>Модульные здания</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/protection_box.svg" alt=""/><span>Посты охраны</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/garden_house.svg" alt=""/><span>Садовые домики</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/bath_house.svg" alt=""/><span>Бани</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/shipping_box.svg" class="sea" alt=""/><span>Морские контейнеры</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/tiles.svg" class="bru" alt=""/><span>Благоустройство</span></div></a>
			</div>
			<!--<div class="control-next prev"></div>-->
			<div class="clear"></div>
		</div>
	</div>
	<div class="header-bg-img"></div>
</header>