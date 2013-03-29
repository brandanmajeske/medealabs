<?php 
  
  $rows = $data;
  $data_array = $data2;  
  $categories = ($data_array['categories']);

  // message to display when users register for the newsletter
  if(isset($_GET['subscribed'])){
  echo('<div class="alert alert-info">
    <p>You\'ve been registered for the Newsletter!
    </p></div>');
  }
?>

<!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit visible-desktop">
        <div class="hidden-phone"><img class="pull-left" src="img/logo.png" alt="Media Labs Logo" /></div>
        <h1>Media + Ideas</h1>
        <p>A virtual community of creative people sharing their portfolios and ideas for projects ranging from photography or digital art to programming. Join today and grow your ideas!</p>
        <p class="visible-phone"><a href="register.php" class="btn btn-warning">Sign Up &raquo;</a></p>
        <p class="hidden-phone"><a href="register.php" class="btn btn-warning btn-large">Sign Up &raquo;</a></p>
      </div>

      <div class="hero-unit hidden-desktop">
        <div class="hidden-phone span8 offset2"><img class="offset2" src="img/logo.png" alt="Media Labs Logo" /></div>
        <h1>Media + Ideas</h1>
        <p>A virtual community of creative people sharing their portfolios and ideas for projects ranging from photography or digital art to programming. Join today and grow your ideas!</p>
        <p class="visible-phone"><a href="register.php" class="btn btn-warning">Sign Up &raquo;</a></p>
        <p class="hidden-phone"><a href="register.php" class="btn btn-warning btn-large">Sign Up &raquo;</a></p>
      </div>

  <!-- fixed sidemenu for categories of content to view -->

  <!-- dynamically generated content -->

<div class="container-fluid">
<div class="row-fluid">
  <div class="sidebar span12 hidden-desktop">
       <?php if(isset($_SESSION['username'])){
            echo ' <h2>User Links</h2>
            <ul class="sidebar_ul">
            <li class="sidebar_link_separator" /><a href="home.php">User Home</a>
            <li><a href="create_project.php">Create A Project</a></li>
            <li><a href="search.php">Search All Projects</a></li>
            <li><a href="search.php?your_projects">Search Your Projects</a></li>
            <li><a href="search.php?your_posts">Search Your Posts</a></li>
            <li><a href="profile.php">Edit Your Profile</a></li>

             </ul>';
           }?>
       <h2>Categories</h2>
          <ul class="sidebar_ul">
          <li class="all_cats"><a href="index.php">All Categories (Most Recent)</li>

          <?php 
          //loop through each category and display the results
          foreach($categories as $cat){
              echo '<li>'.'<a href="index.php?category='.strtolower($cat['proj_cat']).'">'.htmlentities($cat['proj_cat']).' : ('.$cat['count'].')</a></li>';   
            } 
          ?>
        </ul>
        <!-- News Letter -->
          <h2>Newsletter</h2>
          <ul class="sidebar_ul">
          <li>
            <form action="" method="post">
            <label for="newsletter">Sign Up For Our Newsletter</label>
            <input class="span12" type="text" name="newsletter" id="newsletter" placeholder="name@email.com" /><br />
            <input type="submit" class="btn btn-warning btn-small" value="Submit" />
            </form>
         </li>
        </ul>
    </div>
</div>

  <div class="row-fluid">   
    <div class="span8">
      <h2>Latest Projects</h2>
      <?php 
  
  foreach($rows as $num => $row){
    $proj_title = $row['proj_title'];
    $proj_desc = $row['proj_desc'];
    $proj_id = $row['proj_id'];
    $proj_file = isset($row['proj_file'])? $row['proj_file'] : null;

    if(strlen($proj_desc) > 50 ){
      $proj_desc = (substr($proj_desc, 0, 120)).'...';
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

    <div class="sidebar span4 visible-desktop">
       <?php if(isset($_SESSION['username'])){
            echo ' <h2>User Links</h2>
             <ul class="sidebar_ul">
             <li class="sidebar_link_separator" /><a href="home.php">User Home</a>
              <li><a href="create_project.php">Create A Project</a></li>
              <li><a href="search.php">Search All Projects</a></li>
              <li><a href="search.php?your_projects">Search Your Projects</a></li>
              <li><a href="search.php?your_posts">Search Your Posts</a></li>
              <li><a href="profile.php">Edit Your Profile</a></li>
             </ul>';
           }?>
       <h2>Categories</h2>
          <ul class="sidebar_ul">
          <li class="all_cats"><a href="index.php">All Categories (Most Recent)</li>

          <?php 
          //loop through each category and display the results
          foreach($categories as $cat){
              echo '<li>'.'<a href="index.php?category='.strtolower($cat['proj_cat']).'">'.htmlentities($cat['proj_cat']).' : ('.$cat['count'].')</a></li>';   
            } 
          ?>
          <li class="sidebar_link_separator"></li>
          </ul>
          <!-- News Letter -->
          <h2>Newsletter</h2>
          <ul class="sidebar_ul">
          <li>
            <form action="" method="post">
            <label for="newsletter">Sign Up For Our Newsletter</label>
            <input class="span12" type="text" name="newsletter" id="newsletter" placeholder="name@email.com" /><br />
            <input type="submit" class="btn btn-warning btn-small" value="Submit" />
            </form>
         </li>
        </ul>


           
    </div>
  </div>
</div>       