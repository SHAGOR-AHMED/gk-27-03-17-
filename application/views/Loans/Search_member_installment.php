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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?= (isset($title))? $title : ''; ?> Panel</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body color-black">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="reg_branch_name">Regional Branch Name <span class="text-red">*</span></label>
                        <select class="form-control" name="reg_branch_name" id="reg_branch_name" onchange="getBranchList(this);" required>
                          <option value="">Select Branch Name</option>
                          <?php if(!empty($regBranchList)){ foreach ($regBranchList as $reg_branch) { ?>
                            <option value="<?= $reg_branch->id; ?>"><?= $reg_branch->name; ?></option>
                          <?php } } ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="branch">Branch <span class="text-red">*</span></label>
                        <select class="form-control" name="branch" id="branch" onchange="getSomitiList(this);" required>
                          <option value="">Select Branch</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="somiti">Somiti <span class="text-red">*</span></label>
                        <select class="form-control" name="somiti" id="somiti" onchange="getMemberList(this);" required>
                          <option value="">Select Somiti</option>
                        </select>
                    </div>
                  </div>
                <!-- this form will send only member id -->
                <form action="<?= base_url('loan_details'); ?>" method="GET">
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="member">Member <span class="text-red">*</span></label>
                        <select class="form-control" name="member_id" id="member" required onchange="get_member_all_loan_serial();">
                          <option value="">Select Member</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="loan_serial_no">Loan S/N <span class="text-red">*</span></label>
                        <select class="form-control" name="loan_serial" id="loan_serial_no" required>
                          <option value="">Select S/N</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit" name="" class="btn btn-primary btn-sm pull-right" value="Search" id="save"/>
                    </div>
                  </div>
                  </div>
              </form>
                  <table id="members_list_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Week no</th>
                        <th>Colletable amount</th>
                        <th>Colletable interest</th>
                        <th>Actual amount</th>
                        <th>Actual interest</th>
                        <th>Total Collected amount</th>
                        <th>Total Collected interest</th>
                        <th>Remaining amount</th>
                        <th>Remaining interest</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($loans)){ foreach ($loans as $loan) { ?>
                        <tr>
                          <td><?= $loan->installment_date; ?></td>
                          <td><?= $loan->week_no; ?></td>
                          <td><?= $loan->collectable_amount; ?></td>
                          <td><?= $loan->collectable_interest; ?></td>
                          <td><?= $loan->actual_amount; ?></td>
                          <td><?= $loan->actual_interest; ?></td>
                          <td><?= $loan->total_collected_amount; ?></td>
                          <td><?= $loan->total_collected_interest; ?></td>
                          <td><?= $loan->remaining_amount; ?></td>
                          <td><?= $loan->remaining_interest; ?></td>
                        </tr>
                      <?php } } ?>
                    </tbody>
                  </table>


            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                <form action="<?= base_url('loan_installment_report'); ?>" method="POST">
                  <input type="hidden" name="loan_serial" value="<?= (isset($loan_serial))? $loan_serial : ''; ?>">
                  <input type="hidden" name="member_id" value="<?= (isset($member_id))? $member_id : ''; ?>">
                  <input type="submit" name="generatepdf" value="Generate PDF" class="btn btn-primary btn-sm pull-right" />
                </form>
                <span>
                  <p id="message" class="pull-right"></p>
                </span>
              </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>
