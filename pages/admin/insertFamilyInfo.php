<?php

session_start();
if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');
	
}

if (isset($_POST['familyInfosub'])) {



$numMembers=$_POST['fNumber'];


$regId=$_POST['regID'];


require("../../inc/config.php");

$con = mysql_connect($dbhost, $dbuser, $dbpassword);

  
   
   if(!$con)
   {
	header('Location: '.$config_basedir.'/pages/admin/familyMedicalHistory.php?msg=error');   
   }
   
   mysql_select_db($dbdatabase,$con);
   
   
	for($i=0;$i<$numMembers;$i++)
	{
	               
		$result=mysql_query("INSERT INTO 	  familyhistory(StudentID,Member,LStatus,MAge,MRemarks,FamilyHistoryID)
VALUES('".$regId."','".$_POST["Member$".$i .""]."','".$_POST["Lstatus$".$i .""]."','".$_POST["age$".$i. ""]."','".$_POST["remark$".$i. ""]."','')");			  
	}
	
	$numrows=mysql_affected_rows();
	
    
  if($numrows >0){
  
  
  header('Location: '.$config_basedir.'/pages/admin/familyMedicalHistory.php?msg=success');

  }
  else
  {
  header('Location: '.$config_basedir.'/pages/admin/familyMedicalHistory.php?msg=error1');
  
  }
	
	mysql_close($con);
   
 
   
}	

?>

