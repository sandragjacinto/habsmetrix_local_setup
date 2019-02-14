<?php
global $wp;
$tradeURL = home_url( $wp->request ) . '/trade-index';
?>

<figure class="image">
    <a href="<?php echo $tradeURL ?>">
        <img class="menu-icon" src="<?php echo bloginfo('template_directory')?>/img/ICON_TRADE.png" />
    </a>
</figure>
       