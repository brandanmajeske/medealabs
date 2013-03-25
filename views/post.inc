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
<h2>Contribute to Project</h2>
	<p> 
		<label for="post_title">Post Title:</label>
		<input type="text" name="post_title" id="post_title" <?php if(isset($_POST['post_title']) === true ) {echo 'value="'.strip_tags($_POST['post_title']).'"';} ?>/>
	
	<div class="file_upload">
		<label for "images"><i class="icon-upload icon-white"></i> Choose a file to upload: </label>
		<input type="file" name="images" id="images" />
		</div>
	
		<label for="post_text">Post Body:</label>
		<textarea name="post_text" id="post_text"><?php if(isset($_POST['post_text']) === true ) {echo strip_tags($_POST['post_text']); } ?></textarea>
		<br />
		
	</p>

	 <div>
		<div class="controls">
		<input type="submit" class="btn btn-warning" value="Submit">
	</div>

	
</form>



