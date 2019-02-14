<?php
    
    /**name
    * Template Name: Surveys 
    */


    if(is_user_logged_in()){
        get_header();
    }else{
        get_header('front');
    }
    $addClass = "logged";
    if(!is_user_logged_in()){
        $addClass = "";
    }

?>
<!-- main home content -->

<section class="section has-background-dark mobile-page <?php echo $addClass ?>">
<div class="columns">
<div class="column is-3"></div>
    <div id="survey_and_core_container" class="column is-6">
        <?php 
            if( have_posts() ) {
            $rp_query   = new WP_Query ( array(
                        'post_type'        => 'survey_post',
                        'orderby' => 'date',
	                    'order'   => 'DESC',
                        'posts_per_page' => 100
                        ,
                        )) ;
                if($rp_query-> have_posts() ){
                while ( $rp_query->have_posts() ) {
                    $rp_query->the_post();
                    // var_dump($rp_query)
                    ?>
                    <div class="box">
                        
                        <h3 class="title"> <a href="<?php the_permalink() ?>">  <?php the_title(); ?> </a> </h3>
                        
                        <?php echo get_the_date() ?>
                    </div>

                    <?php 
                    }
                }
            }
            ?>
        <div class="is-fullwidth" style="display:flex; justify-content:space-between">
            <li class="previous"><?php previous_posts_link('< Newer Entries' ); ?> </li>
            <li class="next"><?php next_posts_link( 'Older Entries >' ); ?></li>
        </div>
    </div>
</div>
</section>
     

<!-- end of main home content -->
<?php get_footer ('no-progress');?>