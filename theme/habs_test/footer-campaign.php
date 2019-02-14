<?php
/*
* footer with just submit for campaign
*/

?>	

<footer class="has-background-dark">
<div class="columns">
<div class="column is-2"></div>

    <div class="column is-7">

		<div class="progress-container">
			
			<div class="progress-flex">
				<?php
				if(is_user_logged_in()) { ?>
					<input id="submitAll" type="button" class="button title is-7 is-small is-warning is-pulled-right" value="submit all" style=" cursor: pointer;" onClick=''>
				<?php }else{ ?>
					<input id="notAble2submitAll" type="button" class="button title is-7 is-small is-warning is-pulled-right" value="submit all" style=" cursor: pointer;" onClick=''>
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
