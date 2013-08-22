<?php										//count vote
											$sql_vote = "
											SELECT `username_from`, `comment_id`, `vote`, `post_time`
											FROM `social_iMing_vote_comment` 
											WHERE `comment_id`= '$rs_comm[comment_id]'
											";
											$result_vote = mysql_query($sql_vote);
											$return_rows_vote = mysql_num_rows($result_vote);
											$vote_great=0;
											$vote_good=0;
											$vote_fair=0;
											$vote_poor=0;
											$vote_count=0;
											$score=0;
											while($rs_vote=mysql_fetch_array($result_vote)){
												if($rs_vote[vote] == 1){
													$vote_great++;
													$score+=4;
												}
												elseif($rs_vote[vote] == 2){
													$vote_good++;
													$score+=3;
												}
												elseif($rs_vote[vote] == 3){
													$vote_fair++;
													$score+=2;
												}
												elseif($rs_vote[vote] == 4){
													$vote_poor++;
													$score+=1;
												}
												$vote_count++;
											}
											//check vote
											$sql_vote = "
											SELECT `id`, `username_from`, `comment_id`, `vote`, `post_time`
											FROM `social_iMing_vote_comment` 
											WHERE `comment_id`= '$rs_comm[comment_id]'
											AND `username_from` = '$_SESSION[su]'
											";
											$result_vote = mysql_query($sql_vote);
											$return_rows_vote = mysql_num_rows($result_vote);
											$vote="";
											$id_vote="";
											while($rs_vote=mysql_fetch_array($result_vote)){
												if($rs_vote[vote] == 1){
													$vote = $rs_vote[vote];
													$id_vote = $rs_vote[id];
												}
												elseif($rs_vote[vote] == 2){
													$vote = $rs_vote[vote];
													$id_vote = $rs_vote[id];
												}
												elseif($rs_vote[vote] == 4){
													$vote = $rs_vote[vote];
													$id_vote = $rs_vote[id];
												}
												elseif($rs_vote[vote] == 3){
													$vote = $rs_vote[vote];
													$id_vote = $rs_vote[id];
												}
											}
											if($vote_count != 0){
												$score = ($score / ($vote_count*4))*100;
											}
											else{
												$score = 0;
											}

?>											Score votes: <?php if($score==0) echo "0%"; else echo $score."%"; ?><br>
											Vote: 
<?php										if($vote == "") {
?>												<a href="#" onclick="vote('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '1')">Great (<?=$vote_great?>)</a> - 
												<a href="#" onclick="vote('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '2')">Good (<?=$vote_good?>)</a> - 
												<a href="#" onclick="vote('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '3')">Fair (<?=$vote_fair?>)</a> - 
												<a href="#" onclick="vote('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '4')">Poor (<?=$vote_poor?>)</a>
<?php										}
											elseif($vote != ""){
												if($vote == 1){
?>													<a href="#" onclick="unvote('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '1', '<?=$id_vote?>')">Not great (<?=$vote_great?>)</a> - 
<?php											} else{
?>													<a href="#" onclick="vote_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '1', '<?=$id_vote?>')">Great (<?=$vote_great?>)</a> - 
<?php											}
												if($vote == 2){
?>													<a href="#" onclick="unvote('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '2', '<?=$id_vote?>')">Not good (<?=$vote_good?>)</a> - 
<?php											} else{
?>													<a href="#" onclick="vote_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '2', '<?=$id_vote?>')">Good (<?=$vote_good?>)</a> - 
<?php											}
												if($vote == 3){
?>													<a href="#" onclick="unvote('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '3', '<?=$id_vote?>')">Not fair (<?=$vote_fair?>)</a> - 
<?php											} else{
?>													<a href="#" onclick="vote_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '3', '<?=$id_vote?>')">Fair (<?=$vote_fair?>)</a> - 
<?php											}
												if($vote == 4){
?>													<a href="#" onclick="unvote('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '4', '<?=$id_vote?>')">Not poor (<?=$vote_poor?>)</a>
<?php											} else{
?>													<a href="#" onclick="vote_update('<?=$rootpath?>', '<?=$friend?>', '<?=$rs_comm[comment_id]?>', '4', '<?=$id_vote?>')">Poor (<?=$vote_poor?>)</a>
<?php											}
											}
?>											<div id="vote"></div>
