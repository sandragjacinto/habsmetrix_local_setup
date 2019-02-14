<?php
// saves post created on admin

function r_save_post_admin( $post_id, $post, $update ){
	if( !$update ){
		return;
	}
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
	// die();
	$recipe_data                        =   array();
	$recipe_data['ingredients']         =   sanitize_text_field( $_POST['r_inputIngredients'] );
	$recipe_data['time']                =   sanitize_text_field( $_POST['r_inputTime'] );
	$recipe_data['utensils']            =   sanitize_text_field( $_POST['r_inputUtensils'] );
	$recipe_data['type']               	=   sanitize_text_field( $_POST['r_inputType'] );
	$recipe_data['min_value']           =   sanitize_text_field( $_POST['r_inputMinValue'] );
	$recipe_data['max_value']           =   sanitize_text_field( $_POST['r_inputMaxValue'] );
	$recipe_data['steps']           	=   sanitize_text_field( $_POST['r_inputStepSize'] );
	$recipe_data['rating']              =   0;
	$recipe_data['rating_count']        =   0;
	
	update_post_meta( $post_id, 'recipe_data', $recipe_data );
}