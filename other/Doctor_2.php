<?php
session_start();
extract ( $_POST );
//$patientIndex = $_POST['indexNumb'];
//session_register("PATIENT_ID");
//$_SESSION['PATIENT_ID'] = $patientIndex;
$patientNum =$_SESSION['PATIENT_ID'] ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="use_userID.js"></script>
<title>Untitled Document</title>
</head>
<body marginheight="0px" marginwidth="0px" bgcolor="#000000" onload="showUser('$patientNum')">
	<table width="1024px" bgcolor="#CC3399" height="130px" align="center" border="1">
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
<table width="1024px" height="474" bgcolor="#990033"align="center" border="0">
    <tr>  
	   <td width="26%" height="438" valign="top">
	     <table width="250px" align="left" hspace="0px" >
		 	<tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				  <a href="Doctor_page.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Home</font></a>
				</td>
		   	</tr>
		  	<tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="PersonalData.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Personnal Record</font></a>
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="pageXray.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Clinical Examination </font></a>				   
				</td>
			</tr>
			<tr>
			       <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="PastMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Past medical History </font></a>
				  	   
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				<a href="FamilyMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Family Medical History</font></a>	  			   
				</td>
			</tr>
			<tr>
			      <td bgcolor="#996699" height="50PX" valign="middle">
				   
				   <!-- <a href="Treatment.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Treatment </font></a>	-->					
				</td>
			</tr>
	     </table> 
      </td>
	  <td align="left" valign="top" width="74%">
		<form id="form1" name="form1" method="post" action="UpdateTreatment.php">
  			<table width="100%" height="524" border="1">
  				<tr valign="top">
					<td width="34%" align="center"><font color="#99FFCC" size="+1">Index No:</font></td>
					<td width="66%"><table border="1"><tr><td width="31%"> <input type="text" size="30" name="regNum" <?php echo "value=".$_SESSION['PATIENT_ID']?> />
					</td> 
					<td><input type="hidden" name="indexNum1"/></td></tr></table></td>
				</tr>
    			<tr>
      				<td width="34%" rowspan="2" valign="top"><p><font color="#99FFCC" size="+1">Date time</font></p>
        				
          					
         					<!--	 <textarea name="textarea1" rows="20" cols="20" ><?php /*RetriveDates()*/?></textarea>-->
							 <textarea name="textarea1" rows="20" cols="20" id="txtHint" <?php RetriveDates()?> ></textarea>
          					
	 				 </td>
	  
      				<td width="66%" valign="top">
	  					<label><font color="#99FFCC" size="+1">Complaint</font><br/>
         					 <textarea name="textarea2" rows="6" cols="50"></textarea>
     					 </label>
	 				 </td>
   				 </tr>
    			<tr>
      				<td height="19" width="100%">
						<label><font color="#99FFCC" size="+1">Diagnosis</font><br />
        					<textarea name="textarea3" rows="6" cols="50"></textarea>
      					</label>
	  				<table border="0">
	  					<tr>
							<td height="19">
								<label><font color="#99FFCC" size="+1">Investigations</font><br />
        							<textarea name="textarea4" rows="6" cols="50"></textarea>
     							</label></td>
				</tr>
		  </table>
	  				</td>
   				 </tr>
    			<tr>
      				<td height="155" width="100%S" align="center" valign="top"><label>
					<table border="1" width="100%">
						<tr>
							<td width="50%" align="center"><input type="button" value="New Treatment" name="treatment_button"/></td>
							<td><input type="submit" value="Submit" name="treatment_button" /></td>
						</tr>
					</table>
					
	  					
       
      				</label></td>
      				<td>
	  					<p><font color="#99FFCC" size="+1">Treatment</font></p>
      					<p>
        					<label>
        						<textarea name="textarea5" rows="7" cols="50"></textarea>
        					</label>
       					</p>
					</td>
    				</tr>
     		 </table>
       				<label>
	   				</label>
      			<p>&nbsp;</p>
    		</form>
		</td>
		</tr>
</table>
<?php

function RetriveDates()
{

require("config.php");
$query1 = "SELECT TreatmentDate FROM treatment";
$con = mysql_connect($dbhost, $dbuser, $dbpassword);

if(!$con)
{
die('Could not connect: ' . mysql_error());
	
}
mysql_select_db("medicalcenterdb", $con);
//mysql_select_db("my_db", $con);

$result = mysql_query("SELECT TreatmentDate FROM treatment WHERE StudentID = '".$patientIndex."'");

while($row = mysql_fetch_array($result))
  {
  print $row['TreatmentDate']."\n";
  
  
  }

mysql_close($con);

}

?>
	
</body>
</html>
