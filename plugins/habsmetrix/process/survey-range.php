<div class="has-text-centered" id="survey_ID_PH">
	<!-- post template when presented on the frint end -->
	<h1 id="question" class="subtitle is-6">On a range from MIN_PH to MAX_PH QUESTION_PH</h1>
	<div id="poll_typePOLL_TYPE_PH" HIDDEN_SURVEY class="range-slider">
		<div id="range_rating" class="slider-scale">
			<input  
				id="sliderPlayerID" 
				class="core-slider" 
				type="range" 
				name="ID_PH" 
				min="MIN_PH" 
				max="MAX_PH" 
				step="STEP_PH" value="VALUE_PH"
				oninput="valueOutputPlayerId.value = sliderPlayerID.value">
    
			<div class="core-slider-labels">
				<label>MIN_PH</label>
				<label>MAX_PH</label>
			</div>
		</div>
		<output name="outputPlayerSlider" id="valueOutputPlayerId">MIN_PH</output>
	</div>
	<input 
	HIDDEN_SURVEY
	class="button is-success" 
	type="button" 
	value="Submit"
	onclick="RangeSubmit(ID_PH)">

	<div HIDDEN_ANSWER_PH class="answer-container columns" style="margin: 10px">
		<div class="column">
		<input 
		class="button is-small is-link" 
		type="button" 
		value="YOUR ANSWER" 
		DISABLEDBUTTON_PH >
		<input 
		readonly 
		class="button title is-7 is-small is-dark" 
		id="trade-index-value-ID_PH" 
		type="text" value="ANSWER_VAL_PH"
		data-tip="you need to be logged in to change this value" >
		</div>
		<div class="column">
		<input 
		class="button is-small is-info" 
		type="button" 
		value="AVERAGE OPINION" 
		DISABLEDBUTTON_PH >
		<input 
		readonly 
		class="button title is-7 is-small is-dark" 
		id="trade-index-value-ID_PH" 
		type="text" value="MEAN_VAL_PH"
		data-tip="you need to be logged in to change this value" >
		</div>
	</div>


</div>


<style>
	.range-slider{
		display: flex;
		justify-content: space-around;
	}
</style>