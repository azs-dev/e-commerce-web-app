<?php

class CheckoutCntrl extends Checkout {

  public function CheckoutController($productArr, $customerId, $date, $email, $name, $address, $phone, $totalprice) {
    $this->CheckOutModel($productArr, $customerId, $date, $email, $name, $address, $phone, $totalprice);
  }
}
