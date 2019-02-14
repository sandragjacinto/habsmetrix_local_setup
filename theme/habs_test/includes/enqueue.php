<?php 

/**
 *  Load CSS and Javascript
 */


function ha_enqueue(){

    //load scripts
    wp_enqueue_script( 
        'jquery', 
        'https://code.jquery.com/jquery-3.3.1.min.js'
    );
    wp_enqueue_script( 'chart-js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js', array(), true );
    wp_register_script('custom_script', home_url() . '/wp-content/themes/habs_test/js/custom_scripts.js', array( 'jquery' ));
    wp_enqueue_script('custom_script');

    

    wp_localize_script( 
		'r_main', 
		'survey_obj', 
		array(
		'ajax_url'	=>	admin_url( 'admin-ajax.php' ),
		'home_url'	=>	home_url('/')
	) 
	);

 }