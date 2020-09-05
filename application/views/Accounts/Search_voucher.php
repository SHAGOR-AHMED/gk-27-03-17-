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
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Area for <?= (isset($title))? $title : ''; ?></h3>
              <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body color-black">
              <div class="row">
                <form action="<?= base_url('search_voucher'); ?>" method="GET">
                  <?php if($this->session->userdata("log_branch") == 786): ?>
                
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
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="branch">Branch </label>
                        <select class="form-control" name="branch" id="branch" required>
                          <option value="">Select Branch</option>
                        </select>
                    </div>
                </div>

              <?php endif; ?>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="somiti">From Date <span class="text-red">*</span></label>
                        <input class="form-control datepicker" name="from_date" id="from_date" required data-date-format="yyyy-mm-dd" value="<?= get('from_date') ?>" />
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="somiti">To Date <span class="text-red">*</span></label>
                        <input class="form-control datepicker" name="to_date" id="to_date" required data-date-format="yyyy-mm-dd" value="<?= get('to_date') ?>" />
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
                        <th class="text-center">SN</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Voucher No</th>
                        <th class="text-center">Voucher Caption</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($voucherList)){ $i = 1; foreach ($voucherList as $v) { ?>
                        <tr>
                          <td class="text-center"><?php echo $i++ ?></td>
                          <td class="text-center"><?= $v->voucher_date; ?></td>
                          <td class="text-center"><a href="<?= base_url('/voucher').'/'. $v->id ; ?>" title="Show voucher details"><?= $v->voucher_no; ?></a></td>
                          <td><?= $v->voucher_caption; ?></td>
                          <td class="text-center">
                              <a href="<?= base_url('/voucher').'/'. $v->id ; ?>">&nbsp;<i class="fa fa-eye"></i> View</a>

                              <a href="<?= base_url('/edit/voucher').'/'. $v->id ; ?>">&nbsp;<i class="fa fa-edit"></i> Edit </a>

                              <a class="remove-voucher" style="cursor:pointer" data-href="<?= base_url('/delete/voucher').'/'. $v->id ; ?>" >&nbsp;<i class="fa fa-trash"></i> Delete </a>
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

<script type="text/javascript">
  $(document).on('click', '.remove-voucher', function(){
    var x = confirm("Are you sure to delete?");

    if(x) {
      url = $(this).attr("data-href");
      parent = $(this).parents('tr');
      $.get(url, {}, function(rtm){
        parent.remove();
         $.toaster('Voucher deleted successfully.', 'Notice', 'info');
      }, 'json');

    }
  });
</script>