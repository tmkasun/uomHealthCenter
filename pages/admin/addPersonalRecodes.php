<?php
session_start();
if($_SESSION['LoginStatus'] != "1")
{
	header('Location: ../../index.php');

}

include_once '../../inc/config.php';

if(isset($_POST['update']))
{


	$indexNo= $_POST['indexNo'];
	//take only first two numbers as folder to store image
	$folderName = substr($indexNo, 0,2);
	//die($indexNo);


	$fullName = $_POST['fullName'];
	$currentAdd = $_POST['currentAdd'];
	$permenentAdd = $_POST['permenentAdd'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$mstatus=$_POST['mstatus'];
	$faculty=$_POST['faculty'];
	$religion=$_POST['religion'];
	$nationality=$_POST['nationality'];
	require("../../inc/config.php");


	$query1 = "INSERT INTO student (StudentID,FullName,CurrentAdd,PermAdd,DOB,Gender,Maritalstatus,Faculty,	Religion,Nationality) VALUES('".$indexNo."','". $fullName ."','". $currentAdd ."','". $permenentAdd  ."','". $dob ."','". $gender ."','".$mstatus ."','". $faculty."','". $religion ."','". $nationality ."')";

	$con= mysql_connect($dbhost, $dbuser, $dbpassword);

	if(!$con)
	{
		die( "Could not connect to database" );
			
	}
	mysql_select_db($dbdatabase,$con);


	if (!mysql_query($query1,$con))
	{
		header('Location: '.$config_basedir.'/pages/admin/personalData.php?msg=error');
	}
	$data_m = newPhotoUploader($indexNo,$_FILES["uploadedfile"],$gender);
	//die($data_m);
	mysql_query($data_m,$connection);







	$numrows=mysql_affected_rows();
	if($numrows == 1){


		header('Location: '.$config_basedir.'/pages/admin/personalData.php?msg=success');

	}
	else
	{
		header('Location: '.$config_basedir.'/pages/admin/personalData.php?msg=error1');

	}

	mysql_close($con);




}




function newPhotoUploader($indexNumber,$uploadedFile,$gender){

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
		if ($gender == "male") {
			//			die("male");
			$data_m = "update student set imageUrl = '../../images/new/default_avatars/male.png' , hqImageUrl = '../../images/new/default_avatars/male.png' where StudentID = '$indexNumber'";
			return $data_m;
		}
		else{
			//		die("female");
			$data_m = "update student set imageUrl = '../../images/new/default_avatars/female.png' , hqImageUrl = '../../images/new/default_avatars/female.png' where StudentID = '$indexNumber'";
			return $data_m;
		}
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





