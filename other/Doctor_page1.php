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


<body marginheight="0px" marginwidth="0px" bgcolor="#000000">
<table width="1024px" bgcolor="#CC3399" height="130px" align="center">
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
<table width="1024px" height="474" bgcolor="#990033"align="center">
    <tr>  
	   <td width="25%" height="438" valign="top">
	     <table width="250px" align="left" hspace="0px" >
		 <tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				   <a href="Doctor_page.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Home</font></a>
				</td>
			</tr>
		  	<tr valign="top">
			    <td bgcolor="#996699" height="50PX" valign="middle">
				  <a href="Doctor1.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Treatment </font></a>	
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				 <!--  <a href="pageXray.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Clinical Examination </font>	-->			   
				</td>
			</tr>
			<tr>
			       <td bgcolor="#996699" height="50PX" valign="middle">
				  <!--   <a href="Treatment.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">View Medical Reports </font>	-->				   
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				  <!--   <a href="PastMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Past medical History </font>-->					   
				</td>
			</tr>
			<tr>
			      <td bgcolor="#996699" height="50PX" valign="middle">
				 <!--    <a href="FamilyMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Family Medical History</font>	-->				   
				</td>
			</tr>
	     </table> 
      </td>
	   <td width="49%" valign="top"><img src="images/medical-center.jpg" width="496" height="327" align="left">	   </td>
	   <td width="26%" valign="top" align="right">
	     <table width="100%">
		    <tr>
			  <td width="29%" align="right" valign="top">
		       <b>Search</b>			   </td>
			 <td width="71%" align="right" valign="top">
			  <form action="StuDetailsViewer.php" method="post" >
		        <input type="text" name="search" width="170px"/>
				<br/><input type="submit" value="Search" name="sumit"/>
		     </form>
			 </td>
			</tr>
	    </table>
      </td>
	  <td>
	  </td>
	</tr>
</table>



</body>
</html>
