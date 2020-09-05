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
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Create <?= (isset($title))? $title : ''; ?></h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
            <form action="<?= base_url('create_reg_branch'); ?>" method="POST">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="regional_branch_name">Regional Branch Name <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="regional_branch_name" name="regional_branch_name" placeholder="Enter regional branch name" value="<?= set_value('regional_branch_name'); ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="address">Address <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter address name" value="<?= set_value('address'); ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="phone">Phone <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no" value="<?= set_value('phone'); ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?= set_value('email'); ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="zilla">District</label>
                      <select class="form-control" name="zilla" id="zilla" onchange="getUpazillaList(this);" required>
                        <option value="">Select District</option>
                        <?php foreach ($districts as $district) {
                          echo '<option value="'. $district->id .'">'.$district->name.'</option>';
                        } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="upazilla">Upazila</label>
                      <select class="form-control" name="upazilla" id="upazilla">
                        <option value="">Select Upazila</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for=""></label>
                      <a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Cancel</a>
                      <input type="submit" name="submit" class="btn btn-primary btn-sm pull-right" value="Save">
                  </div>
                  <div class="form-group">
                      <?php if(hasFlash('msg_reg_br')){ ?>
                          <span><?= flashMessage('msg_reg_br'); ?></span> | View Regional Branch Detials <a href="base_url('search_regional_branch')">here</a>.
                      <?php  } ?>
                  </div>
                  
                </div>
              </div>
            </form>         
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