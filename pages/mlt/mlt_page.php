<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "4")
{
	header('Location: index.php');
}

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Mlt's Home</title>
<script src="jquery.js" language="JavaScript" type="text/javascript"></script>
<script src="notification.js" language="JavaScript" type="text/javascript"></script>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style2 {color: #000000}
-->
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

<div id="main_content" style="height:450px;"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="mlt_page.php" >Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
 <a href="liverProfile.php">Liver Profile</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="fBCESR.php">FBC+ESR </a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="chloride.php">Chloride</a>
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="glucoseFasting.php" >B.Glucose Fasting</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="lipidProfileTest.php" >Lipid Profile</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="ufr.php" >U.F.R</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="fbs.php" >F.B.S</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="rbs.php" >R.B.S</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="ppbs.php" >P.P.B.S</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="fbc.php" >F.B.C</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="esr.php" >E.S.R</a>	
</div>


</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->

<div>
<table border="0" width="100%">
						<tr>
							<td>
							<div style="position:relative; width:530px; 
							height:350px;" id="teatment_info">
							<iframe id="iframe_mlt" name="iframe_mlt" src="showInvestigation.php" scrolling="auto" 
 							width="100%" height="350" frameborder="1">
							
						
						
 							
							</iframe>
							</div>
				
				
				</div>
							
							
							
							
							</td>
						
						
						
						</tr>
					
					
	</table>
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
