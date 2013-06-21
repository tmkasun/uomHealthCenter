<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "3")
{
	header('Location: index.php');
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<!--script src="jquery.js" language="JavaScript" type="text/javascript"></script >
<script src="notification.js" language="JavaScript" type="text/javascript"></script -->
<script type="text/javascript"
	src="../../javascripts/new/jquery-1.8.3.js"></script>

<script type="text/javascript"
	src="../../javascripts/new/jquery-ui-1.9.2.js"></script>

<script type="text/javascript">
$(document).ready(function () {
	//getLatestTreatments();
	setInterval(getLatestTreatments, 1000);
	
});


function clickFunction(ElementObject){
	var this_id = ElementObject.parentNode.getAttribute("id");
	//alert(this_id);
	$.ajax({
		url:"submit_ajax_treatment.php",
		type:"POST",
		data:{"TreatmentID":this_id},


		}).done(
			$("#"+this_id).fadeOut()
			

			);
	
	
}

var lowerst_treatmentID;
var maximum_treatmentID;
var numberOfPatients =0;
function getLatestTreatments(){
	//alert("ok 1");
	$.ajax({
		url:"new_ajax_treatment.php",
		dataType : "json",
		type : "GET",
		data : ""
		}
			).done(function (jsonObject){
				var parent_div = document.getElementById("main_form_pane_id");
				
				var grand_parent = parent_div.parentNode;
				
				var new_parent = document.createElement("div");
				
				new_parent.setAttribute("id", "main_form_pane_id");
				
				grand_parent.replaceChild(new_parent, parent_div);
				

				for ( var treatment in jsonObject) {
					//html_txt += "<br/>";
					numberOfPatients +=1;
					var html_txt = "";
					var treatmentID;
					
					for ( var trt in jsonObject[treatment]) {
						
						if(numberOfPatients == 1){
							maximum_treatmentID	 =jsonObject[treatment]["TreatmentID"];
							}
						 lowerst_treatmentID = jsonObject[treatment]["TreatmentID"];
						treatmentID = jsonObject[treatment]["TreatmentID"];
						//latestTreatmentID = jsonObject[treatment]["TreatmentID"];
						html_txt += trt+"===>"+jsonObject[treatment][trt]+"<br/>";
							
					}
					
					//result_div.innerHTML= "OK";
					//<input type="checkbox" id="" />
					var checkbox = document.createElement("input");
					checkbox.setAttribute("type", "checkbox");
					checkbox.setAttribute("id", "chk"+treatmentID);
					checkbox.setAttribute("class", "chkbx");
					checkbox.setAttribute("onClick", "clickFunction(this)");
					
					var result_div = document.createElement("div");
					
					result_div.setAttribute("class", "result_style");
					
					result_div.setAttribute("id", treatmentID);
					result_div.appendChild(checkbox);
					//var content = document.createTextNode(html_txt);
					
					
					var parent_div = document.getElementById("main_form_pane_id");
					parent_div.appendChild(result_div);
					document.getElementById(treatmentID).innerHTML = html_txt;
					//alert("asd");
					document.getElementById(treatmentID).appendChild(checkbox);
					
					
				}
				
				
//PATIENT
				numberOfPatients =0;
				});
	
	//if(latestTreatmentID > previousTreatmentID){
	//alert("New Treatment Found");
	//}
	//previousTreatmentID = latestTreatmentID;
	
	
}
</script>

<title>Pharmacist Home Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>

	<div id="wrapper">
		<!--Start main div -->

		<div id="wrapper_login">
			<!--start wrapper_loggin -->

			<div id="header_login">
				<!--start header_login -->

			</div>
			<!--End of header_login -->

			<div id="content_login">

				<div id="header_message">

					<div id="welcom_Message">

						<div style="float: right;">
							<font color="#FFCC00"><?php echo "Welcome ".$_SESSION['USERNAME']; ?>
							</font>
						</div>
					</div>
					<div class="main_navigation" align="right">
						<a href="../../inc/logout.php" name="logout">Logout</a>
					</div>
				</div>
				<!--End of header_message -->

				<div id="main_content" style="height: 500px;">
					<!--Start main content -->

					<div id="navigation_pane">
						<!--Start navigation pane -->

						<div>
							<!--Insert navigation divs here -->


							<div class="sub_Navigation" align="center"
								style="height: 30px; background: url(../../images/sidebarmenu.jpg) no-repeat;">
								<a href="pharmacist_page.php">Home</a>
							</div>

							<div class="sub_Navigation" align="center"
								style="height: 30px; background: url(../../images/sidebarmenu.jpg) no-repeat;">
							</div>

							<div class="sub_Navigation" align="center"
								style="height: 30px; background: url(../../images/sidebarmenu.jpg) no-repeat;">
							</div>

							<div class="sub_Navigation" align="center"
								style="height: 30px; background: url(../../images/sidebarmenu.jpg) no-repeat;">
							</div>

						</div>
						<!--End of main_navigation -->

					</div>
					<!--End of navigation pane -->

					<!--*************************************** -->

					<div class="main_form_pane" id="main_form_pane_id"></div>
					<!--End of main_form_pane -->
				</div>
				<!--End of main content -->

			</div>
			<!--End of content-->

			<div id="footer"></div>


		</div>
		<!--End of wrapper_loggin -->
	</div>
	<!--End of wrapper -->

</body>
</html>
