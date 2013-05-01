<?php
    // again we check the $_GET variable
    if(isset($_GET['image_id']) && is_numeric($_GET['image_id'])) {
        $sql = "SELECT image_type, image_size, image_name FROM testblob WHERE image_id=".$_GET['image_id'];
		
 
        $link = mysql_connect("localhost", "root", "") or die("Could not connect: " . mysql_error());
 
        // select our database
        mysql_select_db("medicalcenterdb") or die(mysql_error());
 
        $result = mysql_query($sql)  or die("Invalid query: " . mysql_error());
 
        while($row=mysql_fetch_array($result)) {
            echo 'This is '.$row['image_name'].' from the database<br />';
           // echo '<img '.$row['image_size'].' src="file.php?image_id='.$_GET['image_id'].'">';
			echo '<img width='.'100'. 'height='.'100'.' src="file.php?image_id='.$_GET['image_id'].'">';

			
        }
    }
    else {
        echo 'File not selected';
    }
?>