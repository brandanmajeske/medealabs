<form action="?update=success" method="POST" class="form-project" enctype="multipart/form-data">
<?php 

$errors = $data;
$user_profile_data = $data2;

if(empty($errors) === false){
		echo '<div class="alert alert-error"><ul>';
		foreach($errors as $error){
			echo '<li>'.$error.'</li>';
		}
		echo '</ul></div>';
	}

?>

<h2>Edit Your Profile</h2>
	<p>
		<div>
		<label>Full Name:</label>
		<input class="span4" type="text"  name="full_name" <?php echo 'value="'.$user_profile_data['full_name'].'"';?>/>
		<label>Location:</label>
		<input class="span4"type="text" name="location"  <?php echo 'value="'.$user_profile_data['location'].'"';?>/>
		<div class="file_upload">
		<label for "images"><i class="icon-upload icon-white"></i> Choose a file to upload: </label>
		<input type="file" name="images" id="images" />
	 <div class="current_user_image">
			<label for "current_user_image">Current Image</label>
			<img class="img-polaroid" src="uploads/user_image/<?php echo $user_profile_data['user_file']; ?>" />
		</div>	
	</div>
		<br />
		<label for="user_bio">Enter Your Bio:</label>
		<textarea name="user_bio" id="user_bio"><?php echo strip_tags($user_profile_data['user_bio']); ?></textarea>
		<br />
		<input type="submit" class="btn btn-warning" value="Submit">
	</p>
</form>