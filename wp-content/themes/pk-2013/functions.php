<?php
/**
 * @package WordPress
 * @subpackage pk
 * @since pk 0.1
 */

/**
 * Custom callback so custom background images are applied to the html tag instead of default body tag. 
 */
function change_custom_background_cb() {
	// $background is the saved custom image, or the default image.
	$background = set_url_scheme( get_background_image() );

	// $color is the saved custom color.
	// A default has to be specified in style.css. It will not be printed here.
	$color = get_theme_mod( 'background_color' );

	if ( ! $background && ! $color )
		return;

	$style = $color ? "background-color: #$color;" : '';

	if ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( 'background_repeat', 'repeat' );
		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';
		$repeat = " background-repeat: $repeat;";

		$position = get_theme_mod( 'background_position_x', 'left' );
		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';
		$position = " background-position: top $position;";

		$attachment = get_theme_mod( 'background_attachment', 'scroll' );
		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';
		$attachment = " background-attachment: $attachment;";

		$style .= $image . $repeat . $position . $attachment;
	}
	?>
	<style type="text/css" id="custom-background-css">
	html { <?php echo trim( $style ); ?> }
	</style>
	<?php
}


$defaults = array(
	'default-color'          => '302e38',
	'default-image'          => '',
	'wp-head-callback'       => 'change_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
	);
add_theme_support( 'custom-background', $defaults );


/**
 * Change header implementation to responsive/fluid css instead of img
 */
add_action('wp_head', 'pk_header_style');
function pk_header_style(){
	?> <style type="text/css">
	.home header[role=banner]{
		background-image: url(<?php header_image(); ?>);
		background-size: cover;
		background-position: center center;
	}</style> <?php
}
/** 
 * Turn on basic theme support, and menus
 * @since pk 0.1
 */
add_action( 'after_setup_theme', 'pk_setup' );
function pk_setup() {
	if ( ! isset( $content_width ) ) $content_width = 700;
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
	add_image_size( 'pk-small-tile', 400, 300, true );
	add_image_size( 'pk-tall-tile', 400, 500, true );
	add_image_size( 'pk-full', 1120, 290, true );

	add_theme_support( 'post-formats', array( 'image' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-menu'=> 'Primary Menu',
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
 * remove width and height from thumbs
 */
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	return $html;
}

/**
 * Remove Gallery inline CSS and <br> tags
 */
add_filter( 'use_default_gallery_style', '__return_false' );
//add_filter( 'the_content', 'remove_br_gallery', 11, 2);
function remove_br_gallery($output) {
    return preg_replace('/<br style=(.*)>/mi','',$output);
}

/**
 * better excerpt
 */
add_filter( 'excerpt_length', 'pk_excerpt_length' );
function pk_excerpt_length(){
	return 30;
}
//replace useless [...] at the end of excerpts with a button
function awesome_excerpt_more(){
	return '<a href="'.get_permalink().'" class="readmore button">Read More</a>';	
}
add_filter('excerpt_more', 'awesome_excerpt_more');


/**
 * Enqueues scripts and styles for front-end
 * pk_js_activation function is used to activate and register all of the Java Script used as well as activating css styles. -JJ
 * 
 * @since pk 0.1
 */
add_action( 'wp_enqueue_scripts', 'pk_js_activation' ); 
function pk_js_activation() {
	wp_enqueue_script( 'jquery' );
	$modernizr_path = get_template_directory_uri() . '/js/vendor/modernizr.js';
	wp_register_script( 'modernizrjs', $modernizr_path );
	wp_enqueue_script( 'modernizrjs' );
	wp_enqueue_script(
		'dotdotdot-js',
		get_template_directory_uri() . '/js/vendor/jquery.dotdotdot.min.js',
		array( 'jquery' ),
		false,
		true // loaded in the footer
		);
	wp_enqueue_script(
		'main-js',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery', 'dotdotdot-js' ),
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
		echo 'Search for &quot;'.esc_html($_GET['s']).'&quot; - '; 
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
/**
 * Add status names to post class
 */
add_filter('post_class', 'anthill_category_id_class');
function anthill_category_id_class($classes) {
	global $post;
    //every post gets a clearfix
	$classes[] = 'clearfix';    

   	//if it does not have a featured image, add the class  no-image
	if(!has_post_thumbnail($post->ID))
		$classes[] = "no-image";
	
	// add the status the class	
	if('project' == get_post_type($post->ID)){
		foreach(get_the_terms($post->ID, 'status') as $category){
			$classes[] = 'status-'.$category->slug;
		}
	}

    //all done!
	return $classes;
}

/**
 * Better post meta
 */
function pk_postmeta(){
	global $post;
	
	if(is_single() OR is_search() OR is_archive()): ?>
	<div class="postmeta clearfix"> 
		
		<span class="date alignleft"> Posted on <?php the_time('F j, Y'); ?> </span> 

		<span class="categories"> 
			<?php the_terms( $post->ID,'category', 'in ' ); ?>                
		</span>              
		<span class="tags alignright">
			<?php the_tags(); ?>
			
		</span> 
	</div><!-- end postmeta -->
<?php 
	endif; //is single 
	edit_post_link() ;
}

/**
 * Replacing the default WordPress search form with an HTML5 version
 *
 */
function html5_search_form( $form ) {
	$image = get_template_directory_uri().'/img/icon_30_search.png';
    $form = '<form role="search" method="get" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="assistive-text visually-hidden" for="s">' . __('Search for:') . '</label>
    <input type="search" placeholder="'.__("Enter term...").'" value="' . get_search_query() . '" name="s" id="s" />
    <input type="image" src="'.$image.'" id="searchsubmit" />
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'html5_search_form' );

