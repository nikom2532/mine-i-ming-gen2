		<?php										//count vote
													$sql_vote_answer = "
													SELECT `id`, `username_from`, `answer_id`, `vote`
													FROM `social_iMing_vote_answer` 
													WHERE `answer_id`= '$rs_answer[answer_id]'
													";
													$result_vote_answer = mysql_query($sql_vote_answer);
													$return_rows_vote_answer = mysql_num_rows($result_vote_answer);
													$vote_answer_great=0;
													$vote_answer_good=0;
													$vote_answer_fair=0;
													$vote_answer_poor=0;
													$vote_count=0;
													$score=0;
													while($rs_vote_answer=mysql_fetch_array($result_vote_answer)){
														if($rs_vote_answer[vote] == 1){
															$vote_answer_great++;
															$score+=4;
														}
														elseif($rs_vote_answer[vote] == 2){
															$vote_answer_good++;
															$score+=3;
														}
														elseif($rs_vote_answer[vote] == 3){
															$vote_answer_fair++;
															$score+=2;
														}
														elseif($rs_vote_answer[vote] == 4){
															$vote_answer_poor++;
															$score+=1;
														}
														$vote_count++;
													}
													//check vote
													$sql_vote_answer = "
													SELECT `id`, `username_from`, `answer_id`, `vote`
													FROM `social_iMing_vote_answer` 
													WHERE `answer_id`= '$rs_answer[answer_id]'
													AND `username_from` = '$_SESSION[su]'
													";
													$result_vote_answer = mysql_query($sql_vote_answer);
													$return_rows_vote_answer = mysql_num_rows($result_vote_answer);
													$vote_answer="";
													$id_vote_answer="";
													while($rs_vote_answer=mysql_fetch_array($result_vote_answer)){
														if($rs_vote_answer[vote] == 1){
															$vote_answer = $rs_vote_answer[vote];
															$id_vote_answer = $rs_vote_answer[id];
														}
														elseif($rs_vote_answer[vote] == 2){
															$vote_answer = $rs_vote_answer[vote];
															$id_vote_answer = $rs_vote_answer[id];
														}
														elseif($rs_vote_answer[vote] == 4){
															$vote_answer = $rs_vote_answer[vote];
															$id_vote_answer = $rs_vote_answer[id];
														}
														elseif($rs_vote_answer[vote] == 3){
															$vote_answer = $rs_vote_answer[vote];
															$id_vote_answer = $rs_vote_answer[id];
														}
													}
													if($vote_count != 0){
														$score = ($score / ($vote_count*4))*100;
													}
													else{
														$score = 0;
													}
?>													Score votes: <?php if($score==0) echo "0%"; else echo $score."%"; ?><br>
													Vote: 
<?php												if($vote_answer == "") {
?>													<a href="#" onclick="vote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '1')">Great (<?=$vote_answer_great?>)</a> - 
														<a href="#" onclick="vote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '2')">Good (<?=$vote_answer_good?>)</a> - 
														<a href="#" onclick="vote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '3')">Fair (<?=$vote_answer_fair?>)</a> - 
														<a href="#" onclick="vote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '4')">Poor (<?=$vote_answer_poor?>)</a>

<?php												}
													elseif($vote_answer != ""){
														if($vote_answer == 1){
		?>													<a href="#" onclick="unvote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '1', '<?=$id_vote_answer?>')">Ungreat (<?=$vote_answer_great?>)</a> - 
		<?php											} else{
		?>													<a href="#" onclick="vote_answer_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '1', '<?=$id_vote_answer?>')">Great (<?=$vote_answer_great?>)</a> - 
		<?php											}
														if($vote_answer == 2){
		?>													<a href="#" onclick="unvote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '2', '<?=$id_vote_answer?>')">Ungood (<?=$vote_answer_good?>)</a> - 
		<?php											} else{
		?>													<a href="#" onclick="vote_answer_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '2', '<?=$id_vote_answer?>')">Good (<?=$vote_answer_good?>)</a> - 
		<?php											}
														if($vote_answer == 3){
		?>													<a href="#" onclick="unvote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '3', '<?=$id_vote_answer?>')">Unfair (<?=$vote_answer_fair?>)</a> - 
		<?php											} else{
		?>													<a href="#" onclick="vote_answer_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '3', '<?=$id_vote_answer?>')">Fair (<?=$vote_answer_fair?>)</a> - 
		<?php											}
														if($vote_answer == 4){
		?>													<a href="#" onclick="unvote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '4', '<?=$id_vote_answer?>')">Unpoor (<?=$vote_answer_poor?>)</a>
		<?php											} else{
		?>													<a href="#" onclick="vote_answer_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '4', '<?=$id_vote_answer?>')">Poor (<?=$vote_answer_poor?>)</a>
		<?php											}
													}
//													<div id="vote"></div>
?>
