<?php

class ProductsView extends Products {

  public function myProductsView($name, $price, $description) {
    echo "<tr>
            <th>".$name."</th>
            <td>".$price."</td>
            <td>".$description."</td>
          </tr>";
  }

  public function allProductsView($merchantName, $merchantId, $productId, $productName, $productPrice, $productDescription) {
    echo "<div class='card'>
       <img src='../../images/logo.png' style='width:55%; margin:auto'>
       <form action='../../includes/addtocart.inc.php' method='post'>
       <h4>".$productName."</h4>
       <p class='product-seller'>".$productDescription."</p>
       <p class='product-price'>₱ ".$productPrice."</p>
       <p class='product-seller'>seller: ".$merchantName."</p>
       <input type='hidden' name='customerId' value=".$_SESSION['c_id'].">
       <input type='hidden' name='productId' value=".$productId.">
       <input type='hidden' name='merchantId' value=".$merchantId.">
       <input type='hidden' name='productName' value=".$productName.">
       <input type='hidden' name='productPrice' value=".$productPrice.">
       <p><button type='submit'>Add to Cart</button></p>
       </form>
     </div>";
  }

  public function allProductsNone(){
    echo "<h3 class='mt-4'>No one has posted a product yet.</h3>";
  }

  public function NoProducts() {
    echo "<h3>You have no products yet.</h3>";
  }

  public function addProductsView() {
    header("Location:../pages/merchant/products.merchant.php");
  }
}
