<?php
    // just so we know it is broken
    error_reporting(E_ALL);
    // some basic sanity checks
    
        //connect to the db
        $link = mysql_connect("localhost", "root", "") or die("Could not connect: " . mysql_error());
 
        // select our database
        mysql_select_db("medicalcenterdb") or die(mysql_error());
 
        // get the image from the db
        $sql = "SELECT image FROM images WHERE image_id=".$_GET['image_id'];
 
        // the result of the query
        $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
 
        // set the header for the image
		//header("Content-type: image/jpeg");
		
		header("Content-type: image/jpeg");
		echo mysql_result($result, 0);
		
		
		
 
        // close the db link
        mysql_close($link);
   
?>