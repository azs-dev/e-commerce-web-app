<?php

class CartCntrl extends Cart {
  public function addToCartCntrl($customerId,$productId,$productName,$productPrice){
    $this->addToCart($customerId,$productId,$productName,$productPrice);
  }

  public function numberOfItemsCntrl($customerId) {
    $this->numberOfItems($customerId);
  }

  public function getCartItemsCntrl($customerId) {
    $this->getCartItems($customerId);
  }

  public function getTotalPriceCntrl($customerId){
    $this->getTotalPrice($customerId);
  }

  public function cartItemsCheckoutcntrl($customerId) {
    $this->cartItemsCheckout($customerId);
  }

}
