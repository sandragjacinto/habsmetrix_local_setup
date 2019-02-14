// rational for rating
// gets the data on click and submits it to the obj using ajax
let touchEvent = 'ontouchstart' in window ? 'touchstart' : 'click';

let tradeIndexes = {};
let sliderIndexes = {};
let surveyForm = {
	action : 'r_rate_survey',
	rid: null,
	type: '',
	rating: null,
	relevance: ''
}
let tempArray = [];
let successMessage = '<br />' +
                      '<div id="saving" class="alert alert-success has-text-centered title">' +
                      'Success!'  +
                      '</div>' ;

let errorMessage =  '<br />' +
                    '<div id="saving" class="alert alert-danger has-text-centered title">' +
                    'Oops, Something went wrong! Please try again!'  +
                    '</div>';

function  collectAllIndexTypeAnswers(ID){
    let $inputID = ID;
	let $radios = jQuery(`input[name=${$inputID}]`);
	let $checked = $radios.filter(function() {
        return jQuery(this).prop('checked');
    });
       
    if($checked.val()) {addIndexOrDeleteIfUnchecked($checked.val(), $inputID);}
}

function addIndexOrDeleteIfUnchecked(val, $inputID) {
        if ($inputID in tradeIndexes){
            if(tradeIndexes[$inputID][0] === val){
                jQuery(`input[name=${$inputID}]`).prop('checked', false);
                delete tradeIndexes[$inputID];
            } else {
                tradeIndexes[$inputID] = [val];
                tradeIndexes[$inputID].push('index');
            }
        }else{
            tradeIndexes[$inputID] = [val];
            tradeIndexes[$inputID].push('index');
        }
    }

function  collectAllSlyderTypeAnswers(ID){
	let $selectValue = jQuery(`input[name=${ID}]`);
	let $inputID = ID;

    if($selectValue[0].value!=="0"){
        sliderIndexes[$inputID] = [$selectValue[0].value];
        sliderIndexes[$inputID].push('slider');
    }
    }

  

jQuery(document).ready(function($) {

    $('.tml-social_providers-wrap').append(
        `<p class="register-button-login-text">Don't have an account yet?</p>` +
        `<a href='/wp-signup/' class='button is-warning register-button-login'>REGISTER TO HABSMETRIX</a>`
        );

    $('li.tml-register-link').children().addClass('button is-link');
    
    $('#submitAll').on(touchEvent,function() {  
        
        let submitFromArray = window.location.href.split('/');
        let submitFrom = submitFromArray[submitFromArray.length-2];

        if(submitFrom == 'trade-index' || 
            submitFrom == 'fire-index' || 
            submitFrom == 'management-performance' || 
            submitFrom == 'players-performance' || 
            submitFrom == 'players-valuation' ||
            submitFrom == 'day-1' ||
            submitFrom == 'day-2' ||
            submitFrom == 'day-3' ||
            submitFrom == 'day-4' ||
            submitFrom == 'day-5' ) {

                let arrayOfForms = [];
                var allAnswersObject = Object.assign({}, tradeIndexes, sliderIndexes);
                
                if (!jQuery.isEmptyObject(allAnswersObject)){
                    $('#survey_and_core_container').html(
                        '<br />' +
                        '<div id="saving" class="alert alert-secondary has-text-centered title">' +
                        'Saving ...' +
                        '</div>' 
                    );
                    for($inputID in allAnswersObject) {
                        arrayOfForms.push( {
                            type:       "POST",
                            action: 	'r_rate_core_metrix',
                            rid: 		$inputID,
                            dataType: 	allAnswersObject[$inputID][1],
                            rating: 	allAnswersObject[$inputID][0]
                        });
                        }
                        setTimeout(function(){
                            callAjaxAndSendFormsStatus(arrayOfForms);
                        }, 50);
                        
                }else{
                    alert('Oops! I have zero answers to submit');
                }
        } else {

            if(isObjectEmpty(surveyForm)) {
                $('#feedback_container').html(
                    '<div id="saving" class="alert alert-danger has-text-centered title">' +
                    'Make sure you checked all answers'  +
                    '</div>' 
                    );
            } else {
                
                $('#feedback_container').html(
                    '<br />' +
                    '<div id="saving" class="alert alert-secondary has-text-centered title">' +
                    'Saving ...' +
                    '</div>' 
                );
               
                setTimeout(function(){
                    callAjaxAndSendStatus(surveyForm);
                }, 50);

            }
            
        }

    });
    
    
    $('#notAble2submitAll').on(touchEvent,function() {   
        
        $('#survey_and_core_container').html(
            '<br />' +
            '<h1 class="title has-text-white is-5 has-text-centered">Impossible to submit your answers. </h1>' +
            '<div id="saving" class="alert alert-secondary is-warning has-text-centered title">' +
            'Please login to manage the team' +
            '</div>' 
        );
    
    });


    $(".relevance").on(touchEvent,function() {
		$(".icon-button").css('background-color', '');
		$(this).children().css('background-color', 'cadetblue');

        surveyForm.relevance = $(this).children().attr('id');

    });
    
 
    $(".imageCheckbox").on(touchEvent, function() {
        var checkedValue = null; 

        $('.surveyInputDiv').css({"border":""} );
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
        
            $(group).prop("checked", false);
            $box.prop("checked", true);
            checkedValue = $box.context.value;
            let id = $box.context.value
            $box.parents('.surveyInputDiv').css({"border":"3px solid yellow"} );

        } else {
            $box.prop("checked", false);
            checkedValue =null;
            $box.parents('.surveyInputDiv').css({"border":"noborder"} );
        }
        surveyForm.action = "r_rate_survey";
        surveyForm.rid = $box.parents('.image-gallery').attr('id');
        surveyForm.type = 'MCI';
        surveyForm.rating = checkedValue;

    });


    $(".statement-answer").on(touchEvent, function(){
        surveyForm.action = "r_rate_survey";
        surveyForm.rid = this.id;
        surveyForm.type = 'STATEMENT';
        surveyForm.rating = this.value;
    })

    $(".multi-text-survey-answer").on(touchEvent, function(){

                $(".surveyInputDiv").removeClass("has-background-success");
                let parentClass = '.surveyInputDiv_' + this.children[0].value;
                $(parentClass).addClass("has-background-success");
                $(`input[value=${this.children[0].value}]`).prop("checked", true);
                surveyForm.action = "r_rate_survey";
                surveyForm.rid = this.id;
                surveyForm.type = 'MCT';
                surveyForm.rating = this.children[0].value;
        
    })


    $("#sliderPlayerID").on(touchEvent, function (){
        
        if(this.value!=="0"){
          
            surveyForm.action = "r_rate_survey";
            surveyForm.rid = this.name;
            surveyForm.type = "RANGE";
            surveyForm.rating = this.value;
            console.log('surveyForm: ', surveyForm);
                
        }
        
    });

    $('#survey-form').on('submit', function(e){
		e.preventDefault();

		$(this).hide();
		$('#survey-status').html('<div class="alert alert-info text-center">Please wait!</div>');
		
		
		let newSurveyForm = {
            action:			"ha_submit_user_survey",
			question:		$("#ha_surveyQuestion").val(),
			startDate:		$("#ha_startDate").val(),
			endDate:		$("#ha_endDate").val(),
        }
        if(!isObjectEmpty(newSurveyForm)) {
		$.post(survey_obj.ajax_url, newSurveyForm).always(function(data){
           
			if(data.status == 200){
				$('#survey-status').html(
					'<div class="alert alert-success text-center">Survey submitted successfully!</div>'
					);
			}else{
				$('#survey-status').html(
					'<div class="alert alert-danger text-center">Unable to submit the survey. Please fill in all fields.</div>'
					);
					$("#survey-form").show();
			}
        });
    } else {
        $('#survey-status').html(
            '<div class="alert alert-danger text-center">Unable to submit the survey. Please fill in all fields.</div>'
            );
            $("#survey-form").show();
        }
	});
    

});

function checkOrder(id, nb){
    let order
    let inputElement = document.getElementById(id);

    if(inputElement.checked){ //if checked adds to the array
       
        let testExist = tempArray.indexOf(id); //checks if already exists in array
		if (!(testExist > -1)){
			tempArray.push(id);
			document.getElementById(id+"_overlay").innerHTML = (jQuery.inArray(id, tempArray))+1;
        }

	}else if(!inputElement.checked){ //if unchecked splice from the array
		order = jQuery.inArray(id, tempArray) 
		document.getElementById(tempArray[order]+"_overlay").innerHTML = ''; //empties the text under image
		tempArray.splice(order, 1);
	}	
	for (let pos=0; tempArray[pos]; ++pos){ //reviews all other labels
			order = jQuery.inArray(tempArray[pos], tempArray);
			document.getElementById(tempArray[order]+"_overlay").innerHTML = order+1;
        }
        
        surveyForm.rid = inputElement.parentNode.id;
        surveyForm.type = 'ORDER';
        if(tempArray.length == nb) surveyForm.rating = tempArray;
};

 
function callAjaxAndSendFormsStatus(form2send) { 
   
    for (form in form2send) {
        jQuery.post( {
            type: "POST",
            url: survey_obj.ajax_url,
            async: false,
            cache: false,
            headers: {
            "cache-control": "no-cache"
            }
        }, form2send[form] ).always(function(postMethodResponse){
            displayAjaxCallStatus(postMethodResponse.status);  
        });
    }
  }

  function callAjaxAndSendStatus(form2send) { 
           jQuery.post( {
            type: "POST",
            url: survey_obj.ajax_url,
            async: false,
            cache: false,
            headers: {
            "cache-control": "no-cache"
            }
        }, form2send ).always(function(postMethodResponse){
            displayAjaxCallStatus(postMethodResponse.status);  
        });
  }

function displayAjaxCallStatus(response) {
    if( response == 2 ){
        jQuery('#survey_and_core_container').html( successMessage );
        surveyForm = {
            action : 'r_rate_survey',
            rid: null,
            type: '',
            rating: null,
            relevance: ''
        }
    }else{
        jQuery('#survey_and_core_container').html( errorMessage );
    }
    
    refreshPage();
  }

function refreshPage() {
    window.location.reload();
}


function showPoll(ID){
	let elementID = "#poll" + ID;
	
	jQuery(function($){
		$(elementID).removeAttr('hidden');
		$("#update"+ID).hide();
		$("#answer"+ID).attr('hidden', true);
	})
}

function isObjectEmpty(obj) {
    for (var key in obj) {
        if (obj[key] == null || obj[key] == "" || obj[key] == []){
            return true;
        }
    }
    return false;
}
