<?php 
/*
* Plugin Name: Habsmetrix
* Description: A wordpress plugin used to style metrix, surveys and gather data
* Version: 1.0
* Author: Sandra Guerreiro
* Author URI: http://habsmetrix.com
* Text Domain: Habsmetrix-Settings
*/

if( !function_exists('add_action')) {
	die("Hi there! I'm just a plugin, not much I can do when called directly.");
}

// Setup
define('RECIPE_PLUGIN_URL', __FILE__ );

// Includes
include('includes/activate.php');
include('includes/admin/init.php');
// include('process/save-post.php');
// include('process/filter-survey-order.php');
// include('process/filter-survey-multi-images.php');
// include('process/filter-survey-range.php');
// include('process/filter-survey-multi-text.php');
// include('process/filter-statement-of-the-day.php');
include('includes/front/enqueue.php');
// include('process/rate-survey.php');
include('includes/shortcodes/creator.php');
include('includes/shortcodes/habsmetrix-auth.php');
include('process/create-account.php');
include('process/login.php');
// include('process/submit-user-survey.php');


// Hooks
register_activation_hook( __FILE__, 'r_activate_plugin' );
add_action( 'admin_init', 'habsmetrix_admin_init' );
// add_action( 'save_post_recipe', 'r_save_post_admin', 10, 3 );
// add_filter( 'the_content', 'r_filter_survey_order' );
// add_filter( 'the_content', 'r_filter_survey_multi_images' );
// add_filter( 'the_content', 'r_filter_survey_range' );
// add_filter( 'the_content', 'r_filter_survey_multi_text' );
// add_filter( 'the_content', 'r_filter_statement_of_the_day' );
add_action( 'wp_enqueue_scripts', 'r_enqueue_scripts', 100 );
// add_action( 'wp_ajax_r_rate_survey', 'r_rate_survey' );
// add_action( 'wp_ajax_nopriv_r_rate_survey', 'r_rate_survey' );
// add_action( 'wp_ajax_ha_submit_user_survey', 'ha_submit_user_survey' );
// add_action( 'wp_ajax_nopriv_ha_submit_user_survey', 'ha_submit_user_survey' );
add_action('wp_ajax_nopriv_habsmetrix_create_account', 'habsmetrix_create_account');
add_action('wp_ajax_nopriv_habsmetrix_user_login', 'habsmetrix_user_login');

// Shortcodes

add_shortcode('recipe_creator', 'r_recipe_creator_shortcode');
add_shortcode('habsmetrix_auth_form', 'r_habsmetrix_auth_form_shortcode');