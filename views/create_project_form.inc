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
<h2>About Your Project</h2>
	<p>
		<label for="proj_title">Project Title:</label>
		<input type="text" name="proj_title" id="proj_title" <?php if(isset($_POST['proj_title']) === true ) {echo 'value="'.strip_tags($_POST['proj_title']).'"';} ?>/>
	

		<label for="proj_cat">Category:</label>
		<input type="text" name="proj_cat" id="proj_cat" <?php if(isset($_POST['proj_cat']) === true ) {echo 'value="'.strip_tags($_POST['proj_cat']).'"';} ?>/>
		
		<div class="file_upload">
		<label for "images"><i class="icon-upload icon-white"></i> Choose a file to upload: </label>
		<input type="file" name="images" id="images" />
		</div>

		<label for="proj_desc">Project Description:</label>
		<textarea name="proj_desc" id="proj_desc"><?php if(isset($_POST['proj_desc']) === true ) {echo strip_tags($_POST['proj_desc']); } ?></textarea>
		<br />
		<input type="submit" class="btn btn-warning" value="Submit">

	</p>
</form>
