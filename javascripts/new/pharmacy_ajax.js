function listQueue() {
	$("#welcome_image").fadeOut();
	// alert("ok");
	checkTreatmentStatusFlag();
	setInterval(checkTreatmentStatusFlag, 1000);

}

/*
 * this function will create a new DOM element and append it to the result DIV
 * accordingly only new treatment submitions will be displaied
 */
function createNewDOM(studentIDNumber, TreatmentID, imageUrl, time_stamp) {

	var treatmentDetailStruct = $("<div><div/>");
	var studentImage = $("<img />");
	var studentID = $("<div><div/>");
	var lableForStudentID = $("<label><label/>");
	var buttonStudentID = $("<button />");

	buttonStudentID.html(studentIDNumber);
	buttonStudentID.attr({
		"id" : studentIDNumber,
		"TreatmentID" : TreatmentID,
		"time_stamp" : time_stamp
	});
	lableForStudentID.html("ID Number: ");
	lableForStudentID.css({
		"font-size" : "12pt"
	});
	studentImage.attr({
		src : imageUrl
	});

	// add apropriate classes to each DOM elements
	buttonStudentID.addClass("idNumberButtonClass");
	buttonStudentID.attr({
		"onClick" : "preTreatmentDetails(this)"
	});
	studentID.addClass("studentID ");
	studentImage.addClass("studentImage");
	treatmentDetailStruct.addClass("commonTreatmentDiv");
	treatmentDetailStruct.attr({
		"id" : TreatmentID+"a"
	});

	studentImage.appendTo(treatmentDetailStruct);
	lableForStudentID.appendTo(studentID);
	buttonStudentID.appendTo(studentID);
	studentID.appendTo(treatmentDetailStruct);

	treatmentDetailStruct.hide();
	treatmentDetailStruct.prependTo("#result_box");
	treatmentDetailStruct.fadeIn();

}

function clickFunction(ElementObject) {
	var TreatmentID = $(ElementObject).attr("id");
	
	//alert(".commonTreatmentDiv#"+thisTreatmentTimeStamp);
	
	//return 0;
	$.ajax({
		url : "submit_ajax_treatment.php",
		type : "POST",
		data : {
			"time_stamp" : TreatmentID
		},

	}).done(function(result) {
		//$("#"+thisTreatmentTimeStamp).hide();
		//listQueue();
		//thisTreatmentTimeStamp
		$("#"+TreatmentID+"a").hide();
		alert("Treatment Update Sucsussfully");
		close_preTreatmentDetails(null);
	}

	);

}

// var lowerst_treatmentID;
// var maximum_treatmentID;
// var numberOfPatients = 0;

var currentPatientsTreatmentIDs = [];
var tempPatientsTreatmentIDs = [];

function checkTreatmentStatusFlag() {
	// alert("ok 1");
	$.ajax({
		url : "new_ajax_treatment.php",
		dataType : "json",
	}).done(
			function(jsonObject) {
				// alert(jsonObject);
				// return 0;
				tempPatientsTreatmentIDs = [];
				//alert(currentPatientsTreatmentIDs);
				for ( var treatment in jsonObject) {
					//alert(jsonObject[treatment]["TreatmentID"]+">>>>>"+currentPatientsTreatmentIDs);

					if (!($.inArray(jsonObject[treatment]["TreatmentID"],
							currentPatientsTreatmentIDs) > -1)) {
						//alert("Not In list");
						//createNewDOM(studentIDNumber, TreatmentID, imageUrl)
						createNewDOM(jsonObject[treatment]["StudentID"],
								jsonObject[treatment]["TreatmentID"],
								jsonObject[treatment]["imageUrl"],
								jsonObject[treatment]["time_stamp"]);

					}

					tempPatientsTreatmentIDs
							.push(jsonObject[treatment]["TreatmentID"]);
					// html_txt += "<br/>";
					// numberOfPatients += 1;
					// var html_txt = "";
					// var treatmentID;

					// for ( var trt in jsonObject[treatment]) {
					/*
					 * if (numberOfPatients == 1) { maximum_treatmentID =
					 * jsonObject[treatment]["TreatmentID"]; }
					 * lowerst_treatmentID =
					 * jsonObject[treatment]["TreatmentID"]; treatmentID =
					 * jsonObject[treatment]["TreatmentID"]; //
					 * latestTreatmentID = //
					 * jsonObject[treatment]["TreatmentID"]; html_txt +=
					 * trt + "===>" + jsonObject[treatment][trt] + "<br/>";
					 * 
					 */
					// }
					// result_div.innerHTML= "OK";
					// <input type="checkbox" id="" />
					/*
					 * var checkbox = document.createElement("input");
					 * checkbox.setAttribute("type", "checkbox");
					 * checkbox.setAttribute("id", "chk" + treatmentID);
					 * checkbox.setAttribute("class", "chkbx");
					 * checkbox.setAttribute("onClick",
					 * "clickFunction(this)");
					 * 
					 * var result_div = document.createElement("div");
					 * 
					 * result_div.setAttribute("class", "result_style");
					 * 
					 * result_div.setAttribute("id", treatmentID);
					 * result_div.appendChild(checkbox); // var content =
					 * document.createTextNode(html_txt);
					 * 
					 * var parent_div = document
					 * .getElementById("main_form_pane_id");
					 * parent_div.appendChild(result_div);
					 * document.getElementById(treatmentID).innerHTML =
					 * html_txt; // alert("asd");
					 * document.getElementById(treatmentID).appendChild(
					 * checkbox);
					 */

				}
				//alert(tempPatientsTreatmentIDs);
				currentPatientsTreatmentIDs = tempPatientsTreatmentIDs;
				//alert(currentPatientsTreatmentIDs);
				// PATIENT
				numberOfPatients = 0;
			});

	// if(latestTreatmentID > previousTreatmentID){
	// alert("New Treatment Found");
	// }
	// previousTreatmentID = latestTreatmentID;

}

function preTreatmentDetails(thisRow) {
	var thisRowId = thisRow.id;
	var thisTimeStamp = $(thisRow).attr("time_stamp");

	$.ajax({
		url : 'new_getTreatmentInfo_pharmacy.php',
		type : "POST",
		data : {
			"studentID" : thisRowId,
			"timeStamp" : thisTimeStamp
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
				treatmentDetails.style.overflow = "auto";
				treatmentDetails.style.height = "500px";
				/*
				treatmentDetail = $("div");
				treatmentDetail.attr({
					"z-index" : "50",
					"id" : "thisTreatmentDetails"
				});
				treatmentDetail.css({
					"overflow" : "auto",
					"height" : "50%"
				});
*/
				//treatmentDetails.setAttribute("style", "overflow: auto");
				// var newContaint = document.createTextNode(result);
				// treatmentDetails.appendChild(newContaint);
				var pre_treatment_details = document
						.getElementById("pre_treatment_details");
				//$("#pre_treatment_details").html("");
				//treatmentDetail.appendTo($("#pre_treatment_details"));
				pre_treatment_details.replaceChild(treatmentDetails,pre_treatment_details.lastChild);
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

function close_preTreatmentDetails(me) {
	$("#pre_treatment_details").slideToggle("slow");
	// $("#feedback_rs").toggle("slow", "swing");
	$("#close").fadeOut("slow");
	body.setAttribute("style",
			"background-image: url('../images/new/mm/bg_dotted.png')");
	body.setAttribute("style", "background-repeat: repeat");
	body.setAttribute("style", "background-attachment: fixed)");

	// document.getElementById("feedbacks_dv").style.boxShadow = "";
	// document.getElementById("feedback_bt").innerHTML = "Send Feedback";
	// feedbk_clk = false;
}
