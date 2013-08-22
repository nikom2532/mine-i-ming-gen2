<?php
$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=0;

	//---- initial GET
	$friend = $_GET["friend"];
	$subscriber = $_GET["subscriber"];
	$fn = $_GET["fn"];

	//#### initial values
	$menu1 = "found";

	include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{
?>

<font size="3" color="#000000">
<br>

<? //####################### main #################### ?>
<div class="bodytext">

<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr>
	<? //######################### Left slide 1. Profile picture ######################## ?>
	<td align="center" VALIGN="top" width="20%">
		<?php
			if($friend != ""){
				$own_body = $friend;
			}
			else $own_body = $_SESSION[su];
			include($rootpath."include/body_Left_slide_zone.php");
		?>
	</td>
	<? // ########################## middle sheet ####################### ?>

	<?php include($rootpath."main/Top_found/index_BodyInclude.php"); ?>
  </tr>
</table>

</div>


</font>

<?
include($rootpath."include/index_bottom.php");
mysql_close();
}	//end check login
?>
