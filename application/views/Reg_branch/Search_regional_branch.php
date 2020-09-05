<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Search Reg. Branch</small>
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
              <h3 class="box-title">Search Regional Branch</h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body color-black">
                  <table id="members_list_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <?php if(hasPermission('edit_regional_branch')): ?>
                          <th>Action</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($regionalBranchList)){ foreach ($regionalBranchList as $branch) { ?>
                        <tr>
                          <td><?= $branch->id; ?></td>
                          <td><?= $branch->name; ?></td>
                          <td><?= $branch->address; ?></td>
                          <td><?= $branch->email; ?></td>
                          <td><?= $branch->phone; ?></td>
                          <?php if(hasPermission('edit_regional_branch')): ?>
                            <td>
                              <a href="<?= base_url('/edit/regional_branch').'/'. $branch->id ; ?>">Edit&nbsp;<i class="fa fa-edit"></i></a> | 
                              <a href="<?= base_url('/delete/regional_branch').'/'. $branch->id ; ?>" style="color: red;" title="Delete Branch" onclick="return confirm('Are you sure to delete this regional branch ?')" >Delete<i class="fa fa-trash-o fa-lg" style="color: red;"></i></a>
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