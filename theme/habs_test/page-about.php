<?php get_template_part('/template-parts/header-switcher'); ?>

<section class="section has-background-dark mobile-page">
<div class=" has-background-dark">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!-- post -->
    
    <div class="hero-about">
        <h1 class="title has-text-white"><?php echo get_field('title', 9) ?></h1>
        <div class="hero-about-description">
            <img class="image is-128x128 "src="<?php echo get_field('description_description_image') ?>" >
            <p class="subtitle"><?php echo get_field('description_description_text') ?></p>   
        </div>
    </div>
    <div class="container columns">
    <?php 
         while ( have_rows('collaborators') ) : the_row();
         ?>
         <div class="column is-one-quarter">
            <div class="box">
                <div class="card-image">
                    <figure>
                    <img src="<?php echo the_sub_field('photo') ?>" alt="Placeholder image">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                    <div class="media-left">
                        <figure class="image is-48x48">
                        <img src="<?php echo the_sub_field('photo') ?>" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-4"><?php echo the_sub_field('name'); ?></p>
                        <p class="subtitle is-6">@<?php echo the_sub_field('contact') ?></p>
                    </div>
                    </div>

                    <div class="content has-text-black">
                    <?php echo the_sub_field('description') ?> 
                    </div>
                </div>
            </div>
        </div>
               
         <?php
 
        endwhile;
    ?>
    </div>
    <?php endwhile; ?>
    <!-- post navigation -->
    <?php else: ?>
    <!-- no posts found -->
    <?php endif; ?>

</div>
</section>

<?php get_footer('no-progress') ?>