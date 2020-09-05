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
        <form action="<?= base_url('/pksf_balance_sheet_report'); ?>" method="post" id="ReportForm">
            <input type="hidden" name="print_view" id="print_view" value="0">
            <div class="row">
                
                <div class="col-md-2">
                    <div class="form-group">
                      <label for="voucher_date">Date <span class="text-red">*</span></label>
                      <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="date" name="date" placeholder="Enter date" value="<?= date('Y-m-d'); ?>" required>
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
    if($("#date").val() == '') {
      alert("Please enter date");
      return false;
    }
    $("#print_view").val(1);
    $("#ReportForm").submit();
    $("#print_view").val(0);
  });
</script>
