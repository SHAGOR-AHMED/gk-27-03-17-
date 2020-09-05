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
                  <form action="" method="POST" id="add_location">
                      <div class="col-md-3"></div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="location_name">Location name <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="location_name" name="location_name" placeholder="Enter location name" required>
                        </div>
                        <div class="form-group">
                            <label for="location_description">Location description <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="location_description" name="location_description" placeholder="Enter location description" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm"  value="Save">
                        </div>
                      </div>
                  </form>
              </div>
              <div class="row">
                  <form action="" method="POST" id="update_location" style="display:none;">
                      <div class="col-md-3"></div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="update_location_name">Location name <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="update_location_name" name="update_location_name" placeholder="Enter location name" required>
                            <input type="hidden" name="asset_location_id" id="asset_location_id">
                        </div>
                        <div class="form-group">
                            <label for="update_location_description">Location description <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="update_location_description" name="update_location_description" placeholder="Enter location description" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm"  value="Update">
                            <input type="button" class="btn btn-warning btn-sm"  value="Cancel" onclick="show_asset__loc_add_form();">
                        </div>
                      </div>
                  </form>
              </div>
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <table class="table">
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                      <tbody id="asset_location_list">
                          <!-- dynamic data comes here -->
                      </tbody>
                    </table>
                </div>
              </div>
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