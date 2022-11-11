<?php

class ChartCntrl extends Chart {

  public function DataCntrl($merchantId) {
    $this-> GetData($merchantId);
  }

  public function TableDataCntrl($merchantId) {
    $this-> TableData($merchantId);
  }

  public function SevenDaysCntrl($merchantId) {
    $this->SevenDaysData($merchantId);
  }

  public function ThirtyDaysCntrl($merchantId) {
    $this->ThirtyDaysData($merchantId);
  }

  public function TotalDaysCntrl($merchantId) {
    $this->TotalDaysData($merchantId);
  }
}
