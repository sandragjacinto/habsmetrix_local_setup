<?php
global $wp;
$tradeURL = home_url( $wp->request ) . '/trade-index';
$fireURL = home_url( $wp->request ) . '/fire-index';
$managementPerformanceURL = home_url( $wp->request ) . '/management-performance';
$playersPerformanceURL = home_url( $wp->request ) . '/players-performance';
$playersValuationURL = home_url( $wp->request ) . '/players-valuation';
?>

<h1 class="title is-5 is-lime is-uppercase">Click to manage the team</h1>
<h1 class="title is-6 has-text-white is-marginless">Players</h1>
    <div class="columns is-mobile">
        <div class="column">
            <?php include (get_template_directory() . '/template-parts/trade-index-button.php') ?>
        </div>
        <div class="column">
            <?php include (get_template_directory() . '/template-parts/player-performance-button.php') ?>
        </div>
        <div class="column">
            <?php include (get_template_directory() . '/template-parts/player-valuation-button.php') ?>
        </div>
    </div>
    <h1 class="title is-6 has-text-white is-marginless">Management</h1>
    <div class="columns is-mobile">
        <div class="column is-one-third">
            <?php include (get_template_directory() . '/template-parts/fire-index-button.php') ?>
        </div>
        <div class="column">
            <?php include (get_template_directory() . '/template-parts/management-performance-button.php') ?>
        </div>
    </div>
