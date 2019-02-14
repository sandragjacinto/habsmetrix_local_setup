<?php

function wp_habs_theme_activate()
{
    $default_pages = array(
        array(
            'title' => 'Players Performance',
            'content' => 'Where the players performance poll will go.'
            ),
        array(
            'title' => 'Trade Index',
            'content' => 'Where the players trade index poll will go.'
            ),
        array(
            'title' => 'Players Valuation',
            'content' => 'Where the players valuation poll will go.'
            ),
        array(
            'title' => 'Management Performance',
            'content' => 'Where the management performance poll will go.'
            ),
        array(
            'title' => 'Fire Index',
            'content' => 'Where the management fire index poll will go.'
            )
    );
    $existing_pages = get_pages();
    $existing_titles = array();

    foreach ($existing_pages as $page) 
    {
        $existing_titles[] = $page->post_title;
    }

    foreach ($default_pages as $new_page) 
    {
        if( !in_array( $new_page['title'], $existing_titles ) )
        {
            // create post object
            $add_default_pages = array(
                'post_title' => $new_page['title'],
                'post_content' => $new_page['content'],
                'post_status' => 'publish',
                'post_type' => 'page'
              );

            // insert the post into the database
            $result = wp_insert_post($add_default_pages);   
        }
    }
}