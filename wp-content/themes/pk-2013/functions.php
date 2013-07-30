<?php
/**
 * @package WordPress
 * @subpackage pk
 * @since pk 0.1
 */

add_action('wp_head', 'pk_header_style');
function pk_header_style(){
	?> <style type="text/css">
    header[role=banner]{
    background-image: url(<?php header_image(); ?>);
    background-size: cover;
        }</style> <?php
}
/** 
 * Turn on basic theme support, and menus
 * @since pk 0.1
 */
add_action( 'after_setup_theme', 'pk_setup' );
function pk_setup() {
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	$header_args = array(
		'default-text-color' => '#eae7db',
		'default-image' => get_template_directory_uri() . '/img/default-header.png',
		'flex-height'  => true,
		'flex-width'  => true,
	);
	add_theme_support( 'custom-header', $header_args );
	add_theme_support( 'custom-background' );
	
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	
	//image sizes
	add_image_size( 'pk-small-tile', 220, 160, true );
	add_image_size( 'pk-full', 1000, 280, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-menu'=> 'Primary Menu',
		'utility-menu' => 'Utility Menu',
		'footer-menu' =>'Footer Menu',
		));	

	//widget areas
	
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => 'A narrow sidebar below the top sidebar',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
		'before_widget' => '<section class="widget %2$s" id="%1$s">',
		'after_widget' => '</section>',
		) );
	
	register_sidebar( array(
		'name' => 'Footer Area',
		'id' => 'footer-area',
		'description' => 'The Footer area at the bottom of every page',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
		'before_widget' => '<section class="widget %2$s" id="%1$s">',
		'after_widget' => '</section>',
		) );


	 if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}


/**
 * Enqueues scripts and styles for front-end
 * pk_js_activation function is used to activate and register all of the Java Script used as well as activating css styles. -JJ
 * 
 * @since pk 0.1
 */
add_action( 'wp_enqueue_scripts', 'pk_js_activation' ); 
function pk_js_activation() {
    wp_enqueue_script( 'jquery' );
	$modernizr_path = get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js';
    wp_register_script( 'modernizrjs', $modernizr_path );
    wp_enqueue_script( 'modernizrjs' );

    wp_enqueue_script(
		'main-js',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery' ),
		false,
		true // loaded in the footer
	);
	
	wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'normalize' );
}

/** 
 * Makes <title> pretty, more logical and SEO friendlier
 * @since pk 0.1
 *
 * Based on http://perishablepress.com/how-to-generate-perfect-wordpress-title-tags-without-a-plugin/
 * This gets called on header.php
 */
function pk_header_titles() {
	if (function_exists('is_tag') && is_tag()) { 
		echo 'Tag Archive for &quot;'.$tag.'&quot; - '; 
	} elseif (is_archive()) { 
		wp_title(''); echo ' Archive - '; 
	} elseif (is_search()) { 
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; 
	} elseif (!(is_404()) && (is_single()) || (is_page())) { 
		wp_title(''); echo ' - '; 
	} elseif (is_404()) { 
		echo 'Not Found - '; 
	} if (is_home()) { 
		bloginfo('name'); 
		echo ' - '; 
		bloginfo('description'); 
	} else {
		bloginfo('name'); 
	}
}
