<?php
//Start session
session_start();

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Details</title>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript">

$(function() {

$(".editbutton").click(function() {

	var stName = $("#stName").val();
	var stId = $("#stId").val();
	var sDob = $("#sDob").val();
	var gender = $("#gender").val();
	var stFaculty = $("#stFaculty").val();
	var mStatus = $("#mStatus").val();
	var currAdd=$("#currAdd").val();
	var permAdd=$("#permAdd").val();
	var nationality=$("#nationality").val();
	var religion=$("#religion").val();
	
    var dataString = 'stName='+ stName + '&stId=' + stId + '&sDob=' + sDob + '&gender=' + gender + '&stFaculty=' + stFaculty + '&mStatus=' + mStatus + '&currAdd=' + currAdd + '&permAdd=' + permAdd + '&nationality=' + nationality + '&religion=' + religion ;
	
	
	if(stName=='' || stId==''|| sDob==''|| gender==''|| stFaculty==''|| mStatus==''|| currAdd==''|| permAdd==''|| nationality==''|| religion=='')
	{
	$('.success').fadeOut(200).hide();

    $('.error').fadeOut(200).show();
	
	}
	
	else
	{
	
	$.ajax({
	type: "POST",
    url: "UpdateDb.php",
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
		
		<form name="searchinfo" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
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
				
		
           			  
		  echo"<form autocomplete='off' enctype='multipart/form-data' method='post' name='searchinfo'> 
		  		<tr>
			      <td ><font color=".'#99FFCC'."><h3>Name    : </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><textarea cols='30' rows='2' name='stName' id='stName'>".$row[1]."</textarea></h3></font>
				  </td>
				  <td rowspan=".'2'." width=".'25%'." align=".'center'."height><img width=".'120'. "height=".'120'." src=Img_File.php?image_id=".$imgId."></td>
			   </tr>
			    <tr>
			      <td><font color=".'#99FFCC'."><h3>StudentID: </h3></font>
				  </td>
				   <td ><font color=".'#99FFCC'."><h3><input type='text' size='20' name='stId' id='stId'  value='".$row[0]."'/></h3></font>
				  </td>
				 
				  
			   </tr>
			    <tr>
			      <td><font color=".'#99FFCC'."><h3> Date of Birth : </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><input type='text' size='20' name='sDob' id='sDob' value='".$row[4]."'/></h3></font>
				  </td>
				  
			   </tr>
			    <tr>
			      <td><font color=".'#99FFCC'."><h3> Gender: </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><input type='text' size='20' name='gender' id='gender' value='".$row[5]."'/></h3></font>
				  </td>
			   </tr>
			    <tr>
			      <td><font color=".'#99FFCC'."><h3> Faculty    : </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><input type='text' size='20' name='stFaculty' id='stFaculty' value='".$row[7]."'/></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color=".'#99FFCC'."><h3> Maritalstatus: </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><input type='text' size='20' name='mStatus' id='mStatus' value='".$row[6]."'/></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color='#99FFCC'><h3> Religion: </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><input type='text' size='20' name='religion' id='religion' value='".$row[8]."'/></h3></font>
				  </td>
			   </tr>
			   
			   <tr>
			      <td><font color='#99FFCC'><h3> Nationality: </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><input type='text' size='20' name='nationality' id='nationality' value='".$row[9]."'/></h3></font>
				  </td>
			   </tr>
			   
			   
			   
			   <tr>
			      <td><font color=".'#99FFCC'."><h3>Current Address: </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><textarea cols='30' name='currAdd' id='currAdd' rows='3'>".$row[2]."</textarea></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color=".'#99FFCC'."><h3>Permanent Address: </h3></font>
				  </td>
				  <td ><font color=".'#99FFCC'."><h3><textarea name='permAdd' id='permAdd' cols='30' rows='3'>".$row[3]."</textarea></h3></font>
				  </td>
				  <td align='center'>
				<div id='main' style='height:80px;'>  
				<div id='button' style='height:30px;'>
				  <input type='submit' name='editbutton' id='editbutton' value=' Edit' class='editbutton' />
				</div>
				<div id='message' style='height:50px;'>
				  	<span class='error' style='display:none'> Please Enter Valid Data</span>
					<span class='success' style='display:none'> Successfully Updated..</span>
				</div>
				</div>	
				  </td>
			   </tr></form>";
			
			   }
			   
			   ?>
			   
			   
			   
		</table>
	</td>
	</tr>
</table>





</body>
</html>
