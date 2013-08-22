<?php
/*	 ########################## right sheet #######################	*/

			if($own_body == $friend && $_SESSION[su] != $friend){
?>				<!-- #################### Subscriber ###################### -->
				<font size="4" color="#000000">
				<?php

				  //find subscriber ?
				  $SQL3="select * FROM social_iMing_friends";
				  $result1=mysql_query($SQL3);
				  $returned_rows = mysql_num_rows ($result1);
				  $count_subscriber = 0;
				  while($rs=mysql_fetch_array($result1)) {
					if($rs[username]==$_SESSION[su] && $rs[fnd]==$friend) {//it is subscriber
						$count_subscriber = $count_subscriber+1;
					}
				  }
				  if($count_subscriber > 0) //it is subscriber
				  {
				?>
					<a href="<?=$rootpath?>main/text/comment_subscriber.php?&friend=<?php echo $friend; ?>&subscriber=2" onmouseover="window.status=''" onmouseout="window.status=''">untagging</a>

				<?php
				  }
				  else	//it is not subscriber
				  {
				?>
					<a href="<?=$rootpath?>main/text/comment_subscriber.php?&friend=<?php echo $friend; ?>&subscriber=1" >tagging</a>
				<?php
				  }
				?>
				</font>
<?php		}
?>
