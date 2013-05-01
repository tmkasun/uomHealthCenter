<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "2")
{
	header('Location: ../../index.php');
	
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>View Family Medical History of <?php echo $_SESSION['PATIENT_ID']; ?></title>
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

<div id="main_content" style="height:550px"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="doctor_page.php" >Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="doctor.php?id=<?php echo $_SESSION['PATIENT_ID'] ?>">Treatment</a>

</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="view_pageXray_doc.php">Clinical Examination </a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="ViewStuDetailsViewer_doc.php">Personal Recodes</a></div>

</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->

<div>
<table border="0" width="100%">
						
						<tr>
						<td>
						<?php
	  
	 $regNo=$_SESSION['PATIENT_ID'];
		echo "	<div id=reg>
	 		<font color='#000000' face='Tahoma' size='2'>Registration Number:".$regNo."
			</font>
	 
	 		</div>";
	  
	  
	  echo "<table border='1' width='100%' cellspacing='0' cellpadding='0'>
	  			<tr>
					<td align='center' width='15%'><font color='#000000' face='Tahoma' size='2'>Member</font></td>
					<td align='center' width='10%'><font color='#000000' face='Tahoma' size='2'>Live/Dead</font></td>
					<td align='center' width='10%'><font color='#000000' face='Tahoma' size='2'>Age</font></td>
					<td align='center' width='65%'><font color='#000000' face='Tahoma' size='2'>Remarks</font></td>
				</tr>
				
			
	  
	  ";
	  
	  	
	  	
		$regNu=$_SESSION['PATIENT_ID'];
		
	
		require("../../inc/config.php");
		
		$query1 = "SELECT *
					FROM familyhistory WHERE StudentID ='".$regNu."'
						";
		
		$con=mysql_connect($dbhost, $dbuser, $dbpassword);
		
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		mysql_select_db($dbdatabase, $con);
		$result = mysql_query($query1,$con);
		
		while($row = mysql_fetch_array($result))
  		{
  			
			echo "<tr>
					<td><font color='#000000' face='Tahoma' size='2'>".$row['Member']."</font></td>
					<td><font color='#000000' face='Tahoma' size='2'>".$row['LStatus']."</font></td>
					<td><font color='#000000' face='Tahoma' size='2'>".$row['MAge']."</font></td>
					<td><font color='#000000' face='Tahoma' size='2'>".$row['MRemarks']."</font></td>
					</tr>";
  		}
		
		echo "</table>";
		mysql_close($con);
	  
	  
	  
	  ?>
	  
						
						
						</td>
						
						</tr>
					
					
					
					
					
					
					</table>
				
				
				

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
