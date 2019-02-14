<?php 

function r_enqueue_scripts() {


	wp_enqueue_script(
		'r_main',
		plugins_url( '/assets/scripts/main.js', RECIPE_PLUGIN_URL ),
		array('jquery'),
		'1.0.0',
		false
	);

	wp_localize_script( 
		'r_main', 
		'survey_obj', 
		array(
		'ajax_url'	=>	admin_url( 'admin-ajax.php', 'http' ),
		'home_url'	=>	home_url('/')
	) 
	);

	wp_enqueue_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js', array('jquery'), '1.8.6');



	wp_register_style( 
		'ju_style',
		plugins_url( '/assets/styles/style.css', RECIPE_PLUGIN_URL )
	);

	wp_register_style( 
		'ju_bulma',
		plugins_url( '/assets/styles/style.css', RECIPE_PLUGIN_URL )
	);
	wp_enqueue_style( 'ju_style' );
	wp_enqueue_style( 'ju_bulma' );

}