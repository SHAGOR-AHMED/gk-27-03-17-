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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Company information</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body">
            <!-- <?php ($company); ?> -->
            <div class="row">
              <div class="col-md-6">
                <?php if(!empty($company)): ?>
                  <form action="<?= base_url('update_company_info'); ?>" method="POST" enctype="multipart/form-data">
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
                      <td><input type="text" name="name" class="form-control" value="<?= $company->name; ?>" required></td>
                    </tr>
                    <tr>
                      <td>Address: </td>
                      <td><input type="text" name="address" class="form-control"  value="<?= $company->address; ?>" required></td>
                    </tr>
                    <tr>
                      <td>Email:</td>
                      <td><input type="email" name="email" class="form-control"  value="<?= $company->email; ?>" required></td>
                    </tr>
                    <tr>
                      <td>Phone:</td>
                      <td><input type="text" name="phone" class="form-control"  value="<?= $company->phone; ?>" required></td>
                    </tr>
                    <tr>
                      <td>Fax:</td>
                      <td><input type="text" name="fax" class="form-control"  value="<?= $company->fax; ?>" required></td>
                    </tr>
                    <tr>
                      <td>TIN:</td>
                      <td><input type="text" name="tin" class="form-control"  value="<?= $company->tin; ?>" required></td>
                    </tr>
                    <tr>
                      <td>VAT:</td>
                      <td><input type="text" name="vat" class="form-control"  value="<?= $company->vat; ?>" required></td>
                    </tr>
                    <tr>
                      <td>MRA:</td>
                      <td><input type="text" name="mra" class="form-control"  value="<?= $company->mra_no; ?>" required></td>
                    </tr>
                    <tr>
                      <td>Logo:</td>
                      <td>
                        <input type="file" name="userfile">
                        <input type="hidden" name="photo" value="<?= $company->photo; ?>">
                      </td>
                    </tr>
                    <tr>
                      <td><a href="<?= base_url('company_info_view'); ?>" class="btn btn-warning btn-sm btn-block">Back</a></td>
                      <td><input type="submit" class="btn btn-info btn-sm btn-block" value="Update company info"></td>
                    </tr>
                  </table>
                  </form>
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
