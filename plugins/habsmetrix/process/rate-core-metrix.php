<?php

// saves the rating into the database and calculates average
// TODO calculate z-index, gather time & post type

// function r_rate_core_metrix() {
	
// 	global $wpdb;
// 	$table_name = $wpdb->prefix . core_metrix_ratings;


// 	$output			= array('status' => 1);
// 	$post_id		= absint($_POST['rid']);
// 	$rating			= round($_POST['rating'], 1);
// 	$type			= $_POST['type'];
// 	$user_IP		= $_SERVER['REMOTE_ADDR'];
// 	$postdate		= date("Y-m-d h:i:sa");
// 	$user_ID		= get_current_user_id();

// 	$rating_count 	= $wpdb->get_var(
// 		"SELECT COUNT(*) FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_id='" . $post_id . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
// 	);

// 	if($rating_count > 0 && !is_user_logged_in()) {
// 		wp_send_json( $output );
// 	} 

// // insert data into database
// 	$wpdb->insert(
// 		$table_name,
// 		array(
// 			'poll_id'		=> $post_id,
// 			'poll_type'		=> $type,
// 			'date'			=> $postdate,
// 			'rating'		=> $rating,
// 			'user_ip'		=> $user_IP,
// 			'user_id'		=> $user_ID
// 		),
// 		array('%d', '%s', '%s', '%s', '%s', '%d')
// 	);

// // update meta data
// 	$data['counter']	= get_post_meta($post_id, 'counter', true);
// 	$data['counter']++;
// 	$data['average'] = round($wpdb->get_var(
// 		"SELECT AVG(`rating`) FROM `" . $wpdb->prefix . "core_metrix_ratings`  WHERE poll_id='" . $post_id . "'"
// 	), 1);

// 	update_post_meta($post_id, 'counter', $recipe_data['counter']);
// 	update_post_meta($post_id, 'average', $recipe_data['average']);

// 	$output['status']		= 2;
// 	wp_send_json( $output );
// };