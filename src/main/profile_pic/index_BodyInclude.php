	<td align="left" VALIGN="top" width="80%"> 
	<?php //########################## middle sheet 2. Profile detail ####################### ?>

		<font size="5" color="#000000">
<?php		$SQL="SELECT * FROM social_iMing_customer_v3 where username='$own_body'";
            //$result=mysql_query($SQL);
            $db->query($SQL);
            //while($rs=mysql_fetch_array($result)) {
            while($rs=$db->fetchAssoc ()){
				if($friend != "")
					echo "<a href=\"".$_SERVER['PHP_SELF']."?friend=".$rs[username]."\">".$rs[name]."</a>";
				else
					echo "<a href=\"".$_SERVER['PHP_SELF']."\">".$rs[name]."</a>";
			}
?>
			<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
			<?php if($friend != "") { ?>
				<a href="<?=$rootpath?>main/profile_pic/choose_pic.php?friend=<?=$friend?>">My avatar</a>
			<?php }else{ ?>
				<a href="<?=$rootpath?>main/profile_pic/choose_pic.php">My avatar</a>
			<?php } ?>
          <br />
		</font>
		<br/>
		<?php //#################### End readme ###################### 
		
		include($rootpath."./main/profile_pic/upload.php");
		?>
	</td>
<br/>
