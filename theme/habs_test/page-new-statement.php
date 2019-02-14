<?php 
get_template_part('/template-parts/header-switcher'); 
?>
<section class="section has-background-dark mobile-page <?php echo $addClass ?>">
<div class="columns">
<div class="column is-3"></div>
    <div id="survey_and_core_container"  class="column is-6">
	<div class=" has-background-dark">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<!-- post -->
					<?php the_content(); ?>

				<?php endwhile; ?>
				<!-- post navigation -->
				<?php else: ?>
				<!-- no posts found -->
				<?php endif; ?>

	</div>
</div>
</section>

<!-- <?php get_footer('no-progress') ?> -->