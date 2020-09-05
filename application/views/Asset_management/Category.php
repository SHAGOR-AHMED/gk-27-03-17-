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
                  <form action="" method="POST" id="add_category">
                      <div class="col-md-3"></div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="add_input_category">Category name <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="add_input_category" name="add_input_category" placeholder="Enter category name" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm"  value="Save">
                        </div>
                      </div>
                  </form>
              </div>
              <div class="row">
                  <form action="" method="POST" id="update_category" style="display:none;">
                      <div class="col-md-3"></div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="update_input_category">Category name <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="update_input_category" name="update_input_category" placeholder="Enter category name" required>
                            <input type="hidden" id="asset_cat_id" name="asset_cat_id" value="">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm"  value="Update">
                            <input type="button" class="btn btn-warning btn-sm"  value="Cancel" onclick="show_asset_add_form();">
                        </div>
                      </div>
                  </form>
              </div>
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table">
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                      <tbody id="asset_category_list">
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