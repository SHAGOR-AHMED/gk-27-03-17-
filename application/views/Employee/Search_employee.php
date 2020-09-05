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

        <?php if($this->session->flashdata("msg") != ''): ?>

          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $this->session->flashdata("msg") ?>
          </div>
        
        <?php endif; ?>

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?= (isset($title))? $title : ''; ?> Panel</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body color-black">
              <div class="row">
                <form action="<?= base_url('search_employee'); ?>" method="GET">
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="reg_branch">Regional branch <span class="text-red">*</span></label>
                        <select class="form-control" name="reg_branch" id="reg_branch" onchange="getBranchList(this);" required>
                          <option value="">Select regional branch</option>
                          <?php foreach ($regBranchList as $reg_branch) {
                            echo '<option value="'. $reg_branch->id .'">'.$reg_branch->name.'</option>';
                          } ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="branch">Branch <span class="text-red">*</span></label>
                        <select class="form-control" name="branch" id="branch" required>
                          <option value="">Select Branch</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="search" class="sr-only">search</label>
                      <br/>
                      <input type="submit" class="btn btn-primary" value="Search" style="margin-top:7px;">
                    </div>
                  </div> 
                </form>
              </div>

                  <table id="members_list_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Father</th>
                        <th>Mother</th>
                        <th>Designation</th>
                        <th>Joining</th>
                        <th>phone</th>
                        <th>NID</th>
                        <?php if(hasPermission('view_employee_info') || hasPermission('edit_employee')): ?>
                          <th>Action</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($empList)){ foreach ($empList as $allEmp) { ?>
                        <tr>
                          <td><a href="<?= base_url('employee').'/'. $allEmp->id; ?>" title="Show Details"><?= $allEmp->emp_name; ?></a></td>
                          <td><?= $allEmp->emp_father_husband; ?></td>
                          <td><?= $allEmp->emp_mother; ?></td>
                          <td><?= $allEmp->emp_designation; ?></td>
                          <td><?= $allEmp->emp_joining; ?></td>
                          <td><?= $allEmp->emp_phone; ?></td>
                          <td><?= $allEmp->nid; ?></td>
                          <td>
                            
                            <?php if(hasPermission('view_employee_info')): ?>
                              <a href="<?= base_url('employee').'/'. $allEmp->id; ?>" title="Show Details">&nbsp;<i class="fa fa-eye fa-lg"></i></a>
                            <?php endif; ?>

                            <?php if(hasPermission('edit_employee')): ?>
                              <a href="<?= base_url('/edit/employee').'/'. $allEmp->id ; ?>" title="Edit Details">&nbsp;<i class="fa fa-edit fa-lg"></i></a>
                            <?php endif; ?>

                            <a href="<?= base_url('/delete/employee').'/'. $allEmp->id ; ?>" onclick="return confirm('Are you sure to delete this employee ?')" title="Delete Employee">&nbsp;<i class="fa fa-trash-o fa-lg" style="color: red;"></i></a>

                          </td>
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