<?php
	if($_FILES["file"]["name"] ==""){
?>
	<?php ######################### middle sheet 2. Photo upload ######################## ?>
	<form id="Upload" action="./?" enctype="multipart/form-data" method="post">
		<h1>
			Upload new photos
		</h1>
		<div>
		<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>"></div>
<?php	/*	<input type="hidden" name="su" value="<?php echo $_SESSION[su] ?>">		*/ ?>
		<input id="file" type="file" name="file">
		<input id="submit" type="submit" name="submit" value="Upload">
	</form>
<?php 
	}
	else{
		if($_FILES["file"]["error"] > 0){
			echo "Error: " . $_FILES["file"]["error"] . "<br />";
		}
		else{
		    $aExtraInfo = getimagesize($_FILES['file']['tmp_name']);
		    $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['image']['tmp_name']));
?>
    		<img src="<?php echo $sImage; ?>" alt="Your Image" />
<?php
		}
	}
?>