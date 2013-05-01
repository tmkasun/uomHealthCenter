<?

require("../../inc/config.php");

// Connect to server and select databse.
$con = mysql_connect($dbhost, $dbuser, $dbpassword);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("medicalcenterdb", $con);



if(isset($_GET['getStudentIDByLetters']) && isset($_GET['letters'])){
	$letters = $_GET['letters'];
	$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
	$res = mysql_query("SELECT FullName, StudentID
FROM student
WHERE StudentID LIKE '".$letters."%'") or die(mysql_error());
	#echo "1###select ID,countryName from ajax_countries where countryName like '".$letters."%'|";
	while($inf = mysql_fetch_array($res)){
		echo $inf["StudentID"]."###".$inf["StudentID"]."|";
	}	
}
?>
