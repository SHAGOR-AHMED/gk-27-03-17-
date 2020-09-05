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
        <h3 class="box-title">Update <?= (isset($title))? $title : ''; ?></h3>
        <div class="box-tools pull-right">
          <?php if (hasFlash('msg_employee')) {?>
            <span class="text-success"><?= flashMessage('msg_employee')  ?></span>
          <?php } ?>
        </div>
      </div>
      <div class="box-body">
        <form action="<?= base_url('update_employee'); ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="emp_hidden" value="<?= $employee->id; ?>">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                  <label for="reg_branch">Regional branch <span class="text-red">*</span></label>
                  <select class="form-control" name="reg_branch" id="reg_branch" onchange="getBranchList(this);" required>
                    <option value="">Select regional branch</option>
                    <?php foreach ($regBranchList as $reg_branch) { ?>
                      <option value="<?= $reg_branch->id; ?>" <?php if($reg_branch->id == $employee->reg_branch_id){ echo 'selected'; } ?> ><?= $reg_branch->name; ?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                  <label for="branch">Branch <span class="text-red">*</span></label>
                  <select class="form-control" name="branch" id="branch" required>
                    <option value="<?= $employee->branch_id; ?>"><?= $employee->brName; ?></option>
                  </select>
              </div>
              <div class="form-group">
                <label for="emp_name">Employee Name <span class="text-red">*</span></label>
                <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter employee name" value="<?= $employee->emp_name; ?>" required>
              </div>
              <div class="form-group">
                <label for="dob">Date of Birth<span class="text-red">*</span></label>
                <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="dob" name="dob" placeholder="Enter date of birth" value="<?= $employee->emp_dob; ?>" required>
              </div>
              <div class="form-group">
                <label for="nationality">Nationality <span class="text-red">*</span></label>
                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter nationality" value="<?= $employee->nationality; ?>" required>
              </div>
              <div class="form-group">
                <label for="nid">NID number <span class="text-red">*</span></label>
                <input type="text" class="form-control" id="nid" name="nid" placeholder="Enter NID Number" value="<?= $employee->nid; ?>" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="emp_designation">Employee Designation <span class="text-red">*</span></label>
                <input type="text" class="form-control" id="emp_designation" name="emp_designation" placeholder="Enter employee designation" value="<?= $employee->emp_designation; ?>">
              </div>
              <div class="form-group">
                <label for="joining_date">Employee Joining date <span class="text-red">*</span></label>
                <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="joining_date" name="joining_date" placeholder="Enter date of join" value="<?= $employee->emp_joining; ?>" required>
              </div>
              
              <div class="form-group">
                <label for="emp_phone">Phone <span class="text-red">*</span></label>&nbsp;<small class="text-muted">(Will be used as username)</small>
                <input type="text" class="form-control" id="emp_phone" name="emp_phone" placeholder="Enter phone number" value="<?= $employee->emp_phone; ?>" required>
              </div>
              <div class="form-group">
                <label for="emp_email">E-mail</label>
                <input type="email" class="form-control" id="emp_email" name="emp_email" placeholder="Enter email address" value="<?= $employee->emp_email ?>">
              </div>
              <div class="form-group">
                <label for="emp_address">Present Address <span class="text-red">*</span></label>
                <textarea class="form-control" id="emp_address" name="emp_address" placeholder="Enter present address" style="resize:vertical; min-height: 108px;" required><?= $employee->emp_address; ?></textarea>
              </div>
              

            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="emp_parmanent_address">Parmanent Address <span class="text-red">*</span></label>
                <textarea class="form-control" id="emp_parmanent_address" name="emp_parmanent_address" placeholder="Enter parmanent address" style="resize:vertical; min-height: 108px;" required><?= $employee->parmanent_address; ?></textarea>
              </div>
              <div class="form-group">
                <label for="emp_father_husband">Employee Father/Husband <span class="text-red">*</span></label>
                <input type="text" class="form-control" id="emp_father_husband" name="emp_father_husband" placeholder="Enter father or husband name" value="<?= $employee->emp_father_husband; ?>" required>
              </div>
              <div class="form-group">
                <label for="emp_mother_name">Employee Mother Name</label>
                <input type="text" class="form-control" id="emp_mother_name" name="emp_mother_name" placeholder="Enter mother name" value="<?= $employee->emp_mother; ?>">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="blood_group">Blood group</label>
                    <select class="form-control" name="blood_group" id="blood_group">
                      <option value="<?= $employee->emp_blood_group; ?>"><?= $employee->emp_blood_group ?></option>
                      <option value="A+">A<sup style="font-size:6px">+</sup></option>
                      <option value="A-">A<sup>-</sup></option>
                      <option value="AB+">AB<sup>+</sup></option>
                      <option value="AB-">AB<sup>-</sup></option>
                      <option value="B+">B<sup>+</sup></option>
                      <option value="B-">B<sup>-</sup></option>
                      <option value="O+">O<sup>+</sup></option>
                      <option value="O-">O<sup>-</sup></option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                      <option value="<?= $employee->gender; ?>"><?php if($employee->gender == 1):echo "Male";elseif($employee->gender == 2):echo "Female";endif; ?></option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                      <option value="3">Other</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="marital">Marital status</label>
                    <select class="form-control" name="marital" id="marital">
                      <option value="<?= $employee->marital_status; ?>"><?= $employee->marital_status; ?></option>
                      <option value="Married">Married</option>
                      <option value="Unmarried">Unmarried</option>
                      <option value="Divorced">Divorced</option>
                      <option value="Widow">Widow</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="religion">Religion</label>
                      <select class="form-control" name="religion" id="religion">
                        <option value="<?= $employee->marital_status; ?>"><?= $employee->religion; ?></option>
                        <option value="Muslim">Muslim</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Christian">Christian</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="emp_education">Educational status <span class="text-red">*</span></label>
                <textarea class="form-control" id="emp_education" name="emp_education" placeholder="Enter employee education"style="resize:vertical; min-height: 108px;" required><?= $employee->education; ?></textarea>
              </div>
              <div class="form-group">
                <label for="ref_name">Reference name <span class="text-red">*</span></label>
                <!-- <input type="text" class="form-control" id="ref_name" name="ref_name" placeholder="Enter reference person name" value="" required> -->
                <textarea class="form-control" id="ref_name" name="ref_name" placeholder="Enter reference person name" style="resize:vertical;" required><?= $employee->reference_name; ?></textarea>
              </div>
              <div class="form-group">
                <label for="userfile">Photo <span class="text-red">*</span></label>
                <input type="file" id="userfile" name="userfile" onchange="getPreview('userfile','img_preview','none');">
                <input type="hidden" name="photo" value="<?= $employee->photo; ?>">
                <img src="<?= (empty($employee->photo))? base_url('/').'public/img/default.jpg' : base_url('/').'uploads/employee/'.$employee->photo; ?>" style="width:100px; margin-top:5px" id="img_preview" class="img-responsive img-thumbnail"/>
                <p class="help-block">(Max photo size: 400x400, 512kb)</p>
              </div>
              <div class="form-group">
                <label for=""></label>
                <a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Cancel</a>
                <input type="submit" name="submit" value="Update" class="btn btn-primary btn-sm pull-right">
              </div>
              <div class="form-group">
                
              </div>
            </div>
          </div>
        </form>
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