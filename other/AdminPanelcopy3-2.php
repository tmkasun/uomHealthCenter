<?php
//Start session
session_start();
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>AdminPanel</title>

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
<table width="992px" style="background:url(images/body.jpg) repeat-y;" align="center" border="0" cellpadding="0" cellspacing="0" height="829">
	<tr>
	  <td height="829" valign="10px">
 			<table width="988px" height="752" bgcolor="#FFFFFF"align="center" border="0" cellpadding="0" cellspacing="0">
				<tr valign="top">  
	   				<td width="25%" height="452">
	     				<table width="259" align="left" hspace="0px" border="0" cellpadding="0" cellspacing="0" >
		 					<tr valign="top">
			    				<td width="259" height="50PX" align="center" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;">
				   					<a href="Doctor_page.php" style=""><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Home</font></a>								
									</td>
							</tr>
		  					<tr valign="top">
			    				<td bgcolor="#996699" height="50PX" valign="middle" style="background:url(images/sidebarmenu.jpg) no-repeat;" align="center">
				  					 <a href="Doctor1.php"><font color="#6fd28f" face="Times New Roman, Times, serif"  size="+2">Treatment</font></a>
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
					<table border="0" width="97%" >
						<form id="form1" name="form1" method="post" action="Doctor.php">
							<tr>
								<td>
									<table width="97%" height="80" border="0">
  										<tr valign="top">
											<td width="37%" align="center">
												<font color="#0000FF" size="+1">Enter Index No:</font>
											</td>
				  							<td width="60%">
												<table border="0">
													<tr>
														<td width="35%">
															<input type="text" size="20" name="indexNumb" />
														</td>
														<td>
															<input type="submit" name="indexNum" value="OK" />
														</td>
													</tr>
												</table>
											</td>	
										</tr>
										<tr>
   				  							<td width="37%" rowspan="2" valign="top"><p>&nbsp;</p>
        			
         								 	</td>
	  
      										<td width="60%" valign="top">
	  											<label><br/>
  					 				 			</label>
 				  							</td>
			 						 	</tr>
										<tr>
      										<td height="15" width="63%">
												<label><br />
					 							</label>
	  												<table border="0">
	  													<tr>
															<td height="19">
																<label><br />
							 								 	</label>
															</td>
														</tr> 
									
									
													</table>
											</td>
			 							 </tr>
    									 <tr>
   				  							<td height="80" width="37%" align="center" valign="top"><label></label>
											</td>
      										<td>
	  											<p>&nbsp;</p>
      											<p>
        											<label></label>
       											</p>
											</td>
			 							 </tr>
									</td>
								</tr>
							</form>
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
