// global Variables
var regNo = $("#regNo");
var loading = $("#loading");
var messageList = $(".content > ul");
var refDoctor = $("#refDoctor");
var _regNo = regNo.attr("value");
// initializing variables
var complaints = [];
var diagnoses = [];
var treatment = [];
// depricated and can remove after check
var complaint;
var treatment;
var diagnosis;

// initializing variables
var investigation;

// on submit event
$("#submitTreatment").click(function() {
	//alert($("#treatmentOtherNotes").val());

	if (checkForm()) {

		var _refDoctor = refDoctor.attr("value");
		/* #new debuging check weather every variable is set */

		// we deactivate submit button while sending
		$("#submitTreatment").attr({
			disabled : true,
			value : "Sending..."
		});
		$("#submitTreatment").blur();

		printSuccessMessage();
		$.ajax({
			type : "POST",
			url : "updateTreatment.php",
			data : {
				"action" : "insert",
				"_regNo" : _regNo,
				"complaints" : JSON.stringify(complaints),
				"diagnoses" : JSON.stringify(diagnoses),
				"_refDoctor" : _refDoctor,
				"treatments" : JSON.stringify(treatment),
				"otherNotes" : $("#treatmentOtherNotes").val()
			},
			/*
			 * data : "action=insert&_regNo=" + _regNo + "&_textarea2=" +
			 * complaint + "&_textarea3=" + diagnosis + "&_investigation=" +
			 * investigation + "&_textarea5=" + treatment + "&_refDoctor=" +
			 * _refDoctor,
			 */
			complete : function(data) {
				//alert(data.responseText);
				messageList.html(data.responseText);

				updateShoutbox();
				// reactivate the send button
				$("#submitTreatment").attr({
					disabled : true,
					value : "Submit"
				}).css({display:"none"});
			}

		});
	} else
		printErrorMessage(); // alert("Please fill all fields!");
	// we prevent the refresh of the page after submitting the form
	return false;
});

// check if all fields are filled
function checkForm() {
	complaints = [];
	diagnoses = [];
	treatment = [];// this is a two dimentional array for complete details of
	// the prescription

	// initiate arrays for keep each drug prescription details
	drug = [];
	dosage = [];
	frequency = [];
	acPc = [];

	drug = $(".treatment_class").map(function() {
		currentValue = $("#" + this.id).val();
		return currentValue;
	}).get();

	dosage = $(".treatment_dosage_class").map(function() {
		currentValue = $("#" + this.id).val();
		return currentValue;
	}).get();

	// alert(dosage);
	frequency = $(".treatment_frequency_class").map(function() {
		currentValue = $("#" + this.id).val();
		return currentValue;
	}).get();
	// remove last element in the array coz it is not a valid selection(default
	// value)
	frequency.pop();

	acPc = $(".treatment_acpc_class").map(function() {
		currentValue = $("#" + this.id).val();
		return currentValue;
	}).get();
	// remove last element in the array coz it is not a valid selection(default
	// value)
	acPc.pop();

	//put all drug,dosage,frequency and acPc details into one 2D array
	for ( var i = 0; i < drug.length; i++) {
		// remove unwanted records

		if (!(drug[i] == "Treatment"))
			treatment.push([ drug[i], dosage[i], frequency[i], acPc[i] ]);

	}

	//alert(JSON.stringify(treatment));

	var countComplaint = 0;
	$(".complaints_class").each(function() {
		countComplaint += 1;
		currentComplaint = document.getElementById(this.id).value;
		// alert(currentComplaint);
		if (currentComplaint != "Complaint") {
			complaints.push(currentComplaint);
		}
	});
	// complaint = $("#complaint :selected").text();
	// alert(complaint);

	var countDiagnosis = 0;
	$(".diagnosis_class").each(function() {
		countDiagnosis += 1;
		currentDiagnosis = document.getElementById(this.id).value;
		// alert(currentDiagnosis);
		if (currentDiagnosis != "Diagnosis") {
			diagnoses.push(currentDiagnosis);
		}
	});

	// need to implement treatment method and move investigation to separate one
	/*
	 * treatment = $("#treatment :selected").text(); investigation =
	 * $("#investigation :selected").text();
	 * 
	 *  */


//simple form validation, cheack weather all complaint diagnoses and treatment section atleast one option is selected	
	if (regNo.attr("value") && (complaints.length > 0) && (diagnoses.length) && (treatment.length))
		return true;
	else
		return false;

}

//get previous treatment details (display the dates of the previous details)
function updateShoutbox() {
	// just for the fade effect
	messageList.hide();
	loading.fadeIn();
	// send the post to shoutbox.php
	$.ajax({
		type : "POST",
		url : "updateTreatment.php",
		data : "action=update",
		complete : function(data) {
			loading.fadeOut();
			messageList.html(data.responseText);
			messageList.fadeIn(2000);
		}
	});
}

function printErrorMessage() {
	$('.success').fadeOut(200).hide();
	$('.error').fadeOut(200).show();

}

function printSuccessMessage() {
	$('.success').fadeOut(200).show();
	$('.error').fadeOut(200).hide();

}

// Load for the first time the shoutbox data
$(document).ready(function() {
	updateShoutbox();
});

//retrive student treatment information onclick time stamp in shoutbox
function preTreatmentDetails(thisRow) {
	var thisRowId = thisRow.id;
	//alert(thisRowId+_regNo);
	$.ajax({
		url : 'new_getTreatmentInfo.php',
		type : "POST",
		data : {
			"studentID" : _regNo,
			"timeStamp" : thisRowId
		}
	}).done(
			function(result) {

				// $("#pre_treatment_details").html(result);
				//alert(result);
				var body = document.getElementById("body");
				body.setAttribute("style", "background: rgba(0, 0, 0, 0.5)");

				var treatmentDetails = document.createElement("div");
				treatmentDetails.setAttribute("z-index", "50");
				treatmentDetails.setAttribute("id", "thisTreatmentDetails");
				//treatmentDetails.setAttribute("style", "overflow: auto");
				// var newContaint = document.createTextNode(result);
				// treatmentDetails.appendChild(newContaint);
				var pre_treatment_details = document
						.getElementById("pre_treatment_details");

				pre_treatment_details.replaceChild(treatmentDetails,
						pre_treatment_details.lastChild);
				$("#thisTreatmentDetails").html(result);

				$("#pre_treatment_details").fadeIn("fast");
			});

	/*
	 * var resultBox = document.getElementById("result_box"); var newMessageDiv =
	 * document.createElement("div"); newMessageDiv.setAttribute("position",
	 * "fixed");
	 * 
	 * newMessageDiv.setAttribute("z-index", "50"); var newContaint =
	 * document.createTextNode("Hi this is a testing message");
	 * newMessageDiv.appendChild(newContaint);
	 * 
	 * //resultBox.appendChild(newMessageDiv);
	 * resultBox.insertBefore(newMessageDiv,
	 * document.getElementById("treatmentTable"));
	 */
}

//submit investigations to MLT (separate from giving treatments to patiens)
function submitInvestigation() {

	investigation = $("#investigation :selected").text();
	alert(sessionStudentID + " ==>  has Submit Investigation ==> "
			+ investigation);

}
