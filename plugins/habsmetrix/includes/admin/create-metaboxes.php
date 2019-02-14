<?php 

function r_create_metaboxes(){
	add_meta_box( 
		'r_recipe_options_mb', 
		__('Poll Options', 'recipe'), 
		'r_poll_options_mb',
		'recipe',
		'normal',
		'high'
		);
}