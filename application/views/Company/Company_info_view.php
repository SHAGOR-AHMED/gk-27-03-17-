<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Company info</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Company information</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body">
            <!-- <?php ($company); ?> -->
            <div class="row">
              <div class="col-md-6">
                <?php if(!empty($company)): ?>
                <table class="table color-black">
                  <tr>
                    <td></td>
                    <td></td>
                    <td rowspan="5">
                      <img src="<?= base_url('public/img').'/'.$company->photo; ?>" width="100;" class="img-responsive img-rounded img-thumbnail" style="margin-top:10px;" title="photo of <?= $company->name; ?>" alt="photo of <?= $company->name; ?>">
                    </td>
                  </tr>
                  <tr>
                    <td>Name:</td>
                    <td><?= $company->name; ?></td>
                  </tr>
                  <tr>
                    <td>Address: </td>
                    <td><?= $company->address; ?></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><?= $company->email; ?></td>
                  </tr>
                  <tr>
                    <td>Phone:</td>
                    <td><?= $company->phone; ?></td>
                  </tr>
                  <tr>
                    <td>Fax:</td>
                    <td><?= $company->fax; ?></td>
                  </tr>
                  <tr>
                    <td>TIN:</td>
                    <td><?= $company->tin; ?></td>
                  </tr>
                  <tr>
                    <td>VAT:</td>
                    <td><?= $company->vat; ?></td>
                  </tr>
                  <tr>
                    <td>MRA No::</td>
                    <td><?= $company->mra_no; ?></td>
                  </tr>
                  <tr>
                    <td><a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Back</a></td>
                    <td>
                      <?php if(hasPermission('company_info_edit')):  ?>
                        <a href="<?= base_url('edit_company_info'); ?>" class="btn btn-info btn-sm btn-block">Edit company info</a></td>
                      <?php endif; ?>
                  </tr>
                </table>
              </div>
              <?php endif; ?>
            </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                <?php if (hasFlash('msg_company')) {?>
                    <span><?= flashMessage('msg_company')  ?></span>
                <?php } ?>
              </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>
