
<?php
session_start();


if($_SERVER[REMOTE_ADDR] == '127.0.0.1'){
	include_once('./local.php');
}
else
	include_once('./server.php');
error_reporting(E_PARSE);
$mysql_date_time = date("Y-m-d H:i:s");
$longitude = "";
$latitude = "";
$filename =$_FILES["uploadedfile"]["name"];

if ($_FILES["uploadedfile"]["error"] > 0)
{
	echo "Error: " . $_FILES["uploadedfile"]["error"] . "<br>";
}

// clear browser cache on file status befor doing file handling
clearstatcache();
//-- end

//check the validity of file types upon uplod
$valid_file_types = array("image/gif","image/png","image/jpg","image/pjpg","image/jpeg");

if(!in_array($_FILES["uploadedfile"]["type"] ,$valid_file_types)){
	die("<font color = 'red'>".$_FILES["uploadedfile"]["type"]."</font> is not a valid file type :(");
}

//put into array divided by "."
$uploaded_image = explode(".",$_FILES["uploadedfile"]["name"]);

//rename the file name to hes/her registration number and add the above array end item wich is the extention of the image
$filename = $_SESSION['reg_number'].".".strtolower(end($uploaded_image));

//check the validity of file types upon uplod --end
//create seperate folder for each student by their reg_number if folder is not already excist
if(!is_dir("./profile_photos/".$_SESSION["reg_number"])){

	mkdir("./profile_photos/".$_SESSION["reg_number"]);
}

//create seperate folder for each student by their reg_number if folder is not already excist --end

//create thumbnails

$thumb_filename = "thumb_".$_SESSION['reg_number'].".".strtolower(end($uploaded_image));
//die($image_width.">>>>>".$image_height);
//Find the height and width of the image
list($gotwidth, $gotheight, $gottype, $gotattr)= getimagesize($_FILES['uploadedfile']['tmp_name']);
$extension = strtolower(end($uploaded_image));
//---------- To create thumbnail of image---------------
if($extension=="jpg" || $extension=="jpeg" ){
	$src = imagecreatefromjpeg($_FILES['uploadedfile']['tmp_name']);
}
else if($extension=="png"){ // bug not creating thumb for png files
	$src = imagecreatefrompng($_FILES['uploadedfile']['tmp_name']);
}
else{
	$src = imagecreatefromgif($_FILES['uploadedfile']['tmp_name']);
}
list($width,$height)=getimagesize($_FILES['uploadedfile']['tmp_name']);

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
	$createImageSave=imagejpeg($tmp,"./profile_photos/".$_SESSION["reg_number"]."/".$thumb_filename,100);
}
else if($extension=="png"){
	$createImageSave=imagepng($tmp,"./profile_photos/".$_SESSION["reg_number"]."/".$thumb_filename,100);
}
else{
	$src = imagegif($tmp,"./profile_photos/".$_SESSION["reg_number"]."/".$thumb_filename,100);
}

//create thumbnails --end


if(move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"./profile_photos/".$_SESSION["reg_number"]."/".$filename)){
	echo "<br/>The file ". basename( $_FILES['uploadedfile']['name'])." has been uploaded<br/>";
	$image = "profile_photos/".$filename;


	//--end getting geo taging information

	//update new profile pic to mysql
	$profile_pic = "./profile_photos/".$_SESSION["reg_number"]."/".$thumb_filename;
	$data_m = "update b11 set profile_pic = '$profile_pic' where reg_number = '$_SESSION[reg_number]'";


	mysql_query($data_m,$connection);
	//clear file status cahe befor redirect to welcome.php page for better refresh of the page

	clearstatcache();
	header( 'Location: ./welcome.php' ) ;


}

else{
	echo "There was an error uploading the file, please try again!";
}
?>