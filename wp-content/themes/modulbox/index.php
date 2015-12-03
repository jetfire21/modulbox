<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<?php get_header(); ?>

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
			<img src="<?php echo get_template_directory_uri(); ?>/images/content/V1_1.png" alt="Block" class="cr-image"/>
			<h1>Только до 30 ноября:</h1>
			<h3>Блок-контейнер 6м –</h3>
			<h2>42 000 <span>Г</span></h2>
			
			<a class="podr-but" href="#">Подробнее о продукте</a>
		</div>
		<div class="clear"></div>
	</div>
</section>

<?php get_footer(); ?>
