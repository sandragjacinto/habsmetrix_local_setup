// rational for rating
// gets the data on click and submits it to the obj using ajax
let form = {
	action : '',
	rid: undefined,
	type: '',
	rating: undefined,
	relevance: ''
}

function  orderImageSubmit(values, ID){
	// let $selectValue = jQuery(`input[name=${ID}]`);	
	let $inputID = ID;
	let $type = "order";
	let $val = values;
	
	form.action = "r_rate_survey";
	form.rid = $inputID;
	form.type = $type;
	form.rating = $val;
	// let form = {
	// 		action: 	"r_rate_survey",
	// 		rid: 		$inputID,
	// 		type: 		$type,
	// 		rating: 	$val
	// 	};
	// window.location.reload(); 

		jQuery.post( survey_obj.ajax_url, form ).always(function(response){
			if(response.status == 2) {
				jQuery(`#survey_${ID}`).html('<div class="alert alert-success">Thank you, your answer is being submitted!</div>');
			} else {
				jQuery(`#survey_${ID}`).html('<div class="alert alert-danger">Unable to submit survey. Please fill in all fields</div>');
			}
			jQuery(`#survey_${ID}`).show();
		});
};

function  multImageSubmit(value, ID){
	// let $selectValue = jQuery(`input[name=${ID}]`);
	let $inputID = ID;
	let $type = "MCI";
	let $val = value;
	// let form = {
	// 		action: 	"r_rate_survey",
	// 		rid: 		$inputID,
	// 		type: 		$type,
	// 		rating: 	$val
		// };
		// window.location.reload(); 
	form.action = "r_rate_survey";
	form.rid = $inputID;
	form.type = $type;
	form.rating = $val;

		jQuery.post( survey_obj.ajax_url, form ).always(function(response){
			if(response.status == 2) {
				jQuery(`#survey_${ID}`).html('<div class="alert alert-success">Thank you, your answer is being submitted!</div>');
			} else {
				jQuery(`#survey_${ID}`).html('<div class="alert alert-danger">Unable to submit survey. Please fill in all fields</div>');
			}
			jQuery(`#survey_${ID}`).show();
		});
};

function  multTextSubmit(ID){
	let $inputID = ID;
	let $type = "MCT";
	let $radios = jQuery(`input[name=${$inputID}]`);
	let $checked = $radios.filter(function() {
		return jQuery(this).prop('checked');
		});
	if($checked.val()){
		
	// let form = {
	// 		action: 	"r_rate_survey",
	// 		rid: 		$inputID,
	// 		type: 		$type,
	// 		rating: 	$checked.val()
	// 	};
	// 	window.location.reload(); 
	form.action = "r_rate_survey";
	form.rid = $inputID;
	form.type = $type;
	form.rating = $checked.val();

		jQuery.post( survey_obj.ajax_url, form ).always(function(response){
			if(response.status == 2) {
				jQuery(`#survey_${ID}`).html('<div class="alert alert-success">Thank you, your answer is being submitted!</div>');
			} else {
				jQuery(`#survey_${ID}`).html('<div class="alert alert-danger">Unable to submit recipe. Please fill in all fields</div>');
			}
			jQuery(`#survey_${ID}`).show();
		});
	}else{
		alert('you must select a choice')
	}
};



function  RangeSubmit(ID){
	let $selectValue = jQuery(`input[name=${ID}]`);
	let $inputID = ID;
	let $type = "RANGE";
	if($selectValue[0].value!=="0"){
		// let form = {
		// 		action: 	"r_rate_survey",
		// 		rid: 		$inputID,
		// 		type: 		$type,
		// 		rating: 	$selectValue[0].value
		// 	};
		// 	window.location.reload(); 
		form.action = "r_rate_survey";
		form.rid = $inputID;
		form.type = $type;
		form.rating = $selectValue[0].value;
			

			jQuery.post( survey_obj.ajax_url, form ).always(function(response){
				if(response.status == 2) {
					jQuery(`#survey_${ID}`).html('<div class="alert alert-success">Thank you, your answer is being submitted!</div>');
				} else {
					jQuery(`#survey_${ID}`).html('<div class="alert alert-danger">Unable to submit recipe. Please fill in all fields</div>');
				}
				jQuery(`#survey_${ID}`).show();
			});
	}else{
		alert('please drag the slider')
	}
	
};

if(!touchEvent){
	let touchEvent = 'ontouchstart' in window ? 'touchstart' : 'click';
	console.log('touchEvent: ', touchEvent);
	}

jQuery(document).ready(function($) {

	// $('#survey-form').on('submit', function(e){
	// 	e.preventDefault();

	// 	$(this).hide();
	// 	$('#survey-status').html('<div class="alert alert-info text-center">Please wait!</div>');
		
		
	// 	let surveyForm = {
	// 		action:			"ha_submit_user_survey",
	// 		content:		"",
	// 		question:		$("#ha_surveyQuestion").val(),
	// 		startDate:		$("#ha_startDate").val(),
	// 		endDate:		$("#ha_endDate").val(),
	// 	}

	// 	$.post(survey_obj.ajax_url, surveyForm).always(function(data){
	// 		if(data.status == 2){
	// 			$('#survey-status').html(
	// 				'<div class="alert alert-success text-center">Survey submitted successfully!</div>'
	// 				);
	// 		}else{
	// 			$('#survey-status').html(
	// 				'<div class="alert alert-danger text-center">Unable to submit the survey. Please fill in all fields.</div>'
	// 				);
	// 				$("#survey-form").show();
	// 		}
	// 	});
	// });


	// $(".relevance").on(touchEvent,function() {
	// 	$(".icon-button").css('background-color', '');
	// 	$(this).children().css('background-color', 'cadetblue');
	// 	// let relevanceAnswer = $(this).prop('ID');
	// 	form.relevance = $(this).prop('ID');

	// });

})