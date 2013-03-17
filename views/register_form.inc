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


<form action="" method="post" class="form-signin">
	<h2>Register</h2>

	<label>Username:</label>
	<input type="text" name="user_name" <?php if(isset($_POST['user_name']) === true ) {echo 'value="'.strip_tags($_POST['user_name']).'"';} ?> />

	<label>Password:</label> 
	<input type="password" name="password" />

	<label>Confirm Password:</label>
	<input type="password" name="password_confirm" />

	<label>Full Name:</label>
	<input type="text" name="full_name" <?php if(isset($_POST['full_name']) === true ) {echo 'value="'.strip_tags($_POST['full_name']).'"';} ?> />
	
	<label>Email:</label>
	<input type="text" name="email" <?php if(isset($_POST['email']) === true ) {echo 'value="'.strip_tags($_POST['email']).'"';} ?> />

	<br />
	<input type="submit" class="btn btn-large btn-warning" value="Register" />
	

</form>