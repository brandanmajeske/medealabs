<?php
session_start();

unset($_SESSION['userInfo']);
unset($_SESSION['username']);
session_regenerate_id(true);

header('Location: index.php');
exit;