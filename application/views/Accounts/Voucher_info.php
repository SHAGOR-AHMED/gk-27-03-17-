<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Voucher info</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Voucher info</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body">
            <!-- <?php ($member); ?> -->
            <div class="row">
              <div class="col-md-6">
                <?php if(!empty($voucherInfo)): ?>
                <table class="table color-black">
                  <tr>
                    <td>Voucher No:</td>
                    <td><?= $voucherInfo->voucher_no; ?></td>
                  </tr>
                  <tr>
                    <td>Date:</td>
                    <td><?= $voucherInfo->voucher_date; ?></td>
                  </tr>
                  <tr>
                    <td>Caption:</td>
                    <td><?= $voucherInfo->voucher_caption; ?></td>
                  </tr>
                  <tr>
                    <td>Reg. Branch:</td>
                    <td><?= $voucherInfo->reg_branch_name; ?></td>
                  </tr>
                  <tr>
                    <td>Brnach:</td>
                    <td><?= $voucherInfo->branch_name; ?></td>
                  </tr>
                </table> 

                <table class="table table-black">
                      <thead>
                          <th class="text-center">SN</th>
                          <th class="text-center">Transaction Head</th>
                          <th class="text-center">Debit</th>
                          <th class="text-center">Credit</th>
                      </thead>
                      <tbody>
                          <?php $i=1; foreach ($tranList as $v): ?>
                          <tr>
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $v->head_name, ' / ', $v->sub_head_name, ' / ', $v->tran_head_name ?></td>
                              <td class="text-right"><?php echo $v->debit ?></td>
                              <td class="text-right"><?php echo $v->credit ?></td>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                </table>

                  <table class="table table-black">
                      <tr>
                        <td><a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Back</a></td>
                        <td>
                            <a href="<?= base_url('edit/voucher').'/'.$voucherInfo->id; ?>" class="btn btn-info btn-sm btn-block">Edit voucher info</a></td>
                      </tr>
                      <tr>
                          <td>
                              <a href="<?= base_url('voucher_print').'/'.$voucherInfo->id; ?>" class="btn btn-success btn-sm btn-block">Print Voucher</a>
                          </td>
                      </tr>
                  </table>
              </div>
              <?php endif; ?>
            </div>
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
