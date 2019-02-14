<?php 

function r_filter_index_content( $content ) {
	global $post, $wpdb;

	$poll_data = get_field('info');
	$poll_type = get_field('core_metrix_type');
	$category = get_field('info_category');
	$page = get_page_by_title( 'Core metrix management' );
	$resetList = get_field('reset_answer_data', $page);
	$dateComparisonBoolean = false;

	// poll type 2 == trade index
	if ( !($poll_type == '2' or $poll_type == '3') ){
		return $content;
	}else{
		$poll_html = file_get_contents('index-template.php', true);
	}

	if ($category == 'Player'){

		$poll_html = str_replace('HIDDEN_PLAYER_PH', '', $poll_html);
		$poll_html = str_replace('NUMBER_PH', $poll_data['number'], $poll_html);
		$poll_html = str_replace('POSITION_PH', $poll_data['player_position'], $poll_html);

		$poll_html = str_replace('NUMBER_I18N', __("Number", "core_metrix"), $poll_html);
		$poll_html = str_replace('POSITION_I18N', __("Position", "core_metrix"), $poll_html);

	}else{
		$poll_html = str_replace('HIDDEN_PLAYER_PH', 'hidden', $poll_html);
		$poll_html = str_replace('POSITION_PH', $poll_data['position'], $poll_html);
		$poll_html = str_replace('POSITION_I18N', __("Position", "core_metrix"), $poll_html);

	}
	$poll_html = str_replace('ID_PH', $post->ID, $poll_html);

	$title = get_the_title();

	$poll_html = str_replace('TITLE_PH', $title, $poll_html);
	$poll_html = str_replace('CATEGORY_PH', $poll_data['category'], $poll_html);
	$poll_html = str_replace('CATEGORY_I18N', __("Category", "core_metrix"), $poll_html);

	$poll_html = str_replace( "POSTID_PH", $post->ID, $poll_html );
	
	
	$labels = ["Don't touch", "Rather keep", "Don't know", "Open 4 trade", "Get rid!", "Trade" ];
	($poll_type == '3') ? $labels[3] = "Open 2 fire" : '';
	($poll_type == '3') ? $labels[5] = "Fire" : '';

	$poll_html = str_replace(
				array(
					'LABEL1_I18N', 
					'LABEL2_I18N', 
					'LABEL3_I18N', 
					'LABEL4_I18N', 
					'LABEL5_I18N', 
					'LABEL6_I18N' 
				), 
				array(
					__($labels[0], "core_metrix"),
					__($labels[1], "core_metrix"),
					__($labels[2], "core_metrix"),
					__($labels[3], "core_metrix"),
					__($labels[4], "core_metrix"),
					__($labels[5], "core_metrix")
				), 
				$poll_html);



	$user_IP			= $_SERVER['REMOTE_ADDR'];
	$user_ID			= get_current_user_id();
	$user_logged_in		= is_user_logged_in();

	if ($user_logged_in) {
		$rating_count 	= $wpdb->get_var(
			"SELECT COUNT(*) FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_id='" . $post->ID . "' AND user_id='" . $user_ID . "'"
		);

		$rating_val	= round($wpdb->get_var(
			"SELECT rating FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_id='" . $post->ID . "' AND user_id='" . $user_ID . "'  ORDER BY ID DESC LIMIT 1"
		),1);

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
	}


	


	$data['count'] 	= $wpdb->get_var(
		"SELECT COUNT(*) FROM `" . $wpdb->prefix . "core_metrix_ratings`  WHERE poll_id='" . $post->ID . "'"
	);

	$data['average'] = round($wpdb->get_var(
		"SELECT AVG(`rating`) FROM `" . $wpdb->prefix . "core_metrix_ratings`  WHERE poll_id='" . $post->ID . "'"
	), 2);

	switch($rating_val) {
        case '-1':
            $tradeAns = "Don't touch";
            break;
        case '-0.5':
			$tradeAns = "Rather kepp";
            break;
        case '0':
			$tradeAns = "Don't know";
			break;
            break;
        case '0.5':
			$tradeAns = "Open 4 trade";
			break;
        case '1':
			$tradeAns = "Get rid!";
			break;
        default:
            break;
    }
	
	$average_perc = abs(round((($data['average']+1)*100)/2,1));
	$ans_perc = abs(round((($rating_val+1)*100)/2,1));
	$poll_html	= str_replace( "AVERAGE_PH", $average_perc, $poll_html );
	$poll_html	= str_replace( "ANSWER_PH", $ans_perc, $poll_html );

	if(strlen($lastRatingDate) > 0){
		$explodedDateAnswer = explode(' ', $lastRatingDate)[0];
		$current		= date("Y-m-d h:i:sa");
		$explodedCurrentDate = explode(' ', $current)[0];
		$dateComparisonBoolean = $explodedDateAnswer == $explodedCurrentDate;
	}

	if(is_array($resetList) > 0 && in_array($title, $resetList) == true && !$dateComparisonBoolean){
		$poll_html	= str_replace( "HIDDENANS_PH", 'hidden', $poll_html );
		$poll_html	= str_replace( "HIDDEN_SCALE_PH", '', $poll_html );
	}
	
	if($rating_count > 0){ //if already answered
		if ($user_logged_in) {
			$poll_html	= str_replace( "HIDDEN_UPDATE_PH", '', $poll_html );
		}else{
			$poll_html	= str_replace( "HIDDEN_UPDATE_PH", 'hidden', $poll_html );
		}

		$poll_html	= str_replace( "HIDDEN_SCALE_PH", 'hidden', $poll_html );
		$poll_html	= str_replace( "HIDDENANS_PH", '', $poll_html );
		$poll_html	= str_replace( "ANSWER_VAL_PH", $tradeAns, $poll_html );
		$poll_html	= str_replace( "INDEX_VAL_PH", $data['average'], $poll_html );
	} else { 
		$poll_html	= str_replace( "HIDDENANS_PH", 'hidden', $poll_html );
	}


	return $poll_html . $content;
		
		
}