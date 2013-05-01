<?php
//Start session
session_start();
extract ( $_POST );
$patientIndex = $_POST['indexNumb'];
session_register("PATIENT_ID");
$_SESSION['PATIENT_ID'] = $patientIndex;

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>AdminPanel</title>
<style type="text/css">

.error{
	
	color:#d12f19;
	font-size:12px;
	
		
	}
	.success{
	
	color:#006600;
	font-size:12px;
	
		
	}
</style>




</head>


<body marginheight="0px" marginwidth="0px" bgcolor="#FFFFFF">
<form id="form" method="post">
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
<table width="992px" style="background:url(images/body.jpg) repeat-y;" align="center" border="0" cellpadding="0" cellspacing="0" height="859">
	<tr>
	  <td height="859" valign="10px">
 			<table width="988px" height="782" bgcolor="#FFFFFF"align="center" border="0" cellpadding="0" cellspacing="0">
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
								<a href="PastMedicalHistory.php"><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Past Medical History</font></a>				   			   			   
								</td>
							</tr>
							<tr>
			      				<td height="50PX" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;" align="center">
				  
								</td>
							</tr>
	     			</table> 
      			</td>
	   			<td width="73%" valign="top" >
					<table border="1" width="97%">
						<tr>
								<td width="40%" align="center">
									<font color="#0000FF" size="+1">Enter Index No:</font>
								</td>
				  				<td width="25%">
									<input type="text" size="30" name="regNo" id="regNo" value=" <?php echo $_SESSION['PATIENT_ID']?> "/>
									<input type="hidden" name="indexNum1"/>
								</td>
								
					
							</tr>
							<tr>
      						<td width="34%" rowspan="2" valign="top" align="center" height="100px"><p><font color="#0000FF" size="+1">Date time</font></p>
        				
          			
         				<div id="container" style="height:90px">
							<ul class="menu">
							<!--	<li>Shoutbox</li> -->
							</ul>
								<span class="clear"></span>
									<div class="content" style="height:420px ; overflow : auto; " >
									<!--		<h1>Latest Messages</h1> -->
											<div id="loading" style="height:20px"><img src="css/images/loading.gif" alt="Loading..." />
											</div>
												<ul>
												<ul>
												
									</div>
						</div>
					
							<!-- <textarea name="textarea1" rows="20" cols="20" id="textarea1"></textarea> -->
							 	
							 
							 
							 
							
									
							 
          					
	 				 </td>
	  
      				<td width="63%" valign="top">
	  					<label><font color="#0000FF" size="+1">Complaint</font><br/>
         					 <textarea name="textarea2" id="textarea2" rows="6" cols="45"></textarea>
     					 </label>
	 				 </td>
   				 </tr>
				 
				 <tr>
      				<td height="19" width="100%">
						<label><font color="#0000FF" size="+1">Diagnosis</font><br />
        					<textarea name="textarea3" id="textarea3" rows="6" cols="45"></textarea>
      					</label>
	  				<table border="0">
	  					<tr>
							<td height="19">
								<label><font color="#0000FF" size="+1">Investigations</font><br />
        							<textarea name="textarea4" id="textarea4" rows="6" cols="45"></textarea>
     							</label></td>
				</tr>
				</table>
					</td>
   				 </tr>
    			<tr>
      				<td height="155" width="100%" align="center" valign="top"><label>
					<table border="1" width="100%">
					<div>
						<tr height>
							<td width="30%" align="center" bgcolor="#FFFFFF">
							<input type="submit" name="submit" id="submit" value="Submit" class="submit"/> 
			
							</td>
							<td bgcolor="#FFFFFF" rowspan="2">
							<span class="error" style="display:none"> Please Enter Valid Data</span>
			<span class="success" style="display:none"> Treatment Successfully sent..........  <a href="Doctor1.php" style="color:#0066CC; font-weight:bold">
							Click For a New Treatment
							</a></span>
							</td>
							
						</tr>
						
					</div>
					</table>
					
					</label></td>
      				<td>
	  					<p><font color="#0000FF" size="+1">Treatment</font></p>
      					<p>
        					<label>
        						<textarea name="textarea5" id="textarea5" rows="6" cols="45"></textarea>
        					</label>
       					</p>
					</td>
    				</tr>
     		 </table>
			 
       				<label>
	   				</label>
      			<p>&nbsp;</p>
    	
		</td>
		</tr>
</table>
</form>

					
					</table>
				
				
				
				
				</td>
	   			
	  		</tr>
</table></td></tr></table>
 	<table width="992" height="33" align="center" border="0" cellpadding="0" cellspacing="0">
 		<tr valign="top">
   			<td height="33"><img src="images/fotter.jpg">			</td>
 		</tr>
</table>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="TreatmentAjax.js"></script>
			
</body>
</html>
