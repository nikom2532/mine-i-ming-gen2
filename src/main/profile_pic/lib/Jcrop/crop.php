<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["x"]))
	{
		
	}
	else{
	?>
	
			<script src="<?php echo $rootpath.$subpath;?>lib/Jcrop/js/jquery.min.js"></script>
			<script src="<?php echo $rootpath.$subpath;?>lib/Jcrop/js/jquery.Jcrop.js"></script>
			<link rel="stylesheet" href="<?php echo $rootpath.$subpath;?>lib/Jcrop/css/jquery.Jcrop.css" type="text/css" />
			<link rel="stylesheet" href="<?php echo $rootpath.$subpath;?>lib/Jcrop/demo_files/demos.css" type="text/css" />
	
			<script>
	
				$(function()
				{
					$('#cropbox').Jcrop({
						aspectRatio: 1,
						onSelect: updateCoords
					});
	
				});
	
				function updateCoords(c)
				{
					$('#x').val(c.x);
					$('#y').val(c.y);
					$('#w').val(c.w);
					$('#h').val(c.h);
				};
	
				function checkCoords()
				{
					if (parseInt($('#w').val())) return true;
					alert('Please select a crop region then press submit.');
					return false;
				};
	
			</script>
	
		</head>
	
		<body>
	<?php 
		$randomkey = microtime(true)*10000;
		$image_unencode = file_get_contents($_FILES["file"]["tmp_name"]);
		$userID="";
		$sql = "
			SELECT `userID` FROM `social_iMing_customer_v3`
			WHERE `username`='".$_SESSION["su"]."';
		";
		$result = mysql_query($sql);
		if($rs = mysql_fetch_array($result)){
			$userID = $rs["userID"];
		}
		$fp = fopen($rootpath.$subpath.'lib/Jcrop/temp/'.$userID."_".$randomkey.'.png', 'w+');
		fwrite($fp, $image_unencode);
		fclose($fp);
		
		// file_put_contents($rootpath.$subpath.'lib/Jcrop/aac.png',$image_unencode);
		chmod($rootpath.$subpath.'lib/Jcrop/aac.png', 0777);
	?>
		<div id="outer">
		<div class="jcExample">
		<div class="article">
	
			<h1>Jcrop - Crop Behavior</h1>
	
			<!-- This is the image we're attaching Jcrop to -->
	<!-- 	<img src="<?php echo $_FILES["file"]["name"]; ?>" id="cropbox" /> -->
			<img src="<?php echo $rootpath.$subpath; ?>lib/Jcrop/temp/<?php echo $userID."_".$randomkey;?>.png" id="cropbox" />
	
	
			<!-- This is the form that our event handler fills -->
			<form action="<?php echo $rootpath.$subpath; ?>lib/Jcrop/proc.php" method="post" onsubmit="return checkCoords();">
				<input type="hidden" id="x" name="x" />
				<input type="hidden" id="y" name="y" />
				<input type="hidden" id="w" name="w" />
				<input type="hidden" id="h" name="h" />
				<input type="hidden" name="lastTime" value="<?=$randomkey?>" />
				<input type="submit" value="Crop Image" />
			</form>
		</div>
		</div>
		</div>
<?php
	}
?>