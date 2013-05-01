<?php
session_start();
if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');
	
}

require("../../inc/config.php");

$Member = $_REQUEST['Member$'];
$Lstatus = $_REQUEST['Lstatus$'];
$age = $_REQUEST['age$'];
$remark =$_REQUEST['remark$'];
$fmhisID = $_REQUEST['fmhisID'];
$regNumber = $_REQUEST['regNumber'];



$con = mysql_connect($dbhost, $dbuser, $dbpassword) or die(mysql_error());

if(!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbdatabase, $con);

$query =" UPDATE familyhistory 
			SET Member= '".$Member."',
 			LStatus = '".$Lstatus."',
 			MAge = '".$age."',
 			MRemarks = '".$remark."' 
			WHERE FamilyHistoryID ='".$fmhisID."' AND StudentID='".$regNumber."'";


mysql_query($query,$con)or die(mysql_error());

mysql_close($con);




?>
	
