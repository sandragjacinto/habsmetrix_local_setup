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

	

	<div HIDDEN_ANSWER_PH id="answerID_PH">
	<div class="trade-index-val" >
		<div class="my-trade-index-answer-slider LOG_INFO_PH">
		<div class="answers-container" style="background-image: linear-gradient(to right, blue AVERAGE_PH% , #111221 1%);">
			<div class="my-answer" style="width:ANSWER_PH%;"></div>
		</div>
		<div class="label-slider">
			<label id="left-label" class="has-text-grey">MIN_PH</label>
			<label id="right-label" class="has-text-grey">MAX_PH</label>
		</div>
		</div>
		<div class=" my-trade-index-answer">
		
		</div>
	</div>
	</div>


</div>


<style>
	.range-slider{
		display: flex;
		justify-content: space-around;
	}
</style>