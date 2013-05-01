<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "2")
{
	header('Location: index.php');
}

$user =$_SESSION['USERNAME'];

$con = mysql_connect("localhost","root","") or die(mysql_error()); 

mysql_select_db("medicalcenterdb",$con) or die(mysql_error()); 

	if($_GET[checkNum]){ 
	
		$q = mysql_query("select count(*) as nb from investigation_ok  where isSubmit = 1 AND RefDoctor='".$user."'") or die(mysql_error());
		$r = mysql_fetch_array($q);
		echo $r[nb];
	} else {
	
		$q = mysql_query("select * from investigation_ok where isSubmit = 1 AND RefDoctor='".$user."' order by TreatmentID limit 1") or die(mysql_error());
		$r = mysql_fetch_array($q);
		mysql_query("update investigation_ok set isSubmit = 2 where TreatmentID = $r[TreatmentID] AND RefDoctor='".$user."'");
		
echo "<a href ='showInvestigationResults.php?id=".$r[TreatmentID]."' target='iframe' >click </a>";
	}

?>
