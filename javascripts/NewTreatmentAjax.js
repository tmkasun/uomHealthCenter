/*
 * This JS file if for the functions in new_doctor_treatment.php and it's loaded php file
 * Completly developed by Faculty of information technology university of moratuwa
 * 			#Kasun Thennakoon
 * 			#Akila Sandakelum
 * 
 * 
 */

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
	// alert($("#treatmentOtherNotes").val());
	// return 0;
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
				// alert(data.responseText);
				messageList.html(data.responseText);

				updateShoutbox();
				// reactivate the send button
				$("#submitTreatment").attr({
					disabled : true,
					value : "Submit"
				}).css({
					display : "none"
				});
			}

		});
	} else
		printErrorMessage(); // alert("Please fill all fields!");
	// we prevent the refresh of the page after submitting the form
	return false;
});

// check if all fields are filled form validation method
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

	// put all drug,dosage,frequency and acPc details into one 2D array
	for ( var i = 0; i < drug.length; i++) {
		// remove unwanted records

		if (!(drug[i] == "Treatment"))
			treatment.push([ drug[i], dosage[i], frequency[i], acPc[i] ]);

	}

/*	alert(JSON.stringify(treatment));
	return 0;*/
	var countComplaint = 0;
	$(".complaint_class").each(function() {
		countComplaint += 1;
		currentComplaint = document.getElementById(this.id).value;
		alert(currentComplaint);
		if (currentComplaint != "complaint") {
			alert("Put to DB");
			complaints.push(currentComplaint);
		}
	});
	/*//complaint = $("#complaint :selected").text();
	alert(complaints);
	return	0;*/
	var countDiagnosis = 0;
	$(".diagnosis_class").each(function() {
		countDiagnosis += 1;
		currentDiagnosis = document.getElementById(this.id).value;
		// alert(currentDiagnosis);
		if (currentDiagnosis != "diagnosis") {
			diagnoses.push(currentDiagnosis);
		}
	});

	// need to implement treatment method and move investigation to separate one
	/*
	 * treatment = $("#treatment :selected").text(); investigation =
	 * $("#investigation :selected").text();
	 * 
	 */

	// simple form validation, cheack weather all complaint diagnoses and
	// treatment section atleast one option is selected
	if (regNo.attr("value") && (complaints.length > 0) && (diagnoses.length)
			&& (treatment.length))
		return true;
	else
		return false;

}

// get previous treatment details (display the dates of the previous details)
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

// retrive student treatment information onclick time stamp in shoutbox
function preTreatmentDetails(thisRow) {
	// alert("oks");
	// return 0;
	var thisRowId = thisRow.id;
	// alert(thisRowId);
	// alert(thisRowId+_regNo);
	// return 0;

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
				// alert(result);
				var body = document.getElementById("body");
				body.setAttribute("style", "background: rgba(0, 0, 0, 0.5)");

				var treatmentDetails = document.createElement("div");
				treatmentDetails.setAttribute("z-index", "50");
				treatmentDetails.setAttribute("id", "thisTreatmentDetails");
				// treatmentDetails.setAttribute("style", "overflow: auto");
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

// submit investigations to MLT (separate from giving treatments to patiens)
function submitInvestigation() {

	investigation = $("#investigation :selected").text();
	alert(sessionStudentID + " ==>  has Submit Investigation ==> "
			+ investigation);

}

// add or remove complaint , treatment , or diagnosis from doctors view

// need to debug this function is using old and poor method in implimentation
// Kasun Thennakoon :)
function addNewComplaint(requestType) {
	$
			.ajax({
				url : 'new_details_from_database.php',
				type : "POST",
				dataType : "JSON",
				data : {
					"requestType" : requestType,
					"method" : "retrive"
				}
			})
			.done(
					function(result) {
						// alert(result);
						var treatmentDetails = document.createElement("div");
						treatmentDetails.setAttribute("z-index", "50");
						treatmentDetails
								.setAttribute("style", "overflow: auto");
						treatmentDetails.setAttribute("id",
								"thisTreatmentDetails");

						var pre_treatment_details = document
								.getElementById("pre_treatment_details");

						pre_treatment_details.replaceChild(treatmentDetails,
								pre_treatment_details.lastChild);

						var html = '<div style="width: 70%;margin-left: auto;margin-right: auto;color:blue;position: relative;">Current '
								+ requestType + ' list</div><br/>';
						html += '<div id="ajaxRetrievedDetails" onmouseout="enableDrabbable()" onmouseover="disableDraggable()" style="background: rgba(245, 240, 150, 1);width: 90%;margin-left: auto;margin-right: auto;color:black;position: relative;overflow: auto;height: 200px">';
						for ( var information in result) {
							for ( var data in result[information]) {
								html += "<font class ='"
										+ result[information][data]
										+ "' >"
										+ result[information][data]
										+ "<img alt='remove this' style='cursor: pointer;position:relative;margin-left:25px;top:+7px' src= '../../images/new/mm/remove-icon.png' id='"
										+ result[information][data]
										+ "' onClick ='removeThisInformation(this)' requestType = '"
										+ requestType + "' /></font><br/>";
							}

						}

						html += "</div><br/><input style='position:relative;margin-left:25px;float:left;' id='newInformation'  inputType = '"
								+ requestType
								+ "' type='text'/><img style='cursor: pointer;position:relative;float:left;margin-left:20px;' src= '../../images/new/mm/add-icon.png'  onClick ='addThisInformation(this)' /><br/>";

						$("#thisTreatmentDetails").html(html);
						$("#newInformation").attr(
								{
									"onkeyup" : "ajaxReloadThisList('"
											+ requestType + "')"
								});
						// onkeypress='ajaxReloadThisList('"+requestType+"')'

						$("#pre_treatment_details").fadeIn("fast");
						$("#newInformation").focus();
					});

}

// refresh list in complints , treatments, and diagnoses on keypress when doctor
// tries to add or remove new or excisting abouve item

function ajaxReloadThisList(requestType) { // returnHtmlStyle
	// is normal <P>
	// return or each
	// item as a

	// alert("ok press");
	// <option> style
	// alert($("#newInformation").val());
	// alert(requestType);
	// return 0;

	var currentInputValue = $("#newInformation").val();
	$
			.ajax({
				url : 'new_details_from_database.php',
				type : "POST",
				dataType : "JSON",
				data : {
					"requestType" : requestType,
					"method" : "search",
					"currentInputValue" : currentInputValue
				}
			})
			.done(
					function(result) {
						// alert(result);
						var html = "";
						for ( var information in result) {
							for ( var data in result[information]) {
								html += "<font class ='"
										+ result[information][data]
										+ "' >"
										+ result[information][data]
										+ "<img alt='remove this' style='cursor: pointer;position:relative;margin-left:25px;top:+7px' src= '../../images/new/mm/remove-icon.png' id='"
										+ result[information][data]
										+ "' onClick ='removeThisInformation(this)' requestType = '"
										+ requestType + "' /></font><br/>";
							}

						}
						$("#ajaxRetrievedDetails").html(html);

					});

}

// disable Draggable ability whe scrolling

function disableDraggable() {
	$("#pre_treatment_details").draggable("disable");
	$("#pre_treatment_details").css({
		opacity : 1
	});

	// background: rgba(255, 255, 199, 1);
}

// enable draggable ability when mouse not over on the scrolling area
function enableDrabbable() {
	$("#pre_treatment_details").draggable("enable");
	$("#pre_treatment_details").css({
		opacity : 1
	});
}

// add new complint, diagnosis or treatment to database via ajax call

function addThisInformation(inputValue) {

	var data = $("#newInformation").val();
	// var requestType =
	// document.getElementById("newInformation").getAttribute("inputType");
	var requestType = $("#newInformation").attr("inputType");

	// alert("asd");
	$.ajax({
		url : 'new_details_from_database.php',
		type : "POST",
		data : {
			"requestType" : requestType,
			"method" : "insert",
			"data" : data
		}
	}).done(function(result) {
		if(requestType == "treatment_type"){
			alert("Need to impliment this ");
		}
		
		loadOptionsFromDb(requestType);
		close_preTreatmentDetails();
		alert(data + " added Successfully");
		// var parent = document.getElementById(elementId);

	}

	);

}

// remove excisting complint, diagnosis or treatment to database via ajax call

function removeThisInformation(informationID, requestType) {

	// alert(informationID.id+ "sadsaf"+
	// document.getElementById(informationID.id).getAttribute("requestType"));
	var requestType = document.getElementById(informationID.id).getAttribute(
			"requestType");

	$.ajax({
		url : 'new_details_from_database.php',
		type : "POST",
		data : {
			"requestType" : requestType,
			"method" : "delete",
			"data" : informationID.id
		}
	}).done(function(result) {
		// alert(result);
		$("." + informationID.id).fadeOut();
		// loadTreatmentPage();
		alert(informationID.id + " has been removed Successfully");
	}

	);

}

/*
 * load the containt of the <Select> element wich are options from the database
 * in each new selector addition and when doctor add a new details to database
 */

// Global variables for assing ID's
numberOfComplaintList = 0;
numberOfDiagnosisList = 0;
numberOfTreatmentList = 0;

function loadOptionsFromDb(requestType) { // returnHtmlStyle
	
//	alert(requestType+"_class"); 
	/*
	 * Define common elements and attribute for all complaints, diagnosis and
	 * treatment selectors
	 */
	var nextSelectObject = $("<select></select>");

	$(nextSelectObject).css({
		"width" : "200px"
	});

	var removeIcon = $("<img></img>");

	/*
	 * //have to move this to specific bulid block in switch case
	 * removeIcon.attr({ "src": "../../images/new/mm/remove.ico", "onclick" :
	 * "numberOfComplaintList-=1;$(this).next().remove();$(this).prev('select."+requestType+"_class').remove();$(this).remove()"
	 * });
	 */

	$.ajax({
				url : 'new_details_from_database.php',
				type : "POST",
				dataType : "JSON",
				data : {
					"requestType" : requestType,
					"method" : "retrive"
				}
			})
			.done(
					function(result) {
						/*
						 * alert(result); return 0;
						 */

						var newOptionList = $("<option></option>");
						$(newOptionList).text(requestType);
						$(nextSelectObject).append(newOptionList);
						// newOptionList.css("font-size","13pt");
						for ( var information in result) {
							for ( var data in result[information]) {
								var newOption = $("<option></option>");
								$(newOption).text(result[information][data]);
								// font-size: 13pt
								$(newOption).css({
									"font-size" : "13pt"
								});
								$(nextSelectObject).append(newOption);
							}
						}

						// alert(newOptionList.html());
						// return 0;

						// $(nextSelectObject).append(newOptionList);

						switch (requestType) {
						case "complaint":
							// alert("asdsa");
							numberOfComplaintList += 1;

							nextSelectObject
									.attr({
										"id" : requestType
												+ numberOfComplaintList,
										"onchange" : "if (this.selectedIndex) loadOptionsFromDb('"
												+ requestType + "');",
										"class" : requestType + "_class",
										"display" : "none"
									});

							removeIcon
									.attr({
										"src" : "../../images/new/mm/remove.ico",
										"onclick" : "$(this).next().remove();$(this).prev('select."
												+ requestType
												+ "_class').remove();$(this).remove()"
									});

							$("#appendNewComplaints").append(nextSelectObject,
									removeIcon, "<br/>");
							$("#"+requestType + numberOfComplaintList).fadeIn();
							$("#"+requestType+ numberOfComplaintList).focus();

							break;
						case "diagnosis":
	/*						alert(numberOfDiagnosisList);
							alert(nextSelectObject);
	*/						
							numberOfDiagnosisList += 1;
							nextSelectObject
									.attr({
										"id" : requestType
												+ numberOfDiagnosisList,
										"onchange" : "if (this.selectedIndex) loadOptionsFromDb('"
												+ requestType + "');",
										"class" : requestType + "_class",
										"display" : "none"
									});

							removeIcon
									.attr({
										"src" : "../../images/new/mm/remove.ico",
										"onclick" : "$(this).next().remove();$(this).prev('select."
												+ requestType
												+ "_class').remove();$(this).remove()"
									});
							//numberOfDiagnosisList
							$("#appendNewDiagnoses").append(nextSelectObject,
									removeIcon, "<br/>");
							$("#"+requestType+ numberOfDiagnosisList).fadeIn();
							$("#"+requestType + numberOfDiagnosisList).focus();


							
							break;

						case "treatment":
							
							/*numberOfTreatmentList
							*/
							
							break;

						}

						// numberOfComplaintList +=1;
					});

}
