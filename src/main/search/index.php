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
	$keyword = $_GET["keyword"];
	$subscriber = $_GET["subscriber"];

	//#### initial values
	$menu1 = "search";

	include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{
?>

<font size="3" color="#000000">
<br>

<div class="bodytext">

<?php //####################### main ########################## ?>

<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr>

	<?php //######################### Left slide 1. Profile picture ######################## ?>
	<td align="center" VALIGN="top" width="20%"> 
		<?php
			if($friend != ""){
				$own_body = $friend;
			}
			else $own_body = $_SESSION[su];
			include($rootpath."include/body_Left_slide_zone.php");
		?>
	</td>
	<?php include($rootpath."main/search/index_BodyInclude.php"); ?>
  </tr>
</table>


</div>

</font>

<?
include($rootpath."include/index_bottom.php");
mysql_close(); 
}	//end check login
?>
