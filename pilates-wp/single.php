<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pilates
 */

get_header();
?>

<section class="row-base">
		<div class="container">
			<div class="row-base__content">
				<div class="row-base__blockText">
					<h2 class="title-section">
						<span><a name="1"></a>
							<?php
                        $cat = get_category_by_slug('row-base'); 
                        $id = $cat->term_id;
                        echo get_cat_name($id);
                        ?>
						</span>
					</h2>

					<?php if ( have_posts() ) : query_posts('p=112');
                        while (have_posts()) : the_post(); ?>
					<div class="desc-section">
						<?php the_content(); ?>
					</div>

					
					<?php endwhile; endif; wp_reset_query(); ?>

				</div>
				<div class="row-base__blockImg-single">
					<!-- <img src="<?php the_field('img-base',112); ?>" alt="Фото со спортсменками" class="row-base__img1"> -->
					<img src="<?php the_field('img-base2',112); ?>" alt="Фото со спортсменками" class="row-base__img2">
				</div>

			</div>
		</div>
	</section>	
	
<footer class="footer">
	<div class="container">
		<div class="row-footer">
			<p class="row-footer__copy">Pilates Plus, <?php echo date('Y') ?> &copy</p>
			<a href="<?php echo home_url() ?>" class="logo" style="background-image:url(<?php the_field('logo', 74);?>)"></a>
			<span class="row-footer__social">
				<a href="<?php the_field('vk',190);?>"><i class="ic ic-vkontakte"></i></a>
				<a href="<?php the_field('fb',190);?>"> <i class="ic ic-facebook"></i></a>
				<a href="<?php the_field('ing',190);?>"> <i class="ic ic-instagram"></i></a>
			</span>
		</div>
	</div>
</footer>

<?php



