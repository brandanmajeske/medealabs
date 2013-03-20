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
<p>
Project ID: <?php echo $proj_id; ?><br />
Project Author: <?php echo ucwords($user_name); ?><br />
Category: <?php echo ucfirst($proj_cat); ?><br />
Date Created: <?php echo $proj_date; ?><br />
Description: <?php echo ucfirst($proj_desc); ?></p>
<p><a href="post.php?proj_id=<?php echo $proj_id; ?>">Contribute to Project</a><p>

</div>

<!-- Posts involving this project go here. -->




<?php 

	// if posts is empty don't show the div for the posts, else show the posts div
	if(!empty($posts)){

		echo '<div class="posts">';

		//$i = 0; <- for uses with accordions

		//foreach post get the variables and display the files
		foreach($posts as $post){
		$post_title = ucwords($post['post_title']);
		$post_text = $post['post_text'];
		$post_author = ucfirst($post['user_name']);
		$timestamp = strtotime($post['post_date']);
		$post_date = date('M dS Y - h:i A', $timestamp);
		$post_file = $post['post_file'];
		//$i++;
		
		echo '<div class="single_post">
				<div class="post_header">
				<h4>'.$post_title.'</h4></div>';
		echo '<div class="post_container">';		
		if(!empty($post_file)){
			echo '<img class="post_image" src="uploads/'.$post_file.'" alt="'.$post_title.' image" />';
		}

		echo '<p class="post_text">'.$post_text.'</p>';
		echo '<p class="muted post_text">Author: '.$post_author.'<br/>Posted on: '.$post_date.'</p></div>';
	}
	echo '</div><!-- end post_container -->';
	echo '</div><!-- end posts -->';
	} // end if


		
?>


