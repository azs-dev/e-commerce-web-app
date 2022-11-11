<?php
session_start();
if (!isset($_SESSION['m_id'])) {
  session_unset();
  session_destroy();
  header("Location:../../index.php?noaccess");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- head -->
  <head>
    <?php
      include_once '../../element/merchant/merchanthead.element.php';
     ?>
    <title>merchant home.</title>
    <!-- CHART -->

    <!-- END OF CHART -->
  </head>
  <!-- end of head -->
  <body>

    <!--navbar -->
    <?php
    include_once '../../element/merchant/merchantnav.element.php';
    ?>
    <!--navbar-->
    <div class="wrapper">
      <!-- sidebar -->
    <?php
    include_once '../../element/merchant/merchantside.element.php';
    ?>
    <!-- sidebar -->
    <!-- CONTENT GOES HERE -->
    <div class="container" style="margin-left: 260px; margin-top: 50px;">
      <div class="header"><h1>Dashboard</h1></div>
      <?php
      include_once '../../element/merchant/merchantchart.element.php';
      ?>
      <!-- table -->
      <h3 class="ml-2 mt-5" style="color:blue;">Transaction Chart</h3>
      <div id="chartContainer" class="mt-4" style="height: 370px; width: 95%;"></div>
      <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
      <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

      <h3 class="ml-2 mt-5" style="color:blue;">Transactions Table</h3>
      <div class="table-prod table-responsive table-wrapper-scroll mt-5 aziz-table">
        <table class="table table-striped">
          <thead class="thead-dark sticky">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Buyer</th>
              <th scope="col">Date Sold</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $merchantId = $_SESSION['m_id'];
            $data = new ChartCntrl;
            $data->TableDataCntrl($merchantId);
            ?>
      </tbody>
    </table>
      </div>
      <!-- end of table -->
      <h3 class="ml-2 mt-5" style="color:blue;">Summary</h3>
      <div class="row mt-4 mb-5">
        <div class="col-4">
          <p>Last 7 days:</p>
          <span style="font-size: 25px; margin-right:10px;">₱
          <?php
            $merchantId = $_SESSION['m_id'];
            $data = new ChartCntrl;
            $data->SevenDaysCntrl($merchantId);
          ?>
        </span>
        </div>
        <div class="col-4">
          <p>Last 30 days:</p>
          <span style="font-size: 25px;">₱
            <?php
              $merchantId = $_SESSION['m_id'];
              $data = new ChartCntrl;
              $data->ThirtyDaysCntrl($merchantId);
            ?>
          </span>
        </div>
        <div class="col-4">
          <p>Last 30 days:</p>
          <span style="font-size: 25px;">₱
            <?php
              $merchantId = $_SESSION['m_id'];
              $data = new ChartCntrl;
              $data->TotalDaysCntrl($merchantId);
            ?>
          </span>
        </div>
      </div>
    </div>
  </div>

  </body>
</html>
<script>
