<?php
echo "<!DOCTYPE html>";
?>
<?php /*
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
*/ ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="generator" content="i-Ming" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8;" />
<?php
	mysql_query("SET NAMES 'utf8'");	//set mysql UTF-8
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<meta name="description" content="The next generation - Social Networking" />
<meta name="keywords" content="nikom2532,iMing,Social Networking," />
<meta name="author" content="Nikom Suwankamol (Armíng Húang)" />

<title>i-Ming</title>

<link href="<?=$rootpath?>css/style.css" rel='stylesheet' type='text/css'>
<link href="<?=$rootpath?>css/stype_textarea.css" rel='stylesheet' type='text/css'>
<?php /*
<link rel="shortcut icon" href="<?=$rootpath?>images/logo v.2.2_icon.jpg" type="image/x-icon"> 	*/ ?>
<link rel="shortcut icon" href="<?=$rootpath?>images/logo v.4.0_icon.png" type="image/x-icon"> 

<?php /*
<script type="text/javascript" src="<?=$rootpath?>include/js/jquery-1.7.js"></script>
*/ ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.autoresize.js"></script>

<?php
mysql_query("SET NAMES 'utf8'");	//set mysql UTF-8
?>

<?php
/* <!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;               
	color: #FFFFFF;
}
//--> */
?>

<?php //text-decoration: not blink;	?>
<style type='text/css'>

body{
font-family: Arial, sans-serif 
}

	A:link {
		COLOR: #0088ff;
		text-decoration: none;
	}
	A:visited {
		COLOR: #0088ff;
		text-decoration: none;
	}
	A:hover {
		COLOR: #0088ff;
		text-decoration: underline
	}
</style>

<?php
		//################# Auto Suggest username function #############
if($menu1 == "message"){ ?>
	<script type="text/javascript" src="./js/bsn.AutoSuggest_c_2.0.js"></script>
	<link rel="stylesheet" href="./css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
<?php } /*?>
<script type = "text/javascript">
	function receive(){
	document.getElementById('username_receive').value
	}
</script> */
if($menu1 == "message"){ ?>
	<script type = "text/javascript">
		function copyIt() {
		var x = document.getElementById("username_receive").value;
		document.getElementById("username_receive2").value = x;
		}
	</script> <?php
} 

//#################### upload profile picture #######################
if(($menu1 == "photo" && $menu2 == "profile_picture") && ($friend == $_SESSION[su] || $own_body == $_SESSION[su] || $friend=="")) {
?>	<script type="text/javascript" src="<?=$rootpath?>include/js/jquery-pack.js"></script>
	<script type="text/javascript" src="<?=$rootpath?>include/js/jquery.imgareaselect.min.js"></script> <?php
}


//#################### delete photos #######################
if($menu1 == "photo" && ($friend == $_SESSION[su] || $own_body == $_SESSION[su] || $friend=="")) {
?>	<script type="text/javascript" src="<?=$rootpath?>include/js/fn_photo.js"></script>
<?php
}


//###################### vote comment ########################
if($menu1 == "profile"){
//	include($rootpath."main/text/menu5/vote_head.php");
/*?>	<link rel="stylesheet" href="<?=$rootpath?>main/text/menu2/vote.css" type="text/css" media="screen" charset="utf-8" />
	<script type="text/javascript" src="<?=$rootpath?>main/text/menu2/jquery_menu.js"></script>
<?php*/
}

//################# Change profile picture ###################
if(($menu1 == "profile" || $menu1 == "info" || $menu1 == "photo" || $menu1 == "tagging" || $menu1 == "tagger") && ($friend == $_SESSION[su] || $own_body == $_SESSION[su] || $friend=="")){
?>	<script language="javascript" type="text/javascript" src="<?=$rootpath?>include/js/profile_picture.js"></script>
	<link rel="stylesheet" href="<?=$rootpath?>css/profile_picture.css" type="text/css" charset="utf-8" />
<?php
}
?>

<?php	//################# Delete comment function #############
if($menu1 == "profile" || $menu1 == "photo" || $menu1=="calendars"){ ?>
<script type="text/javascript" src="<?=$rootpath?>include/js/fn_comment.js"></script>
<?php } ?>

<?php	//################# My AJAX Framework #################### ?>
<script type="text/javascript" src="<?=$rootpath?>include/AJAX/myajax.js"></script>


</head>
<?php 
//############################################################# end head #########################################################

/* <body bgcolor="#effbfd" background="<?=$rootpath?>images/background.jpg" bgproperties="fixed" style="font-family: Arial, sans-serif ;"> */ ?>

<body bgcolor="#f8fffe" bgproperties="fixed" style="font-family:'lucida grande',tahoma,verdana,arial,sans-serif ; font-size:11px;" >


<?php // for header ?>
<table width='1000' border='0' align='center' cellpadding='0' cellspacing='0'>
<tr><td height=23>
</td></tr>
</table>




<?php //menu here ?>

<table width='1000' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="7"  bgcolor="#dddddd"></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr> 
                <td><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td><img src="<?=$rootpath?>images/space.gif" width="10" height="10"></td>
                          </tr>
                          <tr> 
                            <td><table width="100%" border="0" cellpadding="5" cellspacing="0" class="fline" bgcolor="#f8fffe">
<?php // bgcolor="#f2fffc" ?>
<?php // <bgcolor="#cde8ec"> ?>
                                <tr> 
                                  <td valign="top" height="500">

<?

//	if not login
//if(($_SESSION[su]=="")&&($focus!="0")) {
if($_SESSION[su]=="") {


//header ("location: ".$rootpath."comment.php");

/*
	echo "<br><br><br><br><table width='350' border='0' align='center' cellpadding='0' cellspacing='0'  bgcolor='9dbcf4' class='fline'>
					<tr>
						<td colspan='2' align='center' class='nortxt' height='60'><font color='FF0000'>You cannot use this page<br>please Sign in</font></td>
					</tr><form name='login' action='".$rootpath."index.php' method='post'><input type='hidden' name='self' value='$GLOBALS[PHP_SELF]'>
                    <tr> 
                      <td width='100' align='right' class='nortxt' height='30'>Login : </td><td> <input type='text' name='username'></td>
					</tr>
					<tr>
                      <td width='100' align='right' class='nortxt' height='30'>Password : </td><td> <input type='password' name='password'></td>
					</tr>
					<tr>
						<td colspan='2' align='center' class='nortxt' height='30'><input type='submit' value='Login'></td>
					</tr></form>
					<tr>
						<td colspan='2' align='center' class='nortxt' height='60'>ËÃ×Í Å§·ÐàºÕÂ¹à¢éÒãªé§Ò¹ <a href='member_regis.php'>Click here</a></td>
					</tr>
					</table>";
*/
?>
<table width='100%' border='0' bordercolor="#ffffff" align='left' cellpadding='0' cellspacing='0' ><?php //<class='fline'> ?>
	<tr>
		<td width="40%" align="left" VALIGN="top">
			<font size="4" color="#333333">
<?php	/*	<img src="<?=$rootpath?>images/please_signin.png">	*/ ?>
<div valign="top" style="background-image:url('<?=$rootpath?>images/please_signin2.png'); background-repeat:no-repeat; background-position:center top; background-size:350px 140px; -moz-background-size:350px 140px; /* Firefox 3.6 */ ; text-align: center; width: 350px; height: 140px; background-color:#f8fffe; " >
			</div>
			<br>welcome to

<?php /*	<center><img src="<?=$rootpath?>images/logo%20v.4.0.png"></center>
*/?>		<div style="background-image:url('<?=$rootpath?>images/logo%20v.4.0.png'); background-repeat:no-repeat; background-position:center top; background-size:200px 70px; -moz-background-size:200px 70px; /* Firefox 3.6 */ ; text-align: center; height: 70px; width: 100%; background-color:#f8fffe; " >
			</div>

			<blockquote>
				&emsp;&emsp;i-Ming is the social networking that can search any problem by your search engine keyword. you also can connect to your key with any web around the world
			</blockquote>
			<p style="text-align: right;"> register here ---></p>
			<table width='100%' height='100%' bordercolor="#ffffff">
				<tr>
				<td style="background-image:url('<?=$rootpath?>images/worldmap.gif'); background-repeat:no-repeat; -moz-background-size:100% 100%; /* Firefox 3.6 */ ; background-size:100% 100%; height: 150px; 	background-color:#f8fffe; opacity:0.4; filter:alpha(opacity=40); /* For IE8 and earlier */">
				</td>
				</tr>
			</table>
			</font>
		</td>
		<td width="60%" align="right">
			<font size="2" color="#333333">
<?php
			include($rootpath."include/home_member_regis.php");
?>
			</font>
		</td>
	</tr>


<?php
include($rootpath."include/index_bottom.php");

}
?>
