<?

$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=0;

//---- initial
$fn = $_GET["fn"];

//#### initial values
$menu1 = "calendars";

//check login
if($_SESSION[su]!="")
{
	if($fn == "date"){
		$calendar_id = $_POST["calendar_id"];
		$comment_text = $_POST["comment_text"];
		if($calendar_id != "" && $comment_text != ""){
			header ("location: ./index.php?fn=read&topic=".$calendar_id."&success=1");
			$sql = "
			INSERT INTO `social_iMing_comment_calendar` 
			(`username_from`, `calendar_id`, `comment_text`, `post_time`) 
			VALUES
			('$_SESSION[su]', '$calendar_id', '$comment_text', CURRENT_TIMESTAMP)";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());
		}// end !calendar and !comment_text
	}// end fn = date
?>


<?php
mysql_close();
}	//end check login
?>
