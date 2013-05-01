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
<script type="text/javascript">


$(document).ready(function() {

$(".toggle").click(function() {

var get_id = $(this).attr('id');

var Member$ = document.getElementById('Member$'+get_id).value;
var Member$ = document.getElementById('Member$'+get_id).value;
var Lstatus$ = document.getElementById('Lstatus$'+get_id).value;
var age$ = document.getElementById('age$'+get_id).value;
var remark$ = document.getElementById('remark$'+get_id).value;
var fmhisID = document.getElementById('fmhisID$'+get_id).value;
var regNumber =document.getElementById('regNumber$'+get_id).value;

	

	var dataString = 'Member$='+ Member$ + '&Lstatus$=' + Lstatus$ + '&age$=' + age$ + '&remark$=' + remark$ + '&fmhisID=' + fmhisID + '&regNumber=' + regNumber ; 
	
	if(Member$==''|| Lstatus$==''|| age$==''|| remark$==''|| regNumber=='')
	{
	$('.success').fadeOut(200).hide();

    $('.error').fadeOut(200).show();
	
	}
	
	else{
	//alert(dataString);

     $.ajax({
         type: "POST",
         url: "UpdateFamilyHistory_DB.php",
         data: dataString,
		 success: function(){
		 $('.success').fadeIn(200).show();
         $('.error').fadeOut(200).hide();
		
  		 }
	});
	
	
	
	}
	
	 return false;
	
	
	
	   
 })
 
 
});









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




<title>Admin Panel - Edit Family Medical History</title>
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

<div id="main_content" style="height:600px"><!--Start main content -->

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
							<table border="0" width="100%">
								<tr>
									<td>
										<div id="fmdsearch" style="position:relative; height:50px; width:600px;">
											<form name="editfmh" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
												<table border="0" width="80%">
													<tr>
														<td width="30%"><font color='#000000' face='Tahoma' size='2'> Enter Registration Number:</font></td>
														<td width="20%" align="center"><input type="text" size="12" name="reg" /></td>
														<td width="25%" align="center"><input type="submit" value="Search" name="fmSearch"/></td>
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
	 											echo "	<div id=reg><br/>
	 												<font color='#000000' face='Tahoma' size='2'>Registration Number:".$regNo."
													</font>
	 													</div></td></tr>";
										
								echo "<form method='post' action='UpdateFamilyHistory_DB.php'><table border='1' width='100%' cellspacing='0' cellpading='0'>
	  								<tr>
										<td align='center' width='15%'><font color='#000000' face='Tahoma' size='2'>Member</font></td>
										<td align='center' width='11%'><font color='#000000' face='Tahoma' size='2'>Live/Dead</font></td>
										<td align='center' width='11%'><font color='#000000' face='Tahoma' size='2'>Age</font></td>
										<td align='center' width='63%'><font color='#000000' face='Tahoma' size='2'>Remarks</font></td>
									</tr> ";
									$regNu=$_POST['reg'];
		
	
							require("../../inc/config.php");
		
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
					<td width='11%'><input type='text' size='5' id='Lstatus$".$i."' name='Lstatus$".$i."' value='".$row['LStatus']."' /></td>
					<td width='11%'><input type='text' size='5' id='age$".$i."' name='age$".$i."' value='".$row['MAge']."' /></td>
					<td width='59%'><input type='text' size='48' id='remark$".$i."' name='remark$".$i."' value='".$row['MRemarks']."' />
					<td width='4%'>
					<input type='hidden' value='".$row['FamilyHistoryID']."' id='fmhisID$".$i."' name='fmhisID$".$i."' />
					<input type='hidden' value='".$regNu."' id='regNumber$".$i."' name='regNumber$".$i."' />
					

					<input type='checkbox' name ='toggle".$i."' id='".$i."' value ='$i' class ='toggle'/></td>
					
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
