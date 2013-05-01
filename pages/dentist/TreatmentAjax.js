$(document).ready(function(){
	//global vars
	
	var regNo = $("#regNo");
	var loading = $("#loading");
	var messageList = $(".content > ul");
	var textarea2 = $("#textarea2");
	var textarea3 = $("#textarea3");
	var investigation = $("#investigation");
	var textarea5= $("#textarea5");
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
			type: "POST", url: "UpdateTreatment.php", data: "action=update",
			complete: function(data){
				loading.fadeOut();
				messageList.html(data.responseText);
				messageList.fadeIn(2000);
			}
		});
	}
	//check if all fields are filled
	function checkForm(){
		if(regNo.attr("value") && textarea2.attr("value") && textarea3.attr("value") && textarea5.attr("value"))
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
	$("#form").submit(function(){
		if(checkForm()){
			//var nick = inputUser.attr("value");
			//var message = inputMessage.attr("value");
			printSuccessMessage();
			var _regNo = regNo.attr("value");
			var _textarea2 = textarea2.attr("value");
			var _textarea3 = textarea3.attr("value");
			var _investigation = investigation.attr("value");
			var _textarea5 = textarea5.attr("value");
			var _refDoctor = refDoctor.attr("value");
			
		
			//we deactivate submit button while sending
			$("#submit").attr({ disabled:true, value:"Sending..." });
			$("#submit").blur();
			//send the post to shoutbox.php
			$.ajax({
				type: "POST", url: "UpdateTreatment.php", data: "action=insert&_regNo=" + _regNo + "&_textarea2=" + _textarea2 + "&_textarea3=" +  _textarea3 + "&_investigation=" + _investigation + "&_textarea5=" + _textarea5 + "&_refDoctor=" + _refDoctor ,
				complete: function(data){
					messageList.html(data.responseText);
				
					updateShoutbox();
					//reactivate the send button
					$("#submit").attr({ disabled:false, value:"Submit" });
				}
			 });
		}
		else printErrorMessage(); //alert("Please fill all fields!");
		//we prevent the refresh of the page after submitting the form
		return false;
	});
});