<?php
	get_header(); ?>

		<?php
			$cats = get_the_category();
			$cat_id = $cats[0]->cat_ID;
			$cat_slug = $cats[0]->slug;
			$parent_cat = $cats[0]->parent;
		?>
		
		<?php if ($parent_cat != 0): ?>

			<div class="head-center margin-top-block">
			<div class="container">
				<div class="hc-top">
					<!-- Садовые домики -->
					<?php
					// проверяем количество рубрик
					if( count($cats) == 1) { echo $cat_name = $cats[0]->name; }
					else echo "Нет записей относящихся только к данной категории";						
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



<?php else:?>



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
				 <?php // print_r($cats);?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</header>


<section class="content">
	<object type="image/svg+xml" class="c-bg" data="<?php echo get_template_directory_uri(); ?>/images/content/comb_bg.svg" fill="#f00" alt="The image wasn't found"></object>
	<div class="container">
		<div class="content-left-menu">
			<div class="info-menu">
<!-- 
				<ul>
					<li><a href="#" class="current">Аренда техники</a></li>
					<li><a href="#">Аренда продукции</a></li>
				</ul>
 -->				


			 <?php
				$query = new WP_Query( array( 'category_name' => $cat_slug ) );
			  ?>
			 <?php $cur_post_id = get_the_ID();?>
		    <?php if($query->have_posts() ): ?>
			    <ul>
			    <?php while($query->have_posts() ) : $query->the_post();?>    
						<li>
						<a <?php if( $cur_post_id == $post->ID ) echo "class='current'";?> href="<?php echo get_permalink();?>"><?php echo the_title(); ?></a>
						</li>
			    <?php endwhile; ?>
			    </ul>
		    <?php else: ?>
		       	<p>Контент еще не добавлен!</p>
		    <?php endif; ?>	 

			</div>
		</div>
		<div class="content-right-info">
            <!-- 
			<div class="cr-title">
				<h1>Аренда техники</h1>
				<div class="clear"></div>
			</div>
			
			<div class="cr-text">

				<p>
					<img src="images/content/info-pic.jpg" alt=""/>
					Здания модульного типа применяются в самых различных областях, начиная от организации удобного проживания при кратковременных или вахтовых работах на коммерческих предприятиях до использования в качестве постов охраны и отдельных помещений на складских и промышленных территориях.
					<br/><br/>
					Конструкция строения позволяет использовать его в любых погодных условиях, а транспортировка возможна любыми доступными способами.
					<br/><br/>
					При заказе модульного здания следует обратить внимание на технологию производства и его эксплуатационные особенности.
				</p>
				<p>
					Цена модульного здания зависит, в частности, от общей площади строения, стоимости отделочных материалов и требований заказчика (толщина утеплителя, особенности внутренней планировки и т. д.).
				</p>
				
				<h4>Преимущества заказа модульных конструкций</h4>
				
				<ul class="preim-vn">
					<li><span>Экономичность. Изготовление модульного здания обходится намного дешевле аренды или строительства обычного.</span></li>
  					<li><span>Возможность удобной транспортировки.</span></li>
					<li><span>Быстрота возведения.</span></li>
					<li><span>Многофункциональность.</span></li>
					<li><span>Компактность.</span></li>
					<li><span>Возможность присоединения к различным инженерным коммуникациям.</span></li>
					<li><span>Доступная стоимость.</span></li>
				</ul>
				<p>
					Производители модульных зданий предлагают конструкции под ключ, с полной установкой электрики и сантехнических коммуникаций. Изготовление ведется с использованием надежных материалов, устойчивых к механическим повреждениям и коррозии. Отсутствие органических компонентов в составе утеплителя исключает появление плесени и сырости.
				</p>

			</div>
			 -->

			<!-- все категории кроме каталога продукции -->
			  <?php
				$latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)) );

				if( $latest_cat_post->have_posts() ) : 
					while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();
			  ?>
				<div class="cr-title">
					<h1><?php echo the_title(); ?></h1>
					<div class="clear"></div>
				</div>	
				<div class="cr-text">	    		 
		           <?php the_content(); ?>
		        </div>
				   <?php endwhile; ?>
			    <?php else: ?>
			       	<p>Контент еще не добавлен!</p>
			    <?php endif; ?>	 
			<!-- все категории кроме каталога продукции -->

		</div>

		<div class="clear"></div>
	</div>
</section>

<?php endif;?>

<?php get_footer(); ?>