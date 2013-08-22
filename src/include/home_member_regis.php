<?

//******  form input _POST method  ******
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
$flag = $_POST[flag];
//***************************************

if($flag=="ok") {
	$username=trim($_POST[username]);
	$pass1=trim($_POST[pass1]);
	$pass2=trim($_POST[pass2]);

	$msg_warn="";

	if((strlen($username)<4)||(strlen($username)>15)) {
		$msg_warn.="<br>¡ÃØ³ÒãÊè username 4-15 µÑÇÍÑ¡ÉÃ";
	} else {
		if(ereg("[^-|_|0-9a-zA-Z]",$username)) {
			$msg_warn= "<br>username ÊÒÁÒÃ¶ãªéµÑÇÍÑ¡ÉÃäŽéá€è a-z , A-Z, 0-9, - , _";
		}
		$SQL1="select username from social_iMing_customer_v3 where username='$username'";
		$result1=mysql_query($SQL1);
		if(mysql_num_rows($result1)>0) {
			$msg_warn.="<br>username : $username ÁÕŒÙéÍ×è¹ãªéáÅéÇ";
		}
	}
	if($pass1!=$pass2) {
		$warning= "<br>password 2 ªèÍ§ šÐµéÍ§àËÁ×Í¹¡Ñ¹";
	} 
	if((strlen($pass1)<4)||(strlen($pass1)>15)) {
		$warning= "<br>password šÐµéÍ§ÁÕ¢¹ÒŽ 4-15 µÑÇÍÑ¡ÉÃ";
	} 
	if(ereg("[^-|_|0-9a-zA-Z]",$pass1)) {
		$warning= "<br>password ÊÒÁÒÃ¶ãªéµÑÇÍÑ¡ÉÃäŽéá€è a-z , A-Z, 0-9, - , _";
	}
	if(empty($name)) {
		$msg_warn.="<br>¡ÃØ³ÒÃÐºØ ª×èÍ-¹ÒÁÊ¡ØÅ ŽéÇÂ";
	}
	if(empty($sex)) {
		$msg_warn.="<br>¡ÃØ³ÒàÅ×Í¡ àŸÈ ŽéÇÂ";
	}
	if(empty($email)) {
		$msg_warn.="<br>¡ÃØ³ÒÃÐºØÍÕàÁÅì";
	}
	if(empty($address)) {
		$msg_warn.="<br>¡ÃØ³ÒÃÐºØ·ÕèÍÂÙè";
	}
	if($msg_warn=="") {

		$regis_date=date("Y-m-d H:i:s");
		if (getenv(HTTP_X_FORWARDED_FOR)){ 
			$regis_ip=getenv(HTTP_X_FORWARDED_FOR); 
		}else{ 
			$regis_ip=getenv(REMOTE_ADDR); 
		}
		$birthday=$birth_year."-".$birth_month."-".$birth_date;

		//########################### create the activated code, make that user to be not avalable
		$activate_code = microtime(true);
		$activate_code = sha1(md5($activate_time)).md5(sha1($activate_time));


		//check the E-mail and username element first before save it to datebase.
		$return_rows_username = 0;
		$sql_username = "
		SELECT `username`
		FROM  `social_iMing_customer_v3` 
		WHERE `username` = '$username' ";
		$result_username = mysql_query($sql_username);
		$return_rows_username = mysql_num_rows($result_username);
		if($return_rows_username == 0){

			$return_rows_email = "";
			$sql_email = "
			SELECT `email`
			FROM  `social_iMing_customer_v3` 
			WHERE `email` = '$email' ";
			$result_email = mysql_query($sql_email);
			$return_rows_email = mysql_num_rows($result_email);
			if($return_rows_username == 0){

				//########################### query keep to database

				//####insert register to database
				$SQL_insert="INSERT INTO `social_iMing_customer_v3` (`username`, `password`, `name`, `sex`, `birthday`, `email`, `address`, `regis_date`, `regis_ip`, `last_login`, `enable`) values('$username', '". md5($_POST['pass1']) ."', '$name', '$sex', '$birthday', '$email', '$address', '$regis_date', '$regis_ip', now(), 'n')";
				$result=mysql_query($SQL_insert);
				if(!$result)die(mysql_error());


				//####insert the activated customer
				$SQL_insert="INSERT INTO `social_iMing_customer_activated` (`username`, `code`, `activated_time`) VALUES ('$username', '$activate_code', now())";
				$result=mysql_query($SQL_insert);
				if(!$result)die(mysql_error());


				//####insert the number counters
				$SQL_insert="INSERT INTO `social_iMing_customer_counts` (`username`, `views`, `views_last_time`, `comments`) values('$username', '0', now(), '0')";
				$result=mysql_query($SQL_insert);
				if(!$result)die(mysql_error());

				//####insert the customer_info
				$SQL_insert="INSERT INTO `social_iMing_customer_info` (`id`, `username`, `Hometown`, `Religion`, `Languages`, `intro`, `web`) VALUES (NULL, '$username', '', '', '', '', '')";
				$result=mysql_query($SQL_insert);
				if(!$result)die(mysql_error());

?>				<form id="send_activate_email" action="<?=$rootpath?>main/accounts/activatedUser.php" method="POST">
					<input type="hidden" name="fn" value="first" />
					<input type="hidden" name="name" value="<?=$name?>" />
					<input type="hidden" name="email" value="<?=$email?>" />
					<input type="hidden" name="activate_code" value="<?=$activate_code?>" />
					<input type="hidden" name="username" value="<?=$username?>" />
				</form>
				<script>
					document.getElementById('send_activate_email').submit();
				</script>
<?php
			}	//end check E-mail
			else{	//else check E-mail
?>
	
				<form id="error_email_activate" action="<?=$rootpath?>main/text/" method="POST">
					<input type="hidden" name="fn" value="username_registered" />
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
				<script>
					document.getElementById('error_email_activate').submit();
				</script>
			
<?php
			}	//end else check E-mail
		}	//end check username
		else{	//else username
?>
			<form id="error_username_activate" action="<?=$rootpath?>main/text/" method="POST">
				<input type="hidden" name="fn" value="username_registered" />
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
			<script>
				document.getElementById('error_username_activate').submit();
			</script>

<?php
		}	//end else username


	}	//end if($msg_warn=="") 
}	//end if($flag=="ok")
?>


<?php // Html below ?>


<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">

<!-- menu here -->
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="7"  bgcolor="aee3ed"></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr> 
                <td><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td valign="top">
                      <?php // ******************* insite main ******************** ?>
                      
                      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

                          <tr> 
                            <td><img src="<?=$rootpath?>images/space.gif" width="10" height="10"></td>
                          </tr>
                          <tr> 
                            <td><table width="100%" border="0" cellpadding="5" cellspacing="0" class="fline">
                                <tr> 
                                  <td valign="top"><TABLE cellSpacing=2 cellPadding=0 width="100%" border=0 bgcolor="#f2fffc">
                                      <TBODY>
                                        <TR> 
                                          <TD> </TD>
                                        </TR>

                                        <TR> 
                                          <TD class="bkheadnor"><FONT 
        color=#cc0000><U>Do you want to join ?</U></FONT></TD>
                                        </TR>
                                        <TR> 
                                          <TD class=body> <P class="nortxt"> 
                                              It is free, It is fun, It is easy to use<br>
                                              a new one, join now!
                                       
                                              <BR>
                                              <BR>
                                            </P></TD>
                                        </TR>
                                        <TR> 
                                          <TD class=body vAlign=top>



<script language="javascript">
	function Validator(myForm)
	{
		if((myForm.username.value.length<4) || (myForm.username.value.length>15))
		{
			alert('ª×èÍà¢éÒÃÐººšÐµéÍ§ÂÒÇ 4-15 µÑÇÍÑ¡ÉÃ€èÐ');
			myForm.username.focus();
			return(false);
		}
		if((myForm.pass1.value.length<4) || (myForm.pass1.value.length>15))
		{
			alert('ÃËÑÊŒèÒ¹µéÍ§ÁÕ¢¹ÒŽ 4-15 µÑÇÍÑ¡ÉÃ€èÐ');
			myForm.pass1.focus();
			return(false);
		}
		if(myForm.pass1.value!=myForm.pass2.value)
		{
			alert('ÃËÑÊŒèÒ¹ 2 ªèÍ§äÁèµÃ§¡Ñ¹€èÐ');
			myForm.pass1.focus();
			return(false);
		}


		if(myForm.name.value.length<1)
		{
			alert('¡ÃØ³Ò¡ÃÍ¡ª×èÍ-¹ÒÁÊ¡ØÅ¢Í§·èÒ¹ŽéÇÂ€èÐ');
			myForm.name.focus();
			return(false);
		}


		if((!myForm.sex[0].checked)&&(!myForm.sex[1].checked))
		{
			alert('¡ÃØ³ÒàÅ×Í¡àŸÈŽéÇÂ€èÐ');
			return(false);
		}

			var Accept = "@";
			var Data = myForm.email.value;
			var Valid = false;

			for (i = 0;  i < Data.length;  i++)
			{
					ch = Data.charAt(i);
						if (ch == Accept)
							Valid = true;
			}
			if (!Valid)
			{
					alert("¡ÃØ³ÒãÊèÍÕàÁÅì·Õè¶Ù¡µéÍ§ŽéÇÂ€èÐ");
					myForm.email.focus();
					return (false);
			}
		if(myForm.address.value.length<1)
		{
			alert('¡ÃØ³Ò¡ÃÍ¡·ÕèÍÂÙèŽéÇÂ€èÐ');
			myForm.address.focus();
			return(false);
		}



		return (true);
	}
</script>

	<table width="480"  border="0" cellspacing="2" cellpadding="0" align="center">
		<tr class="nortxt">
			<td align="center">
			<font color="FF0000"><?=$msg_warn?></font>
			</td>
		</tr>
	</table>
	<form action="" method="post" name="regis" onsubmit="return Validator(this)">
		<input type="hidden" name="flag" value="ok">

<?php
include($rootpath."include/member_regis_form.php");
?>
</form>
</TD>
                                        </TR>
                                      </TBODY>
                                    </TABLE></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td> <TABLE width="98%" border=0 align="center" cellPadding=0 cellSpacing=1>
                    <TBODY>
                    </TBODY>
                  </TABLE></td>
              </tr>
              <tr> 
                <td height="10"><img src="<?=$rootpath?>images/space.gif" width="8" height="10"></td>
              </tr>
              <tr> 
                <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td background="<?=$rootpath?>images/bo_line.gif"><img src="<?=$rootpath?>images/bo_line.gif" width="53" height="3"></td>
                    </tr>
                    <tr> 
                      <td height="5"><img src="<?=$rootpath?>images/space.gif" width="15" height="5"></td>
                    </tr>

                    <tr> 
                      <td height="40" class="grlink"><div align="center"><span class="grtxt">
                          <br>

                        </div></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
          <td width="7"  bgcolor="aee3ed"></td>
        </tr>
      </table></td>
  </tr>
</table>                                      
</body>
</html>
<?
//include($rootpath."include/index_bottom.php");
?>
