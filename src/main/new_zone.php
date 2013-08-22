<?php
$rootpath ="../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=0;

	//---- initial GET
	$friend = $_GET["friend"];
	$subscriber = $_GET["subscriber"];

	//#### initial values
	$menu1 = "zone";

	include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{
?>

<font size="3" color="#000000">
<br>

<!--####################### main ####################-->
<div class="bodytext">

<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr>

	<!-- ######################### Left slide 1. Profile picture ######################## -->
	<td align="center" VALIGN="top" width="20%"> 
		<?php
			if($friend != ""){
				$own_body = $friend;
			}
			else $own_body = $_SESSION[su];
			include($rootpath."include/body_Left_slide_zone.php");
		?>
	</td>

	<!-- ########################## middle sheet ####################### -->
	<td align="left" VALIGN="top" width="55%">




		<table border="0" width="100%" align="center" VALIGN="top" cellpadding="2" cellspacing="2">
			<tr style="text-align: left; width: 100%;">
				<td VALIGN="top" style="text-align: left; width: 100%;">

					<!--####################### show comment ######################-->
					  <?php
//						  $SQL_comment="select * from 'social_iMing_comment' INNER JOIN 'social_iMing_friends' ON 'social_iMing_comment.username_from' = 'social_iMing_friends.username' where username='$_SESSION[su]' ORDER BY `post_time` DESC";

/*						  $SQL_comment="
							select *
							from `social_iMing_comment`
							INNER JOIN `social_iMing_friends` 
							on `social_iMing_comment`.`username_from` = `social_iMing_friends`.`username`
							where `social_iMing_comment`.`username` = ".$_SESSION[su]."
							ORDER BY `social_iMing_comment`.`post_time` DESC
							";
*/
						  $SQL_comment="
							SELECT `social_iMing_comment`.*
							FROM  `social_iMing_comment` 
							INNER JOIN  `social_iMing_friends` 
							ON  `social_iMing_friends`.`fnd` =  `social_iMing_comment`.`username_from` 
							WHERE  `social_iMing_friends`.`username` =  '$_SESSION[su]'
							ORDER BY  `social_iMing_comment`.`post_time` DESC 
							";
//							."LIMIT 0 , 30";

						  $result_comm = mysql_query($SQL_comment);
						  $return_rows_comment = mysql_num_rows($result_comm);
						  $return_rows_thattime = 0;
						  while($rs_comm=mysql_fetch_array($result_comm))
						  {
					  ?>
							<table border="0" align="left" VALIGN="top" width="450" cellpadding="2" cellspacing="0">
<?php
							if($return_rows_thattime % 2 == 1)
							{
?>
							  <tr class="table_comment" style="text-align: center">
					<?php	}else{	?>	
							  <tr style="text-align: center">
<?php						}
							$return_rows_thattime++;
?>
								  <td VALIGN="top" style="text-align: left; width: 50">
									<?php
										$url = "";
										$sql = "SELECT url FROM social_iMing_images WHERE username='$rs_comm[username_from]' AND image_album = 'Profile Pictures'";
										$result = mysql_query($sql);
										$return_rows = mysql_num_rows($result);
										while($rs=mysql_fetch_array($result))
										{
											$url = $rs[url];
										}
										if($url != ""){							/*  $_SERVER['PHP_SELF']  */
											echo "<a href=\"".$rootpath."main/text/?friend=".$rs_comm[username_from]."\">".
												 "<img width='50' height='50' src=\"".$rootpath."images/profile_picture/"
												 .$url."\"></a>";
										}
										else{
											echo "<a href=\"".$rootpath."main/text/?friend=".$rs_comm[username_from]."\">".
												 "<img width='50' height='50' src=\"".$rootpath."images/profile3.png\">"
												 ."</a>";
										}
									?>
								  </td>
								  <td VALIGN="top" style="text-align: left; width: 580">
									  <table border="0" align="center" VALIGN="top" width="100%" cellpadding="2" cellspacing="2">
										<tr style="text-align: center"> 
										  <td VALIGN="top" style="text-align: left" width="260">
											<a href="<?php echo $rootpath; ?>main/text?friend=<?php echo $rs_comm[username_from]; ?>"><?php echo $rs_comm['username_from']; ?></a>
											<img src="<?=$rootpath?>images/arr3.png" width="10" height="10">
											<a href="<?php echo $rootpath; ?>main/text?friend=<?php echo $rs_comm[username]; ?>">	<?php echo $rs_comm['username']; ?></a>
										  </td>
										  <td VALIGN="top" style="text-align: left" width="300">
											<?php echo $rs_comm[post_time]; ?>
								  		  </td>


										
										</tr>
										<tr style="text-align: center">
										  <td VALIGN="top" style="text-align: left" width="400" colspan="3">
											<?php
												//	we use strlen(~str~) to count string, substr(~str~ , start from, number) to cut the string
												for($ii=0;$ii<strlen($rs_comm[comment_text]);$ii=$ii+55)
												{
													echo substr($rs_comm[comment_text],$ii,55)."<br>";
												}
											?>
										  </td>
										</tr>
<!--								 	<tr style="text-align: center">
										  <td height="10" width="400" colspan="3">
											<font size="1"><?php // for($i=1;$i<140;$i++) echo "."; ?></font>
										  </td>
										</tr>			-->
									  </table>
								  </td>
								</tr>
<!--
								<tr style="text-align: center">
								  <td VALIGN="top" style="text-align: left; width: 100%"  colspan="2">			-->
<!--								<table border="0" width="100%" align="left" VALIGN="top" cellpadding="0" cellspacing="0">
									  <tr height="10"><td color = "#000000" height="10" weight="100%"></td></tr></table>
-->									  <!-- hr style="color:#bee3ff; background-color:#bee3ff; height:0.01px;" / -->
									  <!-- hr noshade="noshade" style="color:#ffffff; background-color:#bee3ff; height:0.1px;"/ -->

<!--								  <img src="<?=$rootpath?>images/HR_line.png">
								  </td>
								</tr>			-->
							</table>

					  <?php
						  }
					  ?>

				</td>
			</tr>
		</table>





	</td>


	<td align="center" VALIGN="top" width="25%"> 
	<!-- ########################## right sheet ####################### -->



	</td>
  </tr>
</table>

</div>


</font>

<?
include($rootpath."include/index_bottom.php");
mysql_close();
}	//end check login
?>
