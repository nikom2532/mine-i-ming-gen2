<?
$rootpath="";
session_start();
if($_SESSION[su]=="") {
	die;
}
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}

include($rootpath."include/index_head.php");


if($flag=="ok") {
	$username=trim($_POST[username]);
	$pass1=trim($_POST[pass1]);
	$pass2=trim($_POST[pass2]);



	$msg_warn="";

	if($pass1!=$pass2) {
		$warning= "<br>password 2 ช่อง จะต้องเหมือนกัน";
	} else {
		if(strlen($pass1)==0) {
			$sql_pass="";
		} else {
			if((strlen($pass1)<4)||(strlen($pass1)>15)) {
				$warning= "<br>password จะต้องมีขนาด 4-15 ตัวอักษร";
			} 
			if(ereg("[^-|_|0-9a-zA-Z]",$newpass1)) {
				$warning= "<br>password สามารถใช้ตัวอักษรได้แค่ a-z , A-Z, 0-9, - , _";
			}
			$sql_pass=" password='$pass1', ";
		}
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
		
    $birthday=$birth_year."-".$birth_month."-".$birth_date;

		$SQL2="update social_iMing_customer_v3 set $sql_pass name='$name', sex='$sex', birthday='$birthday',  email='$email', address='$address' where username='$_SESSION[su]' ";
		$result2=mysql_query($SQL2);
		if(!$result2)die(mysql_error());

    echo "<SCRIPT LANGUAGE='JavaScript'>window.alert('แก้ไขข้อมูล เรียบร้อยแล้ว')</SCRIPT>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    die;

	}
} else {// end ok

	$SQL="select * from social_iMing_customer_v3 where username='$_SESSION[su]'";
	$result=mysql_query($SQL);
	$rs=mysql_fetch_array($result);

	$name=$rs[name];
	$sex=$rs[sex];
	//$phone=$rs[phone];
	$email=$rs[email];
	$address=$rs[address];
//	$occupation=$rs[occupation];
  $birth_date=substr($rs[birthday],8,2);
  $birth_month=substr($rs[birthday],5,2);
  $birth_year=substr($rs[birthday],0,4);



$msg1="ถ้าต้องการเปลี่ยนรหัสผ่าน ให้ใส่ทั้ง 2 ช่อง";
$msg2="หากต้องการใช้รหัสผ่านเดิม ให้ว่างไว้";
}


?>

<table width='750' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td width='7'></td>
        <td>
						<table width='100%' border='0' cellspacing='0' cellpadding='0'>
              <tr> 
                <td></td>
              </tr>
	          <tr> 
                 <td>


					<table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr> 
                      <td height="24" bgcolor="222222" class="btxt" align="center"><b>แก้ไขข้อมูลสมาชิก</b></td>
                    </tr>
					</table>

<script language="javascript">
	function Validator(myForm)
	{

		if(myForm.pass1.value!=myForm.pass2.value)
		{
			alert('รหัสผ่าน 2 ช่องไม่ตรงกันค่ะ');
			myForm.pass1.focus();
			return(false);
		}


		if(myForm.name.value.length<1)
		{
			alert('กรุณากรอกชื่อของท่านด้วยค่ะ');
			myForm.firstname.focus();
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
		   <td align="center"><font color="FF0000"><?=$msg_warn?></font></td>
		   </tr><form action="" method="post" name="edit" onsubmit="return Validator(this)">
					<input type="hidden" name="flag" value="ok">
		 </table>
<?
include($rootpath."include/member_regis_form.php");
?>
</form>


				</td>
              </tr>
			</table></td>
        <td width='5'></td>
		</tr>
	</table></td>
	</tr>
</table>
<?
include($rootpath."include/index_bottom.php");
?>
