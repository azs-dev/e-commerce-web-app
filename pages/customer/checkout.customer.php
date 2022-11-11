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
<html>
<head>
	<title>aziz's project.</title>
	<link rel="icon" type="image/png" href="../../images/logo.png"/> <!-- logo -->
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css"> <!-- bootstrap's css -->
	<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script> <!-- bootstrap's js -->
	<link rel="stylesheet" type="text/css" href="../../css/style.css"> <!-- my own css -->

</head>
<body>
    <div class="leftnavco">
      <div class="container">
        <div class="header">
          <h1 class="mb-4">Project Checkout</h1>
        </div>
          <div class="content ml-2">
<!-- FORM --><form action="../../includes/checkout.inc.php" method="post">
              <label><h5>Contact Information</h5></label>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
              </div>
              <!-- shipping info -->
              <label class="mt-3"><h5>Shipping Address</h5></label>
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="First name" name="firstname" required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Last name" name="lastname" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" placeholder="Address" name="address" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Appartment, suite, etc." name="address2">
              </div>
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="City" name="city" required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Phone" name="phone" required>
                </div>
              </div>
              <!-- payment -->
              <label class="mt-5"><h5>Payment Information</h5></label>
              <div class="form-group">
                <label for="inputState">Card Type</label>
                <select id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <option selected>Visa</option>
                  <option selected>Mastercard</option>
                </select>
              </div>
              <div class="row">
                <div class="col-7">
                  <input type="text" class="form-control" placeholder="Card Number" required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Security Code" required>
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-outline-primary mt-4">Place Order</button>
          </div>
      </div>
    </div>
    <div class="rightnavco">
      <div class="container mt-5">
        <!-- ITEMS -->
        <?php
        include '../../includes/autoloader.inc.php';
        $customerId = $_SESSION['c_id'];
        $cartItems = new CartCntrl;
        $cartItems->cartItemsCheckoutcntrl($customerId);
         ?>
        <!-- FOOTER -->
        <hr>
        <div class="row mt-3">
          <div class="col-7 mt-1">
            <h4>Total</h4>
          </div>
          <div class="col-1 mt-1">
            <span style="font-size:12px;">PHP:</span>
            </div>
          <div class="col">
              <span style="font-size: 25px;">₱
              <?php
               $customerId = $_SESSION['c_id'];
               $totalPrice = new CartCntrl;
               $totalPrice->getTotalPriceCntrl($customerId);
              ?>
            </span>
          </span>
          </div>
        </div>
      </div>
<!-- FORM --></form>
    </div>
  </div>
</body>

</html>
