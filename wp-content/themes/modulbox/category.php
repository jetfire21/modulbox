<?php
	get_header(); ?>

		<?php
			$cats = get_category(get_query_var('cat'),false);
			// print_r( $cats );
			$cat_id = $cats->cat_ID;
			$cat_slug = $cats->slug;
			$parent_cat = $cats->parent;
		?>
		
		<!-- если это дочерняя категория,то выводим все записи -->
		<?php if ($parent_cat != 0): ?>


				<?php if($cat_slug == "trotuarnaya-plitka") { 
					require_once "post-templ-plitka.php";
					return false;
				} ?> 

				<?php require_once("single.php");?>
			
			<!-- категория каталога в разработке -->
<!-- 			<div class="head-center margin-top-block">
			<div class="container">
				<div class="hc-top">
					Садовые домики
					<?php
					// проверяем количество рубрик
					if( count($cats) == 1) { echo $cat_name = $cats->name; }
					else echo "Нет записей относящихся только к данной категории";						
					?>
				</div>
				<div class="hc-bottom t-center">
				  Раздел находится в разработке! Пожалуйста, зайдите позже.<br/><br/><br/>
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
	</header>  -->
	<!-- категория каталога в разработке -->



<?php elseif($cat_slug == "catalog"):?>



	<div class="head-center margin-top-block">
		<div class="container">
<!-- 
			<div class="hc-top">Каталог продукции</div>
			<div class="hc-bottom">Компания «ModulBox» предлагает большой выбор сооружений собственного производства.<br/>
				В распоряжении «ModulBox» находится собственная площадка для изготовления различных конструкций и их элементов.<br/>
				Наш многолетний опыт и профессионализм позволяют выполнять сооружения любой сложности на заказ. 
			</div>
 -->		
 			<div class="hc-top"><?php echo $cats->name;?></div>
 			<div class="hc-bottom"><?php echo $cats->description;?></div>
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
				<!-- <div class="clear"></div> -->
			</div>
		</div>

		<div class="header-bg-img"></div>
	</header>



<!-- если это родительская категория,то выводим самый последний пост и все статьи категории в левой колонке -->
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

			<!-- выводит все статьи категории -->
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
			<!-- выводит все статьи категории -->

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

<?php get_footer(); ?>

<?php endif;?>