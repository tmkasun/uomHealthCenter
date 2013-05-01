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
<script>
function doOnChange(i) {
if(document.getElementById('toggle'+i).checked)
{
var Member$ = document.getElementById('Member$'+i).value;
var Lstatus$ = document.getElementById('Lstatus$'+i).value;
var age$ = document.getElementById('age$'+i).value;
var remark$ = document.getElementById('remark$'+i).value;
var fmhisID = document.getElementById('fmhisID$'+i).value;
var regNumber =document.getElementById('regNumber$'+i).value;

alert(remark$);

var dataString = '&Member$='+ Member$ + '&Lstatus$=' + Lstatus$ + '&age$=' + age$ + '&remark$=' + remark$ + '&fmhisID=' + fmhisID + '&regNumber=' + regNumber ; 



if(Member$==''|| Lstatus$==''|| age$==''|| remark$==''|| regNumber=='')
	{
	$('.success').fadeOut(200).hide();

    $('.error').fadeOut(200).show();
	
	}
	
	
	else{


     $.ajax({
         type: "GET",
         url: "UpdateFamilyHistory_DB.php",
         data: dataString,
         dataType: "html",
		 success: function(){
		 $('.success').fadeIn(200).show();
         $('.error').fadeOut(200).hide();
		
  		 }
	});
	 
	}
	
}
else{

$('.success').fadeOut(200).hide();
$('.error').fadeOut(200).hide();
//alert("noooo");
}

//alert(i);
//alert("aaaaa");
return false;
}

</script>
<style type="text/css">

.error{
	
	color:#d12f19;
	font-size:15px;
	
		
	}
	.success{
	
	color:#006600;
	font-size:15px;
	
		
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
<table width="992px" style="background:url(images/body.jpg) repeat-y;" align="center" border="0" cellpadding="0" cellspacing="0" height="771">
	<tr>
	  <td height="671" valign="10px">
 			<table width="988px" height="693" bgcolor="#FFFFFF"align="center" border="0" cellpadding="0" cellspacing="0">
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
					
							<table border="0" width="97%">
								<tr>
									<td>
										<div id="fmdsearch" style="position:relative; height:50px; width:600px;">
											<form name="editfmh" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
												<table border="0" width="70%">
													<tr>
														<td width="40%" style="font:Arial, Helvetica, sans-serif; color:#0000FF;">Registration Number:</td>
														<td width="20%" align="center"><input type="text" size="12" name="reg" /></td>
														<td width="10%" align="center"><input type="submit" value="Search" name="fmSearch"/></td>
													</tr>	
												</table>
											</form>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="4"> 	
	 							 		<?php
	 										$regNo=$_POST['reg'];
	 											echo "	<div id=reg>
	 												<h3><font color='#0000FF'>Registration Number:".$regNo."
													</font></h3>
	 													</div></td></tr>";
										
								echo "<form method='post' action='UpdateFamilyHistory_DB.php'><table border='1' width='97%'>
	  								<tr>
										<td align='center' width='15%'>Member</td>
										<td align='center' width='10%'>Live/Dead</td>
										<td align='center' width='10%'>Age</td>
										<td align='center' width='62%'>Remarks</td>
									</tr> ";
									$regNu=$_POST['reg'];
		
	
							require("config.php");
		
						$query1 = "SELECT *
								FROM familyhistory WHERE StudentID ='".$regNu."'";
		
		$con=mysql_connect($dbhost, $dbuser, $dbpassword);
		
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		mysql_select_db($dbdatabase, $con);
		$result = mysql_query($query1,$con);
		$number=mysql_num_rows($result);
		
		
		$i=0;
		
		while($row = mysql_fetch_array($result))
  		{
  			
			echo "<tr>
					<td width='15%'><input type='text' size='8' id='Member$".$i."' name='Member$".$i."' value='".$row['Member']."' /></td>
					<td width='10%'><input type='text' size='7' id='Lstatus$".$i."' name='Lstatus$".$i."' value='".$row['LStatus']."' /></td>
					<td width='10%'><input type='text' size='6' id='age$".$i."' name='age$".$i."' value='".$row['MAge']."' /></td>
					<td width='58%'><input type='text' size='65' id='remark$".$i."' name='remark$".$i."' value='".$row['MRemarks']."' />
					<td width='4%'>
					<input type='hidden' value='".$row['FamilyHistoryID']."' id='fmhisID$".$i."' name='fmhisID$".$i."' /><input type='hidden' value='regNo' id='regNumber$".$i."' name='regNumber$".$i."' />
					<input type='checkbox' name ='toggle".$i."' id = 'toggle".$i."' value ='$i'onchange='javascript: doOnChange(this.value);' /></td>
					</tr>";
			$i=$i+1;		
  		}
		
		echo "<tr><td colspan='4'>
		<span class='error' style='display:none'> Please Enter Valid Data</span>
		<span class='success' style='display:none'> Successfully Updated..</span>
		
		
		</td></tr></table></form>";
		mysql_close($con);
		
		
	  
	  
	  
						
								
		?>						
								
								
</table>
				
				
				
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
