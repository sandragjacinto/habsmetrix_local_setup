<?php
/*
* footer with progressbar
*/

require (get_template_directory() .'/template-helpers/progress-percentage-calculator.php');

$id = '40'; //(string) (required) Menu 'id','name' or 'slug'
$menu = wp_get_nav_menu_object( $id );
$progress_text = get_field('progressbar_title', $menu);
?>	

<footer class="has-background-dark">
<div class="columns">
<div class="column is-2"></div>

    <div class="column is-7">

		<div class="progress-container">
			<h1 class=" is-7 is-size-9-mobile is-uppercase has-text-weight-semibold has-text-white"><?php echo $progress_text ?> <?php echo $percentage_progress ?>%</h1>
			
			<div class="progress-flex">

				<section class="progress-bar-section">
					<div class="progress-bar-container" style="height:13px; width:100%; background-color:#111221;">
						<div class="progress-bar" 
						style="width:<?php echo $percentage_progress ?>%; height:13px; background-image: linear-gradient(to right, #e6ff00, green);">
							<p class="title is-6"><?php echo $percentage_progress ?>%</p>
						</div>
					</div> <!--progress-bar-container-->
				</section>
				<?php
				if(is_user_logged_in()) { ?>
					<input id="submitAll" type="button" class="button title is-7 is-small is-warning" value="submit all" style=" cursor: pointer;" onClick=''>
				<?php }else{ ?>
					<input id="notAble2submitAll" type="button" class="button title is-7 is-small is-warning" value="submit all" style=" cursor: pointer;" onClick=''>
				<?php } ?>
			</div> <!--progress-flex-->
			
		</div> <!--progress-container-->
	</div>  <!--column is-7-->
</div> <!--columns-->

    

</footer>
</div>
<?php wp_footer();?>

</body>
</html>
