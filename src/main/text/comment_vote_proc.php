<?
	//##################################### initial GET ##############################################
	$rootpath ="../../";
	$fn = $_POST["fn"];

	if($fn=="vote_question")
	{
		$friend = $_POST["friend"];
		$question_id = $_POST["comment_id"];
		$vote = $_POST["vote"];

		if($friend == "")
			header ("location: ".$rootpath."main/text/");
		else
			header ("location: ".$rootpath."main/text/?friend=".$friend);
	}
	elseif($fn=="vote_question_update")
	{
		$friend = $_POST["friend"];
		$question_id = $_POST["comment_id"];
		$vote = $_POST["vote"];
		$id_vote = $_POST["id_vote"];

		if($friend == "")
			header ("location: ".$rootpath."main/text/");
		else
			header ("location: ".$rootpath."main/text/?friend=".$friend);
	}
	elseif($fn=="unvote_question")
	{
		$friend = $_POST["friend"];
		$question_id = $_POST["comment_id"];
		$vote = $_POST["vote"];
		$id_vote = $_POST["id_vote"];

		if($friend == "")
			header ("location: ".$rootpath."main/text/");
		else
			header ("location: ".$rootpath."main/text/?friend=".$friend);
	}

	if($fn=="vote_answer")
	{
		$friend = $_POST["friend"];
		$answer_id = $_POST["comment_id"];
		$vote = $_POST["vote"];

		if($friend == "")
			header ("location: ".$rootpath."main/text/");
		else
			header ("location: ".$rootpath."main/text/?friend=".$friend);
	}
	elseif($fn=="vote_answer_update")
	{
		$friend = $_POST["friend"];
		$answer_id = $_POST["comment_id"];
		$vote = $_POST["vote"];
		$id_vote = $_POST["id_vote"];

		if($friend == "")
			header ("location: ".$rootpath."main/text/");
		else
			header ("location: ".$rootpath."main/text/?friend=".$friend);
	}
	elseif($fn=="unvote_answer")
	{
		$friend = $_POST["friend"];
		$answer_id = $_POST["comment_id"];
		$vote = $_POST["vote"];
		$id_vote = $_POST["id_vote"];

		if($friend == "")
			header ("location: ".$rootpath."main/text/");
		else
			header ("location: ".$rootpath."main/text/?friend=".$friend);
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

	if($fn=="vote_question")
	{
		$sql_answer="
		INSERT INTO `social_iMing_vote_comment`
		(`username_from`, `comment_id`, `vote`, `post_time`)
		VALUES
		('$_SESSION[su]', '$question_id', '$vote', CURRENT_TIMESTAMP);
		";
		$result_answer=mysql_query($sql_answer);
		if(!$result_answer)die(mysql_error());
	}
	elseif($fn=="vote_question_update")
	{
		$sql_answer="
		UPDATE `social_iMing_vote_comment` 
		SET  `vote` =  '$vote'
		WHERE  `social_iMing_vote_comment`.`id` = '$id_vote';
		";
		$result_answer=mysql_query($sql_answer);
		if(!$result_answer)die(mysql_error());
	}
	elseif($fn=="unvote_question")
	{
		$sql_answer="
		DELETE FROM `social_iMing_vote_comment`
		WHERE `social_iMing_vote_comment`.`id` = '$id_vote'
		";
		$result_answer=mysql_query($sql_answer);
		if(!$result_answer)die(mysql_error());
	}
	if($fn=="vote_answer")
	{
		$sql_answer="
		INSERT INTO `social_iMing_vote_answer`
		(`username_from`, `answer_id`, `vote`, `post_time`)
		VALUES
		('$_SESSION[su]', '$answer_id', '$vote', CURRENT_TIMESTAMP);
		";
		$result_answer=mysql_query($sql_answer);
		if(!$result_answer)die(mysql_error());
	}
	elseif($fn=="vote_answer_update")
	{
		$sql_answer="
		UPDATE `social_iMing_vote_answer` 
		SET  `vote` =  '$vote'
		WHERE  `social_iMing_vote_answer`.`id` = '$id_vote';
		";
		$result_answer=mysql_query($sql_answer);
		if(!$result_answer)die(mysql_error());
	}
	elseif($fn=="unvote_answer")
	{
		$sql_answer="
		DELETE FROM `social_iMing_vote_answer`
		WHERE `social_iMing_vote_answer`.`id` = '$id_vote'
		";
		$result_answer=mysql_query($sql_answer);
		if(!$result_answer)die(mysql_error());
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
