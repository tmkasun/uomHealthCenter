<?php
//Start session
session_start();
if($_SESSION['LoginStatus'] != "2")
{

     header('Location:../../index.php');

}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link href="../../css/style1.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
          <table border="0" width="50%" style="background: rgba(100, 200, 255, 0.3);border-radius:30px;">

               <tr>

                    <td colspan="3"><font color='#000000' face='Tahoma'
                         size='2.5'>Registration Number</font>
                    </td>
                    <td colspan="2"><label><font color='#000000'
                              face='Tahoma' size='2.5'> <?php echo $_SESSION['PATIENT_ID']; ?>
                         </font> </label>
                    </td>
                    <td align="center" colspan="2"></td>

                    <td align="center" colspan="2"><?php echo $_POST['regNo'];  ?>
                    </td>
               </tr>


               <?php


               //echo "regNo".$regNo;




               $regNo=$_SESSION['PATIENT_ID'];
              
               require("../../inc/config.php");

               $sql1="SELECT * FROM generalphysique WHERE generalphysique.StudentID= '". $regNo."'";

               $con =mysql_connect($dbhost, $dbuser, $dbpassword);

               if(!$con)
               {
                    die('Could not connect: ' . mysql_error());

               }

               mysql_select_db($dbdatabase, $con);

               $result1 = mysql_query($sql1,$con);

               $row1=mysql_fetch_array($result1);

               mysql_close($con);




               ?>

               <tr>

                    <td rowspan="2" height="58px" width="58px"
                         valign="top">
                         <div id="title">
                              <font color='#000000' face='Tahoma'
                                   size='2.5'>Chest Xray</font>
                         </div>
                         <div id="img"
                              style="background-color: #00FF99; height: 58px;"></div>
                         <div id="button"
                              style="position: relative; margin-top: 15px; width: 50px;"
                              align="center"></div>
                    </td>
                    <td width="50px" valign="top"><font color='#000000'
                         face='Tahoma' size='2.5'>Hr</font><br /> <input
                         type="text" disabled="disabled" size="5"
                         name="hr"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         value="<?PHP echo $row1['Hr'] ?>" />
                    </td>
                    <td width="50px" valign="top"><font color='#000000'
                         face='Tahoma' size='2.5'>Fr</font><br /> <input
                         type="text" size="5" disabled="disabled"
                         name="fr"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         value="<?PHP echo $row1['Fr'] ?>" />
                    </td>
                    <td width="50px" valign="top"><font color='#000000'
                         face='Tahoma' size='2.5'>INS</font><br /> <input
                         type="text" size="5" disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         name="ins" value="<?PHP echo $row1['Ins'] ?>" />
                    </td>
                    <td width="50px" valign="top"><font color='#000000'
                         face='Tahoma' size='2.5'>Chest Ex</font><br /> <input
                         type="text" size="5" disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         name="chestEx"
                         value="<?PHP echo $row1['chestEx'] ?>" />
                    </td>
                    <td width="50px" valign="top"><font color='#000000'
                         face='Tahoma' size='2.5'>INS</font><br /> <input
                         type="text" size="5" disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         name="cheins"
                         value="<?PHP echo $row1['che_INS'] ?>" />
                    </td>
                    <td width="50px" valign="top"><font color='#000000'
                         face='Tahoma' size='2.5'>Ch.INSP</font><br /> <input
                         type="text" size="5" disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         name="chinsp"
                         value="<?PHP echo $row1['ch_insp'] ?>" />
                    </td>
                    <td width="50px" valign="top"><font color='#000000'
                         face='Tahoma' size='2.5'>INS</font><br /> <input
                         type="text" size="5" disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         name="chins"
                         value="<?PHP echo $row1['ch_insp_ins'] ?>" />
                    </td>
               </tr>


               <tr valign="top">
                    <td colspan="3">
                         <table border="0" width="160px" align="center" >
                              <tr height="40px">
                                   <td align="center" colspan="2"
                                        valign="bottom"><font
                                        color='#000000' face='Tahoma'
                                        size='2.5'>Eyes</font>
                                   </td>
                              </tr>
                              <tr height="40px" valign="top">
                                   <td><font color='#000000'
                                        face='Tahoma' size='2.5'>L<br /> <input
                                             type="text" size="8"
                                             disabled="disabled"
                                             style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                                             name="eyeLeft"
                                             value="<?PHP echo $row1['eye_left'] ?>" />
                                   
                                   </td>
                                   <td><font color='#000000'
                                        face='Tahoma' size='2.5'>R</font><br />
                                        <input type="text" size="8"
                                        disabled="disabled"
                                        style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                                        name="eyeRight"
                                        value="<?PHP echo $row1['eye_right'] ?>" />
                                   </td>
                              </tr>
                         </table>
                    </td>

                    <td valign="middle"><font color='#000000'
                         face='Tahoma' size='2.5'>Glasses</font> <?php


                         if($row1['glasses']=='on')
                         {

                              echo "<input type='checkbox' name='glasses' id='glasses' style='font:Arial, Helvetica, sans-serif; color:#0000FF;' checked='CHECKED' />";


                         }
                         else{

                              echo "<input type='checkbox' name='glasses' id='glasses' style='font:Arial, Helvetica, sans-serif; color:#0000FF;' />";


                         }

                         ?></td>
                    <td colspan="3" valign="middle" align="center"><font
                         color='#000000' face='Tahoma' size='2.5'>Colour
                              Vision</font> <input type="text"
                         name="colourVision" size="14"
                         disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         value="<?PHP echo $row1['colour_vision'] ?>" />
                    </td>
               </tr>

               <tr>
                    <td colspan="8"><font color='#000000' face='Tahoma'
                         size='2.5'>Teeth</font></td>
               </tr>
               <tr height="100px" valign="top">
                    <td colspan="2" valign="top" align="center"><font
                         color='#000000' face='Tahoma' size='2.5'>Decay</font><br />
                         <input type="text" size="8" disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         name="decay"
                         value="<?PHP echo $row1['theeth_decay'] ?>" />
                    </td>
                    <td align="center"><font color='#000000'
                         face='Tahoma' size='2.5'>Mising</font><input
                         type="text" size="8" disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         name="missing"
                         value="<?PHP echo $row1['theeth_mising'] ?>" />
                    </td>
                    <td align="center"><font color='#000000'
                         face='Tahoma' size='2.5'>Filled</font><input
                         type="text" size="8" disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         name="filled"
                         value="<?PHP echo $row1['theeth_filled'] ?>" />
                    </td>
                    <td colspan="2" align="center"><font color='#000000'
                         face='Tahoma' size='2.5'>Dentures</font><br /> <input
                         type="text" size="8" disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         name="dentures"
                         value="<?PHP echo $row1['teeth_dentures'] ?>" />
                    </td>
                    <td colspan="2" align="center"><font color='#000000'
                         face='Tahoma' size='2.5'>Gingivitis</font><br />
                         <input type="text" size="8" disabled="disabled"
                         style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                         name="gingivitis"
                         value="<?PHP echo $row1['teeth_gingivitis'] ?>" />
                    </td>
               </tr>
               <table border="0" width="100%" style="background: rgba(100, 200, 255, 0.3);border-radius:30px;">

                    <tr align="left">
                         <td colspan="3"><font color='#000000'
                              face='Tahoma' size='2.5'>General Physique</font>
                         </td>
                    </tr>
                    <tr>
                         <td width="35%" align="left"><font
                              color='#000000' face='Tahoma' size='2.5'>POSTTURE</font>
                         </td>
                         <td width="8%" align="left"><font
                              color='#000000' face='Tahoma' size='2.5'>CONDITION</font>
                         </td>
                         <td width="52%" align="center"><font
                              color='#000000' face='Tahoma' size='2.5'>REMARKS</font>
                         </td>
                    </tr>
                    <tr>
                         <td align="left"><font color='#000000'
                              face='Tahoma' size='2.5'>EARS</font></td>
                         <td align="left"><input type="text" name="ears"
                              size="8" disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              value="<?PHP echo $row1['ears_cond'] ?>" />
                         </td>
                         <td align="center"><input type="text" size="54"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="earsinfo"
                              value="<?PHP echo $row1['ears_remarks'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td align="left"><font color='#000000'
                              face='Tahoma' size='2.5'>NOSE</font></td>
                         <td align="left"><input type="text" name="nose"
                              size="8" disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              value="<?PHP echo $row1['nose_cond'] ?>" />
                         </td>
                         <td align="center"><input type="text" size="54"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="noseinfo"
                              value="<?PHP echo $row1['nose_remarks'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td align="left"><font color='#000000'
                              face='Tahoma' size='2.5'>MOUTH</font></td>
                         <td align="left"><input type="text"
                              name="mouth" size="8" disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              value="<?PHP echo $row1['mouth_cond'] ?>" />
                         </td>
                         <td align="center"><input type="text" size="54"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="mouthinfo"
                              value="<?PHP echo $row1['mouth_remarks'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td align="left"><font color='#000000'
                              face='Tahoma' size='2.5'>THROAT</font></td>
                         <td align="left"><input type="text"
                              name="throat" size="8" disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              value="<?PHP echo $row1['throat_cond'] ?>" />
                         </td>
                         <td align="center"><input type="text" size="54"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="throatinfo"
                              value="<?PHP echo $row1['throat_remarks'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td align="left"><font color='#000000'
                              face='Tahoma' size='2.5'>TONSILS</font></td>
                         <td align="left"><input type="text"
                              name="tonsils" size="8"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              value="<?PHP echo $row1['tonsils_cond'] ?>" />

                         </td>
                         <td align="center"><input type="text" size="54"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="tonsilsinfo"
                              value="<?PHP echo $row1['tonsils_remarks'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td align="left"><font color='#000000'
                              face='Tahoma' size='2.5'>ABDOMEN</font></td>
                         <td align="left"><input type="text"
                              name="abdomen" size="8"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              value="<?PHP echo $row1['abdomen_cond'] ?>" />

                         </td>
                         <td align="center"><input type="text" size="54"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="abdomeninfo"
                              value="<?PHP echo $row1['abdomen_remarks'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td align="left"><font color='#000000'
                              face='Tahoma' size='2.5'>HERNIAL ORIFICES</font>
                         </td>
                         <td align="left"><input type="text"
                              name="hernial_orifices" size="8"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              value="<?PHP echo $row1['hernail_cond'] ?>" />

                         </td>
                         <td align="center"><input type="text" size="54"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="hernicalorficesinfo"
                              value="<?PHP echo $row1['hernail_remarks'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td align="left"><font color='#000000'
                              face='Tahoma' size='2.5'>GENITALIA</font></td>
                         <td align="left"><input type="text"
                              name="genitalia" size="8"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              value="<?PHP echo $row1['genitalia_cond'] ?>" />

                         </td>
                         <td align="center"><input type="text" size="54"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="genitaliainfo"
                              value="<?PHP echo $row1['genitalia_remarks'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td align="left"><font color='#000000'
                              face='Tahoma' size='2.5'>ANUS</font></td>
                         <td align="left"><input type="text" name="anus"
                              size="8" disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              value="<?PHP echo $row1['anus_cond'] ?>" />
                         </td>
                         <td align="center"><input type="text" size="54"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="anusinfo"
                              value="<?PHP echo $row1['anus_remarks'] ?>" />
                         </td>
                    </tr>
               </table>
               <table border="0" width="100%" style="background: rgba(100, 200, 255, 0.3);border-radius:30px;">
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>NERVOUS SYSTEM</font>
                         </td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="nervousSystem"
                              value="<?PHP echo $row1['NervousSystem'] ?>" />
                         </td>
                    </tr>

                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>VARICOSE VEINS</font>
                         </td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="vericoseveins"
                              value="<?PHP echo $row1['Varicose_Veins'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>B.P</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="bp"
                              value="<?PHP echo $row1['BP'] ?>" />
                         </td>
                    </tr>

                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>SKIN</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="skin"
                              value="<?PHP echo $row1['Skin'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>HAIR</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="hair"
                              value="<?PHP echo $row1['Hair'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>NAILS</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="nails"
                              value="<?PHP echo $row1['Nails'] ?>" /></td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>THYROID</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="thyroid"
                              value="<?PHP echo $row1['Thyroid'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>BREASTS</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="breasts"
                              value="<?PHP echo $row1['Breasts'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>HEART</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="heart"
                              value="<?PHP echo $row1['NervousSystem'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>H.b</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="hb"
                              value="<?PHP echo $row1['Hb'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>SKULL</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="skull"
                              value="<?PHP echo $row1['Skull'] ?>" /></td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>UPPER LIMBS</font>
                         </td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="upper_limbs"
                              value="<?PHP echo $row1['Upper_Limbs'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>LOWER LIMBS</font>
                         </td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="lower_limbs"
                              value="<?PHP echo $row1['Lower_Limbs'] ?>" />
                         </td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>SPINR</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="spine"
                              value="<?PHP echo $row1['Spine'] ?>" /></td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>THORAX</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="thorax"
                              value="<?PHP echo $row1['Thorax'] ?>" /></td>
                    </tr>
                    <tr>
                         <td width="32%"><font color='#000000'
                              face='Tahoma' size='2.5'>OTHERS</font></td>
                         <td width="68%"><input type="text" size="58"
                              disabled="disabled"
                              style="font: Arial, Helvetica, sans-serif; color: #0000FF;"
                              name="others"
                              value="<?PHP echo $row1['Others'] ?>" /></td>
                    </tr>
               </table>
          </table>
     </div>
</body>
</html>
