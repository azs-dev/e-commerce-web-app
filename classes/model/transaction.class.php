<?php

class Transaction extends Dbh {

  protected function TableData($customerId) {
    $view = new TransactionView;
    $sql = "SELECT products_t.p_name, products_t.p_price, merchants_t.m_name, sold_t.date_sold
            FROM sold_t
            LEFT JOIN products_t ON products_t.p_id = sold_t.p_id
            LEFT JOIN merchants_t ON products_t.m_id = merchants_t.m_id
            WHERE c_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$customerId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      $view->TableView($results);
    }
  }

  protected function SummaryDays($customerId, $days) {
    $total = 0;
    $view = new TransactionView;
    $sql = "SELECT products_t.p_price FROM sold_t
            LEFT JOIN products_t ON products_t.p_id = sold_t.p_id
            WHERE (date_sold >= DATE(NOW()) + INTERVAL -".$days." DAY
            AND date_sold <  DATE(NOW()) + INTERVAL  1 DAY)
            AND sold_t.c_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$customerId]);
            $results = $stmt->fetchAll();

      if (!empty($results)) {
        for ($i=0; $i < sizeof($results); $i++) {
          $total = $total + $results[$i]['p_price'];
        }
      }
      $view->SummaryDaysView($total);
  }

  protected function TotalDays($customerId){
    $total = 0;
    $view = new TransactionView;
    $sql = "SELECT products_t.p_price FROM sold_t
            LEFT JOIN products_t ON products_t.p_id = sold_t.p_id
            WHERE sold_t.c_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$customerId]);
            $results = $stmt->fetchAll();

      if (!empty($results)) {
        for ($i=0; $i < sizeof($results); $i++) {
          $total = $total + $results[$i]['p_price'];
        }
      }
      $view->SummaryDaysView($total);
  }
}
