<?php
        global $wpdb;

		$user_IP		= $_SERVER['REMOTE_ADDR'];
		$user_ID			= get_current_user_id();
		$user_logged_in		= is_user_logged_in();

		$numberPosts2Vote = 0;

		//logic for the percentage calculus based on the reset and date of the answer
		$page = get_page_by_title( 'Core metrix management' );
		$arrayOfresetedAnswers = get_field('reset_answer_data', $page);
		$postIdsArray = [];
		if (is_array($arrayOfresetedAnswers)){
			foreach ($arrayOfresetedAnswers as $title){
				$my_post = get_page_by_title( $title, OBJECT, 'core_metrix' );
				array_push($postIdsArray, $my_post->ID); //gets posts ID
			}
		}

		$total_core = $wpdb->get_var(
			"SELECT COUNT(*) FROM `" . $wpdb->prefix . "posts` WHERE post_type='" . "core_metrix" . "' AND post_status= '" . "publish" . "'"
		);
		// $total_survey = $wpdb->get_var(
		// 	"SELECT COUNT(*) FROM `" . $wpdb->prefix . "posts` WHERE post_type='" . "survey_post" . "' AND post_status= '" . "publish" . "'"
		// );

		$total = $total_core ;//+ $total_survey;

		if($user_logged_in){
			$answered_core = $wpdb->get_results(
				"SELECT COUNT(*) FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE user_id='" . $user_ID . "'  GROUP BY poll_id ORDER BY poll_id DESC"
			);
			// $answered_survey = $wpdb->get_results(
			// 	"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE user_id='" . $user_ID . "' "
			// );
			foreach ($postIdsArray as $postID){ //for each post ID from the reset list
				$lastRatingDate	= $wpdb->get_var(
					"SELECT date FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_id='" . $postID . "' AND user_id='" . $user_ID . "'  ORDER BY ID DESC LIMIT 1"
				);

				if (strlen($lastRatingDate) > 0){
					$explodedDateAnswer = explode(' ', $lastRatingDate)[0];
					$current		= date("Y-m-d h:i:sa");
					$explodedCurrentDate = explode(' ', $current)[0];
					$dateComparisonBoolean = $explodedDateAnswer == $explodedCurrentDate;

					if(!$dateComparisonBoolean){
						$numberPosts2Vote++; //increments number posts 2 vote based on the dte of the answer
					}
				}
			}

		} else {
			$answered_core 	= $wpdb->get_results(
				"SELECT COUNT(*) FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "' GROUP BY poll_id ORDER BY poll_id DESC"
			);
			// $answered_survey 	= $wpdb->get_results(
			// 	"SELECT COUNT(*) FROM `" . $wpdb->prefix . "survey_ratings` WHERE user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "' "
			// );
		}
		$answer = sizeof($answered_core) - $numberPosts2Vote; //+ sizeof($answered_survey);
		$temp_progress = round(($answer*100)/$total_core);
		if ($total_core > 0){
		$percentage_progress = $temp_progress;
		if($temp_progress>100){$percentage_progress = 100;}
		}else{$percentage_progress = 0;}
