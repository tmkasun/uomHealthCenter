<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');
	
}

if (isset($_POST['createAccountButton'])) { 

require("../../inc/config.php");
 

$username = $_POST['username'];
$password1 = $_POST['accountpassword'];
$displayName = $_POST['accountName'];
$confirmnewpassword1 = $_POST['reaccountpassword'];
$accountType =$_POST['accountType'];
$password=md5($password1);
$confirmnewpassword=md5($confirmnewpassword1);

$loginstatus=-1;

if($accountType == "Administrator")
{

$loginstatus=1;

}
else if($accountType == "Doctor")
{
$loginstatus=2;

}
else if($accountType == "Pharmacist")
{
$loginstatus=3;

}
else if($accountType == "MLT")
{

$loginstatus=4;
}
else if($accountType == "Dental")
{

$loginstatus=5;
}


if($confirmnewpassword == $password )
{

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	die('Could not connect: ' . mysql_error());
		
}

mysql_select_db($dbdatabase, $con);

//$result = mysql_query("SELECT Password FROM user WHERE UserID='$username'");
$sql="INSERT INTO user VALUES('".$username."','".$password."','".$displayName."','".$loginstatus."','".$accountType ."')";

$result = mysql_query($sql,$con);
$affected_rows=mysql_affected_rows();


if($affected_rows==1) 
{ 
//$value="A new Account is successfully Created"; 
$value=1;
header('Location:'.$config_basedir.'/pages/admin/createAccount.php?success='.$value.'');


} 
else 
{ 
//$value="Error Occured, Try Again"; 
$value=2;
header('Location:'.$config_basedir.'/pages/admin/createAccount.php?success='.$value.'');

} 

}
else
{

//$value="password and retype password are not matched, Try again"; 
$value=3;
header('Location:'.$config_basedir.'/pages/admin/createAccount.php?success='.$value.'');

}



}




?>