<?php

// saves the rating into the database and calculates average
// TODO calculate z-index, gather time & post type

function r_rate_survey() {
	
	global $wpdb;
	$table_name = $wpdb->prefix . 'survey_ratings';


	$output			= array('status' => 1);
	$post_id		= absint($_POST['rid']);
	$type			= $_POST['type'];
	
	if (is_array($_POST['rating'])){
		$rating_array		= serialize($_POST['rating']);
		$rating				= '-';
	}else{
		$rating_array		= serialize('-');
		$rating				= $_POST['rating'];
	}
	
	$user_IP		= $_SERVER['REMOTE_ADDR'];
	$postdate		= date("Y-m-d h:i:sa");
	$user_ID		= get_current_user_id();

	$rating_count 	= $wpdb->get_var(
		"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post_id . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
	);
	
	// check if user answered and is logged in
	if($rating_count > 0 && !is_user_logged_in()) {
		wp_send_json( $output );
	} elseif ($rating_count > 0 && is_user_logged_in()) { //if logged in update data
		$entry_ID	= $wpdb->get_var(
			"SELECT ID FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post_id . "' AND user_id='" . $user_ID . "'"
		);

		$wpdb->update( 
			$table_name, 
			array( 
				'answer' => $rating, 
				'answer_array'	=> $rating_array,
				'date' => $postdate
			), 
			array( 
				'ID' => $entry_ID ,
				'user_id'	=> $user_ID
			),
			array( '%s', '%s' ), array( '%d', '%d' ) );
			
			$output['status']		= 2;
			wp_send_json( $output );
	};

	

// insert data into database
	$wpdb->insert(
		$table_name,
		array(
			'survey_id'		=> $post_id,
			'survey_type'	=> $type,
			'date'			=> $postdate,
			'answer'		=> $rating,
			'answer_array'	=> $rating_array,
			'user_ip'		=> $user_IP,
			'user_id'		=> $user_ID
		)
	);

	$output['status']		= 2;
	wp_send_json( $output );
};