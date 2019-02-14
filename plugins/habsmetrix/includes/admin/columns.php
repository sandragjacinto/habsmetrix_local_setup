<?php

function r_add_new_recipe_columns($columns) {
    $new_columns                = array();
    $new_columns['cb']          = '<input type="checkbox" />';
    $new_columns['title']       = __('Name', 'recipe');
    $new_columns['author']      = __('Author', 'recipe');
    $new_columns['category']  = __('Categories', 'recipe');
    $new_columns['type']        = __('Poll Type', 'recipe');
    $new_columns['count']       = __('Ratings Count', 'recipe');
    $new_columns['rating']      = __('Average Rating', 'recipe');
    $new_columns['date']        = __('Date', 'recipe');

    return $new_columns;

}

function r_manage_recipe_columns($column, $post_id) {
    global $wpdb;
    switch($column) {
        case 'count':
                $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM`" . $wpdb->prefix . "core_metrix_ratings`  WHERE poll_id='" . $post_id . "'");
            if ($rowcount == 0) {
                $data['counter']	= 0;
            } else {
                $data['counter']	= $rowcount;
            }
            echo $data['counter'];
            break;
        case 'category':
            echo get_field('info_category', $post_id);
            break;
        case 'rating':
        $data['average'] = round($wpdb->get_var(
            "SELECT AVG(`rating`) FROM `" . $wpdb->prefix . "core_metrix_ratings`  WHERE poll_id='" . $post_id . "'"
        ), 1);
            echo $data['average'];
            break;
        case 'type':
            $core_type = get_field('core_metrix_type', $post_id);
            if($core_type == 1){
                echo "Slider";
            }else{
                echo "Trade-Index";
            }
            break;
        default:
            break;
    }

}
