<?php session_start();
/*
 if($_SESSION['LoginStatus'] != "3")
 {
 header('Location: index.php');
 }
 */
require '../../inc/config.php';
$request_type = $_POST["requestType"];
$method = $_POST["method"];
$data = mysql_real_escape_string($_POST["data"]);
$currentInputValue = $_POST["currentInputValue"]; //only used in search to use with mysql like keyword

switch ($method) {
	case "search":
		$search_sql = "select * from ".$request_type." where ".$request_type." like '%".$currentInputValue."%'";
		//die($retrive_sql);
		$information_object = mysql_query($search_sql,$connection);
		error_reporting(E_PARSE);
		
		while($data = mysql_fetch_assoc($information_object )){
		
			$result_array[] =$data; //array("TreatmentID"=>,"TreatmentDate"=>,"Complaint"=>,"Diagnosis"=>,"Treatment_info"=>,"StudentID"=>,"Investigation"=>,"TreatmentStatus"=>,"RefDoctor"=>,"InvestigationStatus"=>);
		
		}
		echo json_encode($result_array);
		
		
		break;
		
     case "retrive":
           
          $retrive_sql = "select * from ".$request_type;

          $information_object = mysql_query($retrive_sql,$connection);
          error_reporting(E_PARSE);

          while($data = mysql_fetch_assoc($information_object )){

               $result_array[] =$data; //array("TreatmentID"=>,"TreatmentDate"=>,"Complaint"=>,"Diagnosis"=>,"Treatment_info"=>,"StudentID"=>,"Investigation"=>,"TreatmentStatus"=>,"RefDoctor"=>,"InvestigationStatus"=>);

          }
          echo json_encode($result_array);


          break;
           
     case "delete":
          $retrive_sql = "delete from $request_type where $request_type = '$data' ";
          print $retrive_sql;
          $information_object = mysql_query($retrive_sql,$connection);
          error_reporting(E_PARSE);

          break;

     case "insert":
     	
          $retrive_sql = "insert into $request_type values('$data')";
          print $retrive_sql;
          $information_object = mysql_query($retrive_sql,$connection);
          error_reporting(E_PARSE);

          break;
           
}


?>