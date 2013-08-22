<?

$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=1;

	//---- initial GET
	$subscriber = $_GET["subscriber"];

	$pic = $_POST["pic"];
	if($pic == "") $pic = $_GET["pic"];

	$comment = $_POST["comment"];

	$friend = $_GET["friend"];
	if($friend == "") $friend = $_POST["friend"];

	//###### initial values
	$menu1 = "photo";

	include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{

?>

<font size="3" color="#000000">
<br>

<div class="bodytext">

<?php //####################### Profile ####################?>

<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr>

	<?php //######################### Left sheet 1. Profile picture ######################## ?>
	<td align="center" VALIGN="top" width="20%"> 
		<?php
			if($friend =="")
				$own_body = $_SESSION[su];
			else $own_body = $friend;
			include($rootpath."include/body_Left_slide.php");
		?>
	</td>

	<?php include($rootpath."main/my_photo/index_BodyInclude.php"); ?>

  </tr>
</table>

</div>

</font>

<?
include($rootpath."include/index_bottom.php");
//mysql_close();
}	//end check login
?>
