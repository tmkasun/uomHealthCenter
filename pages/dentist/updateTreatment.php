<?php
session_start();

if($_SESSION['LoginStatus'] != "5")
{

header('Location:../../index.php');

}

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "medicalcenterdb");

$currentDate =date("Y m d ");;
$num =$_SESSION['PATIENT_ID'];

function connect($db, $user, $password){
	$link = @mysql_connect($db, $user, $password);
	if (!$link)
	    die("Could not connect: ".mysql_error());
	else{
		$db = mysql_select_db(DB);
		if(!$db)
			die("Could not select database: ".mysql_error());
		else return $link;
	}
}
function getContent($link, $num){
	$res = @mysql_query("SELECT TreatmentDate,StudentID FROM treatment WHERE StudentID = '".$num."' AND RefDoctor= '".$_SESSION['USERNAME']."'", $link);
	if(!$res)
		die("Error: ".mysql_error());
	else
		return $res;
}
function insertMessage($currentDate,$textarea2,$textarea3,$investigation,$regNo,$textarea5,$refDoctor){
if($investigation == "None"){
$_investigationStatus=1;
}else
{
$_investigationStatus=0;

$sql1=mysql_query("SELECT MAX(TreatmentID) FROM `treatment`");
$result0 = mysql_fetch_array($sql1);
$cur_auto_id = $result0['MAX(TreatmentID)'] + 1;
 



$query1= "INSERT INTO Investigation_ok 
(StudentID,Investigation_okId,InvestigationName,isSubmit,TreatmentID,RefDoctor)
VALUES('".$regNo."','','".$investigation."','','".$cur_auto_id."','".$refDoctor."')";

$result=mysql_query($query1);
if(!$result)
	die("Error: ".mysql_error());

}

$treatment = "<pre>";

$treatment .= $textarea5;

$treatment .= "</pre>";


$query = "INSERT INTO treatment (TreatmentID,TreatmentDate,Complaint,Diagnosis,Treatment_info,StudentID,Investigation,TreatmentStatus,InvestigationStatus,RefDoctor) VALUES('".$cur_auto_id."','".$currentDate."','". $textarea2 ."','". $textarea3  ."','". $treatment ."','". $regNo ."','".$investigation ."','','".$_investigationStatus."','".$refDoctor."')";


	
$res = @mysql_query($query);

if(!$res)
	die("Error: ".mysql_error());
else
	return $res;
}

/******************************
	MANAGE REQUESTS
/******************************/
if(!$_POST['action']){
	//We are redirecting people to our shoutbox page if they try to enter in our shoutbox.php
	header ("Location: dentist.php"); 
	echo "error";
}
else{

	$link = connect(HOST, USER, PASSWORD);
	
	switch($_POST['action']){
		case "update":
			$res = getContent($link, $num);
			while($row = mysql_fetch_array($res)){
				$result .= "<font color='#000000' face='Tahoma' size='1'><li>".$row['StudentID']."<img src=\"../../images/bullet.gif\" alt=\"-\" />".$row['TreatmentDate']."</li></font>";
			}
			
			echo $result;
			break;
		case "insert":
			echo insertMessage($currentDate,$_POST['_textarea2'],$_POST['_textarea3'],$_POST['_investigation'],$_POST['_regNo'],$_POST['_textarea5'],$_POST['_refDoctor']);
			break;
	}
	mysql_close($link);
}

?>
