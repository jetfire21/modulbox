<?php
/*
Template Name: Шаблон-Минимальный
dark-blue background
*/
?>

<?php
	get_header(); ?>

	<!--<div class="head-center no-marg">-->
		<div class="hc-left-full">
			<img class="deliv-img" src="images/head/deliv-bg.jpg" alt=""/>
		</div>
		<div class="hc-right-full">
			<div class="right-container">
<!-- 
				<h2>Условия доставки</h2>
				<p>При покупке или аренде продукции мы можем доставить её на объект заказчика. Бытовку вам доставит и установит на место профессиональный водитель-крановщик на машине с манипулятором.
				<br/><br/>
				Стоимость доставки с разгрузкой:<br/>
				<strong>по Санкт-Петербургу –– от 5000 руб.</strong>
				<br/><br/>
				Стоимость доставки за пределы города зависит от километража и уточняется у диспетчера.
				</p>
 -->				
				<?php if(have_posts() ): ?>
				<?php while(have_posts() ) : the_post();?>    
						<h2><?php echo the_title(); ?></h2>    
				       <?php the_content(); ?>
				<?php endwhile; ?>
				<?php else: ?>
				   	<p>Контент еще не добавлен!</p>
				<?php endif; ?>	 

			</div>
		</div>
		<div class="clear"></div>
	<!--</div>-->
	<div class="header-bg-img"></div>
</header>

<?php get_footer(); ?>
