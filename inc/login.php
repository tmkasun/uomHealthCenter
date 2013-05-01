<?php session_start();

require("config.php");

if($_POST)
{

	$connection = mysql_connect($dbhost, $dbuser, $dbpassword)
	or die("Can not connect to the server");
	//try to connect to sql server if can't connect display error message 
	
	$dbase = mysql_select_db("medicalcenterdb", $connection)
	or die("Can not access data base");
	//select medicalcenter databse for SQL queries or display error message

	$username = $_POST["username"];//get username grom form posting
	$password1 = $_POST["password"];//get password grom form posting
	$password =md5($password1);// encript password with MD5 encriptoin method
	//$_SESSION['LoginStatus'] = "1";
	$_SESSION['DISPLAY_USER']=$username; // set session veriable 'DISPLAY_USER' as username from post
	//print $_POST["username"].$_POST["password"].$password;
	
	
	$query = "select * from user where UserID = '$username' and Password= '$password'";
	$result = mysql_query($query);
	$numrows = mysql_num_rows($result);
	//print $numrows;

	if($numrows > 0)
	{
		/*session_regenerate_id();*/
		$member=mysql_fetch_assoc($result);
		session_register("USERNAME");
		session_register("USERID");
		session_register("LoginStatus");
		$_SESSION['USERNAME'] = $member['Name'];
		$_SESSION['USERID'] = $member['UserID'];
		$_SESSION['LoginStatus']= $member['loginStatus'];
		/*session_write_close();*/
		//include("AdminPanel.php");
		setcookie("UserID",$member['UserID'],time()+3600);
		
		$user =$_SESSION['USERNAME'];




		switch($_SESSION['LoginStatus'])
		{

			case 1:
				echo "1";
				//header('Location:'.$config_basedir.'/pages/admin/adminPanel.php');
				//print $config_basedir;
					
				break;
					
			case 2:
				echo "2";
				//header('Location:'.$config_basedir.'/pages/doctor/doctor_page.php');

					
				break;
					
			case 3:
				echo "3";
				//header('Location:'.$config_basedir.'/pages/pharmacist/pharmacist_page.php');
					
				break;
					
			case 4:
				//header('Location:'.$config_basedir.'/pages/mlt/mlt_page.php');
				echo "4";
				break;
					
			case 5:
				echo "5";
				//header('Location:'.$config_basedir.'/pages/dentist/dentist_page.php');
					
				break;
					
					
		}



	}

	else
	{

		echo "-1";
		//header('Location:'.$config_basedir.'/index.php?login=loginError');


	}


}


?>



