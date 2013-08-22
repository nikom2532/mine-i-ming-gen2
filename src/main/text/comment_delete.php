<?
	//##################################### initial GET ##############################################
	$friend = $_GET["friend"];
	$fn = $_POST["fn"];
	$value = $_POST["value"];
	$rootpath ="../../";

	if($fn=="answer_comment")
	{
		$friend = $_POST["friend"];
		$question_id = $_POST["comment_id"];
		$answer_comment = nl2br($_POST["answer_comment"]);
		if($friend == "")
			header ("location: ".$rootpath."main/text/");
		else
			header ("location: ".$rootpath."main/text/?friend=".$friend);
	}

	if($fn=="del" || $fn=="answer_del")
	{
	$rootpath = $_POST["rootpath"];
		if($friend == "")
			header ("location: ".$rootpath."main/text/");
		else
			header ("location: ".$rootpath."main/text/?friend=".$friend);
	}
	elseif($fn=="photo_del")
	{
	$rootpath = $_POST["rootpath"];
		$pic = $_POST["pic"];
		if($friend == "")
			header ("location: ".$rootpath."main/my_photo/?pic=".$pic);
		else
			header ("location: ".$rootpath."main/my_photo/?friend=".$friend."&pic=".$pic);
	}
	elseif($fn=="calendar_del")
	{
	$rootpath = $_POST["rootpath"];
		$calendar_id = $_POST["calendar_id"];
		if($friend == "")
			header ("location: ".$rootpath."./main/my_calendars/index.php?fn=read&topic=".$calendar_id);
		else
			header ("location: ".$rootpath."./main/my_calendars/index.php?friend=".$friend."fn=read&topic=".$calendar_id);
	}

//##################################### start DB ##############################################
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
	if($fn==".....")
	{
		$SQL_comment="insert into social_iMing_friends(username, fnd) values('$_SESSION[su]', '$friend')";
		$result2=mysql_query($SQL_comment);
		if(!$result2)die(mysql_error());
	}
	if($fn=="answer_comment")
	{
		$sql_answer="
		INSERT INTO `social_iMing_comment_answer`
		(`question_id`, `username_from`, `comment_text`, `post_time`)
		VALUES
		('$question_id', '".$_SESSION['su']."', '$answer_comment', CURRENT_TIMESTAMP);
		";
		$result_answer=mysql_query($sql_answer);
		if(!$result_answer)die(mysql_error());
	}
	elseif($fn=="del")
	{
		//delete all answers
		$SQL_answer="
		DELETE FROM `social_iMing_comment_answer` 
		WHERE `social_iMing_comment_answer`.`question_id` = '$value'
		";
		$result_answer=mysql_query($SQL_answer);
		if(!$result_answer)die(mysql_error());

		//delete this question
		$SQL_comment = "
		DELETE FROM `social_iMing_comment` 
		WHERE 
		CONVERT(`social_iMing_comment`.`username` USING utf8) = '$_SESSION[su]' 
		AND 
		CONVERT(`social_iMing_comment`.`comment_id` USING utf8) = '$value' LIMIT 1;";
		$result2=mysql_query($SQL_comment);
		if(!$result2)die(mysql_error());

		//delete all comment(question) votes
		$sql_answer="
		DELETE FROM `social_iMing_vote_comment`
		WHERE `social_iMing_vote_comment`.`comment_id` = '$value'
		";
		$result_answer=mysql_query($sql_answer);
		if(!$result_answer)die(mysql_error());


		//delete all answer votes
		$sql_vote = "
		SELECT * 
		FROM  `social_iMing_comment_answer` 
		WHERE `question_id` = '$value' ";
		$result_vote = mysql_query($sql_vote);	//find the answer_id from each question_id
		while($rs_vote=mysql_fetch_array($result_vote)){
			//delete all answer votes each question_id on comment_answer
			$sql_answer = "
			DELETE FROM `social_iMing_vote_answer`
			WHERE `social_iMing_vote_answer`.`answer_id` = '$rs_vote[answer_id]'
			";
			$result_answer=mysql_query($sql_answer);
			if(!$result_answer)die(mysql_error());
		}

	}
	elseif($fn=="answer_del")
	{
		//delete comment answer
		$SQL_answer="
		DELETE FROM `social_iMing_comment_answer` 
		WHERE `social_iMing_comment_answer`.`answer_id` = '$value'
		";
		$result_answer=mysql_query($SQL_answer);
		if(!$result_answer)die(mysql_error());

		//delete all answer votes w/ the same comment answer id
		$sql_answer="
		DELETE FROM `social_iMing_vote_answer`
		WHERE `social_iMing_vote_answer`.`answer_id` = '$value'
		";
		$result_answer=mysql_query($sql_answer);
		if(!$result_answer)die(mysql_error());

	}
	elseif($fn=="photo_del")
	{
		$SQL_comment="
		DELETE FROM `social_iMing_comment_images` 
		WHERE CONVERT(`username` USING utf8) = '$_SESSION[su]' 
		AND CONVERT(`id` USING utf8) = '$value' LIMIT 1;";
		$result2=mysql_query($SQL_comment);
		if(!$result2)die(mysql_error());
	}
	elseif($fn=="calendar_del")
	{
		$SQL_comment="
		DELETE FROM `social_iMing_comment_calendar` 
		WHERE `username_from` = '$_SESSION[su]'
		AND `comment_id` = '$value'
		";
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
