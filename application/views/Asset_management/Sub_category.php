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
                  <form action="" method="POST" id="add_sub_category">
                      <div class="col-md-3"></div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="category_name">Category name <span class="text-red">*</span></label>
                            <select class="form-control" id="category_name" name="category_name" required>
                              <option value="">Select category</option>
                              <?php if(!empty($categoryList)) { foreach ($categoryList as $category) { ?>
                                <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                              <?php } } ?>
                            </select>
                            <!-- <input type="text" placeholder="Enter location name" > -->
                        </div>
                        <div class="form-group">
                            <label for="sub_category_name">Sub category name <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" placeholder="Enter sub category name" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm"  value="Save">
                        </div>
                      </div>
                  </form>
              </div>
              <div class="row">
                  <form action="" method="POST" id="update_sub_category" style="display:none;">
                    <input type="hidden" name="sub_cat_id" id="sub_cat_id" value="">
                      <div class="col-md-3"></div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="update_category_name">Category name <span class="text-red">*</span></label>
                            <select class="form-control" id="update_category_name" name="update_category_name" required>
                              <option value="">Select category</option>
                              <?php if(!empty($categoryList)) { foreach ($categoryList as $category) { ?>
                                <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                              <?php } } ?>
                            </select>
                            <!-- <input type="text" placeholder="Enter location name" > -->
                        </div>
                        <div class="form-group">
                            <label for="update_sub_category_name">Sub category name <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="update_sub_category_name" name="update_sub_category_name" placeholder="Enter sub category name" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm"  value="Update">
                            <input type="button" class="btn btn-warning btn-sm"  value="Cancel" onclick="show_sub_cat_add_form();">
                        </div>
                      </div>
                  </form>
              </div>
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <table class="table">
                      <tr>
                        <th>#</th>
                        <th>Category name</th>
                        <th>Sub category name</th>
                        <th>Action</th>
                      </tr>
                      <tbody id="asset_sub_cat_list">
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