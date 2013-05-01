<?php
session_start();
if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');
	
}


if(isset($_POST['update']))
{

	$indexNo= $_POST['indexNo'];
	$fullName = $_POST['fullName'];
	$currentAdd = $_POST['currentAdd'];
	$permenentAdd = $_POST['permenentAdd'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$mstatus=$_POST['mstatus'];
	$faculty=$_POST['faculty'];
	$religion=$_POST['religion'];
	$nationality=$_POST['nationality'];
	require("../../inc/config.php");
	
	
	$query1 = "INSERT INTO student (StudentID,FullName,CurrentAdd,PermAdd,DOB,Gender,Maritalstatus,Faculty,	Religion,Nationality) VALUES('".$indexNo."','". $fullName ."','". $currentAdd ."','". $permenentAdd  ."','". $dob ."','". $gender ."','".$mstatus ."','". $faculty."','". $religion ."','". $nationality ."')";

   $con= mysql_connect($dbhost, $dbuser, $dbpassword);
   
   if(!$con)
   {
   	 die( "Could not connect to database" );
   
   }
   mysql_select_db($dbdatabase,$con);
   
   
   if (!mysql_query($query1,$con))
  {
  header('Location: '.$config_basedir.'/pages/admin/personalData.php?msg=error');
  }
  
  $numrows=mysql_affected_rows();
  if($numrows == 1){
  
  
  header('Location: '.$config_basedir.'/pages/admin/personalData.php?msg=success');

  }
  else
  {
  header('Location: '.$config_basedir.'/pages/admin/personalData.php?msg=error1');
  
  }
	
	mysql_close($con);
   
 
   
	
}

?>
		




