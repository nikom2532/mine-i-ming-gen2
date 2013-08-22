function show_answer_comment_fn(rootpath, own_body, comment_id, imageMyself, url, username_from, post_time, comment_text)
{
	var str = "";
	str = str+ "<div class='alpha_background'>";
	str = str+ "</div>";
	str = str+ "<div class='comment_answer_css'>";
	str = str+ "<table border=\"0\" align=\"center\" VALIGN=\"top\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">";
	str = str+ "	<tr style=\"text-align: center\">";
	str = str+ "		<td VALIGN=\"top\" style=\"text-align: left\" width=\"50\">";
	if(url != ""){
		str = str+ "		<img width='50' height='50' src='"+rootpath+"images/profile_picture/"+url+"'>";		
	}else{
		str = str+ "		<img width='50' height='50' src='"+rootpath+"images/profile3.png'>";		
	}
	str = str+ "		</td>";
	str = str+ "		<td VALIGN=\"top\" style=\"text-align: left;\" width=\"350\">";
	str = str+ "			<table border=\"0\" align=\"center\" VALIGN=\"top\" width=\"100%\" cellpadding=\"2\" cellspacing=\"2\">";
	str = str+ "				<tr style=\"text-align: center\";> ";
	str = str+ "				  <td VALIGN=\"top\" style=\"text-align: left;\" width=\"80\">";
	str = str+ "					<a href=\""+rootpath+"comment.php?friend="+username_from+"\">"+username_from+"</a>";
	str = str+ "				  </td>";

	str = str+ "				  <td VALIGN=\"top\" style=\"text-align: left;\" width=\"300\">";
	str = str+ "					ask on "+post_time;
	str = str+ "		  		  </td>";
	str = str+ "				</tr>";
	str = str+ "				<tr style=\"text-align: center\">";
	str = str+ "				  <td VALIGN=\"top\" style=\"text-align: left;\" width=\"400\" colspan=\"2\">";
/*
									var ii=0;
									for(ii = 0; ii < comment_text.length(); ii = ii+55)
									{
	str = str							+ comment_text.substr('ii', '55')+"<br>";
									}
*/
	str = str+ "					"+comment_text;
	str = str+ "				  </td>";
	str = str+ "				</tr>";
	str = str+ "			</table>";
	str = str+ "		</td>";
	str = str+ "	</tr>";
	str = str+ "	<tr style=\"text-align: center\">";
	str = str+ "		<td VALIGN=\"top\" style=\"text-align: left\" width=\"50\">";

	if(imageMyself != ""){
		str = str+ "		<img width='50' height='50' src='"+rootpath+"images/profile_picture/"+imageMyself+"'>";		
	}else{
		str = str+ "		<img width='50' height='50' src='"+rootpath+"images/profile3.png'>";		
	}
	str = str+ "		</td>";
	str = str+ "		<td VALIGN=\"top\" style=\"text-align: left\" width=\"350\">";
	str = str+ "			<form name=\"form1\" action=\""+rootpath+"main/text/comment_delete.php\" method=\"POST\">";
	str = str+ "				<script type='text/javascript' src='./include/js/textarea/jquery.textarea.autoresize.js'></script>";
	str = str+ "					<textarea class=\"answer_comment\" name=\"answer_comment\" maxlength=\"2000\" placeholder=\"post your answer here\" style=\"border: 1px solid #d2dae7; resize: none;\"></textarea>";
	str = str+ "				";
	str = str+ "				<br>";
	str = str+ "				<input name=\"friend\" type=\"hidden\" value=\""+own_body+"\">";
	str = str+ "				<input name=\"comment_id\" type=\"hidden\" value=\""+comment_id+"\">";
	str = str+ "				<input name=\"fn\" type=\"hidden\" value=\"answer_comment\">";
	str = str+ "				<input type=\"submit\" value=\"Post\">";
	str = str+ "				<input type=\"button\" value=\"Cancel\" onclick=\"show_answer_comment_fn_cancel()\">";
	str = str+ "			</form>";
	str = str+ "		</td>";
	str = str+ "	</tr>";
	str = str+ "</table>";
	str = str+ "</div>";
	str = str+ "";

	document.getElementById("show_answer_comment_box").innerHTML=str;
}
function show_answer_comment_fn_cancel()
{
	document.getElementById("show_answer_comment_box").innerHTML="";
}
function comment_delete_fn_cancel()
{
	document.getElementById("comment_delete_id").innerHTML="";
}
function comment_delete_fn(rootpath, id)
{
	var str = "";
	str = str+ "<div class='alpha_background'>";
	str = str+ "</div>";
	str = str+ "<div class='comment_delete_css'>";
	str = str+ "	<center>";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "	Are you sure to delete this post ?";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "		<form name=\"comment_delete_form_yes\" action=\""+rootpath+"main/text/comment_delete.php\" method=\"POST\">";
	str = str+ "			<input type='hidden' name='fn' value='del'>";
	str = str+ "			<input type='hidden' name='value' value='"+id+"'>";
	str = str+ "			<input type='hidden' name='rootpath' value='"+rootpath+"'>";
	str = str+ "			<input type='submit' value='Yes'>";
	str = str+ "			&emsp;&emsp;&emsp;&emsp;<input type=\"button\" value=\"No\" onclick=\"comment_delete_fn_cancel()\">";
	str = str+ "		</form>";
	str = str+ "	</center>";
	str = str+ "</div>";
	str = str+ "";

	document.getElementById("comment_delete_id").innerHTML=str;
}
function answer_delete_fn(rootpath, id)
{
	var str = "";
	str = str+ "<div class='alpha_background'>";
	str = str+ "</div>";
	str = str+ "<div class='comment_delete_css'>";
	str = str+ "	<center>";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "	Are you sure to delete this post ?";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "		<form name=\"comment_delete_form_yes\" action=\""+rootpath+"main/text/comment_delete.php\" method=\"POST\">";
	str = str+ "			<input type='hidden' name='fn' value='answer_del'>";
	str = str+ "			<input type='hidden' name='value' value='"+id+"'>";
	str = str+ "			<input type='hidden' name='rootpath' value='"+rootpath+"'>";
	str = str+ "			<input type='submit' value='Yes'>";
	str = str+ "			&emsp;&emsp;&emsp;&emsp;<input type=\"button\" value=\"No\" onclick=\"comment_delete_fn_cancel()\">";
	str = str+ "		</form>";
	str = str+ "	</center>";
	str = str+ "</div>";
	str = str+ "";

	document.getElementById("comment_delete_id").innerHTML=str;
}
function photo_comment_delete_fn(rootpath, id, pic)
{
	var str = "";
	str = str+ "<div class='alpha_background'>";
	str = str+ "</div>";
	str = str+ "<div class='comment_delete_css'>";
	str = str+ "	<center>";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "	Are you sure to delete this photo comment ?";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "		<form name=\"comment_delete_form_yes\" action=\""+rootpath+"main/text/comment_delete.php\" method=\"POST\">";
	str = str+ "			<input type='hidden' name='fn' value='photo_del'>";
	str = str+ "			<input type='hidden' name='value' value='"+id+"'>";
	str = str+ "			<input type='hidden' name='pic' value='"+pic+"'>";
	str = str+ "			<input type='submit' value='Yes'>";
	str = str+ "			&emsp;&emsp;&emsp;&emsp;<input type=\"button\" value=\"No\" onclick=\"comment_delete_fn_cancel()\">";
	str = str+ "		</form>";
	str = str+ "	</center>";
	str = str+ "</div>";
	str = str+ "";

	document.getElementById("comment_delete_id").innerHTML=str;
}
function calendar_comment_delete_fn(rootpath, comment_id, calendar_id)
{
	var str = "";
	str = str+ "<div class='alpha_background'>";
	str = str+ "</div>";
	str = str+ "<div class='comment_delete_css'>";
	str = str+ "	<center>";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "	Are you sure to delete this calendar comment ?";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "		<form name=\"comment_delete_form_yes\" action=\""+rootpath+"main/text/comment_delete.php\" method=\"POST\">";
	str = str+ "			<input type='hidden' name='fn' value='calendar_del'>";
	str = str+ "			<input type='hidden' name='calendar_id' value='"+calendar_id+"'>";
	str = str+ "			<input type='hidden' name='value' value='"+comment_id+"'>";
	str = str+ "			<input type='submit' value='Yes'>";
	str = str+ "			&emsp;&emsp;&emsp;&emsp;<input type=\"button\" value=\"No\" onclick=\"comment_delete_fn_cancel()\">";
	str = str+ "		</form>";
	str = str+ "	</center>";
	str = str+ "</div>";
	str = str+ "";

	document.getElementById("comment_delete_id").innerHTML=str;
}
function input(obj)
{
	return obj;
}

function vote(rootpath, friend, comment_id, vote)
{
	var str="";
	str = str+ "<form id=\"vote_proc_form\" action=\""+rootpath+"main/text/comment_vote_proc.php\" method=\"POST\">";
	str = str+ "	<input type=\"hidden\" name=\"fn\" value=\"vote_question\">";
	str = str+ "	<input type=\"hidden\" name=\"friend\" value=\""+friend+"\">";
	str = str+ "	<input type=\"hidden\" name=\"vote\" value=\""+vote+"\">";
	str = str+ "	<input type=\"hidden\" name=\"comment_id\" value=\""+comment_id+"\">";
	str = str+ "</form>";
	str = str+ "";
	document.getElementById("vote").innerHTML=str;
	document.getElementById('vote_proc_form').submit();
}
function vote_update(rootpath, friend, comment_id, vote, id_vote)
{
	var str="";
	str = str+ "<form id=\"vote_proc_form\" action=\""+rootpath+"main/text/comment_vote_proc.php\" method=\"POST\">";
	str = str+ "	<input type=\"hidden\" name=\"fn\" value=\"vote_question_update\">";
	str = str+ "	<input type=\"hidden\" name=\"friend\" value=\""+friend+"\">";
	str = str+ "	<input type=\"hidden\" name=\"vote\" value=\""+vote+"\">";
	str = str+ "	<input type=\"hidden\" name=\"comment_id\" value=\""+comment_id+"\">";
	str = str+ "	<input type=\"hidden\" name=\"id_vote\" value=\""+id_vote+"\">";
	str = str+ "</form>";
	str = str+ "";
	document.getElementById("vote").innerHTML=str;
	document.getElementById('vote_proc_form').submit();
}
function unvote(rootpath, friend, comment_id, vote, id_vote)
{
	var str="";
	str = str+ "<form id=\"vote_proc_form\" action=\""+rootpath+"main/text/comment_vote_proc.php\" method=\"POST\">";
	str = str+ "	<input type=\"hidden\" name=\"fn\" value=\"unvote_question\">";
	str = str+ "	<input type=\"hidden\" name=\"friend\" value=\""+friend+"\">";
	str = str+ "	<input type=\"hidden\" name=\"vote\" value=\""+vote+"\">";
	str = str+ "	<input type=\"hidden\" name=\"comment_id\" value=\""+comment_id+"\">";
	str = str+ "	<input type=\"hidden\" name=\"id_vote\" value=\""+id_vote+"\">";
	str = str+ "</form>";
	str = str+ "";
	document.getElementById("vote").innerHTML=str;
	document.getElementById('vote_proc_form').submit();
}
function vote_answer(rootpath, friend, comment_id, vote)
{
	var str="";
	str = str+ "<form id=\"vote_proc_form\" action=\""+rootpath+"main/text/comment_vote_proc.php\" method=\"POST\">";
	str = str+ "	<input type=\"hidden\" name=\"fn\" value=\"vote_answer\">";
	str = str+ "	<input type=\"hidden\" name=\"friend\" value=\""+friend+"\">";
	str = str+ "	<input type=\"hidden\" name=\"vote\" value=\""+vote+"\">";
	str = str+ "	<input type=\"hidden\" name=\"comment_id\" value=\""+comment_id+"\">";
	str = str+ "</form>";
	str = str+ "";
	document.getElementById("vote").innerHTML=str;
	document.getElementById('vote_proc_form').submit();
}
function vote_answer_update(rootpath, friend, comment_id, vote, id_vote)
{
	var str="";
	str = str+ "<form id=\"vote_proc_form\" action=\""+rootpath+"main/text/comment_vote_proc.php\" method=\"POST\">";
	str = str+ "	<input type=\"hidden\" name=\"fn\" value=\"vote_answer_update\">";
	str = str+ "	<input type=\"hidden\" name=\"friend\" value=\""+friend+"\">";
	str = str+ "	<input type=\"hidden\" name=\"vote\" value=\""+vote+"\">";
	str = str+ "	<input type=\"hidden\" name=\"comment_id\" value=\""+comment_id+"\">";
	str = str+ "	<input type=\"hidden\" name=\"id_vote\" value=\""+id_vote+"\">";
	str = str+ "</form>";
	str = str+ "";
	document.getElementById("vote").innerHTML=str;
	document.getElementById('vote_proc_form').submit();
}
function unvote_answer(rootpath, friend, comment_id, vote, id_vote)
{
	var str="";
	str = str+ "<form id=\"vote_proc_form\" action=\""+rootpath+"main/text/comment_vote_proc.php\" method=\"POST\">";
	str = str+ "	<input type=\"hidden\" name=\"fn\" value=\"unvote_answer\">";
	str = str+ "	<input type=\"hidden\" name=\"friend\" value=\""+friend+"\">";
	str = str+ "	<input type=\"hidden\" name=\"vote\" value=\""+vote+"\">";
	str = str+ "	<input type=\"hidden\" name=\"comment_id\" value=\""+comment_id+"\">";
	str = str+ "	<input type=\"hidden\" name=\"id_vote\" value=\""+id_vote+"\">";
	str = str+ "</form>";
	str = str+ "";
	document.getElementById("vote").innerHTML=str;
	document.getElementById('vote_proc_form').submit();
}
