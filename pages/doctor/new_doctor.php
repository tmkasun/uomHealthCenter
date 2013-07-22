<?php session_start();?>
<!DOCTYPE html>

<head>
<meta name="keywords" content="information" />
<meta name="author"
	content="Faculty Of Information Technology University of Moratuwa" />
<meta name="description" content="University Of Moratuwa Medical Center" />
<!-- meta charset="UTF-8"/ -->





<script type="text/javascript"
	src="../../javascripts/NewTreatmentAjax.js"></script>


<link rel="stylesheet" href="../../css/styles.css" type="text/css" />
<link rel="shortcut icon" href="../../images/fav.png" />
<script src="../../javascripts/new/jquery-1.8.3.js"></script>
<script src="../../javascripts/new/jquery-ui-1.9.2.js"></script>
<script type="text/javascript"
	src="../../javascripts/new/ajaxSupport.js">	</script>
</head>
<?php
// bugs = user can enter same
// bugs = phone number as new phone number and unutilized pre_phone_numbers table coz it is using datetime(updated_on) as primary key
error_reporting ( E_PARSE );
// more details after every row
// use can change their details
// color the column

if (! isset ( $_SESSION ["USERID"] )) {
	header ( "location:../../index.php" );
	print "You are not loged in,please login to continue";
	die ();
}

include_once ('../../inc/new/server.php');

$get_user_details = "select UserID,Name,AccountType,loginStatus from user where UserID = '$_SESSION[USERID]'";

$result = mysql_query ( $get_user_details, $connection ); // query send to mysql database to check username and password

$user_details = mysql_fetch_array ( $result );
// die(print_r($user_details["Name"]));

// can replace with ligin.php $_SESSION variables
$_SESSION ['Name'] = $user_details ['Name'];
$_SESSION ['UserID'] = $user_details ['UserID'];
$_SESSION ['AccountType'] = $user_details ['AccountType'];
$_SESSION ['loginStatus'] = $user_details ['loginStatus'];

?>
<title><?php echo $_SESSION['Name'] ?> Welcome Health Center</title>
<!-- style="background: rgba(0, 0, 0, 0.5);" set this style to body when onening previous treatment details -->
<body id="body" onload="ani()">
	<div id="top_bar">
		<div id="hello"
			style="position: relative; margin: 0; margin-left: 2%; margin-bottom: 0%; padding-top: 1%;">
			<a style="text-decoration: none; font-size: 10pt;">Welcome </a>
			<div id="hello"
				style="position: relative; margin: 0; margin-right: 2%; margin-bottom: 0%; padding-top: 0%; float: right;">
				<a href="../../inc/logout.php" target="_self"> <font size="3pt"
					color='#341919'>Logout:<?php print $_SESSION[USERID]?>
				</font>
				</a>
			</div>
		</div>

	</div>


	<div id="welcom_msg">
		<span
			style="color: #005FBF; background: transparent; font-size: 15pt; position: relative; top: 40%; left: 2%;">Enter
			an Index number to search! </span>


		<div id="search_div"
			style="position: relative; top: -5px; z-index: 2; left: 10%;">
			<form action="new_doctor.php" method="post"
				onsubmit="return ajax_search()">
				<!-- img style="position: relative;float: right;" src="../../images/new/mm/sp.gif" id="search_image" / -->
				<input type="text" name="query" onchange="search_f()"
					placeholder="Search" id="search" onkeyup="ajax_search()"
					onfocus="scrch()" onblur="$('#ajax_loading_div').fadeOut('fast')"
					required="required" autofocus="autofocus"
					style="padding: 4px; font-size: large; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);" />
				<input type="submit"
					style="position: relative; float: left; margin-left: 20px; visibility: hidden;"
					value="search" target="_self" name="search" />
			</form>
		</div>

	</div>

	<!-- Show this button to get back the navigation pane if it is gone by mistake, need to impliment no ligic found  -->
	<!--  div id="show_navigation_pane"
		style="position: fixed; float: left; height: auto; width: 10%; margin-top: 12%; margin-left: 5%; z-index: 40; display: none;">
		<button onclick="$('#navigation_pane').css({'display':''})">Show Navigation Pane</button>
	</div -->

	<div id="navigation_pane"
		style="position: fixed; float: left; height: auto; width: 10%; margin-top: 12%; margin-left: 1%; z-index: 40; display: none;">


		<button type="button" class="navigation_button" id="treatment_button"
			onclick="loadTreatmentPage(this)"
			style="color: #CC0066; font-size: large; float: left;">Treatment</button>
		<button type="button" class="navigation_button" id="Precords_button"
			onclick="loadPrecordsPage(this)"
			style="color: #66CCFF; font-size: large; float: left;">Personnal
			Records</button>
		<button type="button" class="navigation_button"
			id="Cexamination_button" onclick="loadCexaminationPage(this)"
			style="color: #66CCFF; font-size: large; float: left;">Clinical
			Examination</button>
		<button type="button" class="navigation_button" id="Fhistory_button"
			onclick="loadFhistoryPage(this)"
			style="color: #66CCFF; font-size: large; float: left;">Family History</button>
		<button type="button" class="navigation_button" id="Mhistory_button"
			onclick="loadMhistoryPage(this)"
			style="color: #66CCFF; font-size: large; float: left;">Medical
			History</button>
		<button type="button" class="navigation_button" id="Ntreatment_button"
			onclick="loadTreatmentPage(this)"
			style="color: #66CCFF; font-size: large; float: left;">New Treatment</button>

	</div>

	<div id="result_box">
		<div
			style="z-index: 1; position: relative; width: 50%; margin: 0, auto; left: 12%; right: 10%; padding-top: 1%;">
			<img id="welcome_image" alt="Welcome To UOM Medical Center WebSite"
				src="../../images/new/background/new_doctor_background.jpg" />

		</div>
	</div>

	<div id="ajax_loading_div" class="loading_div">
		<img id="loading_ajax" src="../../images/new/mm/c_loading.gif" />
	</div>

</body>
