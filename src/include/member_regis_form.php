<meta http-equiv='Content-Type' content='text/html; charset=windows-874'>


						<table width="480"  border="0" cellspacing="2" cellpadding="0" align="center">

                          <tr class="nortxt"> 
                            <td height="20" bgcolor="85d9e8" align="center"><b>Account Detail</b></td>
                          </tr>
                          <tr class="nortxt"> 
                            <td height="20"> 
                                <table width="98%" border="0" cellspacing="3" cellpadding="0">
                                  <tr class="nortxt"> 
                                    <td width="30%"><b>
                                        Username</b></td>
                                    <td> 
<? if (ereg("member_edit",$GLOBALS[REQUEST_URI], $array)) {
			echo $_SESSION[su];
} else {
?>
                                        <input name="username" type="text" class="nortxt" size="20"maxlength="15" value="<?=$username?>"> <font color="FF0000">*</font>
<? } ?>
                                      </td>
                                  </tr>
                                  <tr class="nortxt" bgcolor="85d9e8"> 
                                    <td><b>
                                        Password </b></td>
                                    <td>
                                        <input name="pass1" type="password" class="nortxt" size="20"maxlength="15" value="<?=$pass1?>"> <font color="FF0000">* <?=$msg1?></font>
                                      </td>
                                  </tr>
                                  <tr class="nortxt"> 
                                    <td><b>
                                        Comfirm password</b></td>
                                    <td>
                                        <input name="pass2" type="password" class="nortxt" size="20"maxlength="15" value="<?=$pass2?>"> <font color="FF0000">* <?=$msg2?></font>
                                      </td>
                                  </tr>
                                </table>
                              </div></td>
                          </tr>
                          <tr class="nortxt"> 
                            <td height="20" bgcolor="85d9e8" align="center">
                                <b>Persenal Detail</b>
                              </td>
                          </tr>
                          <tr class="nortxt"> 
                            <td height="20">
                                <table width="98%" border="0" cellspacing="3" cellpadding="0">
                                  <tr class="nortxt" bgcolor="75d1f8"> 
                                    <td width="32%"><b>
                                        Name - Surname</b></td>
                                    <td width="68%"> 
                                        <input name="name" type="text" class="nortxt" size="30" value="<?=$name?>" maxlength="50"> <font color="FF0000">*</font>
                                      </td>
                                  </tr>
<?php /*
                                  <tr class="nortxt"> 
                                    <td><b>
                                        ���ʡ�� </b></td>
                                    <td>
                                        <input name="lastname" type="text" class="nortxt" size="30" value="<?=$lastname?>" maxlength="50"> <font color="FF0000">*</font>
                                      </td>
                                  </tr>
*/ ?>
                                  <tr class="nortxt" bgcolor="75d1f8"> 
                                    <td><b>
                                        Gender </b></td>
                                    <td>
                                        <input name="sex" type="radio" class="nortxt" value="m" <? if($sex=="m") echo "checked"; ?>> Male <input name="sex" type="radio" class="nortxt" value="f" <?php if($sex=="f") echo "checked"; ?>> Female <font color="FF0000">*</font>
                                      </td>
                                  </tr>
<?php /*                                  <tr class="nortxt"> 
                                    <td><b>
                                        �Ţ�ѵû�ЪҪ�</b></td>
                                    <td>
                                        <input name="nation_id" type="text" class="nortxt" size="30" value="<?=$nation_id?>" maxlength="14">
                                      </td>
                                  </tr>
*/ ?>
                                  <tr class="nortxt" bgcolor="75d1f8">
                                    <td><b>
                                        Birthdate </b></td>
                                    <td>Date
								  <select name="birth_date">
									<option value="1" <? if($birth_date=="1") echo "selected"; ?>>1</option>
									<option value="2" <? if($birth_date=="2") echo "selected"; ?>>2</option>
									<option value="3" <? if($birth_date=="3") echo "selected"; ?>>3</option>
									<option value="4" <? if($birth_date=="4") echo "selected"; ?>>4</option>
									<option value="5" <? if($birth_date=="5") echo "selected"; ?>>5</option>
									<option value="6" <? if($birth_date=="6") echo "selected"; ?>>6</option>
									<option value="7" <? if($birth_date=="7") echo "selected"; ?>>7</option>
									<option value="8" <? if($birth_date=="8") echo "selected"; ?>>8</option>
									<option value="9" <? if($birth_date=="9") echo "selected"; ?>>9</option>
									<option value="10" <? if($birth_date=="10") echo "selected"; ?>>10</option>
									<option value="11" <? if($birth_date=="11") echo "selected"; ?>>11</option>
									<option value="12" <? if($birth_date=="12") echo "selected"; ?>>12</option>
									<option value="13" <? if($birth_date=="13") echo "selected"; ?>>13</option>
									<option value="14" <? if($birth_date=="14") echo "selected"; ?>>14</option>
									<option value="15" <? if($birth_date=="15") echo "selected"; ?>>15</option>
									<option value="16" <? if($birth_date=="16") echo "selected"; ?>>16</option>
									<option value="17" <? if($birth_date=="17") echo "selected"; ?>>17</option>
									<option value="18" <? if($birth_date=="18") echo "selected"; ?>>18</option>
									<option value="19" <? if($birth_date=="19") echo "selected"; ?>>19</option>
									<option value="20" <? if($birth_date=="20") echo "selected"; ?>>20</option>
									<option value="21" <? if($birth_date=="21") echo "selected"; ?>>21</option>
									<option value="22" <? if($birth_date=="22") echo "selected"; ?>>22</option>
									<option value="23" <? if($birth_date=="23") echo "selected"; ?>>23</option>
									<option value="24" <? if($birth_date=="24") echo "selected"; ?>>24</option>
									<option value="25" <? if($birth_date=="25") echo "selected"; ?>>25</option>
									<option value="26" <? if($birth_date=="26") echo "selected"; ?>>26</option>
									<option value="27" <? if($birth_date=="27") echo "selected"; ?>>27</option>
									<option value="28" <? if($birth_date=="28") echo "selected"; ?>>28</option>
									<option value="29" <? if($birth_date=="29") echo "selected"; ?>>29</option>
									<option value="30" <? if($birth_date=="30") echo "selected"; ?>>30</option>
									<option value="31" <? if($birth_date=="31") echo "selected"; ?>>31</option>
								</select>
								Month
								  <select name="birth_month">
									<option value="1" <? if($birth_date=="1") echo "selected"; ?>>Jan</option>
									<option value="2" <? if($birth_date=="2") echo "selected"; ?>>Feb</option>
									<option value="3" <? if($birth_date=="3") echo "selected"; ?>>Mar</option>
									<option value="4" <? if($birth_date=="4") echo "selected"; ?>>Apr</option>
									<option value="5" <? if($birth_date=="5") echo "selected"; ?>>May</option>
									<option value="6" <? if($birth_date=="6") echo "selected"; ?>>Jun</option>
									<option value="7" <? if($birth_date=="7") echo "selected"; ?>>Jul</option>
									<option value="8" <? if($birth_date=="8") echo "selected"; ?>>Aug</option>
									<option value="9" <? if($birth_date=="9") echo "selected"; ?>>Sep</option>
									<option value="10" <? if($birth_date=="10") echo "selected"; ?>>Oct</option>
									<option value="11" <? if($birth_date=="11") echo "selected"; ?>>Nov</option>
									<option value="12" <? if($birth_date=="12") echo "selected"; ?>>Dec</option>
								</select>
								Year
								  <select name="birth_year">
								  <?
								  $date=getdate();
								  for($x=0;$x<100;$x++) {
									  $i=$date[year]-$x;
									  //line below use when you want a Buddhist era year
									  //$j=$date[year]-$x+543;
									 ?>
									<option value="<?=$i?>" <? if($birth_year==$i) echo "selected"; ?>><?=$i?></option>
								<?
								  }
								?>
								  </select> <font color="FF0000">*</font>
									</td>
                                  </tr>


                                  <tr class="nortxt" bgcolor="75d1f8"> 
                                    <td><b>
                                        E-mail </b></td>
                                    <td>
                                        <input name="email" type="text" class="nortxt" size="30" value="<?=$email?>" maxlength="50"> <font color="FF0000">*</font>
                                      </td>
                                  </tr>
<?php /*                                  <tr class="nortxt" bgcolor="111111"> 
                                    <td><b>
                                        ���Ѿ��</b></td>
                                    <td>
                                        <input name="phone" type="text" class="nortxt" size="30" value="<?=$phone?>" maxlength="30"><font color="FF0000">*</font>
                                      </td>
                                  </tr>
*/ ?>
                                  <tr class="nortxt" bgcolor="75d1f8"> 
                                    <td><b>
                                        Address </b></td>
                                    <td>
                                        <input name="address" type="text" class="nortxt" size="30" value="<?=$address?>" maxlength="200"> <font color="FF0000">*</font>
                                      </td>
                                  </tr>
<?php /*                                  <tr class="nortxt" bgcolor="111111"> 
                                    <td><b>
                                        �Ҫվ </b></td>
                                    <td>
								  <select name="occupation">
									<option>  -- ���͡�Ҫվ --  </option>
									<option value="�ѡ���¹" <? if($occupation=="�ѡ���¹") echo "selected"; ?>>�ѡ���¹</option>
									<option value="���Ե/�ѡ�֡��" <? if($occupation=="���Ե/�ѡ�֡��") echo "selected"; ?>>���Ե/�ѡ�֡��</option>
									<option  value="��ѡ�ҹ����ѷ" <? if($occupation=="��ѡ�ҹ����ѷ") echo "selected"; ?>>��ѡ�ҹ����ѷ</option>
									<option value="��ѡ�ҹ�Ѱ����ˡԨ" <? if($occupation=="��ѡ�ҹ�Ѱ����ˡԨ") echo "selected"; ?>>��ѡ�ҹ�Ѱ����ˡԨ</option>
									<option value="����Ҫ���" <? if($occupation=="����Ҫ���") echo "selected"; ?>>����Ҫ���</option>
									<option value="���/����ҹ" <? if($occupation=="���/����ҹ") echo "selected"; ?>>���/����ҹ</option>
									<option value="��Ңͧ�Ԩ���" <? if($occupation=="��Ңͧ�Ԩ���") echo "selected"; ?>>��Ңͧ�Ԩ���</option>
									<option value="���³" <? if($occupation=="���³") echo "selected"; ?>>���³</option>
									<option value="�����ӧҹ" <? if($occupation=="�����ӧҹ") echo "selected"; ?>>�����ӧҹ</option>
									<option value="����" <? if($occupation=="����") echo "selected"; ?>>����</option>
								  </select> <font color="FF0000">*</font>
									</td>
                                  </tr>
*/ ?>
                                  <tr class="nortxt"> 
                                    <td></td>
                                    <td>
                                        &nbsp;
                                      </td>
                                  </tr>
                                  <tr class="nortxt" bgcolor="6cb3f6"> 
                                    <td colspan="2" align="center">
                                        <input type="submit" value=" -- OK -- ">
                                      </td>
                                  </tr>
         
                              </table></td>
                          </tr>
                          <tr class="nortxt"> 
                            <td height="20">&nbsp;</td>
                          </tr>
                          <tr class="nortxt"> 
                            <td height="20"></td>
                          </tr>
                        </table>
