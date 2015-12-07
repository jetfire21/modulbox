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


<!-- модальное окно заказа контсрукции --> 
<div id="modal_form_write2">

	<div class="form-container">
		<h2 class="fc-h2">Оформить заказ</h2>
		<p>Наш специалист перезвонит в течении 15 минут</p>
		<form class="pop-form">
			<div class="form-left">
				<fieldset>
					<legend>Ваше имя</legend>
					<input type="text"/>
				</fieldset>
				<fieldset>
					<legend>E-mail</legend>
					<input type="text"/>
				</fieldset>
				<fieldset>
					<legend>Телефон</legend>
					<input type="text"/>
				</fieldset>
			</div>
			<div class="form-right">
				<div class="fr-item">
				<!-- <img class="mb-pic" src="images/content/mb/K2_2a.png" alt=""> -->
				 <?php
					 $thumb = get_the_post_thumbnail( $post->ID, "full", array('class' => "mb-pic") );
					 $thumb = preg_replace("/width=\"[0-9]*\"/i", "", $thumb);
					 $thumb = preg_replace("/height=\"[0-9]*\"/i", "", $thumb);
					 if($thumb) echo $thumb;
				?>
				<!-- Модульное здание №1 -->
				<?php 
				$title_box = get_the_title($post->ID);
				if( $title_box ) echo $title_box;
				?>
				<span>
				<!-- 105 000 - 118 000  -->
				<?php $main_price = get_post_meta($post->ID, 'main_price', true); ?>
				<?php if($main_price):?>
				<span> <?php echo $main_price;?> <span class="rub">в</span></span>
				<?php endif;?>
				<span class="rub">в</span></span></div>
				<fieldset>
					<legend>Комментарий</legend>
					<div class="scroll-pane2" id="chat2">
					<textarea class="feed" style="height: 500px;"></textarea>
					</div>
				</fieldset>
			</div>
			<div class="clear"></div>
			<a class="write-but-pop" href="#"><i class="write-pop"></i>Напишите нам</a>
		</form>
	</div>
	
</div>
	

<!-- the Scrollbar script -->


<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.nicescroll.min.js"></script>



<script type="text/javascript">
	$('textarea').focus(function() {
		$('#chat2').niceScroll();		
	});

</script>

</body>
</html>