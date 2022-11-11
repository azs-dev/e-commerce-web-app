<?php
session_start();
include 'autoloader.inc.php';

// Getting DATA via post
$email = $_POST['email'];
$name = $_POST['firstname']." ".$_POST['lastname'];
$address = $_POST['city']." ".$_POST['address']." ".$_POST['address2'];
$phone = $_POST['phone'];
$totalprice = $_POST['totalprice'];


$productArr = $_POST['productArr']; // Load sent Array of products
$product = new CheckoutCntrl; //create object for controller
$customerId = $_SESSION['c_id']; //get session
$date = date("Y-m-d"); // get date
$product->CheckoutController($productArr, $customerId, $date, $email, $name, $address, $phone, $totalprice); // send data to controller

?>
