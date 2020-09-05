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
                <form action="<?= base_url('savings_interest'); ?>" method="GET">
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
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="first_installment_date">First date <span class="text-red">*</span></label>  
                        <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="first_installment_date" name="first_installment_date" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="second_installment_date">Second date <span class="text-red">*</span></label>  
                        <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="second_installment_date" name="second_installment_date" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit" name="" class="btn btn-primary btn-sm pull-right" value="Search" id="save"/>
                    </div>
                  </div>
              </form>
              </div>
                  <table id="members_list_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Member ID</th>
                        <th>Name</th>
                        <th>Joining Date</th>
                        <th>First Balance</th>
                        <th>Second Balance</th>
                        <th>Total Savings</th>
                        <th>Interest</th>
                        <th>Balance with Interest</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count = 1; ?>
                      <?php if(!empty($interests)){ foreach ($interests as $interest) { ?>
                      <?php 
                        //calculating interest
                        $total_savings = 0;
                        $total_interest = 0;
                        $total_savings = ($interest['first_balance']+$interest['second_balance']);
                        $total_interest = (($total_savings/2)*(0.06))/2;
                        $balance_with_interest = ($interest['second_balance']+$total_interest);
                      ?>
                        <tr>
                          <td><?= $count++; ?></td>
                          <td><?= $interest['member_id']; ?></td>
                          <td><?= $interest['name']; ?></td>
                          <td><?= $interest['joining_date']; ?></td>
                          <td><?= $interest['first_balance']; ?></td>
                          <td><?= $interest['second_balance']; ?></td>
                          <td><?= $total_savings; ?></td>
                          <td><?= $total_interest; ?></td>
                          <td><?= $balance_with_interest; ?></td>
                        </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                <form action="<?= base_url('/savings_interest_report_by_date'); ?>" method="POST">
                  <input type="hidden" name="somiti" value="<?= get('somiti'); ?>">
                  <input type="hidden" name="first_installment_date" value="<?= get('first_installment_date'); ?>">
                  <input type="hidden" name="second_installment_date" value="<?= get('second_installment_date'); ?>">
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
