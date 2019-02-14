<?php

function r_add_new_title_placeholder($title , $post) {
    if( $post->post_type == 'core_metrix' || $post->post_type == 'survey_post'){
        $post_title = "Enter Name Here";
        return $post_title;
    }

    return $title;

};