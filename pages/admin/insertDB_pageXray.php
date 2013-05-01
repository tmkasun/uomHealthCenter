<?php
session_start();
if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');
	
}
require("../../inc/config.php");

if($_POST)
{

$regNo = $_POST['regNo'];
$hr =$_POST['hr'];
$fr = $_POST['fr'];
$ins =$_POST['ins'];
$chestEx =$_POST['chestEx'];
$cheins = $_POST['cheins'];
$chinsp = $_POST['chinsp'];
$chins = $_POST['chins'];
$eyeLeft =$_POST['eyeLeft'];
$eyeRight =$_POST['eyeRight'];
$glasses = $_POST['glasses'];
$colourVision = $_POST['colourVision'];
$decay =$_POST['decay'];
$missing = $_POST['missing'];
$filled = $_POST['filled'];
$dentures =$_POST['dentures'];
$gingivitis = $_POST['gingivitis'];
$ears = $_POST['ears'];
$earsinfo = $_POST['earsinfo'];
$nose = $_POST['nose'];
$noseinfo =$_POST['noseinfo'];
$mouth= $_POST['mouth'];
$mouthinfo =$_POST['mouthinfo'];
$throat = $_POST['throat'];
$throatinfo =$_POST['throatinfo'];
$tonsils = $_POST['tonsils'];
$tonsilsinfo = $_POST['tonsilsinfo'];
$abdomen = $_POST['abdomen'];
$abdomeninfo=$_POST['abdomeninfo'];
$hernial_orifices = $_POST['hernial_orifices'];
$hernial_orificesinfo =$_POST['hernial_orificesinfo'];
$genitalia = $_POST['genitalia'];
$genitaliainfo =$_POST['genitaliainfo'];
$anus = $_POST['anus'];
$anusinfo =$_POST['anusinfo'];
$nervousSystem = $_POST['nervousSystem'];
$vericoseveins = $_POST['vericoseveins'];
$bp = $_POST['bp'];
$skin =$_POST['skin'];
$hair = $_POST['hair'];
$nails =$_POST['nails'];
$thyroid = $_POST['thyroid'];
$breasts = $_POST['breasts'];
$heart = $_POST['heart'];
$hb =$_POST['hb'];
$skull =$_POST['skull'];
$upper_limbs = $_POST['upper_limbs'];
$lower_limbs = $_POST['lower_limbs'];
$spine = $_POST['spine'];
$thorax = $_POST['thorax'];
$others =$_POST['others'];
$imgName =" ";



$query1 = "INSERT INTO generalphysique VALUES('".$nervousSystem."','".$vericoseveins."','".$skin."','".$hair."','".$nails."','".$thyroid."','".$breasts."','".$heart."','".$skull."','".$upper_limbs."','". $lower_limbs."','".$spine."','".$thorax."','".$bp."','".$hb."','".$others."','".$hr."','".$fr."','". $ins."','".$chestEx."','".$cheins."','".$chinsp."','".$chins."','".$eyeLeft."','".$eyeRight."','".$glasses."','".$colourVision."','".$decay."','".$missing."','".$filled."','".$dentures."','".$gingivitis."',' ','".$regNo."','".$ears."','".$earsinfo."','".$nose."','".$noseinfo."','".$mouth."','".$mouthinfo."','".$throat."','".$throatinfo."','".$tonsils."','".$tonsilsinfo."','".$abdomen."','".$abdomeninfo."','".$hernial_orifices."','".$hernial_orificesinfo."','".$genitalia."','".$genitaliainfo."','".$anus."','".$anusinfo."','".$imgName."')";




$con =mysql_connect($dbhost, $dbuser, $dbpassword);	

$error=10;

if(!$con)
{
$error=1;
header('Location:'.$config_basedir.'/pages/admin/pageXray.php?success='.$error.'');		
}

mysql_select_db($dbdatabase, $con);

if(!mysql_query($query1,$con))
{
 $error=1;
 header('Location:'.$config_basedir.'/pages/admin/pageXray.php?success='.$error.'');

}
$numrows=mysql_affected_rows();
if($numrows==1)
{
$error=10;
header('Location:'.$config_basedir.'/pages/admin/pageXray.php?success='.$error.'');


}
else if($numrows>1)
{
$error=2;
header('Location:'.$config_basedir.'/pages/admin/pageXray.php?success='.$error.'');


}
else if($numrows==0){

$error=1;
header('Location:'.$config_basedir.'/pages/admin/pageXray.php?success='.$error.'');


}


mysql_close($con);


}



?>
