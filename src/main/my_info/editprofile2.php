<?
	//---- initial GET
	$edit = $_POST["edit"];

	//---- initial POST
	$Hometown = $_POST["Hometown"];
	$Religion = $_POST["Religion"];
	$Languages = $_POST["Languages"];
	$intro = $_POST["intro"];
	$web = $_POST["web"];
	$submit_info = $_POST["submit_info"];

	$own_body = $_SESSION[su];

	header ("location: editprofile.php?edit=".$edit."&success=1");

//#######################################################

$rootpath ="../../";
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
?>

<font size="3" color="#000000">
<br>

<?php
	if($edit = "info")		//edit profile info...
	{
?>
<!--####################### Profile ####################-->

<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr>

	<!-- ######################### Left slide 1. Profile picture ######################## -->
	<td align="center" VALIGN="top" width="20%"> 
		<?php
			$own_body = $_SESSION[su];
			include($rootpath."include/body_Left_slide.php");
		?>
	</td>

	<!-- ########################## middle sheet ####################### -->
	<td align="left" VALIGN="top" width="55%">

		<!-- ################### top middle (profile name) ################## -->
		<font size="5" color="#000000">
          <?php
            $SQL="SELECT * FROM social_iMing_customer_v3 where username='$own_body'";
            $result=mysql_query($SQL);
            while($rs=mysql_fetch_array($result)) {
				echo "<a href=\"".$rootpath."comment.php\">".$rs[name]."</a>";
			}
          ?>
			<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
			Infomation
			<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
			<?php echo "edit : ".$edit; ?>
          <br />
		</font>
		<br />

		<!-- ################### middle middle (info) ################## -->


<?php
												//echo $submit_info;	//for test
		//take data insert into DB
		if($submit_info != '')
		{
			$sql = "UPDATE `social_iMing_customer_info` SET `Hometown` =  '$Hometown', `Religion` =  '$Religion', `Languages` =  '$Languages', `intro` =  '$intro', `web` =  '$web' WHERE  `social_iMing_customer_info`.`username` =  '$own_body'";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());
		}

?>
	</td>
	<td align="center" VALIGN="top" width="25%"> 
	<!-- ########################## right sheet ####################### -->
<?php /* ?>
		<a href="<?=$rootpath?>main/my_info.php">info</a>
<?php */ ?>

	</td>
  </tr>
</table>
<?php
	}//end edit = info

?>


</font>

<?
include($rootpath."include/index_bottom.php");
mysql_close();
}	//end check login
?>
