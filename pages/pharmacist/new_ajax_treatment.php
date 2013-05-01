<?php session_start();
/*
if($_SESSION['LoginStatus'] != "3")
{
	header('Location: index.php');
}
*/
require '../../inc/config.php';

$treatment_retrive_sql = "select * from treatment where treatmentstatus != 1 order by TreatmentID DESC";

$treatment_object = mysql_query($treatment_retrive_sql,$connection);
error_reporting(E_PARSE);

while($treatments = mysql_fetch_assoc($treatment_object)){

	$result_array[] =$treatments; //array("TreatmentID"=>,"TreatmentDate"=>,"Complaint"=>,"Diagnosis"=>,"Treatment_info"=>,"StudentID"=>,"Investigation"=>,"TreatmentStatus"=>,"RefDoctor"=>,"InvestigationStatus"=>);
	
}
echo json_encode($result_array);



?>