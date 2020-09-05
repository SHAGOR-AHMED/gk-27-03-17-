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
              <h3 class="box-title">Create for <?= (isset($title))? $title : ''; ?></h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
            <form action="<?= base_url('create_branch'); ?>" method="POST">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="reg_branch_name">Regional Branch Name <span class="text-red">*</span></label>
                      <select class="form-control" name="reg_branch_name" id="reg_branch_name" required>
                        <option value="">Select Branch Name</option>
                        <?php if(!empty($regionalbranchList)){ foreach ($regionalbranchList as $reg_branch) { ?>
                          <option value="<?= $reg_branch->id; ?>"><?= $reg_branch->name; ?></option>
                        <?php } } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="branch_name">Branch Name <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter branch name" value="<?= set_value('branch_name'); ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="address">Address <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter branch address" value="<?= set_value('address'); ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="phone">Phone <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no" value="<?= set_value('phone'); ?>" required>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                       
                    </div>
                    <div class="col-md-6">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?= set_value('email'); ?>">
                  </div>
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
                    <label for="pksf_non_pksf">PKSF/NON-PKSF</label>
                    <select class="form-control" name="pksf_non_pksf" id="pksf_non_pksf">
                      <option value="">Select</option>
                      <option value="1">PKSF</option>
                      <option value="2">NON-PKSF</option>
                    </select>
                  </div>

                  <div class="form-group">
                      <label for=""></label>
                      <input type="submit" name="submit" class="btn btn-primary btn-sm pull-right" value="Save">
                  </div>
                  <div class="form-group">
                  <?php if (hasFlash('msg_br')) {?>
                      <span><?= flashMessage('msg_br')  ?></span> | View Branch Detials <a href="base_url('search_branch')">here</a>.
                  <?php } ?>
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