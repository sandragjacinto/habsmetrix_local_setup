<?php 
get_template_part('/template-parts/header-switcher'); 
?>
<section class="section has-background-dark mobile-page <?php echo $addClass ?>">
<div class="columns">
<div class="column is-3"></div>
    <div id="survey_and_core_container"  class="column is-6">
    <?php 
            if( have_posts() ) {
            $rp_query   = new WP_Query ( array(
                        'post_type' => 'report',
                        'orderby'   => 'date',
	                    'order'     => 'DESC',
                        'posts_per_page' => 100,
                        )) ;
                if($rp_query-> have_posts() ){
                while ( $rp_query->have_posts() ) {
                    $rp_query->the_post();
                    ?>
                    <a href="<?php the_permalink() ?>">
                    <div class="box report-box">
                        <div class="is-box-inlne">
                        <h3 class="title is-uppercase is-paddingless">   
                            <?php the_title(); ?> 
                        </h3>
                            <p class="title is-7 is-italic is-pulled-rights"><?php echo get_the_date( ) ?></p>
                        </div>
                        
                        <figure class="image">
                            <img src='<?php echo get_field('report_image', get_the_ID()) ?>'>
                        </figure>
                        
                    </div>
                    </a> 

                    <?php 
                    }
                }else{
                    ?>
                    <h1 class="title is-5 is-lime is-uppercase"> No reports for the moment! </h1>    
                    <?php
                }
            }
            ?>
	
</div>
</section>

<!-- <?php get_footer('no-progress') ?> -->