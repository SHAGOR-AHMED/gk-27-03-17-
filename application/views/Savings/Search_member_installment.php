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
                <form action="<?= base_url('search_member_savings_installment'); ?>" method="GET">
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
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="classification">Classification <span class="text-red">*</span></label>
                                    <select class="form-control" name="classification" id="classification" required>
                                      <option value="">Select Classification</option>
                                      <option value="General Savings">General Savings</option>
                                      <option value="Voluntary Savings">Voluntary Savings</option>
                                      <option value="Other Savings">Other Savings</option>
                                    </select>
                                </div>
                                <label for=""></label>
                                <input type="submit" name="" class="btn btn-primary btn-sm pull-right" value="Search" id="save"/>
                            </div>
                        </div>
                    </div>
                  </div>
                  </div>
              </form>
                  <table id="members_list_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Member ID</th>
                        <th>Date</th>
                        <th>Week no</th>
                        <th>Description</th>
                        <th>Deposit</th>
                        <th>Withdraw</th>
                        <th>Balance</th>
                        <th>Received by</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($installmentList)){ foreach ($installmentList as $installment) { ?>
                        <tr>
                          <td><a href="<?= base_url('member').'/'. $installment->member_id; ?>" title="Show member details"><?= $installment->member_id; ?></a></td>
                          <td><?= $installment->installment_date; ?></td>
                          <td><?= $installment->week_no; ?></td>
                          <td><?= $installment->details; ?></td>
                          <td <?php if($installment->deposit>0)echo 'style="color:green;"'; ?> >
                              <?= $installment->deposit; ?>
                          </td>
                          <td <?php if($installment->withdraw>0)echo 'style="color:red;"'; ?> >
                              <?= $installment->withdraw; ?>
                          </td>
                          <td><?= $installment->balance; ?></td>
                          <td><a href="<?= base_url('employee').'/'. $installment->received_by; ?>" title="Show member details"><?= $installment->employee_name; ?></a></td>
                        </tr>
                      <?php } } ?>
                    </tbody>
                  </table>


            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                <form action="<?= base_url('installment_report'); ?>" method="POST">
                  <input type="hidden" name="member_id" value="<?= (isset($member_id))? $member_id : ''; ?>">
                  <input type="hidden" name="classification" value="<?= (isset($classification))? $classification : ''; ?>">
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
