<?php
$rootpath = "../../";

//##################################### start DB ##############################################
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}

//#################################################


$sql = "DELETE FROM `test`.`social_iMing_customer_v3` WHERE `social_iMing_customer_v3`.`username` = 'ming2';";
$result=mysql_query($sql);
if(!$result)die(mysql_error());

$sql = "DELETE FROM `test`.`social_iMing_customer_info` WHERE `social_iMing_customer_info`.`username` = 'ming2';";
$result=mysql_query($sql);
if(!$result)die(mysql_error());

$sql = "DELETE FROM `test`.`social_iMing_customer_counts` WHERE `social_iMing_customer_counts`.`username` = 'ming2';";
$result=mysql_query($sql);
if(!$result)die(mysql_error());

$sql = "DELETE FROM `test`.`social_iMing_customer_activated` WHERE `social_iMing_customer_activated`.`username` = 'ming2';";
$result=mysql_query($sql);
if(!$result)die(mysql_error());

//mysql_close();
?>
