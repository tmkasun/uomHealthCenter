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
      $("#personalData").validate({
        rules: {
          indexNo: "required",// simple rule, converted to {required:true}
          fullName: "required" ,
		  gender: "required" ,
		 mstatus: "required" ,
		 currentAdd: "required" ,
		 permenentAdd: "required",
        },
        messages: {
          indexNo: "*",
		  fullName: "*",
		  gender: "*",
		  mstatus: "*",
		  currentAdd: "*",
		  permenentAdd: "*",
		  
		  
        }
      });
    });
  </script>
  
   <style type="text/css">

 	
    label.error {color: red; } 
    
  </style>
<title>Admin Panel-Add Personal Details</title>
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

<div id="main_content" style="height:500px;"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="adminPanel.php" >Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
 <a href="personalData.php">Add</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="editStuDetailsViewer.php">Edit</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="viewStuDetailsViewer.php">View</a>
</div>

</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane"><!--Start main_form_pane -->

<div>
<table border="0" width="100%" cellpadding="2" cellspacing="0">
	<form autocomplete="off" enctype="multipart/form-data" method="post" action="AddPersonalRecodes.php" name="personalData" id="personalData" > 
		<tr>
			<td><font color='#000000' face='Tahoma' size='2'>Index No:</font><br/>
							
			</td>
			<td colspan="2"><font color='#000000' face='Tahoma' size='2'>Full Name:</font><br/>
						 	
			</td>
						
		</tr>
		<tr>
			<td>
				<div><input type="text" size="15" name="indexNo" id="indexNo" />
					<label class="error">
					</label>
				</div>
			</td>
			<td colspan="2">
				<div><input type="text" size="47" name="fullName" id="fullName" />
					<label class="error">
					</label>
				</div>
			</td>
						
		</tr>
					
		<tr>
			<td colspan="3" height="20px"></td>
		</tr>
					
		<tr valign="bottom">
			<td>
				<font color='#000000' face='Tahoma' size='2'>Faculty:
				</font><br />
		 
			</td>
			<td>
				<font color='#000000' face='Tahoma' size='2'>Religion:
				</font><br />
		
			</td>

			<td>
				<font color='#000000' face='Tahoma' size='2'>Nationality:
				</font><br />
		
			</td>
    	</tr>
		<tr>
			<td>
				<select name="faculty" id="faculty" style="font:Tahoma; size:2;">
		  			<option value="Engineering">Engineering</option>
		  			<option value="IT">Information Technology</option>
		 			<option value="Archi">Architecture</option>
		  			<option value="ndt">NDT</option>
  				</select>
			</td>
			<td>
				<select name="religion" id="religion" style="font:Tahoma; size:2;">
					<option value="Buddhist" >Buddhist</option>
  					<option value="Hindu">Hindu</option>
  					<option value="Islam">Islam</option>
					<option value="Chathelic">Chathelic</option>
  				</select> 
			</td>
			<td>
				<select name="nationality" id="nationality" style="font:Tahoma; size:2;">
					<option value="Sinhala">Sinhala</option>
  					<option value="Tamil">Tamil</option>
					<option value="Muslim">Muslim</option>
					<option value="other">Other</option>
  				</select> 
			</td>
	
		</tr>
		<tr>
			<td colspan="3" height="20px"></td>
		</tr>
	 	<tr valign="top">
	   		<td><br />
				<font color='#000000' face='Tahoma' size='2'>Marital Status
				</font><br />
	
	   		</td>
	  		<td><br/>
			<font color='#000000' face='Tahoma' size='2'>Gender
				</font><br />
			
	   		</td>
	    	<td>
				<br />
				<font color='#000000' face='Tahoma' size='2'>Date of Birth
				</font><br />
		
	    	</td>
      	</tr>
	  	<tr>
	  		<td>
	  			<input name="mstatus" type="radio" value="Single" id="mstatus" />
					<font color='#000000' face='Tahoma' size='2'>Single</font>
				<input name="mstatus" type="radio" value="Married" id="mstatus" />
					<font color='#000000' face='Tahoma' size='2'>Married</font>
	  	
	  		</td>
	  		<td>
	  			<input name="gender" type="radio" value="male" id="gender" /><font color='#000000' 					face='Tahoma' size='2'>Male</font>
				<input name="gender" type="radio" value="female" id="gender" />
						<font color='#000000' face='Tahoma' size='2'>Female</font>
		
	  		</td>
	  		<td>
	  			<input type="text" size="12" value="5/18/1985" name="dob" id="dob" />	
	  		</td>
	  
	  
	 		</tr>
	  
	  		
	  		<tr>
				<td colspan="3" height="20px">
				</td>
			</tr>
				<td><font color='#000000' face='Tahoma' size='2'>Current Address:</font><br />
				
				</td>
				<td><font color='#000000' face='Tahoma' size='2'>Permanent Address:</font><br />
				
				</td>
			</tr>
			<tr>
				<td>
					<textarea cols="20" rows="5" name="currentAdd" id="currentAdd">
					</textarea>
				</td>
				<td>
					<textarea cols="20" rows="5" name="permenentAdd" id="permenentAdd">
					</textarea>	
				</td>
		
			</tr>
		
			<tr>
				<td colspan="3" height="20px"></td>
			</tr>
			<tr>
		
				<td colspan="2">
					
					<div style="font:Arial, Helvetica, sans-serif; color:#000099; float:right;">
					<?php if($_GET['msg']== "success")
							{
 								echo "Data is uploaded Successfully";
								
							}else if($_GET['msg']== "error")
							{
							
							echo "Data is not uploaded, Try again";
							
							
							}
							else if($_GET['msg']== "error1")
							{
							
							echo "Error, Dupplicate Recode, Try again";
							
							
							}
					?>
					</div>
				
				</td>
		
	          	<td align="center">
			  		<input type="submit" name="update" value="Update" id="update"/>
			   
		     	</td>
		
		
			</tr>

				
				
				
				
				
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
