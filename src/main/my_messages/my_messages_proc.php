<?

	//---- initial POST
	$fn = $_REQUEST["fn"];

	//#### initial values
	$menu1 = "message";

//#############################################################

$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=0;

//include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{
?>


<!--##################################################################################-->
<!-- my_messages_proc.php -->


<?php
	// ############################ process send message #################################

	if($fn == "send"){

		//---- initial POST
		$username_receive = $_POST["username_receive"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];

		header ("location: ./index.php?fn=inbox&success=1");

//		if($username_receive != "" && $subject != "" && $message != ""){

			//insert the title message, who send?, send to whom?
			$this_time = date('Y-m-d H:i:s');
			$sql = "
			INSERT INTO `social_iMing_message_box` (
					`message_id`,
					`subject`, 
					`username_send`, 
					`username_receive`, 
					`unread`, 
					`send_time`) 
			VALUES (
					NULL,
					'$subject', 
					'$_SESSION[su]', 
					'$username_receive', 
					'y', 
					'$this_time')";
		    $result=mysql_query($sql);
//			if($result) echo"OK1";
			if(!$result)die(mysql_error());

			//GET the message_id
			$id = "";
			$sql2 = "
			SELECT 
				`message_id` 
			FROM 
			`social_iMing_message_box` 
			WHERE 
				subject = '$subject' 
			AND username_receive = '$username_receive'   
			AND send_time = '$this_time'";

			$result2 = mysql_query($sql2);
			while($rs2=mysql_fetch_array($result2)){
				echo $id = $rs2[message_id];
			}

			//insert the data of that message_id
			$sql3 = "
			INSERT INTO `social_iMing_message_data` (
					`message_id`, 
					`user`, 
					`message`, 
					`send_time_last`) 
			VALUES (
				'$id', 
				'$_SESSION[su]', 
				'$message', 
				'$this_time')";
		    $result3=mysql_query($sql3);
			if(!$result3)die(mysql_error());
//		}
	} //end func send


	// #################################### process write message after read message ############################################

	if($fn == "read"){

		//initial ---GET
		$message_id = $_POST["message_id"];
		$message = $_POST["message"];
		
		$this_time = date('Y-m-d H:i:s');

		header ("location: ./index.php?fn=read&id=".$message_id);

		$sql = "
		INSERT INTO `social_iMing_message_data` (
				`message_id`, 
				`user`, 
				`message`, 
				`send_time_last`) 
		VALUES (
			'$message_id', 
			'$_SESSION[su]', 
			'$message', 
			'$this_time')";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());

		$sql = "
		UPDATE  `social_iMing_message_box` 
		SET  `unread` =  'y' 
		WHERE  `social_iMing_message_box`.`message_id` = '$message_id'
		";
		$result=mysql_query($sql);
		if(!$result)die(mysql_error());
	}
?>

<!--##################################################################################-->


<?
//include($rootpath."include/index_bottom.php");
mysql_close();
}	//end check login
?>
