<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<?php get_header(); ?>

<?php if( is_front_page() ): ?>

	<div class="head-center index-page">
		<div class="container">
			<div class="hc-left index-page-text">
				<!-- Производство модульных конструкций в Санкт-Петербурге -->
				<?php bloginfo('name'); ?>
			</div>
			<div class="hc-right">
				<!-- ModulBox – высокое качество по честной цене! -->
				<?php bloginfo('description'); ?>
			</div>
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
<!-- 
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/block_box.svg" alt=""/><span>Блок-контейнеры</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/modul_box.svg" alt=""/><span>Модульные здания</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/protection_box.svg" alt=""/><span>Посты охраны</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/garden_house.svg" alt=""/><span>Садовые домики</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/bath_house.svg" alt=""/><span>Бани</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/shipping_box.svg" class="sea" alt=""/><span>Морские контейнеры</span></div></a>
				<a href="#"><div class="c-item"><img src="<?php echo get_template_directory_uri(); ?>/images/head/tiles.svg" class="bru" alt=""/><span>Благоустройство</span></div></a>
 -->				
			</div>			
			<!--<div class="control-next prev"></div>-->
			<div class="clear"></div>
		</div>
	</div>
	<?php endif; // is_front_page() ?>

	<div class="header-bg-img"></div>
</header>

<section class="content">
	<object type="image/svg+xml" class="c-bg" data="<?php echo get_template_directory_uri(); ?>/images/content/comb_bg.svg" fill="#f00" alt="The image wasn't found"></object>
	<div class="container">
		<div class="content-left">
<!-- 
			<h1>О компании</h1>
			<p>Компания Modulbox имеет большой опыт в сфере производства быстро возводимых строений. Наша компания занимается собственным производсвом и продажей блок-контейнеров, модульных зданий, а также деревянных бытовок в Санкт-Петербурге и Ленинградской области.</p>

			<p>Всегда рады приветствовать вас на нашей производственной площадке, где вы можете посмотреть и «пощупать» нашу продукцию. Там же вы можете сделать заказ и обсудить все в мельчайших подробностях.</p>

			<p>В компании имеются собственные манипуляторы, которые доставят и установят ваш заказ в кратчайшие сроки. <strong>Быстро, выгодно, удобно!</strong></p>
 -->			
		    <?php if(have_posts() ): ?>
		    <?php while(have_posts() ) : the_post();?>    
		    		<h1><?php echo the_title(); ?></h1>    
		           <?php the_content(); ?>
		    <?php endwhile; ?>
		    <?php else: ?>
		       	<p>Контент еще не добавлен!</p>
		    <?php endif; ?>	 

		</div>
		<div class="content-right">
<!-- 
			<img src="<?php echo get_template_directory_uri(); ?>/images/content/V1_1.png" alt="Block" class="cr-image"/>
			<h1>Только до 30 ноября:</h1>
			<h3>Блок-контейнер 6м –</h3>
			<h2>42 000 <span>Г</span></h2>		
			<a class="podr-but" href="#">Подробнее о продукте</a>
 -->
			<?php if(!dynamic_sidebar( 'offer_honme' )):?>
				<p>Не один видже не установлен!</p>
			<?php endif;?>
						
		</div>
		<div class="clear"></div>
	</div>
</section>

<?php get_footer(); ?>
