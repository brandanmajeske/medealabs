<?php 
$welcomemsg = $data2;
$username = $_SESSION['username'];
$rows = $data;

?>

<!-- header -->
<div class="page-header">
	<!-- tablet/phone menu -->

<div class="btn-group btn-large hidden-desktop pull-right">
  <button class="btn btn-warning btn-large disabled">Actions</button>
  <button class="btn btn-warning btn-large dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="create_project.php">Create A Project</a></li>
	<li><a href="#">Search Projects</a></li>
	<li><a href="#">Your Projects</a></li>
	<li><a href="#">Your Posts</a></li>
	<li><a href="profile.php">Edit Your Profile</a></li>
  </ul>
  </div>
<h1><?php echo ucfirst($username);?>'s Home Page
</h1>
<h2><small><?php echo $welcomemsg; ?></small></h2>
</div>

<div>


<!-- body / desktop menu -->

<!-- end menu -->
<div class="clearfix"></div>

<!-- visible on tablet - phone -->

<div class="container-fluid">
<div class="row-fluid hidden-desktop">
<div class="span12">
<?php 
	
	foreach($rows as $num => $row){
		$proj_title = $row['proj_title'];
		$proj_desc = $row['proj_desc'];
		$proj_id = $row['proj_id'];
		$proj_file = isset($row['proj_file'])? $row['proj_file'] : null;

		if(strlen($proj_desc) > 50 ){
			$proj_desc = (substr($proj_desc, 0, 100)).'...';
		}

		if(!empty($proj_file)){

		echo '<div class="user-proj-list">
				<a href="project.php?id='.$proj_id.'"><img class="img-polaroid" src="uploads/'.$proj_file.'"></a>
  				<a href="project.php?id='.$proj_id.'"><h4>'.$proj_title.'</h4></a>
  				<p>'.$proj_desc.'</p>
  				<p class="visible-desktop"><a href="project.php?id='.$proj_id.'">View Details &raquo;</a></p>
          		

			</div>
			<div class="clearfix"></div>	
			';

		} else {

			echo '<div class="user-proj-list">
  				<a href="project.php?id='.$proj_id.'"><h4>'.$proj_title.'</h4></a>
  				<p>'.$proj_desc.'</p>
				</div>
				<div class="clearfix"></div>
			';
		}		
	}

?>
</div>
</div>

<!-- visible on desktop -->
<div class="container-fluid visible-desktop">
<div class="row-fluid">
<div class="span9">
<?php 
	
	foreach($rows as $num => $row){
		$proj_title = $row['proj_title'];
		$proj_desc = $row['proj_desc'];
		$proj_id = $row['proj_id'];
		$proj_file = isset($row['proj_file'])? $row['proj_file'] : null;

		if(strlen($proj_desc) > 50 ){
			$proj_desc = (substr($proj_desc, 0, 100)).'...';
		}

		if(!empty($proj_file)){

		echo '<div class="user-proj-list">
				<a href="project.php?id='.$proj_id.'"><img class="img-polaroid" src="uploads/'.$proj_file.'"></a>
  				<a href="project.php?id='.$proj_id.'"><h4>'.$proj_title.'</h4></a>
  				<p>'.$proj_desc.'</p>
  				<p class="visible-desktop"><a href="project.php?id='.$proj_id.'">View Details &raquo;</a></p>
          		<p class="hidden-desktop pull-right"><a class="btn btn-small btn-info" href="project.php?id='.$proj_id.'">View Details &raquo;</a></p>

			</div><!-- end single project -->
			<div class="clearfix"></div>	
			';

		} else {

			echo '<div class="user-proj-list">
  				<a href="project.php?id='.$proj_id.'"><h4>'.$proj_title.'</h4></a>
  				<p>'.$proj_desc.'</p>
				</div>
				<div class="clearfix"></div>
			';
		}		
	}

?>
</div>
<div class="span3 visible-desktop user_menu">
		<ul class="nav nav-list">
	  	<li class="nav-header">User Menu</li>
	 	<li /><a href="create_project.php">Create A Project</a>
		<li /><a href="#">Search Projects</a>
		<li /><a href="#">Your Projects</a>
		<li /><a href="#">Your Posts</a>
		<li /><a href="profile.php">Edit Your Profile</a>
	</ul>
	</div>
</div>
</div>