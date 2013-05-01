<?php 

session_start();

if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');
	
}


require("../../inc/config.php");

if (isset($_POST['changePasswordButton'])) { 

$username = $_POST['username'];
$password1 = $_POST['oldpassword'];
$newpassword1 = $_POST['newpassword'];
$accountType =$_POST['accountType'];
$confirmnewpassword1 = $_POST['renewpassword'];
$password=md5($password1);
$newpassword=md5($newpassword1 );
$confirmnewpassword=md5($confirmnewpassword1);

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	die('Could not connect: ' . mysql_error());
		
}

mysql_select_db($dbdatabase, $con);

$result = mysql_query("SELECT Password FROM user WHERE UserID='$username'");

if(!$result) 
{ 
//$value="The username you entered does not exist";
$value=1; 
header('Location:'.$config_basedir.'/pages/admin/accountSettings.php?success='.$value.'');


} 
else 
if($password!= mysql_result($result, 0)) 
{ 
//$value="You entered an incorrect password"; 
$value=2;
header('Location:'.$config_basedir.'/pages/admin/accountSettings.php?success='.$value.'');


} 
if($newpassword==$confirmnewpassword) 
    $sql=mysql_query("UPDATE user SET Password='$newpassword',AccountType='$accountType' where UserID='$username'"); 
    if($sql) 
    { 
   // $value="Congratulations You have successfully changed your password"; 
	$value=3;
	header('Location:'.$config_basedir.'/pages/admin/accountSettings.php?success='.$value.'');

    }
else
{ 
//$value="The new password and confirm new password fields must be the same"; 
$value=4;
header('Location:'.$config_basedir.'/pages/admin/accountSettings.php?success='.$value.'');

}

}

  
?> 