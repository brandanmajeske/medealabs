<?php 
$username = $_SESSION['username'];

if(isset($_GET['your_projects'])){
	$search_label = 'Search Your Projects';
	$search_js = 'search_projects.js';
}else if(isset($_GET['your_posts'])){
	$search_label = 'Search Your Posts';
	$search_js = 'search_posts.js';

}


?>
<!-- header -->
<div class="page-header">
	<!-- tablet/phone menu -->

<div class="btn-group btn-large hidden-desktop pull-right">
  <button class="btn btn-large disabled">Actions</button>
  <button class="btn btn-large dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
	<li /><a href="create_project.php">Create A Project</a>
	<li /><a href="search.php">Search All Projects</a>
	<li /><a href="search.php?your_projects">Search Your Projects</a>
	<li /><a href="search.php?your_posts">Search Your Posts</a>
	<li /><a href="profile.php">Edit Your Profile</a>
  </ul>
  </div>
<h1>Project Search</h1>
</div>
<div>


<!-- body / desktop menu -->

<!-- end menu -->
<div class="clearfix"></div>

<!-- visible on tablet - phone -->

<!-- visible on desktop -->
<div class="container-fluid">
<div class="row-fluid">
<div class="span9">

<div class="live_search">
<div id="searcharea">
	<label for="search"><?php echo $search_label ?></label>
	<input class="span12" type="search" name="search" id="search" placeholder="Category or Keyword" />

</div>
</div>
<div id="update"></div>
<script src="js/jquery.js"></script>
<script src="js/<?php echo $search_js; ?>"></script>
</div> <!-- end live_search -->

<div class="span3 visible-desktop user_menu">
	<ul class="nav nav-list">
	  	<li class="nav-header">User Menu</li>
		<li /><a href="create_project.php">Create A Project</a>
		<li /><a href="search.php">Search All Projects</a>
		<li /><a href="search.php?your_projects">Search Your Projects</a>
		<li /><a href="search.php?your_posts">Search Your Posts</a>
		<li /><a href="profile.php">Edit Your Profile</a>
	</ul>
	</div>
</div>
</div>