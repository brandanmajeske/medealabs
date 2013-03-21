<?php 
	$subHeader = 'Would you like to drop us a line?';
	
	$errors = $data;

	if(isset($_GET['sent']) === true) {
		$subHeader = 'Thanks for contacting us!';
	} else {

	if(empty($errors) === false){
		echo '<div class="alert alert-error"><ul>';
		foreach($errors as $error){
			echo '<li>'.$error.'</li>';
		}
		echo '</ul></div>';
	}
}
	
	echo '<div class="page-header"><h2>'.$subHeader.'</h2></div>';
?>

<form action="" method="POST" class="form-project">

	<p>
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" <?php if(isset($_POST['name']) === true ) {echo 'value="'.strip_tags($_POST['name']).'"';} ?>/>
		<br />

		<label for="email">Email:</label>
		<input type="text" name="email" id="email" <?php if(isset($_POST['email']) === true ) {echo 'value="'.strip_tags($_POST['email']).'"';} ?>/>
		
		<br />
		<label for="message">Message:</label>
		<textarea name="message" id="message"><?php if(isset($_POST['message']) === true ) {echo strip_tags($_POST['message']); } ?></textarea>
		<br />
		<input type="submit" class="btn btn-warning" value="Send">

	</p>
</form>