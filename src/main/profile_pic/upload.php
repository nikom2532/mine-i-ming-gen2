<?php
	$subpath = "main/profile_pic/";
	if(!is_uploaded_file($_FILES["file"]['tmp_name'])){
?>
		<form action="<?=$rootpath?><?=$subpath?>index.php" enctype="multipart/form-data" method="POST">
			<input type="file" id="file" name="file" />
			<input type="submit" value="upload" />
		</form>
<?php
	}
	else{
		include("{$rootpath}{$subpath}lib/Jcrop/crop.php");
	}
?>