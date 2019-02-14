<?php
global $wp;
$playersPerformanceURL = home_url( $wp->request ) . '/players-performance';
?>

<figure class="image"> 
<a href="<?php echo $playersPerformanceURL ?>">
<img class="menu-icon" src="<?php echo bloginfo('template_directory')?>/img/ICON_PERFO.png" />
</a>
</figure>
       