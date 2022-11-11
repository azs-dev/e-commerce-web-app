<div class="modal fade" id="cartModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Shopping Cart</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="container">
            <form action="../../pages/customer/checkout.customer.php." method="POST" enctype="multipart/form-data">
            <?php
            $customerId = $_SESSION['c_id'];
 					  $cartItems = new CartCntrl;
 					  $cartItems->getCartItemsCntrl($customerId);
            ?>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="row">
            <div class="col">
              Total:  <strong style="font-size:25px;">₱
              <?php
               $customerId = $_SESSION['c_id'];
               $totalPrice = new CartCntrl;
               $totalPrice->getTotalPriceCntrl($customerId);

              ?></strong>
            </div>
          </div>
          <button type="submit" name="submit" value="submit" class="btn btn-outline-success btn-md">Checkout</button>
        </div>
      </form>
      </div>
    </div>
  </div>
