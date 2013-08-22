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

	//---- initial GET
	$fn = $_GET["fn"];
	$subscriber = $_GET["subscriber"];
	$success = $_GET["success"];

	//#### initial values
	$menu1 = "calendars";

	include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{
?>

<font size="3" color="#000000">
<br>

<div class="bodytext">

<!--####################### main ####################-->

<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: center; table-layout: fixed;">
  <col width="20%">
  <col width="55%">
  <col width="25%">
  <tr>

	<!-- ######################### Left slide 1. Profile picture ######################## -->
	<td align="center" VALIGN="top" width="20%"> 
		<?php
			if($friend != ""){
				$own_body = $friend;
			}
			else $own_body = $_SESSION[su];
			include($rootpath."include/body_Left_slide_zone.php");

//			include($rootpath."main/my_calendars/calendar.php");
		?>
	</td>

	<?php include($rootpath."main/my_calendars/index_BodyInclude.php"); ?>

  </tr>
</table>


</div>

</font>

<?
include($rootpath."include/index_bottom.php");
mysql_close();
}	//end check login
?>
