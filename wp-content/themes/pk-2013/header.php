<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="viewport" content="width=device-width" />

	<title><?php pk_header_titles(); ?></title>

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/styles/reset.css" />

	<?php 
//Necessary in <head> for JS and plugins to work. 
//I like it before style.css loads so the theme stylesheet is more specific than all others.
	wp_head();  ?>

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- HTML5 shiv -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>

	<div id="wrapper" class="clearfix"> 
		<header role="banner">
			<h1 class="site-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>" rel="home"> 
				<?php bloginfo('name'); ?> 
			</a>
		</h1>
			<h2 class="site-description"> <?php bloginfo('description'); ?> </h2>	
				
			<?php wp_nav_menu( array(
				'theme_location' => 'main_menu',
				'container' => 'nav',
			) ); ?>	

				
		</header>	