<?php session_start();
if($_SESSION['LoginStatus'] != "2")
{
     header('Location: ../../index.php');

}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="../../css/pagerstyle.css" type="text/css" />

<!-- script type="text/javascript"
     src="../../javascripts/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="../../javascripts/jquery.js"></script>
<script type="text/javascript"
     src="../../javascripts/jquery.tablesorter.js"></script>
<script type="text/javascript"
     src="../../javascripts/jquery.tablesorter.pager.js"></script -->


<link href="../../css/style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {
	color: #000000
}
-->
</style>
</head>

<body>
<!-- __________________________ This is the common div for display each treatment details __________________________ -->
	<div id="pre_treatment_details"
		style="position: fixed; width: 70%; height: auto; margin-left: 15%; margin-right: 15%; background: rgba(255, 255, 199, 1); margin-top: 0%; border-radius: 12px; z-index: 50; display: none; box-shadow: 0px 0px 20px 1px #000000;">
		<img onclick="close_preTreatmentDetails()" alt="close"
			src="../../images/new/mm/no.ico"
			style="position: relative; float: right;">
	</div>
	<!-- __________________________ This is the common div for display each treatment details End __________________________ -->
	
<div style="position: relative;width: 50%;float: left;margin-left: 20%;">

     <table border="0" width="100%" > 

          <tr >
               <td><?php

               $regNo=$_SESSION['PATIENT_ID'];
               echo "	<div id=reg>
	 		<font color='#000000' face='Tahoma' size='2'>Registration Number:".$regNo."
			</font>
	 
	 		</div>";
               ?>
                    <table id="insured_list" class="tablesorter" style="height: 500px;overflow: auto;">
                         <thead>
                              <tr>
                                   <th width="15%" align="center">Date</th>
                                   <th width="45%" align="center">Complaint</th>
                                   <th width="25%" align="center">RefDoctor</th>
                                   <th width="15%" align="center"></th>
                              </tr>
                         </thead>
                         <?php


                         require("../../inc/config.php");
                         $query1 = "SELECT * FROM treatment WHERE StudentID ='".$regNo."' ORDER BY TreatmentID DESC";


                         $con= mysql_connect($dbhost, $dbuser, $dbpassword);

                         if(!$con)
                         {
                              die( "Could not connect to database" );
                               
                         }
                         mysql_select_db($dbdatabase,$con);


                         $result = mysql_query($query1);

                         while($row = mysql_fetch_array($result))
                         {

                               
                               
                              echo"<tr height='25px'>
				<td  width='14%' style='color:#CC0099'>".date("Y-d-m",strtotime($row['time_stamp']))."</td>
				<td  width='14%' style='color:#CC0099'>Click On view to see details</td>
				<td  width='14%' style='color:#CC0099'>".$row['RefDoctor']."</td>
				<td  width='14%'><INPUT TYPE=HIDDEN NAME=recordid VALUE ='".$row['TreatmentID']."' ><center><input id='".$row["time_stamp"]."' onclick='preTreatmentDetails(this)' type='image' value='submit' src='img/viewButton.png' width='105' height='37' /></center></td>
			  </tr>";
                               
                               
                               
                         }

                         mysql_close($con);


                         ?>

                    </table>

                         <!--  script defer="defer">
	$(document).ready(function() 
    { 
        $("#insured_list")
		.tablesorter({widthFixed: true, widgets: ['zebra']})
		.tablesorterPager({container: $("#pager")}); 
    } 
	); 
</script -->
               </td>
          </tr>
     </table>

</div>


</body>
</html>
