<?php session_start();

session_destroy();
$_SESSION = array();

header('Location: login.view.php');
die();

?>