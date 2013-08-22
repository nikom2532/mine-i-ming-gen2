<?

$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=0;

	//---- initial GET
	$fn = $_GET["fn"];
	$subscriber = $_GET["subscriber"];

	//#### initial values
	$menu1 = "calendars";

	include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{
?>

<font size="3" color="#000000">
<br>

<div class="bodytext">

<!--####################### main ####################-->

<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: center; table-layout: fixed;">
  <col width="20%">
  <col width="55%">
  <col width="25%">
  <tr>

	<!-- ######################### Left slide 1. Profile picture ######################## -->
	<td align="center" VALIGN="top" width="20%"> 
		<?php
			if($friend != ""){
				$own_body = $friend;
			}
			else $own_body = $_SESSION[su];
			include($rootpath."include/body_Left_slide_zone.php");

			include($rootpath."main/my_calendars/calendar.php");
		?>
	</td>

	<!-- ########################## middle sheet ####################### -->
	<td align="left" VALIGN="top" width="55%">
		<table width="100%">
			<!-- ################################### title ################################## -->
			<tr>
				<td VALIGN="top" width="100%">
					<font size="5" color="#000000">
					  <?php
						$SQL="SELECT * FROM social_iMing_customer_v3 where username='$own_body'";
						$result=mysql_query($SQL);
						while($rs=mysql_fetch_array($result)) {
							if($friend != "")
								echo "<a href=\"".$rootpath."comment.php?friend=".$rs[username]."\">".$rs[name]."</a>";
							else
								echo "<a href=\"".$rootpath."comment.php\">".$rs[name]."</a>";
						}
					  ?>
						<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
						<a href="<?=$rootpath?>main/my_calendars/">Calendar</a>
					<?php
						if($fn == "create"){
					?>		<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
							<a href="<?=$rootpath?>main/my_calendars/create.php?fn=create">Create a new activity</a>
					<?php
						}
					?>
					</font>
				</td>
			</tr>
			<!-- ################################### body ################################## -->
			<tr>
				<td VALIGN="top" width="100%">
<?php				//Create Calendar activity
					if($fn == "create"){
?>						<form action="<?=$rootpath?>main/my_calendars/create_proc.php?fn=create" method="POST">
							<table width="100%" style="table-layout: fixed; width= '100%'">
								<col width="100%">
								<tr>
									<td width="100%">
										topic: <br><input type="text" class="calendar_create_1" size="68" name="title" placeholder="topic here">
									</td>
								</tr>
								<tr>
									<td width="100%">
										<table border="0" style="table-layout: fixed; text-align: center; width: 100%;">
											<col width="10%">
											<col width="30%">
											<col width="60%">
											<tr>
												<td style="text-align: left; ">
													since:
												</td>
												<td style="text-align: left; ">
													Date <input type="date" name="date1" size="9" value="<? echo date('Y-m-d')?>">
												</td>
												<td style="text-align: left; ">
													hh:mm <input type="time" name="time1">
												</td>
											</tr>
											<tr>
												<td style="text-align: left;">
													until:
												</td>
												<td style="text-align: left; ">
													Date <input type="date" name="date2" size="9" value="<? echo date('Y-m-d')?>">
												</td>
												<td style="text-align: left; ">
													hh:mm <input type="time" name="time2">
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										where: <br><input type="text" class="calendar_create_1" size="68" name="address" placeholder="place here">
									</td>
								</tr>
								<tr>
									<td>
										Descrpitions: <br><textarea type="text" name="detail" placeholder="description here" style="border: 1px solid #d2dae7; resize: none;"></textarea>
										<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" size="60" value="Create">
									</td>
								</tr>
							</table>
						</form>
<?php				}

?>
				</td>
			</tr>
		</table>

	</td>


	<td align="center" VALIGN="top" width="25%"> 
	<!-- ########################## right sheet ####################### -->
		<a href="<?=$rootpath?>main/my_calendars/create.php?fn=create">Create a new activity</a>


	</td>
  </tr>
</table>


</div>

</font>

<?php
include($rootpath."include/index_bottom.php");
mysql_close();
}	//end check login
?>
