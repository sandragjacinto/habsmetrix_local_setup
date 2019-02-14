<div class="has-text-centered" id="survey_ID_PH">
	<!-- insert question here -->
	<h3 class="title is-5"><strong>QUESTION_I18N : </strong>QUESTION_PH</h3>
	<!-- insert div for images -->
	<div HIDDEN_SURVEY class="image-gallery" id="image_gallery">
		<div class="card inputDiv">
		<input
		onchange=check(id)
		type="HIDDEN_1_PH" 
		class="imageCheckbox" 
		name='image_1_overlay' 
		id="image_1" 
		value="image_1"/><label for="image_1"></label> 
		<label id="image_1_overlay" class="image-label"></label>
		</div>
		<div class="card inputDiv">
		<input 
		onchange=check(id) 
		type="HIDDEN_2_PH" 
		class="imageCheckbox" 
		name='image_2_overlay' 
		id="image_2" 
		value="image_2"/><label for="image_2"></label> 
		<label id="image_2_overlay" class="image-label"></label>
		</div>
		<div class="card inputDiv">
		<input  
		onchange=check(id) 
		type="HIDDEN_3_PH" 
		class="imageCheckbox" 
		name='image_3_overlay' 
		id="image_3" 
		value="image_3"/><label for="image_3"></label> 
		<label id="image_3_overlay" class="image-label"></label>
		</div>
		<div class="card inputDiv">
		<input  
		onchange=check(id) 
		type="HIDDEN_4_PH" 
		class="imageCheckbox" 
		name='image_4_overlay' 
		id="image_4" 
		value="image_4"/><label for="image_4"></label> 
		<label id="image_4_overlay" class="image-label"></label>
		</div>
		</div>

		<input 
		HIDDEN_SURVEY
		class="button is-success" 
		type="button" 
		value="Submit"
		onclick="orderImageSubmit(answerArray, ID_PH)">
			
		<div HIDDEN_ANSWER >
			<div class="array-images">
				<figure HIDDEN_ANSWER_1>
					<img HIDDEN_ANSWER_1 class="order-ans-img" src="IMG_1_URL">
					<figcaption HIDDEN_ANSWER_1>1st choice</figcaption>
				</figure>
				<figure HIDDEN_ANSWER_2>
					<img HIDDEN_ANSWER_2 class="order-ans-img" src="IMG_2_URL">
					<figcaption HIDDEN_ANSWER_2>2nd choice</figcaption>
				</figure>
				<figure HIDDEN_ANSWER_3>
					<img HIDDEN_ANSWER_3 class="order-ans-img" src="IMG_3_URL">
					<figcaption HIDDEN_ANSWER_3>3rd choice</figcaption>
				</figure>
				<figure HIDDEN_ANSWER_4>
					<img HIDDEN_ANSWER_4 class="order-ans-img" src="IMG_4_URL">
					<figcaption HIDDEN_ANSWER_4>4th choice</figcaption>
				</figure>
			</div>
		</div>
		
</div>

<script>
var checkedValue = null; 
let answerArray = [];
let order = null;
let testExist = null;



// action when checkbox clicked
function check(id){
	let inputElement = document.getElementById(id);
	if(inputElement.checked){ //if checked adds to the array
		testExist = answerArray.indexOf(id); //checks if already exists in array
		if (!(testExist > -1)){
			answerArray.push(id);
			// order = jQuery.inArray(id, answerArray) //checks the position in the array
			document.getElementById(id+"_overlay").innerHTML = (jQuery.inArray(id, answerArray))+1;
		}
	}else if(!inputElement.checked){ //if unchecked splice from the array
		order = jQuery.inArray(id, answerArray) 
		document.getElementById(answerArray[order]+"_overlay").innerHTML = ''; //empties the text under image
		answerArray.splice(order, 1);
	}	
	for (let pos=0; answerArray[pos]; ++pos){ //reviews all other labels
			order = jQuery.inArray(answerArray[pos], answerArray);
			document.getElementById(answerArray[order]+"_overlay").innerHTML = order+1;
		}
};
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
min-height: 128px;
max-height: 168px;
min-width: 110px;
max-width: 150px;
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
min-height: 128px;
max-height: 168px;
min-width: 110px;
max-width: 150px;
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
min-height: 128px;
max-height: 168px;
min-width: 110px;
max-width: 150px;
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
min-height: 128px;
max-height: 168px;
min-width: 110px;
max-width: 150px;
display:inline-block;
padding: 0 0 0 0px;
}

input#image_1[type=checkbox]:checked + label
{
border-color: yellow;
border-style: solid;
min-height: 128px;
max-height: 168px;
min-width: 110px;
max-width: 150px;
display:inline-block;
padding: 0 0 0 0px;
}
input#image_2[type=checkbox]:checked + label
{
border-color: yellow;
border-style: solid;
min-height: 128px;
max-height: 168px;
min-width: 110px;
max-width: 150px;
display:inline-block;
padding: 0 0 0 0px;
}
input#image_3[type=checkbox]:checked + label
{
border-color: yellow;
border-style: solid;
min-height: 128px;
max-height: 168px;
min-width: 110px;
max-width: 150px;
display:inline-block;
padding: 0 0 0 0px;
}
input#image_4[type=checkbox]:checked + label
{
border-color: yellow;
border-style: solid;
min-height: 128px;
max-height: 168px;
min-width: 110px;
max-width: 150px;
display:inline-block;
padding: 0 0 0 0px;
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