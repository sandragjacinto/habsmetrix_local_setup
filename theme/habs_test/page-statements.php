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
                        'post_type' => 'survey_post',
                        'orderby'   => 'date',
	                    'order'     => 'DESC',
                        'posts_per_page' => 100,
                        'meta_query' => array(
                            array(
                            'key'     => 'type',
                            'value'   => 'STATEMENT'
                            )
                            )
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
                }else{
                    ?>
                    <h1 class="title is-5 is-lime is-uppercase"> No statements for the moment! </h1>    
                    <?php
                }
            }
            ?>
	
</div>
</section>

<!-- <?php get_footer('no-progress') ?> -->