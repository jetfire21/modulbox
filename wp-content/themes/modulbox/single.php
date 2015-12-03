<?php

get_header(); ?>
	<div class="head-center margin-top-block">
		<div class="container">
			<div class="hc-top">
				<!-- Морские контейнеры -->
				<?php
				$cats = get_the_category();
				echo $cats[0]->name;
				?>
			</div>
			<div class="hc-bottom l-height-31">
<!-- 				Сухогрузные контейнеры предназначены для транспортировки и хранения груза. Перевозка товара может осуществляться по международному или внутреннему маршруту. Транспортное оборудование успешно используется для смешанных перевозок, не нарушая целостности перевозимого груза. -->
				 <?php echo $cats[0]->description;?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</header>


<section class="content">
	<object type="image/svg+xml" class="c-bg" data="images/content/comb_bg.svg" fill="#f00" alt="The image wasn't found"></object>
	<div class="container">
		<div class="content-left-menu itemsvn">
			<div class="cl-menu">
				<ul>
					<li><a href="#" class="cl-menu-item cl-active">Сухогрузный контейнер 5 тонн<span>35 900 <span class="rub">в</span></span></a></li>
					<li><a href="#" class="cl-menu-item">Сухогрузный контейнер 10 футов<span>93 000 <span class="rub">в</span></span></a></li>
					<li><a href="#" class="cl-menu-item">Сухогрузный контейнер 20 футов<span>84 000 - 170 000 <span class="rub">в</span></span></a></li>
					<li><a href="#" class="cl-menu-item">Сборно-разборный контейнер<span>85 000 - 190 000 <span class="rub">в</span></span></a></li>
				</ul>
			</div>
		</div>

		<div class="content-right-info">
			<?php if(have_posts() ): ?>
			<?php while(have_posts() ) : the_post();?>   
			<div class="cr-title"> 
					<h1><?php echo the_title(); ?></h1> 
					<a class="cr-but" href="#"><i class="cr-calc"></i>Оформить заказ</a>
				<div class="clear"></div>
			</div>   
			       <?php the_content(); ?>
			<?php endwhile; ?>
			<?php else: ?>
			   	<p>Контент еще не добавлен!</p>
			<?php endif; ?>	 
		</div>

		<div class="clear"></div>
	</div>
</section>

<?php get_footer(); ?>


