<?php session_start();?>
<!DOCTYPE html>

<head>
<style type="text/css">
.commonTreatmentDiv {
	position: relative;
	width: 60%;
	height: auto;
	padding: 0px;
	background-color: rgba(199, 255, 192, 0.8);
	left: 20%;
	margin-bottom: 10px;
	margin-top: 10px;
	box-shadow: 0px 0px 20px 1px #000000;
	border-radius: 12px;
	font-family: monospace;
}

.studentImage {
	margin-left: 5px;
	border-radius: 12px;
	width: 100px; 
	height : 100px;
	margin-top: 5px;
	height: 100px;
}

.studentID {
	margin-left: 30%;
}
</style>
<meta name="keywords" content="information" />
<meta name="author"
	content="Faculty Of Information Technology University of Moratuwa" />
<meta name="description" content="University Of Moratuwa Medical Center" />
<!-- meta charset="UTF-8"/ -->

<link rel="shortcut icon" href="../../images/fav.png" />
<script src="../../javascripts/new/jquery-1.8.3.js"></script>
<script src="../../javascripts/new/jquery-ui-1.9.2.js"></script>
<script type="text/javascript"
	src="../../javascripts/new/ajaxSupport.js">	</script>

<link rel="stylesheet" href="../../css/styles.css" type="text/css" />
<link rel="stylesheet" href="../../css/new_pharmacy.css" type="text/css" />


<script type="text/javascript"
	src="../../javascripts/new/pharmacy_ajax.js"></script>
</head>
<?php
error_reporting(E_PARSE);

if(!isset($_SESSION["USERID"])){
	header("location:../../index.php");
	print "You are not loged in,please login to continue";
	die();
}

require_once '../../inc/config.php';

$get_user_details = "select UserID,Name,AccountType,loginStatus from user where UserID = '$_SESSION[USERID]'";

$result = mysql_query($get_user_details,$connection);//query send to mysql database to check username and password

$user_details = mysql_fetch_array($result);
//can replace with ligin.php $_SESSION variables
$_SESSION['Name'] = $user_details['Name'];
$_SESSION['UserID'] = $user_details['UserID'];
$_SESSION['AccountType'] = $user_details['AccountType'];
$_SESSION['loginStatus'] = $user_details['loginStatus'];


?>
<title><?php echo $_SESSION['Name'] ?> Welcome Health Center</title>
<!-- style="background: rgba(0, 0, 0, 0.5);" set this style to body when onening previous treatment details -->
<body id="body" onload="ani()">
	<div id="top_bar">
		<div id="hello"
			style="position: relative; margin: 0; margin-left: 2%; margin-bottom: 0%; padding-top: 1%;">
			<a style="text-decoration: none; font-size: 10pt;">Welcome </a> <a
				onclick="ajax_profile()" id="name_dis"
				onmouseout="name_dis('<?php echo $user_details['Name']; ?>',2)"
				onmouseover="name_dis('<?php echo $user_details['UserID']; ?>',1)"
				style="color: #CC9900; border-radius: 5px; box-shadow: 0px 0px 12px 2px #333300; background-color: #663300; font-size: 13pt;"><?php print $user_details['Name']; ?>
			</a>

			<div id="hello"
				style="position: relative; margin: 0; margin-right: 2%; margin-bottom: 0%; padding-top: 0%; float: right;">
				<a href="../../inc/logout.php" target="_self"> <font size="3pt"
					color='#341919'>Logout:<?php print $_SESSION[USERID] ?>
				</font>
				</a>
			</div>
		</div>

	</div>


	<div id="welcom_msg"></div>

	<div id="navigation_pane"
		style="position: fixed; float: left; height: auto; width: 10%; margin-top: 12%; margin-left: 0%; z-index: 40;">


		<button type="button" class="navigation_button" id="treatment_button"
			onclick="listQueue()"
			style="color: #CC0066; font-size: large; float: left;">Treatment
			Queue</button>
		<button type="button" class="navigation_button" id="Precords_button"
			onclick="alert('Not Implimented Yet')"
			style="color: #66CCFF; font-size: large; float: left;">Previous
			Treatments</button>
		<button type="button" class="navigation_button"
			id="Cexamination_button" onclick="alert('Not Implimented Yet')"
			style="color: #66CCFF; font-size: large; float: left;">Change Drugs
			Details</button>

	</div>
	
	<!-- __________________________ This is the common div for display each treatment details __________________________ -->
	<div id="pre_treatment_details"
		style="position: fixed; width: 70%; height: auto; margin-left: 15%; margin-right: 15%; background: rgba(255, 255, 199, 1); margin-top: 7%; border-radius: 12px; z-index: 50; box-shadow: 0px 0px 20px 1px #000000;display: none;overflow: auto;">
		<img onclick="close_preTreatmentDetails()" alt="close"
			src="../../images/new/mm/no.ico"
			style="position: relative; float: right;">
	</div>
	<!-- __________________________ This is the common div for display each treatment details End __________________________ -->
	
	

	<div id="result_box" style="position: relative; width: 60%; left: 15%;">

	

		<!-- div id="commonTreatmentDiv">
			<img class ="studentImage" style="margin-left: 5px; border-radius: 12px; margin-top: 5px;width: 100px;height: 100px;"
				alt="Student Image" src="../../images/1371398567.jpg" />
			<div class="studentID" style="margin-left: 30%;">
				<label style="font-size: 12pt;">ID Number: </label>
				<button id="" time_stamp="" class="idNumberButtonClass"></button>

			</div>
		</div -->

		<div
			style="z-index: 1; position: relative; width: 50%; margin: 0, auto; left: 12%; right: 10%; padding-top: 1%;">
			<img id="welcome_image" alt="Welcome To UOM Medical Center WebSite"
				src="../../images/new/background/new_doctor_background.jpg" />




		</div>
		
	</div>


</body>
