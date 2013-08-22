<?php
$rootpath ="../../../../";
$subpath = "main/profile_pic/";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
// var_dump($_SESSION);
if (!$db->open()){
	die($db->error());
}
if($_SESSION[su]!="")
{
	$targ_w = $targ_h = 150;
	$jpeg_quality = 100;
	
	$userID="";
	$sql = "
		SELECT `userID` FROM `social_iMing_customer_v3`
		WHERE `username`='".$_SESSION["su"]."';
	";
	$result = mysql_query($sql);
	if($rs = mysql_fetch_array($result)){
		$userID = $rs["userID"];
	}

	$src = $rootpath.$subpath.'lib/Jcrop/temp/'.$userID.'_'.$_POST["lastTime"].'.png';
	
	## for set a file name
	// $randomkey = strtotime(date('Y-m-d H:i:s'));
	$randomkey = microtime(true)*10000;
	
	$savePath = $rootpath."images/profile_picture/{$userID}_{$randomkey}.jpg";
	$url = "{$userID}_{$randomkey}.jpg"; #_{$_POST['lastTime']}";
	$img_r = imagecreatefrompng($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);

	imagejpeg($dst_r,$savePath,$jpeg_quality);
	
	unlink($src);
	
	##insert image_url into database
	$sql = "
		INSERT INTO `social_iMing_images` (
			`username`, `image_album`, `url`, `record_date`
		) value (
			'{$_SESSION['su']}', 'Profile Picture', '$url', now()
		);
	";
	$result = mysql_query($sql);
	if(!$result)die(mysql_error());
}
?>