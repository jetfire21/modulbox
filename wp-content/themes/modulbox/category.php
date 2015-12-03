<?php


	get_header(); ?>

		<div class="head-center margin-top-block">
		<div class="container">
			<div class="hc-top">
				<!-- Садовые домики -->
				<?php
				$cats = get_the_category();
				echo $cat_name = $cats[0]->name;
				?>
			</div>
			<div class="hc-bottom t-center">

			<!-- Раздел находится в разработке! Пожалуйста, зайдите позже.<br/><br/><br/> -->

		    <?php if(have_posts() ): ?>
		    <?php while(have_posts() ) : the_post();?>    
		    		<h2><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h2>    
		    <?php endwhile; ?>
		    <?php else: ?>
		       	<p>Контент еще не добавлен!</p>
		    <?php endif; ?>	

				<a href="#" class="back-in">Вернуться в каталог</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="head-bottom">
		<div class="container-1780">
			<div class="dev-item"><img src="images/head/garden_house.svg" alt=""/></div>
		</div>
	</div>

</header> 

<?php get_footer(); ?>