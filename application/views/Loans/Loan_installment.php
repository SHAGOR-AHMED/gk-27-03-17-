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
            <form action="<?= base_url('/'); ?>" method="POST" id="frm_loan_installment">
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
                      <div class="col-md-8">
                          <div class="form-group">
                              <label for="member">Member <span class="text-red">*</span></label>
                              <select class="form-control" name="member" id="member" required onchange="get_member_loan_serial();">
                                <option value="">Select Member</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="loan_serial">Loan S/N <span class="text-red">*</span></label>
                              <input type="text" class="form-control" id="loan_serial" name="loan_serial" value="" required readonly>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="installment_date">Installment date <span class="text-red">*</span></label>
                              <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="installment_date" name="installment_date" placeholder="Enter loan opening date" value="<?= date('Y-m-d'); ?>" onchange="addYearToClosingDate(this.value); get_member_loan_info();" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="week_no">Week no</label>
                              <input type="text" class="form-control" id="week_no" name="week_no" placeholder="Week no">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="collectable_amount">Collectable amount <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="collectable_amount" name="collectable_amount" placeholder="Enter collectable amount" required readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="collectable_interest">Collectable interest <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="collectable_interest" name="collectable_interest" placeholder="Enter collectable interest" required readonly>
                  </div>
                  <div class="form-group">
                      <label for="actual_amount">Actual amount <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="actual_amount" name="actual_amount" placeholder="Enter actual amount" required>
                  </div>
                  <div class="form-group">
                      <label for="actual_interest">Actual interest <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="actual_interest" name="actual_interest" placeholder="Enter actual interest" required>
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
                  <p id="message" class="pull-right"</p>
                </span>
              </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>
