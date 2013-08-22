<?

$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=2;

	//---- initial GET
	$edit = $_GET["edit"];
	$success = $_GET["success"];

/*
	//---- initial POST
	$Hometown = $_POST["Hometown"];
	$Religion = $_POST["Religion"];
	$Languages = $_POST["Languages"];
	$intro = $_POST["intro"];
	$web = $_POST["web"];
	$submit_info = $_POST["submit_info"];
*/
	//#### initial values
	$menu1 = "info";

	$own_body = $_SESSION[su];

	include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{
?>

<font size="3" color="#000000">
<br>

<?php
	if($edit == "info")		//edit profile info...
	{
?>
<!--####################### Profile ####################-->

<div class="bodytext">

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
			<a href="<?=$rootpath?>main/my_info/">Infomation</a>
			<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
			<?php echo "edit : ".$edit; ?>
          <br />
		</font>
		<br />

		<!-- ################### middle middle (info) ################## -->

		<form name="edit1" action="<?=$rootpath?>main/my_info/editprofile2.php" method="POST">
			<input name="edit" type="hidden" value="<?=$edit?>">
			<table border="0" width="100%" align="center" VALIGN="middle" cellpadding="2" cellspacing="2">

	<?php /* ?>
			  <tr>
				<td align="right" VALIGN="top" width="30%">
				  <?php
					$SQL="SELECT * FROM social_iMing_customer_v3 where username='$own_body'";
					$result=mysql_query($SQL);
					while($rs=mysql_fetch_array($result)) {
				  ?>
				  sex : 
				</td>
				<td align="left" VALIGN="top" width="70%">
				  <?php
					  if($rs[sex] == 'm')
					    echo "male";
					  else if($rs == 'f')
					    echo "male";
					  else{ echo "unknown"; }
				  ?>
				</td>
			  </tr>
			  <tr>
				<td align="right" VALIGN="top" width="30%">
				  birthday : 
				</td>
				<td align="left" VALIGN="top" width="70%">
					<input name=birthday type="text" value="<?=$rs[birthday]?>">
				</td>
			  </tr>
			  <tr>
				<td align="right" VALIGN="top" width="30%">
				  E-Mail : 
				</td>
				<td align="left" VALIGN="top" width="70%">
					<input name=email type="text" value="<?=$rs[email]?>">
				</td>
			  </tr>
			  <tr>
				<td align="right" VALIGN="top" width="30%">
				  Address : 
				</td>
				<td align="left" VALIGN="top" width="70%">
					<input name=address type="text" value="<?=$rs[address]?>">
				  <?php
					}
				  ?>
				</td>
			  </tr>
	<?php */ ?>

			  <tr>
				<td align="right" VALIGN="top" width="30%">
					Hometown :
				</td>
				<td align="left" VALIGN="top" width="70%">
				  <?php
					$sql="SELECT * FROM social_iMing_customer_info where username='$own_body'";
					$result=mysql_query($sql);
					while($rs=mysql_fetch_array($result)) {
				  ?>
					<input name=Hometown size="60" type="text" value="<?=$rs[Hometown]?>">
				</td>
			  </tr>
			  <tr>
				<td align="right" VALIGN="top" width="30%">
					Religion :
				</td>
				<td align="left" VALIGN="top" width="70%">
					<input name=Religion size="60 type="text" value="<?=$rs[Religion]?>">
				</td>
			  </tr>
			  <tr>
				<td align="right" VALIGN="top" width="30%">
					Languages :
				</td>
				<td align="left" VALIGN="top" width="70%">
					<input name=Languages size="60 type="text" value="<?=$rs[Languages]?>">
				</td>
			  </tr>
			  <tr>
				<td align="right" VALIGN="top" width="30%">
					introduction :
				</td>
				<td align="left" VALIGN="top" width="70%">
					<textarea class="message" cols="40" rows="4" name="intro" style="border: 1px solid #d2dae7; resize: none;" placeholder="introduction here"><?=$rs[intro]?></textarea>
					<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
				</td>
			  </tr>
			  <tr>
				<td align="right" VALIGN="top" width="30%">
					web :
				</td>
				<td align="left" VALIGN="top" width="70%">
					<input name=web size="60 type="text" value="<?=$rs[web]?>">
				</td>
			  </tr>
			  <tr>
				<td VALIGN="top" style="text-align: center" colspan="2">
					<input  type="submit" name="submit_info" value="record">
				  <?php
					}
				  ?>
				</td>
			  </tr>
			  <tr>
				<td VALIGN="top" style="text-align: center" colspan="2">
				<?php
					if($success == "1") echo "success recorded";
				?>
				</td>
			  </tr>
			</table>
		</form> <!-- end edit1 form -->
<?php
		//echo $submit_info;	//for test

/*
		//take data insert into DB
		if($submit_info != '')
		{
			$sql = "UPDATE `social_iMing_customer_info` SET `Hometown` =  '$Hometown', `Religion` =  '$Religion', `Languages` =  '$Languages', `intro` =  '$intro', `web` =  '$web' WHERE  `social_iMing_customer_info`.`username` =  '$own_body'";
			$result=mysql_query($sql);
			if(!$result)die(mysql_error());
		}
*/

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

</div>

</font>

<?
include($rootpath."include/index_bottom.php");
mysql_close();
}	//end check login
?>
