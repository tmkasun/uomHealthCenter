<?php session_start();
if ($_SESSION["USERID"]) {

	require ("./inc/config.php");

	$connection = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Can not connect to the server");
	//try to connect to sql server if can't connect display error message

	$dbase = mysql_select_db("medicalcenterdb", $connection) or die("Can not access data base");
	//select medicalcenter databse for SQL queries or display error message

	$username = $_SESSION["USERID"];
	//get username grom form posting

	$query = "select * from user where UserID = '$username'";
	$result = mysql_query($query);
	$numrows = mysql_num_rows($result);
	//print $numrows;
	$member = mysql_fetch_assoc($result);
	if ($numrows > 0) {

		switch($member['loginStatus']) {

			case 1 :
				//echo "1";
				header('Location:' . $config_basedir . '/pages/admin/adminPanel.php');
				//print $config_basedir;

				break;

			case 2 :
				//echo "2";
				header('Location:' . $config_basedir . '/pages/doctor/new_doctor.php');

				break;

			case 3 :
				//echo "3";
				header('Location:' . $config_basedir . '/pages/pharmacist/new_pharmacist.php');

				break;

			case 4 :
				header('Location:' . $config_basedir . '/pages/mlt/mlt_page.php');
				//echo "4";
				break;

			case 5 :
				//echo "5";
				header('Location:' . $config_basedir . '/pages/dentist/dentist_page.php');

				break;
		}

	}
}
?>
<!DOCTYPE html>
<html
	lang="en-US">

<!-- 
 Message for developers:
 on submit return
 on press value check
 

 -->

<head>
<link rel="shortcut icon" href="./images/fav.png" />
<title>Welcome to UOM Health Center System</title>
<meta name="keywords" content="Health Center" />
<!--  SEO meta contents keywords -->
<meta name="author"
	content="University Of Moratuwa Faculty Of Information Technology" />
<meta name="description" content="Health Center Information System" />
<meta charset="UTF-8" />
<!-- NO CCS styles for loging page inline styles has been used  -->
<!-- link href="./css/styles.css" rel="stylesheet" type="text/css" / -->

<script src="./javascripts/new/jquery-1.8.3.js"></script>

<script src="./javascripts/new/jquery-ui-1.9.2.js"></script>

<script type="text/javascript">
	//block tring after 3 attempt
	
	var try_count = 0;
	function trys() {
		//alert("testing");
		if (try_count > 2) {
			alert("you have exceeded the maximum number of login attempts!");
			return false;
		} else {
			try_count += 1;
			return true;
		}
	}

	//block tring after 3 attempt end--
	//ajax supported loging method
	var signin_ajax = new XMLHttpRequest();
	function ajax_return() {

		var response = "";
		if (signin_ajax.readyState == 4 && signin_ajax.status == 200) {
			response = signin_ajax.responseText;
			loginstatus = parseInt(response);

			if (loginstatus < 0) {// wrong password
				//alert("Wrong Password");
				//login and password are the id of username and password input tags :)
				document.getElementById("login").style.boxShadow = "0px 1px 5px 1px #F90000";
				document.getElementById("login").style.borderColor = "red";
				$("#login").effect("shake", 500);
				document.getElementById("password").style.borderColor = "red";
				document.getElementById("password").style.boxShadow = " 0px 1px 5px 1px #F90000";
				setTimeout(function() {
					$("#password").effect("shake", 500);
				}, 100);
				$("#submit_button").fadeIn("slow");
				document.getElementById("loading_image").style.display = "none";
				return false;
			} else if (loginstatus > 0) {

				//alert("Correct Password");
				$("#fit11").fadeOut("slow");
				setTimeout(function() {
					$("#myusername").effect("drop", {
						direction : "right"
					}, 500);
				}, 200);
				$("#login").effect("drop", {
					direction : "right"
				}, 200);
				$("#submit_button").fadeOut("slow");

				setTimeout(function() {
					$("#password").effect("drop", {
						direction : "left"
					}, 500);
				}, 200);
				$("#pass").effect("drop", {
					direction : "left"
				}, 500);

				setTimeout(function() {
					$("#Sign_in").slideUp({
						direction : "up"
					}, 500);
				}, 800);
				setTimeout(function() {
					$("#login_form").slideUp({
						direction : "down"
					}, 500);
				}, 200);

				switch (loginstatus) {
					case 1:

						setTimeout(function() {
							window.location.href = "/pages/admin/adminPanel.php";
						}, 1000);

						break;

					case 2:
						setTimeout(function() {
							window.location.href = '/pages/doctor/new_doctor.php';
						}, 1000);

						break;

					case 3:
						setTimeout(function() {
							window.location.href = '/pages/pharmacist/new_pharmacist.php';
						}, 1000);

						break;

					case 4:
						setTimeout(function() {
							window.location.href = '/pages/mlt/mlt_page.php';
						}, 1000);

						break;

					case 5:
						setTimeout(function() {
							window.location.href = '/pages/dentist/dentist_page.php';
						}, 1000);

						break;

				}

			} else {
				alert("Error Please Try Again");
				$("#submit_button").fadeIn("slow");
				document.getElementById("loading_image").style.display = "none";
				return false;
			}

		}

	}

	//on submit signin form call this function for AJAX loadings
	function ajax_signin() {
		if (!trys()) {
			return false;
		}

		//if(!subCheak()){
		//	alert("error!");
		//	return false;
		//}

		var username = document.forms["signin"]["username"].value;
		var password = document.forms["signin"]["password"].value;

		$("#submit_button").fadeOut("slow");
		document.getElementById("loading_image").style.display = "";
		//alert(username+">>>>>"+password);
		signin_ajax.open("POST", "./inc/login.php", true);
		signin_ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		signin_ajax.send("username=" + username + "&password=" + password);
		signin_ajax.onreadystatechange = ajax_return;

	}

	//ajax supported loging method --end

	//onload document slide up header and slide down login page section
	$(document).ready(function() {
		$('#loading').remove();
		$("#Sign_in").effect("slide", {
			direction : "down"
		}, 600);
		setTimeout(function() {
			$("#login_form").slideDown("slow");
		}, 600);

	});
	//onload document slide up header and slide down login page section --end
	function check_myusername(obj) {
		var txt = new String(obj.value);
		if (txt.length == 6) {
			document.getElementById("error").setAttribute("src", "./images/logins/ok.ico");

			var new_value = "";
			for (letter in txt) {// use is a number to check number int validity
				new_value += txt[letter].toUpperCase();
			}
			obj.value = new_value;

		} else {
			document.getElementById("error").setAttribute("src", "./images/logins/no.ico");
		}
	}

	//check submition time myusername value for validness
	function subCheak() {

		var input = document.forms["signin"]["username"];
		var error = document.getElementById("error");
		var myusername = new String(input.value);

		if (myusername.length != 7 || !isNaN(myusername[myusername.length - 1]) || isNaN(myusername[1])) {
			error.setAttribute("src", "./images/logins/no.ico");
			return false;
		} else {
			for (chars in myusername) {
				if (chars == (myusername.length - 1))
					break;
				if (isNaN(myusername[chars])) {
					error.setAttribute("src", "./images/logins/no.ico");
					return false;
				}
			}

			return true;
		}
		//check submition time myusername value for validness --end

	}

		</script>
</head>
<!-- set webpage body background image use back*.jpg file notation resize image size with window size by "background-size:cover" style attribute -->
<body id="body_first"
	style="background-image: url('./images/logins/back1.jpeg'); background-size: cover; -moz-background-size: cover; -webkit-background-size: cover;">
	<!-- div id="top_bar">
	<a style="position: relative;left: 5px;top: 10px;font-size:10pt;">Hello </a>
	
		<span style="position: relative;left: 5px;top: 10px;"><a>
	<?php
	error_reporting(E_PARSE); //should be removed
	if ($_SESSION['cname']){ //cheack weather user has loged into the system or not and disply a message
		header('Location : ./welcome.php');
		die();}
	else{
		print "Guest"."</a>";
	}

?>
</span>
</font>
</div -->

<p align="center">
	<b><a style="font-size: 18pt; color: #FFBD12;">Welcome To UOM Health
	Center</a> </b>
</p>
<div align="center" style="width: 50%">
	<br />

</div>

<div id="loging_div"
style="position: relative; margin: 0px auto; text-align: center; width: 40%; box-shadow: 0px 10px 30px 1px #181B21; border-radius: 10px; padding-bottom: 5%;">

	<h1 id="Sign_in" style="display: none;">User Login</h1>

	<!-- Loging form tag(DOM) start -->
	<form id="login_form" name="signin" action="/inc/login.php"
	method="post" onsubmit="<!-- return ajax_signin() -->"
	style="display: none;">
		<p>
			<!-- Computer number in SL Port has been used as unique identifier for user login -->
			<a id="myusername" style="float: left; margin-left: 10pt;">Username:</a>
			<img src="./images/logins/university_logo.png" id="fit11"
			style="position: relative; float: right; resize: none; border: 0; overflow: hidden; width: 20%; height: 20%; margin-right: 10pt;" />
			<br />
			<br />
			<!-- onkeyup="check_myusername(this)" has been removed because no need of checking usernames -->
			<input type="text" id="login" name="username" required="required"
			placeholder="Username" autofocus="autofocus"
			style="float: left; border: 1px groove #47A0D3; border-radius: 5px; margin: 0; padding: 5px; margin-left: 10pt;" />
			<br />
			<br />
			<a id="pass" style="float: left; margin-left: 10pt;">Password</a>
			<br />
			<br />
			<input type="password" name="password" id="password"
			required="required" placeholder="Password"
			style="float: left; border: 1px groove #47A0D3; border-radius: 5px; margin: 0; padding: 5px; margin-left: 10pt;" />
			<img id="loading_image"
			style="position: relative; float: right; display: none;"
			src="./images/logins/waiting.gif" />
		</p>
		<!-- input type = "submit"  style="visibility: hidden;"/ -->
		<button type="button" id="submit_button" name="submit"
		class="def_button" target="_self" onclick="ajax_signin()">
			<!--  -->

			<!--  img id="error" style="text-align: right;" width="16" height="16"
			style="border: 0px;"></img -->
			<span>Sign in</span>
		</button>
	</form>
	<!-- Loging form tag(DOM) End -->

	<?php
	if ($_POST["pass_stat"])
		print $_POST["pass_stat"];
	
	?>
</div>

<a
style="position: absolute; bottom: 0px; margin-left: auto; color: #898989; font-size: 10pt; margin-left: auto;"> Developed by Faculty Of Information Technology- University of Moratuwa </a>
<a
style="position: absolute; bottom: 0px; float: right; right: 0px; color: #898989; font-size: 10pt;"><?php print "Last modified: " . date("F d Y H:i", getlastmod()); ?>
<!-- &copy;-ḱß﹩◎ƒ☂ --> </a>

</body>

</html>
