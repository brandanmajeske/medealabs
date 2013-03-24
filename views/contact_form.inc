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
	if(isset($_GET['report_post'])){
		$report_post = $_GET['report_post'];
		$abuse_message = 'Post: '.$report_post.' has been flagged for violation of Terms of Service';
		$subHeader = 'Report Abuse';
	}
	
	if(isset($_GET['report_proj'])){
		$report_post = $_GET['report_proj'];
		$abuse_message = 'Project: '.$report_post.' has been flagged for violation of Terms of Service';
		$subHeader = 'Report Abuse';
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
		
		<?php 

			if(!empty($report_post)){
				echo'<label for="message">Message:</label>
			<textarea name="message" id="message">'.$abuse_message.'</textarea>
			<br />';

			}else if(!empty($report_post)){
				echo'<label for="message">Message:</label>
			<textarea name="message" id="message">'.$abuse_message.'</textarea>
			<br />';

			}else{
			
			echo '<label for="message">Message:</label>';
			echo '<textarea name="message" id="message">';
			if(isset($_POST['message']) === true ) {echo strip_tags($_POST['message']);}
			echo'</textarea><br />';
			}
		?>

		<input type="submit" class="btn btn-warning" value="Send">

	</p>
</form>