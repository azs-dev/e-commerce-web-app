<?php

class CheckoutView extends Checkout {

  public function CheckoutViewer() {
    echo "<script>
        window.location.replace('../pages/customer/home.customer.php');
        alert('Checkout success! Please check your email for the invoice.');
    </script>";
  }
}
