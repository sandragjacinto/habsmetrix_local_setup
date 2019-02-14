<?php 

function r_habsmetrix_auth_form_shortcode() {

    
    $formHTML       = file_get_contents(
        "habsmetrix-auth-template.php",
        true
    );

    $formHTML           = str_replace(
        "NONCE_FIELD_PH",
        wp_nonce_field( "habsmetrix_auth", "_wpnonce", true, false ),
		$formHTML
    );

    return $formHTML;
}