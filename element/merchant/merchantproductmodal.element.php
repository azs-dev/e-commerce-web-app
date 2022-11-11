<div class="modal fade" id="addProductModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
      <!--modal content HEADER-->
      <div class="modal-header">
        <h3 class="modal-title">Add Product</h3>
        <button type="button btn-md" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- ADD PRODUCT INFORMATION BODY -->
      <form action="../../includes/addproduct.inc.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <h4>Product Name*</h4>
              <input type="text" class="form-control" name="name" required="required">
            </div>
            <div class="form-group">
              <h4>Price*</h4>
              <input type="number" class="form-control" name="price" required="required">
            </div>
            <div class="form-group">
              <h4>Description</h4>
              <input type="text" class="form-control" name="description" required="required">
            </div>
        </div>
        <!--modal footer-->
        <div class="modal-footer">
          <button type="submit" name="submit" value="submit" class="btn btn-outline-success btn-md">Submit</button>
        </div>
        </form>
        <!--end of modal footer-->
    </div>
  </div>
</div>
