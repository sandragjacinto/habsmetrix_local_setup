<?php 

function r_filter_survey_multi_images( $content ) {
	global $post, $wpdb;

	$survey_type = get_field('type');

	if ( !($survey_type == 'MCI') ){
		return $content;
	}else{
		$survey_html = file_get_contents('survey-multiple-images.php', true);

		$survey_html = str_replace('QUESTION_PH', get_field("survey_question"), $survey_html);
		$survey_html = str_replace('QUESTION_I18N', __("Question", "core_metrix"), $survey_html);

		$nb_of_images = get_field("multi_images_number_of_images");
		$survey_html = str_replace('NUMBER_PH', $nb_of_images, $survey_html);
		$survey_html = str_replace('ID_PH', $post->ID, $survey_html);
		
		$survey_html = str_replace('IMAGE1_PH', get_field("multi_images_image_1"), $survey_html);
		$survey_html = str_replace('IMAGE2_PH', get_field("multi_images_image_2"), $survey_html);
		$survey_html = str_replace('IMAGE3_PH', get_field("multi_images_image_3"), $survey_html);
		$survey_html = str_replace('IMAGE4_PH', get_field("multi_images_image_4"), $survey_html);
		
		for ($y = 1; $y <= $nb_of_images ; $y++) {
			$hideNb = 'HIDDEN_' . $y . '_PH';
			$survey_html 	= str_replace($hideNb, 'checkbox', $survey_html);
		}
		if($nb_of_images !== "4"){
			for ($nb = $nb_of_images; $nb <= 4 ; $nb++) {
				$hideNb = 'HIDDEN_' . $nb . '_PH';
				$survey_html 	= str_replace($hideNb, 'hidden', $survey_html);
			}
		}
	}


	$user_IP		= $_SERVER['REMOTE_ADDR'];
	$user_ID			= get_current_user_id();
	$user_logged_in		= is_user_logged_in();

	if ($user_logged_in) {
		$rating_count 	= $wpdb->get_var(
			"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
		);

		$rating_val	= $wpdb->get_var(
			"SELECT answer FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
		);
	}else{
		$rating_count 	= $wpdb->get_var(
			"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
		);

		$rating_val	= $wpdb->get_var(
			"SELECT answer FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
		);
	}

	if($rating_count > 0){ //if already answered
		$survey_html	= str_replace( "HIDDEN_ANSWER_PH", '', $survey_html );//shows answer
		if (is_user_logged_in()) {
			$survey_html	= str_replace( "HIDDEN_SURVEY", '', $survey_html );
		}else{
			$survey_html	= str_replace( "HIDDEN_SURVEY", 'hidden', $survey_html );
		}

		$answers_array		= [];
		for ($x = 1; $x <= $nb_of_images ; $x++) {
			$rate = $wpdb->get_var("SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND answer='" . 'image_' . $x . "'");
			array_push($answers_array, $rate);
		}

		$total_entries 	= $wpdb->get_var(
			"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "'"
		);

		$percentages_array = [];
		for ($pc = 1; $pc <= $nb_of_images ; $pc++) {
			array_push($percentages_array, round(($answers_array[$pc-1]*100)/$total_entries));
		}
	
		//display user answer
		$survey_html 	= str_replace('IMAGE_ANSWER_PH', get_field("multi_images_" . $rating_val), $survey_html);

		// loop to show all answers data
		for ($y = 1; $y <= $nb_of_images ; $y++) {
			$hideNb = 'HIDDEN_ANS' . $y . '_PH';
			$countNb = 'IM' . $y . 'PH';
			$survey_html 	= str_replace(array($hideNb, $countNb), array('', $percentages_array[$y-1] ), $survey_html);
		}
		// loop to hide unnecessary elements
		if($nb_of_images !== "4"){
			for ($nb = $nb_of_images; $nb <= 4 ; $nb++) {
				$hideNb = 'HIDDEN_ANS' . $nb . '_PH';
				$countNb = 'IM' . $nb . 'PH';
				$survey_html 	= str_replace(array($hideNb, $countNb), array('hidden', '' ), $survey_html);
			}
		}
		
	}else{
		$survey_html	= str_replace( "HIDDEN_ANSWER_PH", 'hidden', $survey_html );
		$survey_html	= str_replace( "HIDDEN_SURVEY", '', $survey_html );
	}

	return $survey_html . $content;
		
		
}

