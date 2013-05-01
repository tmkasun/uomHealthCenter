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
<title>Admin Panel - View Family Medical History</title>
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
<a  href="adminPanel.php" >Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
 <a href="personalData.php">Personnal Records</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="pageXray.php">Clinical Examination </a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="familyMedicalHistory.php">Medical History</a>
</div>

</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->

<div>
<table border="0" width="100%">
						<tr>
							<td>
								<form name="editfmh" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
	  								<table border="0" width="80%">
	  									<tr>
											<td width="35%"><font color='#000000' face='Tahoma' size='2'>Enter Registration Number:
											</font></td>
											<td width="20%" align="center"><input type="text" size="12" name="reg" /></td>
											<td width="25%" align="center"><input type="submit" value="Search" name="fmSearch"/></td>
										</tr>
	  								</table>
	   							</form>
							
							</td>
					
							
						</tr>
						<tr>
						<td>
						<?php
	  
	 $regNo=$_POST['reg'];
		echo "	<div id=reg><br/><br/>
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
	  
	  	
	  	
		$regNu=$_POST['reg'];
		
	
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
					<td>".$row['Member']."</td>
					<td>".$row['LStatus']."</td>
					<td>".$row['MAge']."</td>
					<td>".$row['MRemarks']."</td>
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
