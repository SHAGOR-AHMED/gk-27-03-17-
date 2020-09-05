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
          <h3 class="box-title"><?= (isset($title))? $title : ''; ?></h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
        <form action="<?= base_url('/cash_flow_report'); ?>" method="post" id="ReportForm">
            <input type="hidden" name="print_view" id="print_view" value="0">
            <div class="row">
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
                        <label for="branch">Cash </label>
                        <select class="form-control" name="cash_id" id="cash_id" required>
                          <option value="">Select Cash</option>
                          <?php
                            foreach ($cashList as $v) {
                              echo '<option value="'.$v->id.'">'.$v->name.'</option>';
                            }
                          ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <label for="voucher_date">From <span class="text-red">*</span></label>
                      <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="date" name="from_date" placeholder="Enter date" value="<?= date('Y-m-01'); ?>" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <label for="voucher_date">To <span class="text-red">*</span></label>
                      <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="date" name="to_date" placeholder="Enter date" value="<?= date('Y-m-t'); ?>" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                      <input type="submit" class="btn btn-sm btn-primary" value="View" style="margin-top:26px;">
                      &nbsp; &nbsp;
                      <input type="button" id="print-button" class="btn btn-sm btn-primary" value="Print" style="margin-top:26px;">
                    </div>
                </div>
            </div>
        </form>

        <div id="ReportView">
          
        </div>

        </div><!-- /.box-body -->
        <div class="box-footer">
          <div class="form-group">
            <span>
                <?php if (hasFlash('msg')) {?>
                    <span><?= flashMessage('msg')  ?></span>
                <?php } ?>
            </span>
          </div>
        </div><!-- /.box-footer-->
      </div><!-- /.box -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>

<script type="text/javascript">
  $("#ReportForm").on("submit", function(e) {

    var print_view = $("#print_view").val();
    var action   = $("#ReportForm").attr("action");
    var data     = $(this).serializeArray();

    if(print_view == 0) {
      $.post(action, data, function(rtm){
          $("#ReportView").html(rtm);
      }, 'html');

      e.preventDefault();
    }

  });

  $("#print-button").on('click', function(){
    if($("#reg_branch").val() == '') {
      alert("Please select regional branch");
      return false;
    }
    if($("#branch").val() == '') {
      alert("Please select branch");
      return false;
    }
    if($("#cash_id").val() == '') {
      alert("Please select cash head");
      return false;
    }
    if($("#from_date").val() == '') {
      alert("Please enter from date");
      return false;
    }
    if($("#to_date").val() == '') {
      alert("Please enter to date");
      return false;
    }
    $("#print_view").val(1);
    $("#ReportForm").submit();
    $("#print_view").val(0);
  });
</script>
