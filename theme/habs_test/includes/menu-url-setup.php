<?php

function wpa_change_menu_item_url( $items, $menu, $args ) {
    foreach ( $items as $key => $item ) {
        if ( 'logout' == strtolower($item->title) ) {
            $items[$key]->url = wp_logout_url();
        } else if ('login' == strtolower($item->title)) {
			$items[$key]->url = wp_login_url();
		}
    }
    return $items;
}