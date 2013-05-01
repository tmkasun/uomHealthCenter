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

<div style="position: relative;width: 50%;float: left;margin-left: 20%;">

     <table border="0" width="100%">

          <tr>
               <td><?php

               $regNo=$_SESSION['PATIENT_ID'];
               echo "	<div id=reg>
	 		<font color='#000000' face='Tahoma' size='2'>Registration Number:".$regNo."
			</font>
	 
	 		</div>";
               ?>
                    <table id="insured_list" class="tablesorter">
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
				<td  width='14%' style='color:#CC0099'>".$row['TreatmentDate']."</td>
				<td  width='14%' style='color:#CC0099'>".$row['Complaint']."</td>
				<td  width='14%' style='color:#CC0099'>".$row['RefDoctor']."</td>
				<td  width='14%'><FORM ACTION='leaveformprint.php' METHOD=POST><INPUT TYPE=HIDDEN NAME=recordid VALUE ='".$row['TreatmentID']."' ><center><input type='image' value='submit' src='img/viewButton.png' width='105' height='37' /></center></FORM></td>
			  </tr>";
                               
                               
                               
                         }

                         mysql_close($con);


                         ?>

                         <tr height="25px">
                              <td width="15%" align="center"></td>
                              <td width="45%" align="center"></td>
                              <td width="25%" align="center"></td>
                              <td width="15%" align="center"></td>
                         </tr>
                         <tr height="25px">
                              <td width="15%" align="center"></td>
                              <td width="45%" align="center"></td>
                              <td width="25%" align="center"></td>
                              <td width="15%" align="center"></td>
                         </tr>
                    </table>
                    <div id="pager" class="pager">
                         <form>
                              <img src="../../images/first.png"
                                   class="first" /> <img
                                   src="../../images/prev.png"
                                   class="prev" /> <input type="text"
                                   class="pagedisplay" /> <img
                                   src="../../images/next.png"
                                   class="next" /> <img
                                   src="../../images/last.png"
                                   class="last" /> <select
                                   class="pagesize">
                                   <option value="2">2 per page</option>
                                   <option value="5">5 per page</option>
                                   <option value="8" selected="selected">8
                                        per page</option>

                              </select>
                         </form>
                    </div> <!--  script defer="defer">
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
