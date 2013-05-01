<?php
//Start session
session_start();
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>AdminPanel</title>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript">

$(function() {

$(".submit").click(function() {

	var reg=$("#reg").val();
    var hr = $("#hr").val();
	var fr = $("#fr").val();
	var ins = $("#ins").val();
	var chestEx = $("#chestEx").val();
	var cheins = $("#cheins").val();
	var chinsp = $("#chinsp").val();
	var chins=$("#chins").val();
	var eyeLeft = $("#eyeLeft").val();
	var eyeRight = $("#eyeRight").val();
	var glasses = $("#glasses").val();
	var colourVision = $("#colourVision").val();
	var decay = $("#decay").val();
	var missing = $("#missing").val();
	var filled = $("#filled").val();
	var dentures = $("#dentures").val();
	var gingivitis = $("#gingivitis").val();
	var ears = $("#ears").val();
	var earsinfo = $("#earsinfo").val();
	var nose = $("#nose").val();
	var noseinfo = $("#noseinfo").val();
	var mouth= $("#mouth").val();
	var mouthinfo = $("#mouthinfo").val();
	var throat = $("#throat").val();
	var throatinfo = $("#throatinfo").val();
	var tonsils = $("#tonsils").val();
	var tonsilsinfo = $("#tonsilsinfo").val();
	var abdomen = $("#abdomen").val();
	var abdomeninfo= $("#abdomeninfo").val();
	var hernial_orifices = $("#hernial_orifices").val();
	var hernial_orificesinfo = $("#hernial_orificesinfo").val();
	var genitalia = $("#genitalia").val();
	var genitaliainfo = $("#genitaliainfo").val();
	var anus = $("#anus").val();
	var anusinfo = $("#anusinfo").val();
	var nervousSystem = $("#nervousSystem").val();
	var vericoseveins = $("#vericoseveins").val();
	var bp = $("#bp").val();
	var skin = $("#skin").val();
	var hair = $("#hair").val();
	var nails = $("#nails").val();
	var thyroid = $("#thyroid").val();
	var breasts = $("#breasts").val();
	var heart = $("#heart").val();
	var hb = $("#hb").val();
	var skull = $("#skull").val();
	var upper_limbs = $("#upper_limbs").val();
	var lower_limbs = $("#lower_limbs").val();
	var spine = $("#spine").val();
	var thorax = $("#thorax").val();
	var others = $("#others").val();
	
	
	     
	
    var dataString = 'reg='+ reg + '&hr=' + hr + '&fr=' + fr + '&ins=' + ins + '&chestEx=' + chestEx + '&cheins=' + cheins + '&chinsp=' + chinsp + '&chins=' + chins + '&eyeLeft=' + eyeLeft + '&eyeRight=' + eyeRight + '&glasses=' + glasses + '&colourVision=' + colourVision + '&decay=' + decay + '&missing=' + missing + '&filled=' + filled + '&dentures=' + dentures + '&gingivitis=' + gingivitis + '&ears=' + ears + '&earsinfo=' + earsinfo + '&nose=' + nose + '&noseinfo=' + noseinfo + '&mouth=' + mouth + '&mouthinfo=' + mouthinfo + '&throat=' + throat + '&throatinfo=' + throatinfo + '&tonsils=' + tonsils + '&tonsilsinfo=' + tonsilsinfo + '&abdomen=' + abdomen + '&abdomeninfo=' + abdomeninfo + '&hernial_orifices=' + hernial_orifices + '&hernial_orificesinfo=' + hernial_orificesinfo + '&genitalia=' + genitalia + '&genitaliainfo=' + genitaliainfo + '&anus=' + anus + '&anusinfo=' + anusinfo + '&nervousSystem=' + nervousSystem + '&vericoseveins=' + vericoseveins + '&bp=' + bp + '&skin=' + skin + '&hair=' + hair + '&nails=' + nails + '&thyroid=' + thyroid + '&breasts=' + breasts + '&heart=' + heart + '&hb=' + hb + '&skull=' + skull + '&upper_limbs=' +  upper_limbs + '&lower_limbs=' + lower_limbs + '&spine=' + spine + '&thorax=' + thorax + '&others=' + others;
	
	
	if(hr=='' || fr==''|| chestEx==''|| chinsp==''|| chins==''|| eyeLeft==''|| eyeRight==''|| colourVision==''|| ears==''|| nose==''|| mouth==''|| throat==''|| tonsils==''|| abdomen==''|| hernial_orifices==''|| genitalia==''|| anus=='')
	{
	$('.success').fadeOut(200).hide();

    $('.error').fadeOut(200).show();
	
	}
	
	else
	{
	
	$.ajax({
	type: "POST",
    url: "InsertDB_pageXray.php",
    data: dataString,
    success: function(){
	$('.success').fadeIn(200).show();
    $('.error').fadeOut(200).hide();
		
   }
});




	}
	
    return false;
	});



});
</script>

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
<table width="992px" style="background:url(images/body.jpg) repeat-y;" align="center" border="0" cellpadding="0" cellspacing="0" height="1271">
	<tr>
	  <td height="1171" valign="10px">
 			<table width="988px" height="1193" bgcolor="#FFFFFF"align="center" border="0" cellpadding="0" cellspacing="0">
				<tr valign="top">  
	   				<td width="25%" height="452">
	     				<table width="259" align="left" hspace="0px" border="0" cellpadding="0" cellspacing="0" >
		 					<tr valign="top">
			    				<td width="259" height="50PX" align="center" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;">
				   					<a href="#" style=""><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Home</font></a>								</td>
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
							<form name="searchkey" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
								<td colspan="2">Registration Number
								</td>
								<td>
									<input type="text" size="15" name="regNo" />
								</td>
								<td align="center">
									<input type="submit" value="Search" name="physiqueSearch" />
								</td>
							</form>
								<td align="center" colspan="2"><?php echo $_POST['regNo'];  ?>
								</td>
							<form autocomplete="off" enctype="multipart/form-data" method="post" name="form">
						</tr>
						
						
<?php

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
		<div id="button" style="position:relative; margin-top:15px; width:69px;" align="center"><input type="button" value="Upload" name="upload" /></div>
	</td>
	<td width="60px" valign="top">Hr<br />
		<input type="text" size="6" name="hr" id="hr" style="font:Arial, Helvetica, sans-serif; color:#0000FF;"  value="<?PHP echo $row1['Hr'] ?>" />
	</td>
	<td  width="60px" valign="top">Fr<br />
		<input type="text" size="6" name="fr" id="fr" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['Fr'] ?>" />
	</td>
	<td  width="60px" valign="top">INS<br />
		<input type="text" size="6" style="font:Arial, Helvetica, sans-serif; color:#0000FF;"  name="ins" id="ins" value="<?PHP echo $row1['Ins'] ?>"/>
	</td>
	<td  width="60px" valign="top">Chest Ex<br />
		<input type="text" size="6" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="chestEx" id="chestEx" value="<?PHP echo $row1['chestEx'] ?>" />
	</td>
	<td  width="60px" valign="top">INS<br />
		<input type="text" size="6" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="cheins" id="cheins"  value="<?PHP echo $row1['che_INS'] ?>"/>
	</td>
	<td  width="60px" valign="top">Ch.INSP<br />
		<input type="text" size="6" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="chinsp" id="chinsp" value="<?PHP echo $row1['ch_insp'] ?>" />
	</td>
	<td  width="60px" valign="top">INS<br />
		<input type="text" size="6" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="chins" id="chins"  value="<?PHP echo $row1['ch_insp_ins'] ?>"/>
	</td>	
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
					<input type="text" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="eyeLeft" id="eyeLeft" value="<?PHP echo $row1['eye_left'] ?>" />
					</td>
					<td>R<br/>
					<input type="text" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="eyeRight" id="eyeRight" value="<?PHP echo $row1['eye_right'] ?>" />
					</td>
				</tr>
				</table>
				
				</td>
				
				<td valign="middle">Glasses<input type="checkbox" name="glasses" id="glasses" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['glasses'] ?>"/></td>
				<td colspan="3" valign="middle" align="center">Colour Vision
					<input type="text" name="colourVision" id="colourVision" size="20" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['colour_vision'] ?>" />
				
				</td>
			</tr>
			
			<tr><td colspan="8">Teeth</td></tr>
			<tr height="100px" valign="top">
				<td colspan="2" valign="top" align="center">Decay<br /><input type="text" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="decay" id="decay"  value="<?PHP echo $row1['theeth_decay'] ?>" /></td>
				<td align="center">Mising<input type="text" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="missing" id="missing" value="<?PHP echo $row1['theeth_mising'] ?>" /></td>
				<td align="center">Filled<input type="text" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="filled" id="filled" value="<?PHP echo $row1['theeth_filled'] ?>" /></td>
				<td colspan="2" align="center">Dentures<br /><input type="text" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="dentures" id="dentures" value="<?PHP echo $row1['teeth_dentures'] ?>" /></td>
				<td colspan="2" align="center">Gingivitis<br /><input type="text" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="gingivitis" id="gingivitis" value="<?PHP echo $row1['teeth_gingivitis'] ?>" /></td>
			</tr>
			<table border="1" width="97%">
			
				<tr align="left">
					<td colspan="3">General Physique</td>
				</tr>
				<tr>
					<td width="35%" align="center">POSTTURE</td>
					<td width="10%" align="center">CONDITION</td>
					<td width="52%" align="center">REMARKS</td>
				</tr>
				<tr>
		<td align="center">EARS</td>
		<td align="center">
		<input type="text" name="ears" id="ears" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['ears_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="70" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="earsinfo" id="earsinfo" value="<?PHP echo $row1['ears_remarks'] ?>" /></td>	
	  </tr>
		<tr>
		<td align="center">NOSE</td>
		<td align="center">
		<input type="text" name="nose" id="nose" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['nose_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="70" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="noseinfo" id="noseinfo" value="<?PHP echo $row1['nose_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">MOUTH</td>
		<td align="center">
		<input type="text" name="mouth" id="mouth" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['mouth_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="70" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="mouthinfo" id="mouthinfo" value="<?PHP echo $row1['mouth_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">THROAT</td>
		<td align="center">
		<input type="text" name="throat" id="throat" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['throat_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="70" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="throatinfo" id="throatinfo" value="<?PHP echo $row1['throat_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">TONSILS</td>
		<td align="center">
		<input type="text" name="tonsils" id="tonsils" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['tonsils_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="70" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="tonsilsinfo" id="tonsilsinfo" value="<?PHP echo $row1['tonsils_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">ABDOMEN</td>
		<td align="center">
		<input type="text" name="abdomen" id="abdomen" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['abdomen_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="70" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="abdomeninfo" id="abdomeninfo" value="<?PHP echo $row1['abdomen_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">HERNIAL ORIFICES</td>
		<td align="center">
		<input type="text" name="hernial_orifices" id="hernial_orifices" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['hernail_cond'] ?>" />
		
		</td>
		<td align="center"><input type="text" size="70" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="hernicalorficesinfo" id="hernicalorficesinfo" value="<?PHP echo $row1['hernail_remarks'] ?>" /></td>	
		</tr>
		<tr>
		<td align="center">GENITALIA</td>
		<td align="center">
		<input type="text" name="genitalia" id="genitalia" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['genitalia_cond'] ?>"/>
		
		</td>
		<td align="center"><input type="text" size="70" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="genitaliainfo" id="genitaliainfo" value="<?PHP echo $row1['genitalia_remarks'] ?>"/></td>	
		</tr>
		<tr>
		<td align="center">ANUS</td>
		<td align="center">
		<input type="text" name="anus" id="anus" size="10" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" value="<?PHP echo $row1['anus_cond'] ?>"/>
		
		</td>
		<td align="center"><input type="text" size="70" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="anusinfo" id="anusinfo" value="<?PHP echo $row1['anus_remarks'] ?>"/></td>	
		</tr>
		</table>
		<table border="1" width="97%">
			<tr>
				<td width="32%">NERVOUS SYSTEM</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="nervousSystem" id="nervousSystem" value="<?PHP echo $row1['NervousSystem'] ?>"/></td>
			</tr>
			
			<tr>
				<td width="32%">VARICOSE VEINS</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="vericoseveins" id="vericoseveins" value="<?PHP echo $row1['Varicose_Veins'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">B.P</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="bp" id="bp" value="<?PHP echo $row1['BP'] ?>"/></td>
			</tr>
			
			<tr>
				<td width="32%">SKIN</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="skin" id="skin" value="<?PHP echo $row1['Skin'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">HAIR</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="hair" id="hair" value="<?PHP echo $row1['Hair'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">NAILS</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="nails" id="nails" value="<?PHP echo $row1['Nails'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">THYROID</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="thyroid" id="thyroid" value="<?PHP echo $row1['Thyroid'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">BREASTS</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="breasts" id="breasts" value="<?PHP echo $row1['Breasts'] ?>"/></td>
			</tr><tr>
				<td width="32%">HEART</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="heart" value="<?PHP echo $row1['NervousSystem'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">H.b</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="hb" id="hb" value="<?PHP echo $row1['Hb'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">SKULL</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="skull" id="skull" value="<?PHP echo $row1['Skull'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">UPPER LIMBS</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="upper_limbs" id="upper_limbs" value="<?PHP echo $row1['Upper_Limbs'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">LOWER LIMBS</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="lower_limbs" id="lower_limbs" value="<?PHP echo $row1['Lower_Limbs'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">SPINR</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="spine" id="spine" value="<?PHP echo $row1['Spine'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">THORAX</td>
				<td width="65%"><input type="text" size="80" style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="thorax" id="thorax" value="<?PHP echo $row1['Thorax'] ?>"/></td>
			</tr>
			<tr>
				<td width="32%">OTHERS</td>
				<td width="65%"><input type="text" size="80"  style="font:Arial, Helvetica, sans-serif; color:#0000FF;" name="others" id="others" value="<?PHP echo $row1['Others'] ?>"/></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
				<div id="info">
					<div id="message" style="position:relative; float:left; width:600px;">
						<span class="error" style="display:none"> Please Enter Valid Data</span>
						<span class="success" style="display:none"> Data Successfully Uploaded...</span>
					
					</div>
					<div id="button" style="position:relative; float:right;">
					<input type="submit" name="submit" id="submit" value="Submit" class="submit" /> 
					</div>
				</div>
					
				</td>
			
			</tr>
			</table></form>
				</td>	
	  		</tr>
</table></td></tr></table>
 	<table width="992" height="33" align="center" border="0" cellpadding="0" cellspacing="0">
 		<tr valign="top">
   			<td height="33"><img src="images/fotter.jpg">			</td>
 		</tr>
</table>
</body>
</html>
