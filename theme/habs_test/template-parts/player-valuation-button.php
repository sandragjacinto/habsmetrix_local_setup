<?php
global $wp;
$playersValuationURL = home_url( $wp->request ) . '/players-valuation';
?>

<figure class="image">
    <a href="<?php echo $playersValuationURL ?>">
    <img class="menu-icon" src="<?php echo bloginfo('template_directory')?>/img/ICON_VALUATION.png" />
    </a>
</figure>
       