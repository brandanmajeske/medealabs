<?php
 
$posts = $data2;

$project = $data;
$proj_id = $project['proj_id'];
$proj_title = $project['proj_title'];
$user_name = $project['user_name'];
$proj_cat = $project['proj_cat'];
$proj_desc = $project['proj_desc'];

?>
<div class="page-header project-header">
<h1><?php echo ucwords($proj_title); ?></h1>
</div>
<div>
<p>
Project ID: <?php echo $proj_id; ?><br />
Project Author: <?php echo ucwords($user_name); ?><br />
Category: <?php echo ucfirst($proj_cat); ?><br />
Description: <?php echo ucfirst($proj_desc); ?></p>
</div>

<p><a href="post.php?proj_id=<?php echo $proj_id; ?>">Contribute to Project</a><p>
<!-- Posts involving this project go here. -->


<div class="posts">

<?php 
	$i = 0;
	foreach($posts as $post){
		$post_title = ucwords($post['post_title']);
		$post_text = $post['post_text'];
		$post_author = ucfirst($post['user_name']);
		$timestamp = strtotime($post['post_date']);
		$post_date = date('M dS Y - h:i A', $timestamp);
		$post_file = $post['post_file'];
		$i++;
		echo '<div class="single_post">
				<div class="post_header">
				<h4>'.$post_title.'</h4></div>';
		echo '<div class="post_container">';		
		if(!is_null($post_file)){
			echo '<img class="post_image" src="uploads/'.$post_file.'" alt="'.$post_title.' image" />';
		}

		echo '<p class="post_text">'.$post_text.'</p>';
		echo '<p class="muted post_text">Author: '.$post_author.'<br/>Posted on: '.$post_date.'</p></div>';
	}


	//echo '<div class="accordion" id="post_accordion">';

	/*$i = 0;
	foreach($posts as $post){
		$post_title = ucwords($post['post_title']);
		$post_text = $post['post_text'];
		$post_author = ucfirst($post['user_name']);
		$i++;
		echo '<div class="accordion" id="post_accordion">
		 		<div class="accordion-group">
    			<div class="accordion-heading post_header">
      			<a class="accordion-toggle" data-toggle="collapse" data-parent="#post_accordion" href="#'.$i.'">
				'.$post_title.'
				</a>
				</div>
				<div id="'.$i.'" class="accordion-body collapse in">
					<div class="accordion-inner">
					<p>'.$post_text.'</p>
					<p class="muted post_text">Author: '.$post_author.'</p>
						</div>
					</div>
				</div>
				</div>';

		}// end foreach
	//echo '</div>'; // end accordion*/


?>
</div><!-- end post_container -->
</div><!-- end posts -->
