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
<title>Admin Panel - Add Family Medical History</title>
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

<div id="main_content" style="height:615px"><!--Start main content -->

<div id="navigation_pane" ><!--Start navigation pane -->

<div > <!--Insert navigation divs here -->

<div class="sub_Navigation"  align="center"  style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a  href="adminPanel.php" >Home</a>	
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
 <a href="familyMedicalHistory.php">Add</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="editFamilyMedicalHistory.php">Edit</a>
</div>

<div class="sub_Navigation" align="center"   style="height:30px;  background:url(../../images/sidebarmenu.jpg) no-repeat;">
<a href="viewFamilyMedicalHistory.php">View</a>
</div>

</div><!--End of main_navigation -->

</div><!--End of navigation pane -->

<!--*************************************** -->

<div id="main_form_pane" ><!--Start main_form_pane -->

<div>
<div id="familyHeader" style="position:relative; border-top:20px; height:60px;">
<table border="0" width="100%">
						<tr>
							<form name="searchinfo" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
							<td align="center"><font color='#000000' face='Tahoma' size='2'>Reg Number</font>
							</td>
							<td align="center">
								<input type="text" size="10" name="regNum" />
							</td>
 							<td align="center"><font color='#000000' face='Tahoma' size='2'>Enter Number of Members in the Family
							</font>
							</td>
							<td>
								<select name="FamilyMembers">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
  								</select> 
							</td>
							<td>
								<input type="submit" name="generate_form" value="OK"/>
							</td>
							</form>
						</tr>		
				</table>
				<div id="space" style="position:relative; border-top:20px; height:50px;">
				<div id="title">
				</div>
				</div>
				<div id="family_details">
				
					<?php 
					$fNumber=$_POST['FamilyMembers'];
					$regID=$_POST['regNum'];
					
					
					echo "	<div id=reg>
	 					<font color='#000000' face='Tahoma' size='2'>Registration Number:   ".$regID."
					</font>
	 
	 				</div>";
		
	echo "<form name='Member_From' action='insertFamilyInfo.php' method='post'>";
		
		
		
				echo "<table border ='1' width='98%'>
				<tr>
				<input type='hidden' name='fNumber' value='".$fNumber."' />
				
				<input type='hidden' name='regID' value='".$regID."' />
					<td width='14%' align='center'><font color='#000000' face='Tahoma' size='2'>Member </font></td>
					<td width='10%' align='center'><font color='#000000' face='Tahoma' size='2'>Live/Dead </font></td>
					<td width='10%' align='center'><font color='#000000' face='Tahoma' size='2'>Age </font></td>
					<td width='64%' align='center'><font color='#000000' face='Tahoma' size='2'>Remarks </font></td>	
				<tr>";
				for($i=0;$i<$fNumber;$i++)
				{
				
				echo "<tr>
						<td align='center'>
							<select name='Member$".$i ."'>
							<option value='Father'>Father</option>
  							<option value='Mother'>Mother</option>
  							<option value='Sister'>Sister</option>
							<option value='Brother'>Brother</option>
							<option value='Me'>Me</option>
						</select>
						
						
						</td>	
						<td align='center'>
							<select name='Lstatus$".$i."'>
							<option value='Live'>Live</option>
  							<option value='Dead'>Dead</option>
						
						
						</td>	
						<td align='center'>
							<input type ='text' size='5' name='age$".$i."'/>
						</td>	
						<td align='center'>
							<input type ='text' size='44' name='remark$".$i."'/>
						</td>
						</tr>";
				
				
				}
				echo "<tr align='right'>
				<td colspan='4'>
				
				
					<div style='font:Arial, Helvetica, sans-serif; color:#000099; float:left;'>";
					if($_GET['msg']== "success")
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
				
					
				
				
		
				
				
				echo "</div>
				
				<div style='font:Arial, Helvetica, sans-serif; color:#000099; float:right;'><input type='submit' value='Submit' name='familyInfosub'/></div>
					
					
					
				</td>	</tr>
				
				</form>";
				
			
				?>
				</td>
			</tr>
		</table>
				
	  </tr>

	</div>
				
			
			
				


</div>
			

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
