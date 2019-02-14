<?php
/**
 * The default header file
 */

$hideButtonClass = "";
$hideDescriptionClass = "hide-header-description";
$widthDescriptionSectionClass = "full-width-section";
if (is_page('Home')) {
    $hideButtonClass = "hide-home-button";
    $hideDescriptionClass = " ";
    $widthDescriptionSectionClass = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php bloginfo( 'name' ) ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    <?php wp_head() ?>

</head>
<body class="has-background-dark">
<div id="wrap" class="has-background-dark">

<!-- header: main-nav -->
<header class="header header-logout header-z-index">
    <section class="hero is-mobile header-background">
      <div class="hero-body-padding">
         <h1 class="title">
          <div class="navbar-brand">
              <?php 
                  if ( has_custom_logo() ) {
                      the_custom_logo();
                  } else {
                  ?>
                      <h1>
                          <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                           <small>Habs Metrix</small>
                      </h1>

                  <?php
                  }
              ?>
       
          </div>
    </h1>
     </div>
     <div class="container ">
    <div class="level front-header">
      <?php 
      $image = get_field('image_presentation');
      if( !empty($image) ): ?>
        <img class="is-hidden-tablet-only is-hidden-mobile" src="<?php echo $image; ?>" alt="logo" style="height: 200px;"/>
      <?php endif; ?>
      <section class="description-section <?php echo $widthDescriptionSectionClass; ?>">
         
          <h1 class="title is-4 is-lime is-marginless">
            <?php 
              $big_title = get_field('log_in_call_to_action', 529);
              $big_title = explode ( " " , $big_title );
              if (count($big_title)>1) { ?>
                  
                      <?php echo strtoupper($big_title[0]); ?>  
                      
                      <span class="has-text-white">
                      <?php 
                      $copy = $big_title;
                      unset($copy[0]);
                      $rest = implode(" ", $copy);
                      echo strtoupper($rest);
                
                       ?> 
                       </span> 
                  
                  <?php 
              } else { 
                 echo strtoupper($big_title[0]);
              } ?>
          </h1>
        

         
        </section>
   
</div>
</div>

<div class="hero has-background-black is-paddingless">
  <a class="toggle-nav is-pulled-left is-paddingless">&#9776;</a>
    <h2 class="subtitle is-paddingless">
       <?php if (has_nav_menu( 'main-nav' ))

              wp_nav_menu( array(
              'theme_location'  => 'main-nav',
              'depth'             => 2,
              'container'       => false,
              // 'items_wrap'        => 'div',
              'menu_class'        => 'navbar-menu has-background-black',
              'menu_id'           => 'main-nav',
              'after'             => "</div>",
              'fallback_cb'       => false,
              'depht'             => 0,
              'walker'            => new Navwalker()
              ));
              ?>
              
    </h2>
   </div>
  </section>
</header>
<!-- end of header -->

