<?php

function ha_submit_user_survey() {

    $output         = ['status' => 1];
    
    $arrayOfAnswers = $_POST['answers'];
    var_dump($arrayOfAnswer);

    if(empty($_POST['question'])) {
        wp_send_json($output);
    }

    $question             = sanitize_text_field($_POST['question']);
    $startDate            = sanitize_text_field($_POST['startDate']);
    $endDate              = sanitize_text_field($_POST['endDate']);

    $post_id            = wp_insert_post([
            'post_content'          => $question,
            'post_name'             => $question,
            'post_title'            => $question,
            'post_status'           => 'publish',
            'post_type'             => 'survey_post'
    ]);

    update_field('type', 'STATEMENT', $post_id);
    update_field('survey_question', $question, $post_id);
    update_field('start_date', $startDate, $post_id);
    update_field('end_date', $endDate, $post_id);

    $output         = ['status' => 2];
    wp_send_json($output);
}