<?php 
/*
Plugin Name: Custom Post Types
Description: Adds the CPT stuff for projects, etc
Author: Melissa Cabral
Version: 0.1
*/

/**
 * Set up the post type in the admin panel
 * @since 0.1
 */
add_action( 'init', 'mmc_register_post_type' );
function mmc_register_post_type(){
	$proj_icon = plugins_url( 'img/icon-project.png', __FILE__ );
	register_post_type( 'project', array(
		'has_archive' => true,
		'public' => true,
		'description' => 'These are projects for the catalog',
		'rewrite' => array( 'slug' => 'projects' ),
		'labels' => array(
			'name' => 'Projects',
			'singular_name' => 'Project',
			'add_new_item' => 'Add New project',
			'edit_item' => 'Edit project',
		),
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 
			'custom-fields', 'revisions' ),
		'menu_icon' => $proj_icon,
	) );

	//add "brand" sorting to our projects
	register_taxonomy( 'status', 'project', array(
		'hierarchical' => true, //act like categories
		'rewrite' => array( 'slug' => 'status' ),
		'labels' => array( 
			'name' => 'Statuses',
			'singular-name' => 'Status',
			'add_new_item' => 'Add New Status',
		),
	) );
	//add "feature" sorting to our projects
	register_taxonomy( 'project-tag', 'project', array(
		'hierarchical' => false, //act like categories
		'rewrite' => array( 'slug' => 'project-tags' ),
		'labels' => array( 
			'name' => 'project-tags',
			'singular-name' => 'project tag',
			'add_new_item' => 'Add New project tag',
		),
	) );
	//CHARACTERS
	$char_icon = plugins_url( 'img/icon-character.png', __FILE__ );
	register_post_type( 'character', array(
		'has_archive' => true,
		'public' => true,
		'description' => 'Bio Pages for Paulkaiju Characters',
		'rewrite' => array( 'slug' => 'characters' ),
		'labels' => array(
			'name' => 'Characters',
			'singular_name' => 'Character',
			'add_new_item' => 'Add New Character',
			'edit_item' => 'Edit Character',
		),
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 
			'custom-fields', 'revisions' ),
		'menu_icon' => $char_icon,
	) );
}

/**
 * Flush Rewrite Rules - Fix 404 errors when the plugin activates
 * @since 0.1
 */
function mmc_flush(){
	mmc_register_post_type();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'mmc_flush' );