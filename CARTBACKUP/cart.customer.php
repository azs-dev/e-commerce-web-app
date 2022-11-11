<?php
session_start();
if (!isset($_SESSION['c_id'])) {
  session_unset();
  session_destroy();
  header("Location:../../index.php?noaccess");
  exit();
}
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
@media (min-width: 1200px) {
    .container{
        max-width: 700px;
    }
}
</style>

<div class="container" style="margin-top:30px; margin-bottom: 60px;">
	<div class="row">
			<div class="panel panel-primary">
				<!-- HEADING -->
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h4><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h4>
							</div>
						</div>
					</div>
				</div>
				<!-- END OF HEADING -->
				<div class="panel-body">
					<form action='payment.customer.php' method="post">
					<?php
					 include '../../includes/autoloader.inc.php';
					 $customerId = $_SESSION['c_id'];
					 $cartItems = new CartCntrl;
					 $cartItems->getCartItemsCntrl($customerId);
					?>
				<!-- FOOTER -->
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total:<strong id=total>
								<?php
								 $customerId = $_SESSION['c_id'];
								 $totalPrice = new CartCntrl;
								 $totalPrice->getTotalPriceCntrl($customerId);
								?>
							</strong></h4>
						</div>
						<div class="col-xs-3">
							<button type="submit" class="btn btn-success btn-block">
								Checkout
							</button>
						</form>
						</div>
					</div>
				</div>
			</form>
				<!-- END OF FOOTER -->
			</div>
		</div>
</div>
