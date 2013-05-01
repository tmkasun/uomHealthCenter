<?php
mysql_connect("localhost","root","") or die(mysql_error()); // connect to the db
mysql_select_db("test") or die(mysql_error()); // selects the right db
	if($_REQUEST['checkNum']){ // if your load with ?checkNum=1 you just want to check if there is anything new (this is for optimization)
		$q = mysql_query("select count(*) as nb from notification where status = 0") or die(mysql_error());
		$r = mysql_fetch_array($q);
		echo $r[nb];
	} else { // otherwhise you want to load the info about the newest notification to display and set the status to 1 so it wont be displayed again
		$q = mysql_query("select * from notification where status = 0 order by id limit 1") or die(mysql_error());
		$r = mysql_fetch_array($q);
		mysql_query("update notification set status = 1 where id = $r[id]");
		echo $r[info];
	}
?>

