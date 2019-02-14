<?php

function ha_activate_core_metrix_db () {

    global $wpdb;
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $$wpdb->prefix . "core_metrix_ratings") {
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
	}
    

}