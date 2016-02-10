<?php
/**
 * qwertyuiop functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package qwertyuiop
 */

if ( ! function_exists( 'qwertyuiop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function qwertyuiop_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on qwertyuiop, use a find and replace
	 * to change 'qwertyuiop' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'qwertyuiop', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 350, 230, true );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'qwertyuiop' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'qwertyuiop_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'qwertyuiop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function qwertyuiop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'qwertyuiop_content_width', 640 );
}
add_action( 'after_setup_theme', 'qwertyuiop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function qwertyuiop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'qwertyuiop' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__('Footer left widget', 'qwertyuiop'),
		'id'            => 'footer_widget_col_1',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__('Footer center widget', 'qwertyuiop'),
		'id'            => 'footer_widget_col_2',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__('Footer left widget', 'qwertyuiop'),
		'id'            => 'footer_widget_col_3',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// register_widget( 'LawyeriaX_About_Us' );
	// register_widget( 'Foo_Widget' );
}
add_action( 'widgets_init', 'qwertyuiop_widgets_init' );

//Custom widgets
// require get_template_directory() . "/widgets/about-us.php";
// require get_template_directory() . "/widgets/trial.php";

/**
 * Enqueue scripts and styles.
 */
function qwertyuiop_scripts() {
	wp_enqueue_style( 'qwertyuiop-style', get_stylesheet_uri(), array('qwertyuiop-boostrap-css') );

	wp_enqueue_style ( 'qwertyuiop-boostrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'v3.3.6', 'all' );

	wp_enqueue_script( 'wertyuiop-boostrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20130115', true );

	wp_enqueue_script( 'qwertyuiop-navigation', get_template_directory_uri() . '/js/functions.js', array(), '20120206', true );

	wp_enqueue_script( 'qwertyuiop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_style( 'qwertyuiop-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), 'v4.5.0', false );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'qwertyuiop_scripts' );


function repeater_customizer_script() {

	wp_enqueue_style( 'qwertyuiop-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), 'v4.5.0', false );

	wp_enqueue_script( 'lawyeriax_ddslick', get_template_directory_uri() .'/js/jquery.ddslick.js', array("jquery"),'1.0.0', true  );

	wp_enqueue_script( 'repeater_customizer_script', get_template_directory_uri() . '/js/lawyeriax_lite_customizer.js', array("jquery","jquery-ui-draggable","lawyeriax_ddslick"),'1.0.0', true);

}
add_action( 'customize_controls_enqueue_scripts', 'repeater_customizer_script' );

function lawyeriax_fonts_url() {
	$fonts_url = '';
	/* Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$playfair_display = _x( 'on', 'Playfair Display font: on or off', 'lawyeriax-lite' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'lawyeriax-lite' );
	if( 'off' !== $playfair_display || 'off' !== $open_sans ){
		$font_families = array();
		if( 'off' !== $playfair_display ){
			$font_families[] = 'Playfair Display:400,700';
		}
		if( 'off' !== $open_sans ){
			$font_families[] = 'Open Sans:400,300,600,700';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
function lawyeriax_scripts_styles() {
	wp_enqueue_style( 'lawyeriax-fonts', lawyeriax_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'lawyeriax_scripts_styles' );

/**
 * Enqueue admin style.
 */
function qwertyuiop_admin_styles() {
	wp_enqueue_style( 'qwertyuiop_admin_stylesheet', get_template_directory_uri() . '/css/admin-style.css', '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'qwertyuiop_admin_styles', 10 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Frontpage sections
 */
require get_template_directory() . '/inc/frontpage-sections.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';