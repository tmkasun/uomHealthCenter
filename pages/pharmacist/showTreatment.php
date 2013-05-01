<?php
//Start session
session_start();

if($_SESSION['LoginStatus'] != "3")
{
	header('Location: index.php');
}


if($_GET['id']=='')
{

 

}
else
{
$tID=$_GET['id'];
$con = mysql_connect("localhost","root","kasun123");
mysql_select_db( "medicalcenterdb", $con );


//$sql1 = "SELECT * FROM treatment WHERE TreatmentID=".$tID;
$treatment_Sql = "SELECT * FROM treatment WHERE TreatmentID=".$tID;
$treatment_result = mysql_query($treatment_Sql, $con);

$fetched_result = mysql_fetch_assoc($treatment_result);

//print_r($fetched_result);

/*

echo "<div id='close' style='float:right;' ><a href='background.php'>X</a></div><table border='0' align='center' width='100%'>
				 <tr>
			      <td width='20%'><font color='#000000' face='Tahoma' size='2'>StudentID   : </font>
				  </td>
				  <td width='80%'><font color='#000000' face='Tahoma' size='2'>".$numrows[5]."</font>
				  </td>
				  </tr>
				  
				  <tr>
				  <td ><font color='#000000' face='Tahoma' size='2'>TreatmentDate</font>
				  </td>
				  <td><font color='#000000' face='Tahoma' size='2'>".$numrows[1]."</font>
				  </td>
			   </tr>
			    <tr>
			      <td width='20%'><font color='#000000' face='Tahoma' size='2'>Ref. Doctor   : </font>
				  </td>
				  <td width='80%'><font color='#000000' face='Tahoma' size='2'>".$numrows[9]."</font>
				  </td>
				  </tr>
			   
			    <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>Treatment</font>
				  </td>
				  <td rowspan='4' ><font color='#000000' face='Tahoma' size='2'>".$numrows[4]."</font>
				  </td>
				  </tr></table>";
*/

}
?>

