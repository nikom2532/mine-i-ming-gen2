<?

$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
	//---- initial GET
	if($_POST["friend"] != ""){
		header("location: ".$_SERVER['PHP_SELF']."?friend=".$_POST["friend"]);
		$friend = $_POST["friend"];
	}elseif($_POST["friend"] == "" && $_GET["friend"] != ""){
		$friend = $_GET["friend"];
	}

	$comment = nl2br($_POST["comment"]);
	$subscriber = $_GET["subscriber"];

	//#### initial values
	$menu1 = "profile";
	$delete_id = "";

include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{
?>
<font size="3" color="#000000">
<br>


<?php

?>

<!--####################### Profile ####################-->

<div class="bodytext">

<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr>

	<!-- ######################### Left slide 1. Profile picture ######################## -->


	<?php include($rootpath."main/text/index_BodyInclude.php"); ?>

  </tr>
</table>
</div>
<br>
</font>


<?
include($rootpath."include/index_bottom.php");
//mysql_close();
}	//end check login
?>
