<?php 

function r_filter_survey_range( $content ) {
	global $post, $wpdb;

	$post_id = $post->ID;

	$survey_type = get_field('type', $post_id);

	if ( !($survey_type == 'RANGE') ){
		return $content;
	}else{
		$survey_html = file_get_contents('survey-range.php', true);

		$survey_html = str_replace('QUESTION_PH', get_field("survey_question"), $survey_html);
		$survey_html = str_replace('QUESTION_I18N', __("Question", "core_metrix"), $survey_html);

		$survey_html = str_replace('MIN_PH', get_field("range_min_value"), $survey_html);
		$survey_html = str_replace('MAX_PH', get_field("range_max_value"), $survey_html);
		$survey_html = str_replace('STEPS_PH', get_field("range_steps_value"), $survey_html);
		$survey_html = str_replace('ID_PH', $post->ID, $survey_html);

	
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

	if($rating_count > 0){
		
		$data['average'] = round($wpdb->get_var(
			"SELECT AVG(`answer`) FROM `" . $wpdb->prefix . "survey_ratings`  WHERE survey_id='" . $post->ID . "'"
		), 1);

		if ($user_logged_in){
			$survey_html 	= str_replace('HIDDEN_SURVEY', '', $survey_html);
		} else {
			$survey_html 	= str_replace('HIDDEN_SURVEY', 'hidden', $survey_html);
		}
		$survey_html 	= str_replace('HIDDEN_ANSWER_PH', '', $survey_html);
		$survey_html 	= str_replace('ANSWER_VAL_PH', $rating_val, $survey_html);
		$survey_html 	= str_replace('MEAN_VAL_PH', $data['average'], $survey_html);
		$survey_html 	= str_replace('VALUE_PH',  $rating_val, $survey_html);

	
	}else{
		$survey_html 	= str_replace('HIDDEN_ANSWER_PH', 'hidden', $survey_html);
		$survey_html = str_replace('VALUE_PH', get_field("range_min_value"), $survey_html);

	}



	$user_IP		= $_SERVER['REMOTE_ADDR'];
	$user_ID			= get_current_user_id();
	$user_logged_in		= is_user_logged_in();

	if ($user_logged_in) {
		$rating_count 	= $wpdb->get_var(
			"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
		);

		$rating_val	= round($wpdb->get_var(
			"SELECT answer FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'  ORDER BY ID DESC LIMIT 1"
		),1);

		$survey_html	= str_replace( "LOG_INFO_PH", ' ', $survey_html );
		
	}else{
		// $rating_count 	= $wpdb->get_var(
		// 	"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
		// );
		
		$rating_val	= round($wpdb->get_var(
			"SELECT answer FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'  ORDER BY ID DESC LIMIT 1"
		),1);
		$rating_count = 0;
		$survey_html	= str_replace( "LOG_INFO_PH", 'answer-full-width-no-update', $survey_html );
	}

	if($rating_count > 0){
		if(get_field("range_max_value")>0){
			$rating_perc = ($rating_val*100)/get_field("range_max_value");
		}else{
			$rating_perc=0;
		}

		if(get_field('core_question')=='Salary'){
		$average = round($wpdb->get_var(
			"SELECT AVG(`answer`) FROM `" . $wpdb->prefix . "survey_ratings`  WHERE survey_id='" . $post->ID . "'"
		), 0);
		if(get_field("range_max_value")>0){
			$average_perc = round(($average*100)/get_field("range_max_value"),1);
		}else{
			$average_perc=0;
		}
		$average = preg_replace( '/(?<=\d)\x' . bin2hex($separator[0]) . '(?=\d)/', $separator, number_format($average, 0, '.', $separator) );
		$rating_val = preg_replace( '/(?<=\d)\x' . bin2hex($separator[0]) . '(?=\d)/', $separator, number_format($rating_val, 0, '.', $separator) );
		}else{
			$average = round($wpdb->get_var(
				"SELECT AVG(`answer`) FROM `" . $wpdb->prefix . "survey_ratings`  WHERE survey_id='" . $post->ID . "'"
			), 1);
			
			if(get_field("range_max_value")>0){
				$average_perc = round(($average*100)/get_field("range_max_value"),1);
			}else{
				$average_perc=0;
			}
		}

	
		if ($user_logged_in) {
			$survey_html	= str_replace( "HIDDEN_UPDATE_PH", '', $survey_html );
		}else{
			$survey_html	= str_replace( "HIDDEN_UPDATE_PH", 'hidden', $survey_html );
		}
		$survey_html	= str_replace( "HIDDEN_ANSWER_PH", '', $survey_html );
		$survey_html	= str_replace( "HIDDEN_SLIDER_PH", 'hidden', $survey_html );
		$survey_html	= str_replace( "AVERAGE_VAL_PH", $average, $survey_html );
		$survey_html	= str_replace( "AVERAGE_PH", $average_perc, $survey_html );
		$survey_html	= str_replace( "AUTO_PERC_PH", (100-$average_perc), $survey_html );
		$survey_html	= str_replace( "MEAN_ANSWER_VAL_PH", $average, $survey_html );
		$survey_html	= str_replace( "ANSWER_PH", $rating_perc, $survey_html );
		$survey_html	= str_replace( "MAXVALUE_PH", get_field("range_max_value"), $survey_html );
		$survey_html	= str_replace( "RATING_VALUE_PH", $rating_val, $survey_html );
		$survey_html	= str_replace( "ANSWER_VAL_PH", $rating_val, $survey_html );
		$survey_html	= str_replace( "BUTTON_I18N", __("Registered answer :", "core_metrix"), $survey_html );
		$survey_html	= str_replace( "DISABLEDBUTTON_PH", 'disabled', $survey_html );	
	} else {
		$survey_html	= str_replace( "HIDDEN_ANSWER_PH", 'hidden', $survey_html );
		$survey_html	= str_replace( "HIDDEN_SLIDER_PH", '', $survey_html );
		$survey_html	= str_replace( "BUTTON_I18N", __("Submit", "core_metrix"), $survey_html );
		$survey_html	= str_replace( "DISABLEDBUTTON_PH", '', $survey_html );	
	}



	return $survey_html . $content;
		
		
}