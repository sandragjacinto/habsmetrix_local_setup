<?php get_template_part('/template-parts/header-switcher'); 
require (get_template_directory() .'/template-helpers/core-metrix-query-arrays.php');

$args = array(
    'post_type'  => 'core_metrix',
    'posts_per_page' => 100,
    'orderby' => 'title',
	'order'   => 'ASC',
    'meta_query' => array( $metrixTypeArray[0], $categoryArray[1], $questionArray[1] ),
);

$title_array = get_field('campaign_day_4', get_page_by_title( 'Core metrix management' ));
if(!is_array($title_array)){
    $title_array = [
        'Marc Bergevin',
        'Claude Julien'
    ];
}


$campaign_text1 = "";
$campaign_text2 = "How would you rate the habs manageemnt work this year?";
$title= "Managers Performance";
$buttonPath = '/template-parts/management-performance-button.php';


$the_query = new WP_Query($args);

include (get_template_directory() . '/template-parts/campaign-template-container.php');

get_footer();

?>