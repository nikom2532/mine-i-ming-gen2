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
								echo "<a href=\"".$rootpath."main/text/?friend=".$rs[username]."\">".$rs[name]."</a>";
							else
								echo "<a href=\"".$rootpath."main/text/\">".$rs[name]."</a>";
						}
					  ?>
						<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
						<a href="<?=$rootpath?>main/my_calendars/?fn=now">Calendars</a>
					</font>
<?php				if($success == 1){
?>						<center><font style=" color: #999900">Activity recorded.</font></center>
						<p></p>
<?php					$success="";
					}
?>
				</td>
			</tr>
			<!-- ################################### body ################################## -->
			<tr>
				<td VALIGN="top" width="100%" style="text-align: 'center'">
<?php				//sort by use the calendar : 12 Months... Jan, Feb, Mar,... 7 Days ... Sun - Sat...
					if($fn == "now" || $fn == "date"){
?>
						<table border="0" width="95%" VALIGN="top" cellpadding="0" cellspacing="0" style="text-align: left; ">
							<tr>
								<td>
<?php								$now = date('Y-m-d H:i:s');
									$sql="
									SELECT calendar_id
									FROM `social_iMing_calendar_member`
									WHERE `member` = '$_SESSION[su]'
									ORDER BY `id`";
									$result=mysql_query($sql);
									$return_rows = mysql_num_rows($result);
									if($return_rows == 0){
										echo "You have no activity.";
									}
									else{
										$header_line_today = 0;
										$header_line_tomorrow = 0;
										$header_line_thisweek = 0;
										$header_line_thismonth = 0;
										while($rs=mysql_fetch_array($result)) {
											if($fn == "now") {
												$sql2="
												SELECT * 
												FROM `social_iMing_calendar_detail` 
												WHERE `time_start` < '$now'
													AND `time_end` > '$now'
													AND `calendar_id` = '$rs[calendar_id]'";
												$result2=mysql_query($sql2);
												$return_rows2 = mysql_num_rows($result2);
												while($rs2=mysql_fetch_array($result2)) {
?>													<span class="message_link">
														<a style="display: block; " href="<?=$rootpath?>main/my_calendars/index.php?fn=read&topic=<?=$rs[calendar_id]?>" >
															<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="text-align: left; table-layout: fixed; " onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
																<col width="14%">
																<col width="38%">
																<col width="48%">
																<tr>
																	<td style="border: 1px solid #b1d0ff; ">
<?php																	if($rs2[avatar] == "") {
?>																			<img src="<?=$rootpath?>images/calendar_profile2.png" width="64" height="64">
<?php																	}
?>																	</td>
																	<td valign="top" style="border: 1px solid #b1d0ff; ">
<?php																	echo "since ".$rs2[time_start]."<br>until ".$rs2[time_end];	
?>																
																	</td>
																	<td valign="top" style="border: 1px solid #b1d0ff; ">
<?php																	echo $rs2[title];
?>																	</td>
																</tr>
															</table>
														</a>
													</span>
<?php											}
											} // ###################################### end if "now"
											elseif($fn == "date") {
												$date_today = date('Y-m-d', time()+86400);
												$date_tomorrow = date('Y-m-d', time()+(86400*2));
												$date_this_week = date('Y-m-d', time()+(86400*8));
												$date_This_month = date('Y-m-d', (strtotime("+1 months")));

/*												$sql2="
												SELECT *
												FROM `social_iMing_calendar_detail` 
												WHERE
												(
													(
														(`time_start` LIKE \"".$date_today."%\"
														)
														OR
														(
															(`time_start` <= '$date_today')
															AND
															(`time_end` >= '$date_today')
														)
													)
													AND
													(`calendar_id` = '$rs[calendar_id]'
													)
												)";
*/
												//query for today		//2011-11-29
												$sql2="
												SELECT *
												FROM `social_iMing_calendar_detail` 
												WHERE
												(
													(
														(`time_start` < '$date_today')
													)
													AND
													(`calendar_id` = '$rs[calendar_id]'
													)
												)";

												$result2=mysql_query($sql2);
												$return_rows2 = mysql_num_rows($result2);

												while($rs2=mysql_fetch_array($result2)) {
													if($header_line_today == 0){
?>
													<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: left; " bgcolor="#deedeb">
														<tr><td>
																&emsp;Schedule today
														</td></tr>
													</table>
<?php												
													} 
?>													<span class="message_link">
														<a style="display: block; " href="<?=$rootpath?>main/my_calendars/index.php?fn=read&topic=<?=$rs[calendar_id]?>" >
															<table border="0" bordercolor="#b1d0ff" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: center; table-layout: fixed; " onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f8fffe'">
																<col width="15%">
																<col width="85%">
																<tr>
																	<td align="center" style="border: 1px solid #d2dae7;">
<?php																	if($rs2[avatar] == "") {
?>																			<img src="<?=$rootpath?>images/calendar_profile2.png" width="64" height="64">
<?php																	}
?>																	</td>
																	<td valign="top" style="border: 1px solid #d2dae7;">
<?php																	echo $rs2[title];
?>																	</td>
																</tr>
															</table>
														</a>
													</span>
<?php											$header_line_today += 1;
												}
?>
<?php
/*												$sql2="
												SELECT *
												FROM `social_iMing_calendar_detail` 
												WHERE
												(
													(
														(
															`time_start` LIKE \"".$date_tomorrow."%\"
														)
														OR
														(
															(
																(`time_start` > '$date_today')
																AND
																(`time_end` < '$date_today')
															)
															AND
															(
																(`time_start` <= '$date_tomorrow')
																AND
																(`time_end` >= '$date_tomorrow')
															)
														)
													)
													AND
													(`calendar_id` = '$rs[calendar_id]')
												)
												";
*/
												//query for tomorrow
												$sql2="
												SELECT *
												FROM `social_iMing_calendar_detail` 
												WHERE
												(
													(
														(`time_start` >= '$date_today')
														AND
														(`time_start` < '$date_tomorrow')
													)
													AND
													(`calendar_id` = '$rs[calendar_id]'
													)
												)";

												$result2=mysql_query($sql2);
												$return_rows2 = mysql_num_rows($result2);
												while($rs2=mysql_fetch_array($result2)) {
													if($header_line_tomorrow == 0) {
	?>													<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: left; " bgcolor="#deedeb">
															<tr><td>
																	&emsp;Start tomorrow
															</td></tr>
														</table>
<?php												}
?>													<span class="message_link">
														<a style="display: block; " href="<?=$rootpath?>main/my_calendars/index.php?fn=read&topic=<?=$rs[calendar_id]?>" >
															<table border="0" bordercolor="#b1d0ff" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: center; table-layout: fixed;" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f8fffe'">
																<col width="15%">
																<col width="85%">
																<tr>
																	<td style="border: 1px solid #d2dae7; ">
<?php																	if($rs2[avatar] == "") {
?>																			<img src="<?=$rootpath?>images/calendar_profile2.png" width="64" height="64">
<?php																	}
?>																	</td>
																	<td valign="top" style="border: 1px solid #d2dae7; ">
<?php																	echo $rs2[title];
?>																	</td>
																</tr>
															</table>
														</a>
													</span>
<?php											$header_line_tomorrow += 1;
												}
?>
<?php
/*														(
															`time_start` LIKE \"".$date_this_week."%\"
														)
*/
/*												$sql2="
												SELECT *
												FROM `social_iMing_calendar_detail` 
												WHERE
												(
													(
														(
															(
																(`time_start` >= '$date_today')
																AND
																(`time_end` <= '$date_today')
															)
															AND
															(
																(`time_start` >= '$date_tomorrow')
																AND
																(`time_end` <= '$date_tomorrow')
															)
															AND
															(
																(`time_start` < '$date_this_week')
																AND
																(`time_end` > '$date_this_week')
															)
														)
													)
													AND
													(`calendar_id` = '$rs[calendar_id]')
												)
												";
*/
												//query for This week
												$sql2="
												SELECT *
												FROM `social_iMing_calendar_detail` 
												WHERE
												(
													(
														(`time_start` >= '$date_today')
														AND
														(`time_start` >= '$date_tomorrow')
														AND
														(`time_start` < '$date_this_week')
													)
													AND
													(`calendar_id` = '$rs[calendar_id]'
													)
												)";

												$result2=mysql_query($sql2);
												$return_rows2 = mysql_num_rows($result2);
												while($rs2=mysql_fetch_array($result2)) {
													if($header_line_thisweek == 0) {
	?>													<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: left; " bgcolor="#deedeb">
															<tr><td>
																	&emsp;Start this week soon
															</td></tr>
														</table>
<?php												}
?>													<span class="message_link">
														<a style="display: block; " href="<?=$rootpath?>main/my_calendars/index.php?fn=read&topic=<?=$rs[calendar_id]?>" >
															<table border="0" bordercolor="#b1d0ff" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: center; table-layout: fixed;" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f8fffe'">
																<col width="15%">
																<col width="85%">
																<tr>
																	<td style="border: 1px solid #d2dae7; ">
<?php																	if($rs2[avatar] == "") {
?>																			<img src="<?=$rootpath?>images/calendar_profile2.png" width="64" height="64">
<?php																	}
?>																	</td>
																	<td valign="top" style="border: 1px solid #d2dae7; ">
<?php																	echo $rs2[title];
?>																	</td>
																</tr>
															</table>
														</a>
													</span>
<?php											$header_line_thisweek += 1;
												}
?>

<?php
/*												$sql2="
												SELECT *
												FROM `social_iMing_calendar_detail` 
												WHERE
												(
													(
														(
															`time_start` LIKE \"".$date_This_month."%\"
														)
														OR
														(
															(
																(`time_start` >= '$date_today')
																AND
																(`time_end` <= '$date_today')
															)
															AND
															(
																(`time_start` >= '$date_tomorrow')
																AND
																(`time_end` <= '$date_tomorrow')
															)
															AND
															(
																(`time_start` >= '$date_this_week')
																AND
																(`time_end` <= '$date_this_week')
															)
															AND
															(
																(`time_start` < '$date_This_month')
																AND
																(`time_end` > '$date_This_month')
															)

														)
													)
													AND
													(`calendar_id` = '$rs[calendar_id]')
												)
												";
*/
												//query for This month
												$sql2="
												SELECT *
												FROM `social_iMing_calendar_detail` 
												WHERE
												(
													(
														(`time_start` >= '$date_today')
														AND
														(`time_start` >= '$date_tomorrow')
														AND
														(`time_start` >= '$date_this_week')
														AND
														(`time_start` < '$date_This_month')
													)
													AND
													(`calendar_id` = '$rs[calendar_id]'
													)
												)";

												$result2=mysql_query($sql2);
												$return_rows2 = mysql_num_rows($result2);
												while($rs2=mysql_fetch_array($result2)) {
													if($header_line_thismonth == 0) {
	?>													<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: left; " bgcolor="#deedeb">
															<tr><td>
																	&emsp;Start this month soon
															</td></tr>
														</table>
<?php												}
?>													<span class="message_link">
														<a style="display: block; " href="<?=$rootpath?>main/my_calendars/index.php?fn=read&topic=<?=$rs[calendar_id]?>" >
															<table border="0" bordercolor="#b1d0ff" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: center; table-layout: fixed;" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f8fffe'">
																<col width="15%">
																<col width="85%">
																<tr>
																	<td style="border: 1px solid #d2dae7; ">
<?php																	if($rs2[avatar] == "") {
?>																			<img src="<?=$rootpath?>images/calendar_profile2.png" width="64" height="64">
<?php																	}
?>																	</td>
																	<td valign="top" style="border: 1px solid #d2dae7; ">
<?php																	echo $rs2[title];
?>																	</td>
																</tr>
															</table>
														</a>
													</span>
<?php											$header_line_thismonth += 1;
												}
?>

<?php										} //############################### end elseif "date"

										}// end while
									}
?>
								</td>
							</tr>
						</table> 

<?php				} //end if fn== now & ...


					// #################### func birthday ######################
					elseif($fn == "birthday"){
?>
						<table border="0" width="95%" VALIGN="top" cellpadding="0" cellspacing="0" style="text-align: left; table-layout: fixed">
							<tr>
								<td width="95%">

<?php								$date_today = date('m-d');
									$date_tomorrow = date('m-d', time()+86400);
									$date_this_week = date('m-d', time()+(86400*7));
									$date_next_month = date('m-d', strtotime("+1 months"));
									//query for today
									$sql="
									SELECT  `social_iMing_customer_v3`.`username`, `social_iMing_customer_v3`.`birthday`
									FROM  `social_iMing_customer_v3` 
									INNER JOIN `social_iMing_friends`
									ON `social_iMing_customer_v3`.`username` = `social_iMing_friends`.`fnd`
									WHERE  (
										(`social_iMing_friends`.`username` =  '$_SESSION[su]')
										AND
										(`social_iMing_customer_v3`.`birthday` LIKE '%".$date_today."%')
									)
									";
									$result=mysql_query($sql);
									$return_rows = mysql_num_rows($result);
									$header_line = 0;
									$row = 0;
									while($rs=mysql_fetch_array($result)) {
										if($header_line == 0) {
?>											<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: left; " bgcolor="#deedeb">
												<tr><td>
														&emsp;Schedule today
												</td></tr>
											</table>
<?php										$header_line = 1;
										}
?>										<span class="calendar_link">

	<?php								if($row == 0){
	?>										<table border="0"  VALIGN="top" cellpadding="1" cellspacing="1" style="text-align: center; table-layout: fixed; ">
											<col width="60">
											<col width="60">
											<col width="60">
											<col width="60">

	<?php								}
									
										if($row % 4 == 0) {
	?>										<tr>
											
											<td style="text-align: center; table-layout: fixed; ">
	<?php								}
										else{
	?>										
											<td style="text-align: center; table-layout: fixed; ">
	<?php								}
	?>

										<a href="<?=$rootpath?>main/text/?friend=<?=$rs[username]?>" style="display:block; ">
											<table border="0" bordercolor="#b1d0ff" VALIGN="top" cellpadding="1" cellspacing="1" style="text-align: center;  ">



<?php //<onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'"> ?>

												<tr >
													<td valign="top" style="text-align: center; table-layout: fixed; width: 60;">
<?php													$url = "";
														$sql2 = "SELECT url FROM social_iMing_images WHERE username='$rs[username]' AND image_album = 'Profile Pictures'";
														$result2 = mysql_query($sql2);
														$return_rows2 = mysql_num_rows($result2);
														while($rs2=mysql_fetch_array($result2))
														{
															$url = $rs2[url];
														}
														if($url != ""){							/*  $_SERVER['PHP_SELF']  */
															echo "<img width='60' height='60' src=\"".$rootpath."images/profile_picture/".$url."\">";
														}
														else{
															echo "<img width='60' height='60' src=\"".$rootpath."images/profile3.png\">";
														}
?>													</td>
												</tr>
												<tr>
													<td valign="top" style="text-align: center; table-layout: fixed; width: 60;">
														<?=$rs[username];?>
													</td>
												</tr>
											</table>
										</a>

<?php									if($row % 4 == 3) {
?>											</td></tr>
<?php									}
										else{
?>											</td>
<?php									}
?>
	<?php								if($row == $return_rows-1){
	?>										</table>
	<?php								}
?>										</span>
<?php								$row++;
									}
?>									
<?php								//query for tomorrow
									$sql="
									SELECT  `social_iMing_customer_v3`.`username`, `social_iMing_customer_v3`.`birthday`
									FROM  `social_iMing_customer_v3` 
									INNER JOIN `social_iMing_friends`
									ON `social_iMing_customer_v3`.`username` = `social_iMing_friends`.`fnd`
									WHERE  (
										(`social_iMing_friends`.`username` =  '$_SESSION[su]')
										AND
										(`social_iMing_customer_v3`.`birthday` LIKE '%".$date_tomorrow."%')
									) ";
									$result=mysql_query($sql);
									$return_rows = mysql_num_rows($result);
									$header_line = 0;
									$row = 0;
									while($rs=mysql_fetch_array($result)) {
										if($header_line == 0) {
?>											<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: left; " bgcolor="#deedeb">
												<tr><td>
														&emsp;Start tomorrow
												</td></tr>
											</table>
<?php										$header_line = 1;
										}
?>										<span class="calendar_link">

	<?php								if($row == 0){
	?>										<table border="0"  VALIGN="top" cellpadding="1" cellspacing="1" style="text-align: center; table-layout: fixed; ">
											<col width="60">
											<col width="60">
											<col width="60">
											<col width="60">

	<?php								}
									
										if($row % 4 == 0) {
	?>										<tr>
											
											<td style="text-align: center; table-layout: fixed; ">
	<?php								}
										else{
	?>										
											<td style="text-align: center; table-layout: fixed; ">
	<?php								}
	?>

										<a href="<?=$rootpath?>main/text/?friend=<?=$rs[username]?>" style="display:block; ">
											<table border="0" bordercolor="#b1d0ff" VALIGN="top" cellpadding="1" cellspacing="1" style="text-align: center;  ">



<?php //<onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'"> ?>

												<tr >
													<td valign="top" style="text-align: center; table-layout: fixed; width: 60;">
<?php													$url = "";
														$sql2 = "SELECT url FROM social_iMing_images WHERE username='$rs[username]' AND image_album = 'Profile Pictures'";
														$result2 = mysql_query($sql2);
														$return_rows2 = mysql_num_rows($result2);
														while($rs2=mysql_fetch_array($result2))
														{
															$url = $rs2[url];
														}
														if($url != ""){							/*  $_SERVER['PHP_SELF']  */
															echo "<img width='60' height='60' src=\"".$rootpath."images/profile_picture/".$url."\">";
														}
														else{
															echo "<img width='60' height='60' src=\"".$rootpath."images/profile3.png\">";
														}
?>													</td>
												</tr>
												<tr>
													<td valign="top" style="text-align: center; table-layout: fixed; width: 60;">
														<?=$rs[username];?>
													</td>
												</tr>
											</table>
										</a>

<?php									if($row % 4 == 3) {
?>											</td></tr>
<?php									}
										else{
?>											</td>
<?php									}
?>
	<?php								if($row == $return_rows-1){
	?>										</table>
	<?php								}
?>										</span>
<?php								$row++;
									}
?>
<?php								//query for this week
									$sql="
										SELECT  `social_iMing_customer_v3`.`username`, `social_iMing_customer_v3`.`birthday`
										FROM  `social_iMing_customer_v3` 
										INNER JOIN `social_iMing_friends`
										ON `social_iMing_customer_v3`.`username` = `social_iMing_friends`.`fnd`
										WHERE
										(
											(`social_iMing_friends`.`username` =  '$_SESSION[su]')
											AND
											(
												(`social_iMing_customer_v3`.`birthday` LIKE '%".date('m-d', time()+(86400*2))."%')";
									$i=0;
									for($i=3; $i<=7; $i++){
										$sql=$sql.
										"		OR
												(`social_iMing_customer_v3`.`birthday` LIKE '%".date('m-d', time()+(86400*$i))."%')";
									}
									$sql=$sql."))";

									$result=mysql_query($sql);
									$return_rows = mysql_num_rows($result);
									$header_line = 0;
									$row = 0;
									while($rs=mysql_fetch_array($result)) {
										if($header_line == 0) {
?>											<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: left; " bgcolor="#deedeb">
												<tr><td>
														&emsp;Start this week soon
												</td></tr>
											</table>
<?php										$header_line = 1;
										}
?>										<span class="calendar_link">

	<?php								if($row == 0){
	?>										<table border="0"  VALIGN="top" cellpadding="1" cellspacing="1" style="text-align: center; table-layout: fixed; ">
											<col width="60">
											<col width="60">
											<col width="60">
											<col width="60">

	<?php								}
									
										if($row % 4 == 0) {
	?>										<tr>
											
											<td style="text-align: center; table-layout: fixed; ">
	<?php								}
										else{
	?>										
											<td style="text-align: center; table-layout: fixed; ">
	<?php								}
	?>

										<a href="<?=$rootpath?>main/text/?friend=<?=$rs[username]?>" style="display:block; ">
											<table border="0" bordercolor="#b1d0ff" VALIGN="top" cellpadding="1" cellspacing="1" style="text-align: center;  ">



<?php //<onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'"> ?>

												<tr >
													<td valign="top" style="text-align: center; table-layout: fixed; width: 60;">
<?php													$url = "";
														$sql2 = "SELECT url FROM social_iMing_images WHERE username='$rs[username]' AND image_album = 'Profile Pictures'";
														$result2 = mysql_query($sql2);
														$return_rows2 = mysql_num_rows($result2);
														while($rs2=mysql_fetch_array($result2))
														{
															$url = $rs2[url];
														}
														if($url != ""){							/*  $_SERVER['PHP_SELF']  */
															echo "<img width='60' height='60' src=\"".$rootpath."images/profile_picture/".$url."\">";
														}
														else{
															echo "<img width='60' height='60' src=\"".$rootpath."images/profile3.png\">";
														}
?>													</td>
												</tr>
												<tr>
													<td valign="top" style="text-align: center; table-layout: fixed; width: 60;">
														<?=$rs[username];?>
													</td>
												</tr>
											</table>
										</a>

<?php									if($row % 4 == 3) {
?>											</td></tr>
<?php									}
										else{
?>											</td>
<?php									}
?>
	<?php								if($row == $return_rows-1){
	?>										</table>
	<?php								}
?>										</span>
<?php								$row++;
									}
?>

<?php								//query for this month
									$sql="
										SELECT  `social_iMing_customer_v3`.`username`, `social_iMing_customer_v3`.`birthday`
										FROM  `social_iMing_customer_v3` 
										INNER JOIN `social_iMing_friends`
										ON `social_iMing_customer_v3`.`username` = `social_iMing_friends`.`fnd`
										WHERE
										(
											(`social_iMing_friends`.`username` =  '$_SESSION[su]')
											AND
											(
												(`social_iMing_customer_v3`.`birthday` LIKE '%".date('m-d', time()+(86400*8))."%')";
									$i=0;
									for($i=9; $i<=31; $i++){
										if(date('m', time()+(86400*$i)) < (date('m')+1) )
										{
											$sql=$sql.
											"		OR
											(`social_iMing_customer_v3`.`birthday` LIKE '%".date('m-d', time()+(86400*$i))."%')";
										}
									}
									$sql=$sql."))";
									$result=mysql_query($sql);
									$return_rows = mysql_num_rows($result);
									$header_line = 0;
									$row = 0;
									while($rs=mysql_fetch_array($result)) {
										if($header_line == 0) {
?>											<table border="0" width="100%" VALIGN="top" cellpadding="0" cellspacing="0" style="align: left; " bgcolor="#deedeb">
												<tr><td>
														&emsp;Start this month soon
												</td></tr>
											</table>
<?php										$header_line = 1;
										}
?>										<span class="calendar_link">

	<?php								if($row == 0){
	?>										<table border="0"  VALIGN="top" cellpadding="1" cellspacing="1" style="text-align: center; table-layout: fixed; ">
											<col width="60">
											<col width="60">
											<col width="60">
											<col width="60">
	<?php								}
									
										if($row % 4 == 0) {
	?>										<tr>
											
											<td style="text-align: center; table-layout: fixed; ">
	<?php								}
										else{
	?>										
											<td style="text-align: center; table-layout: fixed; ">
	<?php								}
	?>
										<a href="<?=$rootpath?>main/text/?friend=<?=$rs[username]?>" style="display:block; ">
											<table border="0" bordercolor="#b1d0ff" VALIGN="top" cellpadding="1" cellspacing="1" style="text-align: center;  ">



<?php //<onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">?>

												<tr >
													<td valign="top" style="text-align: center; table-layout: fixed; width: 60;">
<?php													$url = "";
														$sql2 = "SELECT url FROM social_iMing_images WHERE username='$rs[username]' AND image_album = 'Profile Pictures'";
														$result2 = mysql_query($sql2);
														$return_rows2 = mysql_num_rows($result2);
														while($rs2=mysql_fetch_array($result2))
														{
															$url = $rs2[url];
														}
														if($url != ""){							/*  $_SERVER['PHP_SELF']  */
															echo "<img width='60' height='60' src=\"".$rootpath."images/profile_picture/".$url."\">";
														}
														else{
															echo "<img width='60' height='60' src=\"".$rootpath."images/profile3.png\">";
														}
?>													</td>
												</tr>
												<tr>
													<td valign="top" style="text-align: center; table-layout: fixed; width: 60;">
														<?=$rs[username];?>
													</td>
												</tr>
											</table>
										</a>

<?php									if($row % 4 == 3) {
?>											</td></tr>
<?php									}
										else{
?>											</td>
<?php									}
?>
	<?php								if($row == $return_rows-1){
	?>										</table>
	<?php								}
?>										</span>
<?php								$row++;
									}
?>
								</td>
							</tr>
						</table> 
<?php				}

					// ################# read ##################
					if($fn == "read"){
						$calendar_id = $_GET["topic"];
						$sql = "
							SELECT * 
							FROM `social_iMing_calendar_detail` 
							WHERE `calendar_id` = '$calendar_id' ";
						$result=mysql_query($sql);
						$return_rows = mysql_num_rows($result);
						while($rs=mysql_fetch_array($result)) {
?>							<table border="0" width="95%" VALIGN="top" cellpadding="0" cellspacing="0" style="text-align: left; table-layout: fixed;">
								<col width="30%">
								<col width="65%">
								<tr>
									<td colspan="2">
										<center><font size="5">
<?php									if($rs[title] != "")
											echo $rs[title];
										else echo " ? ";
?>										</font></center>
									</td>
								</tr>
								<tr>
									<td width="30%">
<?php			 						if($rs[avatar] == ""){
?>											<img width="150" height="150" src="<?=$rootpath?>images/calendar_profile2.png">
<?php									}
												
?>									</td>
									<td width="65%">
										<table border="0" valign="top" width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td width="10%" valign="top" style="text-align: top; " > <!--when-->
													<img src="<?=$rootpath?>images/calendar.png" alt="when">
												</td>
												<td width="90%" valign="top">
													start from
<?php												if($rs[time_start] != "")
														echo $rs[time_start];
													else echo " ? ";
													echo "<br>until ";
													if($rs[time_end] != "")
														echo $rs[time_end];
													else echo " ? ";
?>
												</td>
											</tr>
											<tr>
												<td width="100%" valign="center" colspan="2" >
													<img src="<?=$rootpath?>images/HR_line_bold200.png" width="300" height="10" alt="when">
												</td>
											</tr>
											<tr>
												<td width="5%" valign="top"> <!--where-->
													<img src="<?=$rootpath?>images/calendar_where2.png" width="16" height="16" alt="where">
												</td>
												<td width="95%" valign="top">
<?php											if($rs[address] != "")
													echo $rs[address];
												else echo " ? ";
?>												</td>
											</tr>
											<tr>
												<td width="100%" valign="center" colspan="2" >
													<img src="<?=$rootpath?>images/HR_line_bold200.png" width="300" height="10" alt="when">
												</td>
											</tr>
											<tr>
												<td width="5%" valign="top"> <!--Description-->
													<img src="<?=$rootpath?>images/calendar_Detail2.png" width="16" height="16" alt="Detail">
												</td>
												<td width="95%" valign="top">
<?php												if($rs[address] != ""){
														for($ii=0;$ii<strlen($rs[detail]);$ii=$ii+44) {
															echo substr($rs[detail],$ii,44)."\n";
														}
													}
													else echo " ? ";
?>												</td>
											</tr>
										</table> 
									</td>
								</tr>
							</table> 
<?php 					}
						//continue to put comment box here
?>						<form action="./comment_proc.php?fn=date" method="POST" id="comment_form" onsubmit="return validateForm()">
							<table border="0" width="95%" VALIGN="top" cellpadding="0" cellspacing="0" style="text-align: center; table-layout: fixed;">
								<tr>
									<td valign="top" style="text-align: top; " >
										<textarea type="text" name="comment_text" id="comment_text" style="border: 1px solid #d2dae7; resize: none;  " placeholder="tell the detail schedule here"></textarea>	<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
										<input type="submit" value="tell us">
										<input type="hidden" name="calendar_id" id="calendar_id" value="<?=$calendar_id?>">
									</td>
								</tr>
							</table>
						</form>
						<?php //Check validate comment_form ?>
						<script type="text/javascript">
						function validateForm()
						{
						var receive=document.forms["comment_form"]["comment_text"].value;
						if (receive==null || receive=="")
						  {
						  return false;
						  }
						var receive=document.forms["comment_form"]["calendar_id"].value;
						if (receive==null || receive=="")
						  {
						  return false;
						  }
						}
						</script>
<?php				//show comment
?>
										<?php
						  $SQL_comment="
							select * from `social_iMing_comment_calendar`
							where `calendar_id` = '$calendar_id' ORDER BY `post_time` DESC";
						  $result_comm = mysql_query($SQL_comment);
						  $return_rows_comment = mysql_num_rows($result_comm);
						  $return_rows_thattime = 0;
						  while($rs_comm = mysql_fetch_array($result_comm))
						  {
					  ?>	
							<table border="0" align="left" style="text-align: center" VALIGN="top" width="500" cellpadding="1" cellspacing="0">
<?php
							if($return_rows_thattime % 2 == 1)
							{
?>
								<tr class="table_comment" >
					<?php	}else{	?>	
								<tr >
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
											echo "<a href=\"main/text/?friend=".$rs_comm[username_from]."\">".
												 "<img width='50' height='50' src=\"".$rootpath."images/profile_picture/"
												 .$url."\"></a>";
										}
										else{
											echo "<a href=\"main/text/?friend=".$rs_comm[username_from]."\">".
												 "<img width='50' height='50' src=\"".$rootpath."images/profile3.png\">"
												 ."</a>";
										}
									?>
								  </td>
								  <td VALIGN="top" style="text-align: left; width: 400">
									  <table border="0" align="center" VALIGN="top" width="100%" cellpadding="2" cellspacing="2">
										<tr style="text-align: center"> 
										  <td VALIGN="top" style="text-align: left" width="80">
											<a href="<?php echo $rootpath; ?>main/text/?friend=<?php echo $rs_comm[username_from]; ?>">	<?php echo $rs_comm[username_from]; ?>	</a>
										  </td>
										  <td VALIGN="top" style="text-align: left" width="300">
											<?php echo $rs_comm[post_time]; ?>
								  		  </td>
										  <td VALIGN="top" style="text-align: left" width="20">

											<!-- ############ delete func ############ -->

											<a href="#" onclick="calendar_comment_delete_fn('<?=$rootpath?>','<?=$rs_comm[comment_id]?>','<?=$calendar_id?>')">
												<img src="<?=$rootpath?>images/disagree2.png" width="16" height="16" onmouseover="this.src='<?=$rootpath?>images/disagree.gif';this.alt='On alternate text';" onmouseout="this.src='<?=$rootpath?>images/disagree2.png';this.alt='Off alternate text';">
											</a>

<?php /*		show delete button

											<a href="<?=$rootpath?>comment_delete.php?fn=del&value=<?=$rs_comm[comment_id]?>">
											  <img src="<?=$rootpath?>images/disagree.gif" width="16" height="16">
											</a>
*/ ?>
								  		  </td>
										</tr>
										<tr style="text-align: center">
										  <td VALIGN="top" style="text-align: left" width="400" colspan="3">
											<?php
												//	we use strlen(~str~) to count string, substr(~str~ , start from, number) to cut the string
												for($ii=0;$ii<strlen($rs_comm[comment_text]);$ii=$ii+65)
												{
													echo substr($rs_comm[comment_text],$ii,65)."<br>";
												}
											?>
										  </td>
										</tr>
									  </table>
								  </td>
								</tr>
							</table>
							<!-- ################  show delete? event  ################ -->
							<span class="show_on_center_css" id="comment_delete_id"></span>
					  <?php
						  }//end show comment
					  ?>
<?php				
					}//end fn = read
?>				</td>
			</tr>
		</table>

	</td>


	<td align="center" VALIGN="top" width="25%"> 
	<!-- ########################## right sheet ####################### -->
		<a href="<?=$rootpath?>main/my_calendars/create.php?fn=create">Create a new activity</a>
	</td>
