<?php

function valuationUnity($value) {
    if(strlen($value) <= 6){
        $unity = substr($value, 0, -3) . '';
        $form_value = $unity . ' k';
    }elseif(strlen($value) > 6){
        $tempunity = substr($value, 0, -5) . '';
        $unity = substr($tempunity, 0, 2) . "." . substr($tempunity, 2, 3);;
        $form_value = $unity . ' M';
    };

    return $form_value;
}

function middleValuationUnity($value) {
    
        $tempunity = substr($value, 0, -5) . '';
        $unity = substr($tempunity, 0, 1) . "." . substr($tempunity, 1, 3);;
        $form_value = $unity . ' M';
    

    return $form_value;
}