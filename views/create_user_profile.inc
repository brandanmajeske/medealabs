<?php 
	
	$errors = $data;
	
	if(empty($errors) === false){
		echo '<div class="alert alert-error"><ul>';
		foreach($errors as $error){
			echo '<li>'.$error.'</li>';
		}
		echo '</ul></div>';
	}
?>


<form action="" method="POST" class="form-project" enctype="multipart/form-data">
<h2>Create Your Profile</h2>
	<p>
	<div>
		<label>Full Name:</label>
		<input class="span4" type="text"  name="full_name" <?php if(isset($_POST['full_name']) === true ) {echo 'value="'.strip_tags($_POST['full_name']).'"';} ?> />
		<label>Location:</label>
		<input class="span4"type="text" name="location" <?php if(isset($_POST['location']) === true ) {echo 'value="'.strip_tags($_POST['location']).'"';} ?> />
	<div class="file_upload">
		<label for "images"><i class="icon-upload icon-white"></i> Choose a file to upload: </label>
		<input type="file" name="images" id="images" />
	</div>
		<div class="clearfix"></div>
		<br />
		<label for="user_bio">Enter Your Bio:</label>
		<textarea name="user_bio" id="user_bio"><?php if(isset($_POST['user_bio']) === true ) {echo strip_tags($_POST['user_bio']); } ?></textarea>
		<br />
		<input type="submit" class="btn btn-warning" value="Submit">

	</p>
</form>