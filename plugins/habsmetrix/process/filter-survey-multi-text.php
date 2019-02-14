<?php 

function r_filter_survey_multi_text( $content ) {
	global $post, $wpdb;

	$survey_type = get_field('type');

	if ( !($survey_type == 'MCT') ){
		return $content;
	}else{
		$survey_html = file_get_contents('survey-multiple-text.php', true);

		$survey_html = str_replace('QUESTION_PH', get_field("survey_question"), $survey_html);
		$survey_html = str_replace('QUESTION_I18N', __("Question", "core_metrix"), $survey_html);

		$nb_of_answers = get_field("multi_text_number_of_answers");
		$survey_html = str_replace('NUMBER_PH', $nb_of_answers, $survey_html);
		$survey_html = str_replace('ID_PH', $post->ID, $survey_html);
		
		$survey_html = str_replace('ANSWER_1_PH', get_field("multi_text_answer_1"), $survey_html);
		$survey_html = str_replace('ANSWER_2_PH', get_field("multi_text_answer_2"), $survey_html);
		$survey_html = str_replace('ANSWER_3_PH', get_field("multi_text_answer_3"), $survey_html);
		$survey_html = str_replace('ANSWER_4_PH', get_field("multi_text_answer_4"), $survey_html);
		

		switch($nb_of_answers){
			case "1":
			$survey_html = str_replace(array('HIDDEN_1_PH', 'HIDDEN_2_PH', 'HIDDEN_3_PH', 'HIDDEN_4_PH'), array('','hidden', 'hidden', 'hidden'), $survey_html);
			break;
			case "2":
			$survey_html = str_replace(array('HIDDEN_1_PH', 'HIDDEN_2_PH', 'HIDDEN_3_PH', 'HIDDEN_4_PH'), array('','', 'hidden', 'hidden'), $survey_html);
			break;
			case "3":
			$survey_html = str_replace(array('HIDDEN_1_PH', 'HIDDEN_2_PH', 'HIDDEN_3_PH', 'HIDDEN_4_PH'), array('','', '', 'hidden'), $survey_html);
			break;
			case "4":
			$survey_html = str_replace(array('HIDDEN_1_PH', 'HIDDEN_2_PH', 'HIDDEN_3_PH', 'HIDDEN_4_PH'), array('','', '', ''), $survey_html);
			break;
			default:
				break;
		}
	}


	/* 
	* replace for answers
	*/


	$user_IP			= $_SERVER['REMOTE_ADDR'];
	$user_ID			= get_current_user_id();
	$user_logged_in		= is_user_logged_in();

	//if user is logged in check by userID
	if ($user_logged_in) {
		$rating_count 	= $wpdb->get_var(
			"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
		);

		$rating_val	= $wpdb->get_var(
			"SELECT answer FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
		);
	}else{ //check if IP is in db
		$rating_count 	= $wpdb->get_var(
			"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
		);

		$rating_val	= $wpdb->get_var(
			"SELECT answer FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
		);
	}

	if($rating_count > 0){ //if already answered

		if (is_user_logged_in()) {
			$survey_html	= str_replace( "HIDDEN_SURVEY", '', $survey_html );
		}else{
			$survey_html	= str_replace( "HIDDEN_SURVEY", 'hidden', $survey_html );
		}

		$survey_html	= str_replace( "HIDDEN_ANSWER_PH", '', $survey_html );

		$answers_array		= [];
		for ($x = 1; $x <= $nb_of_answers ; $x++) {
			$rate = $wpdb->get_var("SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND answer='" . 'answer_' . $x . "'");
			array_push($answers_array, $rate);
		}

		$total_entries 	= $wpdb->get_var(
			"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "'"
		);

		//display user answer
		$survey_html 	= str_replace('TEXT_ANSWER_PH', get_field("multi_text_" . $rating_val), $survey_html);

		// loop to show all answers data
		for ($y = 1; $y <= $nb_of_answers ; $y++) {
			$hideNb = 'HIDDEN_ANS' . $y . '_PH';
			$countNb = 'COUNT' . $y . 'PH';
			$survey_html 	= str_replace(array($hideNb, $countNb), array('',$answers_array[$y-1] ), $survey_html);
		}
		// loop to hide unnecessary elements
		if($nb_of_answers !== "4"){
			for ($nb = $nb_of_answers; $nb <= 4 ; $nb++) {
				$hideNb = 'HIDDEN_ANS' . $nb . '_PH';
				$countNb = 'COUNT' . $nb . 'PH';
				$survey_html 	= str_replace(array($hideNb, $countNb), array('hidden', '' ), $survey_html);
			}
		}
		
		$survey_html	= str_replace( "TOTAL_ANS_PH", $total_entries, $survey_html );

	}else{
		$survey_html	= str_replace( "HIDDEN_ANSWER_PH", 'hidden', $survey_html );
		$survey_html	= str_replace( "HIDDEN_SURVEY", '', $survey_html );
	}

	return $survey_html . $content;
		
		
}