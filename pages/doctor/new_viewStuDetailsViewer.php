<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "2")
{
     header('Location: ../../index.php');

}



$regNumber = $_GET["reg_number"];
$_SESSION['USER'] = $regNumber;





?>



<link
     href="../../css/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.style2 {
	color: #000000
}
-->
</style>


<body>


          <div id="main_form_pane">
               <!--Start main_form_pane -->

               <div>
                    <table border="0" width="96%" cellpadding="1"
                         cellspacing="1">
                         <tr>
                              <form name="searchinfo"
                                   action="<?php echo $_SERVER['PHP_SELF'] ?>"
                                   method="post">
                                   <td width="20%"><font color='#000000'
                                        face='Tahoma' size='2'>Index
                                             Number:</font></td>
                                   <td width="50%"><input type="text"
                                        size="20" name="live" /></td>
                                   <td width="26%"><input type="submit"
                                        name="editInfoSerarch"
                                        value="Search" /></td>
                              </form>
                         </tr>
                         <?php

                         if(isset($_POST[live])== TRUE)
                         {
                              $key = $_POST[live];
                              getData($key);
                         }
                         else
                         if(isset($_POST[search])== TRUE)
                         {
                              $key = $_POST[search];
                              getData($key);

                         }

                         function getData($key){
                              require("../../inc/config.php");
                              $query1 = "SELECT * FROM student WHERE StudentID = '". $key."'";
                              $query2 = "SELECT Image_ID FROM images WHERE StudentID = '". $key."'";

                              if ( !( $database = mysql_connect($dbhost, $dbuser, $dbpassword) ) )
                              die( "Could not connect to database" );
                               
                              // open db database
                              if ( !mysql_select_db( "healthCenterDatabase", $database ) )
                              die( "Could not open database" );
                              // execute query in db database
                              if ( !( $result1 = mysql_query( $query1, $database ) )  ) {
                                   print( "Could not execute query1! <br />" );
                                   die( mysql_error() );
                              }
                              $row = mysql_fetch_row($result1);

                              if ( !( $result2 = mysql_query( $query2,$database ) )  ) {
                                   print( "Could not execute query1! <br />" );
                                   die( mysql_error() );
                              }
                              $row2 =mysql_fetch_row($result2);

                              $imgId=$row2[0];

                               
                              $_SESSION['PATIENT_ID'] =  $row[0]; //set $_SESSION['PATIENT_ID'] to student registration number
                              echo" <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>Name    : </font>
				  </td>
				  <td ><font color='#000000'><h3><textarea cols='25' disabled='disabled' style='Tahoma; color:#0000FF;'  rows='2' name='stName' id='stName'>".$row[1]."</textarea></h3></font>
				  </td>
				  <td rowspan=".'2'." width=".'18%'." align=".'center'."height><img width=".'100'. "height=".'100'." src='".$config_basedir."/images/".$row[10]."'></td>
			   </tr>
			    <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>StudentID:</font>
				  </td>
				   <td ><font color='#000000'><h3><input type='text' size='20' name='stId' id='stId' disabled='disabled' style='Tahoma; color:#0000FF;'  value='".$row[0]."'/></h3></font>
				  </td>
				 
				  
			   </tr>
			    <tr>
			      <td><font color='#000000' face='Tahoma' size='2'> Date of Birth :</font>
				  </td>
				  <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled'style='Tahoma; color:#0000FF;' name='sDob' id='sDob' value='".$row[4]."'/></h3></font>
				  </td>
				  
			   </tr>
			    <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>Gender:</font>
				  </td>
				  <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled' style='Tahoma; color:#0000FF;' name='gender' id='gender' value='".$row[5]."'/></h3></font>
				  </td>
			   </tr>
			    <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>Faculty    :</font>
				  </td>
				  <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled' style='Tahoma; color:#0000FF;' name='stFaculty' id='stFaculty' value='".$row[7]."'/></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>Maritalstatus: </font>
				  </td>
				  <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled' style='Tahoma; color:#0000FF;' name='mStatus' id='mStatus' value='".$row[6]."'/></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>Religion: </font>
				  </td>
				  <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled' style='Tahoma; color:#0000FF;' name='religion' id='religion' value='".$row[8]."'/></h3></font>
				  </td>
			   </tr>
			   
			   <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>Nationality:</font>
				  </td>
				  <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled' style='Tahoma; color:#0000FF;' name='nationality' id='nationality' value='".$row[9]."'/></h3></font>
				  </td>
			   </tr>
			   
			   
			   
			   
			   <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>Current Address:</font>
				  </td>
				  <td ><font color='#003399'><h3><textarea cols='25' name='currAdd' disabled='disabled'style='Tahoma; color:#0000FF;' id='currAdd' rows='3'>".$row[2]."</textarea></h3></font>
				  </td>
			   </tr>
			   <tr>
			      <td><font color='#000000' face='Tahoma' size='2'>Permanent Address: </font>
				  </td>
				  <td ><font color='#003399'><h3><textarea name='permAdd' id='permAdd' disabled='disabled' style='Tahoma; color:#0000FF;' cols='25' rows='3'>".$row[3]."</textarea></h3></font>
				  </td>
			   </tr>";
			   
			   }
			   
			   ?>


                         </tr>

                    </table>

               </div>

          </div>
          <!--End of main_form_pane -->
     </div>
     <!--End of main content -->

     </div>
     <!--End of content-->

     <div id="footer"></div>


     </div>
     <!--End of wrapper_loggin -->
     </div>
     <!--End of wrapper -->

</body>
</html>
