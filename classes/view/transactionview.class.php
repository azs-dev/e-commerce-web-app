<?php

class TransactionView extends Transaction {

  public function TableView($results) {
    for ($i=0; $i < sizeof($results) ; $i++) {
      echo "<tr>
              <td>".$results[$i]['p_name']."</td>
              <td>".$results[$i]['p_price']."</td>
              <td>".$results[$i]['m_name']."</td>
              <td>".$results[$i]['date_sold']."</td>
            </tr>";
    }
  }

  public function SummaryDaysView($total) {
    echo $total;
  }
}
