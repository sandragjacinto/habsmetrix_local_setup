<?php 

function r_filter_statement_of_the_day( $content ) {
	// global $post, $wpdb;

	// $post_id = $post->ID;

	// $survey_type = get_field('type', $post_id);

	// if ( !($survey_type == 'STATEMENT') ){
	// 	return $content;
	// }else{
	// 	$survey_html = file_get_contents('statement-of-the-day.php', true);

	// 	$survey_html = str_replace('STATEMENT_PH', get_field("survey_question"), $survey_html);
	// 	$survey_html = str_replace('AUTHOR_PH', get_the_author(), $survey_html);
	// 	$survey_html = str_replace('IRRELEVANT_ICON_PH', plugin_dir_url(__FILE__) . 'img/irrelevantIcon.png', $survey_html);
	// 	$survey_html = str_replace('RELEVANT_ICON_PH', plugin_dir_url(__FILE__) . 'img/relevantIcon.png', $survey_html);
	// 	$survey_html = str_replace('LABEL1_I18N', 'Nope', $survey_html);
	// 	$survey_html = str_replace('LABEL2_I18N', 'Meh', $survey_html);
	// 	$survey_html = str_replace('LABEL3_I18N', 'Yeah...', $survey_html);
	// 	$survey_html = str_replace('LABEL4_I18N', 'Totally', $survey_html);
	// 	$survey_html = str_replace('ID_PH', $post->ID, $survey_html);
	
	// }


	// $user_IP		= $_SERVER['REMOTE_ADDR'];
	// $user_ID			= get_current_user_id();
	// $user_logged_in		= is_user_logged_in();

	// if ($user_logged_in) {
	// 	$rating_count 	= $wpdb->get_var(
	// 		"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
	// 	);

	// 	$rating_val	= $wpdb->get_var(
	// 		"SELECT answer FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
	// 	);
	// }else{
	// 	$rating_count 	= $wpdb->get_var(
	// 		"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
	// 	);

	// 	$rating_val	= $wpdb->get_var(
	// 		"SELECT answer FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
	// 	);
	// }

	// if($rating_count > 0){
		
	// 	$data['average'] = round($wpdb->get_var(
	// 		"SELECT AVG(`answer`) FROM `" . $wpdb->prefix . "survey_ratings`  WHERE survey_id='" . $post->ID . "'"
	// 	), 1);

	// 	if ($user_logged_in){
	// 		$survey_html 	= str_replace('HIDDEN_SURVEY', '', $survey_html);
	// 	} else {
	// 		$survey_html 	= str_replace('HIDDEN_SURVEY', 'hidden', $survey_html);
	// 	}
	// 	$survey_html 	= str_replace('HIDDEN_ANSWER_PH', '', $survey_html);
	// 	$survey_html 	= str_replace('ANSWER_VAL_PH', $rating_val, $survey_html);
	// 	$survey_html 	= str_replace('MEAN_VAL_PH', $data['average'], $survey_html);
	// 	$survey_html 	= str_replace('VALUE_PH',  $rating_val, $survey_html);

	
	// }else{
	// 	$survey_html 	= str_replace('HIDDEN_ANSWER_PH', 'hidden', $survey_html);
	// 	$survey_html = str_replace('VALUE_PH', get_field("range_min_value"), $survey_html);

	// }


	// return $survey_html . $content;
		
		
}