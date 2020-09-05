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
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Create new somiti</h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
              <form action="<?= base_url('create_somiti'); ?>" method="POST">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="reg_branch">Regional branch <span class="text-red">*</span></label>
                        <select class="form-control" name="reg_branch" id="reg_branch" onchange="getBranchList(this);" required>
                          <option value="">Select regional branch</option>
                          <?php foreach ($regBranchList as $reg_branch) {
                            echo '<option value="'. $reg_branch->id .'">'.$reg_branch->name.'</option>';
                          } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="branch">Branch <span class="text-red">*</span></label>
                        <select class="form-control" name="branch" id="branch" required>
                          <option value="">Select Branch</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employee">Employee name <span class="text-red">*</span></label>
                        <select class="form-control" name="employee" id="employee" required>
                          <option value="">Select employee</option>
                          <?php foreach ($employeeList as $employee) {
                            echo '<option value="'. $employee->id .'">'.$employee->emp_name.'</option>';
                          } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="somiti_name">Somiti name <span class="text-red">*</span></label>
                        <input type="text" class="form-control" id="somiti_name" name="somiti_name" placeholder="Enter somiti name" required>
                    </div>

                    <?php
                      $projectList = $this->db->order_by("id","ASC")->get("project")->result();
                    ?>

                    <div class="form-group">
                        <label for="somiti_project" style="text-decoration: underline;">Somiti Project <span class="text-red">*</span></label><br/>

                        <?php foreach($projectList as $list): ?>

                          <input type="checkbox" name="project[]" value="<?php echo $list->id ?>"> &nbsp;&nbsp;&nbsp; <?= $list->project_name ?> &nbsp; - &nbsp; <?php if($list->pksf == 1):echo "PKSF";elseif($list->pksf == 2):echo "NON-PKSF";endif; ?> <br/>
                        
                        <?php endforeach; ?>

                    </div>
                    
                  </div>
                  <div class="col-md-4">

                    <div class="form-group">
                        <label for="somiti_address">Somiti address <span class="text-red">*</span></label>
                        <input type="text" class="form-control" id="somiti_address" name="somiti_address" placeholder="Enter somiti address" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone <span class="text-red">*</span></label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no" value="<?= set_value('phone'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?= set_value('email'); ?>">
                    </div>                  
                    <div class="form-group">
                        <label for="zilla">District</label>
                        <select class="form-control" name="zilla" id="zilla" onchange="getUpazillaList(this);" required>
                          <option value="">Select District</option>
                          <?php foreach ($districts as $district) {
                            echo '<option value="'. $district->id .'">'.$district->name.'</option>';
                          } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="upazilla">Upazila</label>
                        <select class="form-control" name="upazilla" id="upazilla">
                          <option value="">Select Upazila</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for=""></label>
                        <a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Back</a>
                        <input type="submit" name="submit" value="Save" class="btn btn-primary btn-sm pull-right">
                    </div>
                    <div class="form-group">
                    <?php if (hasFlash('msg_somiti')) {?>
                        <span><?= flashMessage('msg_somiti')  ?></span>
                    <?php } ?>
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