<?php

class Products extends Dbh {

  protected function myProducts($merchantId) {
    $viewProducts = new ProductsView;
    $sql = "SELECT * FROM products_t WHERE m_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$merchantId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      for ($i=0; $i < sizeof($results); $i++) {
        $viewProducts->myProductsView($results[$i]['p_name'], $results[$i]['p_price'], $results[$i]['p_description']);
      }
		} else {
      $viewProducts->NoProducts();
    }
  }

  protected function viewAllProducts() {
    $viewProducts = new ProductsView;
    $sql = "SELECT merchants_t.m_name, products_t.p_id, products_t.m_id, products_t.p_name,
    products_t.p_price, products_t.p_description
    FROM `products_t` LEFT JOIN merchants_t
    ON products_t.m_id = merchants_t.m_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      for ($i=0; $i < sizeof($results); $i++) {
        $viewProducts->allProductsView($results[$i]['m_name'], $results[$i]['m_id'],
        $results[$i]['p_id'], $results[$i]['p_name'], $results[$i]['p_price'], $results[$i]['p_description']);
      }
		} else {
      $viewProducts->allProductsNone();
    }
  }

  protected function addProducts($name, $price, $description, $mid) {
    $viewProducts = new ProductsView;
    $sql = "INSERT INTO products_t(m_id, p_name, p_price, p_description) VALUES (?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$mid, $name, $price, $description]);
    $viewProducts->addProductsView();
  }

}
