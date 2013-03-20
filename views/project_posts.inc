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
	
	foreach($posts as $post){
		$post_title = ucwords($post['post_title']);
		$post_text = $post['post_text'];
		$post_author = ucfirst($post['user_name']);

		echo '<div class="single_post">
				<div class="post_header">
				<h4>'.$post_title.'</h4></div>';
		echo '<p class="post_text">'.$post_text.'</p>';
		echo '<p class="muted post_text">Author: '.$post_author.'</p></div>';
	}
?>
</div><!-- end posts -->

<!-- future use of the accordion for project posts 

<div class="accordion" id="post_accordion">
	<div class="accordion-group">
	<div class="accordion-heading">
	<a class="accordion-toggle" data-toggle="collapse" data-parent="#post_accordion" href="#collapseOne">
	Collapsible Group Item #1
	</a>
	</div>
	<div id="collapseOne" class="accordion-body collapse in">
	<div class="accordion-inner">
	Anim pariatur cliche...
	</div>
	</div>
</div>
<div class="accordion-group">
	<div class="accordion-heading">
	<a class="accordion-toggle" data-toggle="collapse" data-parent="#post_accordion" href="#collapseTwo">
	Collapsible Group Item #2
	</a>
	</div>
	<div id="collapseTwo" class="accordion-body collapse">
	<div class="accordion-inner">
	Anim pariatur cliche...
	</div>
	</div>
	</div>
</div>

-->