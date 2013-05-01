<?php
//Start session
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Family Medical History</title>
	<script language="JavaScript" type="text/javascript" src="ajax_javascript.js"></script>
	<script type="text/javascript" src="javascripts/prototype.js"> </script>
	<script type="text/javascript" src="javascripts/effects.js"> </script>
	<script type="text/javascript" src="javascripts/window.js"> </script>
	<script type="text/javascript" src="javascripts/debug.js"> </script>
	<link href="themes/default.css" rel="stylesheet" type="text/css"/>
	<link href="themes/alert.css" rel="stylesheet" type="text/css"/>
	<link href="themes/alphacube.css" rel="stylesheet" type="text/css"/>


</head>


<body marginheight="0px" marginwidth="0px" bgcolor="#000000" onLoad="ajax_update();">
<table width="1024px" bgcolor="#CC3399" height="130px" align="center" border="1">
 <tr>
   <td align="center"><br/><br/><br/><font face="Arial, Helvetica, sans-serif" size="+5"> University of Moratuwa Health Care Centre </font><br/><br/><br/>
   <div align="right" >
   		<table border="0">
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
<table width="1024px" height="550" bgcolor="#990033"align="center" border="1">
    <tr>  
	   <td width="25%" height="438" valign="top">
	     <table width="250px" align="left" hspace="0px" >
		 <tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="AdminPanel.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Home</font>
				</td>
		   </tr>
		  	<tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="PersonalData.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Personnal Record</font>
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="pageXray.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Clinical Examination </font>				   
				</td>
			</tr>
			<tr>
			       <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="Treatment.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Treatment </font>				   
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="PastMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Past medical History </font>				   
				</td>
			</tr>
			<tr>
			      <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="FamilyMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Family Medical History</font>				   
				</td>
			</tr>
	     </table> 
      </td>
	  <td align="left" valign="top">
	  <script type="text/javascript">
	  
	  function openAjaxConfirm() {
      	Dialog.confirm({url: "PrintTreatmentInfo.php", options: {method: 'get'}}, 
                     {top: 10, width:500, height:500, className: "alphacube", okLabel: "Yes", cancelLabel:"No"})    
  		}
	  
	  </script>
		

		<table border="1" width="100%">
			<tr>
				<td width="10%">Index No</td>
				<td width="15%">Date</td>
				<td width="45%">Treatment</td>
				<td>Status</td>
			</tr>
			<tr>
				<td>064054D</td>
				<td>2009-11-05</td>
				<td rowspan="3"></td>
				<td rowspan="2"></td>
			</tr>
			
			
				
			</table>
			<div style="position:relative; width:760px; background-color:#00FFCC; height:350px;" id="teatment_info">
				
			</div>
			<div style="position:relative; width:130px; margin-left:630px; height:130px; background-color:#FFCC00; overflow : auto;" id="content">
			</div>
			<div>
			<a href="#" onclick="openAjaxConfirm()">Treatment 1</a><br/>
			
			
			
			</div>
			

			</td>
		</tr>
		
</table>

</body>
</html>
