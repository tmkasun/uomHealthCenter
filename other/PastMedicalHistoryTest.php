<?php
//Start session
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Family Medical History</title>
</head>


<body marginheight="0px" marginwidth="0px" bgcolor="#000000">
<table width="1024px" bgcolor="#CC3399" height="130px" align="center">
 <tr>
   <td align="center"><br/><br/><br/><font face="Arial, Helvetica, sans-serif" size="+5"> University of Moratuwa Health Care Centre </font><br/><br/><br/>
   <div align="right" >
   		<table border="0">
   		<tr>
			<td>
			<font color="#FFCC00">
			<?php
				//retrieve session data
					echo "Welcome ".$_SESSION['USERNAME'];
			?>
		</font>
			
			
			</td>
			<td>
			
			 <a href="index.php"><img src="images/logout1.jpg"/> </a>
			
			</td>
		</tr>
		</table>
   		
   </div>  
   </td>
 </tr>
</table>
<table width="1024px" height="474" bgcolor="#990033"align="center">
    <tr>  
	   <td width="25%" height="438" valign="top">
	     <table width="250px" align="left" hspace="0px" >
		 <tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="AdminPanel.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Home</font>
				</td>
			</tr>
		  	<tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="PersonalData.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Personnal Record</font>
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="pageXray.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Clinical Examination </font>				   
				</td>
			</tr>
			<tr>
			       <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="Treatment.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Treatment </font>				   
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="PastMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Past medical History </font>				   
				</td>
			</tr>
			<tr>
			      <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="FamilyMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Family Medical History </font>				   
				</td>
			</tr>
	     </table> 
      </td>
	  <td align="left" valign="top">
	  <?php $patientID=$_SESSION['PATIENT_ID']; ?>
	  
	   <?php
	   		require("config.php");
			$con = mysql_connect($dbhost, $dbuser, $dbpassword);
			mysql_select_db( "medicalcenterdb", $con );



	$sql1 = "SELECT * FROM  treatment WHERE StudentID = '".$patientID."'";
	$result1 = mysql_query($sql1, $con);
	echo"<h2 align='center'><font color='#00CC33'>".$patientID."'s Past Medical History </font></h2>";
	echo "<table border='1' width='750'>
			<tr width='750'><font color='#CCFF66'>
				<th align='center' width ='42'><font color='#CCFF66'>Date</font></th>
				<th align='center' width ='177'><font color='#CCFF66'>Complaint</font></th>
				<th align='center' width ='177'><font color='#CCFF66'>Diagnosis</font></th>
				<th align='center' width ='177'><font color='#CCFF66'>Treatment</font></th>
				<th align='center' width ='177'><font color='#CCFF66'>Investigation</font></th>
			</tr>";
			
	while($row = mysql_fetch_array($result1))
 	{
 		echo "<tr  width='750'>";
 		echo "<td width ='42'>" . $row['TreatmentDate'] . "</td>";
 		echo "<td width ='177'>" . $row['Complaint'] . "</td>";
 		echo "<td width ='177'>" . $row['Diagnosis'] . "</td>";
 		echo "<td width ='177'>" . $row['Treatment_info'] . "</td>";
 		echo "<td width ='177'>" . $row['Investigation'] . "</td>";
 		echo "</tr>";
 	}
	echo "</table>";

	mysql_close($con);
?>
</body>
</html>
