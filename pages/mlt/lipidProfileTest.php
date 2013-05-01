<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "4")
{
	header('Location: index.php');
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript">

var xmlhttp=null;

function showHint(str)
{
if (str.length==-1)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
var url="DisplayResult.php?p=5&q=" + str;
//alert(url);
url=url+"&sid="+Math.random();
xmlhttp.open("GET",url,false);
xmlhttp.send(null);
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
</script> 

<title>Lipid Profile</title>
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

<div id="main_content" style="height:700px;"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="mlt_page.php" >Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
 <a href="liverProfile.php">Liver Profile</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="fBCESR.php">FBC/ESR </a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="chloride.php">Chloride</a>
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="glucoseFasting.php" >B.Glucose Fasting</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="lipidProfileTest.php" >Lipid Profile</a>	
</div>


<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="ufr.php" >U.F.R</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="fbs.php" >F.B.S</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="rbs.php" >R.B.S</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="ppbs.php" >P.P.B.S</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="fbc.php" >F.B.C</a>	
</div>

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="esr.php" >E.S.R</a>	
</div>



</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->
<form name="lipidprofileform" action="UpdateInvestigation.php" method="post">
<div>
<table border="0" width="97%">
						<tr><form> 
							<td width="29%"><font color='#000000' face='Tahoma' size='2'>Treatment ID:</font>
							</td>
							<td width="20%">
							
								<input type="text" id="txt1" onKeyUp="showHint(this.value)" name="treatmentId">
							
							</td>
							</form>
							
							
							<td width="20%"><font color='#000000' face='Tahoma' size='2'>
							Reported On</font>
							</td>
							<td width="29%">
							<input type="text" name="reportedon" size="20" value="<?php echo date("Y m d "); ?>" />
							</td>
							
						
						
						</tr>
						
						
						<table border="0" width="97%" id="txtHint">
						<tr>
						
							<td width="29%"><font color='#000000' face='Tahoma' size='2'>Registration Number:</font>
							</td>
							<td width="20%">
								<input type="text" name="regId"/>
							</td>
							<td width="20%"><font color='#000000' face='Tahoma' size='2'>
							Received On:</font>
							</td>
							<td width="29%">
							<input type="text" name="treatmentDate" />
							
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Sex:</font>
							</td>
							<td>
								<input type="text" name="gender"/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Reference Doctor:</font>
							</td>
							<td>
							<input type="text" name="refDoctor"/>
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Investigation Id</font>
							</td>
							<td>
								<input type="text" name="investigationId"/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Specimen</font>
							</td>
							<td>
							<input type="text" name="specimen" value="BLOOD"/>
							</td>
						
						
						</tr>
						
						</table>
						
						<table>
						
						<tr>
							<td colspan="4" align="center"><font color='#000000' face='Tahoma' size='2'><b>Lipid Profile1<b></font>
							</td>
						</tr>
						<tr>
						<td colspan="4">
							<table border="1">
							<tr>
							<td width="366"><font color='#000000' face='Tahoma' size='2'>TEST</font></td>
							<td width="137"><font color='#000000' face='Tahoma' size='2'>RESULT</font></td>
							<td width="168"><font color='#000000' face='Tahoma' size='2'>NORMAL RANGE</font></td>
							
							</tr>
							<tr>
								<td colspan="3"><font color='#000000' face='Tahoma' size='2'>
									LIPID PROFILE</font>
								</td>
							</tr>
							<tr>
								<td colspan="3"><font color='#000000' face='Tahoma' size='2'>
									Serum</font>
								</td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Total Cholesterol</font>
								</td>
								<td><input type="text" name="totalCol" size="10"/><font color='#000000' face='Tahoma' size='2'> mg/dl</font>
								</td>
								<td>&lt;<font color='#000000' face='Tahoma' size='2'>200 mg/dl </font>
								</td>
								
							
							</tr>
							
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Triglycerides</font>
								</td>
								<td><input type="text" name="triglycerides" size="10"/><font color='#000000' face='Tahoma' size='2'> mg/dl</font>
								</td>
								<td>&lt;<font color='#000000' face='Tahoma' size='2'>150 mg/dl</font> 
								</td>
								
							
							</tr>
							
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>HDL-Cholesterol</font>
								</td>
								<td><input type="text" name="hdlCol" size="10"/> <font color='#000000' face='Tahoma' size='2'>mg/dl</font>
								</td>
								<td>&gt;<font color='#000000' face='Tahoma' size='2'>40 mg/dl</font> 
								</td>
								
							
							</tr>
							
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>LDL-Cholesterol</font>
								</td>
								<td><input type="text" name="ldlCol" size="10"/> mg/dl</font>
								</td>
								<td>&lt;<font color='#000000' face='Tahoma' size='2'>150mg/dl</font>
								</td>
								
							
							</tr>
							
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>VLDL-Cholesterol</font>
								</td>
								<td><input type="text" name="vldlCol" size="10"/><font color='#000000' face='Tahoma' size='2'> mg/dl</font>
								</td>
								<td><font color='#000000' face='Tahoma' size='2'>30mg/dl</font>
								</td>
								
							
							</tr>
							
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Ratio of Cholesterol/
								</td>
								<td><input type="text" name="ratioCol" size="10"/><font color='#000000' face='Tahoma' size='2'> mg/dl</font>
								</td>
								<td><font color='#000000' face='Tahoma' size='2'>&lt;5</font>
								</td>
								
							
							</tr>
							<tr>
							<td colspan="3"><font color='#000000' face='Tahoma' size='2'>
							NOTE</font>
							</td>
							</tr>
							<tr>
							<td colspan="4">
							<table border="0" width="100%">
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>TRIGLYCERIDES</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>Borderline high<br/>150-199</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>High<br/>200-499</font>
							
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>Very High<br/>>=500</font>
							</td>
							
							</tr>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>LDL-CHOLESTEROL</font></td>
							<td><font color='#000000' face='Tahoma' size='2'>No Risk Factors </font><br/>
							&lt;190</td>
							<font color='#000000' face='Tahoma' size='2'><td><p>2+Risk factors</p>
							  <p>&lt;130 </p></td></font>
							<td><p><font color='#000000' face='Tahoma' size='2'>CHD OR CHD equivalant</font> </p>
							  <p>&lt;<font color='#000000' face='Tahoma' size='2'>70</font></p></td>
							
							</tr>
							<tr>
							<td colspan="3"><font color='#000000' face='Tahoma' size='2'>HDL- CHOLESTEROL &gt;40 for men &gt;50 women </font></td>
							
							
							</tr>
							<tr>
								<td colspan="3">
							
							
							
								<?php
								if($_GET['success']==2)
									{
									echo "<div style='float:right; font:Tahoma; 		color:#000099'> Database is successfully updated..
									</div>";
									
									} 
								else if($_GET['success']==1)
								{
								echo "<div style='float:right; font:Tahoma; 		color:#000099'> Error Occured, Try again..
									</div>";
								
								}
								
								
								
								?>
								</td>
								<td align="right">
									<input type="submit" name="lipidSubmit" value="Submit"/>
								</td>
							</tr>
							</table>
							</td>
							</tr>
							
							</table>
							</td>
							</tr>
							</table>
				
						
						
						
						
			
				
</div>
</form>
</div><!--End of main_form_pane -->
</div><!--End of main content -->

	</div>
	<!--End of content-->

<div id="footer"> </div>


</div><!--End of wrapper_loggin -->
</div><!--End of wrapper -->

</body>
</html>
