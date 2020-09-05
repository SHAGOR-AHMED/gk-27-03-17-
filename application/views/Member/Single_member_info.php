<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Member info</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Member info</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body">
            <!-- <?php ($member); ?> -->
            <div class="row">
              <div class="col-md-6">
                <?php if(!empty($member)): ?>
                <table class="table color-black">
                  <tr>
                    <td></td>
                    <td></td>
                    <td rowspan="5">
                      <img src="<?= base_url('uploads/member').'/'.$member->photo; ?>" width="100;" class="img-responsive img-rounded img-thumbnail" style="margin-top:10px;" title="photo of <?= $member->name; ?>" alt="photo of <?= $member->name; ?>">
                    </td>
                  </tr>
                  <tr>
                    <td>Member ID:</td>
                    <td><?= $member->user_id; ?></td>
                  </tr>
                  <tr>
                    <td>Name:</td>
                    <td><?= $member->name; ?></td>
                  </tr>
                  <tr>
                    <td>Father/Husband:</td>
                    <td><?= $member->father_or_husband; ?></td>
                  </tr>
                  <tr>
                    <td>Age:</td>
                    <td><?= $member->age; ?></td>
                  </tr>
                  <tr>
                    <td>Occupation:</td>
                    <td><?= $member->occupation; ?></td>
                  </tr>
                  <tr>
                    <td>Present Address:</td>
                    <td><?= $member->address; ?></td>
                  </tr>
                  <tr>
                    <td>Parmanent Address:</td>
                    <td><?= $member->parmanent_address; ?></td>
                  </tr>
                  <tr>
                    <td>Somiti:</td>
                    <td><?= $member->somitiName; ?></td>
                  </tr>
                  <tr>
                    <td>Organization:</td>
                    <td><?= $member->organization; ?></td>
                  </tr>
                  <tr>
                    <td>Marital Status:</td>
                    <td><?= $member->maritial_status; ?></td>
                  </tr>
                  <tr>
                    <td>Educational Status:</td>
                    <td><?= $member->educational_status; ?></td>
                  </tr>
                  <tr>
                    <td>Self House:</td>
                    <td><?= $member->self_home; ?></td>
                  </tr>
                  <tr>
                    <td>Where live:</td>
                    <td><?= $member->where_live; ?></td>
                  </tr>
                  <tr>
                    <td><a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Back</a></td>
                    <td>
                      <?php if(hasPermission('edit_member')): ?>
                        <a href="<?= base_url('edit/member').'/'.$member->user_id; ?>" class="btn btn-info btn-sm btn-block">Edit member info</a></td>
                      <?php endif; ?>
                  </tr>
                  <?php if(hasPermission('kyc_profile_form')): ?>
                  <tr>
                      <td>
                          <a href="<?= base_url('member_kyc_form').'/'.$member->user_id; ?>" class="btn btn-success btn-sm btn-block">Print KYC form</a>
                      </td>
                  </tr>
                  <?php endif; ?>
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
