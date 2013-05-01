<?php

require '../../inc/config.php';

$update_sql = "update treatment set TreatmentStatus = 1 where TreatmentID  = '$_POST[TreatmentID]'";
 
mysql_query($update_sql,$connection);
error_reporting(E_PARSE);



?>