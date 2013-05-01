<?php
session_start();


if($_SESSION['LoginStatus'] != "2")
{

header('Location:../../index.php');

}

require '../../inc/config.php';
$studentID=$_SESSION['PATIENT_ID'];
$TreatmentID = $_POST["TreatmentID"];
$result = mysql_query("SELECT * FROM treatment WHERE TreatmentID = '$TreatmentID'", $connection);
?>
<div style="position: relative;margin-left: auto;margin-right: auto; width: 90%;overflow: auto;height: 400px;">
<br/>
<?php 
while($treatmentDetails = mysql_fetch_assoc($result)){
     foreach ($treatmentDetails as $key => $value) {
          
          print $key.":<a style='font-style: oblique;font-size: large;color: blue;'>".$value."<a/><br/>";
          
     }
}	
?>
</div>
<?php 
?>