<div class="has-text-centered survey-container" id="survey_ID_PH">
	<!-- insert question here -->
	<h3 class="title is-5"><strong>QUESTION_I18N : </strong>QUESTION_PH</h3>
	<!-- insert div for images -->
	<div HIDDEN_SURVEY class="image-gallery" id="image_gallery">
		<div class="card inputDiv">
		<input
		type="HIDDEN_1_PH" 
		class="imageCheckbox" 
		name='image_answer' 
		id="image_1" 
		value="image_1"/><label for="image_1"></label> 
		<label id="image_1_overlay" class="image-label"></label>
		</div>
		<div HIDDEN_2_PH class="card inputDiv">
		<input  
		type="HIDDEN_2_PH" 
		class="imageCheckbox" 
		name='image_answer' 
		id="image_2" 
		value="image_2"/><label for="image_2"></label> 
		<label HIDDEN_2_PH id="image_2_overlay" class="image-label"></label>
		</div>
		<div HIDDEN_3_PH class="card inputDiv">
		<input   
		type="HIDDEN_3_PH" 
		class="imageCheckbox" 
		name='image_answer' 
		id="image_3" 
		value="image_3"/><label for="image_3"></label> 
		<label HIDDEN_3_PH id="image_3_overlay" class="image-label"></label>
		</div>
		<div HIDDEN_4_PH class="card inputDiv">
		<input   
		type="HIDDEN_4_PH" 
		class="imageCheckbox" 
		name='image_answer' 
		id="image_4" 
		value="image_4"/><label for="image_4"></label> 
		<label HIDDEN_4_PH id="image_4_overlay" class="image-label"></label>
		</div>

	</div>
	<input 
		HIDDEN_SURVEY
		class="button is-success" 
		type="button" 
		value="Submit"
		onclick="multImageSubmit(checkedValue, ID_PH)">
		<div HIDDEN_ANSWER_PH class="columns answer-container" style="margin: 10px !important; width:70%;">
			<figure class="column is-1" style="display:flex; flex-direction:column; align-items:center; justify-content:center; width: 30%">
				<img src="IMAGE_ANSWER_PH" style="max-width:100px">
				<figcaption style="background:yellow; width:100px; color: black">your choice</figcaption>
			</figure>
			<div class="all_ans column" style="display:flex; flex-wrap:wrap; justify-content:space-around; width: 70%">
				<figure HIDDEN_ANS1_PH style="display:flex; flex-direction:column; align-items:center;">
					<img src="IMAGE1_PH" style="max-width:100px">
					<figcaption style="background:yellow; width:100px; color: gray; background-image: linear-gradient(to right, blue IM1PHpx, yellow 1px, yellow)">IM1PH%</figcaption>
				</figure>
				<figure HIDDEN_ANS2_PH style="display:flex; flex-direction:column; align-items:center;">
					<img src="IMAGE2_PH" style="max-width:100px">
					<figcaption style="background:yellow; width:100px; color: gray; background-image: linear-gradient(to right, blue IM2PHpx, yellow 1px, yellow)">IM2PH%</figcaption>
				</figure>
				<figure HIDDEN_ANS3_PH style="display:flex; flex-direction:column; align-items:center;">
					<img src="IMAGE3_PH" style="max-width:100px">
					<figcaption style="background:yellow; width:100px; color: gray; background-image: linear-gradient(to right, blue IM3PHpx, yellow 1px, yellow)">IM3PH%</figcaption>
				</figure>
				<figure HIDDEN_ANS4_PH style="display:flex; flex-direction:column; align-items:center;">
					<img src="IMAGE4_PH" style="max-width:100px">
					<figcaption style="background:yellow; width:100px; color: gray; background-image: linear-gradient(to right, blue IM4PHpx, yellow 1px, yellow)">IM4PH%</figcaption>
				</figure>
			</div>
		</div>
</div>

<script>
var checkedValue = null; 
jQuery("input:checkbox").on('click', function() {
	jQuery('.inputDiv').css({"border":""} );
  // in the handler, 'this' refers to the box clicked on
  var $box = jQuery(this);
  if ($box.is(":checked")) {
 
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
   
    jQuery(group).prop("checked", false);
	$box.prop("checked", true);
	checkedValue = $box.context.value;
	let id = $box.context.value
	$box.parents('.inputDiv').css({"border":"3px solid yellow"} );

  } else {
	$box.prop("checked", false);
	checkedValue =null;
	$box.parents('.inputDiv').css({"border":"noborder"} );
  }
});
</script>

<style>
	
input[type=checkbox] {
display:none;
}
 
input#image_1[type=checkbox] + label
{
background-image: url("IMAGE1_PH");
background-size: 100% 100%;
background-repeat: no-repeat;
border-color: white;
border-style: solid;
height: 138px;
width: 110px;
display:inline-block;
padding: 0 0 0 0px;
}

input#image_2[type=checkbox] + label
{
background-image: url("IMAGE2_PH");
background-size: 100% 100%;
background-repeat: no-repeat;
border-color: white;
border-style: solid;
height: 138px;
width: 110px;
display:inline-block;
padding: 0 0 0 0px;
}

input#image_3[type=checkbox] + label
{
background-image: url("IMAGE3_PH");
background-size: 100% 100%;
background-repeat: no-repeat;
border-color: white;
border-style: solid;
height: 138px;
width: 110px;
display:inline-block;
padding: 0 0 0 0px;
}

input#image_4[type=checkbox] + label
{
background-image: url("IMAGE4_PH");
background-size: 100% 100%;
background-repeat: no-repeat;
border-color: white;
border-style: solid;
height: 138px;
width: 110px;
display:inline-block;
padding: 0 0 0 0px;
}


input[type=checkbox]:checked {
	border: 2px solid yellow;
}

.image-gallery{
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
}
.inputDiv{
	display: flex;
	flex-direction: column;
	text-align: center;
	margin: 5px;
}

.image-label{
	width: 100%;
	background: yellow;
	color: black;
	font-weight: bolder;
}
</style>