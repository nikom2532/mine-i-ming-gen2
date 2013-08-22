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
													while($rs_vote_answer=mysql_fetch_array($result_vote_answer)){
														if($rs_vote_answer[vote] == 1){
															$vote_answer_great++;
														}
														elseif($rs_vote_answer[vote] == 2){
															$vote_answer_good++;
														}
														elseif($rs_vote_answer[vote] == 3){
															$vote_answer_fair++;
														}
														elseif($rs_vote_answer[vote] == 4){
															$vote_answer_poor++;
														}
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
													if($vote_answer == "") {
		?>												<a href="#" onclick="vote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '1')">Great (<?=$vote_answer_great?>)</a> - 
														<a href="#" onclick="vote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '2')">Good (<?=$vote_answer_good?>)</a> - 
														<a href="#" onclick="vote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '3')">Fair (<?=$vote_answer_fair?>)</a> - 
														<a href="#" onclick="vote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '4')">Poor (<?=$vote_answer_poor?>)</a>
		<?php										}
													elseif($vote_answer != ""){
														if($vote_answer == 1){
		?>													<a href="#" onclick="unvote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '1', '<?=$id_vote_answer?>')">Not great (<?=$vote_answer_great?>)</a> - 
		<?php											} else{
		?>													<a href="#" onclick="vote_answer_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '1', '<?=$id_vote_answer?>')">Great (<?=$vote_answer_great?>)</a> - 
		<?php											}
														if($vote_answer == 2){
		?>													<a href="#" onclick="unvote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '2', '<?=$id_vote_answer?>')">Not good (<?=$vote_answer_good?>)</a> - 
		<?php											} else{
		?>													<a href="#" onclick="vote_answer_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '2', '<?=$id_vote_answer?>')">Good (<?=$vote_answer_good?>)</a> - 
		<?php											}
														if($vote_answer == 3){
		?>													<a href="#" onclick="unvote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '3', '<?=$id_vote_answer?>')">Not fair (<?=$vote_answer_fair?>)</a> - 
		<?php											} else{
		?>													<a href="#" onclick="vote_answer_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '3', '<?=$id_vote_answer?>')">Fair (<?=$vote_answer_fair?>)</a> - 
		<?php											}
														if($vote_answer == 4){
		?>													<a href="#" onclick="unvote_answer('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '4', '<?=$id_vote_answer?>')">Not poor (<?=$vote_answer_poor?>)</a>
		<?php											} else{
		?>													<a href="#" onclick="vote_answer_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_answer[answer_id]?>', '4', '<?=$id_vote_answer?>')">Poor (<?=$vote_answer_poor?>)</a>
		<?php											}
													}
//													<div id="vote"></div>
?>
