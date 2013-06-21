<?php
session_start();


if($_SESSION['LoginStatus'] != "3")
{

	header('Location:../../index.php');

}
?>
<html>
<head>
<title></title>
</head>
<body>
	<?php 

	require '../../inc/config.php';

	$studentID=$_POST["studentID"];
	$timeStamp = $_POST["timeStamp"];



	$fetchComplaintsSQL = "select * from STUDENT_COMPLAINTS where time_stamp = '$timeStamp'";
	$fetchDiagnosesSQL = "select * from STUDENT_DIAGNOSES where time_stamp = '$timeStamp'";
	$fetchTreatmentsSQL = "select * from STUDENT_TREATMENTS where time_stamp = '$timeStamp'";
	$fetchTreatmentDetailsSQL = "select other_notes,TreatmentStatus,RefDoctor,TreatmentID from treatment where time_stamp = '$timeStamp' and studentID = '$studentID'";

	$resultComplaintsSQL = @mysql_query($fetchComplaintsSQL, $connection);
	$resultDiagnosesSQL = @mysql_query($fetchDiagnosesSQL, $connection);
	$resultTreatmentsSQL = @mysql_query($fetchTreatmentsSQL, $connection);
	$resultTreatmentDetailsSQL = @mysql_query($fetchTreatmentDetailsSQL, $connection);

	?>
	<table style="width: 100%; height: auto;">
		<tbody>
			<tr>
				<th>Complaints</th>

				<th>Diagnoses</th>

			</tr>
			<tr>
				<!-- _________________________________________  Fill Complaints Column ________________________________________________ -->
				<td>
					<ul>

						<?php 
						while($result = mysql_fetch_assoc($resultComplaintsSQL)){
					?>
						<li><?php print $result["complaint"] ?>
						</li>

						<?php 
				}
				?>
					</ul>
				</td>
				<!-- _________________________________________  Fill Complaints Column End ________________________________________________ -->

				<!-- _________________________________________  Fill Diagnoses Column ________________________________________________ -->
				<td>
					<ul>

						<?php 
						while($result = mysql_fetch_assoc($resultDiagnosesSQL)){
					?>
						<li><?php print $result["diagnosis"] ?>
						</li>

						<?php 
				}
				?>
					</ul>
				</td>
				<!-- _________________________________________  Fill Diagnoses Column End ________________________________________________ -->

			</tr>

			<tr style="background-color: aqua;">
				<th colspan="4">Treatments</th>

			</tr>
			<tr>
				<!-- _________________________________________  Fill Treatment Details  Section ________________________________________________ -->
				<?php 
				$treatmentDetailsArray = array("drug"=>array(),"dosage"=>array(),"frequency"=>array(),"ac_pc"=>array());
				while($result = mysql_fetch_assoc($resultTreatmentsSQL)){
array_push($treatmentDetailsArray["drug"], $result["drug"]);
array_push($treatmentDetailsArray["dosage"], $result["dosage"]);
array_push($treatmentDetailsArray["frequency"], $result["frequency"]);
array_push($treatmentDetailsArray["ac_pc"], $result["ac_pc"]);
}
?>
				<td>
					<!-- Fill Druges Column --> Drugs
					<ul>

						<?php 
						foreach ($treatmentDetailsArray["drug"] as $value) {

					?>
						<li><?php print $value ?>
						</li>

						<?php 
				}
				?>
					</ul> <!-- Fill Druges Column End -->
				</td>

				<td>
					<!-- Fill Druges Column --> Dosage
					<ul>

						<?php 
						foreach ($treatmentDetailsArray["dosage"] as $value) {
					?>
						<li><?php print $value ?>
						</li>

						<?php 
				}
				?>
					</ul> <!-- Fill Druges Column End -->
				</td>
				<td>
					<!-- Fill Druges Column --> Frequency
					<ul>

						<?php 
						foreach ($treatmentDetailsArray["frequency"] as $value) {
					?>
						<li><?php print $value ?>
						</li>

						<?php 
				}
				?>
					</ul> <!-- Fill Druges Column End -->
				</td>
				<td>
					<!-- Fill Druges Column --> Ac/Pc
					<ul>

						<?php 
						foreach ($treatmentDetailsArray["ac_pc"] as $value) {
					?>
						<li><?php print $value ?>
						</li>

						<?php 
				}
				?>
					</ul> <!-- Fill Druges Column End -->
				</td>
				<!-- _________________________________________  Fill Treatment Details   End ________________________________________________ -->



			</tr>
			<tr>
				<th>Other Notes</th>

			</tr>
			<tr>
				<!-- _________________________________________  Fill Other Notes  Section ________________________________________________ -->
				<td>
					<ul>

						<?php 
						$TreatmentID;
						while($result = mysql_fetch_assoc($resultTreatmentDetailsSQL)){
$TreatmentID = $result["TreatmentID"];					
?>
						<li><?php print $result["other_notes"] ?>
						</li>

						<?php 
				}
				?>
					</ul>
				</td>
				<!-- _________________________________________  Fill Other Notes  Section End ________________________________________________ -->
<td style="float: right;">
<img id="<?php print  $TreatmentID; ?>" alt="Approve" src="../../images/approve.png" onclick="clickFunction(this)" />
</td>


			</tr>
		</tbody>
	</table>

	<?php 
	die();
	?>

	<div
		style="position: relative; margin-left: auto; margin-right: auto; width: 90%; overflow: auto; height: 400px;">
		<br />
		<?php 
		while($treatmentDetails = mysql_fetch_assoc($result)){
     foreach ($treatmentDetails as $key => $value) {

          print $key.":<a style='font-style: oblique;font-size: large;color: blue;'>".$value."<a/><br/>";

     }
}
?>
	</div>

</body>

</html>
