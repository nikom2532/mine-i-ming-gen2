<?

$rootpath ="../../";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}
$focus=1;

	//---- initial GET
	$friend = $_GET["friend"];
	$subscriber = $_GET["subscriber"];

	//#### initial values
	$menu1 = "info";

	include($rootpath."include/index_head.php");

	//check login
	if($_SESSION[su]!="")
	{
?>

<font size="3" color="#000000">
<br>

<div class="bodytext">

<!--####################### Profile ####################-->

<table border="0" width="100%" align="center" VALIGN="top" cellpadding="0" cellspacing="0">
  <tr>

	<!-- ######################### Left slide 1. Profile picture ######################## -->
	<td align="center" VALIGN="top" width="20%">
		<?php
			if($friend != ""){
				$own_body = $friend;
			}
			else $own_body = $_SESSION[su];
			include($rootpath."include/body_Left_slide.php");
		?>
	</td>

	<!-- ########################## middle sheet ####################### -->
	<td align="left" VALIGN="top" width="55%">

		<!-- ################### top middle (profile name) ################## -->
		<font size="5" color="#000000">
          <?php
            $SQL="SELECT * FROM social_iMing_customer_v3 where username='$own_body'";
            $result=mysql_query($SQL);
            while($rs=mysql_fetch_array($result)) {
				if($friend != "")
					echo "<a href=\"".$rootpath."main/text/?friend=".$rs[username]."\">".$rs[name]."</a>";
				else
					echo "<a href=\"".$rootpath."main/text/\">".$rs[name]."</a>";
			}
          ?>
			<img width="20" height="20" src="<?php echo $rootpath; ?>images/arr3.png">
			<?php if($friend != "") { ?>
				<a href="<?=$rootpath?>main/my_info/?friend=<?=$friend?>">Infomation</a>
			<?php }else{ ?>
				<a href="<?=$rootpath?>main/my_info/">Infomation</a>
			<?php } ?>	
          <br />
		</font>
		<br />
		<!-- ################### middle middle (info) ################## -->
		<table border="0" width="100%" align="center" VALIGN="top" cellpadding="2" cellspacing="2">
		  <tr>
			<td align="right" VALIGN="top" width="30%">
				Views :
			</td>
			<td align="left" VALIGN="top" width="70%">
				<?php
					$SQL="SELECT * FROM social_iMing_customer_counts where username='$own_body'";
					$result=mysql_query($SQL);
					while($rs=mysql_fetch_array($result)) {
						echo $rs[views];
					}
				?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
				Comments :
			</td>
			<td align="left" VALIGN="top" width="70%">
				<?php
				/*
			    $SQL="SELECT * FROM social_iMing_customer_counts where username='$own_body'";
			    $result=mysql_query($SQL);
			    while($rs=mysql_fetch_array($result)) {
					echo $rs[comments];
				}
				*/
				?>
			  <?php
				  $view_count = 0;
				  $SQL_comment = "select * from social_iMing_comment where username='$own_body' ORDER BY `post_time` DESC";
				  $result_comm = mysql_query($SQL_comment);
				  while($rs_comm = mysql_fetch_array($result_comm))
				  {
					$view_count++;
				  }
				  echo $view_count;
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
			  <?php
			    $SQL="SELECT * FROM social_iMing_customer_v3 where username='$own_body'";
			    $result=mysql_query($SQL);
			    while($rs=mysql_fetch_array($result)) {
			  ?>
			  Full name : 
			</td>
			<td align="left" VALIGN="top" width="70%">
			  <?php
			      echo $rs[name];
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
			  Sex : 
			</td>
			<td align="left" VALIGN="top" width="70%">
			  <?php
			      if($rs[sex] == 'm')
			        echo "male";
			      else if($rs == 'f')
			        echo "male";
			      else{ echo "unknown"; }
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
			  birthday : 
			</td>
			<td align="left" VALIGN="top" width="70%">
			  <?php
//			      echo $rs[birthday];
				  echo date('F d, Y', strtotime($rs[birthday]));
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
			  E-Mail : 
			</td>
			<td align="left" VALIGN="top" width="70%">
			  <?php
			      echo $rs[email];
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
			  Address : 
			</td>
			<td align="left" VALIGN="top" width="70%">
			  <?php
			      echo $rs[address];
				}
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
				Hometown :
			</td>
			<td align="left" VALIGN="top" width="70%">
			  <?php
			    $sql="SELECT * FROM social_iMing_customer_info where username='$own_body'";
			    $result=mysql_query($sql);
			    while($rs=mysql_fetch_array($result)) {
					if($rs[Hometown] != "")
						echo $rs[Hometown];
					else{ echo "-"; }
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
				Religion :
			</td>
			<td align="left" VALIGN="top" width="70%">
			  <?php
					if($rs[Religion] != "")
						echo $rs[Religion];
					else{ echo "-"; }
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
				Languages :
			</td>
			<td align="left" VALIGN="top" width="70%">
			  <?php
					if($rs[Languages] != "")
						echo $rs[Languages];
					else{ echo "-"; }
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
				intro :
			</td>
			<td align="left" VALIGN="top" width="70%">
			  <?php
					if($rs[intro] != "")
						for($ii=0;$ii<strlen($rs[intro]);$ii=$ii+55){
							echo substr($rs[intro],$ii,60)."<br>";
						}
					else{ echo "-"; }
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="right" VALIGN="top" width="30%">
				web :
			</td>
			<td align="left" VALIGN="top" width="70%">
			  <?php
					if($rs[web] != "")
						echo "<a href=\"".$rs[web]."\" target=\"_blank\">".$rs[web]."</a>";
					else{ echo "-"; }
				}
			  ?>
			</td>
		  </tr>
		</table>


	</td>
	<td align="center" VALIGN="top" width="25%"> 
	<!-- ########################## right sheet ####################### -->
		<a href="<?=$rootpath?>main/my_info/editprofile.php?edit=info">edit profile</a>
	</td>
  </tr>
</table>

</div>

</font>

<?
include($rootpath."include/index_bottom.php");
mysql_close();
}	//end check login
?>
