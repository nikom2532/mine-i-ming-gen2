<?

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
	$menu1 = "tagging";

	include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{
?>

<font size="3" color="#000000">
<br>

<div class="bodytext">

<!--####################### main ####################-->

<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr>

	<!-- ######################### Left slide 1. Profile picture ######################## -->
	<td align="center" VALIGN="top" width="20%"> 
		<?php
			if($friend != ""){
				$own_body = $friend;
			}
			else $own_body = $_SESSION[su]; //echo $own_body;
			include($rootpath."include/body_Left_slide.php");
		?>
	</td>

	<!-- ########################## title sheet ####################### -->
	<td align="left" VALIGN="top" width="55%">
		<font size="5" color="#000000">
		  <?php
			$SQL="SELECT * FROM social_iMing_customer_v3 where username='$own_body'";
			$result=mysql_query($SQL);
			while($rs=mysql_fetch_array($result)) {
				if($friend != "")
					echo "<a href=\"".$rootpath."main/text/?friend=".$rs[username]."\">".$rs[name]."</a>";
				else
					echo "<a href=\"".$rootpath."main/text/\">".$rs[name]."</a>";
			}
		  ?>
			<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
			Clock Tagging
		  <p></p>
		</font>

		<!-- ########################## middle sheet ####################### -->
		<table border="0" width="100%" align="left" VALIGN="top" cellpadding="0" cellspacing="0">
			<tr>
<?php		$SQL_friend="
			select 
				social_iMing_customer_v3.username, social_iMing_friends.fnd 
			from
				social_iMing_friends, social_iMing_customer_v3 
			where 
				social_iMing_friends.username = \"$own_body\"
			AND 
				social_iMing_friends.username = social_iMing_customer_v3.username";
			$result = mysql_query($SQL_friend);
			$initial_photo1 = 1;
			while($rs=mysql_fetch_array($result)) {
				$url2="";
				$sql2="select url from social_iMing_images where username='$rs[fnd]' AND image_album = 'Profile Pictures'";
				$result2 = mysql_query($sql2);
				$return_rows2 = mysql_num_rows($result2);
				while($rs2=mysql_fetch_array($result2))
				{
					$url2 = $rs2[url];
				}
				if($initial_photo1 == 4) {
					echo "<tr>";
				}	?>
					<td align="center" VALIGN="top" >
						<table border="0" width="100%" align="left" VALIGN="top" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center">
<?php								if($url2 != ""){
										echo "<a href='".$rootpath."./main/text/?friend=".$rs[fnd]."'>"."<img width='100' height='100' src=\"".$rootpath."images/profile_picture/".$url2."\">";
									}
									else{
										echo "<a href='".$rootpath."./main/text/?friend=".$rs[fnd]."'>"."<img width='100' height='100' src=\"".$rootpath."images/profile3.png\">";
									}
?>								
								</td>
							</tr>
							<tr>
								<td align="center">
				<?php				echo "<a href='".$rootpath."./main/text/?friend=".$rs[fnd]."'>".$rs[fnd]."</a><br><br>";?>
								</td>
							</tr>
						</table>
					</td>
<?php			if($initial_photo1 == 3) {
					echo "</tr>";
					$initial_photo1 = 1;
				}
				
				$initial_photo1++;
			} ?>
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
