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
              <h3 class="box-title"><?= (isset($title))? $title : ''; ?></h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                  <div class="col-md-4">
                      <form action="" method="POST" id="frm_create_role">
                          <div class="form-group">
                              <label for="role">Create Extra Role <span class="text-red">*</span></label>
                              <input type="text" name="role_name" id="role_name" class="form-control" placeholder="Enter role name" required>
                          </div>
                          <div class="form-group">
                              <label for=""></label>
                              <input type="submit" name="submit" class="btn btn-primary btn-sm pull-right" value="Save"/>
                          </div>
                          <div class="form-group">
                              <ol id="extra_roles">
                                <!-- dynamic list comes here -->
                              </ol>
                          </div>
                      </form>

                  </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="role">Role <span class="text-red">*</span></label>
                      <select class="form-control" name="role" id="role" onchange="getPermissionList();">
                        <option value="">Select Role</option>
                        <?php if(!empty($roles)){ foreach ($roles as $role) { ?>
                          <option value="<?= $role->id; ?>"><?= ucfirst($role->name); ?></option>
                        <?php } } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <ol id="permission_list">
                        <!-- dynamic list comes here -->
                      </ol>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="permission">Permission <span class="text-red">*</span></label>
                      <select class="form-control" name="permission" id="permission" required>
                        <option value="">Select Permission</option>
                        <?php if(!empty($permissions)){ foreach ($permissions as $permssion) { ?>
                          <option value="<?= $permssion->id; ?>"><?= ucfirst($permssion->label); ?></option>
                        <?php } } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for=""></label>
                      <input type="button" name="submit" class="btn btn-primary btn-sm pull-right" value="Assign" id="save" onclick="assign_permission();" />
                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
              <span class="text-success">Please select a role and then assign permission to the role.</span>
                <span>
                  <p id="message" class="pull-right"></p>
                </span>
              </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>
