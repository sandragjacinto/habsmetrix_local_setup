<?php 
$addClass = "logged";
if(!is_user_logged_in()){
    $addClass = "";
}

?>
<section class="section has-background-dark mobile-page <?php echo $addClass ?>">
<div class="columns">
<div class="column is-3"></div>
    <div id="survey_and_core_container" class="column is-6">

    <?php if ($the_query->have_posts()) : ?>
    
    <h1 class="title is-5 is-lime is-uppercase"> <?php echo get_the_title(); ?>  </h1>

    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

        <div class="core-content"> <?php  the_content(); ?> </div>

    <?php endwhile;
    else : ?>

    <h1 class="title is-5 is-lime is-uppercase"> The <?php echo get_the_title(); ?>  poll has not been added yet! </h1>    


    <?php endif; ?>	

    <div id="next_steps_instructions" class="is-flex" style="display:none !important;">
    <br>
        <h1 class="title is-6 is-lime is-uppercase" style="width:75%; margin-right: 5px !important;"> 
        Click to continue managing the team !
        </h1>
        <?php include (get_template_directory() . $buttonPath) ?>
        
    </div>


    </div>
</div>
</section>

<script>
jQuery(document).ready(function($) {

    if($(".core-metrix-type").last().is(":hidden")) {
       
        $("#next_steps_instructions").css('display','inherit');
    }

})
</script>