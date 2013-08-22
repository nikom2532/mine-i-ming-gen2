<?php

// filename: upload.form.php

// first let's set some variables

// make a note of the current working directory relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

// make a note of the location of the upload handler
//$uploadHandler = 'http://' .  $_SERVER['HTTP_HOST'] . $directory_self . 'upload.processor.php';
$uploadHandler = 'upload.processor.php';

// set a max file size for the html upload form
$max_file_size = 3000000; // size in bytes

// now echo the html page
//#############################################################################################################################



$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}

$menu1 = "photo";

include($rootpath."include/index_head.php");
?>
<?php	//check login
	if($_SESSION[su]!="")
	{
//#############################################################################################################################
?>

<font size="3" color="#000000">
<!--####################### Profile ####################-->

<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr>

	<!-- ######################### Left sheet 1. Profile picture ######################## -->
	<td align="center" VALIGN="top" width="20%"> 
		<br />
		<?php
			if($friend =="")
				$own_body = $_SESSION[su];
			else $own_body = $friend;
			include($rootpath."include/body_Left_slide.php");
		?>
	</td>

	<?php include($rootpath."main/photo_upload/index_BodyInclude.php"); ?>

  </tr>
</table>

</font>

<?
//#############################################################################################################################


include($rootpath."include/index_bottom.php");
mysql_close();
}	//end check login

?>
