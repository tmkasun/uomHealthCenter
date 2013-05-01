<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "3")
{
	header('Location: index.php');
}



$con = mysql_connect("localhost","root","kasun123") or die(mysql_error()); // connect to the db
mysql_select_db("medicalcenterdb",$con) or die(mysql_error()); // selects the right db
	if($_GET[checkNum]){ // if your load with ?checkNum=1 you just want to check if there is anything new (this is for optimization)
		$q = mysql_query("select count(*) as nb from treatment where TreatmentStatus = 0") or die(mysql_error());
		$r = mysql_fetch_array($q);
		echo $r[nb];
	} else { // otherwhise you want to load the info about the newest notification to display and set the status to 1 so it wont be displayed again
		$q = mysql_query("select * from treatment where TreatmentStatus = 0 order by TreatmentID limit 1") or die(mysql_error());
		$r = mysql_fetch_array($q);
		mysql_query("update treatment set TreatmentStatus = 1 where TreatmentID = $r[TreatmentID]");
		//echo $r[Treatment_info];
		//echo "<br/><a href='showTreatment.php?id=".$r[TreatmentID]."'>New Treatment Added</a> ";
		 
		//echo "<a href='pharmacist_page.php' onclick='loadiframe('iframe','showTreatment.php?id=1'; return false;> click it</a>";
		echo "<a href ='showTreatment.php?id=".$r[TreatmentID]."' target='iframe' >click </a>";
	}
?>
