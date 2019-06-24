
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header" style="background-image:url(<?php the_field('bg-header', 74);?>)">

<div class="row-header"  style="background-image:url(<?php the_field('photo-header', 74);?>)">
	<div class="container">

		<div class="header__topLine">
			<a href="<?php echo home_url() ?>" class="logo" style="background-image:url(<?php the_field('logo', 74);?>)"></a>
			<button class="burger">
				<span class="burger__line"></span>
				<span class="burger__line"></span>
				<span class="burger__line"></span>
			</button>
			<a href="tel:<?php the_field('phone-site', 74);?>" class="phone">
				<?php the_field('phone-site', 74);?>
			</a>
			<nav class="nav">
				<a href="#1" class="nav__link">О пилатесе</a>
				<a href="#2"class="nav__link">Расписание и стоимость</a>
				<a href="#3" class="nav__link">О системе занятий</a>
				<a href="#4" class="nav__link">Контакты</a>
			</nav>
		</div>

		<div class="header__content" >
			<h1 class="header__title">
				<?php the_field('title-site', 74);?>
			</h1>
			<p class="header__desc">
				<?php the_field('description-site', 74);?>
			</p>
			<a href="#2" class="btn">
				<p class="btn__text">Смотреть расписание</p>
				<div class="wrapper__arrow">
					<div class="btn__arrow">
						<span class="btn__arrowBase"></span>
					</div>
				</div>
			</a>
		</div>
	</div>

</div>
</header>
