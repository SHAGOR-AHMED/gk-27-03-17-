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
            <form action="" method="POST" id="frm_create_installment">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="reg_branch_name">Regional Branch Name <span class="text-red">*</span></label>
                      <select class="form-control" name="reg_branch_name" id="reg_branch_name" onchange="getBranchList(this);" required>
                        <option value="">Select Branch Name</option>
                        <?php if(!empty($regBranchList)){ foreach ($regBranchList as $reg_branch) { ?>
                          <option value="<?= $reg_branch->id; ?>"><?= $reg_branch->name; ?></option>
                        <?php } } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="branch">Branch <span class="text-red">*</span></label>
                      <select class="form-control" name="branch" id="branch" onchange="getSomitiList(this);" required>
                        <option value="">Select Branch</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="somiti">Somiti <span class="text-red">*</span></label>
                      <select class="form-control" name="somiti" id="somiti" onchange="getMemberList(this);" required>
                        <option value="">Select Somiti</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="member">Member <span class="text-red">*</span></label>
                              <select class="form-control" name="member" id="member" required>
                                <option value="">Select Member</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label for="classification">Classification <span class="text-red">*</span></label>
                          <select class="form-control" name="classification" id="classification" required>
                            <option value="">Select Classification</option>
                            <option value="General Savings">General Savings</option>
                            <option value="Voluntary Savings">Voluntary Savings</option>
                            <option value="Other Savings">Other Savings</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="installment_date">Date <span class="text-red">*</span></label>
                      <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="installment_date" name="installment_date" placeholder="Enter installment date" value="<?= date('Y-m-d'); ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="no_of_week">Week no</label>
                      <input type="text" class="form-control" id="no_of_week" name="no_of_week" placeholder="Enter week no">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="details">Description</label>
                      <input type="text" class="form-control" id="details" name="details" placeholder="Enter description">
                  </div>
                  <div class="form-group">
                      <label for="diposit">Diposit <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="diposit" name="diposit" placeholder="Enter diposit" value="0" required onblur="makeZeroIfEmpty(this);">
                  </div>
                  <div class="form-group">
                      <label for="withdraw">Withdraw <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="withdraw" name="withdraw" placeholder="Enter withdraw" value="0" required onblur="makeZeroIfEmpty(this);">
                  </div>
                  <div class="form-group">
                      <label for=""></label>
                      <input type="submit" name="submit" class="btn btn-success btn-sm pull-right" value="Save" id="save"/>
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
