<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Search Branch</small>
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
              <h3 class="box-title">Search Branch</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body color-black">
              <div class="row">
                <form action="<?= base_url('search_branch'); ?>" method="GET">
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="reg_branch">Regional Branch <span class="text-red">*</span></label>
                        <select class="form-control" name="reg_branch" id="reg_branch" required>
                          <option value="">Select Regional branch</option>
                          <?php if(!empty($regionalbranchList)){ foreach ($regionalbranchList as $branch) {
                            echo '<option value="'. $branch->id .'">'.$branch->name.'</option>';
                          }} ?>
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
                        <th>Address</th>
                        <th>PKSF/NON-PKSF</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <?php if(hasPermission('edit_branch')): ?>
                          <th>Action</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($branchList)){ foreach ($branchList as $branch) { ?>
                        <tr>
                          <td><?= $branch->id; ?></td>
                          <td><?= $branch->name; ?></td>
                          <td><?= $branch->address; ?></td>
                          <td><?php if($branch->pksf_non_pksf == 1):echo "PKSF";elseif($branch->pksf_non_pksf == 2):echo "NON-PKSF";endif; ?></td>
                          <td><?= $branch->email; ?></td>
                          <td><?= $branch->phone; ?></td>
                          <?php if(hasPermission('edit_branch')): ?>
                            <td>
                            
                              <a href="<?= base_url('/edit/branch').'/'. $branch->id ; ?>">Edit&nbsp;<i class="fa fa-edit"></i></a>
                              
                              <a href="<?= base_url('/delete/branch').'/'. $branch->id ; ?>" style="color:red;" onclick="return confirm('Are you sure to delete this branch ?')" >Delete&nbsp;<i class="fa fa-trash"></i></a>
                              
                            
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