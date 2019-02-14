<?php

global $wp;

 if(is_user_logged_in()){
    $current_user = wp_get_current_user();
 }
 require (get_template_directory() .'/template-helpers/progress-percentage-calculator.php');
 $newUser = true;
 $progressComplete = false;
 if($percentage_progress > 0){
    $newUser = false;
 } else if ($percentage_progress >= 100) {
     $progressComplete = true;
 }

 $userName = $current_user->display_name;

?>
<div class="main-content has-background-dark">
<div class="main-grid">
<section id="homepage-text-section" class="section has-text-centered" >
<?php if(!$newUser && !$progressComplete) {?> 
    <h1 class="title is-5 has-text-white"> 
        Welcome  back <?php echo $userName ?> 
    </h1>
    <h1 class="title is-6 has-text-white">
        Good work! You have already managed <span class="title is-5 has-text-lime"><?php echo $percentage_progress ?>%</span>
        of the team.
    </h1>
<?php } else if (!$newUser && $progressComplete) { ?> 
    <h1 class="title is-5 has-text-white"> 
        Welcome  back <?php echo $userName ?> 
    </h1>
    <h1 class="title is-6 has-text-white">
        Good work! You managed <span class="title is-5 has-text-lime"><?php echo $percentage_progress ?>%</span>
        of the team. Keep your management decisions to date!
    </h1>
<?php } else { ?> 
    <h1 class="title is-4 has-text-white"> 
        Welcome to habsmetrix <?php echo $userName ?> 
    </h1>
    <h1 class="title is-6 has-text-white">
        Click on one of the five buttons to start managing the team!
    </h1>
<?php } ?>

    <?php 
    $rp_query   = new WP_Query ( array(
                        'post_type' => 'report',
                        'orderby'   => 'date',
	                    'order'     => 'DESC',
                        'posts_per_page' => 1,
                        )) ;
                if($rp_query-> have_posts() ){ 
                while ( $rp_query->have_posts() ) {
                    $rp_query->the_post();
                    ?>
            <a href="<?php echo the_permalink() ?>">
                <h1 class="title is-7 has-text-link">
                    Check the latest report
                </h1>
            </a>
     <?php }} ?>

</section>
</div>
</div>