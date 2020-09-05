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
            <form action="<?= base_url('/create_loan'); ?>" method="POST" id="frm_create_loan">
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
                              <select class="form-control" name="member" id="member" required onchange="get_loan_serial();">
                                <option value="">Select Member</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="loan_serial">Loan S/N <span class="text-red">*</span></label>
                              <input type="text" class="form-control"  id="loan_serial" name="loan_serial" placeholder="1" value="1" required readonly>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="loan_opening_date">Opening date <span class="text-red">*</span></label>
                              <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="loan_opening_date" name="loan_opening_date" placeholder="Enter loan opening date" value="<?= date('Y-m-d'); ?>" onchange="addYearToClosingDate(this.value);" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="loan_closing_date">Closing date <span class="text-red">*</span></label>
                              <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="loan_closing_date" name="loan_closing_date" placeholder="Enter loan closing date" value="<?= (date('Y')+1)."-".date('m-d'); ?>" required>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="loan_purpose">Loan purpose <span class="text-red">*</span></label>
                      <select class="form-control" name="loan_purpose" id="loan_purpose">
                            <option value="">Select purpose</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Business">Business</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="loan_amount">Loan amount <span class="text-red">*</span></label>
                              <input type="text" class="form-control" id="loan_amount" name="loan_amount" placeholder="Enter loan amount" value="" required onchange="calcInterest();" onblur="calcInterest();">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="loan_in_percentage">Loan in percent <span class="text-red">*</span></label>
                          <select class="form-control" name="loan_in_percentage" id="loan_in_percentage" required onchange="calcInterest();" onblur="calcInterest();">
                            <option value="0.10">10 %</option>
                            <option value="0.125">12.5 %</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="loan_interest">Loan interest <span class="text-red">*</span></label>
                          <input type="text" class="form-control" id="loan_interest" name="loan_interest" placeholder="0.0" value="0.0" required readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="total_amount">Total balance <span class="text-red">*</span></label>
                          <input type="text" class="form-control" id="total_amount" name="total_amount" placeholder="0.0" value="0.0" required readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="loan_type">Loan type <span class="text-red">*</span></label>
                    <select class="form-control" name="loan_type" id="loan_type" required>
                      <option value="Weekly">Weekly</option>
                      <option value="Monthly">Monthly</option>
                      <option value="Seasonal">Seasonal</option>
                    </select>
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
                  <p id="message" class="pull-right"><?php if(hasFlash('message')){
                    echo flashMessage('message');
                    } ?></p>
                </span>
              </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>
