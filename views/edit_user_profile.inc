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
		<a href="#deleteModal" role="button" class="btn btn-small btn-danger pull-right" data-toggle="modal">Delete My Account</a>
	</p>
</form>


<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 class="ModalLabel">Delete Your Account?</h3>
  </div>
  <div class="modal-body">
    <p>Danger Danger! You are about to permanently delete your account. Beyond this is the point of no return. Are you sure you want to do that?</p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No, Get Me Outta Here!</button>
    <a href="profile.php?delete" class="btn btn-danger">Yes, Delete it!</a>
  </div>
</div>