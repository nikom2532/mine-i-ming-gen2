	<!-- ######################### middle sheet 2. Photo upload ######################## -->
	<td align="left" VALIGN="top" width="45%"> 
	<form id="Upload" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post">
		<h1>
			Upload new photos
		</h1>
		<p>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
<!--			<input type="hidden" name="su" value="<?php echo $_SESSION[su] ?>">		-->
		</p>		
		<p>

			<input id="file" type="file" name="file">
		</p>	
		<p>
			<input id="submit" type="submit" name="submit" value="Upload a photo">
		</p>
	</form>
	</td>
	<td align="center" VALIGN="top" width="35%"> 
	<!-- ########################## right sheet ####################### -->

	</td>
