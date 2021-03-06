<div>
<?php
 
$posts = $data2;

$project = $data;
$proj_id = $project['proj_id'];
$proj_title = $project['proj_title'];
$user_name = $project['user_name'];
$proj_cat = $project['proj_cat'];
$proj_desc = $project['proj_desc'];
$proj_file = $project['proj_file'];
$timestamp = strtotime($project['proj_date']);
$proj_date = date('M dS Y - h:i A', $timestamp);
?>

<div class="page-header project-header">
<h1><?php echo ucwords($proj_title); ?></h1>

</div>
<div>
<?php 
	if(!empty($proj_file)){
			echo '<p><img class="post_image" src="uploads/'.$proj_file.'" alt="'.$proj_title.' image" /></p>';
	}
?>
<div class="clearfix">
<p><a class="btn btn-warning" href="post.php?proj_id=<?php echo $proj_id; ?>">Contribute to Project</a></p>

<p><a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-count="none" data-hashtags="brandanmajeske">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
</div>
<p>
Project ID: <?php echo $proj_id; ?><br />
Project Author: <?php echo ucwords($user_name); ?><br />
Category: <?php echo ucfirst($proj_cat); ?><br />
Date Created: <?php echo $proj_date; ?><br />
Description: <?php echo ucfirst($proj_desc); ?></p>
<p><a href="contact.php?report_proj=<?php echo($proj_id);?>">Report Abuse</a></p>
<div class="clearfix">
	<?php 
	//check if current user is post author, if true present edit | delete options
		if(isset($_SESSION['username']) && $_SESSION['username'] == $project['user_name']){
			echo '<p><a class="label label-info" href="project.php?edit='.$proj_id.'"><i class="icon-edit icon-white"></i> Edit</a>     <a class="label label-important" href="project.php?delete='.$proj_id.'"><i class="icon-trash icon-white"></i> Delete</a></p>';
		}
	?>
</div>
	
</div>


<!-- Posts involving this project go here. -->




<?php 
	
	// if posts is empty don't show the div for the posts, else show the posts div
	if(!empty($posts)){
		
		
		


		echo '<div class="posts">';


		//foreach post get the variables and display the files
		foreach($posts as $post){
		$post_id = $post['post_id'];
		$post_title = ucwords($post['post_title']);
		$post_text = $post['post_text'];
		$post_author = ucfirst($post['user_name']);
		$timestamp = strtotime($post['post_date']);
		$post_date = date('M dS Y - h:i A', $timestamp);
		$post_file = $post['post_file'];
		isset($_SESSION['username'])? $_SESSION['username'] : null;
		
		
		echo '<div class="single_post">
				<div class="post_header">
				<h4>'.$post_title.'</h4></div>';
		echo '<div class="post_container">';		
		if(!empty($post_file)){
			echo '<img class="post_image" src="uploads/'.$post_file.'" alt="'.$post_title.' image" />';
		}
		//check if current user is post author, if true present edit | delete options
		if(isset($_SESSION['username']) && $_SESSION['username'] == $post['user_name']){
			echo '<p><a class="label label-info" href="post.php?edit='.$post_id.'"><i class="icon-edit icon-white"></i> Edit</a>     <a class="label label-important" href="post.php?delete='.$post_id.'"><i class="icon-trash icon-white"></i> Delete</a></p>';
		}

		echo '<p class="post_text">'.$post_text.'</p>';
		echo '<p class="muted post_text">Author: '.$post_author.'<br/>Posted on: '.$post_date.'</p>';
		echo '<p><a href="contact.php?report_post='.$post_id.' by '.$post_author.'">Report Abuse</a></p>';
		echo '</div>';
		
		

	}// end foreach
	echo '</div><!-- end post_container -->';
	echo '</div><!-- end posts -->';
	} // end if
		
?>

</div>
<div class="clearfix"></div>
<div>
	<?php 
		//if there are no posts don't show the bottom 'contribute' button
		if(!empty($posts)){
			echo'<a class="btn btn-warning" 
			href="post.php?proj_id='.$proj_id.'">Contribute to Project</a>';
		}
	?>

</div>