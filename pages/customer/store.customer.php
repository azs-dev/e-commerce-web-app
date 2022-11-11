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
  <!-- head -->
  <head>
  <?php
    include_once '../../element/customer/customerhead.element.php';
   ?>
   <title>products.</title>
 </head>
  <!-- end of head -->
  <body>
    <!--navbar -->
    <?php
    include_once '../../element/customer/customernav.element.php';
    ?>
    <!--navbar-->
    <!-- sidebar -->
    <?php
    include_once '../../element/customer/customerside.element.php';
    ?>
    <!-- sidebar -->
     <!-- CONTENT GOES HERE -->
     <div class="container" style="margin-left: 260px; margin-top: 50px;">
       <div class="header"><h1>STORE</h1></div>
       <!-- cards -->
       <div class="store-products">
         <?php
         $allProducts = new ProductsCntrl;
         $allProducts->allProductsCntrl();
        ?>
       </div>
       <!-- end of cards -->
    </div>

  </body>
</html>
