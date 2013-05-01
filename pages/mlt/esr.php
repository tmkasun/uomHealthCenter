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
var url="DisplayResult.php?p=10&q=" + str;
//alert(url);
url=url+"&sid="+Math.random();
xmlhttp.open("GET",url,false);
xmlhttp.send(null);
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
</script> 

<title>FBC/ESR</title>
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

<div id="main_content" style="height:675px;"><!--Start main content -->

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
<form name="fbcesr" action="UpdateInvestigation.php" method="post">
<div>
<table border="0" width="97%">
						<tr><form> 
							<td width="29%"><font color='#000000' face='Tahoma' size='2'>Treatment ID:</font>
							</td>
							<td width="20%">
							
								<input type="text" name="treatmentId" id="txt1" onKeyUp="showHint(this.value)">
							
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
							<td colspan="4" align="center"><font color='#000000' face='Tahoma' size='2'><b>FBC/ESR</b></font></td>
							</tr>
							</table>
							<table border="1">
							<tr>
							<td width="296"><font color='#000000' face='Tahoma' size='2'>TEST</font></td>
							<td width="200"><font color='#000000' face='Tahoma' size='2'>RESULT</font></td>
							<td width="175"><font color='#000000' face='Tahoma' size='2'>NORMAL RANGE</font></td>
							
							</tr>
							<tr>
								<td colspan="3"><font color='#000000' face='Tahoma' size='2'><b>CBC (FBC+ESR)</b></font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Hb(Haemoglobin)</font></td>
								<td><input type="text" name="hb" size="8"/><font color='#000000' face='Tahoma' size='2'>
								gm/dl</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>11.5 - 15.5 gm/dl</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>PCV / Haematocrit</font> </td>
								<td><input type="text" name="pcv" size="8"/><font color='#000000' face='Tahoma' size='2'>
								%</td>
								<td><font color='#000000' face='Tahoma' size='2'>40 - 50 % </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>RBC Count </font></td>
								<td><input type="text" name="rbc" size="8"/><font color='#000000' face='Tahoma' size='2'>
								Million/Cumm.</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>4 - 6 Million/Cumm.</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>MVC</font></td>
								<td><input type="text" name="mvc" size="8"/><font color='#000000' face='Tahoma' size='2'>
								fl</td>
								<td><font color='#000000' face='Tahoma' size='2'>83 - 101 fl</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>MCH</font></td>
								<td><input type="text" name="mch" size="8"/><font color='#000000' face='Tahoma' size='2'>
								pg</td>
								<td><font color='#000000' face='Tahoma' size='2'>27.5 -32 pg</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>MCHC</font></td>
								<td><input type="text" name="mchc" size="8"/><font color='#000000' face='Tahoma' size='2'>
								gm/dl</td>
								<td><font color='#000000' face='Tahoma' size='2'>31.5 -35 gm/dl </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>RDWCV</font></td>
							  <td><input type="text" name="rdwcv" size="8"/></td>
								<td><font color='#000000' face='Tahoma' size='2'>14 - 16 </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>TLC</font></td>
								<td><input type="text" name="tlc" size="8"/><font color='#000000' face='Tahoma' size='2'>
								/Cumm.</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>4000 -11000 / Cumm.</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Platelet Count</font> </td>
								<td><input type="text" name="platelet" size="8"/><font color='#000000' face='Tahoma' size='2'>
								/Cumm.</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>150000 - 400000 / Cumm.</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>ESR</font></td>
								<td><input type="text" name="esr" size="8"/><font color='#000000' face='Tahoma' size='2'>
								mm/1st hr</font> </td>
								<td><font color='#000000' face='Tahoma' size='2'>1 - 20 mm/1st hr</font> </td>
							</tr>
							<tr>
								<td colspan="3"><font color='#000000' face='Tahoma' size='2'>Differential Leukocyte Count</font>
								</td>
							</tr>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Neutrophil</font>
							</td>
							<td><input type="text" name="neutrophil" size="8"/> <font color='#000000' face='Tahoma' size='2'>%</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>40 - 75 % </font>
							</td>
							
							
							
							</tr>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Lymphocyte</font>
							</td>
							<td><input type="text" name="lymphocyte" size="8"/> <font color='#000000' face='Tahoma' size='2'>%</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>20 - 40 % </font>
							</td>
							</tr>
							
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Monocyte</font>
							</td>
							<td><input type="text" name="monocyte" size="8"/> <font color='#000000' face='Tahoma' size='2'>%</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>2 - 8 % </font>
							</td>
							</tr>
							
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Eosinophil</font>
							</td>
							<td><input type="text" name="eosinophil" size="8"/> <font color='#000000' face='Tahoma' size='2'>%</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>1 - 6 %</font> 
							</td>
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
									<input type="submit" name="esrsubmit" value="Submit"/>
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
