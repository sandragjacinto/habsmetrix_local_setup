<!-- post template when presented on the frint end -->
<ul class="list-unstyled core-metrix-container" id="core-metrixID_PH">
	<div class="core-metrix-item-info">
		<li class="title is-6 is-uppercase has-text-weight-semibold has-text-lime">TITLE_PH</li>
		<li HIDDEN_PLAYER_PH class="title is-6">NUMBER_PH</li>
		<li class="subtitle is-7"> POSITION_PH</li>
	</div>
	<li HIDDEN_CURRENT_VALUATION> Current : CURRENT_PH</li>
	<!-- ANSWER -->
	<div HIDDEN_ANSWER_PH id="answerID_PH">
	<div class="trade-index-val" >
		<div class="my-trade-index-answer-slider LOG_INFO_PH" onclick="showPoll(ID_PH)">
		<div class="answers-container" style="background-image: linear-gradient(to right, #34CCFF AVERAGE_PH% , #111221 1%);">
			<div class="my-answer" style="width:ANSWER_PH%;"></div>
		</div>
		<div class="label-slider">
			<label id="left-label" class="has-text-grey">MIN_TEXT_PH</label>
			<label id="right-label" class="has-text-grey">MAX_TEXT_PH</label>
		</div>
		</div>
		<div class=" my-trade-index-answer">
		<!-- <input 
		HIDDEN_UPDATE_PH
		id="updateID_PH"
		class="button title is-7 is-black is-small is-pulled-right" 
		id="trade-index-value-ID_PH" 
		type="button" value="Update"
		onclick="showPoll(ID_PH)"> -->
		</div>
	</div>
	</div>

	<!-- SLIDER -->
	<div HIDDEN_SLIDER_PH class="core-metrix-type" id="pollID_PH">
	<div id="poll_typePOLL_TYPE_PH" class="poll-slider">
		<div id="recipe_rating" class="slider-container">
		<output name="outputSlider" id="valueOutput_ID_PH">UNITY_PH STARTSLIDER_PH</output>
			<input  
				id="sliderPlayer_ID_PH" 
				class="core-slider" 
				type="range" 
				name="ID_PH" 
				min="MIN_PH" 
				max="MAX_PH" 
				step="STEP_PH" value="STARTSLIDER_PH"
				oninput="inputChange(valueOutput_ID_PH, sliderPlayer_ID_PH)"
				onchange="collectAllSlyderTypeAnswers(ID_PH)"
				onTap="collectAllSlyderTypeAnswers(ID_PH)">
    
			<div class="core-slider-labels">
				<label id="left-label">UNITY_PH MIN_TEXT_PH</label>
				<label id="right-label">UNITY_PH MAX_TEXT_PH</label>
			</div>
		</div>

		</div>
	</div>
</ul>

<script>
	function inputChange(outputval, inputval) {
	if (inputval.value > 999999) {
		output2display = (inputval.value/1000000).toFixed(1) + ' M';
	}else if(inputval.value > 999){
		output2display = (inputval.value/1000).toFixed(0) + ' k';
	} else if(inputval.value < 11){
		output2display = inputval.value;
	} 
	outputval.value = 'UNITY_PH ' + output2display;
}

</script>