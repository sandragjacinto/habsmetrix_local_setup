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
                <p class="title is-7 has-text-white is-italic is-pulled-rights"><?php echo get_the_date( ) ?></p>
                <a href='<?php echo get_field('report_image', get_the_ID()) ?>'>
                <figure class="image">
                            <img src='<?php echo get_field('report_image', get_the_ID()) ?>'>
                        </figure>
                        </a>
                <?php
                the_content();    
                } 
                }
     		?>
        </div>
    </div>
    </div>
  
</section>
<?php get_footer('no-progress') ?>

