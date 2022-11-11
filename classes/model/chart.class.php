<?php

class Chart extends Dbh {

  protected function GetData ($merchantId) {
    $view = new ChartView;
    $sql = "SELECT products_t.p_price, sold_t.date_sold
    FROM sold_t LEFT JOIN products_t
    ON products_t.p_id = sold_t.p_id
    WHERE products_t.m_id = ?
    ORDER BY date_sold";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$merchantId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      $view->DataView($results);
    }
  }

  protected function TableData($merchantId) {
    $view = new ChartView;
    $sql = "SELECT products_t.p_name, products_t.p_price,
            customers_t.c_name, sold_t.date_sold
            FROM sold_t LEFT JOIN products_t
            ON products_t.p_id = sold_t.p_id
            LEFT JOIN customers_t
            ON sold_t.c_id = customers_t.c_id
            WHERE products_t.m_id = ?
            ORDER BY date_sold";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$merchantId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      $view->TableDataView($results);
    }
  }

  protected function SevenDaysData($merchantId) {
    $total = 0;
    $view = new ChartView;
    $sql = "SELECT products_t.p_price FROM sold_t
            LEFT JOIN products_t
            ON products_t.p_id = sold_t.p_id
            WHERE (date_sold >= DATE(NOW()) + INTERVAL -7 DAY
            AND date_sold <  DATE(NOW()) + INTERVAL  1 DAY)
            AND products_t.m_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$merchantId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      for ($i=0; $i < sizeof($results); $i++) {
        $total = $total + $results[$i]['p_price'];
      }
    }
    $view->SevenDaysView($total);
  }

  protected function ThirtyDaysData($merchantId) {
    $total = 0;
    $view = new ChartView;
    $sql = "SELECT products_t.p_price FROM sold_t
            LEFT JOIN products_t
            ON products_t.p_id = sold_t.p_id
            WHERE (date_sold >= DATE(NOW()) + INTERVAL -30 DAY
            AND date_sold <  DATE(NOW()) + INTERVAL  1 DAY)
            AND products_t.m_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$merchantId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      for ($i=0; $i < sizeof($results); $i++) {
        $total = $total + $results[$i]['p_price'];
      }
    }
    $view->ThirtyDaysView($total);
  }

  protected function TotalDaysData($merchantId) {
    $total = 0;
    $view = new ChartView;
    $sql = "SELECT products_t.p_price FROM sold_t
            LEFT JOIN products_t
            ON products_t.p_id = sold_t.p_id
            WHERE  products_t.m_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$merchantId]);
    $results = $stmt->fetchAll();

    if (!empty($results)) {
      for ($i=0; $i < sizeof($results); $i++) {
        $total = $total + $results[$i]['p_price'];
      }
    }
    $view->TotalDaysView($total);
  }

}
