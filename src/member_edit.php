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
		$warning= "<br>password 2 ��ͧ �е�ͧ����͹�ѹ";
	} else {
		if(strlen($pass1)==0) {
			$sql_pass="";
		} else {
			if((strlen($pass1)<4)||(strlen($pass1)>15)) {
				$warning= "<br>password �е�ͧ�բ�Ҵ 4-15 ����ѡ��";
			} 
			if(ereg("[^-|_|0-9a-zA-Z]",$newpass1)) {
				$warning= "<br>password ����ö�����ѡ������ a-z , A-Z, 0-9, - , _";
			}
			$sql_pass=" password='$pass1', ";
		}
	}

	if(empty($name)) {
		$msg_warn.="<br>��س��к� ����-���ʡ�� ����";
	}



	if(empty($sex)) {
		$msg_warn.="<br>��س����͡ �� ����";
	}

	if(empty($email)) {
		$msg_warn.="<br>��س��к�������";
	}


	if(empty($address)) {
		$msg_warn.="<br>��س��кط������";
	}




	if($msg_warn=="") {
		
    $birthday=$birth_year."-".$birth_month."-".$birth_date;

		$SQL2="update social_iMing_customer_v3 set $sql_pass name='$name', sex='$sex', birthday='$birthday',  email='$email', address='$address' where username='$_SESSION[su]' ";
		$result2=mysql_query($SQL2);
		if(!$result2)die(mysql_error());

    echo "<SCRIPT LANGUAGE='JavaScript'>window.alert('��䢢����� ���º��������')</SCRIPT>";
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



$msg1="��ҵ�ͧ�������¹���ʼ�ҹ �������� 2 ��ͧ";
$msg2="�ҡ��ͧ��������ʼ�ҹ��� �����ҧ���";
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
                      <td height="24" bgcolor="222222" class="btxt" align="center"><b>��䢢�������Ҫԡ</b></td>
                    </tr>
					</table>

<script language="javascript">
	function Validator(myForm)
	{

		if(myForm.pass1.value!=myForm.pass2.value)
		{
			alert('���ʼ�ҹ 2 ��ͧ���ç�ѹ���');
			myForm.pass1.focus();
			return(false);
		}


		if(myForm.name.value.length<1)
		{
			alert('��سҡ�͡���ͧ͢��ҹ���¤��');
			myForm.firstname.focus();
			return(false);
		}

		if((!myForm.sex[0].checked)&&(!myForm.sex[1].checked))
		{
			alert('��س����͡�ȴ��¤��');
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
					alert("��س������������١��ͧ���¤��");
					myForm.email.focus();
					return (false);
			}
		


		if(myForm.address.value.length<1)
		{
			alert('��سҡ�͡���������¤��');
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
