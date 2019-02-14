<?php 

function r_admin_enqueue() {
	global $typenow;
	if($typenow != "core_metrix") {
		return;
	}


	wp_register_style( 
		'ju_bootstrap',
		plugins_url( '/assets/styles/bootstrap.css', RECIPE_PLUGIN_URL )
	);

	wp_enqueue_style( 'ju_bootstrap' );
}