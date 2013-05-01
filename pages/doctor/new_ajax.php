<?php session_start(); ?>
<!DOCTYPE HTML>
    <?php

    error_reporting(E_ERROR | E_PARSE);
    
    $query = $_GET["query"];
    //print $query;
    for($i =0 ;$i<strlen($query);$i++){
	if($query[$i] == "\"" || $query[$i] == "'" || $query[$i] == "=")
	    die("MySQL Injection Attempt :log error 1.231e.$_SESSION[reg_number]:");
	}
    



/* intval($query[0]) == 1 and  removed due to  old registration nubers search capability */
if (strlen(strval(intval($query)))<= 6 or (is_string($query[strlen($query)-1]))){
$reg_number = $query."%";
$check = "select StudentID,FullName,Gender from student where StudentID like '$reg_number'"."limit 15";
}

require '../../inc/config.php';

$result = mysql_query($check,$connection);//query send to mysql database to check username and password
$row = mysql_fetch_array($result);
//filtering phone number index number and name from query ----end

//if no results found in database
if (!$row){ 
?>
<head>

	<meta name="keywords" content="itfac,mrt.ac.lk,student,student information,kbsoft,kasun,moratuwa,lanka students,phone numbers,telephone,information"/>
	<meta name="author" content="kasun thennakoon"/>
	<meta name="description" content="University information system for ITFA.mrt.ac.lk b11 students"/>
	<!-- meta charset="UTF-8"/ -->
	<link rel="stylesheet" href="./css/styles.css" type="text/css" />
	<link rel="shortcut icon" href="./mm/fav.png" />
	
</head>

<div id="notFound" style="position: relative;margin: 0%;float: left;margin-left: 25%;width: 50%;height: auto;background: rgba(0, 0, 0, 0.8);">
<div style="position: relative;float: left;margin-left: 25%;margin-right: 25%;">
	<a style ="background-color:yellow;text-align: center;">Sorry </a>
	<?php echo $query  ?>
	<a style ="background-color:yellow;text-align: center;"> Not found in this database :(<br/>
	please try again</a>
	
</div>
</div>
<?php
die();
}
//result table genaration methods
?>
<div >
	
<table class = "round_edges" id="result_table" border = "0" style = "background-color :#330036;position: relative;top: 0px;left: 5%;width: 90%;opacity: 1.0;" >
<tr>
<th style = " color:#2E0B00;background-color:#BAEFF7;box-shadow: 0px 0px 50px 10px #4EB7B4 inset;">Registration Number</th>
<th style = " color:#2E0B00;background-color:#BAF7C9;box-shadow: 0px 0px 10px 10px #4EB7B4 inset;">name</th>
<th style = " color:#2E0B00;background-color:#F7EEBA;box-shadow: 0px 0px 10px 10px #4EB7B4 inset;">Gender</th>
</tr>
<?php
//$_SESSION["first"] = true;
$count  =0;

while($row){
     //print_r($row);
     //StudentID,FullName,Gender shows in table rows
     //die();
?>
<!--on row click -->

<tr onclick="clk_admin(this)" id= "<?php echo $row["StudentID"]; ?>" onmouseover="mo(this)" onmouseout= "moo(this)">

<!-- end -->


<td style = " background-color:#BAEFF7;"><?php echo $row["StudentID"]; ?></td>
<?php 
print "<td  style = \"  background-color:#BAF7C9;\">".$row["FullName"]."</td>";
print "<td   style = \"  background-color:#F7EEBA;\">".$row["Gender"]."</td>";



//2 phone numbers disply script -- end
$count += 1;

print "</tr>";

$row = mysql_fetch_array($result);
}
print "<p style=\"text-align:center;\"><font style = \"font-size:20;color:red;\">".$count."</font> results found :)</p>";
?>

</table>
</div>

<?php
//result --end




//special home made functions
function strspl($string,$from=0,$to){
$result = "";
if(!$to){

$to = strlen($string);
}
for($i=$from;$i<$to;$i+=1){

$result = $result.$string[$i];

}
return $result;
}

function is_fstring($string){
for($i=0;$i<strlen($string);$i += 1){

if (ord($string[$i]) >= 48 and ord($string[$i]) <= 57)
	return False;
}
return True;
}
//special home made functions --end
?>