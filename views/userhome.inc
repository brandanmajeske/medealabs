<?php 
$welcomemsg = $data;
$username = $_SESSION['username'];
?>


<div class="page-header">
<h1><?php echo ucfirst($username);?>'s Home Page
</h1>
<h2><small><?php echo $welcomemsg; ?></small></h2>
</div>

<div class="well">
<p class="muted">Note: Dynamically generated user content will display here</p>
</div>

<p><a href="itemview.php?itemview=item">View Item Detail &raquo;</a><p>	
