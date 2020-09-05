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
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Area for <?= (isset($title))? $title : ''; ?></h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body color-black">
              <div class="row">
                <form action="<?= base_url('search_members'); ?>" method="GET">
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
                        <select class="form-control" name="branch" id="branch" onchange="getSomitiList(this);" required>
                          <option value="">Select Branch</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="somiti">Somiti <span class="text-red">*</span></label>
                        <select class="form-control" name="somiti" id="somiti" required>
                          <option value="">Select Somiti</option>
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
              </div>

                  <table id="members_list_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Member ID</th>
                        <th>Org. name</th>
                        <th>Name</th>
                        <th>Occupation</th>
                        <th>Education</th>
                        <th>Present Address</th>
                        <th>Parmanent Address</th>
                        <?php if(hasPermission('view_member') || hasPermission('edit_member')): ?>
                          <th>Action</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($membersList)){ foreach ($membersList as $member) { ?>
                        <tr>
                          <td><a href="<?= base_url('/member').'/'. $member->user_id ; ?>" title="Show member full information"><?= $member->user_id; ?></a></td>
                          <td><?= $member->organization; ?></td>
                          <td><?= $member->name; ?></td>
                          <td><?= $member->occupation; ?></td>
                          <td><?= $member->educational_status; ?></td>
                          <td><?= $member->address; ?></td>
                          <td><?= $member->parmanent_address; ?></td>
                          <td>
                            <?php if(hasPermission('view_member')) : ?>
                              <a href="<?= base_url('/member').'/'. $member->user_id ; ?>" title="Show member full information">&nbsp;<i class="fa fa-eye"></i></a> 
                            <?php endif; ?>
                            <?php if(hasPermission('edit_member')): ?>
                              <a href="<?= base_url('/edit/member').'/'. $member->user_id ; ?>" title="Edit this member information">&nbsp;<i class="fa fa-edit"></i></a>
                            <?php endif; ?>

                            <a href="<?= base_url('/delete/member').'/'. $member->id ; ?>" style="color: red;" title="Delete Member" onclick="return confirm('Are you sure to delete this member info ?')" ><i class="fa fa-trash-o fa-lg" style="color: red;"></i></a>

                          </td>
                        </tr>
                      <?php } } ?>
                    </tbody>
<!--                     <tfoot>
                      <tr>
                        <th>Member ID</th>
                        <th>Name</th>
                        <th>Village</th>
                        <th>Address</th>
                        <th>Details</th>
                      </tr>
                    </tfoot> -->
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