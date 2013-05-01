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
<table width="988" style="background:url(images/body.jpg) repeat-y;" align="center" border="0" cellpadding="0" cellspacing="0" height="477">
	<tr>
	  <td width="988" height="477" valign="10px">
 			<table width="988px" height="415" bgcolor="#FFFFFF"align="center" border="0" cellpadding="0" cellspacing="0">
				<tr valign="top">  
	   				<td width="25%" height="415">
	     				<table width="259" align="left" hspace="0px" border="0" cellpadding="0" cellspacing="0" >
		 					<tr valign="top">
			    				<td width="259" height="50PX" align="center" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;">
				   					<a href="#" style=""><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Home</font></a>											                                </td>
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
				 	<form autocomplete="off" enctype="multipart/form-data" method="post" action="AddPersonalRecodes.php" name="personalData" onsubmit="return 	validateForm(this)"> 
					<table width="98%" height="262" border="1" align="center">
						<tr>
							<td width="15%"><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Index No:</font><br />
								<input type="text" size="20" name="indexNo" id="indexNo" onchange="isNotEmpty(this)"  />
							</td>
							<td width="30%"><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Full Name:</font><br />
	   							 <input type="text" size="50" name="fullName" id="fullName" />
							</td>
							<td width="47%"><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Photo:</font><br />
								<input type="file" name="userfile" id="userfile" />
							</td>
						</tr>
						<tr valign="bottom">
							<td><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Faculty:</font><br />
								<select name="faculty" id="faculty">
		  							<option value="Engineering">Engineering</option>
		  							<option value="IT">Information Technology</option>
		 							<option value="Archi">Architecture</option>
		  							<option value="ndt">NDT</option>
  								</select> 
							</td>
							<td><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Religion:</font><br />
								<select name="religion" id="religion">
									<option value="Buddhist">Buddhist</option>
  									<option value="Hindu">Hindu</option>
  									<option value="Islam">Islam</option>
									<option value="Chathelic">Chathelic</option>
  								</select> 
							</td>
	
							<td><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Nationality:</font><br />
								<select name="nationality" id="nationality">
									<option value="Sinhala">Sinhala</option>
  									<option value="Tamil">Tamil</option>
									<option value="Muslim">Muslim</option>
									<option value="other">Other</option>
  								</select> 
		
	 						</td>
    					</tr>
   						<tr valign="top">
	  					<td><br /><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Date of Birth</font><br />
							<input type="text" value="4/16/1986" name="dob" id="dob" />	
	   					</td>
	   					<td><br />
	  						<br />
								<input name="gender" type="radio" value="male" id="gender" /><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Male</font>
								<input name="gender" type="radio" value="female" id="gender" /><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Female</font>
	  					 </td>
	    				<td><br /><br />
								<input name="mstatus" type="radio" value="Single" id="mstatus" /><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Single</font>
								<input name="mstatus" type="radio" value="Married" id="mstatus" /><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Married</font>
	    				</td>
      				</tr>
					<tr>
						<table border="1" width="20%" bordercolor="#0033FF">
							<tr>
								<td><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Current Address:</font><br />
								<textarea cols="40" rows="5" name="currentAdd" id="currentAdd"></textarea>
								</td>
								<td><font color="#00FFFF" face="Arial, Helvetica, sans-serif">Permanent Address:</font><br />
								<textarea cols="40" rows="5" name="permenentAdd" id="permenentAdd"></textarea>
								</td>
							</tr>
	 					</table>
     				</tr>
    				<tr align="right">
	      				<table width="65%" height="60px" border="1" align="center">
	        				<tr align="right" valign="top">
								<td width="90%">
					
				
				
								</td>
		
	          					<td align="right" width="10%">
			  					<input type="submit" name="update" value="Update" id="update"/>
			   
		     					</td>
	       					</tr>
	      				</table>
      				</tr>	
	  				<tr>
	  					<td height="54"><input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="100000000" />
						</td>
	  				</tr>
      			</table>
     		</form>
	<!--
	 		<script language="JavaScript" type="text/javascript">
//You should create the validator only after the definition of the HTML form
 			var frmvalidator = new Validator("personalData");
 		frmvalidator.addValidation("indexNo","req","Please Enter index Number");
 		//frmvalidator.addValidation("FirstName","maxlen=20",
									//"Max length for FirstName is 20");
 		frmvalidator.addValidation("fullName","req","Please Enter full name");
 
 		frmvalidator.addValidation("userfile","req","Please select a photo");
		frmvalidator.addValidation("faculty","dontselect=0");
		frmvalidator.addValidation("religion","dontselect=0");
		frmvalidator.addValidation("nationality","dontselect=0");
 		frmvalidator.addValidation("LastName","maxlen=20");
 
 		frmvalidator.addValidation("Email","maxlen=50");
 		frmvalidator.addValidation("Email","req");
 		frmvalidator.addValidation("Email","email");
 
 		frmvalidator.addValidation("Phone","maxlen=50");
 		frmvalidator.addValidation("Phone","numeric");
 
 		frmvalidator.addValidation("Address","maxlen=50");
 		frmvalidator.addValidation("Country","dontselect=0");

	</script> -->
				</td>	
	  		</tr>
		</table>
	</td>
	</tr>
</table>
 	<table width="992" height="33" align="center" border="0" cellpadding="0" cellspacing="0">
 		<tr valign="top">
   			<td height="33"><img src="images/fotter.jpg">			</td>
 		</tr>
</table>
</body>
</html>
