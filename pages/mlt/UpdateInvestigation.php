<?php

//Start session
session_start();
if($_SESSION['LoginStatus'] != "4")
{
	header('Location: index.php');
}

require("../../inc/config.php");


if(isset($_POST['lipidSubmit']))
{

$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];
$totCol=$_POST['totalCol'];
$triGlicerid=$_POST['triglycerides'];
$hdlCholesterol=$_POST['hdlCol'];
$ldlCholesterol=$_POST['ldlCol'];
$vldlCholesterol=$_POST['vldlCol'];
$ratioOfCholesterol=$_POST['ratioCol'];


$sql1="INSERT INTO lipidprofile VALUES ('','".$treatmentId."','".$regNumber."','".$receivedOn."','".$reportedOn."','".$refDoctor."','".$sex."','".$specimen."','".$InvestigationId."','".$totCol."','".$triGlicerid."','".$hdlCholesterol."','".$ldlCholesterol."','".$vldlCholesterol."','".$ratioOfCholesterol."')"; 



$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;
$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);


$res = mysql_query($sql1);
$res12=mysql_query($sql12);



if(!$res && !$res12 )
{
	$error=1;

}
else
{
header ("Location: lipidProfileTest.php?success=".$error.""); 


}
	
}

else if(isset($_POST['liverSubmit']))
{

$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];
$sgot=$_POST['sgot'];
$sgpt=$_POST['sgpt'];
$totalbilirubin=$_POST['totalbilirubin'];
$indirectbilirubin=$_POST['indirectbilirubin'];
$alkphosphate=$_POST['alkphosphate'];
$gammagt=$_POST['gammagt'];
$totalprotein=$_POST['totalprotein'];
$albumin=$_POST['albumin'];
$globulin=$_POST['globulin'];
$agratio=$_POST['agratio'];
$urea=$_POST['urea'];
$creatinine=$_POST['creatinine'];
$electroytes=$_POST['electroytes'];
$potassium=$_POST['potassium'];
$directbilirubin=$_POST['directbilirubin'];





$sql2="INSERT INTO liverfunction  VALUES ('','".$regNumber."','".$treatmentId."','".$receivedOn."','".$reportedOn."','".$refDoctor."','".$sex."','".$specimen."','".$InvestigationId."','".$sgot."','".$sgpt."','".$totalbilirubin."','".$indirectbilirubin."','".$alkphosphate."','".$gammagt."','".$totalprotein."','".$albumin."','".$globulin."','".$agratio."','".$urea."','".$creatinine."','".$electroytes."','".$potassium."','".$directbilirubin."')"; 

$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);

$res = mysql_query($sql2);
$res12=mysql_query($sql12);

if(!$res && !$res12)
{
	$error=1;

}
else
{
header ("Location: liverProfile.php?success=".$error.""); 


}
	

}
else if(isset($_POST['fbcesrsubmit'])){

$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];
$hb = $_POST['hb'];
$pcv = $_POST['pcv'];
$rbc = $_POST['rbc'];
$mvc = $_POST['mvc'];
$mch = $_POST['mch'];
$mchc = $_POST['mchc'];
$rdwcv = $_POST['rdwcv'];
$tlc = $_POST['tlc'];
$platelet = $_POST['platelet'];
$esr = $_POST['esr'];
$neutrophil = $_POST['neutrophil'];
$lymphocyte = $_POST['lymphocyte'];
$monocyte = $_POST['monocyte'];
$eosinophil = $_POST['eosinophil'];


$sql3="INSERT INTO fbcesr  VALUES ('','".$regNumber."','".$treatmentId."','".$receivedOn."','".$reportedOn."','".$refDoctor."','".$InvestigationId."','".$sex."','".$specimen."','".$hb."','".$pcv."','".$rbc."','".$mvc."','".$mch."','".$mchc."','".$rdwcv."','".$tlc."','".$platelet."','".$esr."','".$neutrophil."','".$lymphocyte."','".$monocyte."','".$eosinophil."')"; 

$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);

$res = mysql_query($sql3);
$res12=mysql_query($sql12);

if(!$res && !$res12)
{
	$error=1;

}
else
{

header ("Location: fBCESR.php?success=".$error.""); 


}

}
else if(isset($_POST['chlorideFormSubmit']))
{


$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];
$chloride=$_POST['chloride'];

$sql4="INSERT INTO chloride_test VALUES ('','".$regNumber."','".$treatmentId."','".$receivedOn."','".$reportedOn."','".$refDoctor."','".$sex."','".$specimen."','".$InvestigationId."','".$chloride."')"; 

$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);

$res = mysql_query($sql4);
$res12=mysql_query($sql12);
if(!$res && !$res12)
{
	$error=1;

}
else
{

header ("Location: chloride.php?success=".$error.""); 


}


}
else if(isset($_POST['bglucoseFastingsubmit']))
{


$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];
$bglucosefasting=$_POST['bglucosefasting'];

$sql5="INSERT INTO gloucosefasting VALUES ('','".$regNumber."','".$treatmentId."','".$receivedOn."','".$reportedOn."','".$refDoctor."','".$sex."','".$specimen."','".$InvestigationId."','".$bglucosefasting."')"; 

$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);

$res = mysql_query($sql5);
$res12=mysql_query($sql12);

if(!$res && !$res12)
{
	$error=1;

}
else
{

header ("Location: glucoseFasting.php?success=".$error.""); 


}

}

else if(isset($_POST['ufrFormSubmit']))
{

$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];

$colour=$_POST['colour'];
$apperance=$_POST['apperance'];
$specificgravity=$_POST['specificgravity'];
$ph=$_POST['ph'];
$protien=$_POST['protien'];
$sugar=$_POST['sugar'];
$ketone=$_POST['ketone'];
$urobilinogen=$_POST['urobilinogen'];
$bilirubin=$_POST['bilirubin'];
$nitrile=$_POST['nitrile'];
$puscells=$_POST['puscells'];
$redbloodcells=$_POST['redbloodcells'];
$epithelialcells=$_POST['epithelialcells'];
$crystals=$_POST['crystals'];
$casts=$_POST['casts'];
$organisms=$_POST['organisms'];
$others=$_POST['others'];



$sql5="INSERT INTO ufr VALUES ('','".$treatmentId."','".$regNumber."','".$receivedOn."','".$reportedOn."','".$refDoctor."','".$InvestigationId."','".$sex."','".$specimen."','".$colour."','".$apperance."','".$specificgravity."','".$ph."','".$protien."','".$sugar."','".$ketone."','".$urobilinogen."','".$bilirubin."','".$nitrile."','".$puscells."','".$redbloodcells."','".$epithelialcells."','".$crystals."','".$casts."','".$organisms."','".$others."')"; 


$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);

$res = mysql_query($sql5);
$res12=mysql_query($sql12);

if(!$res && !$res12)
{
	$error=1;

}
else
{

header ("Location: ufr.php?success=".$error.""); 


}

}

else if(isset($_POST['fbsFormSubmit']))
{

$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];

$fbs=$_POST['fbs'];


$sql5="INSERT INTO fbs VALUES ('','".$treatmentId."','".$reportedOn."','".$regNumber."','".$receivedOn."','".$sex."','".$refDoctor."','".$InvestigationId."','".$specimen."','".$fbs."')"; 


$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);

$res = mysql_query($sql5);
$res12=mysql_query($sql12);

if(!$res && !$res12)
{
	$error=1;

}
else
{

header ("Location: fbs.php?success=".$error.""); 


}

}

else if(isset($_POST['rbsFormSubmit']))
{

$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];

$rbs=$_POST['rbs'];


$sql5="INSERT INTO rbs VALUES ('','".$treatmentId."','".$reportedOn."','".$regNumber."','".$receivedOn."','".$sex."','".$refDoctor."','".$InvestigationId."','".$specimen."','".$rbs."')"; 


$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);

$res = mysql_query($sql5);
$res12=mysql_query($sql12);

if(!$res && !$res12)
{
	$error=1;

}
else
{

header ("Location: rbs.php?success=".$error.""); 


}

}

else if(isset($_POST['ppbsFormSubmit']))
{

$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];

$ppbs=$_POST['ppbs'];


$sql5="INSERT INTO ppbs VALUES ('','".$treatmentId."','".$reportedOn."','".$regNumber."','".$receivedOn."','".$sex."','".$refDoctor."','".$InvestigationId."','".$specimen."','".$ppbs."')"; 


$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);

$res = mysql_query($sql5);
$res12=mysql_query($sql12);

if(!$res && !$res12)
{
	$error=1;

}
else
{

header ("Location: ppbs.php?success=".$error.""); 


}

}

//---->

else if(isset($_POST['fbcsubmit'])){

$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];
$hb = $_POST['hb'];
$pcv = $_POST['pcv'];
$rbc = $_POST['rbc'];
$mvc = $_POST['mvc'];
$mch = $_POST['mch'];
$mchc = $_POST['mchc'];
$rdwcv = $_POST['rdwcv'];
$tlc = $_POST['tlc'];
$platelet = $_POST['platelet'];
$esr = $_POST['esr'];
$neutrophil = $_POST['neutrophil'];
$lymphocyte = $_POST['lymphocyte'];
$monocyte = $_POST['monocyte'];
$eosinophil = $_POST['eosinophil'];


$sql3="INSERT INTO fbcesr  VALUES ('','".$regNumber."','".$treatmentId."','".$receivedOn."','".$reportedOn."','".$refDoctor."','".$InvestigationId."','".$sex."','".$specimen."','".$hb."','".$pcv."','".$rbc."','".$mvc."','".$mch."','".$mchc."','".$rdwcv."','".$tlc."','".$platelet."','".$esr."','".$neutrophil."','".$lymphocyte."','".$monocyte."','".$eosinophil."')"; 

$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);

$res = mysql_query($sql3);
$res12=mysql_query($sql12);

if(!$res && !$res12)
{
	$error=1;

}
else
{

header ("Location: fbc.php?success=".$error.""); 


}

}


//----->

else if(isset($_POST['esrsubmit'])){

$treatmentId=$_POST['treatmentId'];
$regNumber=$_POST['regId'];
$receivedOn=$_POST['treatmentDate'];
$reportedOn=$_POST['reportedon'];
$refDoctor=$_POST['refDoctor'];
$sex=$_POST['gender'];
$specimen=$_POST['specimen'];
$InvestigationId=$_POST['investigationId'];
$hb = $_POST['hb'];
$pcv = $_POST['pcv'];
$rbc = $_POST['rbc'];
$mvc = $_POST['mvc'];
$mch = $_POST['mch'];
$mchc = $_POST['mchc'];
$rdwcv = $_POST['rdwcv'];
$tlc = $_POST['tlc'];
$platelet = $_POST['platelet'];
$esr = $_POST['esr'];
$neutrophil = $_POST['neutrophil'];
$lymphocyte = $_POST['lymphocyte'];
$monocyte = $_POST['monocyte'];
$eosinophil = $_POST['eosinophil'];


$sql3="INSERT INTO fbcesr  VALUES ('','".$regNumber."','".$treatmentId."','".$receivedOn."','".$reportedOn."','".$refDoctor."','".$InvestigationId."','".$sex."','".$specimen."','".$hb."','".$pcv."','".$rbc."','".$mvc."','".$mch."','".$mchc."','".$rdwcv."','".$tlc."','".$platelet."','".$esr."','".$neutrophil."','".$lymphocyte."','".$monocyte."','".$eosinophil."')"; 

$sql12="UPDATE investigation_ok SET isSubmit =1 WHERE investigation_ok.TreatmentID=".$treatmentId;

$error=2;

$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

if(!$con)
{
	$error=1;
		
}

mysql_select_db($dbdatabase, $con);

$res = mysql_query($sql3);
$res12=mysql_query($sql12);

if(!$res && !$res12)
{
	$error=1;

}
else
{

header ("Location: esr.php?success=".$error.""); 


}

}










	







?>





