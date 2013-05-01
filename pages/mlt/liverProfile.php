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
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
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
var url="DisplayResult.php?p=1&q=" + str;
//alert(url);
url=url+"&sid="+Math.random();
xmlhttp.open("GET",url,false);
xmlhttp.send(null);
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
</script> 

<title>Liver Profile</title>
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
<form name="liverProfile" action="UpdateInvestigation.php" method="post">
<div>
<table border="0" width="97%">
						<tr><form> 
							<td width="29%"><font color='#000000' face='Tahoma' size='2'>Treatment ID:</font>
							</td>
							<td width="20%">
							
								<input type="text" id="txt1" name="treatmentId" onKeyUp="showHint(this.value)">
							
							</td>
							</form>
							
							
							<td width="20%"><font color='#000000' face='Tahoma' size='2'>
							Reported On</font>
							</td>
							<td width="29%">
							<input type="text" name="reportedon" size="20" value="<?php echo date("Y m d "); ?>" />
							</td>
							
						
						
						</tr>
						<table>
						
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
							<table border="0" width="97%">
							<tr>
							<td colspan="4" align="center"><font color='#000000' face='Tahoma' size='2'><b>Liver Profile<b></font></td>
							</tr>
							</table>
							<table border="1" width="97%">
							<tr>
							<td width="296"><font color='#000000' face='Tahoma' size='2'>TEST</font></td>
							<td width="200"><font color='#000000' face='Tahoma' size='2'>RESULT</font></td>
							<td width="175"><font color='#000000' face='Tahoma' size='2'>NORMAL RANGE</font></td>
							
							</tr>
							<tr>
								<td colspan="3"><font color='#000000' face='Tahoma' size='2'><b>LIVER FUNCTION TESTS / LIVER PROFILE</b></font> </td>
							</tr>
							<tr>
							<td colspan="3"><font color='#000000' face='Tahoma' size='2'>Serum</font>
							</td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>SGOT(AST)</font></td>
								<td><input type="text" name="sgot" size="10"/><font color='#000000' face='Tahoma' size='2'>
								U/l</font></td>
								<td>&lt;<font color='#000000' face='Tahoma' size='2'>35 U/l</font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>SGPT(ALT)</font></td>
								<td><input type="text" name="sgpt" size="10"/><font color='#000000' face='Tahoma' size='2'>
								U/l</font></td>
								<td>&lt;<font color='#000000' face='Tahoma' size='2'>45 U/l</font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Total Bilirubin</font> </td>
								<td><input type="text" name="totalbilirubin" size="10"/><font color='#000000' face='Tahoma' size='2'>
								mg/dl</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>0.10 - 1.20 mg/dl </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Direct Bilirubin</font> </td>
							  <td><input type="text" name="directbilirubin" size="10"/>
							   <font color='#000000' face='Tahoma' size='2'> mg/dl </font></td>
								<td><font color='#000000' face='Tahoma' size='2'>0.10 - 0.40 mg/dl</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Indirect Billirubin</font> </td>
							  <td><input type="text" name="indirectbilirubin" size="10"/>
							   <font color='#000000' face='Tahoma' size='2'> mg/dl</font> </td>
								<td><font color='#000000' face='Tahoma' size='2'>0.10 - 0.80 mg/dl</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Alkaline Phosphatase</font></td>
							  <td><input type="text" name="alkphosphate" size="10"/>
							    <font color='#000000' face='Tahoma' size='2'>U/l</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>98.0 - 275.0 U/l </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Gamma GT</font> </td>
							  <td><input type="text" name="gammagt" size="10"/>
U/l</td>
								<td><font color='#000000' face='Tahoma' size='2'>0.0 - 50.0 U/l </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Total Protein </font></td>
							  <td><input type="text" name="totalprotein" size="10"/>
g/l</td>
								<td><font color='#000000' face='Tahoma' size='2'>64.0 - 83.0 g/l </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Albumin</font></td>
								<td><input type="text" name="albumin" size="10"/>
								<font color='#000000' face='Tahoma' size='2'>g/l</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>35.0 - 52.0 g/l </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Globulin</font> </td>
							  <td><input type="text" name="globulin" size="10"/>
g/l</td>
								<td><font color='#000000' face='Tahoma' size='2'>25.0 - 35.0 g/l</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>A/G Ratio </font></td>
								<td><input type="text" name="agratio" size="10"/></td>
								<td><font color='#000000' face='Tahoma' size='2'>1.0 - 2.1 </font>
								</td>
							</tr>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Urea</font></td>
							<td><input type="text" name="urea" size="10"/>
							  <font color='#000000' face='Tahoma' size='2'>mg/dl </font></td>
							<td><font color='#000000' face='Tahoma' size='2'>10.0 -45.0 
							  mg/dl </font></td>
							
							
							
							</tr>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Creatinine</td>
							<td><input type="text" name="creatinine" size="10"/><font color='#000000' face='Tahoma' size='2'> 
							mg/dl </font></td>
							<td><font color='#000000' face='Tahoma' size='2'>0.50 - 1.30 mg/dl </font></td>
							</tr>
							
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>ELECTROYTES Sodium (Na)</font> </td>
							<td><input type="text" name="electroytes" size="10"/><font color='#000000' face='Tahoma' size='2'>
m.mol/l</font></td>
							<td><font color='#000000' face='Tahoma' size='2'>130.0 - 148.0 m mol/l</font> </td>
							</tr>
							
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Potassium (K) </td>
							<td><input type="text" name="potassium" size="10"/><font color='#000000' face='Tahoma' size='2'>
							m.mol/l</font></td>
							<td><font color='#000000' face='Tahoma' size='2'>3.50 - 5.30 m mol/l</font> </td>
							</tr>
							<tr>
							<td colspan="2">
							
							
							
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
									<input type="submit" name="liverSubmit" value="Submit"/>
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
