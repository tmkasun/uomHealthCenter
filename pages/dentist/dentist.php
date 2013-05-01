<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "5")
{
	header('Location:../../index.php');
}

if($_POST){
extract ( $_POST );
$patientIndex = $_POST['indexNumb'];
session_register("PATIENT_ID");
$_SESSION['PATIENT_ID'] = $patientIndex;
}
else if(isset($_GET['id'])){
$_SESSION['PATIENT_ID']=$_GET['id'];
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript" src="../../javascripts/jquery.js"></script>
<script type="text/javascript" src="TreatmentAjax.js"></script>
<title>Treatment</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style2 {color: #000000}
-->
</style>
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

<body>
<form id="form" method="post">
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

<div id="main_content" style="height:580px;"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="dentist_page.php">Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
 <a href="viewStuDetailsViewer_dentist.php">Personnal Records</a>
 </div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="view_pageXray_dentist.php">Clinical Examination</a>				   

</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="viewFamilyMedicalHistory_dentist.php">Medical History</a>				   			
</div>
<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="dentist_treatment.php">New Treatment</a>				   			
</div>


</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->

<div>
<table border="0" width="100%" height="350px">
					<tr>
					<td>
					
					<table width="100%" height="524" border="1" height="120px" cellpadding="0" cellspacing="0">
  				<tr valign="top">
					<td width="34%" align="center"><font color='#000000' face='Tahoma' size='2'>Index No</font>
					</td>
					<td width="66%">
						<table border="0">
							<tr>
								<td width="31%">
									<input type="text" size="25" name="regNo" id="regNo" value='<?php echo $_SESSION['PATIENT_ID']?>' />
								</td> 
								<td>
									<input type="hidden" name="indexNum1"/>
								</td>
							</tr>
						</table>
					</td>
				</tr>
    			<tr>
      				<td width="34%" rowspan="2" valign="top" align="center" height="100px"><p><font color='#000000' face='Tahoma' size='2'>Date time</font></p>
        				
         				<div id="container" style="height:90px">
							<ul class="menu">
							
							</ul>
								<span class="clear"></span>
									<div class="content" style="height:250px ; overflow : auto; " >
									
										<div id="loading" style="height:20px"><img src="../../images/loading.gif" alt="Loading..." />
										</div>
											<ul>
											<ul>
												
									</div>
						</div>
						
	 				 </td>
	  
      				 <td width="66%" valign="top">
	  					<label><font color='#000000' face='Tahoma' size='2'>Complaint</font><br/>
         					 <textarea name="textarea2" id="textarea2" rows="6" cols="40"></textarea>
     					 </label>
	 				 </td>
   				 </tr>
    			<tr>
      				<td height="19" width="100%">
						<label><font color='#000000' face='Tahoma' size='2'>Diagnosis</font><br />
        					<textarea name="textarea3" id="textarea3" rows="6" cols="40"></textarea>
      					</label>
	  						<table border="0">
	  							<tr>
									<td height="30" align="left" > 
									  <label><font color='#000000' face='Tahoma' size='2'>Investigations</font></label><br />
									  	<select name="investigation" id="investigation">
											<option value="None">None</option>
		  									<option value="LiverProfile">LiverProfile</option>
		  									<option value="FBCESR">FBC/ESR</option>
		  									<option value="Chloride">Chloride</option>
		  									<option value="BglucoseFasting">B.Glucose Fasting</option>
											<option value="LipidProfile">Lipid Profile</option>
											
											<option value="FBS">FBS</option>
											
											<option value="RBS">RBS</option>
											
											
											<option value="PPBS">PPBS</option>
											
											<option value="FBC">FBC</option>
											
											<option value="ESR">ESR</option>
											<option value="UFR">UFR</option>
											
  										</select>
										
									</td>
								</tr>
		  					</table>
	  				</td>
   				 </tr>
    			<tr>
      				<td height="155" width="100%" align="center" valign="top">
					<label>
						<table border="1" width="100%">
							<div>
								<tr>
									<td width="30%" align="center" bgcolor="#FFFFFF" rowspan="2">
										<input type="submit" name="submit" id="submit" value="Submit" class="submit"/> 
			
									</td>
									<td bgcolor="#FFFFFF" rowspan="2">
										<span class="error" style="display:none"> Please Enter Valid Data
										</span>
										<span class="success" style="display:none"> Treatment Successfully sent...  
											<a href="dentist_treatment.php" style="color:#0066CC; font-weight:bold">
													Click For a New Treatment
											</a>
										</span>
									</td>
							
								</tr>
						
							</div>
						</table>
      				</label>
					</td>
      				<td>
	  					<p><font color='#000000' face='Tahoma' size='2'>Treatment</font></p>
      					<p>
        					<label>
        						<textarea name="textarea5" id="textarea5" rows="7" cols="40"></textarea>
        					</label>
							<input type="hidden" name="refDoctor" id="refDoctor" value='<?php echo $_SESSION['USERNAME']?>' />
       					</p>
					</td>
    			</tr>
     		 </table>
					
					
					</td>
					
					
					</tr>
					
				
					
					</table>
					</form>

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
