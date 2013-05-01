<?php session_start();
//Start session

if($_SESSION['LoginStatus'] != "2")
{
     header('Location: index.php');
}

if($_POST){
     extract ( $_POST );
     $patientIndex = $_POST["StudentID"];
     session_register("PATIENT_ID");
     $_SESSION['PATIENT_ID'] = $_POST["StudentID"];
}
else if(isset($_GET['id'])){
     $_SESSION['PATIENT_ID']=$_GET['id'];
}
?>
<head>


<script type="text/javascript"
     src="../../javascripts/NewTreatmentAjax.js"></script>


<style type="text/css">
<!--
.style2 {
	color: #000000
}
-->
</style>
<style type="text/css">
.error {
	color: #d12f19;
	font-size: 12px;
}

.success {
	color: #006600;
	font-size: 12px;
}
</style>
</head>
<?php
/*new AJAX dropdown menu
 *
 */
include_once('../../inc/config.php');
$complains_list_query = "select * from complaint ORDER BY complaint ASC";
$diagnosis_list_query = "select * from diagnosis ORDER BY diagnosis ASC";
$treatment_list_query = "select * from treatment_type ORDER BY treatment_type ASC";

$diagnosis_result = mysql_query($diagnosis_list_query,$connection);
$complains_result = mysql_query($complains_list_query,$connection);

$treatment_result = mysql_query($treatment_list_query,$connection);
mysqli_close($connection);//close database connection after retreving data




?>
<body>
     <button class="def_button"
          style="position: relative; float: right; text-align: center;"
          onclick="slideup()" class="clear_bt" value="Go Back">Back</button>

     <table id="treatmentTable"
          style="margin-left: 25%; margin-right: 15%; background: rgba(100, 200, 255, 0.3); border-radius: 30px; border: none;"
          width="60%" height="300px">
          <tr>
               <td>

                    <table width="100%" height="524" border="1"
                         height="120px" cellpadding="0" cellspacing="0">
                         <tr valign="top">
                              <td width="34%" align="center"><font
                                   color='#000000' face='Tahoma'
                                   size='3'>Index No</font>
                              </td>
                              <td width="66%">
                                   <table border="0">
                                        <tr>
                                             <td width="31%"><input
                                                  disabled="disabled"
                                                  type="text" size="25"
                                                  name="regNo"
                                                  id="regNo"
                                                  style="color: fuchsia;"
                                                  value='<?php echo $_SESSION['PATIENT_ID']?>' />
                                             </td>
                                             <td><input type="hidden"
                                                  name="indexNum1" />
                                             </td>
                                        </tr>
                                   </table>
                              </td>
                         </tr>
                         <tr>
                              <td rowspan="2" valign="top"
                                   align="center"
                                   style="height: auto; width: 34%;"><p>
                                        <font color='#000000'
                                             face='Tahoma' size='3'>Date
                                             time</font>
                                   </p>

                                   <div id="container"
                                        style="height: 90px">
                                        <ul class="menu">

                                        </ul>
                                        <span class="clear"></span>
                                        <!-- ----------------------------------------------------------------------Debug---------------------------------------------------------------------- -->
                                        <!-- 	updateTreatment.php
																	UpdateTreatment.php
															
															 -->
                                        <div class="content"
                                             style="height: auto; overflow: auto;">

                                             <div id="loading"
                                                  style="height: 20px">
                                                  <img
                                                       src="../../images/loading.gif"
                                                       alt="Loading..." />
                                             </div>
                                             <ul>
                                             </ul>

                                        </div>
                                   </div>
                              </td>

                              <td width="66%" valign="top"><label><font
                                        color='#000000' face='Tahoma'
                                        size='3'>Complaint</font><br />
                                        <script type="text/javascript">
                                                  numberOfComplaintList = 0;
                                                  function onchangeComplaint(currentSelectList) {
													//alert(currentSelectList.id);
													numberOfComplaintList +=1;
                                                    //alert(numberOfComplaintList);
                                                    var currentComplaintObject = document.getElementById(currentSelectList.id);
                                                    var currentComplaintInnerHtml = currentComplaintObject.innerHTML;
                                                    //alert(currentComplaintInnerHtml);
                                                    var nextSelectObject = document.createElement("select"); 
                                                    //alert("complaint"+numberOfComplaintList);
                                                    nextSelectObject.setAttribute("id", "complaint"+numberOfComplaintList);
                                                    nextSelectObject.setAttribute("onchange", "if (this.selectedIndex) onchangeComplaint(this);");
                                                    nextSelectObject.setAttribute("class", "complaints_class");
                                                    
                                                    nextSelectObject.setAttribute("display", "none");                                                         
                                                    nextSelectObject.innerHTML = currentComplaintInnerHtml;  
                                                    var complaintParentElement = document.getElementById("complaint_div");
                                                    //complaintParentElement.appendChild(nextSelectObject); 
                                                    var removeIcon = document.createElement("img");
                                                    removeIcon.setAttribute("src", "../../images/new/mm/remove.ico");
                                                    removeIcon.setAttribute("onclick", "$(this).prev('select.complaints_class').remove();$(this).remove();");

                                                    
                                                    complaintParentElement.insertBefore(nextSelectObject, document.getElementById("new_complaint_input")); 
                                                    complaintParentElement.insertBefore(removeIcon, document.getElementById("new_complaint_input"));
                                                    
                                                    $("#complaint"+numberOfComplaintList).fadeIn();
                                                    $("#complaint"+numberOfComplaintList).focus();
                                                    //$("#complaint"+(numberOfComplaintList-1)).prop("disabled","disabled");
                                                    return 0;
                              
    												}

                                                  </script> <input
                                        disabled="disabled"
                                        style="display: none;" />
                                        <div id="complaint_div"
                                             style="height: auto; overflow: auto; border: none; margin: 0;">
                                             <select
                                                  class="complaints_class"
                                                  id="complaint0"
                                                  name="complaint"
                                                  onchange="if (this.selectedIndex) onchangeComplaint(this);">
                                                  <option
                                                       style='font-size: 13pt; width: 220px;'>Complaint</option>
                                                       <?php
                                                       while ($complaint= mysql_fetch_assoc($complains_result)) {
                                                            print "<option style='font-size: 13pt;width: 220px;'>".$complaint["complaint"]."</option>";

                                                       }?>
                                             </select>


                                             <!-- Old Text area replaced with new AJAX dropdown list -->
                                             <!-- textarea name="textarea2" id="textarea2" rows="6" cols="40"></textarea -->
                              
                              </label> <br /> <input
                                   id="new_complaint_input"
                                   onclick="addNewComplaint('complaint')"
                                   placeholder="Add or Remove complaint"
                                   style="margin-top: 10px;" />
                              </td>

                         </tr>
                         <tr>
                              <td style="height: auto; width: 100%;"><label><font
                                        color='#000000' face='Tahoma'
                                        size='3'>Diagnosis</font><br />
                                        <script type="text/javascript">
                                                  var numberOfDiagnosisList = 0;
                                                  function onchangeDiagnosis(currentSelectList) {
                                                                 //alert(currentSelectList.id);
                                                    numberOfDiagnosisList +=1;
                                                    //alert(numberOfDiagnosisList);
                                                    var currentDiagnosisObject = document.getElementById(currentSelectList.id);
                                                    var currentDiagnosisInnerHtml = currentDiagnosisObject.innerHTML;
                                                    //alert(currentComplaintInnerHtml);
                                                    var nextSelectObject = document.createElement("select"); 
                                                    //alert("complaint"+numberOfComplaintList);
                                                    
                                                    nextSelectObject.setAttribute("id", "diagnosis"+numberOfDiagnosisList);
                                                    nextSelectObject.setAttribute("onchange", "if (this.selectedIndex) onchangeDiagnosis(this);");
                                                    nextSelectObject.setAttribute("class", "diagnosis_class");
                                                    
                                                    nextSelectObject.setAttribute("display", "none");                                                         
                                                    nextSelectObject.innerHTML = currentDiagnosisInnerHtml;  
                                                    var diagnosisParentElement = document.getElementById("diagnosis_div");
                                                    //complaintParentElement.appendChild(nextSelectObject); 
                                                    
                                                    
                                                    var removeIcon = document.createElement("img");
                                                    removeIcon.setAttribute("src", "../../images/new/mm/remove.ico");
                                                    removeIcon.setAttribute("onclick", "$(this).prev('select.diagnosis_class').remove();$(this).remove();");
                                                   
                                                    
                                                    diagnosisParentElement.insertBefore(nextSelectObject, document.getElementById("new_diagnosis_input")); 
                                                      
                                                    diagnosisParentElement.insertBefore(removeIcon, document.getElementById("new_diagnosis_input"));
                                                    
                                                    
                                                    $("#diagnosis"+numberOfDiagnosisList).fadeIn();
                                                    $("#diagnosis"+numberOfDiagnosisList).focus();
                                                    //$("#complaint"+(numberOfComplaintList-1)).prop("disabled","disabled");
                                                    return 0;
                              
                                                            }

                                                  </script>
                                                  <input
                                        disabled="disabled"
                                        style="display: none;" />
                                        <div id="diagnosis_div"
                                             style="height: auto; overflow: auto; border: none; margin: 0px;">
                                             <select id="diagnosis0"
                                              class="diagnosis_class"
                                                  onchange="if (this.selectedIndex) onchangeDiagnosis(this);">
                                                  <option
                                                       style='font-size: 13pt; width: 220px;'>Diagnosis</option>
                                                       <?php
                                                       while ($diagnosis= mysql_fetch_assoc($diagnosis_result)) {
                                                            print "<option style='font-size: 13pt;width: 220px;'>".$diagnosis["diagnosis"]."</option>";

                                                       }?>
                                             </select> 
                                             <input
                                                  onclick="addNewComplaint('diagnosis')"
                                                  id="new_diagnosis_input"
                                                  placeholder="Add or Remove Diagnosis"
                                                  style="margin-top: 10px;" />

                                        </div>
                                        </div> <!-- Old textarea replaced with ajax dropdown menu -->
                                        <!-- textarea name="textarea3" id="textarea3" rows="6" cols="40"></textarea -->
                              </label>
                                   <table border="0"
                                        style="margin-top: 30px;">
                                        <tr>
                                             <td height="30"
                                                  align="left"><label><font
                                                       color='#000000'
                                                       face='Tahoma'
                                                       size='3'>Investigations</font>

                                             </label><br /> <select
                                                  name="investigation"
                                                  id="investigation">
                                                       <option
                                                            value="None">None</option>
                                                       <option
                                                            value="LiverProfile">LiverProfile</option>
                                                       <option
                                                            value="FBCESR">FBC/ESR</option>
                                                       <option
                                                            value="Chloride">Chloride</option>
                                                       <option
                                                            value="BglucoseFasting">B.Glucose
                                                            Fasting</option>
                                                       <option
                                                            value="LipidProfile">Lipid
                                                            Profile</option>

                                                       <option
                                                            value="FBS">FBS</option>

                                                       <option
                                                            value="RBS">RBS</option>


                                                       <option
                                                            value="PPBS">PPBS</option>

                                                       <option
                                                            value="FBC">FBC</option>

                                                       <option
                                                            value="ESR">ESR</option>
                                                       <option
                                                            value="UFR">UFR</option>

                                             </select>
                                                  <button
                                                       onclick="submitInvestigation()">Submit</button>
                                             </td>
                                        </tr>
                                   </table>
                              </td>
                         </tr>
                         <tr>
                              <td height="155" width="100%"
                                   align="center" valign="top"><label>
                                        <table border="1" width="100%">
                                             <div >
                                                  <tr>
                                                       <td width="30%"
                                                            align="center"
                                                            bgcolor="#FFFFFF"
                                                            rowspan="2"><input
                                                            type="button"
                                                            name="submitTreatment"
                                                            id="submitTreatment"
                                                            value="submit Treatment"
                                                            class="submit" />
                                                       </td>
                                                       <td
                                                            bgcolor="#FFFFFF"
                                                            rowspan="2"><span
                                                            class="error"
                                                            style="display: none">
                                                                 Please
                                                                 Enter
                                                                 Valid
                                                                 Data </span>
                                                            <span
                                                            class="success"
                                                            style="display: none">
                                                                 Treatment
                                                                 Successfully
                                                                 sent...
                                                                 <a
                                                                 href="doctor_treatment.php"
                                                                 style="color: #0066CC; font-weight: bold">
                                                                      Click
                                                                      For
                                                                      a
                                                                      New
                                                                      Treatment
                                                            </a> </span>
                                                       </td>

                                                  </tr>

                                             </div>
                                        </table> </label>
                              </td>
                              <td style="height: auto;">
                                   <p>
                                        <font color='#000000'
                                             face='Tahoma' size='3'>Treatment</font>
                                   </p>
                                   <p>
                                        <label> </label>
                                   
                                   <div
                                        style="height: auto; overflow: auto; border: none; margin: 0;">

                                        <select id="treatment" multiple>
                                             <option selected="selected"
                                                  style="font-size: 13pt; width: 220px;">Treatment</option>

                                                  <?php
                                                  while ($treatment= mysql_fetch_assoc($treatment_result)) {
                                                       print "<option style='font-size: 13pt;width: 220px;'>".$treatment["treatment_type"]."</option>";

                                                  }?>
                                             <option
                                                  style="font-size: 13pt; width: 220px; color: red;">No
                                                  Treatment</option>

                                        </select> <input
                                             onclick="addNewComplaint('treatment_type')"
                                             placeholder="Add or Remove treatment"
                                             style="margin-top: 10px;" />


                                   </div> <!--  textarea name="textarea5" id="textarea5"
																	rows="7" cols="40"></textarea --> <input type="hidden"
                                   name="refDoctor" id="refDoctor"
                                   value='<?php echo $_SESSION['USERNAME']?>' />
                                   </p>
                              </td>
                         </tr>
                    </table>
               </td>


          </tr>


     </table>

</body>
</html>
