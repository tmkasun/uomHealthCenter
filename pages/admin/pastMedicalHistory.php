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
<title>AdminPanel</title>
<style>
  td {overflow:hidden;}
</style>


</head>


<body marginheight="0px" marginwidth="0px" bgcolor="#FFFFFF">
<table width="992" height="279" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
   		<td height="279" background="images/header.jpg" >
		<div align="right" style="height::250px;">
   			<p>&nbsp;</p>
   			<p>&nbsp;</p>
   			<p>&nbsp;</p>
   			<p>&nbsp;</p>
   			<p>&nbsp;</p>
   			<p>&nbsp;</p>
   			<table border="0" width="28%">
   				<tr>
					<td width="18%">
						<font color="#FFCC00">
							<?php
								echo "Welcome ".$_SESSION['USERNAME'];
							?>
						</font>
					</td>
					<td width="10%" style="background:url(images/log.jpg) no-repeat;">
			 			<a href="index.php"><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Logout</font></a>
					</td>
				</tr>
			</table>
		</div>	
		
	</td>
		
	</tr>
</table>
<table width="992px" style="background:url(images/body.jpg) repeat-y;" align="center" border="0" cellpadding="0" cellspacing="0" height="629">
	<tr>
	  <td height="629" valign="10px">
 			<table width="988px" height="552" bgcolor="#FFFFFF"align="center" border="0" cellpadding="0" cellspacing="0">
				<tr valign="top">  
	   				<td width="25%" height="452">
	     				<table width="259" align="left" hspace="0px" border="0" cellpadding="0" cellspacing="0" >
		 					<tr valign="top">
			    				<td width="259" height="50PX" align="center" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;">
				   					<a href="Doctor_page.php" style=""><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Home</font></a>								</td>
							</tr>
		  					<tr valign="top">
			    				<td bgcolor="#996699" height="50PX" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;" align="center">
				  					 <a href="PersonalData.php"><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Personnal Records</font></a>
								</td>
							</tr>
							<tr>
			     				<td height="50PX" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;" align="center">
				   					<a href="pageXray.php"><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Clinical Examination </font></a>				   
								</td>
							</tr>
							<tr>
			       				<td height="50PX" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;" align="center">
				  					<a href="FamilyMedicalHistory.php"><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Family Medical History</font></a>				   			   			   
								</td>
							</tr>
							<tr>
			     				<td height="50PX" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;" align="center">
				<a href="Doctor.php"><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Treatment</font></a>				   			   			   
								</td>
							</tr>
							<tr>
			      				<td height="50PX" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;" align="center">
				  
								</td>
							</tr>
	     			</table> 
      			</td>
	   			<td width="73%" valign="top" >
				
				
				
	  
	   <?php
	   		$patientID=$_SESSION['PATIENT_ID'];
	   		require("config.php");
			$con = mysql_connect($dbhost, $dbuser, $dbpassword);
			mysql_select_db( "medicalcenterdb", $con );



	$sql1 = "SELECT * FROM  treatment WHERE StudentID = '".$patientID."'";
	$result1 = mysql_query($sql1, $con);
	echo"<h2 align='center'><font color='#0000FF'>".$patientID."'s Past Medical History </font></h2>";
	echo "<table border='1' width='97%' style='table-layout:fixed'><col width=9%><col width=22%><col width=22%><col width=22%><col width=22%>
			<tr><font color='#CCFF66'>
				<td><font color='#0000FF'>Date</font></td>
				<td><font color='#0000FF'>Complaint</font></td>
				<td><font color='#0000FF'>Diagnosis</font></td>
				<td><font color='#0000FF'>Treatment</font></td>
				<td><font color='#0000FF'>Investigation</font></td>
			</tr></table><div style='width:100%; height:400px; overflow: auto;'><table border='1' width='97%' style='table-layout:fixed'><col width=9%><col width=22%><col width=22%><col width=22%><col width=22%>";
			
	while($row = mysql_fetch_array($result1))
 	{
 		echo "<tr>";
 		echo "<td>" . $row['TreatmentDate'] . "</td>";
 		echo "<td>" . $row['Complaint'] . "</td>";
 		echo "<td>" . $row['Diagnosis'] . "</td>";
 		echo "<td>" . $row['Treatment_info'] . "</td>";
 		echo "<td>" . $row['Investigation'] . "</td>";
 		echo "</tr>";
 	}
	echo "</table></div>";

	mysql_close($con);
?>
				
				
				
				</td>
	   			
	  		</tr>
</table></td></tr></table>
 	<table width="992" height="33" align="center" border="0" cellpadding="0" cellspacing="0">
 		<tr valign="top">
   			<td height="33"><img src="images/fotter.jpg">			</td>
 		</tr>
</table>
</body>
</html>
