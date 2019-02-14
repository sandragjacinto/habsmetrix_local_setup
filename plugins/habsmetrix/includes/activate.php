<?php 
// initiates plugin and creates database
function r_activate_plugin () {
	if(version_compare(get_bloginfo( 'version' ), '4.5', '<')){
		wp_die( __('You must update WorpPress to ue this plugin', 'habsmetrix'));
	}

	global $wpdb;

	$createSQL		=  "
			CREATE TABLE `" . $wpdb->prefix . "core_metrix_ratings` ( 
				`ID` BIGINT(20) NOT NULL AUTO_INCREMENT , 
				`poll_id` BIGINT(20) NOT NULL , 
				`poll_type` VARCHAR(32) NOT NULL ,
				`date` DATETIME NOT NULL,
				`rating` FLOAT(12,2) NOT NULL , 
				`user_ip` VARCHAR(32) NOT NULL , 
				`user_id` BIGINT(20) NOT NULL ,  
				PRIMARY KEY (`ID`)
			) 
			ENGINE = InnoDB " . $wpdb->get_charset_collate() . " AUTO_INCREMENT=1;";


			require_once (ABSPATH . '/wp-admin/includes/upgrade.php');
			dbDelta( $createSQL );


	$createSurveySQL		=  "
		CREATE TABLE `" . $wpdb->prefix . "survey_ratings` ( 
			`ID` BIGINT(20) NOT NULL AUTO_INCREMENT , 
			`survey_id` BIGINT(20) NOT NULL , 
			`survey_type` VARCHAR(32) NOT NULL ,
			`date` DATETIME NOT NULL,
			`answer` VARCHAR(32) NOT NULL , 
			`answer_array` MEDIUMBLOB NOT NULL , 
			`relevance` VARCHAR(32) NOT NULL , 
			`user_ip` VARCHAR(32) NOT NULL , 
			`user_id` BIGINT(20) NOT NULL ,  
			PRIMARY KEY (`ID`)
		) 
		ENGINE = InnoDB " . $wpdb->get_charset_collate() . " AUTO_INCREMENT=1;";
		require_once (ABSPATH . '/wp-admin/includes/upgrade.php');
			dbDelta( $createSurveySQL );

}

