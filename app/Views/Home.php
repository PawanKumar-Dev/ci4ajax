<?= $this->extend('layout/base') ?>

<?= $this->section('content') ?>
<br>
<div class="container">

  <!-- Add Modal Button -->
  <button class="btn btn-success" id="add_product"><i class="fa fa-plus-circle"></i> Add Product</button>

  <!-- Add Modal Begins -->
  <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        </div>
        <div class="modal-body">
          <form id="insert_form">
            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pname-1" class="col-form-label">Product Name</label>
              </div>
              <div class="col-6">
                <input type="text" id="pname-1" class="form-control" name="product_name">
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pbrand-1" class="col-form-label">Product Brand</label>
              </div>
              <div class="col-6">
                <input type="text" id="pbrand-1" class="form-control" name="product_brand">
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pprice-1" class="col-form-label">Product Price</label>
              </div>
              <div class="col-6">
                <input type="number" id="pprice-1" class="form-control" name="product_price">
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pcategory-1" class="col-form-label">Product Category</label>
              </div>
              <div class="col-6">
                <input type="text" id="pcategory-1" class="form-control" name="product_category">
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pimage-1" class="col-form-label">Product Image</label>
              </div>
              <div class="col-6">
                <input type="file" id="pimage-1" class="form-control" name="product_img">
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pdesc-1" class="col-form-label">Product Description</label>
              </div>
              <div class="col-6">
                <textarea id="pdesc-1" class="form-control" name="product_desc"></textarea>
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i> Close</button>
          <button type="submit" class="btn btn-success" data-bs-dismiss="modal" id="save"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Add Modal Ends /-->

  <br><br>
  <!-- Product Table Begins -->
  <div id="showdata"></div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">S.no</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Brand</th>
        <th scope="col">Product Price</th>
        <th scope="col">Product Category</th>
        <th scope="col">Product Description</th>
        <th scope="col">Product Image</th>
        <th scope="col" colspan="2" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody id="showproducts"></tbody>
  </table>
  <!-- Product Table Ends /-->

  <br><br><br>

  <!-- Edit Modal Begins -->
  <div class="modal fade" id="editModalExample" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        </div>
        <div class="modal-body">
          <form id="update_form">
            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pname" class="col-form-label">Product Name</label>
              </div>
              <div class="col-6">
                <input type="text" id="pname" class="form-control" name="product_name">
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pbrand" class="col-form-label">Product Brand</label>
              </div>
              <div class="col-6">
                <input type="text" id="pbrand" class="form-control" name="product_brand">
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pprice" class="col-form-label">Product Price</label>
              </div>
              <div class="col-6">
                <input type="number" id="pprice" class="form-control" name="product_price">
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pcategory" class="col-form-label">Product Category</label>
              </div>
              <div class="col-6">
                <input type="text" id="pcategory" class="form-control" name="product_category">
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pimage" class="col-form-label">Product Image</label>
              </div>
              <div class="col-6">
                <input type="file" id="pimage" class="form-control" name="product_img">
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3">
                <label for="pdesc" class="col-form-label">Product Description</label>
              </div>
              <div class="col-6">
                <textarea id="pdesc" class="form-control" name="product_desc"></textarea>
              </div>
              <div class="col-3">
                <span id="pnameHelpInline" class="form-text">
                  Must be 8-20 characters long.
                </span>
              </div>
            </div>

            <input type="hidden" id="pro_id" name="product_id">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i> Close</button>
          <button type="submit" class="btn btn-success" data-bs-dismiss="modal" id="update"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Add Modal Ends /-->

</div>
<?= $this->endSection() ?>