<?php

$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}

//---- initial GET
$fn = $_GET["fn"];

//#### initial values
$menu1 = "calendars";

//check login
if($_SESSION[su]!="")
{

	if($fn = "create"){
		$title = $_POST["title"];
		$address = $_POST["address"];
		$detail = $_POST["detail"];
		$date1 = $_POST["date1"];
		$date2 = $_POST["date2"];
		$time1 = $_POST["time1"];
		$time2 = $_POST["time2"];

		$this_time = date("Y-m-d H:i:s");
		header ("location: ./index.php?fn=now&success=1");

		$datetime1 = $date1." ".$time1.":00";
		$datetime2 = $date2." ".$time2.":00";

		$sql = "
		INSERT INTO social_iMing_calendar_detail 
		(title, address, detail, time_start, time_end, regis_date)
		VALUE
		('$title', '$address', '$detail', '$datetime1', '$datetime2', '$this_time')
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		$id = "";
		$sql = "
		SELECT calendar_id
		FROM social_iMing_calendar_detail 
		WHERE regis_date = '$this_time'
		AND
		title = '$title'
		AND
		address = '$address'
		AND
		detail = '$detail'
		";
		$result = mysql_query($sql);
		while($rs=mysql_fetch_array($result)){
			$id = $rs[calendar_id];
		}

		$sql = "
		INSERT INTO social_iMing_calendar_member 
		(calendar_id, member, admin)
		VALUE
		('$id', '$_SESSION[su]', 'y')
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());
		
	}
?>





<?php
mysql_close();
}	//end check login
?>
