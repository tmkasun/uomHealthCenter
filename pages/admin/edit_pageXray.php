<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');
	
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript" src="../../javascripts/jquery.js"></script>
<script type="text/javascript" src="../../javascripts/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $("#form").validate({
        rules: {
          regNo: "required",// simple rule, converted to {required:true}
          hr: "required" ,
		  fr: "required" ,
		 ins: "required" ,
		  chestEx: "required",
		  cheins: "required",
		  chinsp: "required",
		  chins: "required",
		  eyeLeft: "required",
		  eyeRight: "required",
		  decay: "required",
		  missing: "required",
		  filled: "required",
		  dentures: "required",
		  gingivitis: "required",
		  colourVision: "required",
		 
        },
        messages: {
          regNo: "*",
		  hr: "*",
		  fr: "*",
		  ins: "*",
		  chestEx: "*",
		  cheins: "*",
		  chinsp: "*",
		  chins: "*",
		  eyeLeft: "*",
		  eyeRight: "*",
		  decay: "*",
		  missing: "*",
		  filled: "*",
		  dentures: "*",
		  gingivitis: "*",
		  colourVision: "*",
		 
		  
        }
      });
    });
  </script>
  
   <style type="text/css">

 	
    label.error {color: red; } 
    
  </style>

<title>Admin Panel - Edit Clinical Information</title>
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

<div id="main_content" style="height:1130px;"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="adminPanel.php" >Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
 <a href="personalData.php">Personnal Records</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="pageXray.php">Clinical Examination </a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="familyMedicalHistory.php">Medical History</a>
</div>

</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->

<div>
<table border="0" width="100%" >
					
						<tr>
							<form name="searchkey" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
								<td colspan="3"><font color='#000000' face='Tahoma' size='2'>Registration Number</font>
								</td>
								<td colspan="2">
									<input type="text" size="8" name="regNo" />
								</td>
								<td align="center">
									<input type="submit" value="Search" name="physiqueSearch" />
								</td>
							</form>
								<td align="center" colspan="2"><?php echo $_POST['regNo'];  ?>
								</td>
							<form enctype="multipart/form-data" method="post" name="form" action="updateDB_pageXray.php" id="form">
						</tr>
						
						
						
<?php

if(isset($_POST['physiqueSearch'])== TRUE)
{
	
	$regNumber=$_POST['regNo'];
	
	require("../../inc/config.php");
	
	$sql1="SELECT * FROM generalphysique WHERE generalphysique.StudentID= '". $regNumber."'";
	
	$con =mysql_connect($dbhost, $dbuser, $dbpassword);	
	
if(!$con)
{
	die('Could not connect: ' . mysql_error());
		
}

mysql_select_db($dbdatabase, $con);

$result1 = mysql_query($sql1,$con);

$row1=mysql_fetch_array($result1);
  
mysql_close($con);


}
								
?>	


<tr>

	<td rowspan="2" height="58px" width="58px" valign="top">
	<input type="hidden" value="<?php echo $regNumber  ?>" name="regNumber"/>
		<div id="title"><font color='#000000' face='Tahoma' size='2'>Chest Xray</font></div>
		<div id="img" style="background-color:#00FF99; height:58px; width:50px;">
		
		<img width="60" height="70" src="<?php echo $config_basedir."/images/".$row1['ChestImageName']; ?>"/>
		
		</div>
		<div id="button" style="position:relative; margin-top:15px; width:50px;" align="center"><input type="file" name="image" size="2" /></div>
	</td>
	<td width="50px" valign="top"><font color='#000000' face='Tahoma' size='2'>Hr</font><br />
		<input type="text" size="5" name="hr" id="hr" style="font:Arial, Helvetica, sans-serif; color:#0000FF;"  value="<?PHP echo $row1['Hr'] ?>" />
	</td>
	<td  width="50px" valign="top"><font color='#000000' face='Tahoma' size='2'>Fr</font><br />
		<input type="text" size="5" name="fr" id="fr" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['Fr'] ?>" />
	</td>
	<td  width="50px" valign="top"><font color='#000000' face='Tahoma' size='2'>INS</font><br />
		<input type="text" size="5" style="font:Arial, Helvetica, sans-serif; color:#0000FF;"  name="ins" id="ins" value="<?PHP echo $row1['Ins'] ?>"/>
	</td>
	<td  width="50px" valign="top"><font color='#000000' face='Tahoma' size='2'>Chest Ex</font><br />
		<input type="text" size="5" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="chestEx" id="chestEx" value="<?PHP echo $row1['chestEx'] ?>" />
	</td>
	<td  width="50px" valign="top"><font color='#000000' face='Tahoma' size='2'>INS</font><br />
		<input type="text" size="5" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="cheins" id="cheins"  value="<?PHP echo $row1['che_INS'] ?>"/>
	</td>
	<td  width="50px" valign="top"><font color='#000000' face='Tahoma' size='2'>Ch.INSP</font><br />
		<input type="text" size="6" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="chinsp" id="chinsp" value="<?PHP echo $row1['ch_insp'] ?>" />
	</td>
	<td  width="50px" valign="top"><font color='#000000' face='Tahoma' size='2'>INS</font><br />
		<input type="text" size="5" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="chins" id="chins"  value="<?PHP echo $row1['ch_insp_ins'] ?>"/>
	</td>	
</tr>

<tr valign="top">
				<td colspan="3">
				<table border="0" width="160px" align="center">
				<tr height="80px">	
					<td align="center" colspan="2" valign="bottom"><font color='#000000' face='Tahoma' size='2'>Eyes</font>
					</td>
				</tr>
				<tr height="80px" valign="top">
					<td><font color='#000000' face='Tahoma' size='2'>L</font><br />
					<input type="text" size="4" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="eyeLeft" id="eyeLeft" value="<?PHP echo $row1['eye_left'] ?>" />
					</td>
					<td><font color='#000000' face='Tahoma' size='2'>R</font><br/>
					<input type="text" size="4" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="eyeRight" id="eyeRight" value="<?PHP echo $row1['eye_right'] ?>" />
					</td>
				</tr>
				</table>
				</td>
				
				<td valign="middle"><font color='#000000' face='Tahoma' size='2'>Glasses</font>
				<?php
				 
				 
				if($row1['glasses']=='on')
				{ 
				
				echo "<input type='checkbox' name='glasses' id='glasses' style='font:Arial, Helvetica, sans-serif; color:#0000FF;' checked='CHECKED' />";
				
				
				}
				else{
				
				echo "<input type='checkbox' name='glasses' id='glasses' style='font:Arial, Helvetica, sans-serif; color:#0000FF;' />";
				
				
				}
				
				?>
				</td>
				
				
				<td colspan="3" valign="middle" align="center"><font color='#000000' face='Tahoma' size='2'>Colour Vision</font>
					<input type="text" name="colourVision" id="colourVision" size="14" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['colour_vision'] ?>" />
				
				</td>
			</tr>
			<tr><td colspan="8"><font color='#000000' face='Tahoma' size='2'>Teeth</td></tr>
			<tr height="58px" valign="top">
				<td colspan="2" valign="top" align="center"><font color='#000000' face='Tahoma' size='2'>Decay<br /><input type="text" size="5" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="decay" id="decay"  value="<?PHP echo $row1['theeth_decay'] ?>" /></td>
				<td align="center"><font color='#000000' face='Tahoma' size='2'>Mising</font><input type="text" size="5" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="missing" id="missing" value="<?PHP echo $row1['theeth_mising'] ?>" /></td>
				<td align="center"><font color='#000000' face='Tahoma' size='2'>Filled</font><input type="text" size="5" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="filled" id="filled" value="<?PHP echo $row1['theeth_filled'] ?>" /></td>
				<td colspan="2" align="center"><font color='#000000' face='Tahoma' size='2'>Dentures</font><br /><input type="text" size="5" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="dentures" id="dentures" value="<?PHP echo $row1['teeth_dentures'] ?>" /></td>
				<td colspan="2" align="center"><font color='#000000' face='Tahoma' size='2'>Gingivitis</font><br /><input type="text" size="5" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="gingivitis" id="gingivitis" value="<?PHP echo $row1['teeth_gingivitis'] ?>" /></td>
</tr>
<table border="0" width="100%">
			
				<tr align="left">
					<td colspan="2"><font color='#000000' face='Tahoma' size='2'>General Physique</font></td>
				</tr>
				<tr>
					<td width="35%" align="center"><font color='#000000' face='Tahoma' size='2'>POSTTURE</font></td>
					<td width="8%" align="center"><font color='#000000' face='Tahoma' size='2'>CONDITION</font></td>
					<td width="52%" align="center"><font color='#000000' face='Tahoma' size='2'>REMARKS</font></td>
				</tr>
				<tr>
		<td align="center"><font color='#000000' face='Tahoma' size='2'>EARS</font></td>
		<td align="center">
		<input type="text" name="ears" id="ears" size="8" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['ears_cond'] ?>" />
		
		</td>
		<td align="left"><input type="text" size="54" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="earsinfo" id="earsinfo" value="<?PHP echo $row1['ears_remarks'] ?>" /></td>	
	  </tr>
		<tr>
		<td align="center"><font color='#000000' face='Tahoma' size='2'>NOSE</font></td>
		<td align="center">
		<input type="text" name="nose" id="nose" size="8" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['nose_cond'] ?>" />
		
		</td>
		<td align="left"><input type="text" size="54" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="noseinfo" id="noseinfo" value="<?PHP echo $row1['nose_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center"><font color='#000000' face='Tahoma' size='2'>MOUTH</font></td>
		<td align="center">
		<input type="text" name="mouth" id="mouth" size="8" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['mouth_cond'] ?>" />
		
		</td>
		<td align="left"><input type="text" size="54" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="mouthinfo" id="mouthinfo" value="<?PHP echo $row1['mouth_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center"><font color='#000000' face='Tahoma' size='2'>THROAT</font></td>
		<td align="center">
		<input type="text" name="throat" id="throat" size="8" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['throat_cond'] ?>" />
		
		</td>
		<td align="left"><input type="text" size="54" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="throatinfo" id="throatinfo" value="<?PHP echo $row1['throat_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center"><font color='#000000' face='Tahoma' size='2'>TONSILS</font></td>
		<td align="center">
		<input type="text" name="tonsils" id="tonsils" size="8" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['tonsils_cond'] ?>" />
		
		</td>
		<td align="left"><input type="text" size="54" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="tonsilsinfo" id="tonsilsinfo" value="<?PHP echo $row1['tonsils_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center"><font color='#000000' face='Tahoma' size='2'>ABDOMEN</font></td>
		<td align="center">
		<input type="text" name="abdomen" id="abdomen" size="8" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['abdomen_cond'] ?>" />
		
		</td>
		<td align="left"><input type="text" size="54" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="abdomeninfo" id="abdomeninfo" value="<?PHP echo $row1['abdomen_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center"><font color='#000000' face='Tahoma' size='2'>HERNIAL ORIFICES</font></td>
		<td align="center">
		<input type="text" name="hernial_orifices" id="hernial_orifices" size="8" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['hernail_cond'] ?>" />
		
		</td>
		<td align="left"><input type="text" size="54" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="hernicalorficesinfo" id="hernicalorficesinfo" value="<?PHP echo $row1['hernail_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center"><font color='#000000' face='Tahoma' size='2'>GENITALIA</font></td>
		<td align="center">
		<input type="text" name="genitalia" id="genitalia" size="8" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['genitalia_cond'] ?>"/>
		
		</td>
		<td align="left"><input type="text" size="54" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="genitaliainfo" id="genitaliainfo" value="<?PHP echo $row1['genitalia_remarks'] ?>"/></td>	
		</tr>
		<tr>
		<td align="center"><font color='#000000' face='Tahoma' size='2'>ANUS</font></td>
		<td align="center">
		<input type="text" name="anus" id="anus" size="8" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['anus_cond'] ?>"/>
		
		</td>
		<td align="left"><input type="text" size="54" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="anusinfo" id="anusinfo" value="<?PHP echo $row1['anus_remarks'] ?>"/></td>	
		</tr>
		</table>
		<table border="0" width="100%">
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>NERVOUS SYSTEM</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="nervousSystem" id="nervousSystem" value="<?PHP echo $row1['NervousSystem'] ?>"/></td>
			</tr>
			
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>VARICOSE VEINS</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="vericoseveins" id="vericoseveins" value="<?PHP echo $row1['Varicose_Veins'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>B.P</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="bp" id="bp" value="<?PHP echo $row1['BP'] ?>"/></td>
			</tr>
			
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>SKIN</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="skin" id="skin" value="<?PHP echo $row1['Skin'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>HAIR</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="hair" id="hair" value="<?PHP echo $row1['Hair'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>NAILS</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="nails" id="nails" value="<?PHP echo $row1['Nails'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>THYROID</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="thyroid" id="thyroid" value="<?PHP echo $row1['Thyroid'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>BREASTS</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="breasts" id="breasts" value="<?PHP echo $row1['Breasts'] ?>"/></td>
			</tr><tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>HEART</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="heart" value="<?PHP echo $row1['HEART'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>H.b</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="hb" id="hb" value="<?PHP echo $row1['Hb'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>SKULL</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="skull" id="skull" value="<?PHP echo $row1['Skull'] ?>"/></td>
			</tr>

			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>UPPER LIMBS</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="upper_limbs" id="upper_limbs" value="<?PHP echo $row1['Upper_Limbs'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>LOWER LIMBS</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="lower_limbs" id="lower_limbs" value="<?PHP echo $row1['Lower_Limbs'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>SPINR</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="spine" id="spine" value="<?PHP echo $row1['Spine'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>THORAX</font></td>
				<td width="70%"><input type="text" size="58" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="thorax" id="thorax" value="<?PHP echo $row1['Thorax'] ?>"/></td>
			</tr>
			<tr>
				<td width="30%"><font color='#000000' face='Tahoma' size='2'>OTHERS</font></td>
				<td width="70%"><input type="text" size="58"  style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="others" id="others" value="<?PHP echo $row1['Others'] ?>"/></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
				<div id="info" style="position:relative; margin-left:40px;">
				<?php
				if($_GET['success']==1 ){  
				
				echo "<font color='#009900' face='Tahoma' size='2'>
                     		Data is uploaded successfully...</font>";
				
				
				}else if($_GET['success']==2 ){
				
				echo "<font color='#009900' face='Tahoma' size='2'>
							Data is not uploaded successfully...</font>";
				}
				
				?>
					
					
				</div>
				<div id="button" style="position:relative; float:right;">
					<input type="submit" name="submit" id="submit" value="Submit" class="submit" /> 
				</div>
				
					
				</td>
			
			</tr>
			</table></form>
				</td>	
	  		</tr>
</table>
		

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
