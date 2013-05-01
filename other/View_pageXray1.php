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
<table width="1047" bgcolor="#CC3399" height="130px" align="center" border="1">
 <tr>
   <td align="center" width="1037"><br/>
     <br/><br/><font face="Arial, Helvetica, sans-serif" size="+5"> University of Moratuwa Health Care Centre </font><br/><br/><br/>
   <div align="right" >
   		<table border="1">
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
<table width="1024px" height="474" bgcolor="#990033"align="center" border="1">
    <tr>  
	   <td width="25%" height="438" valign="top">
	     <table width="250px" align="left" hspace="0px" border="1">
		 <tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="AdminPanel.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Home</font></a>
				</td>
		   </tr>
		  	<tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="PersonalData.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Personnal Record</font></a>
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="pageXray.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Clinical Examination </font></a>				   
				</td>
			</tr>
			<tr>
			       <td bgcolor="#996699" height="50PX" valign="middle">
				 <a href="PastMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Past medical History </font></a>					   
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				 <a href="FamilyMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Family Medical History</font></a>	   			   
				</td>
			</tr>
			<tr>
			      <td bgcolor="#996699" height="50PX" valign="middle">
				  			   
				</td>
			</tr>
	     </table> 
      </td>
	  <td align="left" valign="top">
	  	<table border="1" width="100%">
			<tr><form name="searchkey" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<td colspan="2">Registration Number</td>
				<td><input type="text" size="15" name="regNo" /></td>
				<td align="center"><input type="submit" value="Search" name="physiqueSearch" /></td></form>
				<td align="center" colspan="2"><?php echo $_POST['regNo'];  ?></td>
			</tr>
<?php

//$regNo=$_SESSION['PATIENT_ID'];
//echo "regNo".$regNo;
 
if(isset($_POST['physiqueSearch'])== TRUE)
{
	
	$regNo=$_POST['regNo'];
	
	require("config.php");
	
	$sql1="SELECT * FROM generalphysique_con,generalphysique WHERE generalphysique.StudentID= '". $regNo."'";
	
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
				<td rowspan="2" height="180px" width="100px" valign="top">
				<div id="title">Chest Xray</div>
				<div id="img" style="background-color:#00FF99; height:100px;"></div>
				<div id="button" style="background-color:#FF9999; position:relative; margin-top:15px; width:69px;" align="center"></div>
				</td>
				<td width="80px" valign="top">Hr<br /><input type="text" disabled="disabled" size="10" name="hr" style="font:Arial, Helvetica, sans-serif; color:#0000FF;"  value="<?PHP echo $row1['Hr'] ?>" /></td>
				<td  width="80px" valign="top">Fr<br /><input type="text" size="10" disabled="disabled" name="fr" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['Fr'] ?>" /></td>
				<td  width="80px" valign="top">INS<br /><input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;"  name="ins" value="<?PHP echo $row1['Ins'] ?>"/></td>
				<td  width="80px" valign="top">Chest Ex<br /><input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="chestEx" value="<?PHP echo $row1['chestEx'] ?>" /></td>
				<td  width="80px" valign="top">INS<br /><input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="cheins"  value="<?PHP echo $row1['che_INS'] ?>"/></td>
				<td  width="80px" valign="top">Ch.INSP<br /><input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="chinsp" value="<?PHP echo $row1['ch_insp'] ?>" /></td>
				<td  width="80px" valign="top">INS<br /><input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="chins"  value="<?PHP echo $row1['ch_insp_ins'] ?>"/></td>	
			</tr>
			<tr valign="top">
				<td colspan="3">
				<table border="1" width="220px" align="center">
				<tr height="50px">	
					<td align="center" colspan="2">Eyes
					</td>
				</tr>
				<tr height="60px" valign="top">
					<td>L<br />
					<input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="eyeLeft" value="<?PHP echo $row1['eye_left'] ?>" />
					</td>
					<td>R<br/>
					<input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="eyeRight" value="<?PHP echo $row1['eye_right'] ?>" />
					</td>
				</tr>
				</table>
				
				</td>
				
				<td valign="middle">Glasses<input type="checkbox" name="glasses" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['glasses'] ?>"/></td>
				<td colspan="3" valign="middle" align="center">Colour Vision
					<input type="text" name="colourVision" size="20" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['colour_vision'] ?>" />
				
				</td>
			</tr>
			<tr><td colspan="8">Teeth</td></tr>
			<tr height="100px" valign="top">
				<td colspan="2" valign="top" align="center">Decay<br /><input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="decay"  value="<?PHP echo $row1['theeth_decay'] ?>" /></td>
				<td align="center">Mising<input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="missing" value="<?PHP echo $row1['theeth_mising'] ?>" /></td>
				<td align="center">Filled<input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="filled" value="<?PHP echo $row1['theeth_filled'] ?>" /></td>
				<td colspan="2" align="center">Dentures<br /><input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="dentures" value="<?PHP echo $row1['teeth_dentures'] ?>" /></td>
				<td colspan="2" align="center">Gingivitis<br /><input type="text" size="10" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="gingivitis" value="<?PHP echo $row1['teeth_gingivitis'] ?>" /></td>
			</tr>
	  
	
	<table border="1" width="100%">
	<tr align="left">
		<td colspan="3">General Physique</td>
	</tr>
	<tr>
		<td width="35%" align="center">POSTTURE</td>
		<td width="10%" align="center">CONDITION</td>
		<td width="55%" align="center">REMARKS</td>
	</tr>	
	<tr>
		<td align="center">EARS</td>
		<td align="center">
		<input type="text" name="ears" size="12" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['ears_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="earsinfo" value="<?PHP echo $row1['ears_remarks'] ?>" /></td>	
	  </tr>
		<tr>
		<td align="center">NOSE</td>
		<td align="center">
		<input type="text" name="nose" size="12" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['nose_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="noseinfo" value="<?PHP echo $row1['nose_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">MOUTH</td>
		<td align="center">
		<input type="text" name="mouth" size="12" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['mouth_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="mouthinfo" value="<?PHP echo $row1['mouth_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">THROAT</td>
		<td align="center">
		<input type="text" name="throat" size="12" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['throat_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="throatinfo" value="<?PHP echo $row1['throat_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">TONSILS</td>
		<td align="center">
		<input type="text" name="tonsils" size="12" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['tonsils_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="tonsilsinfo" value="<?PHP echo $row1['tonsils_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">ABDOMEN</td>
		<td align="center">
		<input type="text" name="abdomen" size="12" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['abdomen_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="abdomeninfo" value="<?PHP echo $row1['abdomen_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">HERNIAL ORIFICES</td>
		<td align="center">
		<input type="text" name="hernial_orifices" size="12" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['hernail_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="hernicalorficesinfo" value="<?PHP echo $row1['hernail_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">GENITALIA</td>
		<td align="center">
		<input type="text" name="genitalia" size="12" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['genitalia_cond'] ?>"/>
		
		</td>
		<td align="center"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="genitaliainfo" value="<?PHP echo $row1['genitalia_remarks'] ?>"/></td>	
		</tr>
		<tr>
		<td align="center">ANUS</td>
		<td align="center">
		<input type="text" name="anus" size="12" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['anus_cond'] ?>"/>
		
		</td>
		<td align="center"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="anusinfo" value="<?PHP echo $row1['anus_remarks'] ?>"/></td>	
		</tr>
		
		</table>
		<table border="1" width="100%">
			<tr>
				<td width="35%">NERVOUS SYSTEM</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="nervousSystem" value="<?PHP echo $row1['NervousSystem'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">VARICOSE VEINS</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="vericoseveins" value="<?PHP echo $row1['Varicose_Veins'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">B.P</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="bp" value="<?PHP echo $row1['BP'] ?>"/></td>
			</tr>
			
			<tr>
				<td width="35%">SKIN</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="skin" value="<?PHP echo $row1['Skin'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">HAIR</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="hair" value="<?PHP echo $row1['Hair'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">NAILS</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="nails" value="<?PHP echo $row1['Nails'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">THYROID</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="thyroid" value="<?PHP echo $row1['Thyroid'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">BREASTS</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="breasts" value="<?PHP echo $row1['Breasts'] ?>"/></td>
			</tr><tr>
				<td width="35%">HEART</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="heart" value="<?PHP echo $row1['NervousSystem'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">H.b</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="hb" value="<?PHP echo $row1['Hb'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">SKULL</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="skull" value="<?PHP echo $row1['Skull'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">UPPER LIMBS</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="upper_limbs" value="<?PHP echo $row1['Upper_Limbs'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">LOWER LIMBS</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="lower_limbs" value="<?PHP echo $row1['Lower_Limbs'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">SPINR</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="spine" value="<?PHP echo $row1['Spine'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">THORAX</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="thorax" value="<?PHP echo $row1['Thorax'] ?>"/></td>
			</tr>
			<tr>
				<td width="35%">OTHERS</td>
				<td width="65%"><input type="text" size="80" disabled="disabled" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="others" value="<?PHP echo $row1['Others'] ?>"/></td>
			</tr>
			
		</table>
			</tr>
			</tr>
		</table>
				</td>
			</tr>			
</table>

</body>
</html>
