function photo_delete_fn_cancel()
{
	document.getElementById("photo_delete_id").innerHTML="";
}
function photo_delete_fn(rootpath, previous_id, photo_id)
{
	var str = "";
	str = str+ "<div class='alpha_background'>";
	str = str+ "</div>";
	str = str+ "<div class='comment_delete_css'>";
	str = str+ "	<center>";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "	Are you sure to delete this photo ?";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "		<form name=\"comment_delete_form_yes\" action=\""+rootpath+"main/my_photo/photo_proc.php\" method=\"POST\">";
	str = str+ "			<input type='hidden' name='fn' value='photo_del'>";
	str = str+ "			<input type='hidden' name='previous_id' value='"+previous_id+"'>";
	str = str+ "			<input type='hidden' name='photo_id' value='"+photo_id+"'>";
	str = str+ "			<input type='submit' value='Yes'>";
	str = str+ "			&emsp;&emsp;&emsp;&emsp;<input type=\"button\" value=\"No\" onclick=\"photo_delete_fn_cancel()\">";
	str = str+ "		</form>";
	str = str+ "	</center>";
	str = str+ "</div>";
	str = str+ "";

	document.getElementById("photo_delete_id").innerHTML=str;
}

function profile_picture_delete_fn(rootpath, previous_id, photo_id)
{
	var str = "";
	str = str+ "<div class='alpha_background'>";
	str = str+ "</div>";
	str = str+ "<div class='comment_delete_css'>";
	str = str+ "	<center>";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "	Are you sure to delete this avatar ?";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "		<form name=\"comment_delete_form_yes\" action=\""+rootpath+"main/my_photo/photo_proc.php\" method=\"POST\">";
	str = str+ "			<input type='hidden' name='fn' value='profile_picture_del'>";
	str = str+ "			<input type='hidden' name='previous_id' value='"+previous_id+"'>";
	str = str+ "			<input type='hidden' name='photo_id' value='"+photo_id+"'>";
	str = str+ "			<input type='submit' value='Yes'>";
	str = str+ "			&emsp;&emsp;&emsp;&emsp;<input type=\"button\" value=\"No\" onclick=\"photo_delete_fn_cancel()\">";
	str = str+ "		</form>";
	str = str+ "	</center>";
	str = str+ "</div>";
	str = str+ "";

	document.getElementById("photo_delete_id").innerHTML=str;
}
function set_profile_picture_fn(rootpath, photo_id)
{
	var str = "";
	str = str+ "<div class='alpha_background'>";
	str = str+ "</div>";
	str = str+ "<div class='comment_delete_css'>";
	str = str+ "	<center>";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "	Do you want to set this photo to be a avatar ?";
	str = str+ "	<p></p>";
	str = str+ "	<p></p>";
	str = str+ "		<form name=\"comment_delete_form_yes\" action=\""+rootpath+"main/my_photo/photo_proc.php\" method=\"POST\">";
	str = str+ "			<input type='hidden' name='fn' value='set_profile_picture'>";
	str = str+ "			<input type='hidden' name='photo_id' value='"+photo_id+"'>";
	str = str+ "			<input type='submit' value='Yes'>";
	str = str+ "			&emsp;&emsp;&emsp;&emsp;<input type=\"button\" value=\"No\" onclick=\"photo_delete_fn_cancel()\">";
	str = str+ "		</form>";
	str = str+ "	</center>";
	str = str+ "</div>";
	str = str+ "";

	document.getElementById("photo_delete_id").innerHTML=str;
}
