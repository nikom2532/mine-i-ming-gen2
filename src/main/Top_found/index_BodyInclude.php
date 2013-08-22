	<td align="center" VALIGN="top" width="80%">
<?php
	if($fn == "index"){
?>

	<br><br><br>
	<img src="<?=$rootpath?>images/Top_search.png">
	<br><br><BR>

	<table border="0" width="70%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
		<form  id="search_form" action="<?=$_SERVER['PHP_SELF']?>?fn=search" method="POST" >
			<tr>
				<td style="text-align: center;">

					<textarea type="search" name="keyword" onKeyPress="return submitenter(this,event)" style="border: 1px solid #d2dae7; resize: none; width:500px; height:20px ;" placeholder="Search any answers wish you want to know"></textarea>
<?php /*			<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
*/?>
					<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/enter_is_submit.js"></script>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					<input type="submit" value="search" />
				</td>
			</tr>
		</form>
	</table>

<?php
	} // end fn==index
	elseif($fn == "search"){
		$keyword = $_POST["keyword"];
?>
	<?php //############################### headbar search ###############################?>
	<table border="0" width="100%" align="center" VALIGN="top" style="table-layout: fixed;" cellpadding="0" cellspacing="0">
		<col width="30%">
		<col width="2%">
		<col width="48%">
		<col width="20%">
		<form  id="search_form" action="<?=$_SERVER['PHP_SELF']?>?fn=search" method="POST" >
		<tr>
			<td style="text-align: right;" >
				<img src="<?=$rootpath?>images/Top_search.png" width="100%">
			</td>
			<td style="text-align: left;" >
			</td>
			<td style="text-align: left;" >
				<textarea type="search" name="keyword" onKeyPress="return submitenter(this,event)" style="border: 1px solid #d2dae7; resize: none; width:350px; height:20px ;" placeholder="Search any answers wish you want to know"><?=$keyword?></textarea>
<?php /*		<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/jquery.textarea.autoresize.js"></script>
*/?>
				<script type="text/javascript" src="<?=$rootpath?>include/js/textarea/enter_is_submit.js"></script>
			</td>
			<td style="text-align: left;" >
				<input type="submit" value="search" />
			</td>
		</tr>
		</form>
	</table>

	<?php //############################### body search ###############################?>
	<table border="0" align="left" VALIGN="top" style="table-layout: fixed;" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height: 20px">
			</td>
		</tr>
		<tr>
			<td style="text-align: center;" width="100%" colspan="2">
<?php			$sql_comm = "
				SELECT *
				FROM `social_iMing_comment`
				WHERE `comment_text` LIKE '%".$keyword."%'
				ORDER BY `post_time` DESC
				LIMIT 0 , 30
				";
				$result_comm = mysql_query($sql_comm);
				$num=mysql_num_rows($result_comm);
				$return_rows_thattime = 0;
				while($rs_comm = mysql_fetch_array($result_comm)){
?>					<table border="0" align="left" VALIGN="top" width="450" cellpadding="2" cellspacing="0">
<?php				if($return_rows_thattime % 2 == 1)
					{
?>						<tr class="table_comment" style="text-align: center">
<?php				}
					else{
?>						<tr style="text-align: center">
<?php				}
						$return_rows_thattime++;
?>							<td VALIGN="top" style="text-align: left; width: 50;">
<?php							$url = "";
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
									echo "<a href=\"".$rootpath."main/text/index.php?friend=".$rs_comm[username_from]."\">".
										 "<img width='50' height='50' src=\"".$rootpath."images/profile_picture/"
										 .$url."\"></a>";
								}
								else{
									echo "<a href=\"".$rootpath."main/text/index.php?friend=".$rs_comm[username_from]."\">".
										 "<img width='50' height='50' src=\"".$rootpath."images/profile3.png\">"
										 ."</a>";
								}
?>							</td>
							<td VALIGN="top" style="text-align: left; width: 400;">
								<table border="0" align="center" VALIGN="top" width="100%" cellpadding="2" cellspacing="2">
									<tr style="text-align: center"> 
										<td VALIGN="top" style="text-align: left" width="80">
											<a href="<?=$rootpath?>main/text/index.php?friend=<?=$rs_comm[username_from]?>"><?=$rs_comm[username_from]?></a>
										</td>
										<td VALIGN="top" style="text-align: left" width="320">
											<?=$rs_comm[post_time]?>
						  				</td>
									</tr>
									<tr style="text-align: center">
										<td VALIGN="top" style="text-align: left" width="400" colspan="2">
<?php									//	we use strlen(~str~) to count string, substr(~str~ , start from, number) to cut the string
											for($ii=0;$ii<strlen($rs_comm[comment_text]);$ii=$ii+55)
											{
												echo substr($rs_comm[comment_text],$ii,55)."<br>";
											}
?>										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
<?php
				}
?>
			</td>
		</tr>
	</table>

<?php
	} // end fn==search
?>
	</td>
