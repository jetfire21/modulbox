<footer>
	<div class="container">
		<div class="f-left">
			<div class="f-menu">
				<ul>
					<li><a href="#">Каталог продукции</a></li>
					<li><a href="#">Аренда</a></li>
					<li><a href="#">О компании</a></li>
					<li><a href="#">Условия доставки</a></li>
					<li><a href="#">Информация</a></li>
					<li><a href="#">Контакты</a></li>
					<div class="clear"></div>
				</ul>
			</div>
			<div class="f-copy">
				<span>Modulbox.ru © 2015 Все права защищены. <br/>Дизайн: <a href="#">Ханкина</a></span>
			</div>
		</div>
		<div class="f-right">
			<div class="f-logo"><img src="<?php echo get_template_directory_uri(); ?>/images/footer/mdbx_logo_tiny.svg" alt=""/></div>
			<div class="f-kont"><strong>&#043;7 (812) 408-01-11</strong><br/>Комсомольский пр., д. 42, стр. 3<br/>Москва, 119048, Россия</div>
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
	</div>
</div>

<!-- модальное окно с телефоном -->
<div id="modal_form2">
	<div class="form-container">
		<h2 class="fc-h2">&#043;7 (812) 408 01 11</h2>
	</div>
</div>

<!-- фон вспливающих окон -->
<span class="modal_close"></span>
<div id="overlay"></div>   

</body>
</html>