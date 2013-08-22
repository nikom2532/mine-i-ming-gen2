<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr style="text-align: left; width: 100%;">
    <td align="center" width="99%" VALIGN="top" style="text-align: left; " width="100%">

		<center>
<?php
		// file name is Body_Left_Slide.php
		//show profile photo
		$url = "";
/*		$sql = "
		SELECT `url`
		FROM `social_iMing_images`
		WHERE `username`='$own_body' 
		AND `image_album` = 'Profile Pictures'
		";*/

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
/*
		$sql = "
		SELECT `social_iMing_images`.`id`
		FROM `social_iMing_images`
		WHERE `social_iMing_images`.`username`='$own_body' 
		AND `social_iMing_images`.`image_album` = 'Profile Pictures'
		";
		$result = mysql_query($sql);
		$return_rows = mysql_num_rows($result);
		$i_profile_photo=0;
		while($rs=mysql_fetch_array($result))
		{
			$id_profile_photo[$i_profile_photo] = $rs[id];
			$i_profile_photo++;
		}
		for($i=0; $i <= $i_profile_photo; $i++){
			echo $url_profile_photo[$i];
		}*/
/*
		$onchange = $_GET["oc"];
		if($onchange == 1){
			
			$sql_onchange = "
			SELECT `social_iMing_images`.`id`
			FROM `social_iMing_images`
			WHERE `social_iMing_images`.`username`='$own_body' 
			AND `social_iMing_images`.`image_album` = 'Profile Pictures'
			AND `social_iMing_images`.`id` > '$id_profile_photo[$onchange]'
			";
			$result_onchange = mysql_query($sql_onchange);
			$return_rows_onchange = mysql_num_rows($result_onchange);
			while($rs_onchange=mysql_fetch_array($result_onchange)){
				$id_pic = $rs_onchange[id];
				$url = $rs_onchange[url];
			}
		}
*/

		if($url != ""){
			if($own_body == $_SESSION[su]){
?>				<div class="profile_image">
<?php				/*
					<span class="menulink_profile_picture">
						<a href="<?php echo $rootpath; ?>main/profile_pic/choose_pic.php?pic=<?php echo $url; ?>" onMouseOver="toggleDiv('profile_image_text',1); toggleDiv('profile_image_bg',1);" onMouseOut="toggleDiv('profile_image_text',0); toggleDiv('profile_image_bg',0);">
<?php						echo "<img width='150' height='150' src=\"".$rootpath."images/profile_picture/".$url."\">";
?>							
							<a href="<?php echo $rootpath; ?>main/profile_pic/choose_pic.php" onMouseOver="toggleDiv('profile_image_text',1); toggleDiv('profile_image_bg',1);" onMouseOut="toggleDiv('profile_image_text',0); toggleDiv('profile_image_bg',0)">
								<h2 id="profile_image_text"><span id="profile_image_bg">Change Avatar</span></h2>
							</a>
						</a>
					</span>
					*/
?>					
					<span class="menulink_profile_picture">
						<a href="<?php echo $rootpath; ?>main/profile_pic/choose_pic.php?pic=<?php echo $url; ?>" >
<?php						echo "<img id='imageData' width='150' height='150' src=\"".$rootpath."images/profile_picture/".$url."\">";
?>
						
							<h2 id="profile_image_text">
								<a href="<?php echo $rootpath; ?>main/profile_pic/choose_pic.php" ><span id="profile_image_bg">Change Avatar</span></a>
							</h2>
						</a>
					</span>
				</div>
<?php		}
			elseif($own_body != $_SESSION[su]){
				echo "<img width='150' height='150' src=\"".$rootpath."images/profile_picture/".$url."\">";
			}
		}
		elseif($url == ""){
			if($own_body == $_SESSION[su]){
/*?>
				<div class="profile_image">
					<span class="menulink">
						<a href="#" onMouseOver="toggleDiv('profile_image_text',1)" onMouseOut="toggleDiv('profile_image_text',0)">
<?php						echo "<img width='150' height='150' src=\"".$rootpath."images/profile3.png\">";
?>							<h2 id="profile_image_text"><span id="profile_image_bg">Change Avatar</span></h2>
						</a>
					</span>
				</div>
<?php			*/
?>				<div class="profile_image">
					<span class="menulink" style="display: block;">
						<a href="<?php echo $rootpath; ?>main/profile_pic/choose_pic.php">
	<?php					echo "<img id='imageData' width='150' height='150' src=\"".$rootpath."images/profile3.png\">";
							?><h2 id="profile_image_text"><span id="profile_image_bg">Change Avatar</span></h2>
						</a>
					</span>
				</div>
				
<?php		}
			elseif($own_body != $_SESSION[su]){
				echo "<img width='150' height='150' src=\"".$rootpath."images/profile3.png\">";
			}
		}

?>
<?php	if($own_body == $friend && $own_body != $_SESSION[su] && $own_body != "")
		{
?>			<br /><a href="<?=$rootpath?>main/my_messages/index.php?friend=<?=$friend?>&fn=new"><img src="<?=$rootpath?>images/message_unread.png">send message</a>
<?php	}
?>		<br /><br />
		<img src="<?=$rootpath?>images/HR_line200.png">
		</center>
		<br />
	  <!--***** Menu *****-->
		<table border="0" width="90%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
	      <tr style="text-align: left; width: 100%;">
	        <td align="center" VALIGN="top" style="text-align: left; " width="100%">
				<table border="0" width="100%" align="left" VALIGN="top" cellpadding="0" cellspacing="0">


					<tr>
<?php					if($menu1=="profile"){
?>							<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="100%">
<?php					}
						else{
?>							<td align="center" VALIGN="top" style="text-align: left; " width="100%" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
<?php					}
?>						
							<span class="menulink">
								<?php 
									if($own_body == $friend){
										echo "<a href=\"".$rootpath."main/text/?friend=".$friend."\" style=\"display:block;\">&emsp;<img src=\"".$rootpath."images/menu_pen.png\"> Texts</a>";
									}
									elseif($own_body == $_SESSION['su']){
										echo "<a href=\"".$rootpath."main/text/\" style=\"display:block;\">&emsp;<img src=\"".$rootpath."images/menu_pen.png\"> Texts</a>";
									}
								?>
							</span>
						</td>
					</tr>

					<tr>
<?php					if($menu1=="info"){
?>							<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="100%">
<?php					}
						else{
?>							<td align="center" VALIGN="top" style="text-align: left; " width="100%"onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
<?php					}
?>							<span class="menulink">
								<a href="<?=$rootpath?>main/my_info/
					<?php 		if($own_body == $friend){
									echo "?friend=".$friend."\"";
								}
								else echo "\"";
?>								style="display:block;">
								&emsp;<img src="<?=$rootpath?>images/comment_blue.gif"> Info</a>
							</span>
						</td>
					</tr>
					<tr>
<?php					if($menu1=="photo"){
?>							<td align="center" bgcolor="#beedff" VALIGN="top" style="text-align: left; " width="100%">
<?php					}
						else{
?>							<td align="center" VALIGN="top" style="text-align: left; " width="100%"onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
<?php					}
?>							<span class="menulink">
								<a href="<?=$rootpath?>main/my_photo/
					<?php 		if($own_body == $friend){
									echo "?friend=".$friend."\"";
								}
								else echo "\"";
?>								style="display:block;">
								&emsp;<img src="<?=$rootpath?>images/action_go.gif"> photos</a>
							</span>
						</td>
					</tr>

					<tr>
						<td>
							<center><p><img src="<?=$rootpath?>images/HR_line200.png"></p></center>
						</td>
					</tr>
				</table>
			</td>
		  </tr>

	  <!-- ######################## title ++ show who I tag --- friends #########################-->

	      <tr style="text-align: left; width: 100%;">
	        <td VALIGN="top" style="text-align: left;" width="100%">
<?php
					$SQL_friend="
					select 
						`social_iMing_customer_v3`.`username`, `social_iMing_friends`.`fnd`
					from
						`social_iMing_friends`
					INNER JOIN
						`social_iMing_customer_v3`
					ON
						`social_iMing_friends`.`username` = `social_iMing_customer_v3`.`username`
					where 
						`social_iMing_friends`.`username` = \"$own_body\" 
					LIMIT 0,9";
					$result = mysql_query($SQL_friend); 
					$return_rows = mysql_num_rows($result);
?>
				<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
					<tr align="center">
<?php					if($menu1=="tagging"){
?>							<td align="center" bgcolor="#beedff" align="center" VALIGN="top" style="text-align: left; " width="100%">
<?php					}
						else{
?>							<td align="center" align="center" VALIGN="top" style="text-align: left; " width="100%" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
<?php					}
?>						<span class="menulink">
<?php			 			if($own_body == $friend){
?>								<a href="<?=$rootpath?>main/my_tagging.php?friend=<?=$friend?>"
<?php							}
							elseif($own_body == $_SESSION[su]){
?>								<a href="<?=$rootpath?>main/my_tagging.php"
<?php						}
?>							style="display:block;">&emsp;<img src="<?=$rootpath?>images/comment_blue.gif"> Clock tagging (<?=$return_rows?>)</a>
						</span>
						</td>
					</tr>
				</table>
				
				<!--######################## show who I tag --- friends #######################-->
<?php				
				while($rs=mysql_fetch_array($result)) {
					$url2="";
					$sql2="
					select
						social_iMing_images.url
					from 
						social_iMing_images
					INNER JOIN
						social_iMing_friends
					ON
						social_iMing_images.username = social_iMing_friends.username
					INNER JOIN 
						`social_iMing_customer_info`
					ON 
						`social_iMing_images`.`username` = `social_iMing_customer_info`.`username`
						AND
						`social_iMing_customer_info`.`profile_picture_id` = `social_iMing_images`.`id`
					where 
						social_iMing_images.username = \"$rs[fnd]\"
					AND 
						social_iMing_images.image_album = 'Profile Pictures'
					";
					$result2 = mysql_query($sql2);
					$return_rows2 = mysql_num_rows($result2);
					while($rs2=mysql_fetch_array($result2))
					{
						$url2 = $rs2[url];
					}
?>					<span class="sky_border_link">
						<a href="<?=$rootpath?>main/text/?friend=<?=$rs[fnd]?>" style="display: block;">
							<table border="0" width="90%" align="center" VALIGN="middle" cellpadding="0" cellspacing="0">
								<tr>
									<td align="left" style="text-align: left; width: 25%">
		<?php							if($url2 != ""){
											echo "<img width='50' height='50' src=\"".$rootpath."images/profile_picture/".$url2."\">";
										}
										else{
											echo "<img width='50' height='50' src=\"".$rootpath."images/profile3.png\">";
										}
		?>							</td>
									<td align="left" style="text-align: left; width: 60%">
		<?php							echo $rs[fnd];
		?>							</td>
								</tr>
							</table>
						</a>
					</span>
<?php			}
?>				<center><br><img src="<?=$rootpath?>images/HR_line200.png"></center>

	 <!-- ########################## title ++ show who tag us --- friends ##########################3-->

<br>
				<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
					<tr align="center">
<?php
						$SQL_friend="
							select 
								social_iMing_customer_v3.username, social_iMing_friends.fnd 
							from
								social_iMing_friends, social_iMing_customer_v3 
							where 
								social_iMing_friends.fnd = \"$own_body\" 
							AND 
								social_iMing_friends.username = social_iMing_customer_v3.username
							LIMIT 0,9";
						$result = mysql_query($SQL_friend);
						$return_rows = mysql_num_rows($result);

						if($menu1=="tagger"){
?>							<td align="center" bgcolor="#beedff" align="center" VALIGN="top" style="text-align: left; " width="100%">
<?php					}
						else{
?>							<td align="center" align="center" VALIGN="top" style="text-align: left; " width="100%" onMouseOver="this.bgColor='#ddf6ff'" onMouseOut="this.bgColor='#f2fffc'">
<?php					}
?>						<span class="menulink">
							<a href="<?=$rootpath?>main/my_tagger.php
<?php			 			if($own_body == $friend){
								echo "?friend=".$friend;
							}
?>							"style="display:block;">&emsp;<img src="<?=$rootpath?>images/comment_blue.gif"> Clock tagger (<?=$return_rows?>)</a>
						</span>
						</td>
					</tr>
				</table>

				<!--######################## show who tag us --- friends #######################-->
<?php				while($rs=mysql_fetch_array($result)) {
						$url2="";
						$sql2="
						select
							social_iMing_images.url
						from 
							social_iMing_images
						INNER JOIN
							social_iMing_friends
						ON
							social_iMing_images.username = social_iMing_friends.username
						INNER JOIN 
							`social_iMing_customer_info`
						ON 
							`social_iMing_images`.`username` = `social_iMing_customer_info`.`username`
							AND
							`social_iMing_customer_info`.`profile_picture_id` = `social_iMing_images`.`id`
						where 
							social_iMing_images.username = \"$rs[username]\"
						AND 
							social_iMing_images.image_album = 'Profile Pictures'";
						$result2 = mysql_query($sql2);
						$return_rows2 = mysql_num_rows($result2);
						while($rs2=mysql_fetch_array($result2))
						{
							$url2 = $rs2[url];
						}
?>
					<span class="sky_border_link">
						<a href="<?=$rootpath?>main/text/?friend=<?=$rs[username]?>" style="display: block;">
							<table border="0" width="90%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">	
								<tr>
									<td align="center" VALIGN="middle" style="text-align: left; width: 25%;">
		<?php							if($url2 != ""){
											echo "<img width='50' height='50' src=\"".$rootpath."images/profile_picture/".$url2."\">";
										}
										else{
											echo "<img width='50' height='50' src=\"".$rootpath."images/profile3.png\">";
										}
		?>							</td>
									<td align="center" VALIGN="middle" style="text-align: left; width: 60%;">
		<?php							echo $rs[username]."<br>";
		?>							</td>
								</tr>
							</table>
						</a>
					</span>
<?php				}
?>
					<center><p><img src="<?=$rootpath?>images/HR_line200.png"></p></center>


			</td>
		  </tr>
		</table>

	</td>
    <!--td align="center" width="1%" VALIGN="top" style="text-align: left; " width="100%">
		<img src="<?=$rootpath?>images/HL_line.png">
	</td-->
  </tr>
</table>
