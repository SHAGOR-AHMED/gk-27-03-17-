<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Search branch office</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Search Branch Office</h3>
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
                        <th>Phone</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($branchOfficeList)){ foreach ($branchOfficeList as $branch_office) { ?>
                        <tr>
                          <td><?= $branch_office->id; ?></td>
                          <td><?= $branch_office->branch_name; ?></td>
                          <td><?= $branch_office->address; ?></td>
                          <td><?= $branch_office->email; ?></td>
                          <td><?= $branch_office->phone; ?></td>
                          <td><?= $branch_office->fax; ?></td>
                          <td>
                            <a href="<?= base_url('edit/branch_office').'/'. $branch_office->id ; ?>">Edit&nbsp;<i class="fa fa-edit"></i></a> | 
                            <a href="javascript:">Delete&nbsp;<i class="fa fa-trash"></i></a>
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