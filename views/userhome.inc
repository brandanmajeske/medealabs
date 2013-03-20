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
<h4 class="muted">User Menu</h4>
<ul class="muted">
	<li><a href="create_project.php">Create Project</a></li>
	<li><a href="#">menu item</a></li>
	<li><a href="#">menu item</a></li>
	<li><a href="#">menu item</a></li>
</ul>


</div>
<div class="span10">
<div class="well">
<p class="muted">Note: Dynamically generated user content will display here</p>
<?php 
	
	foreach($rows as $num => $row){
		$proj_title = $row['proj_title'];
		$proj_id = $row['proj_id'];
		echo '<a href="project.php?id='.$proj_id.'">'.$proj_title. '</a><br />';
	}	

?>

</div>

<p><a href="itemview.php?itemview=item">View Item Detail &raquo;</a><p>	</div>
</div>
</div>