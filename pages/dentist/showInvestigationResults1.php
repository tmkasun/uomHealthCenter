<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "5")
{
	header('Location: index.php');
}
require("../../inc/config.php");



$treatmentID=$_GET['id'];


if($treatmentID !='')
{							
$treatmentID=$_GET['id'];


$sql="SELECT investigation_ok .InvestigationName FROM investigation_ok WHERE investigation_ok.TreatmentID=".$treatmentID;

$con = mysql_connect($dbhost, $dbuser, $dbpassword);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("medicalcenterdb", $con);



$result1 = mysql_query($sql);

$row = mysql_fetch_array($result1);

$investigationName=$row['InvestigationName'];

if($investigationName=="FBCESR")
{

$query1="SELECT * FROM fbcesr WHERE fbcesr.esr_treatment_id=".$treatmentID;
mysql_select_db($dbdatabase, $con);
$result_fbc = mysql_query($query1);

$row_fbc = mysql_fetch_array($result_fbc);

echo "<table border='0' width='97%'>
						<tr><form> 
							<td width='29%'><font color='#000000' face='Tahoma' size='2'>Treatment ID:</font>
							</td>
							<td width='20%'>
							
								<input type='text' value='".$row_fbc['esr_treatment_id']."' name='treatmentId' id='txt1'>
							
							</td>
							</form>
							
							
							<td width='20%'><font color='#000000' face='Tahoma' size='2'>
							Reported On</font>
							</td>
							<td width='29%'>
							<input type='text' name='reportedon' size='20' value='".$row_fbc['esr_reported_on']."' />
							</td>
							
						
						
						</tr>
						<table>
						
						<table border='0' width='97%' id='txtHint'>
						<tr>
						
							<td width='29%'><font color='#000000' face='Tahoma' size='2'>Registration Number:</font>
							</td>
							<td width='20%'>
								<input type='text' name='regId' 
								value='".$row_fbc['esr_patient_id']."'/>
							</td>
							<td width='20%'><font color='#000000' face='Tahoma' size='2'>
							Received On:</font>
							</td>
							<td width='29%'>
							<input type='text' name='treatmentDate' value='".$row_fbc['esr_received_on']."' />
							
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Sex:</font>
							</td>
							<td>
								<input type='text' name='gender' value='".$row_fbc['esr_patient_gender']."'/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Reference Doctor:</font>
							</td>
							<td>
							<input type='text' name='refDoctor' value='".$row_fbc['esr_ref_doctor']."'/>
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Investigation Id</font>
							</td>
							<td>
								<input type='text' name='investigationId' value='".$row_fbc['esr_investigation_id']."'/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Specimen</font>
							</td>
							<td>
							<input type='text' name='specimen' value='".$row_fbc['esr_specimen']."' />
							</td>
						
						
						</tr>
						
						</table>
							<table border='0' width='97%'>
							<tr>
							<td colspan='4' align='center'><font color='#000000' face='Tahoma' size='2'><b>FBC/ESR</b></font></td>
							</tr>
							</table>
							<table border='1'>
							<tr>
							<td width='296'><font color='#000000' face='Tahoma' size='2'>TEST</font></td>
							<td width='200'><font color='#000000' face='Tahoma' size='2'>RESULT</font></td>
							<td width='175'><font color='#000000' face='Tahoma' size='2'>NORMAL RANGE</font></td>
							
							</tr>
							<tr>
								<td colspan='3'><font color='#000000' face='Tahoma' size='2'><b>CBC (FBC+ESR)</b></font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Hb(Haemoglobin)</font></td>
								<td><input type='text' value='".$row_fbc['esr_hb']."' name='hb' size='8'/><font color='#000000' face='Tahoma' size='2'>
								gm/dl</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>11.5 - 15.5 gm/dl</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>PCV / Haematocrit</font> </td>
								<td><input type='text' value='".$row_fbc['esr_pcv']."' name='pcv' size='8'/><font color='#000000' face='Tahoma' size='2'>
								%</td>
								<td><font color='#000000' face='Tahoma' size='2'>40 - 50 % </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>RBC Count </font></td>
								<td><input type='text' value='".$row_fbc['esr_rbc']."' name='rbc' size='8'/><font color='#000000' face='Tahoma' size='2'>
								Million/Cumm.</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>4 - 6 Million/Cumm.</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>MVC</font></td>
								<td><input type='text' value='".$row_fbc['esr_mcv']."' name='mvc' size='8'/><font color='#000000' face='Tahoma' size='2'>
								fl</td>
								<td><font color='#000000' face='Tahoma' size='2'>83 - 101 fl</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>MCH</font></td>
								<td><input type='text' value='".$row_fbc['esr_mch']."' name='mch' size='8'/><font color='#000000' face='Tahoma' size='2'>
								pg</td>
								<td><font color='#000000' face='Tahoma' size='2'>27.5 -32 pg</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>MCHC</font></td>
								<td><input type='text' value='".$row_fbc['esr_mchc']."' name='mchc' size='8'/><font color='#000000' face='Tahoma' size='2'>
								gm/dl</td>
								<td><font color='#000000' face='Tahoma' size='2'>31.5 -35 gm/dl </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>RDWCV</font></td>
							  <td><input type='text' value='".$row_fbc['esr_rdwcv']."' name='rdwcv' size='8'/></td>
								<td><font color='#000000' face='Tahoma' size='2'>14 - 16 </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>TLC</font></td>
								<td><input type='text' value='".$row_fbc['  	esr_tlc']."' name='tlc' size='8'/><font color='#000000' face='Tahoma' size='2'>
								/Cumm.</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>4000 -11000 / Cumm.</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Platelet Count</font> </td>
								<td><input type='text' value='".$row_fbc['esr_platletcount']."' name='platelet' size='8'/><font color='#000000' face='Tahoma' size='2'>
								/Cumm.</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>150000 - 400000 / Cumm.</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>ESR</font></td>
								<td><input type='text' value='".$row_fbc['esr_esr']."' name='esr' size='8'/><font color='#000000' face='Tahoma' size='2'>
								mm/1st hr</font> </td>
								<td><font color='#000000' face='Tahoma' size='2'>1 - 20 mm/1st hr</font> </td>
							</tr>
							<tr>
								<td colspan='3'><font color='#000000' face='Tahoma' size='2'>Differential Leukocyte Count</font>
								</td>
							</tr>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Neutrophil</font>
							</td>
							<td><input type='text' value='".$row_fbc['esr_neutrophil']."' name='neutrophil' size='8'/> <font color='#000000' face='Tahoma' size='2'>%</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>40 - 75 % </font>
							</td>
							
							
							
							</tr>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Lymphocyte</font>
							</td>
							<td><input type='text' value='".$row_fbc['esr_lymphocyte']."' name='lymphocyte' size='8'/> <font color='#000000' face='Tahoma' size='2'>%</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>20 - 40 % </font>
							</td>
							</tr>
							
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Monocyte</font>
							</td>
							<td><input type='text' value='".$row_fbc['esr_monocyte']."' name='monocyte' size='8'/> <font color='#000000' face='Tahoma' size='2'>%</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>2 - 8 % </font>
							</td>
							</tr>
							
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Eosinophil</font> 
							</td>
							<td><input type='text' 
							value='".$row_fbc['esr_eosinophil']."' name='eosinophil' size='8'/> <font color='#000000' face='Tahoma' size='2'>%</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>1 - 6 %</font> 
							</td>
							</tr>
							
							
							
							
							</table>
							</td>
							</tr>
							</table>";
						
						
						
						



}
else if($investigationName=="Chloride")
{

$query2="SELECT * FROM chloride_test  WHERE chloride_test .chloride_treatment_id=".$treatmentID;
mysql_select_db($dbdatabase, $con);
$result_chloride = mysql_query($query2);

$row_chloride = mysql_fetch_array($result_chloride);

echo "<table border='0' width='97%'>
						<tr><form> 
							<td width='29%'><font color='#000000' face='Tahoma' size='2'>Treatment ID:</font>
							</td>
							<td width='20%'>
							
								<input type='text' name='treatmentId' id='txt1' value='".$row_chloride['chloride_treatment_id']."' >
							
							</td>
							</form>
							
							
							<td width='20%'><font color='#000000' face='Tahoma' size='2'>
							Reported On</font>
							</td>
							<td width='29%'>
							<input type='text' value='".$row_chloride['chloride_reported_on']."' name='reportedon' size='20' value='' />
							</td>
							
						
						
						</tr>
						<table>
						
						<table border='0' width='97%' id='txtHint'>
						<tr>
						
							<td width='29%'><font color='#000000' face='Tahoma' size='2'>Registration Number:</font>
							</td>
							<td width='20%'>
								<input type='text' value='".$row_chloride['chloride_patient_id']."' name='regId'/>
							</td>
							<td width='20%'><font color='#000000' face='Tahoma' size='2'>
							Received On:</font>
							</td>
							<td width='29%'>
							<input type='text' value='".$row_chloride['chloride_received_on']."' name='treatmentDate' />
							
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Sex:</font>
							</td>
							<td>
								<input type='text' value='".$row_chloride['chloride_patient_gender']."' name='gender'/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Reference Doctor:</font>
							</td>
							<td>
							<input type='text' value='".$row_chloride['chloride_ref_doctor']."' name='refDoctor'/>
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Investigation Id</font>
							</td>
							<td>
								<input type='text' value='".$row_chloride['chloride_investigation_id']."' name='investigationId'/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Specimen</font>
							</td>
							<td>
							<input type='text' value='".$row_chloride['chloride_specimen']."' name='specimen' value='BLOOD'/>
							</td>
						
						
						</tr>
						
						</table>
							<table border='0' width='97%'>
							<tr>
							<td colspan='4' align='center'><font color='#000000' face='Tahoma' size='2'><b>Chloride(Cl)</b></font></td>
							</tr>
							</table>
							<table border='1'>
							<tr>
							<td width='296'><font color='#000000' face='Tahoma' size='2'>TEST</font></td>
							<td width='200'><font color='#000000' face='Tahoma' size='2'>RESULT</font></td>
							<td width='175'><font color='#000000' face='Tahoma' size='2'>NORMAL RANGE</font></td>
							
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'><b>Chloride(Cl)</b></font></td>
								<td><input type='text' value='".$row_chloride['chloride']."' name='chloride' size='10'/><font color='#000000' face='Tahoma' size='2'>
								m mol/l </font></td>
								<td><font color='#000000' face='Tahoma' size='2'>94.0-111.0 m mol/l</font> </td>
							</tr>
							
							
							</table>
							</td>
							</tr>
							</table>
						
						
						
";


}

else if($investigationName=="LiverProfile")
{

$query3="SELECT * FROM liverfunction  WHERE liverfunction.liv_treatmentid=".$treatmentID;
mysql_select_db($dbdatabase, $con);
$result_liver = mysql_query($query3);

$row_liver = mysql_fetch_array($result_liver);


echo "<table border='0' width='97%'>
						<tr>
							<td width='29%'><font color='#000000' face='Tahoma' size='2'>Treatment ID:</font>
							</td>
							<td width='20%'>
							
								<input type='text' value='".$row_liver['liv_treatmentid']."' id='txt1' name='treatmentId'>
							
							</td>
							
							
							
							<td width='20%'><font color='#000000' face='Tahoma' size='2'>
							Reported On</font>
							</td>
							<td width='29%'>
							<input type='text' value='".$row_liver['liv_reported_on']."'  name='reportedon' size='20' value='' />
							</td>
							
						
						
						</tr>
						<table>
						
						<table border='0' width='97%' id='txtHint'>
						<tr>
						
							<td width='29%'><font color='#000000' face='Tahoma' size='2'>Registration Number:</font>
							</td>
							<td width='20%'>
								<input type='text' value='".$row_liver['patient_id']."'  name='regId'/>
							</td>
							<td width='20%'><font color='#000000' face='Tahoma' size='2'>
							Received On:</font>
							</td>
							<td width='29%'>
							<input type='text' value='".$row_liver['liv_received_on']."'  name='treatmentDate' />
							
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Sex:</font>
							</td>
							<td>
								<input type='text' value='".$row_liver['liv_patient_gender']."'  name='gender'/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Reference Doctor:</font>
							</td>
							<td>
							<input type='text' value='".$row_liver['liv_refdoctor']."'  name='refDoctor'/>
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Investigation Id</font>
							</td>
							<td>
								<input type='text' value='".$row_liver['  	liv_investigationid']."'  name='investigationId'/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Specimen</font>
							</td>
							<td>
							<input type='text' value='".$row_liver['liv_specimen']."'  name='specimen' value='BLOOD'/>
							</td>
						
						
						</tr>
						
						</table>
							<table border='0' width='97%'>
							<tr>
							<td colspan='4' align='center'><font color='#000000' face='Tahoma' size='2'><b>Liver Profile<b></font></td>
							</tr>
							</table>
							<table border='1' width='97%'>
							<tr>
							<td width='296'><font color='#000000' face='Tahoma' size='2'>TEST</font></td>
							<td width='200'><font color='#000000' face='Tahoma' size='2'>RESULT</font></td>
							<td width='175'><font color='#000000' face='Tahoma' size='2'>NORMAL RANGE</font></td>
							
							</tr>
							<tr>
								<td colspan='3'><font color='#000000' face='Tahoma' size='2'><b>LIVER FUNCTION TESTS / LIVER PROFILE</b></font> </td>
							</tr>
							<tr>
							<td colspan='3'><font color='#000000' face='Tahoma' size='2'>Serum</font>
							</td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>SGOT(AST)</font></td>
								<td><input type='text' value='".$row_liver['sgot']."'  name='sgot' size='10'/><font color='#000000' face='Tahoma' size='2'>
								U/l</font></td>
								<td>&lt;<font color='#000000' face='Tahoma' size='2'>35 U/l</font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>SGPT(ALT)</font></td>
								<td><input type='text' value='".$row_liver['sgpt']."'  name='sgpt' size='10'/><font color='#000000' face='Tahoma' size='2'>
								U/l</font></td>
								<td>&lt;<font color='#000000' face='Tahoma' size='2'>45 U/l</font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Total Bilirubin</font> </td>
								<td><input type='text' value='".$row_liver['totalbilirubin']."'  name='totalbilirubin' size='10'/><font color='#000000' face='Tahoma' size='2'>
								mg/dl</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>0.10 - 1.20 mg/dl </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Direct Bilirubin</font> </td>
							  <td><input type='text' value='".$row_liver['directbilirubin']."'  name='directbilirubin' size='10'/>
							   <font color='#000000' face='Tahoma' size='2'> mg/dl </font></td>
								<td><font color='#000000' face='Tahoma' size='2'>0.10 - 0.40 mg/dl</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Indirect Billirubin</font> </td>
							  <td><input type='text' value='".$row_liver['indirectbilirubin']."'  name='indirectbilirubin' size='10'/>
							   <font color='#000000' face='Tahoma' size='2'> mg/dl</font> </td>
								<td><font color='#000000' face='Tahoma' size='2'>0.10 - 0.80 mg/dl</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Alkaline Phosphatase</font></td>
							  <td><input type='text' value='".$row_liver['alkalinephosphase']."'  name='alkphosphate' size='10'/>
							    <font color='#000000' face='Tahoma' size='2'>U/l</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>98.0 - 275.0 U/l </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Gamma GT</font> </td>
							  <td><input type='text' value='".$row_liver['gammagt']."'  name='gammagt' size='10'/>
U/l</td>
								<td><font color='#000000' face='Tahoma' size='2'>0.0 - 50.0 U/l </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Total Protein </font></td>
							  <td><input type='text' value='".$row_liver['totalprotein']."'  name='totalprotein' size='10'/>
g/l</td>
								<td><font color='#000000' face='Tahoma' size='2'>64.0 - 83.0 g/l </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Albumin</font></td>
								<td><input type='text' value='".$row_liver['  	albumin']."'  name='albumin' size='10'/>
								<font color='#000000' face='Tahoma' size='2'>g/l</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>35.0 - 52.0 g/l </font></td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Globulin</font> </td>
							  <td><input type='text' value='".$row_liver['  	globulin']."'  name='globulin' size='10'/>
g/l</td>
								<td><font color='#000000' face='Tahoma' size='2'>25.0 - 35.0 g/l</font> </td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>A/G Ratio </font></td>
								<td><input type='text' value='".$row_liver['agratio']."'  name='agratio' size='10'/></td>
								<td><font color='#000000' face='Tahoma' size='2'>1.0 - 2.1 </font>
								</td>
							</tr>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Urea</font></td>
							<td><input type='text' value='".$row_liver['urea']."'  name='urea' size='10'/>
							  <font color='#000000' face='Tahoma' size='2'>mg/dl </font></td>
							<td><font color='#000000' face='Tahoma' size='2'>10.0 -45.0 
							  mg/dl </font></td>
							
							
							
							</tr>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Creatinine</td>
							<td><input type='text' value='".$row_liver['creatinine']."'  name='creatinine' size='10'/><font color='#000000' face='Tahoma' size='2'> 
							mg/dl </font></td>
							<td><font color='#000000' face='Tahoma' size='2'>0.50 - 1.30 mg/dl </font></td>
							</tr>
							
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>ELECTROYTES Sodium (Na)</font> </td>
							<td><input type='text' value='".$row_liver['sodium']."'  name='electroytes' size='10'/><font color='#000000' face='Tahoma' size='2'>
m.mol/l</font></td>
							<td><font color='#000000' face='Tahoma' size='2'>130.0 - 148.0 m mol/l</font> </td>
							</tr>
							
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Potassium (K) </td>
							<td><input type='text' value='".$row_liver['potassium']."'  name='potassium' size='10'/><font color='#000000' face='Tahoma' size='2'>
							m.mol/l</font></td>
							<td><font color='#000000' face='Tahoma' size='2'>3.50 - 5.30 m mol/l</font> </td>
							</tr>
							
							
							
							
							</table>
							</td>
							</tr>
							</table>
";

}

else if($investigationName=="LipidProfile")
{

$query4="SELECT * FROM lipidprofile  WHERE lipidprofile.lip_treatment_id=".$treatmentID;
mysql_select_db($dbdatabase, $con);
$result_liver = mysql_query($query4);

$row_lipi = mysql_fetch_array($result_liver);

echo "<table border='0' width='97%'>
						<tr> 
							<td width='29%'><font color='#000000' face='Tahoma' size='2'>Treatment ID:</font>
							</td>
							<td width='20%'>
							
								<input type='text' value='".$row_lipi['lip_treatment_id']."' id='txt1'  name='treatmentId'>
							
							</td>
							
							
							
							<td width='20%'><font color='#000000' face='Tahoma' size='2'>
							Reported On</font>
							</td>
							<td width='29%'>
							<input type='text'  value='".$row_lipi['lip_reported_on']."'  name='reportedon' size='20' value='' />
							</td>
							
						
						
						</tr>
						
						
						<table border='0' width='97%' id='txtHint'>
						<tr>
						
							<td width='29%'><font color='#000000' face='Tahoma' size='2'>Registration Number:</font>
							</td>
							<td width='20%'>
								<input type='text'  value='".$row_lipi['lip_patient_id']."'  name='regId'/>
							</td>
							<td width='20%'><font color='#000000' face='Tahoma' size='2'>
							Received On:</font>
							</td>
							<td width='29%'>
							<input type='text'  value='".$row_lipi['lip_received_on']."'  name='treatmentDate' />
							
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Sex:</font>
							</td>
							<td>
								<input type='text'  value='".$row_lipi['lip_patient_gender']."'  name='gender'/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Reference Doctor:</font>
							</td>
							<td>
							<input type='text'  value='".$row_lipi['lip_refdoctor']."'  name='refDoctor'/>
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Investigation Id</font>
							</td>
							<td>
								<input type='text'  value='".$row_lipi['lip_investigation_id']."'  name='investigationId'/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Specimen</font>
							</td>
							<td>
							<input type='text'  value='".$row_lipi['lip_specimen']."'  name='specimen' value='BLOOD'/>
							</td>
						
						
						</tr>
						
						</table>
						
						<table>
						
						<tr>
							<td colspan='4' align='center'><font color='#000000' face='Tahoma' size='2'><b>Lipid Profile1<b></font>
							</td>
						</tr>
						<tr>
						<td colspan='4'>
							<table border='1'>
							<tr>
							<td width='366'><font color='#000000' face='Tahoma' size='2'>TEST</font></td>
							<td width='137'><font color='#000000' face='Tahoma' size='2'>RESULT</font></td>
							<td width='168'><font color='#000000' face='Tahoma' size='2'>NORMAL RANGE</font></td>
							
							</tr>
							<tr>
								<td colspan='3'><font color='#000000' face='Tahoma' size='2'>
									LIPID PROFILE</font>
								</td>
							</tr>
							<tr>
								<td colspan='3'><font color='#000000' face='Tahoma' size='2'>
									Serum</font>
								</td>
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Total Cholesterol</font>
								</td>
								<td><input type='text'  value='".$row_lipi['totalcholesterol']."'  name='totalCol' size='10'/><font color='#000000' face='Tahoma' size='2'> mg/dl</font>
								</td>
								<td>&lt;<font color='#000000' face='Tahoma' size='2'>200 mg/dl </font>
								</td>
								
							
							</tr>
							
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Triglycerides</font>
								</td>
								<td><input type='text'  value='".$row_lipi['  	triglycerides']."'  name='triglycerides' size='10'/><font color='#000000' face='Tahoma' size='2'> mg/dl</font>
								</td>
								<td>&lt;<font color='#000000' face='Tahoma' size='2'>150 mg/dl</font> 
								</td>
								
							
							</tr>
							
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>HDL-Cholesterol</font>
								</td>
								<td><input type='text'  value='".$row_lipi['  	hdl_cho']."'  name='hdlCol' size='10'/> <font color='#000000' face='Tahoma' size='2'>mg/dl</font>
								</td>
								<td>&gt;<font color='#000000' face='Tahoma' size='2'>40 mg/dl</font> 
								</td>
								
							
							</tr>
							
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>LDL-Cholesterol</font>
								</td>
								<td><input type='text'  value='".$row_lipi['  	ldl_cho']."'  name='ldlCol' size='10'/> mg/dl</font>
								</td>

								<td>&lt;<font color='#000000' face='Tahoma' size='2'>150mg/dl</font>
								</td>
								
							
							</tr>
							
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>VLDL-Cholesterol</font>
								</td>
								<td><input type='text'  value='".$row_lipi['  	vldl_cho']."'  name='vldlCol' size='10'/><font color='#000000' face='Tahoma' size='2'> mg/dl</font>
								</td>
								<td><font color='#000000' face='Tahoma' size='2'>30mg/dl</font>
								</td>
								
							
							</tr>
							
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'>Ratio of Cholesterol/
								</td>
								<td><input type='text'  value='".$row_lipi['ratio_cho']."'  name='ratioCol' size='10'/><font color='#000000' face='Tahoma' size='2'> mg/dl</font>
								</td>
								<td><font color='#000000' face='Tahoma' size='2'>&lt;5</font>
								</td>
								
							
							</tr>
							<tr>
							<td colspan='3'><font color='#000000' face='Tahoma' size='2'>
							NOTE</font>
							</td>
							</tr>
							<tr>
							<td colspan='4'>
							<table border='0' width='100%'>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>TRIGLYCERIDES</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>Borderline high<br/>150-199</font>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>High<br/>200-499</font>
							
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>Very High<br/>>=500</font>
							</td>
							
							</tr>
							<tr>
							<td><font color='#000000' face='Tahoma' size='2'>LDL-CHOLESTEROL</font></td>
							<td><font color='#000000' face='Tahoma' size='2'>No Risk Factors </font><br/>
							&lt;190</td>
							<font color='#000000' face='Tahoma' size='2'><td><p>2+Risk factors</p>
							  <p>&lt;130 </p></td></font>
							<td><p><font color='#000000' face='Tahoma' size='2'>CHD OR CHD equivalant</font> </p>
							  <p>&lt;<font color='#000000' face='Tahoma' size='2'>70</font></p></td>
							
							</tr>
							<tr>
							<td colspan='3'><font color='#000000' face='Tahoma' size='2'>HDL- CHOLESTEROL &gt;40 for men &gt;50 women </font></td>
							
							
							</tr>
							
							</table>
							</td>
							</tr>
							
							</table>
							</td>
							</tr>
							</table>
				
						
						
						
						
			
";

}

else if($investigationName=="BglucoseFasting")
{

$query5="SELECT * FROM gloucosefasting  WHERE gloucosefasting.gloucose_treatment_id=".$treatmentID;

mysql_select_db($dbdatabase, $con);
$result_bglucose = mysql_query($query5);

$row_glucose = mysql_fetch_array($result_bglucose);

echo "<table border='0' width='97%'>
						<tr> 
							<td width='29%'><font color='#000000' face='Tahoma' size='2'>Treatment ID:</font>
							</td>
							<td width='20%'>
							
								<input type='text' value='".$row_glucose['gloucose_treatment_id'] ."' name='treatmentId' id='txt1' >
							
							</td>
						
							
							
							<td width='20%'><font color='#000000' face='Tahoma' size='2'>
							Reported On</font>
							</td>
							<td width='29%'>
							<input type='text' value='".$row_glucose['gloucose_reported_on'] ."' name='reportedon' size='20' value=''/>
							</td>
							
						
						
						</tr>
						<table>
						
						<table border='0' width='97%' id='txtHint'>
						<tr>
						
							<td width='29%'><font color='#000000' face='Tahoma' size='2'>Registration Number:</font>
							</td>
							<td width='20%'>
								<input type='text' value='".$row_glucose['gloucose_patientid'] ."' name='regId'/>
							</td>
							<td width='20%'><font color='#000000' face='Tahoma' size='2'>
							Received On:</font>
							</td>
							<td width='29%'>
							<input type='text' value='".$row_glucose['gloucose_received_on'] ."' name='treatmentDate' />
							
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Sex:</font>
							</td>
							<td>
								<input type='text' value='".$row_glucose['gloucose_patient_gender'] ."' name='refDoctor'/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Reference Doctor:</font>
							</td>
							<td>
							<input type='text' value='".$row_glucose['gloucose_ref_doctor'] ."' name='refDoctor'/>
							</td>
						
						
						</tr>
						<tr>
							<td><font color='#000000' face='Tahoma' size='2'>Investigation Id</font>
							</td>
							<td>
								<input type='text' value='".$row_glucose['gloucose_investigation_id'] ."' name='investigationId'/>
							</td>
							<td><font color='#000000' face='Tahoma' size='2'>
							Specimen</font>
							</td>
							<td>
							<input type='text' value='".$row_glucose['gloucose_specimen'] ."' name='specimen' value='BLOOD'/>
							</td>
						
						
						</tr>
						
						</table>
							<table border='0' width='97%'>
							<tr>
							<td colspan='4' align='center'><font color='#000000' face='Tahoma' size='2'><b>Glucose Fasting</b></font></td>
							</tr>
							</table>
							<table border='1'>
							<tr>
							<td width='296'><font color='#000000' face='Tahoma' size='2'>TEST</font></td>
							<td width='200'><font color='#000000' face='Tahoma' size='2'>RESULT</font></td>
							<td width='175'><font color='#000000' face='Tahoma' size='2'>NORMAL RANGE</font></td>
							
							</tr>
							<tr>
								<td><font color='#000000' face='Tahoma' size='2'><b>B.Glucose Fasting</b></font></td>
								<td><input type='text' value='".$row_glucose['bgloucosefasting'] ."' name='bglucosefasting' size='10'/><font color='#000000' face='Tahoma' size='2'> mg/dl</font></td>
								<td><font color='#000000' face='Tahoma' size='2'>70.0-110.0 mg/dl</font></td>
							</tr>
							
							
							</table>
							</td>
							</tr>
							</table>
					
";

}


}
else
{
echo "No Result to display";

}


?>



