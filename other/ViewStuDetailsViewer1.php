<?php
//Start session
session_start();

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Details</title>

</head>

<body marginheight="0px" marginwidth="0px" bgcolor="#000000">

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
<table width="1024px" height="580" bgcolor="#990033"align="center" border="1">
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
				 <a href="PastMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Past medical History </font>					   
				</td>
			</tr>
			<tr>
			     <td bgcolor="#996699" height="50PX" valign="middle">
				  <a href="FamilyMedicalHistory.php"><font color="#000000" face="Times New Roman, Times, serif"  size="+2">Family Medical History</font> 			   
				</td>
			</tr>
			<tr>
			      <td bgcolor="#996699" height="50PX" valign="middle">
				  				   
				</td>
			</tr>
	     </table> 
      </td>
	  <td align="left" valign="top">
 <table border="1">
 	<tr>
		<form name="Editinfo" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
 			<td><font color="#99FFCC"><h3>Index Number:</h3></font></td>
			<td><input type="text" size="20" name="live"/></td>
			<td><input type="submit" name="editInfoSerarch" value="Search"/></td>
		</form>
 	</tr>
 <?php
 
	if(isset($_POST[live])== TRUE)
	{
		$key = $_POST[live];
		getData($key);
	}
	else 
	if(isset($_POST[search])== TRUE)
	{
		$key = $_POST[search];
		getData($key);
	
	}
	
	function getData($key){
	require("config.php");
 	$query1 = "SELECT * FROM STUDENT WHERE StudentID = '". $key."'";
	$query2 = "SELECT Image_ID FROM images WHERE StudentID = '". $key."'";
	
               if ( !( $database = mysql_connect($dbhost, $dbuser, $dbpassword) ) )
                  die( "Could not connect to database" );
   
              // open db database
               if ( !mysql_select_db( "medicalcenterdb", $database ) )
                  die( "Could not open database" );
              // execute query in db database
               if ( !( $result1 = mysql_query( $query1, $database ) )  ) {
                  print( "Could not execute query1! <br />" );
                 die( mysql_error() );
                }
				$row = mysql_fetch_row($result1);
				
				if ( !( $result2 = mysql_query( $query2,$database ) )  ) {
                  print( "Could not execute query1! <br />" );
                 die( mysql_error() );
                }
				$row2 =mysql_fetch_row($result2);
				
				$imgId=$row2[0];
				
			
           			  
		  echo" <tr>
			      <td><font color='#99FFCC'><h3>Name    : </h3></font>
				  </td>
				  <td ><font color='#99FFCC'><h3><label>".$row[1]."</label></h3></font>
				  </td>
				  <td rowspan=".'2'." width=".'25%'." align=".'center'."height><img width=".'120'. "height=".'120'." src=Img_File.php?image_id=".$imgId."></td>
			   </tr>
			    <tr>
			      <td><font color='#99FFCC'><h3>StudentID: </h3></font>
				  </td>
				   <td ><font color='#99FFCC'><h3><label>".$row[0]."</label></h3></font>
				  </td>
				 
				  
			   </tr>
			    <tr>
			      <td><font color='#99FFCC'><h3> Date of Birth : </h3></font>
				  </td>
				  <td ><font color='#99FFCC'><h3><label>".$row[4]."</label></h3></font>
				  </td>
				  
			   </tr>
			    <tr>
			      <td><font color='#99FFCC'><h3> Gender: </h3></font>
				  </td>
				  <td ><font color='#99FFCC'><h3><label>".$row[5]."</label></h3></font>
				  </td>
			   </tr>
			    <tr>
			      <td><font color='#99FFCC'><h3> Faculty    : </h3></font>
				  </td>
				  <td ><font color='#99FFCC'><h3><label>".$row[7]."</label></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color='#99FFCC'><h3> Maritalstatus: </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><label>".$row[6]."</label></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color='#99FFCC'><h3> Religion: </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><label>".$row[8]."</label></h3></font>
				  </td>
			   </tr>
			   
			   <tr>
			      <td><font color='#99FFCC'><h3> Nationality: </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><label>".$row[9]."</label></h3></font>
				  </td>
			   </tr>
			   
			   
			   
			   
			   <tr>
			      <td><font color='#99FFCC'><h3>Current Address: </h3></font>
				  </td>
				  <td ><font color='#99FFCC'><h3><label>".$row[2]."</label></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color='#99FFCC'><h3>Permanent Address: </h3></font>
				  </td>
				  <td ><font color='#99FFCC'><h3><label>".$row[3]."</label></h3></font>
				  </td>
			   </tr>";
			   }
			   
			   ?>
			   
			   
			   
		</table>
	</td>
	</tr>
</table>
</body>
</html>
