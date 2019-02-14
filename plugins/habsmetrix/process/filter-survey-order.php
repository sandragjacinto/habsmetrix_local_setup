<?php 

function r_filter_survey_order( $content ) {
	global $post, $wpdb;

	$survey_type = get_field('type');

	if ( !($survey_type == 'ORDER') ){
		return $content;
	}else{
		$survey_html = file_get_contents('survey-order-images.php', true);

		$survey_html = str_replace('QUESTION_PH', get_field("survey_question"), $survey_html);
		$survey_html = str_replace('QUESTION_I18N', __("Question", "core_metrix"), $survey_html);

		$nb_of_images = get_field("order_images_number_of_images");
		$survey_html = str_replace('NUMBER_PH', $nb_of_images, $survey_html);
		$survey_html = str_replace('ID_PH', $post->ID, $survey_html);
		
		$survey_html = str_replace('IMAGE1_PH', get_field("order_images_image_1"), $survey_html);
		$survey_html = str_replace('IMAGE2_PH', get_field("order_images_image_2"), $survey_html);
		$survey_html = str_replace('IMAGE3_PH', get_field("order_images_image_3"), $survey_html);
		$survey_html = str_replace('IMAGE4_PH', get_field("order_images_image_4"), $survey_html);
		

		switch($nb_of_images){
			case "1":
			$survey_html = str_replace(array('HIDDEN_1_PH', 'HIDDEN_2_PH', 'HIDDEN_3_PH', 'HIDDEN_4_PH'), array('checkbox','hidden', 'hidden', 'hidden'), $survey_html);
			break;
			case "2":
			$survey_html = str_replace(array('HIDDEN_1_PH', 'HIDDEN_2_PH', 'HIDDEN_3_PH', 'HIDDEN_4_PH'), array('checkbox','checkbox', 'hidden', 'hidden'), $survey_html);
			break;
			case "3":
			$survey_html = str_replace(array('HIDDEN_1_PH', 'HIDDEN_2_PH', 'HIDDEN_3_PH', 'HIDDEN_4_PH'), array('checkbox','checkbox', 'checkbox', 'hidden'), $survey_html);
			break;
			case "4":
			$survey_html = str_replace(array('HIDDEN_1_PH', 'HIDDEN_2_PH', 'HIDDEN_3_PH', 'HIDDEN_4_PH'), array('checkbox','checkbox', 'checkbox', 'checkbox'), $survey_html);
			break;
			default:
				break;
		}


		$user_IP		= $_SERVER['REMOTE_ADDR'];
		$user_ID			= get_current_user_id();
		$user_logged_in		= is_user_logged_in();

		if ($user_logged_in) {			
			$rating_count 	= $wpdb->get_var(
				"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
			);

			$rating_val_serialized	= $wpdb->get_var(
				"SELECT answer_array FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
			);
		} else{
			$rating_count 	= $wpdb->get_var(
				"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "'"
			);
	
			$rating_val_serialized	= $wpdb->get_var(
				"SELECT answer_array FROM `" . $wpdb->prefix . "survey_ratings` WHERE survey_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
			);
		}

		$rating_val = unserialize($rating_val_serialized);

		if($rating_count > 0){ //if already answered
			if (!is_user_logged_in()) {
				$survey_html	= str_replace( "HIDDEN_SURVEY", 'hidden', $survey_html );
			}

			for ($y = 1; $y <= sizeof($rating_val) ; $y++) {
				$hideNb = 'IMG_' . $y . '_URL';
				$survey_html 	= str_replace($hideNb, get_field("order_images_" . $rating_val[$y-1]), $survey_html);
			}
			if(sizeof($rating_val) !== "4"){
				for ($nb = sizeof($rating_val)+1; $nb <= 4 ; $nb++) {
					$hideNb = 'HIDDEN_ANSWER_' . $nb ;
					$survey_html 	= str_replace($hideNb, 'hidden', $survey_html);
				}
			}

		} else {
			$survey_html = str_replace('HIDDEN_ANSWER', 'hidden', $survey_html);
			$survey_html = str_replace('HIDDEN_SURVEY', '', $survey_html);
		}
	
		$survey_html = str_replace('ORDER_PH', $rating_val[0], $survey_html);
	}

	return $survey_html . $content;
		
		
}