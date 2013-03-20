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


<form action="" method="POST" class="form-project">
<h2>What about it...</h2>
	<p>
		<label for="post_title">Post Title:</label>
		<input type="text" name="post_title" id="post_title" <?php if(isset($_POST['post_title']) === true ) {echo 'value="'.strip_tags($_POST['post_title']).'"';} ?>/>
		
		<label for="post_body">Post Body:</label>
		<textarea name="post_body" id="post_body"><?php if(isset($_POST['post_body']) === true ) {echo strip_tags($_POST['post_body']); } ?></textarea>
		<br />
		<input type="submit" class="btn btn-warning" value="Submit">

	</p>
</form>



