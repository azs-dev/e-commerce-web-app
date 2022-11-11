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
   <title>products.</title>
 </head>
  <!-- end of head -->
  <body>

    <!--navbar -->
    <?php
    include_once '../../element/merchant/merchantnav.element.php';
    ?>
    <!--navbar-->
    <!-- sidebar -->
    <?php
    include_once '../../element/merchant/merchantside.element.php';
    ?>
    <!-- sidebar -->
     <!-- CONTENT GOES HERE -->
     <div class="container" style="margin-left: 260px; margin-top: 50px;">
       <div class="header"><h1>My Products<button class="btn btn-outline-primary" data-toggle="modal"
         data-target="#addProductModal">Add Product</button></h1></div>
       <!-- ADD PRODUCT MODAL -->
      <?php
        include_once '../../element/merchant/merchantproductmodal.element.php';
        ?>
        <!-- END PRODUCT MODAL -->
        <!-- https://stackoverflow.com/questions/30472552/create-modal-when-table-row-was-clicked/30472754 MODAL FOR TABLE DELETE-->
      <div class="table-responsive">
        <table class="table table-prod table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody>
        <?php
        $myProducts = new ProductsCntrl;
        echo $myProducts->myProductsCntrl($_SESSION['m_id']);
        ?>
      </tbody>
    </table>
      </div>
    </div>

  </body>
</html>
