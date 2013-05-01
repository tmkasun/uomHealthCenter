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
				    <a href="PastMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Past medical History </font>				   
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				 <a href="FamilyMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Family Medical History</font>				    			   
				</td>
			</tr>
			<tr>
			      <td bgcolor="#996699" height="50PX" valign="middle">
				   
				</td>
			</tr>
	     </table> 
      </td>
	  <td align="left" valign="top">
	  <div id="fmdsearch" style="background-color:#990099; position:relative; height:50px; width:600px;">
	  <form name="editfmh" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
	  <table border="1" width="70%">
	  	<tr>
			<td width="40%">Registration Number:</td>
			<td width="20%" align="center"><input type="text" size="12" name="reg" /></td>
			<td width="10%" align="center"><input type="submit" value="Search" name="fmSearch"/></td>
		</tr>
	  </table>
	   </form>
	  </div>
	  <div id="resultfh" style="background-color:#CCFF00; width:765px;">
	  <?php
	  
	 $regNo=$_POST['reg'];
	 echo "	<div id=reg>
	 		<h3>Registration Number:".$regNo."
			</h3>
	 
	 		</div>";
	 
	
	  
	  echo "<form method='post' action='UpdateFamilyHistory_DB.php'><table border='1' width='100%'>
	  			<tr>
					<td align='center' width='15%'>Member</td>
					<td align='center' width='10%'>Live/Dead</td>
					<td align='center' width='10%'>Age</td>
					<td align='center' width='65%'>Remarks</td>
				</tr>
				
			
	  
	  ";
	  
	  
	  	
		$regNu=$_POST['reg'];
		
	
		require("config.php");
		
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
		$number=mysql_num_rows($result);
		
		
		$i=0;
		
		while($row = mysql_fetch_array($result))
  		{
  			
			echo "<tr>
					<td width='15%'><input type='text' size='15' name='Member$".$i."' value='".$row['Member']."' /></td>
					<td width='10%'><input type='text' size='10' name='Lstatus$".$i."' value='".$row['LStatus']."' /></td>
					<td width='10%'><input type='text' size='10' name='age$".$i."' value='".$row['MAge']."' /></td>
					<td width='65%'><input type='text' size='65' name='remark$".$i."' value='".$row['MRemarks']."' />
					<input type='hidden' value='".$row['FamilyHistoryID']."' name='fmhisID' /></td>
					</tr>";
			$i=$i+1;		
  		}
		
		echo "<tr><td colspan='4'><input type='hidden' value='$number' name='numrows' /><input type='hidden' value='$regNu' name='regNo' /><div align='right'>
		<input type='submit' name='editfamilyinfo' value='UPDATE'></div></td></tr></table></form>";
		mysql_close($con);
		
		
	  
	  
	  
	  ?>
	  
	 
	  </div>
	  
	
	  
 
	</td>
	</tr>
</table
></body>
</html>
