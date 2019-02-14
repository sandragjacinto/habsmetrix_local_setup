<?php

function my_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
    }
    
function my_login_logo_url() {
    return get_bloginfo( 'url' );
    }

function my_login_logo_url_title() {
    return 'Habsmetrix';
    }