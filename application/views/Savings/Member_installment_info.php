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
                <span>
                  <p id="message" class="pull-right"></p>
                </span>
              </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>
