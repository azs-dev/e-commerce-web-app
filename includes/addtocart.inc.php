<?php
include 'autoloader.inc.php';

$customerId = $_POST['customerId'];
$productId = $_POST['productId'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];

$cart = new CartCntrl;
$cart->addToCartCntrl($customerId,$productId,$productName,$productPrice);

 ?>
