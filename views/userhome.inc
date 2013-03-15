<?php 
$welcomemsg = $data;
$username = $_SESSION['username'];
?>


<div class="page-header">
<h1><?php echo ucfirst($username);?>'s Home Page</h1>
</div>
<div class="well">
<p>Note: Dynamically generated user content will display here</p>
</div>	

<!-- echo $welcomemsg;
echo '<p>Note: Dynamically generated user content will display here</p>'; -->