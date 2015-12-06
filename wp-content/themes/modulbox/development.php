<?php get_header();?>
	<div class="head-center margin-top-block">
		<div class="container">
			<div class="hc-top"><?php echo $cats->name;?></div>
			<div class="hc-bottom t-center">Раздел находится в разработке! Пожалуйста, зайдите позже.<br/><br/><br/>
			<?php // echo print_r( $cats ); ?>
				<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="back-in">Вернуться в каталог</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="head-bottom">
		<div class="container-1780">
			<div class="dev-item">
				<!-- <img src="images/head/garden_house.svg" alt=""/> -->

				<?php
				/* ****** без плагина Taxonomy Images в рубриках не будет возможности добавить изображение******** */

					// получаем данные из плагина Taxonomy Images
					$terms = apply_filters('taxonomy-images-get-terms', '', array(
						'taxonomy' => 'category' // таксономия, для которой нужны изображения
					));
					if (!empty($terms))
						{
						$i = 1;
						foreach((array)$terms as $term)
							{
							if ($term->term_id == $cats->cat_ID)
								{
								// выводим изображение рубрики (изображение не прикрепится если рубрика не имеет ни 1 записи)
								$html = wp_get_attachment_image($term->image_id, 'thumbnail');
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
	   		 ?>

			</div>
		</div>
	</div>
</header>
<?php get_footer();?>