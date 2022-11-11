<?php
include 'autoloader.inc.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = new UsersCntrl();
$user->LogIn($username, $password);

?>
