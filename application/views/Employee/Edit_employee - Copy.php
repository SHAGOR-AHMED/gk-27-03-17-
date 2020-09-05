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
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Create <?= (isset($title))? $title : ''; ?></h3>
          <div class="box-tools pull-right">
            <h5>nb:&nbsp;<span class="text-red">*</span> mark fields are required to fill</h5>
          </div>
        </div>
        <div class="box-body">
        <?php if(!empty($employee)): ?>
        <form action="<?= base_url('update_employee'); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="emp_hidden" value="<?= $employee->id; ?>">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="emp_branch_office">Employee branch office <span class="text-red">*</span></label>
                  <select class="form-control" name="emp_branch_office" id="emp_branch_office" required>
                    <option value="<?= $employee->brOfficeID ?>"><?= $employee->brOfficeName; ?></option>
                    <?php foreach ($brOfficeList as $emp_branch_office) {
                      echo '<option value="'. $emp_branch_office->id .'">'.$emp_branch_office->branch_name.'</option>';
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="emp_designation">Employee Designation <span class="text-red">*</span></label>
                  <input type="text" class="form-control" id="emp_designation" name="emp_designation" placeholder="Enter employee designation" value="<?= $employee->emp_designation; ?>">
                </div>
                <div class="form-group">
                  <label for="joining_date">Employee Joining date <span class="text-red">*</span></label>
                  <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="joining_date" name="joining_date" placeholder="Enter date of join" value="<?= $employee->emp_joining; ?>" required>
                </div>
                <div class="form-group">
                  <label for="dob">Date of Birth<span class="text-red">*</span></label>
                  <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="dob" name="dob" placeholder="Enter date of birth" value="<?= $employee->emp_dob; ?>" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="emp_name">Employee Name <span class="text-red">*</span></label>
                  <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter employee name" value="<?= $employee->emp_name; ?>" required>
                </div>
                <div class="form-group">
                  <label for="emp_phone">Phone <span class="text-red">*</span></label>
                  <input type="text" class="form-control" id="emp_phone" name="emp_phone" placeholder="Enter phone number" value="<?= $employee->emp_phone; ?>" required>
                </div>
                <div class="form-group">
                  <label for="emp_email">E-mail</label>
                  <input type="email" class="form-control" id="emp_email" name="emp_email" placeholder="Enter email address" value="<?= $employee->emp_email; ?>">
                </div>
                <div class="form-group">
                  <label for="emp_address">Employee Address <span class="text-red">*</span></label>
                  <textarea class="form-control" id="emp_address" name="emp_address" placeholder="Enter employee address" style="height:40px; resize:vertical;" required><?= $employee->emp_address; ?></textarea>
                </div>

              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="emp_father_husband">Employee Father/Husband <span class="text-red">*</span></label>
                  <input type="text" class="form-control" id="emp_father_husband" name="emp_father_husband" placeholder="Enter father or husband name" value="<?= $employee->emp_father_husband; ?>" required>
                </div>
                <div class="form-group">
                  <label for="emp_mother_name">Employee Mother Name</label>
                  <input type="text" class="form-control" id="emp_mother_name" name="emp_mother_name" placeholder="Enter mother name" value="<?= $employee->emp_mother; ?>">
                </div>
                <div class="form-group">
                  <label for="blood_group">Blood group</label>
                  <select class="form-control" name="blood_group" id="blood_group" value="">
                    <option value="<?= $employee->emp_blood_group; ?>"><?= $employee->emp_blood_group; ?></option>
                    <option value="A+">A<sup>+</sup></option>
                    <option value="A-">A<sup>-</sup></option>
                    <option value="AB+">AB<sup>+</sup></option>
                    <option value="AB-">AB<sup>-</sup></option>
                    <option value="B+">B<sup>+</sup></option>
                    <option value="B-">B<sup>-</sup></option>
                    <option value="O+">O<sup>+</sup></option>
                    <option value="O-">O<sup>-</sup></option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="emp_education">Employee Address <span class="text-red">*</span></label>
                  <textarea class="form-control" id="emp_education" name="emp_education" placeholder="Enter employee education" style="height:40px; resize:vertical;" required><?= $employee->education; ?></textarea>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="userfile">Photo <span class="text-red">*</span></label>
                  <input type="file" id="userfile" name="userfile" onchange="getPreview('userfile','img_preview','none');">
                  <input type="hidden" name="photo" value="<?= $employee->photo; ?>">
                  <img src="<?= base_url('uploads/employee')."/".$employee->photo; ?>" style="width:100px; margin-top:10px" id="img_preview" class="img-responsive img-thumbnail"/>
                  <p class="help-block">(Max photo size: 400x400, 512kb)</p>
                </div>
                <div class="form-group">
                  <label for=""></label>
                  <a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Back</a>
                  <input type="submit" name="submit" value="Update" class="btn btn-primary btn-sm pull-right">
                </div>
                <div class="form-group">
                  <?php if (hasFlash('msg_employee')) {?>
                  <span class="text-success"><?= flashMessage('msg_employee')  ?></span>
                  <?php } ?>
                </div>
              </div>
            </div>
          </form>
        <?php endif; ?>
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