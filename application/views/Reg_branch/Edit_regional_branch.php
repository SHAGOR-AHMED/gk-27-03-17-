<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Regional branch</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        
          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update new Regional Branch</h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
            <?php if(!empty($branch)): ?>
            <form action="<?= base_url('update_reg_branch'); ?>" method="POST">
              <input type="hidden" name="reg_branch_id" value="<?= $branch->id; ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="regional_branch_name">Regional Branch Name</label>
                      <input type="text" class="form-control" id="regional_branch_name" name="regional_branch_name" placeholder="Enter regional branch name" value="<?= $branch->name; ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter address name" value="<?= $branch->address; ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?= $branch->email; ?>">
                  </div>
                  <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no" value="<?= $branch->phone; ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="zilla">District</label>
                      <select class="form-control" name="zilla" id="zilla" onchange="getUpazillaList(this);" required>
                        <?php $zila = find('districts', ['id', 'name'], ['id' => $branch->zila]); ?>
                        <option value="<?= $branch->zila; ?>"><?= $zila->name; ?></option>
                        <?php foreach ($districts as $district) {
                          echo '<option value="'. $district->id .'">'.$district->name.'</option>';
                        } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <?php $upazila = find('upazilas', ['id', 'district_id', 'name'], ['id' => $branch->upazila]);?>
                      <select class="form-control" name="upazilla" id="upazilla" required>
                        <option value="<?= $branch->upazila; ?>"><?= $upazila->name; ?></option>
                        <option value="">Select Upazila</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for=""></label>
                      <a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Back</a>
                      <input type="submit" name="submit" class="btn btn-primary btn-sm pull-right" value="Update">
                  </div>
                  <div class="form-group">
                      <?php if(hasFlash('msg_reg_br')){ ?>
                          <span><?= flashMessage('msg_reg_br'); ?></span>
                      <?php  } ?>
                  </div>
                </div>
              </div>
            </form>
            <?php endif; ?>     
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