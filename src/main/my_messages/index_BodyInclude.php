	<?php // ########################## middle sheet ####################### ?>
	<td align="left" VALIGN="top" width="55%">

		<table border="0" width="100%" style='table-layout:fixed' align="center" VALIGN="top" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<font size="5" color="#000000">
			<?php
						$SQL="SELECT * FROM social_iMing_customer_v3 where username='$own_body'";
						$result=mysql_query($SQL);
						while($rs=mysql_fetch_array($result)) {
							if($friend != "")
								echo "<a href=\"".$rootpath."main/text/index.php?friend=".$rs[username]."\">".$rs[name]."</a>";
							else
								echo "<a href=\"".$rootpath."main/text/index.php\">".$rs[name]."</a>";
						}
			?>		
						<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
<?php					if($friend != "") { 
?>							<a href="<?=$rootpath?>main/my_messages/index.php?friend=<?=$friend?>&fn=inbox">Messages</a>
<?php					}else{ 
?>							<a href="<?=$rootpath?>main/my_messages/index.php?fn=inbox">Messages</a>
<?php					}
?>	

<?php	/*				if($fn == "inbox" || $fn == "read"){
?>							<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
							inbox
<?php					}	*/
						if($fn == "new"){
?>							<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
							new message
<?php						}
			?>			
					</font>
					<p></p>
<?php				if($success == 1){
?>						<center><font style=" color: #999900">sent message!</font></center>
						<p></p>
<?php					$success="";
					}
?>				</td>
			</tr>
		</table>


		<?php // ################### middle middle (Messages) ################## ?>

<?php	// ########################################### inbox page #######################################
		if($fn == "inbox"){
?>			<div class="bodytext">
			<table valign="top" align="center" style="width: 95% ;table-layout: fixed">
			<col width=95%>

<?php		$SQL="
				SELECT * 
				FROM social_iMing_message_box
				where (username_receive = \"$_SESSION[su]\" OR username_send = \"$_SESSION[su]\")
				ORDER BY 'send_time' DESC";
			$result=mysql_query($SQL);
			while($rs=mysql_fetch_array($result)) {
?>
				<tr>
<?php				if($rs[unread] == 'y' && $rs[username_receive] == $_SESSION[su]){  ?> 
						<td bgColor='#ddf6ff' style="width: 100% ;" colspan="2" onMouseOver="this.bgColor='#beedff'" onMouseOut="this.bgColor='#ddf6ff'">
<?php				}
					else{	
?>
						<td style="width: 100% ;" colspan="2" onMouseOver="this.bgColor='#beedff'" onMouseOut="this.bgColor='#f2fffc'">
<?php				}
?>
						<span class="normal_black_link">
							<a href="<?=$_SERVER['PHP_SELF']?>?fn=read&id=<?=$rs[message_id]?>" style="display:block;">
								<table valign="middle" style="width: 100% ; " >
									<tr>
										<td style="width: 15% ; ">
<?php										$user_pic = "";
											if($rs[username_receive] != "$_SESSION[su]") {
												$user_pic = $rs[username_receive];
											}
											elseif($rs[username_send] != "$_SESSION[su]"){
												$user_pic = $rs[username_send];
											}
											else{ $user_pic = "$_SESSION[su]"; }
											$url = "";
											$sql2 = "
											SELECT url
											FROM social_iMing_images	
											WHERE username = '$user_pic' AND image_album = 'Profile Pictures' ";
											$result2 = mysql_query($sql2);
											while($rs2=mysql_fetch_array($result2))
											{
												$url = $rs2[url];
											}
?>											<a href="<?=$rootpath?>main/text/index.php?friend=<?=$user_pic?>">
<?php										if($url != ""){
												echo "<img width='50' height='50' src=\"".$rootpath."images/profile_picture/".$url."\">";
											}
											else{
												echo "<img width='50' height='50' src=\"".$rootpath."images/profile3.png\">";
											}
?>											</a>
										</td>
										<td valign="middle" style="width: 55% ; ">
											<table width="100%">
												<tr>
													<td valign="middle" style="width: 100% ; ">
														<a href="<?=$rootpath?>main/text/index.php?friend=<?=$user_pic?>"><?=$user_pic?></a>
													</td>
												</tr>
												<tr>
													<td valign="middle" style="width: 100% ; ">
<?php													$data = "";
													    $SQL2 = "
														SELECT message
														FROM social_iMing_message_data
														where message_id = '$rs[message_id]'
														ORDER BY 'send_time_last'";
														$result2=mysql_query($SQL2);
														while($rs2=mysql_fetch_array($result2)) {
															$data = $rs2[message];
														}
?>														<?=$rs[subject]?> : 
														<font color="#666666">
<?php														if(strlen($data) < 40){
																echo $data;
															}
															else{
																echo substr($data,0,40)."<br>";
															}
?>														</font>
													</td>
												</tr>
											</table>
										</td>
										<td valign="middle" style="width: 30% ; ">
											<?=$rs[send_time]?>
										</td>
									</tr>
								</table>
							</a>
						</span>
					</td>
				</tr>
				<tr>
					<td style="width: 100% ;" colspan="2">
						<img src="<?=$rootpath?>images/HR_line.png">
					</td>
				</tr>
<?php			}
?>			</table>
			</div>
<?php	}//end inbox page



			// #################################### new message page ######################################


		if($fn == "new"){

?>			<table valign="top" align="center" style="width: 95% ; " >
				<tr>
					<td>
						<table valign="top" align="center" style="width: 100% ; width: 100% ; table-layout:fixed" cellpadding="2" cellspacing="2">
							<!--form name="send_message" action="<?=$rootpath?>main/my_messages/my_messages_proc.php?fn=send" method="POST" onsubmit="return Validator(this)"-->
							<form name="send_message" id="send_message" method="POST" action="<?=$rootpath?>main/my_messages/my_messages_proc.php" onsubmit="return validateForm()">
								<tr>
									<td style="width: 15%; text-align: right ;">
										To:
									</td>
									<td style="width: 85%; text-align: left;">
										<!--input type="text" name="username_receive" size="50" value="" /-->


										<!-- ################# AutoSuggest ############### -->

										<script type="text/javascript">
											$(document).ready(function(){
													// Checked, copy values
													$("input#username_receive2").val($("input#username_receive").val());
												});
										</script>

										<div id="wrapper">
										<div id="content">
											<!--form method="get" action=""-->
<?php										if($friend != ""){
?>												<input type="text" id="username_receive" name="username_receive" size="60" value="<?=$friend?>" onchange = "copyIt()" disabled="disabled" /> 
<?php										}
											else{
?>												<input type="text" id="username_receive" name="username_receive" size="60" value="" onchange = "copyIt()" /> 
<?php										}
?>											<input type="hidden" id="username_receive2" name="username_receive2" value="" /> 

												<!--input type="text" id="testid" value="" style="font-size: 10px; width: 20px;" disabled="disabled" /-->
											<!--/form-->
										</div>
										</div>

										<script type="text/javascript">
											var options = {
												script:"Algo_AutoSuggest.php?json=true&",
												varname:"input",
												json:true,
												callback: function (obj) { document.getElementById('testid').value = obj.id; }
											};
											var as_json = new AutoSuggest('username_receive', options);
	
											var options_xml = {
												script:"Algo_AutoSuggest.php?",
												varname:"input"
											};
											var as_xml = new AutoSuggest('testinput_xml', options_xml);
										</script>
										<!-- ################# End AutoSuggest ############### -->

									</td>
								</tr>
								<tr>
									<td style="width: 15% ;text-align: right ;">
										Subject:
									</td>
									<td style="width: 85%; text-align: left;">
										<input type="text" name="subject" size="60" value="" />
									</td>
								</tr>
								<tr>
									<td style="width: 15% ;text-align: right ;">
										Message:
									</td>
									<td style="width: 85%; text-align: left;">
										<textarea class="message" name="message" placeholder="write the messasge here" style="border: 1px solid #d2dae7; resize: none;" /></textarea>
											<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
									</td>
								</tr>
								<tr>
									<td style="width: 90%; text-align: center;" colspan="2">
										<input type="hidden" name="fn" value="send"/>
										<table align="right" style="width: 80%; ">
											<tr><td style="width: 50% ; text-align: center;">
												<input type="submit" name="submit_send" value="send"/>
											</td><td style="width: 50% ; text-align: left;">
												<input type="button" action="<?=$rootpath?>main/my_message/" value="Cancel" />
											</td></tr>
										</table>
									</td>
								</tr>
							</form>
						</table>
						<?php // Check validate form ?>
						<script type="text/javascript">
						function validateForm()
						{
						var receive=document.forms["send_message"]["username_receive"].value;
						if (receive==null || receive=="")
						  {
						  alert("please put who is be receive");
						  return false;
						  }
						var subject=document.forms["send_message"]["subject"].value;
						if (subject==null || subject=="")
						  {
						  alert("please put your subject");
						  return false;
						  }
						var message_data=document.forms["send_message"]["message"].value;
						if (message_data==null || message_data=="")
						  {
						  alert("please put your message");
						  return false;
						  }
						}
						</script>

					</td>
				</tr>
			</table>
<?php	}// end new message page


		//######################################## func Read message #############################################


		if($fn == "read"){
?>			
			<table valign="top" align="center" style="width: 95% ; " >

<?php		//initial ---GET
			$id = $_GET["id"];

			$subject = "";
			$username_send = "";
			$username_receive = "";
			$send_time = "";

			$user = "";
			$message = "";
			$send_time_last = "";

//$rs[unread] == "y" && username_receive == "$_SESSION[su]"

			//query out
			$sql = "
				SELECT * 
				FROM  `social_iMing_message_box` 
				WHERE message_id = '$id' ";
			$result = mysql_query($sql);

			while($rs=mysql_fetch_array($result)){
				$subject = $rs[subject];
				$username_send = $rs[username_send];
				$username_receive = $rs[username_receive];
				$send_time = $rs[send_time];

				//change to read when [su] receive message
				if($rs[unread] == "y" && $username_receive == "$_SESSION[su]"){
					$sql = "
					UPDATE `social_iMing_message_box` 
					SET  `unread` =  '' 
					WHERE  `social_iMing_message_box`.`message_id` = '$id' ";
					$result=mysql_query($sql);
					if(!$result)die(mysql_error());
				}
?>
				<tr>
					<!-- add title (message)-->
					<td style="width: 100%; text-align: center;">
						<?=$subject?><br /><img src="<?=$rootpath?>images/HR_line.png">
					</td>
				</tr>
			</table>
<?php		}			
?>
			<div class="bodytext">
			<table valign="top" align="center" border="0" style="width: 95% ; " >

<?php		//query each data_id
			$sql2 = "
			select `message_id`, `user`, `message`, `send_time_last`
			FROM `social_iMing_message_data`
			where message_id = '$id' AND (user = '$username_send' OR user = '$username_receive')
			ORDER BY `send_time_last`";

			$result2 = mysql_query($sql2);
			$return_rows_thattime = 0;
			while($rs2=mysql_fetch_array($result2))
			{

				$user = $rs2[user];
				$message = $rs2[message];
				$send_time_last = $rs2[send_time_last];

				if($return_rows_thattime % 2 == 1){
?>					<tr class="table_comment" style="table-layout:fixed; " border="0">
<?php			} else {
?>					<tr border="0">
<?php 			}
				$return_rows_thattime++;
?>
					<!-- add logo -->
					<td valign="top" style="width: 10% ; ">
<?php					$url = "";
						$sql3 = "
						SELECT url
						FROM social_iMing_images	
						WHERE username = '$user' AND image_album = 'Profile Pictures'
						";
						$result3 = mysql_query($sql3);
						$return_rows3 = mysql_num_rows($result3);
						while($rs3=mysql_fetch_array($result3))
						{
							$url = $rs3[url];
						}
?>						<a href="<?=$rootpath?>main/text/index.php?friend=<?=$user?>">
<?php					if($url != ""){
							echo "<img width='50' height='50' src=\"".$rootpath."images/profile_picture/".$url."\">";
						}
						else{
							echo "<img width='50' height='50' src=\"".$rootpath."images/profile3.png\">";
						}
?>						</a>
					</td>
					<!-- add name, time, comments -->
					<td style="width: 60% ;">
						<table style="width: 100% ;">
							<tr>
								<td>
									<a href="<?=$rootpath?>main/text/index.php?friend=<?=$user?>"><?=$user?></a>
								</td>
							</tr>
							<tr>
								<td>
<?php								for($ii=0;$ii<strlen($message);$ii=$ii+35)
									{
										echo substr($message,$ii,35)."<br>";
									}
?>								</td>
							</tr>
						</table>
					</td>
					<td valign="top" style="width: 30% ;">
						<?=$send_time_last?>
					</td>
				</tr>
<?php		}
?>			</table>
			<center>
			<table style="width: 85% ;">
				<tr>
					<td style="width: 100%; text-align: center ;" >
						<form action="./my_messages_proc.php" method="POST">
							<input type="hidden" name="fn" value="<?=$fn?>" style="border: 1px solid #d2dae7;" />
							<input type="hidden" name="message_id" value="<?=$id?>" style="border: 1px solid #d2dae7;" />
							<textarea name="message" placeholder="write the message here" style="border: 1px solid #d2dae7; resize: none; " ></textarea>
								<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
							<input type="submit" value="send" />
						</form>
					</td>
				</tr>
			</table>
			</center>
			</div>
<?php			
		} //end read message

?>
	</td>

	<td align="left" VALIGN="top" width="25%"> 
	<!-- ########################## right sheet ####################### -->
		<?php if($menu1 == "message" && $fn == "inbox"){ ?>
			<a href="<?=$_SERVER['PHP_SELF']?>?fn=new"><img src="<?=$rootpath?>images/bu_plus.gif">new message</a>
		<?php } ?>
	</td>
