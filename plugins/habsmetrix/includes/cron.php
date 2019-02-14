<?php

function r_generate_daily_recipe() {

    global $wpdb;

    $poll_id = $wpdb->get_var(
        "SELECT `ID` FROM `" . $wpdb->posts . "` 
        WHERE post_status='publish' AND post_type='recipe'");

    set_transient('r_daily_recipe', 
                $poll_id, 
                DAY_IN_SECONDS);
}