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
				   <a href="FamilyMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Add Family History</font>
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="EditFamilyMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Edit Family History</font>				   
				</td>
			</tr>
			<tr>
			       <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="ViewFamilyMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">View Family History </font>				   
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				  			   
				</td>
			</tr>
			<tr>
			      <td bgcolor="#996699" height="50PX" valign="middle">
				   				   
				</td>
			</tr>
	     </table> 
      </td>
	  <td align="left" valign="top">
	
		
		
		<div id="familyHeader" style="position:relative; border-top:20px; height:60px;">
 			<table border="1" width="100%">
				<tr>
					<form name="searchinfo" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
						<td align="center"><font color="#0000FF"><h3>Reg Number</h3></font></td>
						<td align="center"><input type="text" size="10" name="regNum" /></td>
 						<td align="center"><font color="#0000FF"><h3>Enter Number of Members in the Family</h3></font></td>
						<td>
						<select name="FamilyMembers">
							<option value="1">1</option>
  							<option value="2">2</option>
  							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
  						</select> 
						</td>
						<td><input type="submit" name="generate_form" value="Generate"/></td>
					</form>
				</tr>
			</table>	
		</div>
		
		<div id="space" style="position:relative; border-top:20px; height:50px;">
			<div id="title">
				
			</div>
		</div>
		<div id="family_details">
		<?php 
		$fNumber=$_POST['FamilyMembers'];
		$regID= $_POST['regNum'];
		echo "	<div id=reg>
	 		<h3>Registration Number:".$regID."
			</h3>
	 
	 		</div>";
		
		echo "<form name='Member_From' action='InsertFamilyInfo.php?fNu=$fNumber&id=$regID' method='post'>";
		
		
		
		echo "<table border ='1' width='100%'>
				<tr>
					<td width='15%' align='center><font color='#99FFCC'>Member </font></td>
					<td width='10%' align='center><font color='#99FFCC'>Live/Dead </font></td>
					<td width='10%' align='center><font color='#99FFCC'>Age </font></td>
					<td width='65%' align='center><font color='#99FFCC'>Remarks </font></td>	
				<tr>";
				for($i=0;$i<$fNumber;$i++)
				{
				
				echo "<tr>
						<td align='center'>
							<select name='Member$".$i ."'>
							<option value='Father'>Father</option>
  							<option value='Mother'>Mother</option>
  							<option value='Sister'>Sister</option>
							<option value='Brother'>Brother</option>
							<option value='Me'>Me</option>
						</select>
						
						
						</td>	
						<td align='center'>
							<select name='Lstatus$".$i."'>
							<option value='Live'>Live</option>
  							<option value='Dead'>Dead</option>
						
						
						</td>	
						<td align='center'>
							<input type ='text' size='5' name='age$".$i."'/>
						</td>	
						<td align='center'>
							<input type ='text' size='67' name='remark$".$i."'/>
						</td>
						</tr>";
				
				
				}
				echo "<tr align='right'>
					<td colspan ='4'><input type='submit' value='Submit' name='familyInfosub'/></td>
					
					
					
					</tr>";
				
				"</form>"
				
			
				?>
				
				
	  </tr>
				
				
				
		
		</div>
 	
	
 
	</td>
	</tr>
</table
></body>
</html>
