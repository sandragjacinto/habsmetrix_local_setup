<?php get_template_part('/template-parts/header-switcher'); 
require (get_template_directory() .'/template-helpers/core-metrix-query-arrays.php');

$args = array(
    'post_type' => 'core_metrix',
    'posts_per_page' => 100,
    'orderby' => 'post_title',
	'order'   => 'ASC',
    'meta_query' => array( $metrixTypeArray[1], $categoryArray[0] )
);

$title_array = get_field('campaign_day_1', get_page_by_title( 'Core metrix management' ));
if(!is_array($title_array)){
    $title_array = [
        'Carey Price',
        'Shea Weber',
        'Tomas Tatar',
        'Jordie Benn',
        'Charles Hudon'
    ];
}

$campaign_text1 = "Let's start with...";
$campaign_text2 = "Who would you be willing to trade?";
$title= "Trade index";
$buttonPath = '/template-parts/trade-index-button.php';


$the_query = new WP_Query($args);

include (get_template_directory() . '/template-parts/campaign-template-container.php');

get_footer(); ?>