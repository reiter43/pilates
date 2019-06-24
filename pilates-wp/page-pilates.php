<?php
/* 
Template Name: Главная
 */
?>

<?php

get_header();

?>

<main class="main">

	<section class="row-base" style="background-image:url(<?php the_field('bg-base', 112);?>)">
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
						<?php the_excerpt(); ?>
					</div>

					<a href="<?php the_permalink(); ?>">
						<div class="next">Подробнее <i class="ic ic-angle-circled-right"></i> </div>
					</a>
					<?php endwhile; endif; wp_reset_query(); ?>

				</div>
				<div class="row-base__blockImg">
					<img src="<?php the_field('img-base',112); ?>" alt="Фото со спортсменками" class="row-base__img1">
					<img src="<?php the_field('img-base2',112); ?>" alt="Фото со спортсменками" class="row-base__img2">
				</div>

			</div>
		</div>
	</section>

	<section class="row-price">
		<div class="container">
			<div class="row-price__content">
				<h2 class="title-section">
					<a name="2"></a>
					<?php
                    $cat = get_category_by_slug('row-price'); 
                    $id = $cat->term_id;
                    echo get_cat_name($id);?>
				</h2>
				<div class="row-price__items">

					<!-- Вставка ВП-разметки для тарифов -->
					<?php

                global $post;
                $args = array(
                    'post_type' => "price",
                    'publish' => true,
                    'order'       => 'ASC',
                );

                get_posts( $args);
                $price = get_posts( $args );

                foreach( $price as $post ){
                    setup_postdata($post);
                ?>

					<div class="price-item" style="background-image:url(<?php the_field('bg-price');?>)">
						<div class="price-item__container">
							<h3 class="price-item__title">
								<span>Уровень</span><br>
								<?php the_title();?>
							</h3>
							<p class="price-item__tarif">
								<?php the_field('price'); ?>
							</p>
							<ul class="price-item__list">
								<?php the_content();?>
							</ul>
							<a href="#" class="btn  btn--price">
								<p class="btn__text btn__text--price">Записаться</p>
								<div class="wrapper__arrow">
									<div class="btn__arrow">
										<span class="btn__arrowBase"></span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<?php
                }

                wp_reset_postdata();
                ?>
					<!-- ---------------------------------------------------------------------------- -->

				</div>
			</div>
	</section>

	<section class="row-classes">

		<?php 
		if ( have_posts() ) : query_posts('p=159');
		while (have_posts()) : the_post(); ?>

		<div class="row-classes__content1"
			style="background-image:url(<?php echo get_the_post_thumbnail_url(  get_the_ID(), '' );?>)">
			<div class="container">
				<h1 class="title-section">
					<a name="3"></a>
					<?php
						$cat = get_category_by_slug('row-classes'); 
						$id = $cat->term_id;
						echo get_cat_name($id);
					?>
				</h1>
				<div class="row-classes__container">
					<div class="row-classes__part">
						<h3 class="title-row-classes">
							<?php the_title(); ?>
						</h3>
						<?php the_content(); ?>
					</div>
					<div class="row-classes__img1" style="background-image:url(<?php the_field('bg-classes', 159);?>)">
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; endif; wp_reset_query(); ?>

		<?php 
		if ( have_posts() ) : query_posts('p=178');
		while (have_posts()) : the_post(); ?>

		<div class="row-classes__content2" style="background-image:url(<?php the_field('bg-classes', 178);?>)">
			<div class="row-classes__container">
				<div class="row-classes__img2">
					<?php the_post_thumbnail('', array('class' => "row-classes__pic2"));?>
				</div>
				<div class="row-classes__part">
					<h3 class="title-row-classes">
						<?php the_title(); ?>
					</h3>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<?php endwhile; endif; wp_reset_query(); ?>

		<?php 
		if ( have_posts() ) : query_posts('p=174');
		while (have_posts()) : the_post(); ?>

		<div class="row-classes__content3" style="background-image:url(<?php the_field('bg-classes', 174);?>)">
			<div class="row-classes__container">
				<div class="row-classes__part">
					<h3 class="title-row-classes">
						<?php the_title(); ?>
					</h3>
					<p class="row-classes-desc">
						<?php the_content(); ?>
					</p>
				</div>
				<div class="row-classes__img3">
					<?php the_post_thumbnail('', array('class' => "row-classes__pic3"));?>
				</div>
			</div>
		</div>
		<?php endwhile; endif; wp_reset_query(); ?>

		<?php 
		if ( have_posts() ) : query_posts('p=166');
		while (have_posts()) : the_post(); ?>

		<div class="row-classes__content4" style="background-image:url(<?php the_field('bg-classes', 166)?>)">
			<div class="row-classes__container">
				<div class="row-classes__img2">
					<?php the_post_thumbnail('', array('class' => "row-classes__pic4"));?>
				</div>
				<div class="row-classes__part">
					<h3 class="title-row-classes">
						<?php the_title(); ?>
					</h3>
					<?php the_content(); ?>
				</div>
			</div>
		</div>

		<?php endwhile; endif; wp_reset_query(); ?>

	</section>

	<section class="row-comments">
		<div class="container">
			<h1 class="title-section">
				<?php
                    $cat = get_category_by_slug('row-comments'); 
                    $id = $cat->term_id;
                    echo get_cat_name($id);
                ?>
			</h1>
			<div class="owl-carousel slider">

				<!-- Вставка ВП-разметки для слайдера -->
				<?php
					global $post;				
					$slider = get_posts( array(	'post_type' => "review",
												'publish' => true)
					);

					foreach( $slider as $post ){
						setup_postdata($post);
						get_template_part( 'template-parts/content', 'slider' );
					}

					wp_reset_postdata();
				?>
				<!-- ---------------------------------------------------------------------------- -->
			</div>
		</div>
	</section>

	<section class="row-contacts">
		<div class="container">
			<h1 class="title-section"><a name="4"></a>
				<?php
                        $cat = get_category_by_slug('row-contakts'); 
                        $id = $cat->term_id;
                        echo get_cat_name($id);
                ?>
			</h1>
		</div>

		<div class="card-adress">
			<p class="card-adress__adress">
				Адрес
				<span><?php the_field('adres', 184);?></span>
			</p>
			<p class="card-adress__phone">
				Телефон
				<a href="<?php the_field('phone-site', 74);?>"><?php the_field('phone-site', 74);?></a>
			</p>
			<p class="card-adress__email">
				Email
				<a href="mailto"><?php the_field('email', 184);?> </a>
			</p>
		</div>
		<div id="map" class="map"></div>
	</section>
</main>

<?php

get_footer();