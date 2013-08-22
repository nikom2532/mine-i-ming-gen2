<?
$rootpath="";
session_start();
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");

if (!$db->open()){
	die($db->error());
}
//include($rootpath."include/index_head.php");


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

//for test
//echo $username.$pass1.$name.$sex.$birthday.$email.$birth_year.$birth_month.$birth_date.$address."<br>".$flag;

if($flag=="ok") {
	$username=trim($_POST[username]);
	$pass1=trim($_POST[pass1]);
	$pass2=trim($_POST[pass2]);

	$msg_warn="";

	if((strlen($username)<4)||(strlen($username)>15)) {
		$msg_warn.="<br>กรุณาใส่ username 4-15 ตัวอักษร";
	} else {
		if(ereg("[^-|_|0-9a-zA-Z]",$username)) {
			$msg_warn= "<br>username สามารถใช้ตัวอักษรได้แค่ a-z , A-Z, 0-9, - , _";
		}
		$SQL1="select username from social_iMing_customer_v3 where username='$username'";
		$result1=mysql_query($SQL1);
		if(mysql_num_rows($result1)>0) {
			$msg_warn.="<br>username : $username มีผู้อื่นใช้แล้ว";
		}
	}
	if($pass1!=$pass2) {
		$warning= "<br>password 2 ช่อง จะต้องเหมือนกัน";
	} 
	if((strlen($pass1)<4)||(strlen($pass1)>15)) {
		$warning= "<br>password จะต้องมีขนาด 4-15 ตัวอักษร";
	} 
	if(ereg("[^-|_|0-9a-zA-Z]",$pass1)) {
		$warning= "<br>password สามารถใช้ตัวอักษรได้แค่ a-z , A-Z, 0-9, - , _";
	}
	if(empty($name)) {
		$msg_warn.="<br>กรุณาระบุ ชื่อ-นามสกุล ด้วย";
	}
	if(empty($sex)) {
		$msg_warn.="<br>กรุณาเลือก เพศ ด้วย";
	}
	if(empty($email)) {
		$msg_warn.="<br>กรุณาระบุอีเมล์";
	}
	if(empty($address)) {
		$msg_warn.="<br>กรุณาระบุที่อยู่";
	}
	if($msg_warn=="") {

		$regis_date=date("Y-m-d H:i:s");
		if (getenv(HTTP_X_FORWARDED_FOR)){ 
		$regis_ip=getenv(HTTP_X_FORWARDED_FOR); 
		}else{ 
		$regis_ip=getenv(REMOTE_ADDR); 
	}
	$birthday=$birth_year."-".$birth_month."-".$birth_date;
/*
	// MD5 for password
	if(isset($pass1)){
		$pass1 =md5($pass1);
	}
*/
	//insert register to database
	$SQL_insert="INSERT INTO `social_iMing_customer_v3` (`username`, `password`, `name`, `sex`, `birthday`, `email`, `address`, `regis_date`, `regis_ip`, `last_login`, `enable`) values('$username', '". md5($_POST['pass1']) ."', '$name', '$sex', '$birthday', '$email', '$address', '$regis_date', '$regis_ip', now(), 'y')";
	$result=mysql_query($SQL_insert);
	if(!$result)die(mysql_error());

	//insert the number counters
	$SQL_insert="INSERT INTO `social_iMing_customer_counts` (`username`, `views`, `views_last_time`, `comments`) values('$username', '0', now(), '0')";
	$result=mysql_query($SQL_insert);
	if(!$result)die(mysql_error());

	//insert the customer_info
	$SQL_insert="INSERT INTO `social_iMing_customer_info` (`id`, `username`, `Hometown`, `Religion`, `Languages`, `intro`, `web`) VALUES (NULL, '$username', '', '', '', '', '')";
	$result=mysql_query($SQL_insert);
	if(!$result)die(mysql_error());



	$_SESSION[su]=$username;
		echo '<html>
               <head>
               <title>Please wait . .</title>
               </head>
               <body OnLoad="OnLoadEvent();" >
               <form name="ForwardForm" action="./comment.php" method="POST">
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
	}
}
?>


<? // Html below ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>nikom2532</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	color: #FFFFFF;
}
//-->
</style>
<link href="<?=$rootpath?>css/style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#effbfd" background="<?=$rootpath?>images/background.jpg" bgproperties="fixed">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="900"><img src="<?=$rootpath?>images/logo v.1.0.jpg"></td>
        </tr>
        <tr > 
          <td bgcolor="aee3ed">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
<? // menu here ?>
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="7"  bgcolor="aee3ed"></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr> 
                <td><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td valign="top">
                      <? // ******************* insite main ******************** ?>
                      
                      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

                          <tr> 
                            <td><img src="<?=$rootpath?>images/space.gif" width="10" height="10"></td>
                          </tr>
                          <tr> 
                            <td><table width="100%" border="0" cellpadding="5" cellspacing="0" class="fline">
                                <tr> 
                                  <td valign="top"><TABLE cellSpacing=2 cellPadding=0 width="100%" border=0 bgcolor="40c9f6">
                                      <TBODY>
                                        <TR> 
                                          <TD> </TD>
                                        </TR>

                                        <TR> 
                                          <TD class="bkheadnor"><FONT 
        color=#cc0000><U>หมายเหตุ</U></FONT></TD>
                                        </TR>
                                        <TR> 
                                          <TD class=body> <P class="nortxt"> 
                                              กรุณากรอกข้อมูลในช่องที่มีเครื่องหมาย 
                                              <FONT 
            color=#cc0000>*</FONT> กํากับอยู่ให้ครบถ้วนสมบูรณ์ เพื่อความสะดวกของสมาชิกในการใช้บริการ 
                                       
                                              <BR>
                                              <BR>
                                            </P></TD>
                                        </TR>
                                        <TR> 
                                          <TD class=body></TD>
                                        </TR>
                                        <TR> 
                                          <TD class=body vAlign=top height=4> </TD>
                                        </TR>
                                        <TR> 
                                          <TD class=body vAlign=top></TD>
                                        </TR>
                                        <TR> 
                                          <TD class=body vAlign=top>


					<table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr> 
                      <td height="24" bgcolor="b0eef9" class="btxt" align="center"><b>แบบฟอร์มสมัครสมาชิก</b></td>
                    </tr>
					</table>

<script language="javascript">
	function Validator(myForm)
	{
		if((myForm.username.value.length<4) || (myForm.username.value.length>15))
		{
			alert('ชื่อเข้าระบบจะต้องยาว 4-15 ตัวอักษรค่ะ');
			myForm.username.focus();
			return(false);
		}
		if((myForm.pass1.value.length<4) || (myForm.pass1.value.length>15))
		{
			alert('รหัสผ่านต้องมีขนาด 4-15 ตัวอักษรค่ะ');
			myForm.pass1.focus();
			return(false);
		}
		if(myForm.pass1.value!=myForm.pass2.value)
		{
			alert('รหัสผ่าน 2 ช่องไม่ตรงกันค่ะ');
			myForm.pass1.focus();
			return(false);
		}


		if(myForm.name.value.length<1)
		{
			alert('กรุณากรอกชื่อ-นามสกุลของท่านด้วยค่ะ');
			myForm.name.focus();
			return(false);
		}


		if((!myForm.sex[0].checked)&&(!myForm.sex[1].checked))
		{
			alert('กรุณาเลือกเพศด้วยค่ะ');
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
					alert("กรุณาใส่อีเมล์ที่ถูกต้องด้วยค่ะ");
					myForm.email.focus();
					return (false);
			}
		if(myForm.address.value.length<1)
		{
			alert('กรุณากรอกที่อยู่ด้วยค่ะ');
			myForm.address.focus();
			return(false);
		}



		return (true);
	}
</script>

	<table width="580"  border="0" cellspacing="2" cellpadding="0" align="center">
		<tr class="nortxt">
			<td align="center">
			<font color="FF0000"><?=$msg_warn?></font>
			</td>
		</tr>
	</table>
	<form action="" method="post" name="regis" onsubmit="return Validator(this)">
		<input type="hidden" name="flag" value="ok">

<?
include("member_regis_form.php");
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
                          Copyright &copy; 2011, by Arming Huang All rights reserved.</span><br>
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
