<?php session_start();?>
<!DOCTYPE html>

<head>
<meta name="keywords" content="information" />
<meta name="author"
     content="Faculty Of Information Technology University of Moratuwa" />
<meta name="description" content="University Of Moratuwa Medical Center" />
<!-- meta charset="UTF-8"/ -->





<script type="text/javascript" src="../../javascripts/NewTreatmentAjax.js"></script>


<link rel="stylesheet" href="../../css/styles.css" type="text/css" />
<link rel="shortcut icon" href="../../images/fav.png" />
<script src="../../javascripts/new/jquery-1.8.3.js"></script>
<script src="../../javascripts/new/jquery-ui-1.9.2.js"></script>
<script type="text/javascript" src="../../javascripts/new/ajaxSupport.js">
		
	</script>
</head>
<?php
//bugs = user can enter same
//bugs = phone number as new phone number and unutilized pre_phone_numbers table coz it is using datetime(updated_on) as primary key
error_reporting(E_PARSE);
// more details after every row
// use can change their details
//color the column

if(!isset($_SESSION["USERID"])){
     header("location:../../index.php");
     print "You are not loged in,please login to continue";
     die();
}


if($_SERVER[REMOTE_ADDR] == '127.0.0.1'){
     include_once('../../inc/new/local.php');
}
else
include_once('../../inc/new/server.php');

$get_user_details = "select UserID,Name,AccountType,loginStatus from user where UserID = '$_SESSION[USERID]'";

$result = mysql_query($get_user_details,$connection);//query send to mysql database to check username and password

$user_details = mysql_fetch_array($result);
//can replace with ligin.php $_SESSION variables 
$_SESSION['Name'] = $user_details['Name'];
$_SESSION['UserID'] = $user_details['UserID'];
$_SESSION['AccountType'] = $user_details['AccountType'];
$_SESSION['loginStatus'] = $user_details['loginStatus'];


?>
<title><?php echo $_SESSION['Name'] ?> Welcome Health Center</title>
<!-- style="background: rgba(0, 0, 0, 0.5);" set this style to body when onening previous treatment details -->
<body
     id="body" onload="ani()" >
     <div id="top_bar">
          <div id="hello"
               style="position: relative; margin: 0; margin-left: 2%; margin-bottom: 0%; padding-top: 1%;">
               <a style="text-decoration: none; font-size: 10pt;">Welcome
               </a> <a onclick="ajax_profile()" id="name_dis"
                    onmouseout="name_dis('<?php echo $user_details['Name']; ?>',2)"
                    onmouseover="name_dis('<?php echo $user_details['UserID']; ?>',1)"
                    style="color: #3333FF; background-color: #B2E6FA; font-size: 13pt;"><?php print $user_details['Name']; ?>
               </a>

               <div id="hello"
                    style="position: relative; margin: 0; margin-right: 2%; margin-bottom: 0%; padding-top: 0%; float: right;">
                    <a href="../../inc/logout.php" target="_self"> <font
                         size="3pt" color='#341919'>Logout:<?php print $_SESSION[USERID] ?>
                    </font> </a>
               </div>
          </div>

     </div>


     <div id="welcom_msg">
          <p style="text-align: center; opacity: 1.0;">
               <br /> <font
                    style="color: #005FBF; background: transparent; top: 20%; font-size: 15pt;">Enter
                    an Index number to search! </font>
          </p>

          <div id="search_div"
               style="position: relative; top: -5px; text-align: center; z-index: 2;">
               <form action="new_doctor.php" method="post"
                    onsubmit="return ajax_search()">
                    <!-- img style="position: relative;float: right;" src="../../images/new/mm/sp.gif" id="search_image" / -->
                    <input type="text" name="query"
                         onchange="search_f()" placeholder="Search"
                         id="search" onkeyup="ajax_search()"
                         onfocus="scrch()"
                         onblur="$('#ajax_loading_div').fadeOut('fast')"
                         required="required" autofocus="autofocus"
                         style="padding: 4px; font-size: large; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);" />
                    <input type="submit"
                         style="position: relative; float: left; margin-left: 20px; visibility: hidden;"
                         value="search" target="_self" name="search" />
               </form>
          </div>

     </div>
     <!-- administrator cheack script -->
     <?php
     //administrator cheack script
     if($_SESSION['loginStatus'] === "1"){



          ?>
     <a href="./admin/upload.php">Upload a file</a>
     <div id="admin"
          style="position: fixed; z-index: 30; width: auto; right: 0px; top: 90%; background-color: #123456; border-radius: 10px; background: rgba(75, 103, 255, 0.8); float: right; text-align: center; box-shadow: 0px 0px 20px 1px #FF0400;">
          <a id="admin" onclick="ajax_admin()"
               style="font-size: 9pt; color: #0000FF;"> Admin </a>
     </div>
     <?php
     }
     //administrator cheack script edn --
     ?>
     <!-- administrator cheack script -->
<div id="navigation_pane" style="position: fixed;float: left;height: auto;width: 10%;margin-top: 12%;margin-left: 5%;z-index: 40;display: none;">


<button type="button" class="navigation_button" id="treatment_button" onclick="loadTreatmentPage(this)" style="color: #CC0066;font-size: large;float: left;" >Treatment</button>
<button type="button" class="navigation_button" id="Precords_button" onclick="loadPrecordsPage(this)" style="color: #66CCFF;font-size: large;float: left;" >Personnal Records</button>
<button type="button" class="navigation_button" id="Cexamination_button" onclick="loadCexaminationPage(this)" style="color: #66CCFF;font-size: large;float: left;" >Clinical Examination</button>
<button type="button" class="navigation_button" id="Fhistory_button" onclick="loadFhistoryPage(this)" style="color: #66CCFF;font-size: large;float: left;" >Family History</button>
<button type="button" class="navigation_button" id="Mhistory_button" onclick="loadMhistoryPage(this)" style="color: #66CCFF;font-size: large;float: left;" >Medical History</button>
<button type="button" class="navigation_button" id="Ntreatment_button" onclick="loadTreatmentPage(this)" style="color: #66CCFF;font-size: large;float: left;" >New Treatment</button>

</div>
     <div id="pre_treatment_details" style="position: fixed;width: 40%;height: auto;margin-left: 25%;margin-right: 25%;background: rgba(123,98,159, 0.9);margin-top: 13%;border-radius: 12px;z-index: 50;display: none;box-shadow: 0px 0px 20px 1px #000000;">
     <img onclick="close_preTreatmentDetails()" alt="close" src="../../images/new/mm/no.ico" style="position: relative;float: right;">
     </div>
     
     <div id="result_box">
     </div>
     
     <div id="ajax_loading_div" class="loading_div">
          <img id="loading_ajax" src="../../images/new/mm/c_loading.gif" />
     </div>

     <!-- feedback form -->
     <!--  div id="feedbacks_dv"
          style="position: fixed; float: left; z-index: 3; width: auto; height: auto; margin: 0; padding: 0; bottom: 36px; border-radius: 7px;">
          <img id="feedbacks_dv_close_img" height="16px" width="16px"
               src="../../images/new/mm/no.ico"
               style="display: none; position: relative; float: right;"
               onclick="feedback_div_close_function()" />
          <form style="border: 0; margin: 0;">
               <textarea id="feedback_tx" type="text"
                    placeholder="Enter any feedback........"
                    style="display: none; border-radius: 7px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5) background-color:      rgba(16, 102, 117, 0.5); border: 1px solid; -webkit-box-shadow: inset 0 1px 1px #96F2B7; border-color: #5C98B2 #4591AD #8B5E91;"
                    required rows="4" cols="47"></textarea>
               <br />

               <button id="feedback_bt"
                    style="margin: 0; height: 0 auto; padding: 0;"
                    type="button" class="def_button" onclick="feedbk()">Send
                    Feedback</button>
               <button id="feedback_rs" type="reset"
                    style="display: none; padding: 0; margin: 0;"
                    class="def_button">Reset</button>
          </form>
     </div-->

     <!-- footer scroling bar -->
     <div
          style="box-shadow: 0px 0px 15px 5px #DBDBDB; bottom: 0px; border-bottom: solid; border-bottom-color: blue; position: fixed; z-index: 5; background-image: url('../../images/new/mm/sprite.png'); background-position: 0 -230px; border: 0px; float: left; width: 100%; height: 36px;">

          <!--  div
               style="text-align: center; position: relative; top: 10px; width: auto; float: none; margin-left: auto;">
               <div id="footer"
                    style="width: auto; position: relative; margin: 0; text-align: center;">
                    <?php
				$last_modified_number_query = "call last_modified_number()";

				$last_modified_number_result = mysql_query($last_modified_number_query,$connection);//query send to mysql database to check username and password

				$last_modified_number = mysql_fetch_array($last_modified_number_result);

				?>
                    <a style="font-size: large">Latest Update:></a><a
                         onclick="clk('<?php echo $last_modified_number['USERID']; ?>')"
                         style="color: #C2C247;" target='_blank'><?php echo  $last_modified_number['cname']."(".$last_modified_number['USERID'].")"." has changed his number <font style='color: #26FF1E;'>".$last_modified_number['pre_phone_number']."</font> to <font style='color: #FF4F1E;'>".$last_modified_number['new_phone_number']."</font> on ".$last_modified_number['updated_on']; ?>
                    </a><a style="font-size: large"></a>
               </div>

          </div-->
     </div>
     <!--  end of footer scrolling bar -->


     <!-- feedback form end -->

</body>
