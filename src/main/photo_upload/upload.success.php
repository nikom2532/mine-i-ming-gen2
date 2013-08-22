<?php

// filename: upload.success.php

$rootpath ="../../";

	header("Refresh: 2; URL=\"".$rootpath."main/photo_upload/index.php\"");

session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=2;
include($rootpath."include/index_head.php");
?>
<?php	//check login
	if($_SESSION[su]!="")
	{
//#############################################################################################################################
?>
	
<font size="3" color="#000000">

		<div id="Upload">
			<h1>File upload</h1>
			<p>Congratulations! Your file upload was successful</p>
		</div>
	
</font>

<?
header("Refresh: 2; URL=\".\"");


//#############################################################################################################################


include($rootpath."include/index_bottom.php");
mysql_close();
}	//end check login

?>
