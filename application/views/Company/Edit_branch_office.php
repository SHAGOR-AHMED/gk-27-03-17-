<?php view('inc.Header'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>for <?= (isset($title))? $title : ''; ?> Office</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        
          <!-- Default box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= (isset($title))? $title : ''; ?> Office</h3>
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
            <form action="<?= base_url('update_branch_office'); ?>" method="POST">
            <input type="hidden" name="hidden_id" value="<?= $branch_office->id; ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="branch_office_name">Branch office name <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="branch_office_name" name="branch_office_name" placeholder="Enter branch office name" value="<?= $branch_office->branch_name; ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="address">Address <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter branch address" value="<?= $branch_office->address; ?>" required>
                  </div>
                  
                  <div class="form-group">
                      <label for="phone">Phone <span class="text-red">*</span></label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no" value="<?= $branch_office->phone; ?>" required>
                  </div>
                  
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?= $branch_office->email; ?>">
                  </div>
                  <div class="form-group">
                      <label for="fax">Fax</label>
                      <input type="text" class="form-control" id="fax" name="fax" placeholder="Enter fax no" value="<?= $branch_office->fax; ?>">
                  </div>
                  <div class="form-group">
                      <label for=""></label>
                      <a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Back</a>
                      <input type="submit" name="submit" class="btn btn-primary btn-sm pull-right" value="Update">
                  </div>
                  <div class="form-group">
                  <?php if (hasFlash('msg_branch_office')) {?>
                      <span><?= flashMessage('msg_branch_office')  ?></span>
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