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
      $("#clinicinfo").validate({
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
		 
		  
        }
      });
    });
  </script>
  
   <style type="text/css">

 	
    label.error {color: red; } 
    
  </style>

<title>Admin Panel - Add Clinical Information</title>
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

<div id="main_content" style="height:1120px;"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="adminPanel.php" >Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
 <a href="pageXray.php">Add</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="edit_pageXray.php">Edit</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="view_pageXray.php">View</a>
</div>

</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->

<div>
	<table border="0" width="100%">
		<tr>
			<form  id="clinicinfo" enctype="multipart/form-data" method="post" name="form" action="InsertDB_pageXray.php">
				<td colspan="3">
					<font color='#000000' face='Tahoma' size='2'>Registration Number
					</font>
				</td>
				<td colspan="3">
					<input type="text" size="15" name="regNo" id="regNo" />
				</td>
			
		
		<tr>
			<td rowspan="2" height="180px" width="72" valign="top">
				<div id="title"></div>
				<div id="img"  height:100px;"></div>
				<div id="button" style="position:relative; margin-top:15px;" align="center"></div>
			</td>
			<td width="65" valign="top"><font color='#000000' face='Tahoma' size='2'>Hr</font><br />									            	
			  <input type="text" size="4" name="hr" id="hr" />                  
			</td>
			<td  width="53" valign="top">
				<font color='#000000' face='Tahoma' size='2'>Fr</font><br />
				<input type="text" size="4" name="fr" id="fr" /></td>
			<td  width="72" valign="top"><font color='#000000' face='Tahoma' size='2'>INS</font>
			<br />
			<input type="text" size="4" name="ins" id="ins" />
			</td>
			<td  width="85" valign="top"><font color='#000000' face='Tahoma' size='2'>Chest Ex
			</font><br />
			<input type="text" size="4" name="chestEx"  id="chestEx"/>
			</td>
			<td  width="37" valign="top"><font color='#000000' face='Tahoma' size='2'>INS
			</font><br />
			<input type="text" size="4" name="cheins" id="cheins" /></td>
			<td  width="65" valign="top"><font color='#000000' face='Tahoma' size='2'>Ch.INSP
			</font><br />
			<input type="text" size="4" name="chinsp" id="chinsp" />
			</td>
			<td  width="39" valign="top"><font color='#000000' face='Tahoma' size='2'>INS
			</font><br />
			<input type="text" size="4" name="chins" id="chins" /></td>	
		</tr>
			<tr valign="top">
							<td colspan="3">
								<table border="0" width="220px" align="center">
									<tr height="40px">	
										<td align="center" colspan="2"><font color='#000000' face='Tahoma' size='2'>Eyes</font>
										</td>
									</tr>
									<tr height="40px" valign="top">
										<td><font color='#000000' face='Tahoma' size='2'>L</font><br />
											<input type="text" size="10" name="eyeLeft" id="eyeLeft" />
										</td>
										<td><font color='#000000' face='Tahoma' size='2'>R</font><br/>
											<input type="text" size="10" name="eyeRight" id="eyeRight" />
										</td>
									</tr>
								</table>
								</td>
								<td valign="middle"><font color='#000000' face='Tahoma' size='2'>Glasses<input type="checkbox" name="glasses" id="glasses" /></font></td>
								<td colspan="3" valign="middle" align="center"><font color='#000000' face='Tahoma' size='2'>Colour Vision</font>
									<select name="colourVision" id="colourVision">
										<option value="Normal">Normal</option>
  										<option value="Blind">Blind</option>
  										
  									</select> 
								</td>
							</tr>
							<tr>
								<td colspan="8">
									<font color='#000000' face='Tahoma' size='2'>Teeth
									</font>
								</td>
							</tr>
							<tr height="100px" valign="top">
								<td colspan="2" valign="top" align="center"><font color='#000000' face='Tahoma' size='2'>Decay</font><br />
									<input type="text" size="6" name="decay" id="decay" />
								</td>
								<td align="center"><font color='#000000' face='Tahoma' size='2'>Mising</font>
									<input type="text" size="6" name="missing" id="missing" />
								</td>
								<td align="center"><font color='#000000' face='Tahoma' size='2'>Filled</font>
									<input type="text" size="6" name="filled" id="filled" />
								</td>
								<td colspan="2" align="center"><font color='#000000' face='Tahoma' size='2'>Dentures</font><br />
									<input type="text" size="6" name="dentures" id="dentures" />
								</td>
								<td colspan="2" align="center"><font color='#000000' face='Tahoma' size='2'>Gingivitis</font><br />
									<input type="text" size="6" name="gingivitis" id="gingivitis" />
								</td>
							</tr>
							<table border="0" width="100%">
								<tr align="left">
									<td colspan="3"><font color='#000000' face='Tahoma' size='2'><b>General Physique</b></font></td>
								</tr>
								<tr>
									<td width="35%" align="left"><font color='#000000' face='Tahoma' size='2'>POSTTURE</font></td>
									<td width="10%" align="left"><font color='#000000' face='Tahoma' size='2'>CONDITION</font></td>
									<td width="55%" align="center"><font color='#000000' face='Tahoma' size='2'>REMARKS</font></td>
								</tr>
								<tr>
									<td align="left"><font color='#000000' face='Tahoma' size='2'>EARS</font></td>
									<td align="left">
										<select name="ears" id="ears">
											<option value="GOOD">GOOD</option>
  											<option value="FAIR">FAIR</option>
  											<option value="POOR">POOR</option>	
  										</select> 
		
									</td>
									<td align="right">
										<input type="text" size="57" name="earsinfo" id="earsinfo" />
									</td>	
	  								</tr>
									<tr>
		<td align="left"><font color='#000000' face='Tahoma' size='2'>NOSE</font></td>
		<td align="left">
		<select name="nose" id="nose">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="right"><input type="text" size="57" name="noseinfo" id="noseinfo" /></td>	
		</tr>
		<tr>
		<td align="left"><font color='#000000' face='Tahoma' size='2'>MOUTH</font></td>
		<td align="left">
		<select name="mouth" id="mouth">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="right"><input type="text" size="57" name="mouthinfo" id="mouthinfo" /></td>	
		</tr>
		<tr>
		<td align="left"><font color='#000000' face='Tahoma' size='2'>THROAT</font></td>
		<td align="left">
		<select name="throat" id="throat">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="right"><input type="text" size="57" name="throatinfo" id="throatinfo" /></td>	
		</tr>
		<tr>
		<td align="left"><font color='#000000' face='Tahoma' size='2'>TONSILS</font></td>
		<td align="left">
		<select name="tonsils" id="tonsils">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="right"><input type="text" size="57" name="tonsilsinfo" id="tonsilsinfo" /></td>	
		</tr>
		<tr>
		<td align="left"><font color='#000000' face='Tahoma' size='2'>ABDOMEN</font></td>
		<td align="left">
		<select name="abdomen" id="abdomen">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="right"><input type="text" size="57" name="abdomeninfo" id="abdomeninfo" /></td>	
		</tr>
		<tr>
		<td align="left"><font color='#000000' face='Tahoma' size='2'>HERNIAL ORIFICES</font></td>
		<td align="left">
		<select name="hernial_orifices" id="hernial_orifices">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="right"><input type="text" size="57" name="hernial_orificesinfo" id="hernial_orificesinfo" /></td>	
		</tr>
		<tr>
		<td align="left"><font color='#000000' face='Tahoma' size='2'>GENITALIA</font></td>
		<td align="left">
		<select name="genitalia" id="genitalia">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="right"><input type="text" size="57" name="genitaliainfo" id="genitaliainfo" /></td>	
		</tr>
		<tr>
		<td align="left"><font color='#000000' face='Tahoma' size='2'>ANUS</font></td>
		<td align="left">
		<select name="anus" id="anus">
			<option value="GOOD">GOOD</option>
  			<option value="FAIR">FAIR</option>
  			<option value="POOR">POOR</option>	
  		</select> 
		
		</td>
		<td align="right"><input type="text" size="57" name="anusinfo" id="anusinfo" /></td>	
		</tr>
		
		</table>
		<table border="0" width="100%">
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>NERVOUS SYSTEM</font></td>
				<td width="65%"><input type="text" size="70" name="nervousSystem" id="nervousSystem" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>VARICOSE VEINS</font></td>
				<td width="65%"><input type="text" size="70" name="vericoseveins" id="vericoseveins" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>B.P</font></td>
				<td width="65%"><input type="text" size="70" name="bp" id="bp" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>SKIN</font></td>
				<td width="65%"><input type="text" size="70" name="skin" id="skin" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>HAIR</font></td>
				<td width="65%"><input type="text" size="70" name="hair" id="hair" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>NAILS</font></td>
				<td width="65%"><input type="text" size="70" name="nails" id="nails" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>THYROID</font></td>
				<td width="65%"><input type="text" size="70" name="thyroid" id="thyroid" /></td>
			</tr>
			<tr>
				<td width="32%"><font color='#000000' face='Tahoma' size='2'>BREASTS</font></td>
				<td width="65%"><input type="text" size="70" name="breasts" id="breasts" /></td>
			</tr><tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>HEART</font></td>
				<td width="65%"><input type="text" size="70" name="heart" id="heart" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>H.b</font></td>
				<td width="65%"><input type="text" size="70" name="hb" id="hb" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>SKULL</font></td>
				<td width="65%"><input type="text" size="70" name="skull" id="skull" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>UPPER LIMBS</font></td>
				<td width="65%"><input type="text" size="70" name="upper_limbs" id="upper_limbs" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>LOWER LIMBS</font></td>
				<td width="65%" align="right"><input type="text" size="70" name="lower_limbs" id="lower_limbs" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>SPINR</font></td>
				<td width="65%" align="right"><input type="text" size="70" name="spine" id="spine" /></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>THORAX</font></td>
				<td width="65%" align="right"><input type="text" size="70" name="thorax"  id="thorax"/></td>
			</tr>
			<tr>
				<td width="35%"><font color='#000000' face='Tahoma' size='2'>OTHERS</font></td>
				<td width="65%" align="right"><input type="text" size="70" name="others" id="others" /></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
				<div id="info">
					<div id="message" style="position:relative;float:left;font:Tahoma; size:2; color:#000099; width:520px;">
					<?php 
					if($_GET['success']==10)
					{
					
					echo "Data Successfully Uploaded...";
					
					}
					else if($_GET['success']==1)
					{
					
					echo "Error Occured,Try again...";
						
				
					
					}
					else if($_GET['success']==2)
					{
					
					echo "Error Dupplicate recode, Try again...";
						
				
					
					}
					
					
					
					
					?>
						
					
					</div>
					<div id="button" style="position:relative; float:right;">
					<input type="submit" name="submit" id="submit" value="Submit" class="submit" /> 
					</div>
				</div>
					
				</td>
			
			</tr>
			
		</table>
		</form>
		

		
		
		
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
