<?php view('inc.Header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>for <?= (isset($title))? $title : ''; ?></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Create <?= (isset($title))? $title : ''; ?></h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <form action="<?= base_url('create_asset_allocation'); ?>" method="POST">
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="category_name">Category name <span class="text-red">*</span></label>
                      <select class="form-control" id="category_name" name="category_name" onchange="getSubCatList(this);" required>
                        <option value="">Select category</option>
                        <?php if(!empty($categoryList)) { foreach ($categoryList as $category) { ?>
                          <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                        <?php } } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="sub_category_name">Sub category name <span class="text-red">*</span></label>
                      <select class="form-control" id="sub_category_name" name="sub_category_name" required>
                        <option value="">Select category</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="asset_quantity">Quantity <span class="text-red">*</span></label>
                      <select class="form-control" id="asset_quantity" name="asset_quantity" required>
                        <?php for ($i=1; $i <100 ; $i++) { 
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        } ?>
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="reg_branch">Regional Branch <span class="text-red">*</span></label>
                      <select class="form-control" name="reg_branch" id="reg_branch" onchange="getBranchList(this);" required>
                        <option value="">Select Regional Branch</option>
                        <?php if(!empty($regionalbranchList)){ foreach ($regionalbranchList as $reg_branch) {
                          echo '<option value="'. $reg_branch->id .'">'.$reg_branch->name.'</option>';
                        } } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="branch">Branch <span class="text-red">*</span></label>
                      <select class="form-control" name="branch" id="branch" onchange="getSomitiList(this);" required>
                        <option value="">Select Branch</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="location_name">Location</label>
                      <select class="form-control" id="location_name" name="location_name">
                        <option value="">Select location</option>
                        <?php if(!empty($asset_locationList)) { foreach ($asset_locationList as $location) { ?>
                          <option value="<?= $location->id; ?>"><?= $location->name; ?></option>
                        <?php } } ?>
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                  
                  <div class="form-group">
                      <label for="asset_description">Description <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="asset_description" name="asset_description" placeholder="Enter asset description" required>
                  </div>
                  <div class="form-group">
                      <label for="asset_unit_price">Unit price <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="asset_unit_price" name="asset_unit_price" placeholder="Enter asset unit price" required>
                  </div>
                  <div class="form-group">
                      <label for="purchase_date">Purchase date <span class="text-red">*</span></label>
                      <input type="text" class="form-control datepicker"  data-date-format="yyyy-mm-dd" id="purchase_date" name="purchase_date" placeholder="Enter purchase date" value="<?= date('Y-m-d'); ?>" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="issue_date">Issue date <span class="text-red">*</span></label>
                      <input type="text" class="form-control datepicker"  data-date-format="yyyy-mm-dd" id="issue_date" name="issue_date" placeholder="Enter purchase date" value="<?= date('Y-m-d'); ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="asset_used_by">Asset used by <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="asset_used_by" name="asset_used_by" placeholder="Person responsible to the asset" required>
                  </div>
                  <div class="form-group">
                      <a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Back</a>
                      <input type="submit" class="btn btn-primary btn-sm pull-right"  value="Save">
                  </div>
                </div>
            </form>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <div class="form-group">
            <span>
                <?php if (hasFlash('msg')) {?>
                    <span><?= flashMessage('msg')  ?></span>
                <?php } ?>
            </span> 
          </div>
        </div><!-- /.box-footer-->
      </div><!-- /.box -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>