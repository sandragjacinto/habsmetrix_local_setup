<?php get_template_part('/template-parts/header-switcher'); ?>
<?php 
        if( have_posts() ) {
            while ( have_posts() ) {
                the_post(); ?>
                                <?php
                the_content();    
                } 
                }
     		?>
        </div>

<?php get_footer('no-progress') ?>