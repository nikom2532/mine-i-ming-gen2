<?
$rootpath ="";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=3;
include($rootpath."include/index_head.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?

echo "
<table width='850' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td width='7'></td>
        <td>



";


if($_SESSION[su]=="") {

echo "<br><br><br><table width='700'  border='0' cellspacing='2' cellpadding='0' align='center'>
		   <tr class='nortxt'>
		   <td align='center'><font color='FF0000'>กรุณา Login ในส่วนของสมาชิกก่อนที่จะตั้งกระทู้ได้</font></td>
		   </tr>
		 </table><br><br>";

} else {

if($flag=="ok") {
	$msg_warn="";

	if(empty($wp_topic)) {
		$msg_warn.="<br>กรุณาระบุหัวข้อกระทู้ด้วย";
	}

	if(empty($wp_detail)) {
		$msg_warn.="<br>กรุณาพิมพ์รายละเอียดด้วย";
	}

	if(empty($wp_name)) {
		$msg_warn.="<br>กรุณาลงชื่อของคุณด้วย";
	}


	if($msg_warn=="") {
		if (getenv(HTTP_X_FORWARDED_FOR)){ 
		$wp_ip=getenv(HTTP_X_FORWARDED_FOR); 
		}else{ 
		$wp_ip=getenv(REMOTE_ADDR); 
		}
		$wp_topic=htmlspecialchars($wp_topic);
		$wp_detail=nl2br(htmlspecialchars($wp_detail));
		$wp_date=date("Y-m-d H:i:s");
		$news_post_ip=getenv(REMOTE_ADDR);

		$SQL="	 insert into webboard_post(wp_topic, wp_detail, wp_name, username, wp_date, wp_ip, wp_show) values('$wp_topic', '$wp_detail', '$wp_name', '$_SESSION[su]', '$wp_date', '$wp_ip', 'y')";
		$result=mysql_query($SQL);
		if(!$result)die(mysql_error());

		$wp_id=mysql_insert_id();

		echo "<meta http-equiv='refresh' content='0; url=topic.php?wp_id=$wp_id'>";

		//header("Location:index.php?menu=3&subpage=3.1&news_id=$news_id");
		die;

	}
}




?>
		<table width="700"  border="0" cellspacing="2" cellpadding="0" align="center">
		   <tr class="nortxt">
		   <td align="center"><font color="FF0000"><?=$msg_warn?></font></td>
		   </tr>
		 </table>
						<table width="700"  border="0" cellspacing="2" cellpadding="0" align="center">
						<form action="" method="post"><input type="hidden" name="flag" value="ok">
                          <tr class="nortxt"> 
                            <td height="20">
                                <table width="98%"  border="0" cellspacing="0" cellpadding="0">
                                  <tr class="nortxt"> 
                                    <td height="20" bgcolor="222222" align="center"><b>ตั้งกระทู้</b></td>
                                  </tr>
                                </table>
                               </td>
                          </tr>
                          <tr class="nortxt"> 
                            <td height="20"  align="center"><b>&nbsp;</b></td>
                          </tr>
                          <tr class="nortxt"> 
                            <td height="20"><div align="left"> 
                                <table width="80%" border="0" cellspacing="3" cellpadding="0" align="center">
								  <tr class="nortxt"> 
										 <td><b>
										 หัวข้อกระทู้</b></td>
										 <td> 
											<input type="text" name="wp_topic" class="nortxt" size="60" maxlength="150" value="<?=$wp_topic?>"> <font color="FF0000">*</font>
										  </td>
								  </tr>
								  <tr class="nortxt" bgcolor="111111"> 
										 <td><b>
										 รายละเอียด </b></td>
										 <td>
											<textarea name="wp_detail" id="wp_detail" rows="6" cols="60"><?=$wp_detail?></textarea>
											<font color="FF0000">*</font>
										 </td>
								   </tr>
								  <tr class="nortxt"> 
										 <td><b>
										 จากคุณ </b></td>
										 <td>
											<input type="text" name="wp_name" size="20" maxlength="100" value="<?=$wp_name?>"> (<?=$_SESSION[su]?>)<font color="FF0000">*</font>
										 </td>
								   </tr>
								  <tr class="nortxt"> 
										 <td></td>
										 <td> 
											<input type="submit" value="submit">
										  </td>
								  </tr></form>
								  </table>
								  </td></tr></table>


<?
} // end session username check
echo "
		</td>
        <td width='5'></td>
		</tr>
	</table></td>
	</tr>
</table>


";


include($rootpath."include/index_bottom.php");
mysql_close();
?>
