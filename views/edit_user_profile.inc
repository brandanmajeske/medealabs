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
		
		<div class="file_upload">
		<label for "images"><i class="icon-upload icon-white"></i> Upload Your Profile Image: </label>
		<input type="file" name="images" id="images" />
		<p class="muted">No larger than 100kb please!<p>
		</div>

		<label for="user_bio">Enter Your Bio:</label>
		<textarea name="user_bio" id="user_bio"><?php echo strip_tags($user_profile_data['user_bio']); ?></textarea>
		<br />
		<input type="submit" class="btn btn-warning" value="Submit">
	</p>
</form>