<?php 

// adds theme features

function ha_setup_theme() {

	add_theme_support( 'custom-logo' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
    'main-nav' =>  __( 'Main Navigation', 'habsmetrix' ),
    'footer-nav' => __('Footer Navigation', 'habsmetrix') 
    ));
}