<?php
global $wp;

$managementPerformanceURL = home_url( $wp->request ) . '/management-performance';

?>

<figure class="image">
    <a href="<?php echo $managementPerformanceURL ?>">
    <img class="menu-icon" src="<?php echo bloginfo('template_directory')?>/img/ICON_PERFO.png" />
    </a>
</figure>
       