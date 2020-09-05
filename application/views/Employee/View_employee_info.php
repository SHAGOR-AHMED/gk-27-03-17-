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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= (isset($title))? $title : ''; ?> Information</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body">
            <!-- <?php ($employee); ?> -->
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <?php if(!empty($employee)): ?>
                <table class="table color-black">
                  <tr>
                    <td></td>
                    <td></td>
                    <td rowspan="5">
                      <img src="<?= base_url('uploads/employee').'/'.$employee->photo; ?>" class="img-responsive img-thumbnail" style="margin-top:10px; width:100px" title="photo of <?= $employee->emp_name; ?>" alt="photo of <?= $employee->emp_name; ?>">
                    </td>
                  </tr>
                  <tr>
                    <td>Name:</td>
                    <td><?= $employee->emp_name; ?> <span class="label <?= ($employee->active == 1)? 'label-success': 'label-danger' ?> pull-right"><?= ($employee->active == 1)? 'Active' : 'Deactive' ?></span></td>
                  </tr>
                  <!-- <tr>
                    <td>Branch Name:</td>
                    <td><?= $employee->emp_branch_office; ?></td>
                  </tr> -->
                  <tr>
                    <td>Designarion:</td>
                    <td><?= $employee->emp_designation; ?></td>
                  </tr>
                  <tr>
                    <td>Joining Date:</td>
                    <td><?= $employee->emp_joining; ?></td>
                  </tr>
                  <tr>
                    <td>Date of Birth:</td>
                    <td><?= $employee->emp_dob; ?></td>
                  </tr>
                  <tr>
                    <td>Phone:</td>
                    <td><?= $employee->emp_phone; ?></td>
                  </tr>
                  <tr>
                    <td>Address: </td>
                    <td><?= $employee->emp_address; ?></td>
                  </tr>
                  <tr>
                    <td>Father/Husband </td>
                    <td><?= $employee->emp_father_husband; ?></td>
                  </tr>
                  <tr>
                    <td>Mother: </td>
                    <td><?= $employee->emp_mother; ?></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><?= $employee->emp_email; ?></td>
                  </tr>
                  <tr>
                    <td>Blood Group:</td>
                    <td><?= $employee->emp_blood_group; ?></td>
                  </tr>
                  <tr>
                    <td>NID:</td>
                    <td><?= $employee->nid ?></td>
                  </tr>
                  <?php if(hasPermission('active_deactive_employee')): ?>
                    <tr>
                      <td>Deactivate :</td>
                      <td>
                        <input type="hidden" name="emp_hidden_id" value="<?= $employee->id; ?>">
                        <a class="<?= ($employee->active==1)? 'text-danger' : 'text-success' ?>" href="<?= base_url('active_deactive_employee').'/'.$employee->id; ?>"><strong><?= ($employee->active==1)? 'Deactivate this person' : 'Activate this person' ?></strong></a>
                      </td>
                    </tr>
                  <?php endif; ?>
                  <tr>
                    <td><a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Back</a></td>
                    <td>
                      <?php if(hasPermission('edit_employee')): ?>
                        <a href="<?= base_url('edit/employee')."/".$employee->id; ?>" class="btn btn-info btn-sm btn-block">Edit employee info</a>
                      <?php endif; ?>
                    </td>
                  </tr>
                </table>
              </div>
              <?php endif; ?>
            </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                <?php if (hasFlash('msg_employee')) {?>
                    <span><?= flashMessage('msg_employee')  ?></span>
                <?php } ?>
              </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>