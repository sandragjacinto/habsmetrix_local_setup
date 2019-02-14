<?php


//includes

include (get_template_directory() . '/includes/activate-core-metrix-database.php');
include (get_template_directory() . '/includes/enqueue.php');
include (get_template_directory() . '/includes/setup.php');
include (get_template_directory() . '/includes/front/enqueue-front-scripts.php');
include (get_template_directory() . '/includes/front/custom-admin-bar.php');
include (get_template_directory() . '/includes/front/admin/admin.php');
include (get_template_directory() . '/includes/activate-theme.php');
include (get_template_directory() . '/includes/menu-url-setup.php');
include (get_template_directory() . '/includes/campaign-redirections.php');

include (get_template_directory() . '/ha-core-metrix-template-process/filter-index-content.php');
include (get_template_directory() . '/ha-core-metrix-template-process/filter-slider-content.php');
include (get_template_directory() . '/ha-core-metrix-template-process/rate-core-metrix.php');

include (get_template_directory() . '/ha-survey-post-template-process/filter-statement-of-the-day.php');
include (get_template_directory() . '/ha-survey-post-template-process/filter-survey-order.php');
include (get_template_directory() . '/ha-survey-post-template-process/filter-survey-multi-images.php');
include (get_template_directory() . '/ha-survey-post-template-process/filter-survey-range.php');
include (get_template_directory() . '/ha-survey-post-template-process/filter-survey-multi-text.php');
include (get_template_directory() . '/ha-survey-post-template-process/submit-user-survey.php');
include (get_template_directory() . '/ha-survey-post-template-process/rate-survey.php');
include (get_template_directory() . '/ha-survey-post-template-process/save-post.php');

include (get_template_directory() . '/login/login-page-scripts.php');

//Hooks
// register_activation_hook( __FILE__, 'ha_activate_core_metrix_db' );

add_action( 'wp_ajax_r_rate_core_metrix', 'r_rate_core_metrix' );
add_action( 'wp_ajax_nopriv_r_rate_core_metrix', 'r_rate_core_metrix' );
add_action( 'wp_ajax_r_rate_survey', 'r_rate_survey' );
add_action( 'wp_ajax_nopriv_r_rate_survey', 'r_rate_survey' );
add_action( 'wp_ajax_ha_submit_user_survey', 'ha_submit_user_survey' );
add_action( 'wp_ajax_nopriv_ha_submit_user_survey', 'ha_submit_user_survey' );

add_action('wp_enqueue_scripts', 'ha_enqueue');
add_action('wp_enqueue_scripts', 'ha_enqueue_front_scripts');
add_action( 'admin_menu', 'data_dashboard_register' );
add_action('after_setup_theme', 'ha_setup_theme');
add_action( 'after_setup_theme', 'wp_habs_theme_activate' );
add_action('login_head', 'my_custom_login');
add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );
add_action( 'save_post_recipe', 'r_save_post_admin', 10, 3 );

add_action( 'template_redirect', function() {
	if( is_page('register') ) {
		wp_redirect(wp_registration_url() );
		exit();
	}
});

function redirect_not_logged_in_user() {
	if ( ! is_user_logged_in() && ! is_page( 'login' ) && !is_page( 'wp-signup' )) {
		$return_url = esc_url( home_url( '/login/' ) );
		wp_redirect( $return_url );
		exit;
	}
  }
  add_action( 'template_redirect', 'redirect_not_logged_in_user' );

//Filters
add_filter( 'login_redirect', 'campaign_redirect', 10, 3 );
add_filter( 'wp_get_nav_menu_items', 'wpa_change_menu_item_url', 10, 3 );
add_filter( 'wpmu_signup_user_notification', '__return_false' );
add_filter( 'login_headerurl', 'my_login_logo_url' );
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
add_filter( 'the_content', 'r_filter_index_content' );
add_filter( 'the_content', 'r_filter_slider_content' );
add_filter( 'the_content', 'r_filter_statement_of_the_day' );
add_filter( 'the_content', 'r_filter_survey_order' );
add_filter( 'the_content', 'r_filter_survey_multi_images' );
add_filter( 'the_content', 'r_filter_survey_range' );
add_filter( 'the_content', 'r_filter_survey_multi_text' );

require_once('navwalker.php');
