<?php

/**
 * The default header file
 */

$hideButtonClass = "";
if (is_page('Home')) {
    $hideButtonClass = "hide-home-button";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title><?php bloginfo('name') ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <?php wp_head() ?>

</head>
<body class="has-background-dark">
<div id="wrap" class="has-background-dark">

<!-- header: main-nav -->
<header class="header header-z-index">
    <section class="hero is-mobile has-text-centered">
      <div class="hero-body-padding">
         <h1 class="title is-fullwidth">
          <div class="navbar-brand is-fullwidth">
              <?php 
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                      <h1>
                          <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                           <small>Habs Metrics</small>
                      </h1>

                  <?php

                }
                ?>
               <?php if (is_user_logged_in()) {
                    $current_user = wp_get_current_user();
                }
                ?>
       
            <div class="is-pulled-right">
                <?php include (get_template_directory() . '/template-parts/homepage-button.php') ?>
                <?php include (get_template_directory() . '/template-parts/logout-button.php') ?>
            </div>
        </div>
        </h1>
    </div>
    
    <div class="hero has-background-black is-paddingless">
  <a class="toggle-nav is-pulled-left is-paddingless">&#9776;</a>
    <h2 class="subtitle is-paddingless">
        <?php if (has_nav_menu('main-nav'))

            wp_nav_menu(array(
            'theme_location' => 'main-nav',
            'depth' => 2,
            'container' => false,
            'menu_class' => 'navbar-menu has-background-black',
            'menu_id' => 'main-nav',
            'after' => "</div>",
            'fallback_cb' => false,
            'depht' => 0,
            'walker' => new Navwalker()
        ));
        ?>
                
        </h2>

    </div>
  </section>
</header>

<!-- end of header -->

