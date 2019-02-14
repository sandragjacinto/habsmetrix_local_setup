<?php 

function habsmetrix_admin_init() {
	// include( 'create-metaboxes.php' );
	// include( 'recipe-options.php' );
	// include( 'enqueue.php' );
	include('columns.php');
	include('title.php');

	// add_action( 'add_meta_boxes_recipe', 'r_create_metaboxes');
	// add_action( 'admin_enqueue_scripts', 'r_admin_enqueue' );
	add_filter( 'manage_core_metrix_posts_columns', 'r_add_new_recipe_columns' );
	add_filter( 'enter_title_here', 'r_add_new_title_placeholder', 20, 2 );

	add_action('manage_core_metrix_posts_custom_column', 'r_manage_recipe_columns', 10, 2);
	
	
}