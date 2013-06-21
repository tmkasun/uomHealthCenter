<?php
session_start();


if($_SESSION['LoginStatus'] != "2")
{

	header('Location:../../index.php');

}

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "kasun123");
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
	$res = @mysql_query("SELECT time_stamp FROM treatment WHERE StudentID = '$num' ORDER BY TreatmentID DESC", $link);
	if(!$res)
		die("Error: ".mysql_error());
	else
		return $res;
}

//$_POST['_regNo'],$_POST["diagnoses"],$_POST["complaints"],$_POST["treatments"],$_POST["otherNotes"],$_POST['_refDoctor'],$_POST["otherNotes"],$link

function insertMessage($regNo,$diagnoses,$complaints,$treatments,$otherNotes,$refDoctor,$otherNotes,$link){// #new add new argument $link
	//need to add try catch block to reduse errors
	/*
	try {

	} catch (Exception $e) {
	}
	*/
	//this time stamp is the key in each complaint treatment details and diagnosis databases
	$timeStamp = date("Y-m-d H:i:s");


	$insertTreatmentsQuery = "insert into STUDENT_TREATMENTS(time_stamp,drug,frequency,dosage,ac_pc) values ";

	$otherNotes = mysql_real_escape_string($otherNotes);
	$refDoctor = mysql_real_escape_string($refDoctor);
	
	$insertTreatmentDetailsQuery = "INSERT INTO treatment(time_stamp,StudentID,TreatmentStatus,other_notes,RefDoctor) VALUES ('$timeStamp','$regNo',0,'$otherNotes','$refDoctor')";

	$insertComplainsQuery = "insert into STUDENT_COMPLAINTS values ";

	$insertDiagnosesQuery = "insert into STUDENT_DIAGNOSES values ";

	foreach (json_decode($treatments) as $treatment) {
		//print $treatment[0].">>>".$treatment[1].">>>".$treatment[0].">>>".$treatment[0].">>>";
		$treatment[0]= mysql_real_escape_string($treatment[0]);
		$treatment[1]= mysql_real_escape_string($treatment[1]);
		$treatment[2]= mysql_real_escape_string($treatment[2]);
		$treatment[3]= mysql_real_escape_string($treatment[3]);
		
		$insertTreatmentsQuery .= "('$timeStamp','$treatment[0]','$treatment[2]','$treatment[1]','$treatment[3]'),";

	}


	foreach (json_decode($complaints) as $complaint) {
		$tempMysqlInjectionAvoidance = mysql_real_escape_string($complaint);
		$insertComplainsQuery .="('$tempMysqlInjectionAvoidance','$timeStamp'),";

	}

	foreach (json_decode($diagnoses) as $diagnose) {
		$tempMysqlInjectionAvoidance = mysql_real_escape_string($diagnose);
		$insertDiagnosesQuery .="('$tempMysqlInjectionAvoidance','$timeStamp'),";

	}


	$res = @mysql_query(rtrim($insertComplainsQuery,","),$link); //remove last "," from the SQL
	$res = @mysql_query(rtrim($insertDiagnosesQuery,","),$link); //remove last "," from the SQL
	$res = @mysql_query(rtrim($insertTreatmentsQuery,","),$link); //remove last "," from the SQL

	$res = @mysql_query($insertTreatmentDetailsQuery ,$link);



	//return rtrim($insertComplainsQuery,",");
	//$query = 'INSERT INTO treatment (Complaint,Diagnosis,Treatment_info,,Investigation,,InvestigationStatus,) VALUES("'.$cur_auto_id.'","'.$currentDate.'","'. $textarea2 .'","'. $textarea3  .'","'. $treatment .'","'. $regNo .'","'.$investigation .'","","'.$_investigationStatus.'","'.$refDoctor.'")';
	if(!$res)
		die("Error: ".mysql_error());
	else
		return $res;

	//need to impliment this investigation part in separate php
	/*
	if($investigation == "None"){
	$_investigationStatus=1;
	}else
	{
	$_investigationStatus=0;


	$query1= "INSERT INTO investigation_ok
	(StudentID,Investigation_okId,InvestigationName,isSubmit,TreatmentID,RefDoctor)
	VALUES('".$regNo."','','".$investigation."','','".$cur_auto_id."','".$_SESSION['USERNAME']."')";


	$sql1=mysql_query("SELECT MAX(TreatmentID) FROM treatment",$link);
	$result0 = mysql_fetch_array($sql1);
	$cur_auto_id = $result0['MAX(TreatmentID)'] + 1;



	$result=mysql_query($query1,$link);
	if(!$result)
		die("Error: ".mysql_error());

	}
	*/

}

/******************************
 MANAGE REQUESTS
/******************************/

//print "Values Recived"."number".$num."post>>".$_POST['action'];

if(!$_POST['action']){
	//We are redirecting people to our shoutbox page if they try to enter in our shoutbox.php
	header ("Location: Doctor.php");
	echo "error";
}
else{
	
	$link = connect(HOST, USER, PASSWORD);

	switch($_POST['action']){
		case "update":
			$res = getContent($link, $num);
			$treatment_loop_count = 0;
			while($row = mysql_fetch_array($res)){
				//$result .= "<font color='#000000' face='Tahoma' size='1'><li>".$row['StudentID']."<img src=\"../../images/bullet.gif\" alt=\"-\" />".$row['time_stamp']."</li></font>";
				?>
<font id="<?php print $row["time_stamp"]?>"
	onclick='preTreatmentDetails(this)'><img src="../../images/bullet.gif"
	alt="-" /> 
	<!-- Use  strtotime to display only year month date -->
	<?php print date("Y-d-m",strtotime($row['time_stamp']));?><br /> </font>
<?php
$treatment_loop_count +=1;
			}
			if($treatment_loop_count ==0)
				print "No previous treatment records Found";
			//echo $result;
			break;
case "insert":
	//$regNo,$refDoctor,$link
	echo insertMessage($_POST['_regNo'],$_POST["diagnoses"],$_POST["complaints"],$_POST["treatments"],$_POST["otherNotes"],$_POST['_refDoctor'],$_POST["otherNotes"],$link);
	break;
	}
	mysql_close($link);
}

?>
