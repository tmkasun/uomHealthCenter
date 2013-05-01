$(document).ready(function(){
	//global vars
	
	var regNo = $("#regNo");
	var loading = $("#loading");
	var messageList = $(".content > ul");
	//initializing variables
	var complaint;
	var treatment;
	var diagnosis;
	//initializing variables
	var investigation ;
	//var textarea2 = $("#textarea2");//complaint
	//var textarea3 = $("#textarea3"); //diagnosis
	//var textarea5= $("#textarea5"); //Treatmen
	
	var refDoctor = $("#refDoctor");
	
	
	
	/*
	var inputUser = $("#nick");
	var inputMessage = $("#message");
	var loading = $("#loading");
	
	*/
	//functions
	function updateShoutbox(){
		//just for the fade effect
		messageList.hide();
		loading.fadeIn();
		//send the post to shoutbox.php
		$.ajax({
			type: "POST", url: "updateTreatment.php", data: "action=update",
			complete: function(data){
				loading.fadeOut();
				messageList.html(data.responseText);
				messageList.fadeIn(2000);
			}
		});
	}
	//check if all fields are filled
	function checkForm(){
		complaint = "";
		var countComplaint = 0;
		$(".complaints_class").each(
				function(){
					countComplaint +=1;
					currentComplaint = document.getElementById(this.id).value;
					//alert(currentComplaint);
					if (currentComplaint != "Complaint") {
						complaint += countComplaint+"__"+currentComplaint+"   ";
					}
				});
		//complaint = $("#complaint :selected").text();
		//alert(complaint);
		
		diagnosis = "";
		var countDiagnosis = 0;
		$(".diagnosis_class").each(
				function(){
					countDiagnosis +=1;
					currentDiagnosis = document.getElementById(this.id).value;
					//alert(currentDiagnosis);
					if (currentDiagnosis != "Diagnosis") {
						diagnosis += countDiagnosis+"__"+currentDiagnosis+"   ";
					}
				});
		//diagnosis = $("#diagnosis :selected").text();
		//alert(diagnosis);
		
		
		treatment = $("#treatment :selected").text();
		investigation = $("#investigation :selected").text();
		
		if(regNo.attr("value") && complaint!="Complaint" && treatment!="Treatment" && diagnosis!="Diagnosis")
			return true;
		else
			return false;
	}
	
	function printErrorMessage()
	{
		$('.success').fadeOut(200).hide();
   	 	$('.error').fadeOut(200).show();
		
	}
	
	function printSuccessMessage()
	{
		$('.success').fadeOut(200).show();
   	 	$('.error').fadeOut(200).hide();
		
	}
	
	
	//Load for the first time the shoutbox data
	updateShoutbox();
	
	
	//on submit event
	$("#submitTreatment").click(function(){
		if(checkForm()){
			//var nick = inputUser.attr("value");
			//var message = inputMessage.attr("value");
			printSuccessMessage();
			var _regNo = regNo.attr("value");
			//var _textarea2 = textarea2.attr("value");
			
			//var _textarea3 = textarea3.attr("value");
			//var _investigation = investigation.attr("value");
			//var _textarea5 = textarea5.attr("value");
			var _refDoctor = refDoctor.attr("value");
			/* #new debuging check weather every variable is set*/
			
		
			//we deactivate submit button while sending
			$("#submitTreatment").attr({ disabled:true, value:"Sending..." });
			$("#submitTreatment").blur();
			//alert("Complaint ="+complaint+"diag ="+diagnosis+"treatment ="+treatment+"refDoctor ="+_refDoctor+"_regNo ="+_regNo+"investigation ="+ investigation);
			//alert("action=insert&_regNo=" + _regNo + "&_textarea2=" + complaint + "&_textarea3=" +  diagnosis + "&_investigation=" + investigation + "&_textarea5=" + treatment + "&_refDoctor=" + _refDoctor);
			//send the post to shoutbox.php
			$.ajax({
				//var textarea2 = $("#textarea2");//complaint
				//var textarea3 = $("#textarea3"); //diagnosis
				//var textarea5= $("#textarea5"); //Treatmen
				type: "POST", url: "updateTreatment.php", data: "action=insert&_regNo=" + _regNo + "&_textarea2=" + complaint + "&_textarea3=" +  diagnosis + "&_investigation=" + investigation + "&_textarea5=" + treatment + "&_refDoctor=" + _refDoctor ,
				complete: function(data){
					messageList.html(data.responseText);
				
					updateShoutbox();
					//reactivate the send button
					$("#submitTreatment").attr({ disabled:false, value:"Submit" });
				}
			 });
		}
		else printErrorMessage(); //alert("Please fill all fields!");
		//we prevent the refresh of the page after submitting the form
		return false;
	});
});