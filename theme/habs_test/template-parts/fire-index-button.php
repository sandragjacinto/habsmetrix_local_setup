<?php
global $wp;
$fireURL = home_url( $wp->request ) . '/fire-index';
?>

<figure class="image">
    <a href="<?php echo $fireURL ?>">
    <img class="menu-icon" src="<?php echo bloginfo('template_directory')?>/img/ICON_FIRE.png" />
    </a>
</figure>
       