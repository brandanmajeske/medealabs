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
<div class="navbar">
  <div class="navbar-inner">
    <ul class="nav">
    <li><a href="create_project.php">Create A Project</a></li>
	<li><a href="#">Search Projects</a></li>
	<li><a href="#">Your Projects</a></li>
	<li><a href="#">Your Posts</a></li>
	<li><a href="profile.php">Edit Your Profile</a></li>
    </ul>
  </div>
</div>

<div class="container-fluid">

<?php 
	
	foreach($rows as $num => $row){
		$proj_title = $row['proj_title'];
		$proj_desc = $row['proj_desc'];
		$proj_id = $row['proj_id'];
		$proj_file = isset($row['proj_file'])? $row['proj_file'] : null;

		if(!empty($proj_file)){

		echo '<div class="row-fluid span12 user-proj-list">
				<div class="span12">
				<a class="" href="project.php?id='.$proj_id.'"><img class="img-polaroid" src="uploads/'.$proj_file.'"></a>
  				<a href="project.php?id='.$proj_id.'"><h4>'.$proj_title.'</h4></a>
  				<p>'.$proj_desc.'</p>
				</div>	
			</div>';

		} else {

			echo '<div class="row-fluid span12 user-proj-list">
				<div class="span12 pull-left">
  				<a href="project.php?id='.$proj_id.'"><h4>'.$proj_title.'</h4></a>
  				<p>'.$proj_desc.'</p>
				</div>	
			</div>';
		}		
	}

?>
</div>