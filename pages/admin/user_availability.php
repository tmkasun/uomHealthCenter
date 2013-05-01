<?php
/*
$existing_users=array('roshan','mike','jason'); 
$user_name=$_POST['user_name'];
if (in_array($user_name, $existing_users))
{
	echo "no";
} 
else
{
	echo "yes";
}

*/


$user_name=$_POST['user_name'];
//$user_name="admin";

require("../../inc/config.php");

/*
$sql= "SELECT COUNT( UserID )
FROM user
WHERE user.UserID = 'admin' ";
*/

$sql= "SELECT COUNT( UserID )
FROM user
WHERE user.UserID = '".$user_name."'";




$con=mysql_connect($dbhost, $dbuser, $dbpassword);
		
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		mysql_select_db($dbdatabase, $con);
		$result = mysql_query($sql,$con);
		
		
		$row2 =mysql_fetch_row($result);
		
		$value=$row2[0];
		
		if ($value==1)
		{
			echo "no";
		} 
		else if($value==0)
		{
			echo "yes";
		}
		
	
		
		
		
		mysql_close($con);







?>