                                  </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td> <TABLE width="98%" border=0 align="center" cellPadding=0 cellSpacing=1>
                    <TBODY>
                    </TBODY>
                  </TABLE></td>
              </tr>
              <tr> 
                <td height="10"><img src="<?=$rootpath?>images/space.gif" width="8" height="10"></td>
              </tr>
              <tr> 
                <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td background="<?=$rootpath?>images/bo_line.gif"><img src="<?=$rootpath?>images/bo_line.gif" width="53" height="3"></td>
                    </tr>
                    <tr>        
                      <td height="5"><img src="<?=$rootpath?>images/space.gif" width="15" height="5"></td>
                    </tr>

                    <tr> 
                      <td height="40" class="grlink">
						<div align="center">
						  <span class="grtxt">
                            <br>
						  <font size="2" color="#666666">
							Copyright &copy; 2012, by 
							<a href="http://www.i-ming.com/nikom2532" target="_blank">Arming Huang</a>
							All rights reserved.
							<br>
							i-Ming is a beta version. We will be avalable soon!
						  </font>
						  <br><br><br>
                        </div></td>     
                    </tr>
                      
                  </table></td>
              </tr>
            </table></td>
          <td width="7"  bgcolor="dfdfdf"></td>
        </tr>
      </table></td>
  </tr>
</table>


<?php //################################# for head account ###############################?>
<div class="index_head_position2">
	<table width='3000' border='0' align='center' cellpadding='0' cellspacing='0'>
	  <tr>
		<td width='1000' bgcolor="#b3e6ed">
		</td>
		<td width='1000'>
		<table width='100%' border='0' cellspacing='0' cellpadding='0'>
		  <tr> 
		     <td bgcolor="#b3e6ed">
				<a href="./<?=$rootpath?>main/Top_found/?fn=index" >
<?php /*			<img src="<?=$rootpath?>images/logo v.4.0.png" width="100">			*/ ?>
				<div style="background-image:url('<?=$rootpath?>images/logo%20v.4.0.png'); background-repeat:no-repeat; background-position:right top; background-size:100px 35px; -moz-background-size:100px 35px; /* Firefox 3.6 */ ; text-align: center; width: 100px; height: 35px; "></div>
				</a>
			</td>

		     <td height='30' bgcolor="#b3e6ed">

				<font color="#333333">

			 <table width='100%' border='0' cellspacing='0' cellpadding='0'>
		  <tr>
	<?
	if($_SESSION[su]!="") {
		echo "<td class='nortxt' align='center' width='150'><b>Welcome</b> <img src='".$rootpath."images/arr.gif' width='12' height='8'> <a href='$rootpath' > $_SESSION[su] </a> </td><td class='wlink' align='center' width='200'> <a href='".$rootpath."member_edit.php'>Account/Change password</a> </td><td class='nortxt' align='center' width='80'> <a href='".$rootpath."logout.php'><img src='".$rootpath."images/bu_log2.gif' width='53' height='19' border='0'></a></td>";

	} else {
		echo "<form name='login' action='".$rootpath."index.php' method='post'><input type='hidden' name='self' value='$GLOBALS[PHP_SELF]'><td class='nortxt'><div align='right'>Login name".
		        "</div></td>".
		      "<td class='nortxt'><div align='center'>".
		          "<input type='text' name='username' maxlength='15' size='20'>".
		        "</div></td>".
		      "<td class='nortxt'><div align='center'>".
		          "<p>password</p>".
		        "</div></td>".
		      "<td class='nortxt'><input type='password' name='password' maxlength='100' size='20'></td>".
		      "<td class='nortxt'><input type='submit' value='Login'></td></form><form action='".$rootpath."member_regis.php' method='post'>";
	}
	?>
			<td class='nortxt'><span id="tP">&nbsp;</span>
					<script type="text/javascript">
						function tS(){ x=new Date(); x.setTime(x.getTime()); return x; } 
						function lZ(x){ return (x>9)?x:'0'+x; } 
						function tH(x){ if(x==0){ x=12; } return (x>12)?x-=12:x; } 
						function y4(x){ return (x<500)?x+1900:x+543; } 
						function dT(){ window.status=''+eval(oT)+'';  document.getElementById('tP').innerHTML=eval(oT); setTimeout('dT()',1000); } 
						function aP(x){ return (x>11)?'PM':'AM'; } var dN=new Array('Sunday ','Monday ','Tuesday ','Wednesday','Thursday','Friday','Saturday'),mN=new Array('Janurary','February','March','April','May','June','July','August','September','October','November','December'),oT="tS().getDate()+' '+mN[tS().getMonth()]+' '+y4(tS().getYear())+' '+' '+lZ(tS().getHours())+':'+lZ(tS().getMinutes())+':'+lZ(tS().getSeconds())+' '+aP(tS().getHours())";
						if(!document.all){ window.onload=dT; }else{ dT(); }
					</script></td>

			<?php
			if($_SESSION[su]!="") {
				// ***** search friends *****
			?>
			<td>
			<form name="search" action="<?=$rootpath?>main/search/index.php" method="GET">
			  <input name="keyword" type="search" value="<?php print $friend; ?>">
			  <input type="submit" value="search">
			</form>
			</td>
			<?php
			}
			?>
		    </tr>
		  </table>		 
			</td>
		  </tr>
		</table>
		</td>
		<td width='1000' bgcolor="#b3e6ed">
		</td>
	  </tr>
	  
	</table>
</div>
<?php //################################# end for head account ###############################?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-42040608-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
