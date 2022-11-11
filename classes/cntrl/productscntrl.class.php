<?php

class ProductsCntrl extends Products {
  public function myProductsCntrl($merchantId) {
     $results = $this->myProducts($merchantId);
   }

   public function addProductsCntrl ($productName, $productPrice, $productDescription, $merchantId) {
     $this->addProducts($productName, $productPrice, $productDescription, $merchantId);
   }

   public function allProductsCntrl() {
     $this->viewAllProducts();
   }
}
