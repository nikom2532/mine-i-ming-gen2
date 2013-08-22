<?

$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}

//### initial value
$fn = $_POST["fn"];
$menu1 = "photo";

//check login
if($_SESSION[su]!="")
{
	if($fn == "photo_del"){
		//initial POST
		$photo_id = $_POST["photo_id"];
		$previous_id = $_POST["previous_id"];

		if($photo_id != ""){

			$url="";
			$sql="
			SELECT `url`
			FROM  `social_iMing_images` 
			WHERE `id` = '$photo_id'
			";
			$result = mysql_query($sql);
			$return_rows = mysql_num_rows($result);
			while($rs=mysql_fetch_array($result)){
				$url = $rs[url];
			}

			$url_previous="";
			$sql="
			SELECT `url`
			FROM  `social_iMing_images` 
			WHERE `id` = '$previous_id'
			";
			$result = mysql_query($sql);
			$return_rows = mysql_num_rows($result);
			while($rs=mysql_fetch_array($result)){
				$url_previous = $rs[url];
			}

			//delete image in DB
			$sql="
			DELETE FROM `social_iMing_images` 
			WHERE `social_iMing_images`.`id` = '$photo_id'
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());

			//delete image in FTP
			$myFile = $rootpath."images/photos_album/".$url;
			unlink($myFile);

			//delete All comment from that image
			$sql="
			DELETE FROM `social_iMing_comment_images`
			WHERE `social_iMing_comment_images`.`image_id` = '$photo_id'
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());
		}

		if($own_body == "")
			header ("location: ./index.php?pic=".$url_previous);
		elseif($own_body != "")
			header ("location: ./index.php?friend=".$own_body."&pic=".$url_previous);
	}
	if($fn == "profile_picture_del"){
		//initial POST
		$photo_id = $_POST["photo_id"];
		$previous_id = $_POST["previous_id"];

		if($photo_id != ""){

			$url="";
			$sql="
			SELECT `url`
			FROM  `social_iMing_images` 
			WHERE `id` = '$photo_id'
			";
			$result = mysql_query($sql);
			$return_rows = mysql_num_rows($result);
			while($rs=mysql_fetch_array($result)){
				$url = $rs[url];
			}

			$url_previous="";
			$sql="
			SELECT `url`
			FROM  `social_iMing_images` 
			WHERE `id` = '$previous_id'
			";
			$result = mysql_query($sql);
			$return_rows = mysql_num_rows($result);
			while($rs=mysql_fetch_array($result)){
				$url_previous = $rs[url];
			}

			//delete image in DB
			$sql="
			DELETE FROM `social_iMing_images` 
			WHERE `social_iMing_images`.`id` = '$photo_id'
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());

			//delete image in FTP
			$myFile = $rootpath."images/profile_picture/".$url;
			unlink($myFile);

			//delete All comment from that image
			$sql="
			DELETE FROM `social_iMing_comment_images`
			WHERE `social_iMing_comment_images`.`image_id` = '$photo_id'
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());
		}

		if($own_body == "")
			header ("location: ".$rootpath."main/profile_pic/choose_pic?pic=".$url_previous);
		elseif($own_body != "")
			header ("location: ".$rootpath."main/profile_pic/choose_pic?friend=".$own_body."&pic=".$url_previous);
	}

	//set a new avatar
	if($fn == "set_profile_picture"){
		//initial POST
		$photo_id = $_POST["photo_id"];

		if($photo_id != ""){

			//set image to be avatar in DB
			$sql="
			UPDATE `social_iMing_customer_info` 
			SET `profile_picture_id` = '$photo_id' 
			WHERE  `social_iMing_customer_info`.`username` =  '$_SESSION[su]';
			";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());
		}
		header ("location: ".$rootpath."main/text/");

	}
?>

<?php
}	//end check login
mysql_close();
?>
