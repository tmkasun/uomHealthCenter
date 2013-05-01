<?php
$connection = mysql_connect("mysql.1freehosting.com","u904041662_b11","kasun123");//Connecting to mysql server

if(!$connection){//test whether the connection has established 
print mysql_error();
die;
}
mysql_select_db("u904041662_unib11",$connection);//select uni database from mysql engine

?>

