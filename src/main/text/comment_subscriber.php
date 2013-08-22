<?
	//##################################### initial GET ##############################################
	$friend = $_GET["friend"];
	$comment = $_GET["comment"];
	$subscriber = $_GET["subscriber"];

//##################################### start DB ##############################################
$rootpath ="../../";

	header ("location: ".$rootpath."comment.php?friend=".$friend);

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

//####################################### start function ########################################

	//record the update subscriber
	if($subscriber==1)
	{
		$SQL_comment="insert into social_iMing_friends(username, fnd) values('$_SESSION[su]', '$friend')";
		$result2=mysql_query($SQL_comment);
		if(!$result2)die(mysql_error());
	}
	elseif($subscriber==2)
	{
		$SQL_comment="DELETE FROM `social_iMing_friends` WHERE CONVERT(`social_iMing_friends`.`username` USING utf8) = '$_SESSION[su]' AND CONVERT(`social_iMing_friends`.`fnd` USING utf8) = '$friend' LIMIT 1;";
		$result2=mysql_query($SQL_comment);
		if(!$result2)die(mysql_error());
	}

//	$url = "location: ".$rootpath."comment2.php?friend=".$friend;
//	echo $url;
//	header ("$url");
//	header ("location: comment2.php?friend=$friend")


//###################################### end function ###########################################

include($rootpath."include/index_bottom.php");
//mysql_close();
}	//end check login
?>
