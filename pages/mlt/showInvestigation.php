<?php
//Start session
session_start();

if($_SESSION['LoginStatus'] != "4")
{
	header('Location: index.php');
}


if($_GET['id']=='')
{



}
else
{
$tID=$_GET['id'];
$con = mysql_connect("localhost","root","");
mysql_select_db( "medicalcenterdb", $con );


//$sql1 = "SELECT * FROM treatment WHERE TreatmentID=".$tID;
$sql1 = "SELECT * FROM treatment WHERE TreatmentID=".$tID;
$result1 = mysql_query($sql1, $con);

$numrows = mysql_fetch_row($result1);



echo "<div id='close' style='float:right;' ><a href='background.php'>X</a></div><table border='0' align='center' width='100%'>
			 <tr>
			      <td>
				  	<font color='#000000' face='Tahoma' size='2'>StudentID   : </font>
				  </td>
				  <td>
				  	<font color='#000000' face='Tahoma' size='2'>".$numrows[5]." </font>
				  </td>
			<tr/>
			<tr>
				<td>
					<font color='#000000' face='Tahoma' size='2'>Added Date : </font>
				</td>
				<td>
				  	<font color='#000000' face='Tahoma' size='2'>".$numrows[1]." </font>
				</td>
			
			</tr>
			
			<tr>
				<td>
					<font color='#000000' face='Tahoma' size='2'>Treatment ID :  </font>
				</td>
				<td>
				  	<font color='#000000' face='Tahoma' size='2'>".$numrows[0]." </font>
				</td>
			
			</tr>	
			
			<tr>
				<td>
					<font color='#000000' face='Tahoma' size='2'>Investigation  : </font>
				</td>
				<td>
				  	<font color='#000000' face='Tahoma' size='2'>".$numrows[6]." </font>
				</td>
			
			</tr>
			
			 <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>Ref. Doctor   : </font>
				  </td>
				  <td><font color='#000000' face='Tahoma' size='2'>".$numrows[9]."</font>
				  </td>
				  </tr>		  
			</table>";
	

}
?>