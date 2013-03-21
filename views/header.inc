<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Medea Labs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A community of creative people sharing ideas">
    <meta name="author" content="Brandan Majeske">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Duru+Sans|Open+Sans:600italic|Prosto+One|Audiowide' rel='stylesheet' type='text/css'>
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.js"></script>
    <![endif]-->
    
    </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">Medea Labs</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="home.php">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="nav pull-right">
              <?php if(!empty($_SESSION['username'])){
                  // if user is logged in show the logout button
                  echo '<li><a href="logout.php">Log Out</a></li>';
              } else {
                  // if a user is not logged in show the sign in button
                 echo'<li><a href="auth.php">Sign In</a></li>';
              } ?>          
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">