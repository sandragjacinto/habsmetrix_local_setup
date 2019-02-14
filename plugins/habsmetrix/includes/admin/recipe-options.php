<?php 
// post template on admin side
// has rational for different types of polls
// if trade index || slider 

function r_poll_options_mb($post) {
	
	$recipe_data			= get_post_meta( $post->ID, 'recipe_data', true );

	// if( empty($recipe_data) ){
	// 	$recipe_data			= array(
	// 		'ingredients'		=> '',
	// 		'time'				=> '',
	// 		'utensils'			=> '',
	// 		'level'				=> '',
	// 		'type'				=> '',
	// 		'minValue'			=> 0,
	// 		'maxValue'			=> 10,
	// 		'steps'				=> 1
	// 	);
	// }
	// ?> 

	// <div class="form-group">
    // <label>Ingredients</label>
    // <input type="text" class="form-control" name="r_inputIngredients" value="<?php echo $recipe_data['ingredients'] ?>">
	// 	</div>
	// 	<div class="form-group">
	// 	    <label>Cooking Time Required</label>
	// 	    <input type="text" class="form-control" name="r_inputTime" value="<?php echo $recipe_data['time'] ?>">
	// 	</div>
	// 	<div class="form-group">
	// 	    <label>Utensils</label>
	// 	    <input type="text" class="form-control" name="r_inputUtensils" value="<?php echo $recipe_data['utensils'] ?>">
	// 	</div>
	// 	<div class="form-group">
	// 	<label>Poll type</label>
    //     <select class="form-control" id="r_inputType">
    //         <option value="trade_index">Trade Index</option>
    //         <option value="slider_poll">Slider Poll</option>
    //     </select>
	// 	</div>
	// 	<div id="show_option"></div>
		

	// 	<script>
	// 	jQuery('select').on('change', function(){
	// 		if (this.value === "slider_poll"){
	// 			jQuery("#show_option")
	// 			.append(
	// 				`<div id="select_values">
	// 					<label>Min Value</label>
	// 					<input type="text" class="form-control" name="r_inputMinValue" value="<?php echo $recipe_data['minValue'] ?>">
	// 					<label>Max Value</label>
	// 					<input type="text" class="form-control" name="r_inputMaxValue" value="<?php echo $recipe_data['maxValue'] ?>">
	// 					<label>Steps Size</label>
	// 					<input type="text" class="form-control" name="r_inputStepSize" value="<?php echo $recipe_data['steps'] ?>">
	// 				</div>`);
	// 		} else {
	// 			jQuery("#select_values").
	// 			remove();
	// 		}	
	// 	})
	// 	</script>

	<?php 
}