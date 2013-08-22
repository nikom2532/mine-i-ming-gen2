
	<?php //########################## middle sheet ####################### ?>
	<td align="left" VALIGN="top" width="55%">
	<font color="orange" size="5"><b>Tagger search</b></font>
	<br><br>
	<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
<?php	$sql="
		SELECT * 
		FROM `social_iMing_customer_v3` 
		WHERE `username` LIKE '%$keyword%'
		";
		$result = mysql_query($sql);
		$num=mysql_num_rows($result);
		$return_rows_thattime = 0;
		while($rs = mysql_fetch_array($result)){

			if($return_rows_thattime % 2 == 1)
			{
?>
				<tr style="text-align: center">
<?php		}else{	?>	
				<tr class="table_comment" style="text-align: center">
<?php		}
			$return_rows_thattime++;
?>				<td VALIGN="top" style="text-align: center;" width="12%">
<?php				
					$url = "";
					$sql_pic = "SELECT url FROM social_iMing_images WHERE username='$rs[username]' AND image_album = 'Profile Pictures'";
					$result_pic = mysql_query($sql_pic);
					$return_rows_pic = mysql_num_rows($result_pic);
					while($rs_pic=mysql_fetch_array($result_pic))
					{
						$url = $rs_pic[url];
					}
					if($url != ""){							/*  $_SERVER['PHP_SELF']  */
						echo "<a href=\"".$rootpath."main/text/?friend=".$rs[username]."\">".
							 "<img width='50' height='50' src=\"".$rootpath."images/profile_picture/"
							 .$url."\"></a>";
					}
					else{
						echo "<a href=\"".$rootpath."main/text/?friend=".$rs[username]."\">".
							 "<img width='50' height='50' src=\"".$rootpath."images/profile3.png\">"
							 ."</a>";
					}
?>				</td>
				<td VALIGN="top" style="text-align: left;" width="73%">
					<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
						<tr>
							<td VALIGN="top" style="text-align: left;" width="100%">
<?php							echo "<a href=\"".$rootpath."main/text/?friend=".$rs[username]."\">".$rs[username]."</a> (";
								echo $rs[name].") ";

?>							</td>
						</tr>
						<tr>
							<td VALIGN="top" style="text-align: left;" width="100%">
								sex: 
<?php
								if($rs["sex"] == "m")
									echo " Male ";
								elseif($rs["sex"] == "f")
									echo " Female ";
?>
							</td>
						</tr>
<?php
						$sql_me = "SELECT * FROM `social_iMing_customer_info` where `username` = '".$rs["username"]."' ;";
						$result_me=mysql_query($sql_me);
						if($rs_me=mysql_fetch_array($result_me)) {
?>
							<tr>
								<td VALIGN="top" style="text-align: left;" width="100%">
<?php
										if($rs_me["intro"] != "")
											echo "About Her".substr($rs_me["intro"],0,100)."...";
?>
								</td>
							</tr>
<?php
						}
?>
					</table>
				</td>
				<td VALIGN="top" style="text-align: left;" width="15%">
<?php		//		$own_body = $rs[username];
			//		include($rootpath."include/body_right_subscribe.php");
			//		$own_body = $_SESSION[su];
			echo	$own_body;
			echo		$friend = $rs["username"];
					include($rootpath."include/body_right_subscribe.php");
?>
				</td>
			</tr>
<?php	}
?>	</table>
	</td>


	<td align="center" VALIGN="top" width="25%"> 
	<?php //########################## right sheet ####################### ?>



	</td>
