<?php

if(!$connection){//test whether the connection has established 
print mysql_error();
die;
}
mysql_select_db("u904041662_unib11",$connection);//select uni database from mysql engine

?>

