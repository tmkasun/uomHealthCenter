<?php session_start();

require("config.php");

//session_unset($_SESSION['LoginStatus']);

session_destroy();
setcookie("UserID","",time()-3600);
header("Location:$config_basedir/index.php");


/*
if (isset($_COOKIE[session_name()])) {

header("Location:$config_basedir?logout=message");



}
else
{
echo "Not deleted";

}

*/

?>

