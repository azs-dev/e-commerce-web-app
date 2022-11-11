<?php

class Cart extends Dbh {

  protected function addToCart($customerId,$productId,$productName,$productPrice){
    $cartView = new CartView;
    $sql = "INSERT into cart_t (c_id, p_id, p_name, p_price) VALUES (?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$customerId,$productId,$productName,$productPrice]);
    $cartView->addToCartView();
  }

  protected function numberOfItems($customerId){
    $cartView = new CartView;
    $sql = "SELECT COUNT(p_id) COUNT from cart_t WHERE c_id = ?";
    $stmt = $this->connect()->prepare($sql);
		$stmt->execute([$customerId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      for ($i=0; $i < sizeof($results); $i++) {
        $cartView->numberOfItemsView($results[$i]['COUNT']);
      }
		} else {
      $cartView->numberoffItemsViewNone();
    }
  }

  protected function getCartItems($customerId) {
    $cartView = new CartView;
    $sql = "SELECT customers_t.c_email, cart_t.p_id, cart_t.p_name, cart_t.p_price
            FROM cart_t
            LEFT JOIN customers_t
            ON cart_t.c_id = customers_t.c_id
            WHERE cart_t.c_id = ?";
    $stmt = $this->connect()->prepare($sql);
		$stmt->execute([$customerId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      for ($i=0; $i < sizeof($results); $i++) {
        $cartView->getCartItemsView($results[$i]['c_email'], $results[$i]['p_id'],
        $results[$i]['p_name'], $results[$i]['p_price']);
      }
    } else {
      $cartView->getCartItemsViewNone();
    }
  }

  protected function getTotalPrice($customerId){
    $cartView = new CartView;
      $sql = "SELECT cart_t.p_price
              FROM cart_t
              LEFT JOIN customers_t
              ON cart_t.c_id = customers_t.c_id
              WHERE cart_t.c_id = ?";
    $stmt = $this->connect()->prepare($sql);
		$stmt->execute([$customerId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      $totalPrice = 0;
      for ($i=0; $i < sizeof($results); $i++) {
        $totalPrice = $totalPrice + $results[$i]['p_price'];
      }
      $cartView->getTotalPriceView($totalPrice);
    }
  }

  protected function cartItemsCheckout($customerId){
    $cartView = new CartView;
    $sql = "SELECT customers_t.c_email, cart_t.p_id, cart_t.p_name, cart_t.p_price, products_t.p_description
            FROM cart_t
            LEFT JOIN customers_t
            ON cart_t.c_id = customers_t.c_id
            LEFT JOIN products_t
            ON products_t.p_id = cart_t.p_id
            WHERE cart_t.c_id = ?";
    $stmt = $this->connect()->prepare($sql);
		$stmt->execute([$customerId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      for ($i=0; $i < sizeof($results); $i++) {
        $cartView->cartItemsCheckoutView($results[$i]['c_email'], $results[$i]['p_id'],
        $results[$i]['p_name'], $results[$i]['p_price'], $results[$i]['p_description'], $i);
      }
    } else {
      $cartView->cartItemscheckoutViewNone();
    }
  }

}
