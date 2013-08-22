<?php 
// SETTINGS
$use_absolute_path	= false;									// specify if you are using an absolute path or not (false = relative to this document)
																// if using an absolute path it must be from the server document root
																// e.g. $_SERVER['DOCUMENT_ROOT'].'/path/'
$img_path_init 		= 'assets/images/uploads/originals/';		// folder to upload initial image into
$img_path_temp 		= 'assets/images/uploads/temp/';			// folder to hold temporary image into
$img_path_crops		= 'assets/images/uploads/crops/';			// folder to upload cropped images into
$img_height_main	= 375;										// main image height (use largest size required)
$img_width_main		= 300;										// main image width
$img_type			= 'jpg';									// convert all uploads to JPG

$minImageWidth		= 300;										// minimum width of uploaded image
$minImageHeight		= 375;										// minimum height of uploaded image

$minWidth			= 72;										// set minimum image crop width
$minHeight			= 89;										// set minimum image crop height
$cropAspectRatio	= 0.8;										// set aspect ratio for cropper: 1 = square (width/height = aspect ratio)
$setSelect 			= '[ 50, 50, 150, 175 ]'; 					// initial crop area [ start_x, start_y, end_x, end_y ]

$cropperWidth		= 600;										// width of temporary image used as the cropper
$cropperHeight		= 480;										// height of temporary image used as the cropper

// image name prefixes
$prefix_full		= 'full_';									// full size cropped image name prefix
$prefix_main		= '';										// main cropped image name prefix

// Required fields
$required			= array('field1','field3');							// ID/name of required fields to be submitted


// set dimensions + name prefix of any extra thumbnails required:
// use: 'prefix' => array('width'=>100,'height'=>150)
// DO NOT INCLUDE THE MAIN IMAGE SIZE SET ABOVE
$thumbs = array(
	'med_' => array('width'=>134,'height'=>167),
	'sml_' => array('width'=>72,'height'=>89)
);

// INITIALISE

$docURI			= $_SERVER['REQUEST_URI'];						// gets the base location of this file
$docPage		= basename($_SERVER['PHP_SELF']);				// gets the page name of this file
$docRoot		= str_replace($docPage,'',$docURI);				// get the exact path to root for this page

if(!session_id()) { session_start(); }							// start session - used to store images
if(!isset($_SESSION['cropper'])) {
	$_SESSION['cropper'] = array();								// create cropper session to hold imagery if not already set
}
$_SESSION['cropper']['use_absolute_path']= $use_absolute_path;
$_SESSION['cropper']['doc_root'] 		= $docRoot;
$_SESSION['cropper']['path_orig'] 		= $img_path_init;		// pass settings to be available to AJAX called pages
$_SESSION['cropper']['path_temp'] 		= $img_path_temp;
$_SESSION['cropper']['path_crops'] 		= $img_path_crops;
$_SESSION['cropper']['img_height'] 		= $img_height_main;
$_SESSION['cropper']['img_width'] 		= $img_width_main;
$_SESSION['cropper']['thumbs'] 			= $thumbs;
$_SESSION['cropper']['img_prefix_full']	= $prefix_full;
$_SESSION['cropper']['img_prefix_main']	= $prefix_main;
$_SESSION['cropper']['required']		= $required;

$error = false;													// set default error state
$img = false;													// set default value for image

// INITIAL IMAGE UPLOAD - executed when an image is posted
if(isset($_FILES['image'])) { 									// check if file field 'image' has been posted
	require_once($_SERVER['DOCUMENT_ROOT'].$docRoot.'inc/_img.php');	// include image upload and manipulation class
	$_image = new _image;										// instantiate img object
	$_image->uploadTo = $img_path_init;							// upload to $img_path_init set above
	$image = $_image->upload($_FILES['image']);					// perform upload
	if($image) {												// if uploaded OK then resize to fit main image area
		$fullWidth = $_image->get_image_width($image);			// get width of uploaded image
		$fullHeight = $_image->get_image_height($image);		// get height of uploaded image
		if(($fullWidth>=$minImageWidth)
			&&($fullHeight>=$minImageHeight)) {					// check uploaded image is big enough
			if(isset($_SESSION['cropper']['image'])) {			// check if image session exists (holding previously uploaded image)
				@unlink($_SESSION['cropper']['image']);			// delete old original image
				@unlink($_SESSION['cropper']['image_temp']);	// delete old temporary image
				unset($_SESSION['cropper']['image']);			// clear image session
				unset($_SESSION['cropper']['image_temp']);		// clear temp image session
			}
			$_SESSION['cropper']['image'] = $image;				// add new image to session
			// RESIZE to 
			$_image->newHeight 		= $cropperHeight;			// max height
			$_image->newWidth 		= $cropperWidth;			// max width
			$_image->newPath		= $img_path_temp;			// path for temporary image
			$_image->aspectRatio 	= 'true';					// maintain aspect ratio for original image
			$_image->padToFit		= 'false';					// do not pad the image with coloured space to fit height/width
			$_image->newImgType 	= $img_type; 				// force output to type specified above
			$i = $_image->resize();								// resize image
			if(file_exists($i)) { 								// image resized OK
				$_SESSION['cropper']['image_temp'] = $i;		// save new temp image to session
				$img = $i;
				list($thumbWidth, $thumbHeight) = getimagesize($i);
			}
		} else {
			$error = 'The photo needs to be at least '.$minImageWidth.' pixels wide by '.$minImageHeight.' high - please upload a higher resolution image';
		}
	}
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload and Crop</title>
<link type="text/css" rel="stylesheet" href="<?php echo $docRoot; ?>inc/css" />
<style type="text/css">
/* Image paths set here to allow for shifting root directories */
#tbl_cropper_wrap #preview		{	background:url(<?php echo $docRoot; ?>assets/images/profile.png) left top no-repeat #EEE;}
#div_loader						{	background:url(<?php echo $docRoot; ?>assets/images/black80.png) left top repeat;}
.jcrop-vline, .jcrop-hline		{	background: white url(<?php echo $docRoot; ?>inc/css/Jcrop.gif) top left repeat;}
</style>
<script language="javascript" type="text/javascript">
// pass the minimum height and width values to the document
document.minWidth 	= <?php echo $minWidth; ?>;
document.minHeight 	= <?php echo $minHeight; ?>;
document.setSelect 	= <?php echo $setSelect; ?>;
document.aspectRatio= <?php echo $cropAspectRatio; ?>;
document.docRoot 	= '<?php echo $docRoot; ?>';
function checkRequired() {
	reqFields = '#<?php echo trim(implode(',#',$required),',# '); ?>';
	if(reqFields!='') {
		req = jQuery(reqFields);
		retVal = true;
		req.each(function(i,e){
			if(jQuery.trim(jQuery(e).val()).length<1) {
				erID = jQuery(e).attr("id")+'_error';
				if(jQuery('#'+erID).length>0) { jQuery(jQuery('#'+erID)).fadeIn(); }
				retVal = false;
			}
		});
		return retVal;
	} else { return false; }
}
</script>
<script language="javascript" type="text/javascript" src="<?php echo $docRoot; ?>inc/js"></script>
</head>

<body>
<!-- TEMPORARY CONTENT -->
<h1>Project: Script Test :: Upload, Crop &amp; Resize</h1>
<h2>&copy;: 2011 MJDIGITAL</h2>
<p class="date">Date: November 2011</p>
<p class="desc">Image upload and crop tool - upload your profile picture and crop it to a set size of <?php echo $cropperWidth.'x'.$cropperHeight; ?> keeping the aspect ratio. Follow the steps in order.</p>
<!-- END TEMPORARY CONTENT -->

<!-- START >> CROPPER -->
<?php if(isset($_FILES['image'])) { // write out the onplete form ?>
<form id="form_cropper" name="form_cropper" action="<?php echo $docRoot; ?>complete.php" method="post" onsubmit="return checkRequired();">
<?php } else { // write out the normal form ?>
<form id="form_cropper" name="form_cropper" action="" enctype="multipart/form-data" method="post">
<?php } ?>
<table id="tbl_cropper_wrap">
	<tr>
		<th id="container">
			<div id="div_loader"><img src="<?php echo $docRoot; ?>assets/images/loader.gif" width="31" height="31" alt="Loading" /></div>
			<div id="div_main_img"><?php 
			if($error) {
				echo '<div class="error">'.$error.'</div>';
			}
			if($img) { 
				echo '<img src="'.str_replace($_SERVER['DOCUMENT_ROOT'],'',$img).'" id="cropbox" width="'.$thumbWidth.'" height="'.$thumbHeight.'" />'; 
			}?>
			</div>
		</th>
		<td rowspan="2" id="preview"></td>
	</tr>
	<tr>
		<td>
			<div>Upload your photo</div>
			<div id="div_file">
				1: <input name="image" type="file" />
			</div>
			<div id="div_submit">
				2: <input name="" type="submit" onclick="setLoader(true);" />
			</div>
			<?php 
			if($img) { ?>
			<div >
				3: Resize and move crop area to suit
			</div>
			<div id="div_test">
				4: <a href="Javascript:;" onclick="previewImage('<?php echo ($_SESSION['cropper']['use_absolute_path']) ? str_replace($_SERVER['DOCUMENT_ROOT'],'',$img) : $docRoot.$image; ?>');">Preview Image</a>
			</div>
			<div id="div_accept" style="display:none;">
				5: Enter the following information<br />
                <dt><label for="field1">First Field (*required)</label></dt>
                <dd>
                <div id="field1_error" style="color:red; font-weight:bold; display:none;">Please complete field 1</div>
                <input type="text" name="field1" id="field1" value="<?php if(isset($_SESSION['crop']['field1'])) echo $_SESSION['crop']['field1']; ?>" tabindex-"2" /></dd>
                <dt><label for="field2">Second Field</label></dt>
                <dd><input type="text" name="field2" id="field2" value="<?php if(isset($_SESSION['crop']['field2'])) echo $_SESSION['crop']['field2']; ?>" tabindex-"3" /></dd> 
                <dt><label for="field3">Third Field (*required)</label></dt>
                <dd>
                <div id="field3_error" style="color:red; font-weight:bold; display:none;">Please complete field 3</div><input type="text" name="field3" id="field3" value="<?php if(isset($_SESSION['crop']['field3'])) echo $_SESSION['crop']['field3']; ?>" tabindex-"4" />
                </dd><input type="hidden" name="submitted" value="1" />
                <input name="submit" type="submit" value="Accept" tabindex="5" />
			</div>
			<?php } ?>
		</td>
	</tr>
</table>
</form>
<!-- END << CROPPER -->
</body>
</html>