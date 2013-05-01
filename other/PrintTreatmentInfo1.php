<?php
session_start();
include("Pharmacist_page.php");
?>
<html>
<head>

</head>
<body>
			  
			  
<a href="#" id="click">Something Here</a>
<div class="box">
<div id="content1">

<?php


$tID=$_GET['id'];


$con = mysql_connect("localhost","root","");
mysql_select_db( "medicalcenterdb", $con );


//$sql1 = "SELECT * FROM treatment WHERE TreatmentID=".$tID;
$sql1 = "SELECT * FROM treatment WHERE TreatmentID=1";
$result1 = mysql_query($sql1, $con);

$numrows = mysql_fetch_row($result1);



echo"<table border='1' align='center'> <tr>
			      <td align='center' ><font color='#000000'><h3>StudentID   : </h3></font>
				  </td>
				  <td align='center' ><font color='#000000'><h3>TreatmentDate</h3></font>
				  </td>
				  <td align='center' ><font color='#000000'><h3>Treatment_info</font>
				  </td>
			   </tr>
			    <tr>
			      <td align='center' ><font color='#000000'><h3>".$numrows[5]."</h3></font>
				  </td>
				  <td align='center' ><font color='#000000'><h3>".$numrows[1]."</h3></font>
				  </td>
				  <td align='center' ><font color='#000000'><h3>".$numrows[4]."</h3></font>
				  </td> </tr></table>";
			  
			   
			  ?>


<p><a href="#" id="close">Close</a></p>
</div>
</div>			  
			   
</body>
</html>			   
