				<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
				  <tr style="text-align: left; width: 100%;">
					<td align="center" width="1%" VALIGN="top" style="text-align: left; " width="100%">
						<img src="<?=$rootpath?>images/HL_line1000.png">
					</td>
					<td align="center" width="99%" VALIGN="top" style="text-align: left; " width="100%">

						<font size="2" color="#000000">
							<!--####################### show comment ######################-->
							  <?php
		//						  $SQL_comment="select social_iMing_comment.username_from, social_iMing_comment.comment_text from social_iMing_comment, from social_iMing_friends where social_iMing_friends.username = '$own_body', social_iMing_comment.username_from = social_iMing_friends.fnd ORDER BY `post_time` DESC";

		//						  $SQL_comment="select * from social_iMing_comment where ORDER BY `post_time` DESC";
		//						  $SQL_comment="select * from social_iMing_friends where username_from = '$own_body' ORDER BY `post_time` DESC";

								$SQL="select social_iMing_customer_v3.username, social_iMing_friends.fnd from social_iMing_friends, social_iMing_customer_v3 where social_iMing_friends.username='$own_body' AND social_iMing_friends.username = social_iMing_customer_v3.username";
								$result = mysql_query($SQL);
								while($rs=mysql_fetch_array($result))
								{
								  $SQL_friend = "select * from social_iMing_comment where username = $rs[fnd] ORDER BY `post_time` DESC";
								  $result_comm = mysql_query($SQL_comment);
								  while($rs_comm=mysql_fetch_array($result_comm))
								  {
									//show comment near our subscribers
							  ?>
									<table border="0" align="left" VALIGN="top" width="100%">
										<tr style="text-align: center">
										  <td VALIGN="top" style="text-align: left; width: 32" cellpadding="2" cellspacing="2">
											<?php
												//show photo profile
												$url = "";
												$sql = "SELECT url FROM social_iMing_images WHERE username='$rs_comm[username_from]' AND image_album = 'Profile Pictures'";
												$result = mysql_query($sql);
												$return_rows = mysql_num_rows($result);
												while($rs=mysql_fetch_array($result))
												{
													$url = $rs[url];
												}
												if($url != ""){							/*  $_SERVER['PHP_SELF']  */
													echo "<a href=\"comment2.php?friend=".$rs_comm[username_from]."\">".
														 "<img width='32' height='32' src=\"".$rootpath."images/profile_picture/"
														 .$url."\"></a>";
												}
												else{
													echo "<a href=\"comment2.php?friend=".$rs_comm[username_from]."\">".
														 "<img width='32' height='32' src=\"".$rootpath."images/profile3.png\">"
														 ."</a>";
												}
											?>
										  </td>
										  <td VALIGN="top" style="text-align: left; width: 250">
											  <table border="0" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
												<tr style="text-align: center"> 
												  <!-- show account -->
												  <td VALIGN="top" style="text-align: left" width="10%">
													<a href="<?php echo $rootpath; ?>comment2.php?friend=<?php echo $rs_comm[username_from]; ?>">	<?php echo $rs_comm[username_from]; ?>	</a>
												  </td>
												  <td VALIGN="top" style="text-align: left" width="5%">
													<img src="<?=$rootpath?>images/arr3.png" width="10" height="10">
												  </td>
												  <!-- show account from -->
												  <td VALIGN="top" style="text-align: left" width="10%">
													<a href="<?php echo $rootpath; ?>comment2.php?friend=<?php echo $rs_comm[username]; ?>">	<?php echo $rs_comm[username]; ?>	</a>
												  </td>
												  <!-- show time -->
												  <td VALIGN="top" style="text-align: left" width="75%">
													<?php echo $rs_comm[post_time]; ?>
										  		  </td>
												</tr>
												<tr style="text-align: center">
												  <td VALIGN="top" style="text-align: left" colspan="4" width="250">
													<?php
														//	we use strlen(~str~) to count string, substr(~str~ , start from, number) to cut the string
														// show comment posted
														for($ii=0;$ii<strlen($rs_comm[comment_text]);$ii=$ii+30)
														{
															echo substr($rs_comm[comment_text],$ii,30)."<br>";
														}
													?>
												  </td>
												</tr>
		<!--
											 	<tr style="text-align: center">
												  <td height="10" width="400" colspan="3">
													<font size="1"><?php // for($i=1;$i<140;$i++) echo "."; ?></font>
												  </td>
												</tr>
		-->
											  </table>
										  </td>
										</tr>
										<tr style="text-align: center">
										  <td VALIGN="top" style="text-align: left; width: 100%" colspan="2">
											  <hr width="100%">
										  </td>
										</tr>
									</table>
							  <?php
								  }
								}
							  ?>
						</font>
					</td>
				  </tr>
				</table>
