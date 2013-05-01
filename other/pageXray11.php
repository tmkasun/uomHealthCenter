<?php
//Start session
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Family Medical History</title>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript">

$(function() {

$(".submit").click(function() {

	var regNo = $("#regNo").val();
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
	
	
	     
	
    var dataString = '&regNo=' + regNo + '&hr=' + hr + '&fr=' + fr + '&ins=' + ins + '&chestEx=' + chestEx + '&cheins=' + cheins + '&chinsp=' + chinsp + '&chins=' + chins + '&eyeLeft=' + eyeLeft + '&eyeRight=' + eyeRight + '&glasses=' + glasses + '&colourVision=' + colourVision + '&decay=' + decay + '&missing=' + missing + '&filled=' + filled + '&dentures=' + dentures + '&gingivitis=' + gingivitis + '&ears=' + ears + '&earsinfo=' + earsinfo + '&nose=' + nose + '&noseinfo=' + noseinfo + '&mouth=' + mouth + '&mouthinfo=' + mouthinfo + '&throat=' + throat + '&throatinfo=' + throatinfo + '&tonsils=' + tonsils + '&tonsilsinfo=' + tonsilsinfo + '&abdomen=' + abdomen + '&abdomeninfo=' + abdomeninfo + '&hernial_orifices=' + hernial_orifices + '&hernial_orificesinfo=' + hernial_orificesinfo + '&genitalia=' + genitalia + '&genitaliainfo=' + genitaliainfo + '&anus=' + anus + '&anusinfo=' + anusinfo + '&nervousSystem=' + nervousSystem + '&vericoseveins=' + vericoseveins + '&bp=' + bp + '&skin=' + skin + '&hair=' + hair + '&nails=' + nails + '&thyroid=' + thyroid + '&breasts=' + breasts + '&heart=' + heart + '&hb=' + hb + '&skull=' + skull + '&upper_limbs=' +  upper_limbs + '&lower_limbs=' + lower_limbs + '&spine=' + spine + '&thorax=' + thorax + '&others=' + others;
	
	
	if(regNo=='' || hr=='' || fr==''|| chestEx==''|| chinsp==''|| chins==''|| eyeLeft==''|| eyeRight==''|| colourVision==''|| ears==''|| nose==''|| mouth==''|| throat==''|| tonsils==''|| abdomen==''|| hernial_orifices==''|| genitalia==''|| anus=='')
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
				   <a href="pageXray.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Add Cli:Examination</font></a>
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="Edit_pageXray.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Edit Cli:Examination </font></a>				   
				</td>
			</tr>
			<tr>
			       <td bgcolor="#996699" height="50PX" valign="middle">
				 <a href="View_pageXray.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">View Cli:Examination</font></a>					   
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				 
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
			<tr><form autocomplete="off" enctype="multipart/form-data" method="post" name="form">
				<td colspan="2">Registration Number</td>
				<td><input type="text" size="15" name="regNo" id="regNo" /></td>
			<tr>
			<tr>
				<td rowspan="2" height="170px" width="100px" valign="top">
				<div id="title">Chest Xray</div>
				<div id="img" style="background-color:#00FF99; height:100px;"></div>
				<div id="button" style="background-color:#FF9999; position:relative; margin-top:15px;" align="center"><input type="submit" value="Upload" name="xrayUpload" /></div>
				</td>
				<td width="70px" valign="top">Hr<br /><input type="text" size="10" name="hr" id="hr" /></td>
				<td  width="70px" valign="top">Fr<br /><input type="text" size="10" name="fr" id="fr" /></td>
				<td  width="70px" valign="top">INS<br /><input type="text" size="10" name="ins" id="ins" /></td>
				<td  width="70px" valign="top">Chest Ex<br /><input type="text" size="10" name="chestEx"  id="chestEx"/></td>
				<td  width="70px" valign="top">INS<br /><input type="text" size="10" name="cheins" id="cheins" /></td>
				<td  width="70px" valign="top">Ch.INSP<br /><input type="text" size="10" name="chinsp" id="chinsp" /></td>
				<td  width="70px" valign="top">INS<br /><input type="text" size="10" name="chins" id="chins" /></td>	
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
					<input type="text" size="10" name="eyeLeft" id="eyeLeft" />
					</td>
					<td>R<br/>
					<input type="text" size="10" name="eyeRight" id="eyeRight" />
					</td>
				</tr>
				</table>
				
				</td>
				
				<td valign="middle">Glasses<input type="checkbox" name="glasses" id="glasses" /></td>
				<td colspan="3" valign="middle" align="center">Colour Vision
					<select name="colourVision" id="colourVision">
						<option value="Normal">Normal</option>
  						<option value="aaaa">aaaa</option>
  						<option value="bbbb">bbbb</option>
						<option value="ccccc">ccccc</option>
  					</select> 
				
				</td>
			</tr>
			<tr><td colspan="8">Teeth</td></tr>
			<tr height="100px" valign="top">
				<td colspan="2" valign="top" align="center">Decay<br /><input type="text" size="10" name="decay" id="decay" /></td>
				<td align="center">Mising<input type="text" size="10" name="missing" id="missing" /></td>
				<td align="center">Filled<input type="text" size="10" name="filled" id="filled" /></td>
				<td colspan="2" align="center">Dentures<br /><input type="text" size="10" name="dentures" id="dentures" /></td>
				<td colspan="2" align="center">Gingivitis<br /><input type="text" size="10" name="gingivitis" id="gingivitis" /></td>
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
		<select name="ears" id="ears">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="70" name="earsinfo" id="earsinfo" /></td>	
	  </tr>
		<tr>
		<td align="center">NOSE</td>
		<td align="center">
		<select name="nose" id="nose">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="70" name="noseinfo" id="noseinfo" /></td>	
		</tr>
		<tr>
		<td align="center">MOUTH</td>
		<td align="center">
		<select name="mouth" id="mouth">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="70" name="mouthinfo" id="mouthinfo" /></td>	
		</tr>
		<tr>
		<td align="center">THROAT</td>
		<td align="center">
		<select name="throat" id="throat">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="70" name="throatinfo" id="throatinfo" /></td>	
		</tr>
		<tr>
		<td align="center">TONSILS</td>
		<td align="center">
		<select name="tonsils" id="tonsils">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="70" name="tonsilsinfo" id="tonsilsinfo" /></td>	
		</tr>
		<tr>
		<td align="center">ABDOMEN</td>
		<td align="center">
		<select name="abdomen" id="abdomen">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="70" name="abdomeninfo" id="abdomeninfo" /></td>	
		</tr>
		<tr>
		<td align="center">HERNIAL ORIFICES</td>
		<td align="center">
		<select name="hernial_orifices" id="hernial_orifices">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="70" name="hernial_orificesinfo" id="hernial_orificesinfo" /></td>	
		</tr>
		<tr>
		<td align="center">GENITALIA</td>
		<td align="center">
		<select name="genitalia" id="genitalia">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="70" name="genitaliainfo" id="genitaliainfo" /></td>	
		</tr>
		<tr>
		<td align="center">ANUS</td>
		<td align="center">
		<select name="anus" id="anus">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="center"><input type="text" size="70" name="anusinfo" id="anusinfo" /></td>	
		</tr>
		
		</table>
		<table border="1" width="100%">
			<tr>
				<td width="35%">NERVOUS SYSTEM</td>
				<td width="65%"><input type="text" size="70" name="nervousSystem" id="nervousSystem" /></td>
			</tr>
			<tr>
				<td width="35%">VARICOSE VEINS</td>
				<td width="65%"><input type="text" size="70" name="vericoseveins" id="vericoseveins" /></td>
			</tr>
			<tr>
				<td width="35%">B.P</td>
				<td width="65%"><input type="text" size="70" name="bp" id="bp" /></td>
			</tr>
			<tr>
				<td width="35%">SKIN</td>
				<td width="65%"><input type="text" size="70" name="skin" id="skin" /></td>
			</tr>
			<tr>
				<td width="35%">HAIR</td>
				<td width="65%"><input type="text" size="70" name="hair" id="hair" /></td>
			</tr>
			<tr>
				<td width="35%">NAILS</td>
				<td width="65%"><input type="text" size="70" name="nails" id="nails" /></td>
			</tr>
			<tr>
				<td width="35%">THYROID</td>
				<td width="65%"><input type="text" size="70" name="thyroid" id="thyroid" /></td>
			</tr>
			<tr>
				<td width="35%">BREASTS</td>
				<td width="65%"><input type="text" size="70" name="breasts" id="breasts" /></td>
			</tr><tr>
				<td width="35%">HEART</td>
				<td width="65%"><input type="text" size="70" name="heart" id="heart" /></td>
			</tr>
			<tr>
				<td width="35%">H.b</td>
				<td width="65%"><input type="text" size="70" name="hb" id="hb" /></td>
			</tr>
			<tr>
				<td width="35%">SKULL</td>
				<td width="65%"><input type="text" size="70" name="skull" id="skull" /></td>
			</tr>
			<tr>
				<td width="35%">UPPER LIMBS</td>
				<td width="65%"><input type="text" size="70" name="upper_limbs" id="upper_limbs" /></td>
			</tr>
			<tr>
				<td width="35%">LOWER LIMBS</td>
				<td width="65%"><input type="text" size="70" name="lower_limbs" id="lower_limbs" /></td>
			</tr>
			<tr>
				<td width="35%">SPINR</td>
				<td width="65%"><input type="text" size="70" name="spine" id="spine" /></td>
			</tr>
			<tr>
				<td width="35%">THORAX</td>
				<td width="65%"><input type="text" size="70" name="thorax"  id="thorax"/></td>
			</tr>
			<tr>
				<td width="35%">OTHERS</td>
				<td width="65%"><input type="text" size="70" name="others" id="others" /></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
				<div id="info">
					<div id="message" style="position:relative; float:left; width:700px;">
						<span class="error" style="display:none"> Please Enter Valid Data</span>
						<span class="success" style="display:none"> Data Successfully Uploaded...</span>
					
					</div>
					<div id="button" style="position:relative; float:right;">
					<input type="submit" name="submit" id="submit" value="Submit" class="submit" /> 
					</div>
				</div>
					
				</td>
			
			</tr></table></tr></form>
		</tr></table></td></tr>	
</table>
</body>
</html>
