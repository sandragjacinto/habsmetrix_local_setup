<?php get_template_part('/template-parts/header-switcher'); 
$addClass = "logged";
if(!is_user_logged_in()){
    $addClass = "";
}
?>

<section class="section has-background-dark mobile-page <?php echo $addClass ?>">
<div class="columns">
<div class="column is-3"></div>
    <div id="survey_and_core_container"  class="column is-6">
    <div id="single_post_box_container" class="box has-text-centered has-background-dark">
        <div id="feedback_container"></div>
    	<?php 
        if( have_posts() ) {
            while ( have_posts() ) {
                the_post(); ?>
                
               <!-- <h1 class="title is-1 is-lime"> <?php the_title(); ?> </h1> -->
                <?php
                the_content();    
                } 
                }
                include(get_template_directory() . '/template-parts/relevant-irrelevant-buttons.php')
     		?>
        </div>
    </div>
    </div>
    <div class="section is-fullwidth" style="display:flex; justify-content:space-between">
                <div class="previous"> <?php previous_post_link(); ?> </div>
                <div class="next"> <?php next_post_link(); ?> </div>
        </div>
</section>
<?php get_footer('single') ?>

