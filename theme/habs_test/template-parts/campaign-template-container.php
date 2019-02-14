<?php 
$addClass = "logged";
if(!is_user_logged_in()){
    $addClass = "";
}
$existsPost = false;
?>
<section class="section has-background-dark mobile-page <?php echo $addClass ?>">
<div class="columns">
<div class="column is-3"></div>
    <div id="survey_and_core_container"  class="column is-6">
        <div id="campaign_instructions" class="box has-background-dark is-paddingless" style="display:none;">
            <h1 class="title is-6 is-lime is-uppercase"> <?php echo $campaign_text1; ?>  </h1>
            <h1 class="title is-6 is-lime is-uppercase is-marginless is-paddingless"> <?php echo $campaign_text2; ?>  </h1>
        </div>
        <div id="result_instructions" class="box has-background-dark is-paddingless" style="display:none;">
            <h1 class="title is-6 is-lime is-uppercase"> Good job!  </h1>
            <h1 class="title is-7 has-text-white is-uppercase"> 
                Your answers are in green, the fan average is in blue... How did you do?  
            </h1>
        </div>
        
        <?php if ($the_query->have_posts()) : ?>
        
        <h1 class="title is-6 is-lime is-uppercase"> <?php echo $title; ?>  </h1>

    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

    <?php if (in_array(get_the_title(), $title_array)) : ?>
     <?php $existsPost = true ?>   
        <div class="core-content"> <?php  the_content(); ?> </div>
        <script>
        jQuery(document).ready(function($) {
            if($(".core-metrix-type").is(":hidden")) {
                $("#campaign_instructions").css('display','none');
                $("#result_instructions").css('display','inherit');
                $("#next_steps_instructions").css('display','inherit');
            }else{
                $("#campaign_instructions").css('display','inherit');
            }

        })
        </script>
    <?php endif; ?>	
        
    <?php endwhile; ?>
    <?php endif; ?>
    
        <?php if(!$existsPost) { ?>
        ="title is-6 is-lime is-uppercase"> The <?php echo $title; ?>  poll campaign has not been added yet! </h1>    
    <?php } ?>

    
    	

    <div id="next_steps_instructions" style="display:none;">
    <br>
        <h1 class="title is-6 is-lime is-uppercase"> 
            Want to rate the whole team?  
            <br>
            Click on the item below!
        </h1>
        <?php include (get_template_directory() . $buttonPath) ?>
        
    </div>


    </div>
</div>
</section>

