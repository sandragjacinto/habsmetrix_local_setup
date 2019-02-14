<?php

if(is_user_logged_in()){
    get_header();
}else{
    get_header('front');
}