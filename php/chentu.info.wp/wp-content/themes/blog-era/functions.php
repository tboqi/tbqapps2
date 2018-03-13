<?php
/**
 * Blog Era functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blog_Era
 */

if ( ! function_exists( 'blog_era_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
function blog_era_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Blog Era, use a find and replace
		 * to change 'blog-era' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'blog-era', get_template_directory() . '/languages' );

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
		add_image_size('blog-era-slider', 750, 513, true);
		add_image_size('blog-era-custom', 360, 239, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' 		=> esc_html__( 'Primary', 'blog-era' ),
			'top-menu' 		=> esc_html__( 'Top Menu', 'blog-era' ),
			'social-menu' 	=> esc_html__( 'Social Menu', 'blog-era' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'blog_era_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
			) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			) );
	}
	endif;
	add_action( 'after_setup_theme', 'blog_era_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blog_era_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blog_era_content_width', 640 );
}
add_action( 'after_setup_theme', 'blog_era_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_era_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blog-era' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'blog-era' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
		) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'blog-era' ), 1 ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
		) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'blog-era' ), 2 ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
		) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'blog-era' ), 3 ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
		) );
}
add_action( 'widgets_init', 'blog_era_widgets_init' );

/**
 * Register custom fonts.
 */
function blog_era_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$Oxygen = _x( 'on', 'Oxygen font: on or off', 'blog-era' );

	if ( 'off' !== $Oxygen ) {
		$font_families = array();

		$font_families[] = 'Oxygen:300,400,500,600,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
			);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function blog_era_scripts() {

	$fonts_url = blog_era_fonts_url();	
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'blog-era-google-fonts', $fonts_url, array(), null );}

	// Load fontawesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.7.0' );	

	// Owl Carousel Css
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.css', array(), '1.0.0' );

	// Owl theme default Css
	wp_enqueue_style( 'owl-default-min', get_template_directory_uri() .'/assets/css/owl.theme.default.min.css', array(), '1.0.0' );	
	// Meanmenu Css
	wp_enqueue_style( 'meanmenu-css', get_template_directory_uri().'/assets/css/meanmenu.css', array(), '1.0.0' );

	wp_enqueue_style( 'blog-era-style', get_stylesheet_uri() );
		add_editor_style( get_stylesheet_uri() );

	// Load owl carousel
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.js', array('jquery'), false, true );

	// Load meanmenu
	wp_enqueue_script( 'meanmenu', get_template_directory_uri().'/assets/js/jquery.meanmenu.js', array('jquery'), false, true );

	//ResizeSensor
	wp_enqueue_script( 'ResizeSensor', get_template_directory_uri().'/assets/js/ResizeSensor.min.js', array('jquery'), false, true );

	//thei sticky sidebar
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri().'/assets/js/theia-sticky-sidebar.min.js', array('jquery'), false, true );		

	wp_enqueue_script( 'blog-era-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'blog-era-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'blog-era-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blog_era_scripts' );

/**
 * Include Function
 */
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';

