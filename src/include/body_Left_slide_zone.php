
<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr style="text-align: left; width: 100%;">
    <td align="center" width="99%" VALIGN="top" style="text-align: left; " width="100%">

		<center>
		<table border="0" width="80%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
		  <tr style="text-align: left; width: 100%;">
			<td align="center" width="30%" VALIGN="middle" style="text-align: left; " width="100%">
				<a href="<?=$rootpath?>main/text/">
<?php
				// file name Body_Left_Slide.php
				//show profile photo
				$url = "";
				$sql = "
				SELECT `social_iMing_images`.`url`
				FROM `social_iMing_images`
				INNER JOIN `social_iMing_customer_info`
				ON 
					`social_iMing_images`.`username` = `social_iMing_customer_info`.`username`
					AND
					`social_iMing_customer_info`.`profile_picture_id` = `social_iMing_images`.`id`
				WHERE `social_iMing_images`.`username`='$own_body' 
				AND `social_iMing_images`.`image_album` = 'Profile Pictures'
				";
				$result = mysql_query($sql);
				$return_rows = mysql_num_rows($result);
				while($rs=mysql_fetch_array($result))
				{
					$url = $rs[url];
				}
				if($url != ""){
					echo "<img width='45' height='45' src=\"".$rootpath."images/profile_picture/".$url."\">";
				}
				else{
					echo "<img width='45' height='45' src=\"".$rootpath."images/profile3.png\">";
				}
?>
				</a>
			</td>
			<td align="center" width="10%" VALIGN="middle" style="text-align: left; " width="100%">
				
			</td>
			<td align="center" width="60%" VALIGN="middle" style="text-align: left; " width="100%">
				<a href="<?=$rootpath?>main/text/"><?=$own_body?></a>
			</td>
		  </tr>
		</table>
		<br />


		<img src="<?=$rootpath?>images/HR_line200.png">
		</center>
		<br />


	  <!-- ##################### left Menu #####################-->
		<table border="0" width="90%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
	      <tr style="text-align: left; width: 100%;">
	        <td align="center" VALIGN="top" style="text-align: left; " width="100%">
				<table border="0" width="100%" align="left" VALIGN="top" cellpadding="0" cellspacing="0">

<?php
			//		if($own_body == $_SESSION[su]){
?>

						<tr>
	<?php					if($menu1=="found"){
	?>							<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="100%">
	<?php					}
							else{
	?>							<td align="center" VALIGN="top" style="text-align: left; " width="100%" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
	<?php					}
	?>							
								<span class="menulink">
									<a href="<?=$rootpath?>main/Top_found/index.php?fn=index" style="display:block;">&emsp;<img src="<?=$rootpath?>images/Top_search_16x16.png" width="16"> Top Found</a>
								</span>
							</td>
						</tr>

						<tr>
	<?php					if($menu1=="zone"){
	?>							<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="100%">
	<?php					}
							else{
	?>							<td align="center" VALIGN="top" style="text-align: left; " width="100%" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
	<?php					}
	?>							
								<span class="menulink">
									<a href="<?=$rootpath?>main/new_zone.php" style="display:block;">&emsp;<img src="<?=$rootpath?>images/my_zone.png"> My zone</a>
								</span>
							</td>
						</tr>

						<tr>
	<?php					if($menu1=="message"){
	?>							<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="100%">
	<?php					}
							else{
	?>							<td align="center" VALIGN="top" style="text-align: left; " width="100%" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
<?php						}

							//find how many unread messages
							$count=0;
							$SQL="
							SELECT * 
							FROM social_iMing_message_box
							where	
								(username_receive = \"$_SESSION[su]\" OR username_send = \"$_SESSION[su]\")
							ORDER BY 'send_time' DESC";
							$result=mysql_query($SQL);
							while($rs=mysql_fetch_array($result)) {
								if($rs[unread] == 'y' && $rs[username_receive] == $_SESSION[su])
									$count++;
							}
?>								<span class="menulink">
									<a href="<?=$rootpath?>main/my_messages/index.php?fn=inbox" style="display:block;">&emsp;<img src="<?=$rootpath?>images/message_unread.png" width="16" height="16"> My messages (<?=$count?>)</a>
									<?php $count=""; ?>
								</span>
							</td>
						</tr>

						<tr>
	<?php					if($menu1=="calendars"){
	?>							<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="100%">
	<?php					}
							else{
	?>							<td align="center" VALIGN="top" style="text-align: left; " width="100%" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
	<?php					}
	?>							<span class="menulink">
									<a href="<?=$rootpath?>main/my_calendars/index.php?fn=date" style="display:block;">&emsp;<img src="<?=$rootpath?>images/calendar.png"> My calendars</a>
								</span>
							</td>
						</tr>

<?php					if($menu1 == "calendars") {
?>						<tr>
							<td width="100%">
								<table width="100%" border="0" cellpadding="1" cellspacing="1">
									<tr>
										<td width="10%">
										</td>
				<?php					if($menu1=="calendars" && $fn=="now"){
				?>							
											<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="90%">
				<?php					}
										else{
				?>							
											<td align="center" VALIGN="top" style="text-align: left; " width="90%"
			onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
				<?php					}
			?>
											<span class="menulink">
												<a href="<?=$rootpath?>main/my_calendars/index.php?fn=now" style="display:block;">&emsp;<img src="<?=$rootpath?>images/calendar.png"> Happen This time</a>
											</span>
										</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td width="100%">
								<table width="100%" border="0" cellpadding="1" cellspacing="1">
									<tr>
										<td width="10%">
										</td>
				<?php					if($menu1=="calendars" && $fn=="date"){
				?>							
											<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="90%">
				<?php					}
										else{
				?>							
											<td align="center" VALIGN="top" style="text-align: left; " width="90%" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
				<?php					}
			?>
											<span class="menulink">
												<a href="<?=$rootpath?>main/my_calendars/index.php?fn=date" style="display:block;">&emsp;<img src="<?=$rootpath?>images/calendar.png"> Activity</a>
											</span>
										</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td width="100%">
								<table width="100%" border="0" cellpadding="1" cellspacing="1">
									<tr>
										<td width="10%">
										</td>
				<?php					if($menu1=="calendars" && $fn=="birthday"){
				?>							
											<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="90%">
				<?php					}
										else{
				?>							
											<td align="center" VALIGN="top" style="text-align: left; " width="90%" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
				<?php					}
			?>
											<span class="menulink">
												<a href="<?=$rootpath?>main/my_calendars/index.php?fn=birthday" style="display:block;">&emsp;<img src="<?=$rootpath?>images/calendar.png"> Birthday</a>
											</span>
										</td>
									</tr>
								</table>
							</td>
						</tr>

<?php					}
?>
<?php /*	show
						<tr>
	<?php					if($menu1=="groups"){
	?>							<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="100%">
	<?php					}
							else{
	?>							<td align="center" VALIGN="top" style="text-align: left; " width="100%" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
	<?php					}
	?>							<span class="menulink">
									<a href="<?=$rootpath?>main/my_groups.php" style="display:block;">&emsp;<img src="<?=$rootpath?>images/comment_many_blue.png"> My tag catalogs</a>
								</span>
							</td>
						</tr>
*/
?>
						<tr>
							<td>
								<center><p><img src="<?=$rootpath?>images/HR_line200.png"></p></center>




							</td>
						</tr>

						<tr>
							<td>


							</td>
						</tr>
<?php		//		}//end [su]
?>
				</table>
			</td>
		  </tr>
		</table>
	  <!-- ##################### end left Menu #####################-->
	</td>
    <!--td align="center" width="1%" VALIGN="top" style="text-align: left; " width="100%">
		<img src="<?=$rootpath?>images/HL_line.png">
	</td-->
  </tr>
</table>

