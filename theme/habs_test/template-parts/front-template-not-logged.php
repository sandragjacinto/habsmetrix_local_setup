<?php

global $wp;
$tradeURL = home_url( $wp->request ) . '/trade-index';

?>

<div class="main-content has-background-dark">
<div class="main-grid">
    <section id="homepage-text-section" class="section has-background-dark has-text-centered">
            <h1 class="title is-4 has-text-white">It looks like your are not connected!</h1>
            <h1 class="title is-2 is-lime">Signup to start managing</h1>
            <div class="flex-centered">
            <?php include(get_template_directory() . '/template-parts/join-us-button.php') ?>
            </div>
            <br />

            <h1 class="title is-5 has-text-white">To continue without login click <a href="<?php echo $tradeURL ?>">here</a></h1>
            
    </section> 
</div>
</div>



