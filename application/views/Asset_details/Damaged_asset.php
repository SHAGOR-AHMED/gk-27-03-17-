<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Search Damaged Asset</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Search Damaged Asset</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body color-black">
              <div class="row">
                <form action="<?= base_url('damaged_asset'); ?>" method="GET">
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
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="branch">Branch <span class="text-red">*</span></label>
                        <select class="form-control" name="branch" id="branch" onchange="getSomitiList(this);" required>
                          <option value="">Select Branch</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="location">Location </label>
                        <select class="form-control" name="location" id="location">
                          <option value="">Select location</option>
                          <?php if(!empty($asset_locationList)){ foreach ($asset_locationList as $location) {
                            echo '<option value="'. $location->id .'">'.$location->name.'</option>';
                          }} ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="search" class="sr-only">search</label>
                      <br/>
                      <input type="submit" class="btn btn-primary" value="Search" style="margin-top:7px;">
                    </div>
                  </div> 
                </form>
              </div>

                  <table id="members_list_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Damaged Qty</th>
                        <th>Unit price</th>
                        <th>Damaged date</th>
                        <th>Used by</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($assetList)){ foreach ($assetList as $asset) { ?>
                        <tr>
                          <td><?= $asset->subCatName; ?></td>
                          <td><?= $asset->quantity; ?></td>
                          <td><?= $asset->damaged_asset_quantity; ?></td>
                          <td><?= $asset->unit_price; ?></td>
                          <td><?= $asset->damaged_date; ?></td>
                          <td><?= $asset->asset_used_by; ?></td>
                          <td><?= $asset->description; ?></td>
                        </tr>
                      <?php } } ?>
                    </tbody>
                  </table>        


            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                <span>
                  <p id="message" class="pull-right"></p>
                </span> 
              </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>