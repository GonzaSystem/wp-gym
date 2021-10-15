<?php

// Reusable queries
require get_template_directory() . '/inc/queries.php';
require get_template_directory() . '/inc/shortcodes.php';

// When the theme is activated
function gymfitness_setup() {
	// Enable featured images
	add_theme_support('post-thumbnails');

	// Add multiple custom sized images
	add_image_size( 'square', 350, 350, true );
	add_image_size( 'portrait', 350, 724, true );
	add_image_size( 'boxes', 400, 375, true );
	add_image_size( 'customMedium', 700, 400, true );
	add_image_size( 'blog', 966, 644, true );
	// Regenerate thumbnails is a plugin in case we modify/add new image sizes and we need to update the current ones at the server

	// SEO for titles
	add_theme_support( 'title-tag' );
}
add_action('after_setup_theme', 'gymfitness_setup');

// Nav menus, add more using the current array
function gymfitness_menu() {
	register_nav_menus(array(
		'main-menu' => __( 'Menu Principal', 'gymfitness' ),
	));
}
add_action( 'init', 'gymfitness_menu' );

// Scripts & Styles
function gymfitness_scripts_styles() {
	// Styles
	// Normalize
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1' );

	// Slicknav
	wp_enqueue_style( 'slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0' );

	// Google fonts
	wp_enqueue_style( 'googleFont', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital@0;1&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), null );

	if( is_page( 'galeria' ) ) :
		wp_enqueue_style( 'lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.3' );
	endif;

	if( is_page( 'contacto' ) ) :
		wp_enqueue_style( 'leafletCSS', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css', array(), '1.7.1' );
	endif;

	if( is_page( 'inicio' ) ) :
		wp_enqueue_style( 'bxSliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12' );
	endif;

	// Main styles
	wp_enqueue_style( 'style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0' );

	// Scripts
	//Slicknav
	wp_enqueue_script( 'slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true );

	// Custom scripts
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slicknavJS'), '1.0.0', true );

	// Lightbox
	if( is_page( 'galeria' ) ) :
		wp_enqueue_script( 'lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.3', true );
	endif;

	if( is_page( 'contacto' ) ) :
		wp_enqueue_script( 'leafletJS', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', array(), '1.7.1', true );
	endif;

	if( is_page( 'inicio' ) ) :
		wp_enqueue_script( 'bxSliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true );
	endif;
}
add_action( 'wp_enqueue_scripts', 'gymfitness_scripts_styles' );

// Enable/define widgets
function gymfitness_widgets() {
	register_sidebar( array(
		'name' => 'Sidebar 1',
		'id' => 'sidebar-1',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="text-center primary-text">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Sidebar 2',
		'id' => 'sidebar-2',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="text-center primary-text">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'gymfitness_widgets' );

// Hero img
function gymfitness_hero_image() {
	// get main page id
	$front_page_id = get_option( 'page_on_front' );

	// Get that main page image id
	$image_id = get_field( 'hero_image', $front_page_id );

	$image = wp_get_attachment_image_src( $image_id, 'full' )[0];

	// creating injected CSS
	wp_register_style( 'custom', false );
	wp_enqueue_style( 'custom' );

	// adding the classes
	$hero_image_css = "
		body.home .site-header {
			background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75) ), url($image);
		}
	";

	wp_add_inline_style( 'custom', $hero_image_css);
}
add_action( 'init', 'gymfitness_hero_image' );