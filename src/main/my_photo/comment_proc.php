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
$menu1 = "photo";

//check login
if($_SESSION[su]!="")
{
	if($fn == "comment" || $fn == "comment_avatar"){

		$image_id = $_POST["image_id"];
		$pic = $_POST["pic"];
		$own_body = $_POST["own_body"];
		$comment = $_POST["comment"];
		// it is insert comment to DB
		if($comment != "")
		{
			if($fn == "comment_avatar"){
				if($own_body == "")
					header ("location: ".$rootpath."main/profile_pic/choose_pic?pic=".$pic);
				elseif($own_body != "")
					header ("location: ".$rootpath."main/profile_pic/choose_pic?friend=".$own_body."&pic=".$pic);
			}
			elseif($fn == "comment"){
				if($own_body == "")
					header ("location: ./index.php?pic=".$pic);
				elseif($own_body != "")
					header ("location: ./index.php?friend=".$own_body."&pic=".$pic);
			}
			$SQL_comment="insert into social_iMing_comment_images (username, username_from, image_id, comment, post_time) values('$own_body', '$_SESSION[su]', '$image_id', '$comment', NOW())";
			$result_comment=mysql_query($SQL_comment);
			if(!$result_comment)die(mysql_error());
		}
	}// end fn = comment
?>


<?php
mysql_close();
}	//end check login
?>
