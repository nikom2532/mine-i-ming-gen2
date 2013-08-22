<?php
	if(!is_uploaded_file($_FILES["myfile"]['tmp_name'])){
?>
		<form action="<?//=$_SERVER["SCRIPT_NAME"];?>../Jcrop/crop2.php" enctype="multipart/form-data" method="POST">
			<input type="file" id="myfile" name="myfile" />
			
<!-- 			<input type="text" id="txt" name="txt" /> -->
			<input type="submit" value="upload" />
		</form>
<?php
	}
	else {
		$image_unencode = file_get_contents($_FILES["myfile"]["tmp_name"]);
		$image_src = base64_encode($image_unencode);
		$data = "data:image/png;base64,".$image_src;
		
		
		?><!-- <img src="<?=$data?>" /> -->
		<form id="imgForm" action="../Jcrop/crop.php" method="POST">
			<input type="hidden" name="uploadImage" value="<?php echo $data; ?>" />
		</form>
		<script>
			function submitForm(){
				document.getElementById("imgForm").submit();
			}
			window.onload = submitForm();
		</script>
		<?php
	}
?>