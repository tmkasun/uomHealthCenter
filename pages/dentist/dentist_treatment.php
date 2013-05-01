<?php
//Start session
session_start();

if($_SESSION['LoginStatus'] != "5")
{

header('Location:../../index.php');

}

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="notification.js"></script>
<script type="text/javascript" src="../../javascripts/jquery.validate.js"></script>
  

  <script type="text/javascript">
    $(document).ready(function() {
      $("#form1").validate({
        rules: {
          indexNumb: "required",// simple rule, converted to {required:true}
          
        },
		 messages: { 
          indexNumb: "*" 
       } 
       
      });
    });
  </script>
   
  <style type="text/css">

 	
    label.error {color: red; } 
    
  </style>
  <style>
		
		#notification{
			position:fixed;
			bottom:0%;
			right:2%;
			height:150px;
			width:120px;
			border:1px solid black;
			border-bottom:0px;
		}
		#notificationClose{
			font-size:11px;
			width:100%;
			border-bottom:1px solid black;
		}
		#notificationIn{
			padding:10px;
			font-size:11px;
			cursor:pointer;
			
		}
	</style>

<title>Begin Treatment</title>
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

<div id="main_content" style="height:900px;"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="dentist_page.php" >Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
 <a href="dentist_treatment.php">Treatment</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">

</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
</div>

</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->

<div>
<form id="form1" name="form1" method="post" action="dentist.php"> 
				
				<div style="width:auto;">
				<span class="label">
				<font face="Tahoma" size="2">Enter Index No:</font>
				<input type="text" name="indexNumb"/>
				</span>
				<input style="margin-left:33px;" type="submit" value="Submit"/>
				</div>
				
				
				
				</form>
				<div style="margin-top:45px;">
				<iframe id="iframe" name="iframe" src="showInvestigationResults.php" scrolling="auto" 
 							width="100%" height="770" frameborder="1">
							
						
						
 							
				</iframe>
				</div>
				
				<div id="notification">
			<div id="notificationClose">
				Notification message
			<div style="float:right">X</div>
			</div>
			<div id="notificationIn">
			</div>
</div>

				

</div>

</div><!--End of main_form_pane -->
</div><!--End of main content -->

	</div>
	<!--End of content-->

<div id="footer"> </div>


</div><!--End of wrapper_loggin -->
</div><!--End of wrapper -->

</body>
</html>
