<?php 
$welcomemsg = $data2;
$username = $_SESSION['username'];
$rows = $data;

?>

<!-- header -->
<div class="page-header">
<h1><?php echo ucfirst($username);?>'s Home Page
</h1>
<h2><small><?php echo $welcomemsg; ?></small></h2>
</div>

<!-- body / menu -->

<div class="container-fluid">
<div class="row-fluid">
<div class="span2">
<!--Sidebar content-->
<div> <!-- user menu -->
<h4 class="muted">User Menu</h4>
<ul class="muted">
	<li><a href="create_project.php">Create Project</a></li>
	<li><a href="#">Search Projects</a></li>
	<li><a href="#">Something Else</a></li>
	<li><a href="profile.php">Edit Your Profile</a></li>
</ul>
</div> <!-- end user menu -->

</div>
<div class="span10">
<div class="well">
<?php 
	
	foreach($rows as $num => $row){
		$proj_title = $row['proj_title'];
		$proj_id = $row['proj_id'];
		echo '<p><a class="btn btn-large btn-block btn-warning" href="project.php?id='.$proj_id.'">'.$proj_title. ' &raquo;</a></p>';
	}	

?>

</div>
</div>
</div>