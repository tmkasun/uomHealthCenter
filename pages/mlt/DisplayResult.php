<?php

$reportId=$_GET['p'];
$tretmentid=$_GET['q'];
require("../../inc/config.php");

$sql1="SELECT tests.testsName FROM tests WHERE testsId='".$reportId."' ";



$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	die('Could not connect: ' . mysql_error());
		
}

mysql_select_db($dbdatabase, $con);
$result1 = mysql_query($sql1,$con);
if(!$result1)
{
die("Error: ".mysql_error());
}
$row1=mysql_fetch_array($result1);

$investigation_Name = $row1['testsName']; 


//echo "$investigation_Name".$investigation_Name;



$sql2="SELECT student.Gender,investigation_ok.TreatmentID,treatment.TreatmentDate,treatment.RefDoctor, investigation_ok.investigation_okId,tests.Specimen,investigation_ok.StudentID FROM treatment,student,investigation_ok,tests WHERE investigation_ok.	TreatmentID='".$tretmentid."' AND investigation_ok.investigationName='".$investigation_Name."'  AND investigation_ok.isSubmit=0 AND investigation_ok.	TreatmentID=treatment.TreatmentID AND tests.testsName='".$investigation_Name."'";



$result2 = mysql_query($sql2,$con);
if(!$result2)
{
die("Error: ".mysql_error());
}
$row2=mysql_fetch_array($result2);

echo "
		<tr>
			<td width='29%'><font color='#000000' face='Tahoma' size='2'>Registration Number:</font> </td>
			<td width='20%'><input type='text' name='regId' value='".$row2['StudentID']."'/></td>
			<td width='20%'><font color='#000000' face='Tahoma' size='2'>Received On:</font> </td>
			<td width='29%'><input type='text' name='treatmentDate' value='".$row2['TreatmentDate']."'/></td>
		</tr>
		<tr>
			<td width='29%'><font color='#000000' face='Tahoma' size='2'>Sex:</font> </td>
			<td width='20%'><input type='text' name='gender' value='".$row2['Gender']."'/></td>
			<td width='20%'><font color='#000000' face='Tahoma' size='2'>Reference Doctor:</font> </td>
			<td width='29%'><input type='text' name='refDoctor' value='".$row2['RefDoctor']."'/></td>
		</tr>
		<tr>
			<td width='29%'><font color='#000000' face='Tahoma' size='2'>Investigation Id</font> </td>
			<td width='20%'><input type='text' name='investigationId' value='".$row2['Investigation_okId']."'/></td>
			<td width='20%'><font color='#000000' face='Tahoma' size='2'>Specimen</font> </td>
			<td width='29%'><input type='text' name='specimen' value='".$row2['Specimen']."'/></td>
		</tr>
		
";



								
?>	










