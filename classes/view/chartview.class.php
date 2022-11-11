<?php

class ChartView extends Chart {

  public function DataView ($results) {
    for ($i=0; $i < sizeof($results) ; $i++) { // Y is to PRICE, X is to DATE

      $year = substr($results[$i]['date_sold'], 0,4);
      $month = substr($results[$i]['date_sold'], 5,2);
      $day = substr($results[$i]['date_sold'], 8,2);
      $month = $month-1;

      echo "{ x: new Date(".$year.", ".$month.", ".$day."), y: ".$results[$i]['p_price']." },";
    }
  }

  public function TableDataView ($results) {
    for ($i=0; $i < sizeof($results) ; $i++) {
      echo "<tr>
              <td>".$results[$i]['p_name']."</td>
              <td>".$results[$i]['p_price']."</td>
              <td>".$results[$i]['c_name']."</td>
              <td>".$results[$i]['date_sold']."</td>
            </tr>";
    }
  }

  public function SevenDaysView ($total) {
    if ($total == null) {
      echo "0";
    } else {
    echo $total;
    }
  }

  public function ThirtyDaysView ($total) {
    if ($total == null) {
      echo "0";
    } else {
    echo $total;
    }
  }

  public function TotalDaysView ($total) {
    if ($total == null) {
      echo "0";
    } else {
    echo $total;
    }
  }
}
