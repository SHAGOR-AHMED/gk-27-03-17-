<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Search attendence</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Search attendence</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body color-black">
              <div class="row">
                <form action="<?= base_url('show_attendence'); ?>" method="GET">
                  <div class="col-md-2">
                      <div class="form-group">
                          <label for="reg_branch">Regional Branch <span class="text-red">*</span></label>
                          <select class="form-control" name="reg_branch" id="reg_branch" onchange="getBranchList(this);" required>
                            <option value="">Regional Branch</option>
                            <?php if(!empty($regionalbranchList)){ foreach ($regionalbranchList as $reg_branch) {
                              echo '<option value="'. $reg_branch->id .'">'.$reg_branch->name.'</option>';
                            } } ?>
                          </select>
                      </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="branch">Branch <span class="text-red">*</span></label>
                        <select class="form-control" name="branch" id="branch" required onchange="getEmpoyeeList(this);">
                          <option value="">Select Branch</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="employee">Employee </label>
                        <select class="form-control" name="employee" id="employee">
                          <option value="">All Employee</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="location">From <span class="text-red">*</span></label></label>
                        <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" name="from" id="from" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="location">To </label>
                        <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" name="to" id="to" value="<?= date('Y-m-d'); ?>">
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
                        <th>Designation</th>
                        <th>Branch</th>
                        <th>Date</th>
                        <th>Entry time</th>
                        <th>Exit time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($attendenceList)){ foreach ($attendenceList as $attendence) { ?>
                        <tr>
                          <td><?= $attendence->emp_name; ?></td>
                          <td><?= $attendence->emp_designation; ?></td>
                          <td><?= $attendence->branch_name; ?></td>
                          <td><?= $attendence->date; ?></td>
                          <td><?= $attendence->entry_time; ?></td>
                          <td><?= $attendence->exit_time; ?></td>
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