<?php

class TransactionCntrl extends Transaction {

  public function TableDataCntrl($customerId) {
    $this->TableData($customerId);
  }

  public function SevenDaysCntrl($customerId) {
    $days = 7;
    $this->SummaryDays($customerId, $days);
  }

  public function ThirtyDaysCntrl($customerId) {
    $days = 30;
    $this->SummaryDays($customerId, $days);
  }

  public function TotalDaysCntrl($customerId) {
    $this->TotalDays($customerId);
  }
}
