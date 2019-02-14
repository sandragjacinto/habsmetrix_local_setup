<?php
    /**name
    * Template Name: Home 
    */
    get_template_part('/template-parts/header-switcher');
    

// main home content 
    ?>
    <section class="section mobile-page frontpage">
    <div class="columns">
    <div class="column is-4">
         <?php include (get_template_directory() . '/template-parts/homepage-menu-buttons.php') ?>
    </div>
        <div class="column">
           <div class="card has-background-dark">
               <?php
           if(!is_user_logged_in()){
                get_template_part('/template-parts/front-template-not-logged');
            } else { 
                get_template_part('/template-parts/front-template-logged');
             } ?>
           </div>
        </div>
    </div>
    </section>

    <?php


get_footer ('no-progress');

?>