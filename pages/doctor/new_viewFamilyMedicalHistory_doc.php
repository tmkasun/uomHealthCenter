<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "2")
{
     header('Location: ../../index.php');

}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>View Family Medical History of <?php echo $_SESSION['PATIENT_ID']; ?>
</title>
<link href="../../css/style1.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style2 {
	color: #000000
}
-->
</style>
</head>

<body>

<div style="position: relative;width: 50%;float: left;margin-left: 20%;">
     <table border="0" width="100%" style="background: rgba(100, 200, 255, 0.3);border-radius:30px;margin: 5%;">

          <tr>
               <td><?php

               $regNo=$_SESSION['PATIENT_ID'];
               echo "	<div id=reg>
	 		<font color='#000000' face='Tahoma' size='3'>Registration Number:".$regNo."
			</font>
	 
	 		</div>";


               echo "<table border='1' width='100%' cellspacing='0' cellpadding='0'>
	  			<tr>
					<td align='center' width='15%'><font color='#000000' face='Tahoma' size='3'>Member</font></td>
					<td align='center' width='10%'><font color='#000000' face='Tahoma' size='3'>Live/Dead</font></td>
					<td align='center' width='10%'><font color='#000000' face='Tahoma' size='3'>Age</font></td>
					<td align='center' width='65%'><font color='#000000' face='Tahoma' size='3'>Remarks</font></td>
				</tr>
				
			
	  
	  ";



               $regNu=$_SESSION['PATIENT_ID'];


               require("../../inc/config.php");

               $query1 = "SELECT *
					FROM familyhistory WHERE StudentID ='".$regNu."'
						";

               $con=mysql_connect($dbhost, $dbuser, $dbpassword);

               if (!$con)
               {
                    die('Could not connect: ' . mysql_error());
               }
               mysql_select_db($dbdatabase, $con);
               $result = mysql_query($query1,$con);

               while($row = mysql_fetch_array($result))
               {
                     
                    echo "</br> <tr>
                    
					<td><font color='#000000' face='Tahoma' size='3'>".$row['Member']."</font></td>
					<td><font color='#000000' face='Tahoma' size='3'>".$row['LStatus']."</font></td>
					<td><font color='#000000' face='Tahoma' size='3'>".$row['MAge']."</font></td>
					<td><font color='#000000' face='Tahoma' size='3'>".$row['MRemarks']."</font></td>
					</tr>";
               }

               echo "</table>";
               mysql_close($con);
                
                
                
               ?></td>

          </tr>






     </table>
</div>

</body>
</html>
