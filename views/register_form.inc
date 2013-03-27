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
	<label class="checkbox">
	<input type="checkbox" name="tos" value="agree"> I Agree to the <a href="#TOSModal" data-toggle="modal">Terms of Service</a>
	</label>
	<input type="submit" class="btn btn-large btn-warning" value="Register" />
	
	

</form>


<div id="TOSModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="TOSModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 class="ModalLabel">Terms of Service</h3>
  </div>
  <div class="modal-body">
    	<p>The Terms of Service are simple: Be kind to all, don't raise a ruckus, and keep the content 'family-friendly'! Our grandmothers use this site and if you upset Mamaw, we'll certainly hear about it, and you'll be in trouble. The administrators reserve the right to remove content as they see fit, however the offending post in question will be reviewed, and the post-owner can dispute the removal. If it was all a silly misunderstanding the content will be returned to its original condition.</p>

		<p>The goal of Medea Labs is to share images and ideas that are interesting, thought provoking, and enhance our users lives in some way. Please share content with that goal in mind.</p>

		<p>We're going out on a limb here and assuming the content posted by you is your intellectual property. We're trusting you here, please don't post content that doesn't belong to you unless you have express permission by the copywrite holder. Violating this rule may result in banishment from the land. There, you've been warned. Now, for those sad individuals that are tempted to steal work from others: Don't do it here! The consequences aren't pretty. In addition to contracting parasitic worms in your intestines, you'll be banished from the land AND shot into space. Stealing is <em>that</em> uncool!</p>
  </div>
  <div class="modal-footer">
    
  </div>
</div>