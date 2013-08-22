<script>
	function goBack() {
		history.back()
	}
	function submit_back(id) {
		document.getElementById(id).submit();
	}
</script>
<?
	//##################################### initial GET ##############################################
	$rootpath ="../../";
	$fn = $_POST["fn"];

	if($fn == ""){
		$fn = $_GET["fn"];
	}
/*
	if($fn=="activatedNew")
	{

		if($friend == "")
			header ("location: ".$rootpath."main/text/");
	}
*/

//##################################### start DB ##############################################
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=2;
//include($rootpath."include/index_head.php");
?>
<?php

//####################################### start function ########################################


		if($fn == "username_registered"){
			$username = $_POST[username];
			$pass1 = $_POST[pass1];
			$name = $_POST[name];
			$sex = $_POST[sex];
			$birthday = $_POST[birthday];
			$email = $_POST[email];
			$birth_year = $_POST[birth_year];
			$birth_month = $_POST[birth_month];
			$birth_date = $_POST[birth_date];
			$address = $_POST[address];
?>			<form id="error_username_activate" action="<?=$rootpath?>main/text/" method="POST">
				<input type="hidden" name="username" value="<?=$username?>" />
				<input type="hidden" name="name" value="<?=$name?>" />
				<input type="hidden" name="sex" value="<?=$sex?>" />
				<input type="hidden" name="birthday" value="<?=$birthday?>" />
				<input type="hidden" name="email" value="<?=$email?>" />
				<input type="hidden" name="birth_year" value="<?=$birth_year?>" />
				<input type="hidden" name="birth_month" value="<?=$birth_month?>" />
				<input type="hidden" name="birth_date" value="<?=$birth_date?>" />
				<input type="hidden" name="activate_code" value="<?=$activate_code?>" />
				<input type="hidden" name="address" value="<?=$address?>" />
			</form>
<?php		echo "This username is already registered <br>
				<a href=\"#\" onclick=\"submit_back('error_username_activate')\">Back";
		}

		elseif($fn == "email_registered"){
			$username = $_POST[username];
			$pass1 = $_POST[pass1];
			$name = $_POST[name];
			$sex = $_POST[sex];
			$birthday = $_POST[birthday];
			$email = $_POST[email];
			$birth_year = $_POST[birth_year];
			$birth_month = $_POST[birth_month];
			$birth_date = $_POST[birth_date];
			$address = $_POST[address];
?>			<form id="error_email_activate" action="<?=$rootpath?>main/text/" method="POST">
				<input type="hidden" name="username" value="<?=$username?>" />
				<input type="hidden" name="name" value="<?=$name?>" />
				<input type="hidden" name="sex" value="<?=$sex?>" />
				<input type="hidden" name="birthday" value="<?=$birthday?>" />
				<input type="hidden" name="email" value="<?=$email?>" />
				<input type="hidden" name="birth_year" value="<?=$birth_year?>" />
				<input type="hidden" name="birth_month" value="<?=$birth_month?>" />
				<input type="hidden" name="birth_date" value="<?=$birth_date?>" />
				<input type="hidden" name="activate_code" value="<?=$activate_code?>" />
				<input type="hidden" name="address" value="<?=$address?>" />
			</form>
<?php		echo "This E-mail is already registered <br>
				<a href=\"#\" onclick=\"submit_back('error_email_activate')\">Back";
		}

		elseif($fn == "first"){
				//############## send code to customer's e-mail

			$name = $_POST["name"];
			$email = $_POST["email"];

			$activate_code = $_POST["activate_code"];
			$username = $_POST["username"];

			$subject = "iMing account registration";
		/*	$text="
			<style type='text/css'>
				#activate_email_link A:link {
					COLOR: #0088ff;
					text-decoration: none;
				}
				#activate_email_link A:visited {
					COLOR: #0088ff;
					text-decoration: none;
				}
				#activate_email_link A:hover {
					COLOR: #0088ff;
					text-decoration: underline
				}
			</style>
			<div id=\"activate_email_link\">
				<font color='#333333'>
					Hello , ".$name." 
					<br>Welcome to i-Ming 
					<br>Thank you very much for your registration 
					<br>To confirm the i-Ming registration, 
					<br>Verify by <a href=\"http://www.i-ming.co.cc/accounts/activatedUser?fn=activatedNew&verifyNewUser="
					.$activate_code."&email=".$email."\">click here</a>

					<br><br>___________
					<br>best regards,
					<br><a href=\"http://www.i-ming.co.cc\">i-ming</a>
				</font>
			</div>
			";	*/
			$text="Hello, ".$name."
Welcome to i-Ming
Thank you very much for your registration 
To confirm the i-Ming registration, enter below link:
http://i-ming.co.cc/main/accounts/activatedUser.php?fn=activatedNew&verifyNewUser="
.$activate_code."&email=".$email."
			";


			include($rootpath."lib/mail_server.php");
			if (isset($mail_send)) {
				echo '<h1>i-Ming Registration has been sent, thank you</h1>
						please check your E-mail and verify your i-Ming account. <br>';
				echo "<a href=\"http://i-ming.co.cc/\">back</a>";
			}
			else {
?>				some problem to send e-mail <br>
				please use another E-mail.
				<br><a href="http://i-ming.co.cc/">back</a>
<?php		}


				//##################################### end send e-mail

				/*
				$_SESSION[su]=$username;
					echo '<html>
						   <head>
						   <title>Please wait . .</title>
						   </head>
						   <body OnLoad="OnLoadEvent();" >
						   <form name="ForwardForm" action="'.$rootpath.'main/text/" method="POST">
						    <input type="hidden" name="type" value="pre">
						    <input type="hidden" name="hsql" value="'.$SQL_insert.'">
						   </form>
						   <SCRIPT LANGUAGE="Javascript" >
						    function OnLoadEvent(){
						     document.ForwardForm.submit();
						     }
						   </SCRIPT>
						   </body>
						  </html>';
					mysql_close();
					die;
				*/
		}//end fn first


		//http://www.i-ming.co.cc/accounts/activatedUser?fn=activatedNew&verifyNewUser=bfd9f4ab38f3aab737733e098850d7938c6a18ae6c991fe85d9fcaea917f71fbdc9e384e&email=nikom2532@gmail.com

		//	http://localhost/ming/Test/SQL/[co.cc]/social/main/accounts/activatedUser.php?fn=activatedNew&verifyNewUser=bfd9f4ab38f3aab737733e098850d7938c6a18ae6c991fe85d9fcaea917f71fbdc9e384e&email=nikom2532@gmail.com

		elseif($fn == "activatedNew"){

			$verifyNewUser = $_GET["verifyNewUser"];
			$email = $_GET["email"];
			$username = $_GET["user"];
			$error_message = "invalid message<br><a href='#' onclick='javascript:window.close();'>close</a>";

			$sql = "
			SELECT `username`
			FROM  `social_iMing_customer_v3`
			WHERE `email` = '$email'
			";
			$username = "";
		    $result=mysql_query($sql);
		    while($rs=mysql_fetch_array($result)) {
				$username = $rs[username];
			}
			if($username != ""){
				$sql = "
				SELECT `code`
				FROM  `social_iMing_customer_activated` 
				WHERE `username` = '$username'
				";
				$code = "";
				$result=mysql_query($sql);
				while($rs=mysql_fetch_array($result)) {
					$code = $rs[code];
				}
				if($code != ""){
					if($code == $verifyNewUser){
						$sql_change = "
						DELETE FROM `social_iMing_customer_activated` 
						WHERE `username` = '$username'
						";
						$result=mysql_query($sql_change);
						if(!$result)die(mysql_error());
						$sql_change = "
						UPDATE  `social_iMing_customer_v3` 
						SET  `enable` =  'y' 
						WHERE `username` =  '$username'
						";
						$result=mysql_query($sql_change);
						if(!$result)die(mysql_error());
						else{
							$_SESSION[su] = $username;
							echo "<h1>i-Ming Registration has already been activated!, thank you</h1>
								<a href='".$rootpath."'>click here to continue to enter i-Ming</a>";
						//	header("location: ".$rootpath."main/text");
						}
					}
					else echo $error_message;
				}
				else echo $error_message;
			}
			else echo $error_message;
		}


//###################################### end function ###########################################

//include($rootpath."include/index_bottom.php");
//mysql_close();
?>
