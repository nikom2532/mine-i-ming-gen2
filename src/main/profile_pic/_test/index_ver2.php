<?php
	if(!is_uploaded_file($_FILES["myfile"]['tmp_name'])){
?>
		<form action="<?=$_SERVER["SCRIPT_NAME"];?>" enctype="multipart/form-data" method="POST">
			<input type="file" id="myfile" name="myfile" />
			
<!-- 			<input type="text" id="txt" name="txt" /> -->
			<input type="submit" value="upload" />
		</form>
<?php
	}
	else {
		$image_unencode = file_get_contents($_FILES["myfile"]["tmp_name"]);
		$image_src = base64_encode($image_unencode);
		$filetype = pathinfo($filename, PATHINFO_EXTENSION);
		
		function base64_encode_image($imagefile){
			$imgtype = array('jpg','gif','png');
			$filename = file_exists($imagefile)?htmlentitles($imagefile):die('Image file error');
			$filetype = pathinfo($filename, PATHINFO_EXTENSION);
			if(in_array($filetype, $imgtype)){
				$imgbinary = fread(fopen($filename, "r"), filesize($filename));
			}
			else{
				die('Invalid image type, jpg, gif, and png is only allowed');
			}
			// return 'data:image/'.$filetype.';base64,'.$image_src;
			return 'data:image/png;base64,'.$image_src;
		}
		
		// echo $data = "data:image/png;base64,".$image_src;
		// $data = "data:image/".$filetype.";base64,".$image_src;
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