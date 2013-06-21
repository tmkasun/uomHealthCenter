<?php 
$connection = mysql_connect("127.0.0.1","root","kasun123");//Connecting to mysql server
if(!$connection){//test whether the connection has established 
print mysql_error();
die;
}
mysql_select_db("medicalcenterdb",$connection);//select uni database from mysql engine 





?>
