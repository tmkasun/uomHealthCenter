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
			<tr>
				<td colspan="2">Registration Number</td>
				<td><input type="text" size="15" name="regNo" /></td>
			<tr>
			<tr>
				<td rowspan="2" height="180px" width="100px" valign="top">
				<div id="title">Chest Xray</div>
				<div id="img" style="background-color:#00FF99; height:100px;"></div>
				<div id="button" style="background-color:#FF9999; position:relative; margin-top:15px;" align="center"><input type="submit" value="Upload" name="xrayUpload" /></div>
				</td>
				<td width="80px" valign="top">Hr<br /><input type="text" size="10" name="hr" /></td>
				<td  width="80px" valign="top">Fr<br /><input type="text" size="10" name="fr" /></td>
				<td  width="80px" valign="top">INS<br /><input type="text" size="10" name="ins" /></td>
				<td  width="80px" valign="top">Chest Ex<br /><input type="text" size="10" name="chestEx" /></td>
				<td  width="80px" valign="top">INS<br /><input type="text" size="10" name="cheins" /></td>
				<td  width="80px" valign="top">Ch.INSP<br /><input type="text" size="10" name="chinsp" /></td>
				<td  width="80px" valign="top">INS<br /><input type="text" size="10" name="chins" /></td>	
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
					<input type="text" size="10" name="eyeLeft" />
					</td>
					<td>R<br/>
					<input type="text" size="10" name="eyeRight" />
					</td>
				</tr>
				</table>
				
				</td>
				
				<td valign="middle">Glasses<input type="checkbox" name="glasses" /></td>
				<td colspan="3" valign="middle" align="center">Colour Vision
					<select name="religion">
						<option value="Normal">Normal</option>
  						<option value="aaaa">aaaa</option>
  						<option value="bbbb">bbbb</option>
						<option value="ccccc">ccccc</option>
  					</select> 
				
				</td>
			</tr>
			<tr><td colspan="8">Teeth</td></tr>
			<tr height="100px" valign="top">
				<td colspan="2" valign="top" align="center">Decay<br /><input type="text" size="10" name="decay" /></td>
				<td align="center">Mising<input type="text" size="10" name="missing" /></td>
				<td align="center">Filled<input type="text" size="10" name="filled" /></td>
				<td colspan="2" align="center">Dentures<br /><input type="text" size="10" name="dentures" /></td>
				<td colspan="2" align="center">Gingivitis<br /><input type="text" size="10" name="gingivitis" /></td>
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
		<select name="ears">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="80" name="earsinfo" /></td>	
	  </tr>
		<tr>
		<td align="center">NOSE</td>
		<td align="center">
		<select name="nose">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="80" name="noseinfo" /></td>	
		</tr>
		<tr>
		<td align="center">MOUTH</td>
		<td align="center">
		<select name="mouth">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="80" name="mouthinfo" /></td>	
		</tr>
		<tr>
		<td align="center">THROAT</td>
		<td align="center">
		<select name="throat">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="80" name="throatinfo" /></td>	
		</tr>
		<tr>
		<td align="center">TONSILS</td>
		<td align="center">
		<select name="tonsils">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="80" name="tonsilsinfo" /></td>	
		</tr>
		<tr>
		<td align="center">ABDOMEN</td>
		<td align="center">
		<select name="abdomen">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="80" name="abdomeninfo" /></td>	
		</tr>
		<tr>
		<td align="center">HERNIAL ORIFICES</td>
		<td align="center">
		<select name="hernicalorfices">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="80" name="hernicalorficesinfo" /></td>	
		</tr>
		<tr>
		<td align="center">GENITALIA</td>
		<td align="center">
		<select name="genitalia">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="80" name="genitaliainfo" /></td>	
		</tr>
		<tr>
		<td align="center">ANUS</td>
		<td align="center">
		<select name="anus">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="80" name="anusinfo" /></td>	
		</tr>
		
		</table>
		<table border="1" width="100%">
			<tr>
				<td width="35%">NERVOUS SYSTEM</td>
				<td width="65%"><input type="text" size="80" name="nervousSystem" /></td>
			</tr>
			<tr>
				<td width="35%">VARICOSE VEINS</td>
				<td width="65%"><input type="text" size="80" name="vericoseveins" /></td>
			</tr>
			<tr>
				<td width="35%">B.P</td>
				<td width="65%"><input type="text" size="80" name="bp" /></td>
			</tr>
			<tr>
				<td width="35%">NERVOUS SYSTEM</td>
				<td width="65%"><input type="text" size="80" name="nervousSystem" /></td>
			</tr>
			<tr>
				<td width="35%">SKIN</td>
				<td width="65%"><input type="text" size="80" name="skin" /></td>
			</tr>
			<tr>
				<td width="35%">HAIR</td>
				<td width="65%"><input type="text" size="80" name="hair" /></td>
			</tr>
			<tr>
				<td width="35%">NAILS</td>
				<td width="65%"><input type="text" size="80" name="nails" /></td>
			</tr>
			<tr>
				<td width="35%">THYROID</td>
				<td width="65%"><input type="text" size="80" name="thyroid" /></td>
			</tr>
			<tr>
				<td width="35%">BREASTS</td>
				<td width="65%"><input type="text" size="80" name="breasts" /></td>
			</tr><tr>
				<td width="35%">HEART</td>
				<td width="65%"><input type="text" size="80" name="heart" /></td>
			</tr>
			<tr>
				<td width="35%">H.b</td>
				<td width="65%"><input type="text" size="80" name="hb" /></td>
			</tr>
			<tr>
				<td width="35%">SKULL</td>
				<td width="65%"><input type="text" size="80" name="skull" /></td>
			</tr>
			<tr>
				<td width="35%">UPPER LIMBS</td>
				<td width="65%"><input type="text" size="80" name="upper_limbs" /></td>
			</tr>
			<tr>
				<td width="35%">LOWER LIMBS</td>
				<td width="65%"><input type="text" size="80" name="lower_limbs" /></td>
			</tr>
			<tr>
				<td width="35%">SPINR</td>
				<td width="65%"><input type="text" size="80" name="spine" /></td>
			</tr>
			<tr>
				<td width="35%">THORAX</td>
				<td width="65%"><input type="text" size="80" name="thorax" /></td>
			</tr>
			<tr>
				<td width="35%">OTHERS</td>
				<td width="65%"><input type="text" size="80" name="others" /></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" value="Submit" name="Physiqueinfo" />
				</td>
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
