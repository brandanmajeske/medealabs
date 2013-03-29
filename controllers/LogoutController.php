<?php
session_start();
// unset the user session and regenerate the session id
unset($_SESSION['userInfo']);
unset($_SESSION['username']);
session_regenerate_id(true);
//redirect to the index page
header('Location: index.php');
exit;