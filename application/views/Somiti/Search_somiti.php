<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Search somiti</small>
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
              <h3 class="box-title">Search somiti</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body color-black">
              <div class="row">
                <form action="<?= base_url('search_somiti'); ?>" method="GET">
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="reg_branch">Regional Branch <span class="text-red">*</span></label>
                        <select class="form-control" name="reg_branch" id="reg_branch" onchange="getBranchList(this);" required>
                          <option value="">Select Regional Branch</option>
                          <?php foreach ($regBranchList as $reg_branch) {
                            echo '<option value="'. $reg_branch->id .'">'.$reg_branch->name.'</option>';
                          } ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Project</th>
                        <th>Address</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <?php if(hasPermission('edit_somiti')): ?>
                          <th>Action</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($somitiList)){ foreach ($somitiList as $somiti) { ?>
                        <tr>
                          <td><?= $somiti->id; ?></td>
                          <td><?= $somiti->name; ?></td>
                          <td>
                            <?php 
                              $pid = $this->db->select('GROUP_CONCAT(project_id) as id')->where("somiti_id",$somiti->id)->get('somiti_project')->row()->id; 
                              if($pid != ''):
                                echo $this->db->select('GROUP_CONCAT(project_name) as pname')->where_in('id',explode(",", $pid))->get("project")->row()->pname;
                                // echo $this->db->last_query();
                              endif;
                            ?>
                          </td>
                          <td><?= $somiti->address; ?></td>
                          <td><?= $somiti->email; ?></td>
                          <td><?= $somiti->phone; ?></td>
                          <?php if(hasPermission('edit_somiti')): ?>
                            <td>
                              <a href="<?= base_url('/edit/somiti').'/'. $somiti->id ; ?>">Edit&nbsp;<i class="fa fa-edit"></i></a>
                            
                              <a href="<?= base_url('/delete/somiti').'/'. $somiti->id ; ?>" style="color: red;" title="Delete Branch" onclick="return confirm('Are you sure to delete this somiti info ?')" >Delete<i class="fa fa-trash-o fa-lg" style="color: red;"></i></a>

                            </td>
                          <?php endif; ?>
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