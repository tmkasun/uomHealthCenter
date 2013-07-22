<?php
session_start ();
// Start session

// cheack the session variable and if it is not set redirect to index.php
if ($_SESSION ['LoginStatus'] != "2") {
	header ( 'Location: index.php' );
}

if ($_POST) {
	extract ( $_POST );
	$patientIndex = $_POST ["StudentID"];
	// session_register( "PATIENT_ID" );
	$_SESSION ['PATIENT_ID'] = $_POST ["StudentID"];
} else if (isset ( $_GET ['id'] )) {
	$_SESSION ['PATIENT_ID'] = $_GET ['id'];
}
?>
<head>
<!-- jquery-1.9.1.js -->
<script src="../../javascripts/new/js/jquery-1.9.1.js"></script>
<script src="../../javascripts/TreatmentAjax.js"></script>
<script src="../../javascripts/NewTreatmentAjax.js"></script>

<script src="../../javascripts/new/js/jquery-ui-1.10.3.custom.min.js"></script>
<link href="../../css/newJQ/jquery-ui-1.10.3.custom.min.css"
	rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
.style2 {
	color: #000000
}
-->
</style>
<style type="text/css">
.error {
	color: #d12f19;
	font-size: 12px;
}

.success {
	color: #006600;
	font-size: 12px;
}
</style>
</head>
<?php
/*
 * new AJAX dropdown menu
 */
include_once ('../../inc/config.php');
$complains_list_query = "select * from complaint ORDER BY complaint ASC";
$diagnosis_list_query = "select * from diagnosis ORDER BY diagnosis ASC";
$treatment_list_query = "select * from treatment_type ORDER BY treatment_type ASC";

$patientAllergiesQuery = "select * from allergies where StudentID = '$_SESSION[PATIENT_ID]' ";

$diagnosis_result = mysql_query ( $diagnosis_list_query, $connection );
$complains_result = mysql_query ( $complains_list_query, $connection );

$allergies_result = mysql_query ( $patientAllergiesQuery, $connection );

$treatment_result = mysql_query ( $treatment_list_query, $connection );

mysqli_close ( $connection );
// close database connection after retreving data
?>
<body>

	<!-- __________________________ This is the common div for display each treatment details __________________________ -->
	<div id="pre_treatment_details"
		style="position: fixed; width: 70%; height: auto; margin-left: 15%; margin-right: 15%; background: rgba(255, 255, 199, 1); margin-top: 0%; border-radius: 12px; z-index: 50; display: none; box-shadow: 0px 0px 20px 1px #000000;">
		<img
			style="cursor: pointer; float: right; margin-right: 10px; margin-top: 10px;"
			onclick="close_preTreatmentDetails()" alt="close"
			src="../../images/new/mm/no.ico"
			style="position: relative; float: right;">

	</div>

	<script type="text/javascript">
$(function() {
	$("#pre_treatment_details").draggable();
	
	
});
	</script>
	<!-- __________________________ This is the common div for display each treatment details End __________________________ -->
	<button class="def_button"
		style="position: relative; float: left; text-align: center;"
		onclick="slideup()" class="clear_bt" value="Go Back">Back</button>

	<table id="treatmentTable" border="1"
		style="margin-left: 5%; background: rgba(100, 200, 255, 0.3); border-radius: 30px; border: none; height: auto; width: 90%">

		<tr valign="top">
			<td width="50%"><img id="profile_pic"
				onmouseover="hover_profilepic_message()"
				onclick="window.open('<?php echo $_SESSION["hqImageUrl"]; ?>','location=no','menubar=no','toolbar=no','titlebar=no','status=no');"
				src="<?php print $_SESSION["imageUrl"]; ?>" width="20%" height="40%" />
				<!-- ______________________________Patients allergies Details______________________________ -->
				<div
					style="background-color: red; margin: 0, auto; width: 30%; float: right; border-radius: 10px; box-shadow: 0px 0px 10px 1px #545454; margin-right: 25%;">
					<span style="position: relative; float: left;">Allergies Details</span>
					<ul>
						<?php
						while ( $result = mysql_fetch_assoc ( $allergies_result ) ) {
							?>

						<li><?php print $result["allergy"]; ?></li>

						<?php } ?>
					</ul>
				</div> <!-- ______________________________Patients allergies Details End______________________________ -->

				<br /> <input size='<?php echo strlen($_SESSION['PATIENT_ID']) ?>'
				disabled="disabled" type="text" size="12" name="regNo" id="regNo"
				style="color: fuchsia;" value='<?php echo $_SESSION['PATIENT_ID']?>' />
				<!-- Unknown hidden variable --> <input type="hidden"
				name="indexNum1" /></td>

			<!-- Pre Treatment Details section -->

			<td valign="top" rowspan="1" style="height: auto; width: 50%;"><span>
					<font color='#000000' face='Tahoma' size='3'>Previous Treatments</font>
			</span>
				<div id="container"
					style="height: 100%; overflow: auto; width: 80%;">

					<ul class="menu">

					</ul>

					<span class="clear"></span>
					<!-- ----------------------------------------------------------------------Debug---------------------------------------------------------------------- -->
					<!-- 	updateTreatment.php
																	UpdateTreatment.php
															
															 -->
					<div class="content" style="height: auto;">

						<div id="loading" style="height: 20px">
							<img src="../../images/loading.gif" alt="Loading..." />
						</div>
						<ul style="height: 150px">

						</ul>

					</div>

				</div></td>
			<!-- Previous Treatments Details section End-->
		</tr>

		<!-- Complaint Details section -->
		<tr style="height: 150px">
			<td width="50%" valign="top" id="complaint_div"><label> <font
					color='#000000' face='Tahoma' size='4'> Complaint </font><br /> 
					<?php
					/*
					 * Use disabled input for better UI don't remove. can't select next one without it
					 */
					?>
					<input type="text" disabled="disabled" style="display: none;" /> <script
						type="text/javascript">
					loadOptionsFromDb('complaint');
					</script>
					
						<?php
						/*
						 * Old Text area replaced with new AJAX dropdown list
						 */
						?>
						
					<!-- textarea name="textarea2" id="textarea2" rows="6" cols="40"></textarea --></label>
				<br />
				<div id="appendNewComplaints"></div> <input id="new_complaint_input"
				onclick="addNewComplaint('complaint')"
				placeholder="Add or Remove complaint" style="margin-top: 10px;" /> <!--  /div -->
			</td>



			<!-- Complaint Details section End-->

			<!-- /tr -->




			<!-- ______________________________Get patient Diagnosis Details section______________________________ -->
			<!--  tr -->
			<td valign="top" id="diagnosis_div" style="height: auto; width: 50%;"><label>
					<font color='#000000' face='Tahoma' size='4'> Diagnoses </font><br />
					<!--  Use disabled input for better UI don't remove. can't select next one without it  -->
					<input type="text" disabled="disabled" style="display: none;" /> <script
						type="text/javascript">
					loadOptionsFromDb('diagnosis');
					</script>
			</label><br />
				<div id="appendNewDiagnoses"></div> <input
				onclick="addNewComplaint('diagnosis')" id="new_diagnosis_input"
				placeholder="Add or Remove Diagnosis" style="margin-top: 10px;" /> <!-- Old textarea replaced with ajax dropdown menu -->
				<!-- textarea name="textarea3" id="textarea3" rows="6" cols="40"></textarea -->
			</td>

		</tr>

		<tr
			style="height: auto; width: 100%; background-color: aqua; position: relative; border-radius: 10px; box-shadow: 0px 0px 10px 1px #545454;">
			<td colspan="2" align="center">Treatment Details</td>

		</tr>




		<!-- ___________________________________________Multi Treatment Selection JS function__________________________________________________ -->

		<script type="text/javascript">
			var numberOfTreatmentList = 0;
			function onchangeTreatment(currentSelectList) {
				//alert($("#treatmentFrequency0").html());

				numberOfTreatmentList += 1;
				//alert(numberOfDiagnosisList);
				var currentTreatmentObject = document.getElementById(currentSelectList.id);
				var currentTreatmentInnerHtml = currentTreatmentObject.innerHTML;
				//alert(currentComplaintInnerHtml);
				var nextSelectObject = document.createElement("select");
				//alert("complaint"+numberOfComplaintList);
				//additional inputs related to drug
				var nextinputObject = document.createElement("input");
				var nextFrequencyObject = document.createElement("select");
				var nextAcPcObject = document.createElement("select");
				var nextNumTabObject = $("<input></input>");// new tablet count comes with new JQuery object declaring method
				
				// Set attributes for treatment selector
				nextSelectObject.setAttribute("id", "treatment" + numberOfTreatmentList);
				nextSelectObject.setAttribute("onchange", "if (this.selectedIndex) onchangeTreatment(this);");
				nextSelectObject.setAttribute("class", "treatment_class");

				// Set attributes for dosage input
				nextinputObject.setAttribute("id", "treatmentDosage" + numberOfTreatmentList);
				nextinputObject.setAttribute("class", "treatment_dosage_class");
				nextinputObject.setAttribute("size", "10");

				// Set attributes for Frequency selector
				nextFrequencyObject.setAttribute("id", "treatmentFrequency" + numberOfTreatmentList);
				nextFrequencyObject.setAttribute("class", "treatment_frequency_class");

				// Set attributes for AcPc selector
				nextAcPcObject.setAttribute("id", "treatmentAcPc" + numberOfTreatmentList);
				nextAcPcObject.setAttribute("class", "treatment_acpc_class");

				// Set attributes for tablets count input
				nextNumTabObject.attr({
					"id": "treatmentNumTab"+ numberOfTreatmentList, 
					"class": "treatment_numtab_class",
					"display": "none",
					"type" : "text",
					"size": "10"
					});

				nextSelectObject.setAttribute("display", "none");
				nextAcPcObject.setAttribute("display", "none");
				nextFrequencyObject.setAttribute("display", "none");
				nextinputObject.setAttribute("display", "none");

				//margin-left: ;margin-right:
				$(nextAcPcObject).css({
					"margin" : "2%",
					"margin-left" : "10%",
					"margin-right" : "10%"
				});
				$(nextFrequencyObject).css("margin", "2%");
				$(nextinputObject).css({
					"margin" : "2%",
					"margin-left" : "10%",
					"margin-right" : "10%"
				});
				$(nextNumTabObject).css({
					"margin" : "2%",
					"margin-left" : "10%",
					"margin-right" : "10%"
				});

//margin-bottom: 2%; margin-top: 2%;margin : 2%;margin-left: 10%;margin-right: 10%;

				
				$(nextSelectObject).css({
					"margin" : "2%",
					"margin-left" : "10%",
					"margin-right" : "10%",
					"margin-bottom": "1.5%",
					"margin-top": "1.5%"
							});
				
				//$(nextinputObject).css("margin","2%");

				nextSelectObject.innerHTML = currentTreatmentInnerHtml;
				nextFrequencyObject.innerHTML = $("#treatmentFrequency0").html();
				nextAcPcObject.innerHTML = $("#treatmentAcPc0").html();

				//complaintParentElement.appendChild(nextSelectObject);

				/*
				 Remove icon not in use due to high complexcity- develop if u can :)
				 var removeIcon = document.createElement("img");
				 removeIcon.setAttribute("src", "../../images/new/mm/remove.ico");
				 removeIcon.setAttribute("onclick", "$(this).prev('select.diagnosis_class').remove();$(this).remove();");
				 diagnosisParentElement.insertBefore(removeIcon, document.getElementById("new_diagnosis_input"));
				 */

				$(nextSelectObject).insertAfter($("#treatment" + (numberOfTreatmentList - 1)));
				$(nextFrequencyObject).insertAfter($("#treatmentFrequency" + (numberOfTreatmentList - 1)));
				$(nextAcPcObject).insertAfter($("#treatmentAcPc" + (numberOfTreatmentList - 1)));
				$(nextinputObject).insertAfter($("#treatmentDosage" + (numberOfTreatmentList - 1)));
				$(nextNumTabObject).insertAfter($("#treatmentNumTab" + (numberOfTreatmentList - 1)));
				
				//diagnosisParentElement.insertBefore(nextSelectObject, document.getElementById("new_diagnosis_input"));

				$("#treatment" + numberOfTreatmentList).fadeIn("slow");
				$("#treatmentNumTab" + numberOfTreatmentList).fadeIn("slow");
				$("#treatmentFrequency" + numberOfTreatmentList).fadeIn("slow");
				$("#treatmentAcPc" + numberOfTreatmentList).fadeIn("slow");
				$("#treatmentDosage" + numberOfTreatmentList).fadeIn("slow");

				//$("#complaint"+(numberOfComplaintList-1)).prop("disabled","disabled");
				return 0;

			}

                                                  </script>



		<!-- ____________________________ Treatments Details of Patients____________________________ -->

		<tr>
			<td style="height: auto; width: 100%;" colspan="2">


				<div id="treatment_drug"
					style="position: relative; float: left; height: auto; width: 28%;">

					<!-- _______________________________________ Treatment selector _______________________________________ -->
					<span> <font color='#000000' face='Tahoma' size='3'>Treatment</font>
					</span>
					<div style="height: auto; overflow: auto; border: none; margin: 0;">

						<select id="treatment0" class="treatment_class"
							onchange="if (this.selectedIndex) loadOptionsFromDb('treatment');" style="margin-bottom: 2%; margin-top: 2%;margin : 2%;margin-left: 10%;margin-right: 10%;width: 200px;">
							<option selected="selected"
								style="font-size: 13pt; width: 220px;">Treatment</option>

							<?php
							while ( $treatment = mysql_fetch_assoc ( $treatment_result ) ) {
								print "<option style='font-size: 13pt;width: 220px;'>" . $treatment ["treatment_type"] . "</option>";
							}
							?>
							<option style="font-size: 13pt; width: 220px; color: red;">No
								Treatment</option>

						</select> <br /> <input
							onclick="addNewComplaint('treatment_type')"
							placeholder="Add or Remove treatment" style="margin-top: 10px;" />


					</div>
					<!--  textarea name="textarea5" id="textarea5"
																	rows="7" cols="40"></textarea -->
					<input type="hidden" name="refDoctor" id="refDoctor"
						value='<?php echo $_SESSION['USERNAME']?>' />

					<!-- _______________________________________ Treatment selector End_______________________________________ -->

				</div> <!-- _______________________________________ Treatment Dosage selector _______________________________________ -->


				<div id="treatment_dosage"
					style="position: relative; float: left; height: auto; width: 18%; margin: 0, auto;"
					align="center">
					<p style="margin: 0; padding: 0;">Dosage(in mg)</p>
<!-- 		"margin" : "2%",
					"margin-left" : "10%",
					"margin-right" : "10%" -->
					<input id="treatmentDosage0" class="treatment_dosage_class"
						type="text" size="10" style="margin-bottom: 2%; margin-top: 2%;margin : 2%;margin-left: 10%;margin-right: 10%; " />

				</div> <!-- _______________________________________ Treatment Dosage selector End _______________________________________ -->

				<div id="treatment_frequency"
					style="position: relative; float: left; height: auto; width: 18%;"
					align="center">
					<!-- _______________________________________ Treatment Frequency selector _______________________________________ -->
					<p style="margin: 0; padding: 0;">Frequency</p>


					<select style="margin: 2%;" id="treatmentFrequency0"
						class="treatment_frequency_class">
						<option selected="selected">Once Daily</option>
						<option>Twice Daily</option>
						<option>Three Times Daily</option>
						<option>Four Times Daily</option>
						<option>Every 1 Hour</option>
						<option>Every 2 Hours</option>
						<option>Every 4 Hours</option>
						<option>Every 6 Hours</option>
						<option>Every 8 Hours</option>
					</select>

				</div> <!-- _______________________________________ Treatment Frequency selector End_______________________________________ -->


				<div id="treatment_acpc"
					style="position: relative; float: left; height: auto; width: 18%;"
					align="center">
					<!-- _______________________________________ Treatment AC/PC selector _______________________________________ -->
					<p style="margin: 0; padding: 0;">AC/PC</p>

					<select style="margin-bottom: 2%; margin-top: 2%;margin : 2%;margin-left: 10%;margin-right: 10%;" id="treatmentAcPc0"
						class="treatment_acpc_class">
						<option>Before Meal</option>
						<option selected="selected">After Meal</option>
					</select>

				</div> <!-- _______________________________________ Treatment AC/PC selector End _______________________________________ -->

				<!-- _______________________________________ Treatment number of tablets selector _______________________________________ -->
				<div id="treatment_numtab"
					style="position: relative; float: left; height: auto; width: 18%; margin: 0, auto;"
					align="center">
					<p style="margin: 0; padding: 0;">Number of Tablets</p>

					<input id="treatmentNumTab0" class="treatment_numtab_class"
						type="text" size="10" style="margin-bottom: 2%; margin-top: 2%;margin : 2%;margin-left: 10%;margin-right: 10%;" />
				</div> <!-- _______________________________________ Treatment number of tablets selector End _______________________________________ -->

				<!-- ____________________________ Treatments to Patients End ____________________________ -->
		
		</tr>

		<!-- ______________________________Get patient Diagnosis Details section End______________________________ -->

		<!-- ______________________________Submit Pations record to Database______________________________ -->

		<tr>
			<td height="155" width="50%" align="center" valign="top"><label> <!-- ______________________________Submit Pations record to Database Submit Button and show result______________________________ -->


					<div
						style="position: relative; float: left; height: auto; width: 18%;"
						align="center">
						<!-- _______________________________________ Treatment Other Notes selector _______________________________________ -->
						<p style="margin: 0px;">Other&nbspNotes</p>
						<textarea id="treatmentOtherNotes" rows="3" cols="22"
							placeholder="Enter other notes....."></textarea>

					</div> <!-- _______________________________________ Treatment Other Notes selector End _______________________________________ -->



					<table border="1" width="80%" style="margin-top: 110px;">
						<div>
							<tr>
								<td width="30%" align="center" bgcolor="#125489" rowspan="2"><input
									style="cursor: pointer;" type="button" name="submitTreatment"
									id="submitTreatment" value="submit Treatment" class="submit" />
								</td>
								<td bgcolor="#009977" rowspan="2" colspan="2"><span
									class="error" style="display: none"> Please Enter Valid Data </span>
									<span class="success" style="display: none"> Treatment
										Successfully sent... </span> <!-- Remove onlick new treatment page coz new ajax page is available -->
									<!-- a href="doctor_treatment.php" style="color: #0066CC; font-weight: bold"> Click For a New
											Treatment </a  --></td>
							</tr>

						</div>

					</table> <!-- ______________________________Submit Pations record to Database Submit Button and show result End______________________________ -->
			</label></td>
			<!-- ______________________________Submit Pateions record to Database End______________________________ -->


			<!-- ______________________________Send investigation report to MLT______________________________ -->
			<td valign="top">
				<table border="0">
					<tr>
						<td height="30" align="left"><label><font color='#000000'
								face='Tahoma' size='3'>Investigations</font> </label> <select
							name="investigation" id="investigation">
								<option value="None">None</option>
								<option value="LiverProfile">LiverProfile</option>
								<option value="FBCESR">FBC/ESR</option>
								<option value="Chloride">Chloride</option>
								<option value="BglucoseFasting">B.Glucose Fasting</option>
								<option value="LipidProfile">Lipid Profile</option>

								<option value="FBS">FBS</option>

								<option value="RBS">RBS</option>


								<option value="PPBS">PPBS</option>

								<option value="FBC">FBC</option>

								<option value="ESR">ESR</option>
								<option value="UFR">UFR</option>

						</select>
							<button onclick="submitInvestigation()">Submit</button></td>
					</tr>
				</table>

			</td>

			<!-- ______________________________Send investigation report to MLT End______________________________ -->
		</tr>




	</table>

</body>
</html>


<?php
/*
 * This section is code greave yard old codes algos etc.. are saved in this area for recovery purpose
 */

/* 
 * 
 *  
 *  
 *
 *  
 *  <script type="text/javascript">
					loadOptionsFromDb('complaint');
					</script>
 
 
 
 
 *
 *
 */




?>
