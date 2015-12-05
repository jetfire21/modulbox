<?php
get_header(); ?>

	<div class="head-center margin-top-block">
		<div class="container">
			<div class="hc-top">
				<!-- Морские контейнеры -->
				<?php
				$cats_in_post = get_the_category();

				echo $cats_in_post[0]->name;
				?>
			</div>
			<div class="hc-bottom l-height-31">
<!-- 				Сухогрузные контейнеры предназначены для транспортировки и хранения груза. Перевозка товара может осуществляться по международному или внутреннему маршруту. Транспортное оборудование успешно используется для смешанных перевозок, не нарушая целостности перевозимого груза. -->
				 <?php echo $cats_in_post[0]->description;?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</header>

<?php //echo $cats_in_post[0]->slug."-----------------------------"; ?>
<?php //echo "<pre>"; print_r($cats); echo "</pre>";?>
<?php //echo "<pre>"; print_r($cats_in_post); echo "</pre>";?>

<section class="content">
	<object type="image/svg+xml" class="c-bg" data="<?php echo get_template_directory_uri(); ?>/images/content/comb_bg.svg" fill="#f00" alt="The image wasn't found"></object>
	<div class="container">
		<div class="content-left-menu itemsvn">
			<div class="cl-menu">
				
				<!-- выводит все статьи категории -->
				 <?php
				 	$slug = ( !is_category() ) ? $cats_in_post[0]->slug : $cats->slug ;
					$query = new WP_Query( array( 'category_name' => $slug ) );
				  ?>
				 <?php $cur_post_id = get_the_ID();?>
			    <?php if($query->have_posts() ): ?>
				    <ul>
				    <?php while($query->have_posts() ) : $query->the_post();?>    
							<li>
								<a class="cl-menu-item <?php if( $cur_post_id == $post->ID ) echo 'cl-active';?>" href="<?php echo get_permalink();?>">
								<?php echo the_title(); ?>

								<?php $main_price = get_post_meta($post->ID, 'main_price', true); ?>
								<?php if($main_price):?>
								<span> <?php echo $main_price;?> <span class="rub">в</span></span>
								<?php endif;?>
								</a>
							</li>
				    <?php endwhile; ?>
				    </ul>
			    <?php else: ?>
			       	<p>Контент еще не добавлен!</p>
			    <?php endif; ?>	 
				<!-- выводит все статьи категории -->
			</div>
		</div>

		<div class="content-right-info">
			
			<?php if( !is_category() ): ?>

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
			
			<?php else: ?>	

					  <!-- Выводит последнюю статью категории -->
					  <?php

						$latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cats->cat_ID)) );

						if( $latest_cat_post->have_posts() ) : 
							while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();
					  ?>
						<div class="cr-title">
							<h1><?php echo the_title(); ?></h1>
							<a class="cr-but" href="#"><i class="cr-calc"></i>Оформить заказ</a>
							<div class="clear"></div>
						</div>	
						<!-- <div class="cr-text">	    		  -->
				           <?php the_content(); ?>
				        <!-- </div> -->
						   <?php endwhile; ?>
					    <?php else: ?>
					       	<p>Контент еще не добавлен!</p>
					    <?php endif; ?>	 
					  <!-- Выводит последнюю статью категории -->
				
			<?php endif; ?>	

		</div>

		<div class="clear"></div>
	</div>
</section>

<?php get_footer();?>


