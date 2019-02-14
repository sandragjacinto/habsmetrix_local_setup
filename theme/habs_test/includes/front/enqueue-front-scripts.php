<?php

function ha_enqueue_front_scripts(){
    //load styles
    wp_enqueue_style( 
        'bootstraps-styles', 
        get_template_directory_uri().'/css/bootstrap.min.css'
    );
    
    wp_enqueue_style( 
        'main-styles', 
        get_template_directory_uri().'/style.css'
    );

     // Base CSS file derived from bulma.io
    wp_enqueue_style( 'base', get_template_directory_uri() . '/css/bulma.css' );

    // Font Awesome 5
    wp_register_script( 'fontawesome', 'https://use.fontawesome.com/releases/v5.0.1/js/all.js' );
    wp_enqueue_script( 'fontawesome' );

    wp_enqueue_script( 
        'bootstrap-scripts', 
        get_template_directory_uri().'/js/bootstrap.min.js'
    );
    
    wp_enqueue_script( 'burger-menu-script', get_stylesheet_directory_uri() . '/js/burger-menu.js', array( 'jquery' ) );

}