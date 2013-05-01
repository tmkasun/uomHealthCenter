<?php
session_start();
extract ( $_POST );
$patientIndex = $_POST['indexNumb'];
session_register("PATIENT_ID");
$_SESSION['PATIENT_ID'] = $patientIndex;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<!--
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript">

$(function() {

$(".submit").click(function() {

showUser('$patientIndex');


    var regNo = $("#regNo").val();
	var textarea2 = $("#textarea2").val();
	var textarea3 = $("#textarea3").val();
	var textarea4 = $("#textarea4").val();
	var textarea5= $("#textarea5").val();
	
	     
	
    var dataString = 'regNo='+ regNo + '&textarea2=' + textarea2 + '&textarea3=' + textarea3 + '&textarea4=' + textarea4 + '&textarea5=' + textarea5;
		
	if(regNo=='' || textarea2=='' || textarea3=='' || textarea4=='' || textarea5=='')
	{
	$('.success').fadeOut(200).hide();

    $('.error').fadeOut(200).show();
	
	}
	
	else
	{
	
	$.ajax({
	type: "POST",
    url: "UpdateTreatment.php",
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
-->


<!-- <script type="text/javascript" src="use_userID.js"> </script>-->
<style type="text/css">
body{
background:url(http://s3.amazonaws.com/twitter_production/profile_background_images/6250979/bgtwitter.jpg) no-repeat;
}
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

<body marginheight="0px" marginwidth="0px" bgcolor="#000000">
<form id="form" method="post">
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
<table width="1024px" height="474" bgcolor="#990033"align="center" border="0">
    <tr>  
	   <td width="26%" height="438" valign="top">
	     <table width="250px" align="left" hspace="0px" >
		 	<tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				  <a href="Doctor_page.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Home</font></a>
				</td>
		   	</tr>
		  	<tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="PersonalData.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Personnal Record</font></a>
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="View_pageXray_doc.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Clinical Examination </font></a>				   
				</td>
			</tr>
			<tr>
			       <td bgcolor="#996699" height="50PX" valign="middle" onclick="">
				   <a href="PastMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Past medical History </font></a>
				  	   
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				<a href="ViewFamilyMedicalHistory_doc.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Family Medical History</font></a>	  			   
				</td>
			</tr>
			<tr>
			      <td bgcolor="#996699" height="50PX" valign="middle">
				   
				   <!-- <a href="Treatment.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Treatment </font></a>	-->					
				</td>
			</tr>
	     </table> 
      </td>
	  <td align="left" valign="top" width="74%">
		
		
  			<table width="100%" height="524" border="1" height="120px">
  				<tr valign="top">
					<td width="34%" align="center"><font color="#99FFCC" size="+1">Index No:</font></td>
					<td width="66%"><table border="1"><tr><td width="31%"><input type="text" size="30" name="regNo" id="regNo" value=" <?php echo $_SESSION['PATIENT_ID']?> "/>
					</td> 
					<td><input type="hidden" name="indexNum1"/></td></tr></table></td>
				</tr>
    			<tr>
      				<td width="34%" rowspan="2" valign="top" align="center" height="100px"><p><font color="#99FFCC" size="+1">Date time</font></p>
        				
          			
         				<div id="container" style="height:90px">
							<ul class="menu">
							<!--	<li>Shoutbox</li> -->
							</ul>
								<span class="clear"></span>
									<div class="content" style="height:420px ; overflow : auto; " >
									<!--		<h1>Latest Messages</h1> -->
											<div id="loading" style="height:20px"><img src="css/images/loading.gif" alt="Loading..." />
											</div>
												<ul>
												<ul>
												
									</div>
						</div>
					
							<!-- <textarea name="textarea1" rows="20" cols="20" id="textarea1"></textarea> -->
							 	
							 
							 
							 
							
									
							 
          					
	 				 </td>
	  
      				<td width="66%" valign="top">
	  					<label><font color="#99FFCC" size="+1">Complaint</font><br/>
         					 <textarea name="textarea2" id="textarea2" rows="6" cols="50"></textarea>
     					 </label>
	 				 </td>
   				 </tr>
    			<tr>
      				<td height="19" width="100%">
						<label><font color="#99FFCC" size="+1">Diagnosis</font><br />
        					<textarea name="textarea3" id="textarea3" rows="6" cols="50"></textarea>
      					</label>
	  				<table border="0">
	  					<tr>
							<td height="19">
								<label><font color="#99FFCC" size="+1">Investigations</font><br />
        							<textarea name="textarea4" id="textarea4" rows="6" cols="50"></textarea>
     							</label></td>
				</tr>
		  </table>
	  				</td>
   				 </tr>
    			<tr>
      				<td height="155" width="100%S" align="center" valign="top"><label>
					<table border="1" width="100%">
					<div>
						<tr height>
							<td width="30%" align="center" bgcolor="#FFFFFF">
							<input type="submit" name="submit" id="submit" value="Submit" class="submit"/> 
			
							</td>
							<td bgcolor="#FFFFFF" rowspan="2">
							<span class="error" style="display:none"> Please Enter Valid Data</span>
			<span class="success" style="display:none"> Treatment Successfully sent..........  <a href="Doctor1.php" style="color:#0066CC; font-weight:bold">
							Click For a New Treatment
							</a></span>
							</td>
							
						</tr>
						
					</div>
					</table>
					
	  					
       
      				</label></td>
      				<td>
	  					<p><font color="#99FFCC" size="+1">Treatment</font></p>
      					<p>
        					<label>
        						<textarea name="textarea5" id="textarea5" rows="7" cols="50"></textarea>
        					</label>
       					</p>
					</td>
    				</tr>
     		 </table>
			 
       				<label>
	   				</label>
      			<p>&nbsp;</p>
    	
		</td>
		</tr>
</table>
</form>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="TreatmentAjax.js"></script>
</body>

</html>


	
