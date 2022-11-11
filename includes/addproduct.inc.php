<?php
session_start();
include 'autoloader.inc.php';

if (isset($_POST['submit'])) {
  $productName = $_POST['name'];
  $productPrice = $_POST['price'];
  $productDescription= $_POST['description'];
  $merchantId = $_SESSION['m_id'];

  $addProduct = new ProductsCntrl;
  $addProduct->addProductsCntrl($productName, $productPrice, $productDescription, $merchantId);
} else {
  echo "ERROR!";
}
