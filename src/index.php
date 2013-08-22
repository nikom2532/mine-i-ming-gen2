<?php
//	header ("location: Underconstructure.php");

session_start();
if(($_POST[username]!="")&&($_POST[password]!="")) {
	if(empty($self))$self="main/text/";
	$rootpath="";
	require_once($rootpath."lib/DB.php");
	require_once($rootpath."lib/conn.inc.php");
	if (!$db->open()){
		die($db->error());
	}
	$username = htmlspecialchars(trim($_POST[username]),ENT_QUOTES);
	$password = htmlspecialchars(trim($_POST[password]),ENT_QUOTES);

	$SQL="select username,admin,password from social_iMing_customer_v3 where username='$username' and password='".md5($password)."' and enable='y' ";
	$result=@mysql_query($SQL);

	if(mysql_num_rows($result)==1) {
	 $rs=mysql_fetch_array($result);
	 if($rs[admin]=="y"){
		$_SESSION[admin]=$username;
	 }
		$_SESSION[su]=$username;
		mysql_query("update social_iMing_customer_v3 set last_login='".date("Y-m-d H:i:s")."' where username='$username'");
		echo "<meta http-equiv='refresh' content='0; url=$self'>";
		
	} else {
		echo "<SCRIPT LANGUAGE='JavaScript'>window.alert('ข้อมูลเข้าระบบไม่ถูกต้อง')</SCRIPT>";
		echo "<meta http-equiv='refresh' content='0; url=$self'>";
	}
}                   

	//check login
	if($_SESSION[su]!=""){
		header ("location: ".$rootpath."main/Top_found/?fn=index");
	}
	else
	{
		header ("location: ".$rootpath."main/text/");
	}


//$focus="0";
//include("include/index_head.php");
//include("include/index_inside.php");
//include("main.html");

//include("include/index_profile.php");
//include("include/comment.php");


//include("include/index_bottom.php");
mysql_close();

?>
