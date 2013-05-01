<?php session_start(); ?>
<!DOCTYPE HTML>
    
<?php 
error_reporting(E_PARSE);
//$_SESSION['reg_number'].$_SESSION['name'].$_SESSION['cname'].$_SESSION['pno'].$_SESSION['school'].$_SESSION['home']
?>
<html>
    <head>

    </head>
<body >

    <?php
    if($_SESSION['loginStatus'] !=2)
	die("Please login to system !");
     
	require '../../inc/config.php';
    //get reg_number from session or get method
     
    $reg_number = $_GET["reg_number"];
    $_SESSION["PATIENT_ID"] = $_GET["reg_number"];
        //get reg_number from session or get method --end
    //mysql query part to retrive data
    $query = "select * from student where StudentID = '$reg_number'";
    $qued = mysql_query($query,$connection);
    $result = mysql_fetch_array($qued);
    $path = "./profile_photos/".$reg_number."/".$reg_number.".".strtolower(end(explode(".",$result['profile_pic'])));
    //mysql query part to retrive data --end
    //degubing 
    //print $result["name"].$result["cname"].$result["reg_number"].$result["profile_pic"].$result["sex"].$result["school"].$pno[1].$pno[2];
    
    //degubing --end
    
    ?>
<div id="td" align = "center" style = "boarder:0;width:100%;" >
    <button class="def_button" style="position: relative;float: right;text-align: center;" onclick="slideup()" class="clear_bt" value = "Go Back" >Back</button>


<div id="profile_pic_div" style="position: relative;margin: 0px auto;width: 50%;height: auto;">
    <img id="profile_pic" onmouseover="hover_profilepic_message()" onclick="window.open('<?php echo  $result['imageUrl']; ?>','location=no','menubar=no','toolbar=no','titlebar=no','status=no');" src = "<?php print $result['imageUrl']; ?>" alt="<?php print $result['FullName'] ;?>" width="20%" height="40%"></img>
</div>
<table style="background: rgba(100, 200, 255, 0.3);border-radius:30px;">
<tr>
                     <td><font color='#000000' face='Tahoma' size='4'>Name    : </font>
                      </td>
                      <td ><font color='#000000'><h3><textarea cols='25' disabled='disabled' style='Tahoma; color:#0000FF;font-size: 12pt;'  rows='2' name='stName' id='stName'><?php print $result["FullName"]?> </textarea></h3></font>
                      </td>
                      <td rowspan="2" width="18%" align="center" ><img width="100 "height="100" src='".$config_basedir."/images/".$row[10]."'></td>
                  </tr>
                   <tr>
                     <td><font color='#000000' face='Tahoma' size='4'>StudentID:</font>
                      </td>
                       <td ><font color='#000000'><h3><input type='text' size='20' name='stId' id='stId' disabled='disabled' style='Tahoma; color:#0000FF;font-size: 12pt;'  value='<?php print $result["StudentID"]?>'/></h3></font>
                      </td>
                     
                      
                  </tr>
                   <tr>
                     <td><font color='#000000' face='Tahoma' size='4'> Date of Birth :</font>
                      </td>
                      <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled'style='Tahoma; color:#0000FF;font-size: 12pt;' name='sDob' id='sDob' value='<?php print $result["DOB"]?>'/></h3></font>
                      </td>
                      
                  </tr>
                   <tr>
                     <td><font color='#000000' face='Tahoma' size='4'>Gender:</font>
                      </td>
                      <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled' style='Tahoma; color:#0000FF;font-size: 12pt;' name='gender' id='gender' value='<?php print $result["Gender"]?>'/></h3></font>
                      </td>
                  </tr>
                   <tr>
                     <td><font color='#000000' face='Tahoma' size='4'>Faculty    :</font>
                      </td>
                      <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled' style='Tahoma; color:#0000FF;font-size: 12pt;' name='stFaculty' id='stFaculty' value='<?php print $result["Faculty"]?>'/></h3></font>
                      </td>
                  </tr>
                  <tr>
                     <td><font color='#000000' face='Tahoma' size='4'>Maritalstatus: </font>
                      </td>
                      <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled' style='Tahoma; color:#0000FF;font-size: 12pt;' name='mStatus' id='mStatus' value='<?php print $result["Maritalstatus"]?>'/></h3></font>
                      </td>
                  </tr>
                  <tr>
                     <td><font color='#000000' face='Tahoma' size='4'>Religion: </font>
                      </td>
                      <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled' style='Tahoma; color:#0000FF;font-size: 12pt;' name='religion' id='religion' value='<?php print $result["Religion"]?>'/></h3></font>
                      </td>
                  </tr>
                  
                  <tr>
                     <td><font color='#000000' face='Tahoma' size='4'>Nationality:</font>
                      </td>
                      <td ><font color='#003399'><h3><input type='text' size='20' disabled='disabled' style='Tahoma; color:#0000FF;font-size: 12pt;' name='nationality' id='nationality' value='<?php print $result["Nationality"]?>'/></h3></font>
                      </td>
                  </tr>
                  
                  
                  
                  
                  <tr>
                     <td><font color='#000000' face='Tahoma' size='4'>Current Address:</font>
                      </td>
                      <td ><font color='#003399'><h3><textarea cols='25' name='currAdd' disabled='disabled'style='Tahoma; color:#0000FF;font-size: 12pt;' id='currAdd' rows='3'><?php print $result["CurrentAdd"]?></textarea></h3></font>
                      </td>
                  </tr>
                  <tr>
                     <td><font color='#000000' face='Tahoma' size='4'>Permanent Address: </font>
                      </td>
                      <td ><font color='#003399'><h3><textarea name='permAdd' id='permAdd' disabled='disabled' style='Tahoma; color:#0000FF;font-size: 12pt;' cols='25' rows='3' ><?php print $result["PermAdd"]?></textarea></h3></font>
                      </td>
                  </tr>

</table>




<br/>



</div>

</body>
</html>
