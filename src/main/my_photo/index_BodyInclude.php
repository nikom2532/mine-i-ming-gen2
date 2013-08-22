
<?php //########################## middle sheet 2. Profile detail ####################### ?>

<?php //################### top middle (profile name) ################## ?>

<?php
	if($pic==""){
?>	<td align="left" VALIGN="top" width="55%"> 
<?php
	}
	else{
?>	<td align="left" VALIGN="top" width="80%"> 
<?php
	}
?>
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
			<?php if($friend != "") { ?>
				<a href="<?=$rootpath?>main/my_photo/?friend=<?=$friend?>">Photos</a>
			<?php }else{ ?>
				<a href="<?=$rootpath?>main/my_photo/">Photos</a>
			<?php } ?>	
          <br />
		</font>
		
<?php //################### middle middle (show photos) ################## ?>

		<table border="0" width="100%" align="center" VALIGN="top" cellpadding="1" cellspacing="1" style="table-layout: fixed;">
<?php			//############### this is a list of pictures
				if($pic==""){
?>					<col width="25%">
					<col width="25%">
					<col width="25%">
					<col width="25%">
<?php
					$sql="select * from social_iMing_images where username='$own_body' AND image_album = 'photos' ORDER BY id DESC";
					$result = mysql_query($sql);
					$return_rows = mysql_num_rows($result);
					$i=1;
					while($rs=mysql_fetch_array($result))
					{
						if($i==1){
							echo "<tr><td align='center' VALIGN='top' width='25%'>";
						}
						else{
							echo "<td align='center' VALIGN='top' width='25%'>";
						}
						//OnMouseOver="this.style.border='1px solid red;'" OnMouseOut="this.style.border='0px solid red;'"
				?>
						<a href="<?=$_SERVER['PHP_SELF']?>?pic=<?=$rs[url]?>&friend=<?=$friend?>" >
							<? /* img width="120" height="120" src="<?=$rootpath?>images/photos_album/<?php echo $rs[url]; ?>" OnMouseOver="this.width='130'; this.height='130'; this.style.border='1px solid red';" OnMouseOut="this.width='120'; this.height='120'; this.style.border='0px solid red';" */ ?>
							<img width="120" height="120" src="<?=$rootpath?>images/photos_album/<?php echo $rs[url]; ?>" style="border: 3px solid #f8fffe;" OnMouseOver="this.width='120'; this.height='120'; this.style.border='3px solid #85ecff';" OnMouseOut="this.width='120'; this.height='120'; this.style.border='3px solid #f8fffe';">
						</a></td>
				<?php	$i++;
						if($i==5){
							$i=1;
							echo "</tr>";
						}
					}
				}
				else{		//when $pic is not equal (non-value)
			?>		<tr>
						<td width="8%" align="center" VALIGN="middle" cellpadding="2" cellspacing="2">
<?php
							//########### find the first photo
							$sql="select * from social_iMing_images where username='$own_body' AND image_album = 'photos' ORDER BY id DESC";
							$result = mysql_query($sql);
							$return_rows = mysql_num_rows($result);
							$pic_first_id = "";
							$pic_first_url = "";
							while($rs=mysql_fetch_array($result))
							{
								$pic_first_id = $rs[id];		
								$pic_first_url = $rs[url];
							}											//echo	$pic_first_id;

							//########### find the last photo
							$sql="select * from social_iMing_images where username='$own_body' AND image_album = 'photos' ORDER BY id ASC";
							$result = mysql_query($sql);
							$return_rows = mysql_num_rows($result);
							$pic_last_id = "";
							$pic_last_url = "";
							while($rs=mysql_fetch_array($result))
							{
								$pic_last_id = $rs[id];
								$pic_last_url = $rs[url];
							}											//echo $pic_last_id;

							//######### query for show a photo
							$sql="select * from social_iMing_images where username='$own_body' AND image_album = 'photos' AND url='$pic' ORDER BY id ASC";
							$result = mysql_query($sql);
							$return_rows = mysql_num_rows($result);
							$url_pic = "";
							$previous_id = "";
							while($rs=mysql_fetch_array($result))
							{
								//query for previous photo ####################
								$sql2="select * from social_iMing_images where username='$own_body' AND image_album = 'photos' AND id>'$rs[id]' ORDER BY id DESC";
								$result2 = mysql_query($sql2);
								$return_rows2 = mysql_num_rows($result2);
								while($rs2=mysql_fetch_array($result2))
								{
									$url_pic = $rs2[url];
									$previous_id = $rs2[id];
								}
								if($url_pic > $pic_frist_id)
								{
?>									<a href="<?=$_SERVER['PHP_SELF']?>?pic=<?=$url_pic?>&friend=<?=$friend?>">
										<img src="<?=$rootpath?>images/arr4.png" OnMouseOver="this.width='50'; this.height='50'; this.style.border='2px solid #85ecff';" OnMouseOut="this.width='50'; this.height='50'; this.style.border='0px solid red';">
									</a>
<?php							}
								else{
									$url_pic = $pic_first_url;
?>									<a href="<?=$_SERVER['PHP_SELF']?>?pic=<?=$url_pic?>&friend=<?=$friend?>">
										<img src="<?=$rootpath?>images/arr4.png" OnMouseOver="this.width='50'; this.height='50'; this.style.border='2px solid #85ecff';" OnMouseOut="this.width='50'; this.height='50'; this.style.border='0px solid red';">
									</a>
<?php								}
?>						</td>
						<td width="83%" align="center" VALIGN="middle" cellpadding="2" cellspacing="2">
			<?php			//query, show middle photo #####################
			?>				<a href="<?=$_SERVER['PHP_SELF']?>?pic=<?=$rs[url]?>">
								<img width="600" height="600" src="<?=$rootpath?>images/photos_album/<?php echo $rs[url]; ?>">
							</a>
						</td>
						<td width="9%" align="center" VALIGN="middle" cellpadding="2" cellspacing="0">
<?php						//query, show for next photo #####################
							$sql3="select * from social_iMing_images where username='$own_body' AND image_album = 'photos' AND id<'$rs[id]' ORDER BY id ASC";
							$result3 = mysql_query($sql3);
							$return_rows3 = mysql_num_rows($result3);
							$url_pic2 = "";
							while($rs3=mysql_fetch_array($result3))
							{
								 $url_pic2 = $rs3[url];
							}									//echo $url_pic2;

							if($url_pic2 == ""){		// This code is distaste to check if next photo is last, none ???
								$url_pic2 = $pic_last_url;
							}


/*							if($url_pic2 < $pic_last_id)
							{
?>								<a href="<?=$_SERVER['PHP_SELF']?>?pic=<?=$url_pic2?>">
									<img src="<?=$rootpath?>images/arr3.png">
								</a>
<?php						}
							else{
								$url_pic2 = $pic_first_url;
?>								<a href="<?=$_SERVER['PHP_SELF']?>?pic=<?=$url_pic2?>">
									<img src="<?=$rootpath?>images/arr3.png">
								</a>
<?php						}*/
/*
								<a href="<?=$_SERVER['PHP_SELF']?>?pic=<?=$url_pic2?>&friend=<?=$friend?>">
									<img src="<?=$rootpath?>images/arr3.png" OnMouseOver="this.width='50'; this.height='50'; this.style.border='2px solid #85ecff';" onmousepress="this.width='50'; this.height='50'; this.style.border='2px solid #ff0000';" OnMouseOut="this.width='50'; this.height='50'; this.style.border='0px solid red';">
								</a>
*/?>
							<span class="sky_border_link">
								<a href="<?=$_SERVER['PHP_SELF']?>?pic=<?=$url_pic2?>&friend=<?=$friend?>" style="display: block;">
									<img src="<?=$rootpath?>images/arr3.png">
								</a>
							</span>

						</td>
					</tr>	<?php //##### End for show photos ##### ?>
					<tr>
						<?php //##### Delete a photo ##### ?>
						<td width="90%" align="center" VALIGN="middle" colspan=3 cellpadding="2" cellspacing="2">
<?php						if($friend == $_SESSION[su] || $own_body == $_SESSION[su] || $friend==""){
?>								<p><a href="#" onclick="photo_delete_fn('<?=$rootpath?>', '<?=$previous_id?>', '<?=$rs[id]?>')">delete</a></p>
								<span id="photo_delete_id" class="show_on_center_css"></span>
<?php						}
?>						</td>
					</tr>
					<tr>	<!-- ##### comment photos ##### -->
						<td width="90%" align="center" VALIGN="middle" colspan=3 cellpadding="2" cellspacing="2">
							<form name="form_photo_comment" action="<?=$rootpath?>main/my_photo/comment_proc.php?fn=comment" method="POST">
								<textarea cols="40" rows="4" name="comment" maxlength="2000" placeholder="post photo comment here" style="border: 1px solid #d2dae7; resize: none;"></textarea>
									<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
								<br>
								<input name="own_body" type="hidden" value="<?php print $own_body; ?>">
								<input name="image_id" type="hidden" value="<?=$rs[id]?>">
								<input name="pic" type="hidden" value="<?=$pic?>">
								<input type="submit" name="submit_photo_comment" value="Post">
							</form>
							<?php		// it is insert comment to DB
/*								if($comment != '')
								{
									if($own_body == "")
										header ("location: ".$_SERVER['PHP_SELF']."?pic=".$pic);
									elseif($own_body != "")
										header ("location: ".$_SERVER['PHP_SELF']."?friend=".$own_body."pic=".$pic);
									$SQL_comment="insert into social_iMing_comment_images (username, username_from, image_name, comment, post_time) values('$own_body', '$_SESSION[su]', '$rs[url]', '$comment', NOW())";
									$result_comment=mysql_query($SQL_comment);
									if(!$result_comment)die(mysql_error());
								}
*/							?>
						</td>
					</tr>
					<tr>
						<td width="90%" align="center" VALIGN="middle" colspan=3 cellpadding="2" cellspacing="2">
<?php
//################################################## start show comment photo ##################################################--*

//						$sql_show_comment = "select * from social_iMing_comment_photos where username='$own_body' AND username_from = '$_SESSION[su]' AND url = '$rs[url]' ORDER BY `post_time` DESC";
				//		$sql_show_comment = "SELECT social_iMing_comment_images.username_from, social_iMing_comment_images.comment, social_iMing_comment_images.post_time FROM 'social_iMing_comment_images', 'social_iMing_images' WHERE social_iMing_comment_images.username='$own_body' AND social_iMing_comment_images.username = social_iMing_imagese.username AND social_iMing_comment_images.url = social_iMing_images.url"; 
//						$SQL_comment="select * from social_iMing_comment_images where username='$own_body' AND username_from = '$_SESSION[su]' ORDER BY `post_time` DESC";
//						$sql_image="SELECT * FROM social_iMing_images WHERE url=''";
//						$SQL_comment = "select * from social_iMing_comment_images where username='$own_body' ORDER BY `post_time` DESC";
						$SQL_comment = "select * from social_iMing_comment_images where username='$own_body' AND image_id='$rs[id]' ORDER BY `post_time` DESC";
						  $return_rows_thattime = 0;
						  $result_comm = mysql_query($SQL_comment);
						  while($rs_comm=mysql_fetch_array($result_comm))
						  {
					  ?>
							<div class="bodytext">
							<table border="0" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
<?php						if($return_rows_thattime % 2 == 1){
?>								<tr class="table_comment" style="text-align: center">
<?php						}
							else{
?>								<tr style="text-align: center">
<?php						}
							$return_rows_thattime++;
?>								  <td VALIGN="top" style="text-align: left; width: 50">
									<?php
										$url2 = "";
										$sql_image = "SELECT url FROM social_iMing_images WHERE username='$rs_comm[username_from]' AND image_album = 'Profile Pictures'";
										$result_image = mysql_query($sql_image);
										$return_rows_image = mysql_num_rows($result_image);
										while($rs_image=mysql_fetch_array($result_image)){
											$url2 = $rs_image[url];
										}

//										$url = $pic;
										if($url2 != ""){							/*  $_SERVER['PHP_SELF']  */
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
									  <table border="0" align="center" VALIGN="top" cellpadding="2" cellspacing="2">
										<tr style="text-align: center"> 
										  <td VALIGN="top" style="text-align: left" width="80">
											<a href="<?=$rootpath?>main/text/?friend=<?=$rs_comm[username_from]?>">	<?=$rs_comm[username_from]?>	</a>
										  </td>
										  <td VALIGN="top" style="text-align: left" width="280">
											<?php echo convertDate2String($rs_comm[post_time]);
?>								  		  </td>
										  <td VALIGN="top" style="text-align: left" width="20">
											<!-- ############ delete func ############ -->
											<a href="#" onclick="photo_comment_delete_fn('<?=$rootpath?>', '<?=$rs_comm[id]?>', '<?=$pic?>')">
												<img src="<?=$rootpath?>images/cross1.2.png" style="border: none;" width="16" onmouseover="this.src='<?=$rootpath?>images/cross2.png';this.alt='On alternate text'; this.width='16';" onmouseout="this.src='<?=$rootpath?>images/cross1.2.png';this.alt='On alternate text'; this.width='16';">
											</a>
											<!-- ################  show delete? event  ################ -->
											<span id="comment_delete_id" class="show_on_center_css"></span>
								  		  </td>

										</tr>
										<tr style="text-align: center">
										  <td VALIGN="top" style="text-align: left"  colspan="3">
											<?php
												//	we use strlen(~str~) to count string, substr(~str~ , start from, number) to cut the string
												for($ii=0;$ii<strlen($rs_comm[comment]);$ii=$ii+55)
												{
													echo substr($rs_comm[comment],$ii,55)."<br>";
												}
											?>
										  </td>
										</tr>
									  </table>
								  </td>
								</tr>
							</table>
							</div>
<?php								
							}
//################################################### end comment photo ########################################################--*
?>
						</td>
			<?php	//echo $rs;
							}//########## end query for show a photo
				}//end $pic!=""
			?>

				</tr>
		</table>
	</td> 	<?php 
	if($pic==""){ ?>
		<td align="center" VALIGN="top" width="25%">
			<?php // ########################## right sheet ####################### ?>
<?php		if($own_body == $_SESSION[su]){
?>				<a href="<?=$rootpath?>main/photo_upload">
				<img width="20" height="20" src="<?php echo $rootpath; ?>images/bu_plus.gif"></a>
				&nbsp<a href="<?=$rootpath?>main/photo_upload/">upload new photos</a>
<?php		} ?>
		</td> <?php
	} ?>
