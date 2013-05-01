<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');
	
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<script type="text/javascript" 
src="../../javascripts/jquery.js" language="javascript"></script>

<script type="text/javascript" src="../../javascripts/jquery.validate.js"></script>
<script language="javascript">


$(document).ready(function()
{
	$("#username").blur(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("user_availability.php",{ user_name:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('User name is already exist').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Username is not matched').addClass('messageboxok').fadeTo(900,1);	
			});
		  }
				
        });
 
	});
});
</script>

  
<script type="text/javascript">
    $(document).ready(function() {
      $("#changepassword").validate({
        rules: {
          renewpassword: "required",// simple rule, converted to {required:true}
          newpassword: "required" ,
		  oldpassword: "required" ,
		 username: "required" ,
		 
        },
        messages: {
          renewpassword: "*",
		  newpassword: "*",
		  oldpassword: "*",
		  username: "*",
		  
		  
		  
        }
      });
    });
  </script>
  
   <style type="text/css">

 	
    label.error {color: red; } 
    
  </style>

<style type="text/css">
body {
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:11px;
}
.top {
margin-bottom: 15px;
}
.messagebox{
	position:absolute;
	width:100px;
	margin-left:30px;
	border:1px solid #c93;
	background:#ffc;
	padding:3px;
}
.messageboxok{
	position:absolute;
	width:auto;
	margin-left:0px;
	border:1px solid #349534;
	background:#C9FFCA;
	padding:3px;
	font-weight:bold;
	color:#008000;
	
}
.messageboxerror{
	position:absolute;
	width:auto;
	margin-left:0px;
	border:1px solid #CC0000;
	background:#F7CBCA;
	padding:3px;
	font-weight:bold;
	color:#CC0000;
}

</style>
<title>Admin Panel-Account Settings</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style2 {color: #000000}
-->
</style>
</head>

<body>

<div id="wrapper" > <!--Start main div -->

<div id="wrapper_login"><!--start wrapper_loggin -->

<div id="header_login" ><!--start header_login -->
  
</div><!--End of header_login -->
    
	<div id="content_login" >
	
<div id="header_message" >
  
  <div id="welcom_Message" >
   
  <div style="float:right;"><font color="#FFCC00"><?php echo "Welcome ".$_SESSION['USERNAME']; ?> </font> </div>
  </div>
  <div class="main_navigation" align="right" >
   <a  href="../../inc/logout.php" name="logout">Logout</a>  </div>
  </div>
  <!--End of header_message -->

<div id="main_content" style="height:300px;"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="adminPanel.php">Home</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="createAccount.php" >Create Account</a>	

</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">

</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">

</div>

</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->
<form name="changepassword" action="changepassword.php" method="post" id="changepassword">
<div>
<table border="1" width="100%">

<tr>
		<td colspan="2" align="left"><font face="Tahoma" size="2"><b>Change Password</b></font></td>
		
		
</tr>
<tr>
		<td colspan="2" align="left"></td>
		
		
</tr>

	<tr>
		<td width="32%"><font face="Tahoma" size="2">Select Account Type:</font> </td>
		<td width="68%">
			<select name="accountType" id="accountType" style="font:Tahoma; size:2;">
		  			<option value="Administrator"><font face="Tahoma" size="2">Administrator</font></option>
		  			<option value="Doctor"><font face="Tahoma" size="2">Doctor</font></option>
		 			<option value="MLT"><font face="Tahoma" size="2">MLT</font></option>
		  			<option value="Pharmacist"><font face="Tahoma" size="2">Pharmacist</font></option>
					<option value="Dental"><font face="Tahoma" size="2">Dentist</font></option>
					
					
					
					
  			</select>
		
		</td>
		
	</tr>

	<tr>
		<td><font face="Tahoma" size="2">Enter Username:</font></td>
		<td><input type="text" maxlength="15" name="username" id="username" value=""/> <span id="msgbox" style="display:none"></span></td>
		
	</tr>
	<tr>
		<td><font face="Tahoma" size="2">Enter old Password:</font></td>
		<td><input type="password" size="20" name="oldpassword" id="oldpassword"/></td>
		
	</tr>
	<tr>
		<td><font face="Tahoma" size="2">Enter new Password:</font></td>
		<td><input type="password" size="20" name="newpassword" id="newpassword"/></td>
		
	</tr>
	<tr>
		<td><font face="Tahoma" size="2">Retype new Password:</font></td>
		<td><input type="password" size="20" name="renewpassword" id="renewpassword"/></td>
		
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="changePasswordButton" value="change"/>
		<div id="message" style="float:right;font:Tahoma; size:2; color:#000099;">
		<?php
		if($_GET['success']==1)
		{
			echo "The username you entered does not exist";
		}
		else if($_GET['success']==2)
		{
			echo "You entered an incorrect password"; 
		
		}
		else if($_GET['success']==3)
		{
			echo "Congratulations You have successfully changed your password";
		
		}
		else if($_GET['success']==4)
		{
			echo "The new password and confirm new password fields must be the same";
		
		}
		
		
		
		?>
		
		</div>
		</td>
		
	</tr>
 

</table>

</div>
</form>
</div><!--End of main_form_pane -->
</div><!--End of main content -->

	</div>
	<!--End of content-->

<div id="footer"> </div>


</div><!--End of wrapper_loggin -->
</div><!--End of wrapper -->

</body>
</html>
