<?php 
	
	$errors = $data;
	$post = $data2;

	if(!empty($post['post_file'])){
		$post_file = $post['post_file'];
	}
	
	if(!empty($errors)){
		echo '<div class="alert alert-error"><ul>';
		foreach($errors as $error){
			echo '<li>'.$error.'</li>';
		}
		echo '</ul></div>';
	}
?>


<form action="" method="POST" class="form-project" enctype="multipart/form-data">
<h2>Edit Post</h2>
	<p> 
		<label for="post_title">Post Title:</label>
		<input type="text" name="post_title" id="post_title" <?php echo 'value="'.strip_tags($post['post_title']).'"'; ?>/>
	<div class="file_upload">
		<label for "images"><i class="icon-upload icon-white"></i> Choose a file to upload: </label>
		<input type="file" name="images" id="images" />
	 <div class="current_post_image">
			<label for "current_post_image">Current Image</label>
			<img src="uploads/<?php echo $post_file; ?>" />
		</div>	
	</div>


		<label for="post_text">Post Body:</label>
		<textarea name="post_text" id="post_text"><?php echo strip_tags($post['post_text']); ?></textarea>
		<br />
		<input type="submit" class="btn btn-warning" value="Submit">
	</p>
	
</form>


