<?php
/**
 * Nutrigen functions and definitions
 *
 * @package Nutrigen
 */

if ( ! function_exists( 'nutrigen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function nutrigen_setup() {
	
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'nutrigen', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('nutrigen-homepage-thumb',true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'nutrigen' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
	
	add_filter('use_widgets_block_editor', '__return_false');
	
	/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
	
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
	add_editor_style( array( 'editor-style.css', nutrigen_font_url() ) );
}
endif; // nutrigen_setup
add_action( 'after_setup_theme', 'nutrigen_setup' );


function nutrigen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'nutrigen' ),
		'description'   => __( 'Appears on blog page sidebar', 'nutrigen' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'nutrigen_widgets_init' );

function nutrigen_font_url(){
		$font_url = '';
		
		/* Translators: If there are any character that are
		* not supported by Montserrat, translate this to off, do not
		* translate into your own language.
		*/
		$mont = _x('on', 'Montserrat font:on or off','nutrigen');
		
		/* Translators: If there are any character that are
		* not supported by Sintony, translate this to off, do not
		* translate into your own language.
		*/
		$sintony = _x('on', 'Sintony font:on or off','nutrigen');
		
		
		if('off' !== $mont || 'off' !== $sintony){
			$font_family = array();

			if('off' !== $mont){
				$font_family[] = 'Montserrat:400,600,700';
			}
			
			if('off' !== $sintony){
				$font_family[] = 'Sintony:400,600,700';
			}
			
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'https://fonts.googleapis.com/css');
		}
		
	return $font_url;
	}

function nutrigen_scripts() {
	wp_enqueue_style( 'nutrigen-font', nutrigen_font_url(), array() );
	wp_enqueue_style( 'nutrigen-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'nutrigen-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );
	wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/css/nivo-slider.css');
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/css/font-awesome.css' );	
	wp_enqueue_script( 'jquery-nivo-slider-js', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'nutrigen-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nutrigen_scripts' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function nutrigen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'nutrigen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Load customize pro
 */
require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );
