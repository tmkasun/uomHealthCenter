<?PHP

session_start();

if($_SESSION['LoginStatus'] != "5")
{

header('Location:../../index.php');

}

require("../../inc/config.php");
//echo "<PRE>";
//print_r($_POST);
//echo time();

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	
mysql_select_db($dbdatabase, $con);

/*
	$sql1 = "SELECT COUNT(Investigation_okId) from investigation_ok WHERE isSubmit=1 ";

*/
$sql1 = "SELECT COUNT(Investigation_okId) from investigation_ok WHERE isSubmit=1 AND RefDoctor='".$_SESSION['USERNAME']."'";

	$result1 = mysql_query($sql1, $con);
	
	
			
		while ($numrows1 = mysql_fetch_row($result1)){
			
			
			echo $numrows1[0];
			

		}
					

?> 