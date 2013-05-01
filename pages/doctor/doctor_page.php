<?php
//Start session
session_start();

if($_SESSION['LoginStatus'] != "2")
{

header('Location:../../index.php');

}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<script language="JavaScript" type="text/javascript" src="ajax_javascript.js"></script>
<title>Doctor's Page </title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="../../javascripts/ajax.js"></script>
<script type="text/javascript" src="../../javascripts/ajax-dynamic-list.js">
</script>
<style type="text/css">
	
	#ajax_listOfOptions{
		position:absolute;	/* Never change this one */
		width:175px;	/* Width of box */
		height:250px;	/* Height of box */
		overflow:auto;	/* Scrolling features */
		border:1px solid #317082;	/* Dark green border */
		background-color:#FFF;	/* White background color */
		text-align:left;
		font-size:0.9em;
		z-index:100;
	}
	#ajax_listOfOptions div{	/* General rule for both .optionDiv and .optionDivSelected */
		margin:1px;		
		padding:1px;
		cursor:pointer;
		font-size:0.9em;
	}
	#ajax_listOfOptions .optionDiv{	/* Div for each item in list */
		
	}
	#ajax_listOfOptions .optionDivSelected{ /* Selected item in the list */
		background-color:#317082;
		color:#FFF;
	}
	#ajax_listOfOptions_iframe{
		background-color:#F00;
		position:absolute;
		z-index:5;
	}
	
	</style>
<style type="text/css">
<!--
.style2 {color: #000000}
-->
</style>
</head>

<body onLoad="ajax_update();">

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

<div id="main_content" style="height:500px;"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="doctor_page.php" >Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
 <a href="doctor_treatment.php">Treatment</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">

</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">

</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/notification.gif) no-repeat;">
<div style="float:left;margin-left:30px;margin-top:5px; color:#0033CC;" id="content">
 <p>Loading��.</p>
</div>
</div>



</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->

<div id="search_form" align="center">

<form action="viewStuDetailsViewer.php" method="post" >
<font face="Tahoma" style="color:#006600">Search</font>
<input type="text" autocomplete = "off" id="search" width="150px" name="search" value="" onKeyUp="ajax_showOptions(this,'getStudentIDByLetters',event)"/>
<input type="hidden" id="country_hidden" name="country_ID"/> <input type="submit" value="Search" name="sumit"/></p>



</form>
</div>

<div  id="front_image">
<img src="../../images/medical-center.jpg" width="525px" height="320px"/>
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
