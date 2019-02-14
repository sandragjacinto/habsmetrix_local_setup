<?php 
include 'filter-functions.php';

function r_filter_slider_content( $content ) {

	global $post, $wpdb;
	$list = get_field('reset_list');
	$poll_data = get_field('info');
	$poll_type = get_field('core_metrix_type');
	$category = get_field('info_category');
	$separator = ' ';
	$current = '';
	$page = get_page_by_title( 'Core metrix management' );
	$resetList = get_field('reset_answer_data', $page);
	$dateComparisonBoolean = false;

	if (get_field('core_question')=='Salary') {
		$slider_data = get_field('slider_valuation');
		$min_value = $slider_data["min_value"];
		$max_value = $slider_data["max_value"];

		if($slider_data["current_valuation"]){
		$current = $slider_data["current_valuation"];
		$hiddenValuation = '';
	}
		
		$form_min_value = valuationUnity($min_value);
		$form_max_value = valuationUnity($max_value);

		$start_position = middleValuationUnity(round($slider_data["max_value"]/2));
		
	}else{
		$slider_data = get_field('slider_performance');
		$min_value = $slider_data["min_value"];
		$max_value = $slider_data["max_value"];
		$form_min_value = $min_value ;
		$form_max_value = $max_value ;
		
		$hiddenValuation = 'hidden';
		$start_position = $slider_data["max_value"]/2;
		
	}
	$steps = $slider_data;
	
	if ( !($poll_type == '1') ){
		return $content;
	}
	
	$poll_html = file_get_contents('slider-template.php', true);
	$poll_html = str_replace( "ID_PH", $post->ID, $poll_html );
	
	$poll_html = str_replace('STARTSLIDER_PH', $start_position, $poll_html);
	$title = get_the_title();

	$poll_html = str_replace('TITLE_PH', $title, $poll_html);

	if ($category == 'Player'){
		$poll_html = str_replace('HIDDEN_PLAYER_PH', '', $poll_html);
		$poll_html = str_replace('NUMBER_PH', $poll_data['number'], $poll_html);
		$poll_html = str_replace('POSITION_PH', $poll_data['player_position'], $poll_html);
		$poll_html = str_replace('HIDDEN_MGM_PH', 'hidden', $poll_html);

		$poll_html = str_replace('NUMBER_I18N', __("Number", "core_metrix"), $poll_html);

	}else{
		$poll_html = str_replace('HIDDEN_PLAYER_PH', 'hidden', $poll_html);
		$poll_html = str_replace('POSITION_PH', $poll_data['position'], $poll_html);
	}
		$poll_html = str_replace('POSITION_I18N', __("Position", "core_metrix"), $poll_html);

		$poll_html = str_replace('POLL_TYPE_PH', $poll_type, $poll_html);
		$poll_html = str_replace('QUESTION_PH', get_field('core_question'), $poll_html);

		$poll_html = str_replace('MIN_TEXT_PH', $form_min_value, $poll_html);
		$poll_html = str_replace('MAX_TEXT_PH', $form_max_value, $poll_html);
		

		$poll_html = str_replace('MIN_PH', $slider_data["min_value"], $poll_html);
		$poll_html = str_replace('MAX_PH', $slider_data["max_value"], $poll_html);
		$poll_html = str_replace('STEP_PH', $slider_data["steps"], $poll_html);
		

		$poll_html = str_replace('HIDDEN_CURRENT_VALUATION', $hiddenValuation, $poll_html);
		$poll_html = str_replace('CURRENT_PH', $current, $poll_html);

		if (get_field('core_question')=='Salary') {
		$poll_html = str_replace('UNITY_PH', '$', $poll_html);
		}else{
			$poll_html = str_replace('UNITY_PH', '', $poll_html);
		}
		


		
		// $recipe_html = str_replace( "RECIPE_RATING", get_field('average'), $recipe_html );

		$user_IP		= $_SERVER['REMOTE_ADDR'];
		$user_ID			= get_current_user_id();
		$user_logged_in		= is_user_logged_in();

		if ($user_logged_in) {
			$rating_count 	= $wpdb->get_var(
				"SELECT COUNT(*) FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
			);
	
			$rating_val	= round($wpdb->get_var(
				"SELECT rating FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_id='" . $post->ID . "' AND user_id='" . $user_ID . "'  ORDER BY ID DESC LIMIT 1"
			),1);

			$poll_html	= str_replace( "LOG_INFO_PH", ' ', $poll_html );

			$lastRatingDate	= $wpdb->get_var(
				"SELECT date FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_id='" . $post->ID . "' AND user_id='" . $user_ID . "'  ORDER BY ID DESC LIMIT 1"
			);
			
		}else{
			// $rating_count 	= $wpdb->get_var(
			// 	"SELECT COUNT(*) FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
			// );
			
			$rating_val	= round($wpdb->get_var(
				"SELECT rating FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'  ORDER BY ID DESC LIMIT 1"
			),1);
			$rating_count = 0;
			$poll_html	= str_replace( "LOG_INFO_PH", 'answer-full-width-no-update', $poll_html );
		}

		if($rating_count > 0){
			if($max_value>0){
				$rating_perc = ($rating_val*100)/$max_value;
			}else{
				$rating_perc=0;
			}

			if(get_field('core_question')=='Salary'){
			$average = round($wpdb->get_var(
				"SELECT AVG(`rating`) FROM `" . $wpdb->prefix . "core_metrix_ratings`  WHERE poll_id='" . $post->ID . "'"
			), 0);
			if($max_value>0){
				$average_perc = round(($average*100)/$max_value,1);
			}else{
				$average_perc=0;
			}
			$average = preg_replace( '/(?<=\d)\x' . bin2hex($separator[0]) . '(?=\d)/', $separator, number_format($average, 0, '.', $separator) );
			$rating_val = preg_replace( '/(?<=\d)\x' . bin2hex($separator[0]) . '(?=\d)/', $separator, number_format($rating_val, 0, '.', $separator) );
			}else{
				$average = round($wpdb->get_var(
					"SELECT AVG(`rating`) FROM `" . $wpdb->prefix . "core_metrix_ratings`  WHERE poll_id='" . $post->ID . "'"
				), 1);
				
				if($max_value>0){
					$average_perc = round(($average*100)/$max_value,1);
				}else{
					$average_perc=0;
				}
			}

			if(strlen($lastRatingDate) > 0){
				$explodedDateAnswer = explode(' ', $lastRatingDate)[0];
				$current		= date("Y-m-d h:i:sa");
				$explodedCurrentDate = explode(' ', $current)[0];
				$dateComparisonBoolean = $explodedDateAnswer == $explodedCurrentDate;
			}
		
			if(is_array($resetList) > 0 && in_array($title, $resetList) == true && !$dateComparisonBoolean){
				$poll_html	= str_replace( "HIDDEN_ANSWER_PH", 'hidden', $poll_html );
				$poll_html	= str_replace( "HIDDEN_SLIDER_PH", '', $poll_html );
			}

			$poll_html	= str_replace( "HIDDEN_ANSWER_PH", '', $poll_html );
			$poll_html	= str_replace( "HIDDEN_SLIDER_PH", 'hidden', $poll_html );
			$poll_html	= str_replace( "AVERAGE_VAL_PH", $average, $poll_html );
			$poll_html	= str_replace( "AVERAGE_PH", $average_perc, $poll_html );
			$poll_html	= str_replace( "AUTO_PERC_PH", (100-$average_perc), $poll_html );
			$poll_html	= str_replace( "MEAN_ANSWER_VAL_PH", $average, $poll_html );
			$poll_html	= str_replace( "ANSWER_PH", $rating_perc, $poll_html );
			$poll_html	= str_replace( "MAXVALUE_PH", $max_value, $poll_html );
			$poll_html	= str_replace( "RATING_VALUE_PH", $rating_val, $poll_html );
			$poll_html	= str_replace( "ANSWER_VAL_PH", $rating_val, $poll_html );
			$poll_html	= str_replace( "BUTTON_I18N", __("Registered answer :", "core_metrix"), $poll_html );
			$poll_html	= str_replace( "DISABLEDBUTTON_PH", 'disabled', $poll_html );	
		} else {
			$poll_html	= str_replace( "HIDDEN_ANSWER_PH", 'hidden', $poll_html );
			$poll_html	= str_replace( "HIDDEN_SLIDER_PH", '', $poll_html );
			$poll_html	= str_replace( "BUTTON_I18N", __("Submit", "core_metrix"), $poll_html );
			$poll_html	= str_replace( "DISABLEDBUTTON_PH", '', $poll_html );	
		}


	return $poll_html . $content;
}