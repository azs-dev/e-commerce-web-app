<?php
session_start();
if (!isset($_SESSION['c_id'])) {
  session_unset();
  session_destroy();
  header("Location:../../index.php?noaccess");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <?php
    include_once '../../element/customer/customerhead.element.php';
   ?>
  <title>customer home.</title>
</head>
  <body>
    <!--navbar -->
    <?php
    include_once '../../element/customer/customernav.element.php';
    ?>
    <!--navbar-->
    <div class="wrapper">
      <!-- sidebar -->
    <?php
    include_once '../../element/customer/customerside.element.php';
    ?>
    <!-- sidebar -->
    <!-- CONTENT GOES HERE -->
    <div class="container" style="margin-left: 260px; margin-top: 50px;">
      <div class="header"><h1>Dashboard</h1></div>
      <h3 class="ml-2 mt-4" style="color:blue;">Transactions Table</h3>
      <div class="table-prod table-responsive table-wrapper-scroll mt-4 aziz-table">
        <table class="table table-striped">
          <thead class="thead-dark sticky">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Seller</th>
              <th scope="col">Date Bought</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $customerId = $_SESSION['c_id'];
            $data = new TransactionCntrl;
            $data->TableDataCntrl($customerId);
            ?>
      </tbody>
    </table>
      </div>
      <!-- end of table -->
      <h3 class="ml-2 mt-5" style="color:blue;">Summary</h3>
      <div class="row mt-4 mb-5">
        <div class="col-4">
          <p>Total spent last 7 days:</p>
          <span style="font-size: 25px; margin-right:10px;">₱
          <?php
          $customerId = $_SESSION['c_id'];
          $data = new TransactionCntrl;
          $data->SevenDaysCntrl($customerId);
          ?>
        </span>
        </div>
        <div class="col-4">
          <p>Total spent last 30 days:</p>
          <span style="font-size: 25px;">₱
            <?php
            $customerId = $_SESSION['c_id'];
            $data = new TransactionCntrl;
            $data->ThirtyDaysCntrl($customerId);
            ?>
          </span>
        </div>
        <div class="col-4">
          <p>Total Spent:</p>
          <span style="font-size: 25px;">₱
            <?php
            $customerId = $_SESSION['c_id'];
            $data = new TransactionCntrl;
            $data->TotalDaysCntrl($customerId);
            ?>
          </span>
        </div>
      </div>
    </div>

  </body>
</html>
