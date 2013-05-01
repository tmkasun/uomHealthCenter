<?php
session_start();
if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');
	
}


require("../../inc/config.php");

if($_POST)
{
$reg=$_POST['regNumber'];
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

define ("MAX_SIZE","100"); 


//-----------------------------------------------------------------------

//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)  
//and it will be changed to 1 if an errro occures.  
//If the error occures the file will not be uploaded.
 $errors=0;
//checks if the form has been submitted
 if(isset($_POST['submit'])) 
 {
 	//reads the name of the file the user submitted for uploading
 	$image=$_FILES['image']['name'];
 	//if it is not empty
 	if ($image) 
 	{
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['image']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	//otherwise we will do more tests
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		//print error message
 			echo '<h1>Unknown extension!</h1>';
 			$errors=1;
 		}
 		else
 		{
//get the size of the image in bytes
 //$_FILES['image']['tmp_name'] is the temporary filename of the file
 //in which the uploaded file was stored on the server
 $size=filesize($_FILES['image']['tmp_name']);

//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*1024)
{
	//echo '<h1>You have exceeded the size limit!</h1>';
	$errors=1;
}

//we will give an unique name, for example the time in unix time format
$image_name=time().'.'.$extension;
//the new name will be containing the full path where will be stored (images folder)
$newname="../../images/".$image_name;
//we verify if the image has been uploaded, and print error instead
$copied = copy($_FILES['image']['tmp_name'], $newname);
if (!$copied) 
{
	//echo '<h1>Copy unsuccessfull!</h1>';
	$errors=1;
}}}}

//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {
 	//echo "<h1>File Uploaded Successfully! Try again!</h1>";
	$errors=2;
 }
 
 if($image_name==''|| $newname=='' ){
 
$query1 = "UPDATE generalphysique SET NervousSystem='".$nervousSystem."',Varicose_Veins='".$vericoseveins."',Skin='".$skin."',Hair='".$hair."', Nails='".$nails."',Thyroid='".$thyroid."',Breasts='".$breasts."',HEART='".$heart."',Hb='".$hb."',Skull='".$skull."',Upper_Limbs='".$upper_limbs."',Lower_Limbs='".$lower_limbs."',Spine='".$spine."',Thorax='".$thorax."',Others='".$others."',BP='".$bp."',Hr='".$hr."',Fr='".$fr."',Ins='".$ins."',chestEx='".$chestEx."',
che_INS='".$cheins."',ch_insp='".$chinsp."',ch_insp_ins='".$chins."',eye_left='".$eyeLeft."',eye_right='".$eyeRight."',glasses='".$glasses."',
colour_vision='".$colourVision."',theeth_decay='".$decay."',theeth_mising='".$missing."',theeth_filled='".$filled."',teeth_dentures='".$dentures."',
teeth_gingivitis='".$gingivitis ."' WHERE StudentID='".$reg."'";
 
 
 }else{
 

$query1 = "UPDATE generalphysique SET NervousSystem='".$nervousSystem."',Varicose_Veins='".$vericoseveins."',Skin='".$skin."',Hair='".$hair."', Nails='".$nails."',Thyroid='".$thyroid."',Breasts='".$breasts."',HEART='".$heart."',Hb='".$hb."',Skull='".$skull."',Upper_Limbs='".$upper_limbs."',Lower_Limbs='".$lower_limbs."',Spine='".$spine."',Thorax='".$thorax."',Others='".$others."',BP='".$bp."',Hr='".$hr."',Fr='".$fr."',Ins='".$ins."',chestEx='".$chestEx."',
che_INS='".$cheins."',ch_insp='".$chinsp."',ch_insp_ins='".$chins."',eye_left='".$eyeLeft."',eye_right='".$eyeRight."',glasses='".$glasses."',
colour_vision='".$colourVision."',theeth_decay='".$decay."',theeth_mising='".$missing."',theeth_filled='".$filled."',teeth_dentures='".$dentures."',
teeth_gingivitis='".$gingivitis ."',ChestImageName='".$image_name."' WHERE StudentID='".$reg."'";
}

$con = mysql_connect($dbhost, $dbuser, $dbpassword);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  
  }

mysql_select_db($dbdatabase, $con);
mysql_query($query1,$con);
$errors=2;

header ("Location: edit_pageXray.php?success='".$errors."'"); 


}

else
 {
 	
 }

 
?>