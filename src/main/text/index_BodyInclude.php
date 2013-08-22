	<td align="left" VALIGN="top" width="55%"> 
	<!-- ########################## middle sheet 2. Profile detail ####################### -->

		<font size="5" color="#000000">
          <?php
            $SQL="SELECT * FROM social_iMing_customer_v3 where username='$own_body'";
            //$result=mysql_query($SQL);
			//print_r(@mysql_fetch_array($result));
			$db->query($SQL);
            //while($rs=mysql_fetch_array($result)) {
            	//print_r($db->fetchAssoc());
            while($rs=$db->fetchAssoc()){
				if($friend != "")
					echo "<a href=\"".$_SERVER['PHP_SELF']."?friend=".$rs[username]."\">".$rs[name]."</a>";
				else
					echo "<a href=\"".$_SERVER['PHP_SELF']."\">".$rs[name]."</a>";
          ?>
		</font>
		<br />
		<font size="3" color="#000000">
          sex :
          <?php
              if($rs[sex] == 'm')
                echo "male,";
              else if($rs == 'f')
                echo "male,";
              else{ echo "unknown"; }
          ?>
          birthday : 
          <?php
              echo $rs[birthday].",";
          ?>

          E-Mail : 
          <?php
              echo $rs[email].",";
          ?>          

          Address : 
          <?php
              echo $rs[address];
			}
          ?>
          <br>
		</font>

		<!-- #################### End readme ###################### -->

<br>

		<!--***** 6. bottom - right = post comment & comment *****-->
		<table border="0" width="100%" align="center" VALIGN="top" cellpadding="2" cellspacing="2">
			<tr style="text-align: left; width: 100%;">
				<td VALIGN="top" style="text-align: center; width: 100%;">

					<form id="ask_question" action="<?=$rootpath?>main/text/" method="POST" onsubmit="return validate_questionForm()">
						<textarea cols="50" rows="3" name="comment" id="question" maxlength="2000" placeholder="post your question here" style="border: 1px solid #d2dae7; resize: none;"></textarea>
						<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
						<br>
						<input name=friend type="hidden" value="<?php print $own_body; ?>">

						<input type="submit" value="Post">
					</form>
						<?php // Check validate form ?>
						<script type="text/javascript">
						function validate_questionForm()
						{
						var question1=document.forms["ask_question"]["question"].value;
						if (question1==null || question1=="")
						  {
						  return false;
						  }
						}
						</script>

<?					// it is insert comment to DB
					if($comment != '')
					{
						//print $own_body;
						//print $friend;
					    $SQL_comment="insert into social_iMing_comment(username, username_from, comment_text, post_time) values('$own_body', '$_SESSION[su]', '$comment', NOW())";
					    $result=mysql_query($SQL_comment);
						if(!$result)die(mysql_error());
						$comment="";
					}
?>
					<!--####################### show comment ######################-->
					  <?php
							$url_myself = "";	//show my avatar
							$imageMyself= "";
							$sql_myself = "
							SELECT `social_iMing_images`.`url`
							FROM `social_iMing_images`
							INNER JOIN `social_iMing_customer_info`
							ON 
								`social_iMing_images`.`username` = `social_iMing_customer_info`.`username`
								AND
								`social_iMing_customer_info`.`profile_picture_id` = `social_iMing_images`.`id`
							WHERE `social_iMing_images`.`username`='$_SESSION[su]' 
							AND `social_iMing_images`.`image_album` = 'Profile Pictures'
							";
							$result_myself = mysql_query($sql_myself);
							$return_rows_myself = mysql_num_rows($result_myself);
							while($rs_myself=mysql_fetch_array($result_myself))
							{
								$url_myself = $rs_myself[url];
							}
							if($url_myself != ""){							
								$imageMyself = $url_myself;
							}
							else{
								$imageMyself = "";
							}

						  $SQL_comment="
							select * 
							from social_iMing_comment 
							where username='$own_body' ORDER BY `post_time` DESC";
						  $result_comm = mysql_query($SQL_comment);
						  $return_rows_comment = mysql_num_rows($result_comm);
						  $return_rows_thattime = 0;
						  while($rs_comm=mysql_fetch_array($result_comm))
						  {
					  ?>
							<table border="0" align="left" VALIGN="top" width="100%" cellpadding="2" cellspacing="0">
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
								  <td VALIGN="top" style="text-align: left; width: 11%;">
									<?php
										$url = "";
										$sql = "
										SELECT `social_iMing_images`.`url`
										FROM `social_iMing_images`
										INNER JOIN `social_iMing_customer_info`
										ON 
											`social_iMing_images`.`username` = `social_iMing_customer_info`.`username`
											AND
											`social_iMing_customer_info`.`profile_picture_id` = `social_iMing_images`.`id`
										WHERE `social_iMing_images`.`username`='$rs_comm[username_from]'
										AND `social_iMing_images`.`image_album` = 'Profile Pictures'
										";
										$result = mysql_query($sql);
										$return_rows = mysql_num_rows($result);
										while($rs=mysql_fetch_array($result))
										{
											$url = $rs[url];
										}
										if($url != ""){							/*  $_SERVER['PHP_SELF']  */
											if($return_rows_thattime % 2 == 1)
											{
?>												<span class="sky_border_link">
<?php										}
											else{
?>												<span class="sky_border_comment_link">
<?php										}
											echo "<a href=\"?friend=".$rs_comm[username_from]."\" style=\"display: block;\"><img width='50' height='50' src=\"".$rootpath."images/profile_picture/".$url."\"></a></span>";
										}
										else{
											if($return_rows_thattime % 2 == 1)
											{
?>												<span class="sky_border_link">
<?php										}
											else{
?>												<span class="sky_border_comment_link">
<?php										}
											echo "<a href=\"?friend=".$rs_comm[username_from]."\" style=\"display: block;\"><img width='50' height='50' src=\"".$rootpath."images/profile3.png\"></a></span>";
										}
									?>
								  </td>
								  <td VALIGN="top" style="text-align: left; width: 89%;">
									  <table border="0" align="center" VALIGN="top" width="100%" cellpadding="2" cellspacing="2">
										<tr style="text-align: center"> 
										  <td VALIGN="top" style="text-align: left" width="80">
											<a href="<?php echo $rootpath; ?>main/text/?friend=<?php echo $rs_comm[username_from]; ?>">	<?php echo $rs_comm[username_from]; ?>	</a>
										  </td>
										  <td VALIGN="top" style="text-align: left" width="300">
											ask on <?php // echo $rs_comm[post_time]; ?>
<?php										echo convertDate2String($rs_comm[post_time]);
?>								  		  </td>
										  <td VALIGN="top" style="text-align: left" width="20">

											<!-- ############ delete func ############ -->

											<a href="#" onclick="comment_delete_fn('<?=$rootpath?>','<?=$rs_comm[comment_id]?>')">
												<img src="<?=$rootpath?>images/cross1.2.png" style="border: none;" width="16" onmouseover="this.src='<?=$rootpath?>images/cross2.png';this.alt='On alternate text'; this.width='16';" onmouseout="this.src='<?=$rootpath?>images/cross1.2.png';this.alt='On alternate text'; this.width='16';">
											</a>
								  		  </td>
										</tr>
										<tr style="text-align: center">
										  <td VALIGN="top" style="text-align: left" width="400" colspan="3">
											<?php
									//we use strlen(~str~) to count string, substr(~str~ , start from, number) to cut the string
												for($ii=0;$ii<strlen($rs_comm[comment_text]);$ii=$ii+55)
												{
													echo substr($rs_comm[comment_text],$ii,55)."<br>";
												}
											?>
										  </td>
										</tr>
										<tr style="text-align: center">
										  <td VALIGN="top" style="text-align: left; background-color: #EEEEEE ;" width="400" colspan="3">
<?php										//##################### show vote - question ########################
											include($rootpath."main/text/comment_vote_question.php");
?>										  </td>
										</tr>

<?php	/*								<tr style="text-align: center; background-color: #ffffff ;">
										  <td VALIGN="top" style="text-align: right" width="400" colspan="3">
<?php										$showAnswer = "'".$rootpath."', '".$own_body."', '".$rs_comm[comment_id]."', '".$imageMyself."', '".$url."', '".$rs_comm[username_from]."', '".$rs_comm[post_time]."', '".$rs_comm[comment_text]."'";
?>											<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
											<a href="#" onclick="show_answer_comment_fn(<?=$showAnswer?>)">answer</a>
											
										  </td>
										</tr>
*/	?>								  </table>				


<?php									//################ show sub answer ##################
										$sql_answer="
										SELECT * 
										FROM `social_iMing_comment_answer` 
										WHERE
											question_id = '$rs_comm[comment_id]'
										ORDER BY `post_time` ASC
										";
										$result_answer = mysql_query($sql_answer);
										$return_rows_answer = mysql_num_rows($result_answer);
										$return_answer_rows_thattime = 0;
										while($rs_answer=mysql_fetch_array($result_answer)){
?>											<table border="0" align="left" VALIGN="top" width="100%" cellpadding="0" cellspacing="0" style="table-layout: fixed">
<?php										
											if($return_answer_rows_thattime % 2 == 1)
											{		//soft
?>												<tr style="text-align: center; background-color:#e8ddc9;">
<?php										}else{	//dark
?>												<tr style="text-align: center; background-color:#e8d0a7;">
<?php										}
											$return_answer_rows_thattime++;
?>
													<td VALIGN="top" style="text-align: left" width="36">
<?php
														$url_ans_sub = "";
														$sql_ans_sub = "
														SELECT `social_iMing_images`.`url`
														FROM `social_iMing_images`
														INNER JOIN `social_iMing_customer_info`
														ON 
															`social_iMing_images`.`username` = `social_iMing_customer_info`.`username`
															AND
															`social_iMing_customer_info`.`profile_picture_id` = `social_iMing_images`.`id`
														WHERE `social_iMing_images`.`username`='$rs_answer[username_from]' 
														AND `social_iMing_images`.`image_album` = 'Profile Pictures'
														";
														$result_ans_sub = mysql_query($sql_ans_sub);
														$return_rows_ans_sub = mysql_num_rows($result_ans_sub);
														while($rs_ans_sub=mysql_fetch_array($result_ans_sub))
														{
															$url_ans_sub = $rs_ans_sub[url];
														}
														if($url_ans_sub != ""){
															if($return_answer_rows_thattime % 2 == 1) {
/*?>															<a href="<?=$_SERVER['PHP_SELF']?>?friend=<?=$rs_answer[username_from]?>" style="display: block;" style="border: 2px solid #e8ddc9;" OnMouseOver="this.style.border='2px solid #cbf7ff';" OnMouseOut="this.style.border='2px solid #e8ddc9';">
*/?>															<span class="sky_border_answer2_link">
<?php														}
															else{
/*?>															<a href="<?=$_SERVER['PHP_SELF']?>?friend=<?=$rs_answer[username_from]?>" style="display: block;" style="border: 2px solid #e8d0a7;" OnMouseOver="this.style.border='2px solid #cbf7ff';" OnMouseOut="this.style.border='2px solid #e8d0a7';">
*/?>															<span class="sky_border_answer_link">
<?php														}
?>															<a href="?friend=<?=$rs_answer[username_from]?>" style="display: block;">
<?php														echo "<img width='32' height='32' src=\"".$rootpath."images/profile_picture/".$url_ans_sub."\"></a>";
														}
														else{
															if($return_answer_rows_thattime % 2 == 1) {
/*?>															<a href="<?=$_SERVER['PHP_SELF']?>?friend=<?=$rs_answer[username_from]?>" style="display: block;" style="border: 2px solid #e8ddc9;" OnMouseOver="this.style.border='2px solid #cbf7ff';" OnMouseOut="this.style.border='2px solid #e8ddc9';">
*/?>															<span class="sky_border_answer2_link">
<?php														}
															else{
/*?>															<a href="<?=$_SERVER['PHP_SELF']?>?friend=<?=$rs_answer[username_from]?>" style="display: block;" style="border: 2px solid #e8d0a7;" OnMouseOver="this.style.border='2px solid #cbf7ff';" OnMouseOut="this.style.border='2px solid #e8d0a7';" >
*/?>															<span class="sky_border_answer_link">
<?php														}
?>															<a href="?friend=<?=$rs_answer[username_from]?>" style="display: block;">
<?php														echo "<img width='32' height='32' src=\"".$rootpath."images/profile3.png\"></a>";
														}
?>													</td>
													<td VALIGN="top" style="text-align: left" width="416">
												
													  <table border="0" align="center" VALIGN="top" width="100%" cellpadding="0" cellspacing="0">
														<tr style="text-align: center">
														  <td VALIGN="top" style="text-align: left" width="80">
															<a href="<?php echo $rootpath; ?>main/text/?friend=<?php echo $rs_answer[username_from]; ?>">	<?php echo $rs_answer[username_from]; ?>	</a>
														  </td>
														  <td VALIGN="top" style="text-align: left" width="300">
															ask on  
<?php														echo convertDate2String($rs_answer[post_time]);
?>												  		  </td>
														  <td VALIGN="top" style="text-align: left" width="20">

															<!-- ############ sub answer delete func ############ -->

															<a href="#" onclick="answer_delete_fn('<?=$rootpath?>', '<?=$rs_answer[answer_id]?>')">
																<img src="<?=$rootpath?>images/cross1.2.png" style="border: none;" width="16" onmouseover="this.src='<?=$rootpath?>images/cross2.png';this.alt='On alternate text'; this.width='16';" onmouseout="this.src='<?=$rootpath?>images/cross1.2.png';this.alt='On alternate text'; this.width='16';">
															</a>
												  		  </td>
														</tr>
														<tr style="text-align: center">
														  <td VALIGN="top" style="text-align: left" width="400" colspan="3">
															<?php
													//we use strlen(~str~) to count string, substr(~str~ , start from, number) to cut the string
																for($ii=0;$ii<strlen($rs_answer[comment_text]);$ii=$ii+55)
																{
																	echo substr($rs_answer[comment_text],$ii,55)."<br>";
																}
															?>
														  </td>
														</tr>
														<tr style="text-align: center">
														  <td VALIGN="top" style="text-align: right" width="400" colspan="3">
															
														  </td>
														</tr>
													  </table>
													</td>
										 		</tr>
		<?php									//##################### show vote - answer ########################
		?>										<tr style="text-align: center">
												  <td VALIGN="top" style="text-align: left" width="32">
												  </td>
												  <td VALIGN="top" style="text-align: left; background-color: #EEEEEE ;" width="400" colspan="2">
													<table border="0" align="center" VALIGN="top" width="100%" cellpadding="0" cellspacing="0">
														<tr style="text-align: center">
														  <td VALIGN="top" style="text-align: right" width="95%">
		<?php												//##################### show vote - answer ########################
															include($rootpath."main/text/comment_vote_answer.php");
		?>																									
														  </td>
														  <td VALIGN="top" style="text-align: left" width="5%">
		<?php											//	include($rootpath."main/text/menu/vote.php");
		?>												  </td>
														</tr>
													</table>

												  </td>
												</tr>
												</tr>
									  		</table>
<?php									}//end while answer
?>
									<?php //######################### show Form answer ######################## ?>
									<table border="0" align="left" VALIGN="top" width="100%" cellpadding="2" cellspacing="0">
										<tr style="text-align: center; background-color:#dbefca;">
											<td VALIGN="top" style="text-align: left" width="32">
									<?php
											if($imageMyself != ""){
									?>			<img width='32' height='32' src="<?=$rootpath?>images/profile_picture/<?=$imageMyself?>">
									<?php	}else{
									?>			<img width='32' height='32' src="<?=$rootpath?>images/profile3.png">
									<?php	}
									?>
											</td>
											<td VALIGN="top" style="text-align: left;" width="350">
												<form id="answer_form" action="<?=$rootpath?>main/text/comment_delete.php" method="POST" onKeyPress="return validate_answerForm()">
													<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
													<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/enter_is_submit.js"></script>
														<textarea class="answer_comment" name="answer_comment" id="answer" maxlength="2000" placeholder="post your answer here" style="border: 1px solid #d2dae7; resize: none;" onKeyPress="return submitenter(this,event)"></textarea>
													<br>
													<input name="friend" type="hidden" value="<?=$own_body?>">
													<input name="comment_id" type="hidden" value="<?=$rs_comm[comment_id]?>">
													<input name="fn" type="hidden" value="answer_comment">
												</form>
												<?php // Check validate form ?>
												<script type="text/javascript">
												function validate_answerForm()
												{
												var answer=document.forms["answer_form"]["answer"].value;
												if (answer==null || answer=="")
												  {
													  alert("please put who is be receive");
													  return false;
												  }
												}
												</script>
											</td>
										</tr>
									</table>
								  </td>
								</tr>
							</table>
							<!-- ################  show delete? event  ################ -->
							<div class="show_on_center_css" id="comment_delete_id"></div>

								<div class="show_on_center_css" id="show_answer_comment_box"></div>
					  <?php
						  }//end while question comment
					  ?>
				</td>
			</tr>
		</table>
	</td>
	<td align="center" VALIGN="top" width="25%"> 
		<?php include($rootpath."include/body_right_subscribe.php"); ?>
	</td>
