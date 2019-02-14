<?php 
get_template_part('/template-parts/header-switcher'); 
?>

<section class="section has-background-dark">
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
</section>

<!-- <?php get_footer() ?> -->