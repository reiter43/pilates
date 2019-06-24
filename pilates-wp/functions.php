<?php
/**
 * pilates functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pilates
 */

if (!function_exists('pilates_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pilates_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pilates, use a find and replace
		 * to change 'pilates' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('pilates', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Поддержка превью картинок постов
		 */
		add_theme_support('post-thumbnails');

		/*
		 * Подключение поля штатного логотипа
		 */
		add_theme_support('custom-logo');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'menu-1' => esc_html__('Primary', 'pilates'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('pilates_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'pilates_setup');

/*
Настройки темы кастомные
*/////////////////////////////////////////////////////////////////////

## Удаление табов "Все рубрики" и "Часто используемые" из метабоксов рубрик (таксономий) на странице редактирования записи.
add_action('admin_print_footer_scripts', 'hide_tax_metabox_tabs_admin_styles', 99);
function hide_tax_metabox_tabs_admin_styles(){
	$cs = get_current_screen();
	if( $cs->base !== 'post' || empty($cs->post_type) ) return; // не страница редактирования записи
	?>
	<style>
		.postbox div.tabs-panel{ max-height:1200px; border:0; }
		.category-tabs{ display:none; }
	</style>
	<?php
}
## Добавляет миниатюры записи в таблицу записей в админке
if(1){
	add_action('init', 'add_post_thumbs_in_post_list_table', 20 );
	function add_post_thumbs_in_post_list_table(){
		// проверим какие записи поддерживают миниатюры
		$supports = get_theme_support('post-thumbnails');
 
		// $ptype_names = array('post','page'); // указывает типы для которых нужна колонка отдельно
 
		// Определяем типы записей автоматически
		if( ! isset($ptype_names) ){
			if( $supports === true ){
				$ptype_names = get_post_types(array( 'public'=>true ), 'names');
				$ptype_names = array_diff( $ptype_names, array('attachment') );
			}
			// для отдельных типов записей
			elseif( is_array($supports) ){
				$ptype_names = $supports[0];
			}
		}
 
		// добавляем фильтры для всех найденных типов записей
		foreach( $ptype_names as $ptype ){
			add_filter( "manage_{$ptype}_posts_columns", 'add_thumb_column' );
			add_action( "manage_{$ptype}_posts_custom_column", 'add_thumb_value', 10, 2 );
		}
	}
 
	// добавим колонку
	function add_thumb_column( $columns ){
		// подправим ширину колонки через css
		add_action('admin_notices', function(){
			echo '
			<style>
				.column-thumbnail{ width:80px; text-align:center; }
			</style>';
		});
 
		$num = 1; // после какой по счету колонки вставлять новые
 
		$new_columns = array( 'thumbnail' => __('Thumbnail') );
 
		return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
	}
 
	// заполним колонку
	function add_thumb_value( $colname, $post_id ){
		if( 'thumbnail' == $colname ){
			$width  = $height = 45;
 
			// миниатюра
			if( $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true ) ){
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
			}
			// из галереи...
			elseif( $attachments = get_children( array(
				'post_parent'    => $post_id,
				'post_mime_type' => 'image',
				'post_type'      => 'attachment',
				'numberposts'    => 1,
				'order'          => 'DESC',
			) ) ){
				$attach = array_shift( $attachments );
				$thumb = wp_get_attachment_image( $attach->ID, array($width, $height), true );
			}
 
			echo empty($thumb) ? ' ' : $thumb;
		}
	}
}
/***************************************************************************************************** */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pilates_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('pilates_content_width', 640);
}
add_action('after_setup_theme', 'pilates_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pilates_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'pilates'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'pilates'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'pilates_widgets_init');

/**
 * Подключение стилей и скриптов
 */
function pilates_scripts()
{

	wp_enqueue_style('pilates-style', get_stylesheet_uri());

	wp_enqueue_script('pilates-map', 'https://api-maps.yandex.ru/2.1/?apikey=549ec0f9-2d60-4f5b-a62d-42e505e1b805&lang=ru_RU', array(), '', true);
	wp_enqueue_script('pilates-owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true);
	wp_enqueue_script('pilates-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '', true);

	// wp_enqueue_script( 'pilates-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action('wp_enqueue_scripts', 'pilates_scripts');


/* Регистрация нового типа записи
* (слайдер с отзывами)
*/

add_action('init', 'registerPost');

function registerPost()
{

	register_post_type('review', array(
		'labels'             => array(
			'name'               => 'Отзывы в слайдере', // Основное название типа записи
			'singular_name'      => 'Отзыв', // отдельное название записи 
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый отзыв',
			'edit_item'          => 'Редактировать отзыв',
			'new_item'           => 'Новый отзыв',
			'view_item'          => 'Посмотреть отзыв',
			'search_items'       => 'Найти отзыв',
			'not_found'          =>  'Отзывов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Отзывы'

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title', 'thumbnail')
	));
}
/* Регистрация нового типа записи
* (расписание и стоимость)
*/

add_action('init', 'registerPrice');

function registerPrice()
{

	register_post_type('price', array(
		'labels'             => array(
			'name'               => 'Тарифы', // Основное название типа записи
			'singular_name'      => 'Тариф', // отдельное название записи 
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый тариф',
			'edit_item'          => 'Редактировать тари',
			'new_item'           => 'Новый тариф',
			'view_item'          => 'Посмотреть тариф',
			'search_items'       => 'Найти тариф',
			'not_found'          =>  'Тарифов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Расписание и стоимость'

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			=> 'dashicons-backup',
		'supports'           => array('title', 'editor', 'thumbnail')
	));
}

/* Создание определенного размера картинок для отзывов*/

if (function_exists('add_image_size')) {
	add_image_size('review-slider', 185, 180, true);
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
