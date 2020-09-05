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
        <form action="<?= base_url('/accounts_opening_show'); ?>" method="post" id="OpeningForm">
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
                      <label for="voucher_date">Date <span class="text-red">*</span></label>
                      <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="voucher_date" name="voucher_date" placeholder="Enter date" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                      <input type="submit" class="btn btn-sm btn-primary" value="View" style="margin-top:26px;">
                    </div>
                </div>
            </div>
        </form>

        <div id="AccountsHead">
          
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
  $("#OpeningForm").on("submit", function(e) {

    var action   = $("#OpeningForm").attr("action");
    var data     = $(this).serializeArray();

    $.post(action, data, function(rtm){
        $("#AccountsHead").html(rtm);
    }, 'html');

    e.preventDefault();

  });

  $(document).on('blur', "input[name='debit_amount[]']", function(){
    var total = 0;
    $("input[name='debit_amount[]']").each(function(key, el){
        total += +$(el).val();
    });
    $("#debit-amount").html(total.toFixed(2));
    $("#DebitAmount").val(total.toFixed(2));
  });

  $(document).on('blur', "input[name='credit_amount[]']", function(){
    var total = 0;
    $("input[name='credit_amount[]']").each(function(key, el){
        total += +$(el).val();
    });
    $("#credit-amount").html(total.toFixed(2));
    $("#CreditAmount").val(total.toFixed(2));
  });


  $(document).on('submit', '#OpeningBalnaceForm', function(e){
    var debit = +$("#DebitAmount").val();
    var credit = +$("#CreditAmount").val();

    if(debit != credit) { 
      alert("Debit & Credit amount must be equal."); 
      e.preventDefault();
      return false;
    } 
    if(debit == 0 || credit == 0) { 
      alert("Please enter debit & credit amount"); 
      e.preventDefault();
      return false; 
    } 

  });
</script>
