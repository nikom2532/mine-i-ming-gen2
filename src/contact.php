<?php
  //print $_SESSION;
  //if($_SESSION)
    header ("location: ../aboutme");
?>


<!-- Cancel below !!!-->
<?
$rootpath ="";
session_start();
require_once($rootpath."lib/func_date.php");
require_once($rootpath."lib/DB.php");
require_once($rootpath."lib/conn.inc.php");
if (!$db->open()){
	die($db->error());
}



$focus=3;
include($rootpath."include/index_head.php");
?>
<?php	//check login
	if($_SESSION[su]!="")
	{
?>
<font size ="+5" color="#000000">
<table border="0" width="400" align="center">
  <tr class="nortxt">
    <td colspan="2">
      <br>
      <b>Who are we?</b><br><br>
    </td>
  </tr>
  <tr class="nortxt"><td>
  <img src="<?=$rootpath?>images/SSL10858[4-2].jpg" ALT="iMing" width="200" height="177.92869269949066213921901528014" BORDER="0"><br><br></td>
  <td VALIGN="top">
  <Br> Arming Huang
  </td>
  </tr>
  <tr class="nortxt"><td>
  
  <td>
  <br><br>
  </td>
  </tr>
  
  <tr class="nortxt"><td><br><br></td>
  <td>
 
  </td>
  </tr>
  
  <tr class="nortxt"><td>
 
  <td>
  <br><br>
  </td>
  </tr>
  
  <tr class="nortxt"><td><br><br></td>
  <td>

  </td>
  </tr>

</table>
</font>



<?
include($rootpath."include/index_bottom.php");
	}	//end check login
//mysql_close();
?>