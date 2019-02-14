<?php get_template_part('/template-parts/header-switcher'); 
require (get_template_directory() .'/template-helpers/core-metrix-query-arrays.php');

$args = array(
    'post_type' => 'core_metrix',
    'posts_per_page' => 100,
    'orderby' => 'title',
	'order'   => 'ASC',
    'meta_query' => array( $metrixTypeArray[2], $categoryArray[1] )
);

$buttonPath = '/template-parts/trade-index-button.php';

$the_query = new WP_Query($args);
include (get_template_directory() . '/template-parts/core-metrix-template-container.php');

get_footer() ?>