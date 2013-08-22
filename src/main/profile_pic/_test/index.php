<?php
	if(!is_uploaded_file($_FILES["myfile"]['tmp_name'])){
?>
		<form action="<?=$_SERVER["SCRIPT_NAME"];?>?id=100" enctype="multipart/form-data" method="POST">
			<input type="file" id="myfile" name="myfile" />
			
<!-- 			<input type="text" id="txt" name="txt" /> -->
			<input type="submit" value="upload" />
		</form>
<?php
	}
	else {
		/*
		function base64_encode_image($imagefile){
			$imgtype = array('jpg','gif','png');
			$filename = file_exists($imagefile)?htmlentitles($imagefile):die('Image file error');
			$filetype = pathinfo($path);
		}
		*/
		
		
		
		$image_src = base64_encode(file_get_contents($_FILES["myfile"]["tmp_name"]));
		echo $data = "data:image/png;base64,".$image_src;
		?><img src="<?=$data?>" /><?php
		
		echo("<Br/><br/><pre>");
		var_dump($_POST);
		echo("<br>");
		var_dump($_GET);
		echo("<br>");
		var_dump($_REQUEST);
		echo("<br>");
		var_dump($_FILES);
		echo("<br>");
		echo("</pre>");
		?>
<!-- 		<img src="render.php?path=<?php echo $_FILES["myfile"]["tmp_name"];?>"> -->
		<?php
	}
?>