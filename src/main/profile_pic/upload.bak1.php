
<?php
if(isset($_POST["send"])) {
	if(validate_form($err))
	process_form();
	else {
		echo '<font color="red"><b> Erors</b><br>';
		echo $err. "</font>";
		show_form();
	}
}
else { show_form(); }

function validate_form(&$err){
	$err = "";
	
	if(!is_uploaded_file($_FILES['userfile']['tmp_name']) ) {
		$err.= "Send file incomplete because ";
		
		if(($_FILES['userfile']['error'] == UPLOAD_ERR_INI_SIZE) or
			($_FILES['userfile']['error'] == UPLOAD_ERR_FORM_SIZE))
			$err .= "File oversize the limit<br>";
		elseif ($_FILES['userfile']['error'] == UPLOAD_ERR_PARTIAL)
			$err .= "The data of file send incomplete<br>";
		elseif	($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE)
			$err .= " You do not choose the file<br>";
	}
	else {
		define("MAX_SIZE", 2097152);
		if ($_FILES['userfile']['size'] > MAX_SIZE)
			$err .= "Send file complete but the size of file over the limit<br>";
			
		if (($_FILES['userfile']['type'] != "image/jpeg"))
			$err .= "Send file complete but the file is not in form JPEG<br>";
	}
	
	if ($err)
		return FALSE;
	else
		return TRUE;
}

function show_form(){
	echo <<<HTMLBLOCK
<form method="POST" action="{$_SERVER['PHP_SELF']}" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
	Image : <input type="file" name="userfile"><br>
	<font color="#666666" size="-1"> File must be JPEG and Size does not over 2.0 MB</font><br>
	<input type="submit" name="send" value="Add">
	<input type="reset" name="reser" value="Clear">
</form>

HTMLBLOCK;
}

function  process_form(){
	echo "Add key Eng: {$_POST["keyeng"]}<br>";
	echo "Add key Thai: {$_POST["keythai"]}<br><br>";
	echo "Get file {$_FILES['userfile']['name']} <br>";
	echo " Size of file {$_FILES['userfile']['size']} byte<br>";
	echo " File type {$_FILES['userfile']['type']} <br><br>";
		
	$dest = 'imgLogo/'.$_FILES['userfile']['name'];
	if(move_uploaded_file($_FILES['userfile']['tmp_name'],$dest)){
		echo " Move file is complete<br>";
		
		define("MAX_SHOW_SIZE", 1048576);
		if ($_FILES['userfile']['size'] > MAX_SHOW_SIZE) {
			echo '<a href="imgLogo/'.$_FILES['userfile']['name'].'">Click to view the img</a><br>';
		}
		else{
			echo '<img src="imgLogo/'.$_FILES['userfile']['name'].'" border="1"><br>';		
		}
		
	}
	else {
		echo "Foud the problem about the tranfer file to destination on the server<br>";
	}
	
	$keyeng = trim($_POST["keyeng"]);
	$keythai = trim($_POST["keythai"]);
	$imgLogo = trim($_FILES['userfile']['name']);
	
	$keyeng = addslashes($keyeng);
	$keythai = addslashes($keythai);
	$imgLogo = addslashes($imgLogo);
	
	$cn = @mysqli_connect("localhost", "root", "sawasdee");
	$cn->set_charset('utf8');
	
	if(!cn){
		echo "Can not connect to MySQL Server";
		exit;
	}
	
	mysqli_select_db($cn, "kinarai");
	$sql = "INSERT INTO restaurants VALUES ('', '{$keyeng}', '{$keythai}','{$imgLogo}');";
	$result = mysqli_query($cn, $sql);
	echo "Complete <br/>";
	mysqli_close($cn); 
echo <<<HTMLBLOCK
<input type="button" onClick="history.back()" value="Back"/>
HTMLBLOCK;
}

?>

