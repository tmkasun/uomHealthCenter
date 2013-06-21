<?php
session_start();
if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');

}
require("../../inc/config.php");



//if(isset($_POST['editbutton']) == TRUE)
if($_POST)
{
	$stuName = $_POST['stName'];
	$stuId = $_POST['stId'];
	$stuDob = $_POST['sDob'];
	$stuGender = $_POST['gender'];
	$stuFac = $_POST['stFaculty'];
	$stumStatus = $_POST['mStatus'];
	$stuCurAdd = $_POST['currAdd'];
	$stuPermAdd = $_POST['permAdd'];
	$stuNationality=$_POST['nationality'];
	$stuReligion=$_POST['religion'];

	define ("MAX_SIZE","100");

	//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
	function getExtension($str) {
		$i = strrpos($str,".");
		if (!$i) {
			return "";
		}
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}

	//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)
	//and it will be changed to 1 if an errro occures.
	//If the error occures the file will not be uploaded.
	$errors=0;
	//checks if the form has been submitted
	/*
	 if(isset($_POST['Submit']))
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
	echo '<h1>You have exceeded the size limit!</h1>';
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
	}
	}
	}
	}
	*/

	//If no errors registred, print the success message
	if(isset($_POST['Submit']) && !$errors)
	{
		//echo "<h1>File Uploaded Successfully! Try again!</h1>";
		$errors=2;
	}

	//if($image_name==''|| $newname=='' ){

	$query1 ="UPDATE student SET FullName='".$stuName."',CurrentAdd='".$stuCurAdd."',PermAdd='".$stuPermAdd."',DOB='".$stuDob."',Gender='".$stuGender."',Maritalstatus='".$stumStatus."',Faculty='".$stuFac."',Religion='".$stuReligion."',Nationality='".$stuNationality."' WHERE StudentID='".$stuId."'";



	//}
	/*else{


	$query1 ="UPDATE student SET FullName='".$stuName."',CurrentAdd='".$stuCurAdd."',PermAdd='".$stuPermAdd."',DOB='".$stuDob."',Gender='".$stuGender."',Maritalstatus='".$stumStatus."',Faculty='".$stuFac."',Religion='".$stuReligion."',Nationality='".$stuNationality."',imageName='".$image_name."',imageUrl='".$newname."' WHERE StudentID='".$stuId."'";

	}
	*/

	$con = mysql_connect($dbhost, $dbuser, $dbpassword);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());

	}

	mysql_select_db($dbdatabase, $con);
	mysql_query($query1,$con);
	$errors=2;

	$data_m = newPhotoUploader($stuId,$_FILES["uploadedfile"]);
	if($data_m)
		mysql_query($data_m,$connection);


	header ("Location: editStuDetailsViewer.php?success=".$errors."");


}

else
{

}




function newPhotoUploader($indexNumber,$uploadedFile){

	//___________________________________________ new photo uploader _____________________________________________

	//die($indexNumber.">>>>".$uploadedFile["name"]);
	$filename =$uploadedFile["name"];

	if ($uploadedFile["error"] > 0)
	{
		echo "Error: " . $_FILES["uploadedfile"]["error"] . "<br>";
	}

	// clear browser cache on file status befor doing file handling
	clearstatcache();
	//-- end

	//check the validity of file types upon uplod
	$valid_file_types = array("image/gif","image/png","image/jpg","image/pjpg","image/jpeg");

	if(!in_array($uploadedFile["type"] ,$valid_file_types)){
		return false;
		die("<font color = 'red'>".$uploadedFile["type"]."</font> is not a valid file type :(");
	}

	//put into array divided by "."
	$uploaded_image = explode(".",$uploadedFile["name"]);

	//print_r($uploaded_image);

	//rename the file name to hes/her registration number and add the above array end item wich is the extention of the image
	$filename = $indexNumber.".".strtolower(end($uploaded_image));

	//check the validity of file types upon uplod --end
	//create seperate folder for each student by their reg_number if folder is not already excist


	if(!is_dir("../../images/student_photos/".$folderName)){

		mkdir("../../images/student_photos/".$folderName);
	}

	//create seperate folder for each student by their reg_number if folder is not already excist --end

	//create thumbnails

	$thumb_filename = "thumb_".$indexNumber.".".strtolower(end($uploaded_image));
	//die($image_width.">>>>>".$image_height);
	//Find the height and width of the image
	list($gotwidth, $gotheight, $gottype, $gotattr)= getimagesize($uploadedFile['tmp_name']);
	$extension = strtolower(end($uploaded_image));
	//---------- To create thumbnail of image---------------
	if($extension=="jpg" || $extension=="jpeg" ){
		$src = imagecreatefromjpeg($uploadedFile['tmp_name']);
	}
	else if($extension=="png"){ // bug not creating thumb for png files
		$src = imagecreatefrompng($uploadedFile['tmp_name']);
	}
	else{
		$src = imagecreatefromgif($uploadedFile['tmp_name']);
	}
	list($width,$height)=getimagesize($uploadedFile['tmp_name']);

	if($gotwidth>=124)
	{
		$newwidth=124;
	}else
	{
		$newwidth=$gotwidth;
	}
	//blance the image width and height
	$newheight=round(($gotheight*$newwidth)/$gotwidth);
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);
	//Create thumbnail image

	//---------- To create thumbnail of image---------------
	if($extension=="jpg" || $extension=="jpeg" ){
		$createImageSave=imagejpeg($tmp,"../../images/student_photos/".$folderName."/".$thumb_filename,100);
	}
	else if($extension=="png"){
		$createImageSave=imagepng($tmp,"../../images/student_photos/".$folderName."/".$thumb_filename,100);
	}
	else{
		$src = imagegif($tmp,"../../images/student_photos/".$folderName."/".$thumb_filename,100);
	}

	//create thumbnails --end


	if(move_uploaded_file($uploadedFile["tmp_name"],"../../images/student_photos/".$folderName."/".$filename)){
		echo "<br/>The file ". basename( $uploadedFile['name'])." has been uploaded<br/>";
		$image = "../../images/student_photos/".$filename;


		//--end getting geo taging information

		//update new profile pic to mysql
		$profile_pic = "../../images/student_photos/".$folderName."/".$thumb_filename;
		$hqImage = "../../images/student_photos/".$folderName."/".$filename;

		$data_m = "update student set imageUrl = '$profile_pic' , hqImageUrl = '$hqImage' where StudentID = '$indexNumber'";

		//clear file status cahe befor redirect to welcome.php page for better refresh of the page
		clearstatcache();

		return $data_m;

	}

	else{
		echo "There was an error uploading the file, please try again!";
	}

	//_____________________________________________ new photo uploader end ____________________________________________________



}

?>




