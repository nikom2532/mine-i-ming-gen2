<?php
	if(!is_uploaded_file($_FILES["myfile"]['tmp_name'])){
?>
		<form action="./Jcrop/crop.php" enctype="multipart/form-data" method="POST">
			<input type="file" id="file" name="file" />
			
<!-- 			<input type="text" id="txt" name="txt" /> -->
			<input type="submit" value="upload" />
		</form>
<?php
	}
?>