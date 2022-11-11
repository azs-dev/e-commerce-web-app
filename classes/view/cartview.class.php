<?php

class CartView extends Cart {

  public function addToCartView() {
    echo "<script>
        window.location.replace('../pages/customer/store.customer.php?itemadded');
    </script>";
  }

  public function numberOfItemsView ($count) {
    echo "<span class='badge badge-pill badge-warning'>".$count."</span>";
  }

  public function numberOfItemsViewNone () {
    echo "";
  }

  public function getCartItemsView ($email, $productId, $productName, $productPrice) {

    echo "<div class='row'>
      <div class='col-2'>
        <img class='img' style='width: 50px; height:50px;'src='../../images/logo.png'>
      </div>
      <div class='col-4'>
        <h5 class='product-name' style='margin-top: 15px; color: #0826C6;'><strong>".$productName."</strong></h5>
      </div>
      <div class='col-2'>
        <h5 class='product-name' style='margin-top: 15px;'><strong>x 1</strong></h5>
      </div>
      <div class='col-4'>
        <h4 style='text-align: center; margin-top:15px;'>₱ ".$productPrice."</h4>
      </div>
    </div>
    <hr>";
  }

  public function getCartItemsViewNone () {
    echo "<div class='row'>
      <h3>Your cart is empty!</h3>
    </div>";
  }

  public function getTotalPriceView($totalPrice){
    echo $totalPrice."<input type='hidden' value=".$totalPrice." name='totalprice'>";
  }

  public function cartItemsCheckoutView($email, $productId, $productName, $productPrice, $productDescription, $counter) {
    echo "<div class='row'>
      <div class='col-2 mt-2'>
        <img class='img' src='../../images/logo.png'>
      </div>
      <div class='col-6 mt-4'>
        <span class='product-name'>".$productName."</span><br>
        <span class='product-description'>".$productDescription."</span>
      </div>
      <div class='col-3 mt-4'>
        <span class='price'>₱ ".$productPrice."</span>
      </div>
      <input type='hidden' value='".$productId."' name='productArr[".$counter."][product]'>
    </div";
  }

  public function cartItemscheckoutViewNone() {
    echo "<div class='row'>
      <h3>Your cart is empty!</h3>
    </div>";
  }

}
