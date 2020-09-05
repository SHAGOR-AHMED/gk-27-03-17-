<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Branch</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        
          <!-- Default box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Update branch</h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
            <?php if(!empty($branch)): ?>
            <form action="<?= base_url('update_branch'); ?>" method="POST">
            <input type="hidden" name="branch_id" value="<?= $branch->id ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="branch_name">Branch Name</label>
                      <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter branch name" value="<?= $branch->name; ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="branch_reg_id">Regional Branch Name</label>
                      <select class="form-control" name="branch_reg_id" id="branch_reg_id">
                        <option value="<?= $branch->regBranchID; ?>"><?= $branch->regBranchName; ?></option>
                        <?php if(!empty($regionalbranchList)){ foreach ($regionalbranchList as $reg_branch) { ?>
                          <option value="<?= $reg_branch->id; ?>"><?= $reg_branch->name; ?></option>
                        <?php } } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter branch address" value="<?= $branch->address; ?>" required>
                  </div>
                  
                  <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no" value="<?= $branch->phone; ?>" required>
                  </div>
                  
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?= $branch->email; ?>">
                  </div>
                  <div class="form-group">
                      <label for="zilla">District</label>
                      <select class="form-control" name="zilla" id="zilla" onchange="getUpazillaList(this);" required>
                        <option value="<?= $branch->distID; ?>"><?= $branch->disctrictName; ?></option>
                        <?php foreach ($districts as $district) {
                          echo '<option value="'. $district->id .'">'.$district->name.'</option>';
                        } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="upazilla">Upazila</label>
                      <select class="form-control" name="upazilla" id="upazilla" required>
                        <option value="<?= $branch->upazilaID; ?>"><?= $branch->upazilaName; ?></option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="pksf_non_pksf">PKSF/NON-PKSF</label>
                    <select class="form-control" name="pksf_non_pksf" id="pksf_non_pksf">
                      <option value="">Select</option>
                      <option value="1" <?php if($branch->pksf_non_pksf == 1):echo "SELECTED";endif; ?> >PKSF</option>
                      <option value="2" <?php if($branch->pksf_non_pksf == 2):echo "SELECTED";endif; ?> >NON-PKSF</option>
                    </select>
                  </div>

                  <div class="form-group">
                      <label for=""></label>
                      <a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Back</a>
                      <input type="submit" name="submit" class="btn btn-primary btn-sm pull-right" value="Update">
                  </div>
                  <div class="form-group">
                  <?php if (hasFlash('msg_br')) {?>
                      <span class="text-success"><?= flashMessage('msg_br')  ?></span>
                  <?php } ?>
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