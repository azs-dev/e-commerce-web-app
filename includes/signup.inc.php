<?php
include 'autoloader.inc.php';

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$register = new RegisterCntrl;
$register->DataCntrl($name, $email, $username, $password, $role);

?>
