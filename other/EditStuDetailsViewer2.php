<?php
//Start session
session_start();
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>AdminPanel</title>

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
<table width="992px" style="background:url(images/body.jpg) repeat-y;" align="center" border="0" cellpadding="0" cellspacing="0" height="960">
	<tr>
	  <td height="892" valign="10px">
 			<table width="988px" height="892" bgcolor="#FFFFFF"align="center" border="0" cellpadding="0" cellspacing="0">
				<tr valign="top">  
	   				<td width="25%" height="452">
	     				<table width="259" align="left" hspace="0px" border="0" cellpadding="0" cellspacing="0" >
		 					<tr valign="top">
			    				<td width="259" height="50PX" align="center" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;">
				   					<a href="AdminPanel.php" style=""><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Home</font></a>								</td>
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
				
								</td>
							</tr>
							<tr>
			      				<td height="50PX" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;" align="center">
				  
								</td>
							</tr>
	     			</table> 
      			</td>
	   			<td width="73%" valign="top" >
				
					<table border="1" width="97%" >
						<tr>
							<form name="searchinfo" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
 								<td><font color="#003399"><h3>Index Number:</h3></font></td>
								<td><input type="text" size="20" name="live"/></td>
								<td><input type="submit" name="editInfoSerarch" value="Search"/></td>
							</form>
						</tr>	
<?php
 
	if(isset($_POST[live])== TRUE)
	{
		$key = $_POST[live];
		getData($key);
	}
	else 
	if(isset($_POST[search])== TRUE)
	{
		$key = $_POST[search];
		getData($key);
	
	}
	
	function getData($key){
	require("config.php");
 	$query1 = "SELECT * FROM STUDENT WHERE StudentID = '". $key."'";
	$query2 = "SELECT Image_ID FROM images WHERE StudentID = '". $key."'";
	
               if ( !( $database = mysql_connect($dbhost, $dbuser, $dbpassword) ) )
                  die( "Could not connect to database" );
   
              // open db database
               if ( !mysql_select_db( "medicalcenterdb", $database ) )
                  die( "Could not open database" );
              // execute query in db database
               if ( !( $result1 = mysql_query( $query1, $database ) )  ) {
                  print( "Could not execute query1! <br />" );
                 die( mysql_error() );
                }
				$row = mysql_fetch_row($result1);
				
				if ( !( $result2 = mysql_query( $query2,$database ) )  ) {
                  print( "Could not execute query1! <br />" );
                 die( mysql_error() );
                }
				$row2 =mysql_fetch_row($result2);
				
				$imgId=$row2[0];
				
				echo"<form autocomplete='off' enctype='multipart/form-data' method='post' name='searchinfo'> 
		  		<tr>
			      <td ><font color=".'#003399'."><h3>Name    : </h3></font>
				  </td>
				  <td ><font color=".'#003399'."><h3><textarea cols='30' rows='2' name='stName' id='stName'>".$row[1]."</textarea></h3></font>
				  </td>
				  <td rowspan=".'2'." width=".'25%'." align=".'center'."height><img width=".'120'. "height=".'120'." src=Img_File.php?image_id=".$imgId."></td>
			   </tr>
			    <tr>
			      <td><font color=".'#003399'."><h3>StudentID: </h3></font>
				  </td>
				   <td ><font color=".'#003399'."><h3><input type='text' size='20' name='stId' id='stId'  value='".$row[0]."'/></h3></font>
				  </td>  
			   </tr>
			   <tr>
			      <td><font color=".'#003399'."><h3> Date of Birth : </h3></font>
				  </td>
				  <td ><font color=".'#003399'."><h3><input type='text' size='20' name='sDob' id='sDob' value='".$row[4]."'/></h3></font>
				  </td>
				  
			   </tr>
			   <tr>
			      <td><font color=".'#003399'."><h3> Gender: </h3></font>
				  </td>
				  <td ><font color=".'#003399'."><h3><input type='text' size='20' name='gender' id='gender' value='".$row[5]."'/></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color=".'#003399'."><h3> Faculty    : </h3></font>
				  </td>
				  <td ><font color=".'#003399'."><h3><input type='text' size='20' name='stFaculty' id='stFaculty' value='".$row[7]."'/></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color=".'#003399'."><h3> Maritalstatus: </h3></font>
				  </td>
				  <td ><font color=".'#003399'."><h3><input type='text' size='20' name='mStatus' id='mStatus' value='".$row[6]."'/></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color='#003399'><h3> Religion: </h3></font>
				  </td>
				  <td ><font color=".'#003399'."><h3><input type='text' size='20' name='religion' id='religion' value='".$row[8]."'/></h3></font>
				  </td>
			   </tr>
			   
			   <tr>
			      <td><font color='#003399'><h3> Nationality: </h3></font>
				  </td>
				  <td ><font color=".'#003399'."><h3><input type='text' size='20' name='nationality' id='nationality' value='".$row[9]."'/></h3></font>
				  </td>
			   </tr>
			    <tr>
			      <td><font color=".'#003399'."><h3>Current Address: </h3></font>
				  </td>
				  <td ><font color=".'#003399'."><h3><textarea cols='30' name='currAdd' id='currAdd' rows='3'>".$row[2]."</textarea></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color=".'#003399'."><h3>Permanent Address: </h3></font>
				  </td>
				  <td ><font color=".'#003399'."><h3><textarea name='permAdd' id='permAdd' cols='30' rows='3'>".$row[3]."</textarea></h3></font>
				  </td>
				  <td align='center'>
				<div id='main' style='height:80px;'>  
				<div id='button' style='height:30px;'>
				  <input type='submit' name='editbutton' id='editbutton' value=' Edit' class='editbutton' />
				</div>
				<div id='message' style='height:50px;'>
				  	<span class='error' style='display:none'> Please Enter Valid Data</span>
					<span class='success' style='display:none'> Successfully Updated..</span>
				</div>
				</div>	
				  </td>
			   </tr></form>";
			
	
		}
				

		?>				
						
						
				</tr>
				
		</table>
				
		</td>
	   			
	  		</tr>
</table></td></tr></table>
 	<table width="992" height="291" align="center" border="0" cellpadding="0" cellspacing="0">
 		<tr valign="top">
   			<td height="291"><img src="images/fotter.jpg">			</td>
 		</tr>
</table>
</body>
</html>
