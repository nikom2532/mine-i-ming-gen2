<?php
//###################################################################################################################
//###############################################  1. start head page  ##############################################
//###################################################################################################################


$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=2;


//###################################################################################################################
//################################################  2.1 initial function  ##############################################
//###################################################################################################################

/*

upload picture profile.php


* Copyright (c) 2008 http://www.webmotionuk.com / http://www.webmotionuk.co.uk
* "PHP & Jquery image upload & crop"
* Date: 2008-11-21
* Ver 1.2
* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
*
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND 
* ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
* WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
* IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
* INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, 
* PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS 
* INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, 
* STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF 
* THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
*/
error_reporting (E_ALL ^ E_NOTICE);
session_start(); //Do not remove this
//only assign a new timestamp if the session variable is empty
if (!isset($_SESSION['random_key']) || strlen($_SESSION['random_key'])==0){
    $_SESSION['random_key'] = strtotime(date('Y-m-d H:i:s')); //assign the timestamp to the session variable
	$_SESSION['user_file_ext']= "";
}
#########################################################################################################
# CONSTANTS																								#
# You can alter the options below																		#
#########################################################################################################
$upload_dir = $rootpath."images/profile_picture"; 				// The directory for the images to be saved in
$upload_path = $upload_dir."/";				// The path to where the image will be saved
$large_image_prefix = "resize_"; 			// The prefix name to large image
$thumb_image_prefix = "thumbnail_";			// The prefix name to the thumb image
$large_image_name = $large_image_prefix.$_SESSION['random_key'];     // New name of the large image (append the timestamp to the filename)
$thumb_image_name = $thumb_image_prefix.$_SESSION['random_key'];     // New name of the thumbnail image (append the timestamp to the filename)
$max_file = "3"; 							// Maximum file size in MB
$max_width = "500";							// Max width allowed for the large image
$thumb_width = "100";						// Width of thumbnail image
$thumb_height = "100";						// Height of thumbnail image
// Only one of these image types should be allowed for upload
$allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif");
$allowed_image_ext = array_unique($allowed_image_types); // do not change this
$image_ext = "";	// initialise variable, do not change this.
foreach ($allowed_image_ext as $mime_type => $ext) {
    $image_ext.= strtoupper($ext)." ";
}

##########################################################################################################
# IMAGE FUNCTIONS																						 #
# You do not need to alter these functions																 #
##########################################################################################################
function resizeImage($image,$width,$height,$scale) {
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$image); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$image,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$image);  
			break;
    }
	
	chmod($image, 0777);
	return $image;
}
//You do not need to alter these functions
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}
//You do not need to alter these functions
function getHeight($image) {
	$size = getimagesize($image);
	$height = $size[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$size = getimagesize($image);
	$width = $size[0];
	return $width;
}

//Image Locations
$large_image_location = $upload_path.$large_image_name.$_SESSION['user_file_ext'];
$thumb_image_location = $upload_path.$thumb_image_name.$_SESSION['user_file_ext'];

//Create the upload directory with the right permissions if it doesn't exist
if(!is_dir($upload_dir)){
	mkdir($upload_dir, 0777);
	chmod($upload_dir, 0777);
}

//Check to see if any images with the same name already exist
if (file_exists($large_image_location)){
	if(file_exists($thumb_image_location)){
		$thumb_photo_exists = "<img src=\"".$upload_path.$thumb_image_name.$_SESSION['user_file_ext']."\" alt=\"Thumbnail Image\"/>";
	}else{
		$thumb_photo_exists = "";
	}
   	$large_photo_exists = "<img src=\"".$upload_path.$large_image_name.$_SESSION['user_file_ext']."\" alt=\"Large Image\"/>";
} else {
   	$large_photo_exists = "";
	$thumb_photo_exists = "";
}

if (isset($_POST["upload"])) { 
	//Get the file information
	$userfile_name = $_FILES['image']['name'];
	$userfile_tmp = $_FILES['image']['tmp_name'];
	$userfile_size = $_FILES['image']['size'];
	$userfile_type = $_FILES['image']['type'];
	$filename = basename($_FILES['image']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
	
	//Only process if the file is a JPG, PNG or GIF and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		
		foreach ($allowed_image_types as $mime_type => $ext) {
			//loop through the specified image types and if they match the extension then break out
			//everything is ok so go and check file size
			if($file_ext==$ext && $userfile_type==$mime_type){
				$error = "";
				break;
			}else{
				$error = "Only <strong>".$image_ext."</strong> images accepted for upload<br />";
			}
		}
		//check if the file size is above the allowed limit
		if ($userfile_size > ($max_file*1048576)) {
			$error.= "Images must be under ".$max_file."MB in size";
		}
		
	}else{
		$error= "Select an image for upload";
	}
	//Everything is ok, so we can upload the image.
	if (strlen($error)==0){
		
		if (isset($_FILES['image']['name'])){
			//this file could now has an unknown file extension (we hope it's one of the ones set above!)
			$large_image_location = $large_image_location.".".$file_ext;
			$thumb_image_location = $thumb_image_location.".".$file_ext;
			
			//put the file ext in the session so we know what file to look for once its uploaded
			$_SESSION['user_file_ext']=".".$file_ext;
			
			move_uploaded_file($userfile_tmp, $large_image_location);
			chmod($large_image_location, 0777);
			
			$width = getWidth($large_image_location);
			$height = getHeight($large_image_location);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}
			//Delete the thumbnail file so the user can create a new one
			if (file_exists($thumb_image_location)) {
				unlink($thumb_image_location);
			}
		}
		//Refresh the page to show the new uploaded image
		header("location:".$_SERVER["PHP_SELF"]);
		exit();
	}
}

if (isset($_POST["upload_thumbnail"]) && strlen($large_photo_exists)>0) {
	//Get the new coordinates to crop the image.
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	//Scale the image to the thumb_width set above
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	//Reload the page again to view the thumbnail
	header("location:".$_SERVER["PHP_SELF"]);
	exit();
}


if ($_GET['a']=="delete" && strlen($_GET['t'])>0){
//get the file locations 
	$large_image_location = $upload_path.$large_image_prefix.$_GET['t'];
	$thumb_image_location = $upload_path.$thumb_image_prefix.$_GET['t'];
	if (file_exists($large_image_location)) {
		unlink($large_image_location);
	}
	if (file_exists($thumb_image_location)) {
		unlink($thumb_image_location);
	}
	header("location:".$_SERVER["PHP_SELF"]);
	exit(); 
}

//###################################################################################################################
//##############################################  1.1 from index head.php  ##########################################
//###################################################################################################################

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="generator" content="WebMotionUK" />
	<title>nikom2532 &amp; profile picture upload</title>
	<script type="text/javascript" src="<?=$rootpath?>include/js/jquery-pack.js"></script>
	<script type="text/javascript" src="<?=$rootpath?>include/js/jquery.imgareaselect.min.js"></script>
	<link href="<?=$rootpath?>css/style.css" rel='stylesheet' type='text/css'>
	<link href="<?=$rootpath?>css/stype_textarea.css" rel='stylesheet' type='text/css'>
	<style type='text/css'>
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;               
	color: #FFFFFF;
}
-->

	A:link {
		COLOR: #0088ff;
		text-decoration: blink;
	}
	A:visited {
		COLOR: #0088ff;
		text-decoration: blink;
	}
	A:hover {
		COLOR: #FF0000;  ;text-decoration: underline
	}
</style>
</head>

<body bgcolor="#effbfd" background="<?=$rootpath?>images/background.jpg" bgproperties="fixed">


<!-- for header -->
<table width='900' border='0' align='center' cellpadding='0' cellspacing='0' background="<?=$rootpath?>images/background.jpg">
<tr><td height=20>
</td></tr>
</table>


<!-- for head menus -->
<table width='900' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='222222'>
  <tr height="30">
    <td width="50" align="left" bgcolor="#effbfd">
	  <a href="./<?=$rootpath?>">
	    <img src="<?=$rootpath?>images/logo v.2.2.jpg">
	  </a>
    <td width='3'>
<?
	$arr_text=array("Home","Webboard","comment","Contact");
	$arr_link=array($rootpath."index.php",$rootpath."webboard.php" ,$rootpath."comment.php",$rootpath."contact.php");
	$i=0;
	while($arr_text[$i]) {
		if(($focus==$i)&&($focus!="")) {
		echo "
		<td bgcolor='2bbab5' align='center' class='wlink' width='80'><a href='$arr_link[$i]'><b>$arr_text[$i]</b></a></td>";
		} else {
		echo "
		<td bgcolor='81e874' align='center' class='wlink' width='80'><a href='$arr_link[$i]'><b>$arr_text[$i]</b></a></td>";
		}

		echo "<td width='3'></td>";
		$i++;
		}
?>
	<td width="50" bgcolor="#effbfd"></td>
</tr>
</table>


<!-- for head account -->
<table width='900' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td>
	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
      <tr> 
         <td height='30' bgcolor="#b3e6ed">
		 <table width='100%' border='0' cellspacing='0' cellpadding='0'>
      <tr>
<?
if($_SESSION[su]!="") {
	echo "<td class='nortxt' align='center' width='150'><b>Welcome </b> <img src='".$rootpath."images/arr.gif' width='12' height='8'> <a href='.$rootpath'> $_SESSION[su] </a> </td><td class='wlink' align='center' width='200'> <a href='".$rootpath."member_edit.php'>Account/Change password</a> </td><td class='nortxt' align='center' width='80'> <a href='".$rootpath."logout.php'><img src='".$rootpath."images/bu_log2.gif' width='53' height='19' border='0'></a></td>";

} else {
	echo "  <form name='login' action='".$rootpath."index.php' method='post'><input type='hidden' name='self' value='$GLOBALS[PHP_SELF]'><td class='nortxt'><div align='right'>ª×èÍà¢éÒÊÙèÃÐºº 
            </div></td>
          <td class='nortxt'><div align='center'> 
              <input type='text' name='username' maxlength='15' size='20'>
            </div></td>
          <td class='nortxt'><div align='center'> 
              <p>ÃËÑÊŒèÒ¹</p>
            </div></td>
          <td class='nortxt'><input type='password' name='password' maxlength='15' size='20'></td>
          <td class='nortxt'><input type='submit' value='Login'></td></form><form action='member_regis.php' method='post'>
          <td class='wlink'> <input type='submit' value='Register'></td></form>";
}
?>
		<td class='nortxt'><span id="tP">&nbsp;</span>
				<script type="text/javascript">
					function tS(){ x=new Date(); x.setTime(x.getTime()); return x; } 
					function lZ(x){ return (x>9)?x:'0'+x; } 
					function tH(x){ if(x==0){ x=12; } return (x>12)?x-=12:x; } 
					function y4(x){ return (x<500)?x+1900:x+543; } 
					function dT(){ window.status=''+eval(oT)+'';  document.getElementById('tP').innerHTML=eval(oT); setTimeout('dT()',1000); } 
					function aP(x){ return (x>11)?'pm':'am'; } var dN=new Array('Sunday ','Monday ','Tuesday ','Wednesday','Thursday','Friday','Saturday'),mN=new Array('Janurary','February','March','April','May','June','July','August','September','October','November','December'),oT="tS().getDate()+' '+mN[tS().getMonth()]+' '+y4(tS().getYear())+' '+' '+lZ(tS().getHours())+':'+lZ(tS().getMinutes())+':'+lZ(tS().getSeconds())+' ¹.'";
					if(!document.all){ window.onload=dT; }else{ dT(); }
				</script></td>
		<?php
		if($_SESSION[su]!="") {
			// ***** search friends *****
		?>
		<td>
		<form name="search" action="./comment2.php" method="GET">
		  <input name=friend type="text" value="<?php print $friend; ?>">
		  <input type="submit" value="search">
		</form>
		</td>
		<?php
		}
		?>
        </tr>
      </table>		 
		</td>
      </tr>
    </table></td>
  </tr>
  <tr><td><hr></td></tr>
</table>

<!-- menu here -->

<table width='900' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="7"  bgcolor="#dddddd"></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr> 
                <td><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

                          <tr> 
                            <td><img src="<?=$rootpath?>images/space.gif" width="10" height="10"></td>
                          </tr>
                          <tr> 
                            <td><table width="100%" border="0" cellpadding="5" cellspacing="0" class="fline" bgcolor="#cde8ec">
                                <tr> 
                                  <td valign="top" height="500">



<?

//	if not login
//if(($_SESSION[su]=="")&&($focus!="0")) {
if($_SESSION[su]=="") {

	echo "<br><br><br><br><table width='400' border='0' align='center' cellpadding='0' cellspacing='0'  bgcolor='9dbcf4' class='fline'>
					<tr>
						<td colspan='2' align='center' class='nortxt' height='60'><font color='FF0000'>You cannot use this page<br>please Sign in</font></td>
					</tr><form name='login' action='".$rootpath."index.php' method='post'><input type='hidden' name='self' value='$GLOBALS[PHP_SELF]'>
                    <tr> 
                      <td width='150' align='right' class='nortxt' height='30'>Login : </td><td> <input type='text' name='username'></td>
					</tr>
					<tr>
                      <td width='150' align='right' class='nortxt' height='30'>Password : </td><td> <input type='password' name='password'></td>
					</tr>
					<tr>
						<td colspan='2' align='center' class='nortxt' height='30'><input type='submit' value='Login'></td>
					</tr></form>
					<tr>
						<td colspan='2' align='center' class='nortxt' height='60'>ËÃ×Í Å§·ÐàºÕÂ¹à¢éÒãªé§Ò¹ <a href='member_regis.php'>Click here</a></td>
					</tr>
					</table>";
include($rootpath."include/index_bottom.php");

}
?>


<?php

//###################################################################################################################
//#############################################  1.1 end index_head.php  ############################################
//###################################################################################################################


if($_SESSION[su]!=""){//check login


//###################################################################################################################
//################################################  1. End head page  ###############################################
//###################################################################################################################

/*

* Copyright (c) 2008 http://www.webmotionuk.com / http://www.webmotionuk.co.uk
* Date: 2008-11-21
* "PHP & Jquery image upload & crop"
* Ver 1.2

* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
*

* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND 
* ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
* WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
* IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 

* INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, 
* PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS 
* INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, 
* STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF 

* THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
*/


//###################################################################################################################
//##################################### 2.2 start upload profile picture page  ######################################
//###################################################################################################################
?>

<!--####################### Profile ####################-->

<font size="3" color="#000000">

<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr>

	<!-- ######################### Left sheet 1. Profile picture ######################## -->
	<td align="center" VALIGN="top" width="20%"> 
		<?php
			if($friend =="")
				$own_body = $_SESSION[su];
			else $own_body = $friend;
			include($rootpath."include/body_Left_slide.php");
		?>
	</td>

	<!--################################### middle sheet 2. Photo upload ######################################-->
	<td align="left" VALIGN="top" width="45%"> 

		<?php
		//Only display the javacript if an image has been uploaded
		if(strlen($large_photo_exists)>0){
			$current_large_image_width = getWidth($large_image_location);
			$current_large_image_height = getHeight($large_image_location);?>
		<script type="text/javascript">
		function preview(img, selection) { 
			var scaleX = <?php echo $thumb_width;?> / selection.width; 
			var scaleY = <?php echo $thumb_height;?> / selection.height; 
	
			$('#thumbnail + div > img').css({ 
				width: Math.round(scaleX * <?php echo $current_large_image_width;?>) + 'px', 
				height: Math.round(scaleY * <?php echo $current_large_image_height;?>) + 'px',
				marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
				marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
			});
			$('#x1').val(selection.x1);
			$('#y1').val(selection.y1);
			$('#x2').val(selection.x2);
			$('#y2').val(selection.y2);
			$('#w').val(selection.width);
			$('#h').val(selection.height);
		} 

		$(document).ready(function () {
			$('#save_thumb').click(function() {
				var x1 = $('#x1').val();
				var y1 = $('#y1').val();
				var x2 = $('#x2').val();
				var y2 = $('#y2').val();
				var w = $('#w').val();
				var h = $('#h').val();
				if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
					alert("You must make a selection first");
					return false;
				}else{
					return true;
				}
			});
		}); 

		$(window).load(function () { 
			$('#thumbnail').imgAreaSelect({ aspectRatio: '1:<?php echo $thumb_height/$thumb_width;?>', onSelectChange: preview }); 
		});

		</script>
		<?php }?>

		<?php
		//Display error message if there are any
		if(strlen($error)>0){
			echo "<ul><li><strong>Error!</strong></li><li>".$error."</li></ul>";
		}
		if(strlen($large_photo_exists)>0 && strlen($thumb_photo_exists)>0){

		//	keep image_url into database
		//	thumbnail_
			$url = $thumb_image_name.$_SESSION['user_file_ext'];
			$sql="INSERT INTO social_iMing_images (`username`, `image_album`, `url`, `record_date`) VALUES ('$_SESSION[su]', 'Profile Pictures', '$url', now() )";

			$result = mysql_query($sql);
			if(!$result)die(mysql_error());

			echo $large_photo_exists."&nbsp;".$thumb_photo_exists;
			echo "<p><a href=\"".$_SERVER["PHP_SELF"]."?a=delete&t=".$_SESSION['random_key'].$_SESSION['user_file_ext']."\">Delete images</a></p>";
			echo "<p><a href=\"".$_SERVER["PHP_SELF"]."\">Upload another</a></p>";
			//Clear the time stamp session and user file extension
			$_SESSION['random_key']= "";
			$_SESSION['user_file_ext']= "";
		}
		else{
				if(strlen($large_photo_exists)>0){?>
				<h2>Create Thumbnail</h2>
				<div align="center">
					<img src="<?php echo $upload_path.$large_image_name.$_SESSION['user_file_ext'];?>" style="float: left; margin-right: 10px;" id="thumbnail" alt="Create Thumbnail" />
					<div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width;?>px; height:<?php echo $thumb_height;?>px;">
						<img src="<?php echo $upload_path.$large_image_name.$_SESSION['user_file_ext'];?>" style="position: relative;" alt="Thumbnail Preview" />
					</div>
					<br style="clear:both;"/>
					<form name="thumbnail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
						<input type="hidden" name="x1" value="" id="x1" />
						<input type="hidden" name="y1" value="" id="y1" />
						<input type="hidden" name="x2" value="" id="x2" />
						<input type="hidden" name="y2" value="" id="y2" />
						<input type="hidden" name="w" value="" id="w" />
						<input type="hidden" name="h" value="" id="h" />
						<input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" />
					</form>
				</div>
			<hr />
			<?php 	} ?>
			<h2>Upload Photo Profile</h2>
			<form name="photo" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				Photo : <input type="file" name="image" size="30" />
				<input type="submit" name="upload" value="Upload" />
			</form>


		<?php } ?>

	</td>
  </tr>
</table>


</font>

<?php
//###################################################################################################################
//############################################  3. start bottom page  ###############################################
//###################################################################################################################


include($rootpath."include/index_bottom.php");
}	//end check login
mysql_close();
?>

