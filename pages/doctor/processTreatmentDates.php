<?php
session_start();
if($_SESSION['LoginStatus'] != "2")
{

header('Location:../../index.php');

}


$q=$_SESSION['PATIENT_ID'];

require("../../inc/config.php");
$con = mysql_connect($dbhost, $dbuser, $dbpassword);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("medicalcenterdb", $con);

$sql="SELECT TreatmentDate FROM treatment WHERE StudentID = '".$q."'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
  {
   print $row['TreatmentDate']."\n";
  }
  
mysql_close($con);

?> 