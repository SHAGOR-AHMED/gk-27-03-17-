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
        <form id="VoucherForm" action="<?= base_url('/voucher_create'); ?>" method="post">
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
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="voucher_caption">Voucher Caption</label>
                      <input type="text" class="form-control" id="voucher_caption" name="voucher_caption" placeholder="Enter voucher caption">
                    </div>
                </div>
            </div>

            <!-- voucher list to collect input form user -->
            <div id="grid">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Accounts Head</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Debit Amount</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Credit Amount</label>
                    </div>
                  </div>
                </div>
                <?php for($i = 1; $i < 3; $i++): ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" name="sub_head[]" required>
                                <option value="">Select sub head</option>
                                <?php
                                  $head_id = 0;
                                  foreach($sub_heads as $v) {
                                    if($head_id != $v->head_id){
                                      if(!empty($output)) echo '</optgroup>';
                                      echo '<optgroup label="'.$v->head_name.'">';
                                      $head_id = $v->head_id;
                                    }

                                    echo '<option value="'.$v->id.'">'.$v->name.'</option>';
                                  }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" name="tran_head[]" required>
                                <option value="">Select tran head</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" class="form-control text-right" name="debit_amount[]" placeholder="Debit amount" value="0" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <input type="text" class="form-control text-right" name="credit_amount[]" placeholder="Credit amount" value="0" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <span class="glyphicon glyphicon-trash remove-row" style="color:#d15b47; margin-top:8px; cursor:pointer"></span>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <div class="row">
                 <div class="col-md-6">
                     <a id="add-new-row" style="cursor:pointer">Add New Row</a>
                     <p><br ></p>
                 </div>
                 <div id="debit-amount" class="col-md-2 text-right" style="border-top:1px solid #000">0.00</div>
                <div id="credit-amount" class="col-md-2 text-right" style="border-top:1px solid #000">0.00</div>
            </div>
            <div class="form-group">
                <input type="hidden" id="DebitAmount" value="0">
                <input type="hidden" id="CreditAmount" value="0">
                <input type="submit" name="submit" value="Save" class="btn btn-primary btn-sm" />
            </div>
        </form>
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


  <div id="vourcher-row" style="display:none">
      <div class="row">        
        <div class="col-md-3">
            <div class="form-group"> 
                <select class="form-control" name="sub_head[]" required>
                    <option value="">Select sub head</option>
                    <?php
                      $head_id = 0;
                      foreach($sub_heads as $v) {
                        if($head_id != $v->head_id){
                          if(!empty($output)) echo '</optgroup>';
                          echo '<optgroup label="'.$v->head_name.'">';
                          $head_id = $v->head_id;
                        }

                        echo '<option value="'.$v->id.'">'.$v->name.'</option>';
                      }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select class="form-control" name="tran_head[]" required>
                    <option value="">Select tran head</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
              <input type="text" class="form-control text-right" name="debit_amount[]" placeholder="Debit amount" value="0" required>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
              <input type="text" class="form-control text-right" name="credit_amount[]" placeholder="Credit amount" value="0" required>
            </div>
        </div>
        <div class="col-md-2">
            <span class="glyphicon glyphicon-trash remove-row" style="color:#d15b47; margin-top:8px; cursor:pointer"></span>
        </div>
    </div>
  </div>

<?php view('inc.Footer'); ?>

<script type="text/javascript">
  $("#VoucherForm").on('submit', function(e){
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

  $(document).on("change", "select[name='sub_head[]']", function(){

    var base_url    = $("#base_url").html();
    var parent      = $(this).parents(".row");
    var subhead     = $(this).val();

    $.post(base_url+"getTranHeads", {subhead:subhead}, function(rtm){
        var li = '<option value="">Select tran head</option>';
        if(rtm.length>0){
            for(var i = 0; i< rtm.length; i++){ 
                li +='<option value="'+rtm[i]['id']+'">'+rtm[i]['name']+'</option>';
            }
            parent.find("select[name='tran_head[]']").html(li);
        } else {
            parent.find("select[name='tran_head[]']").html(li);
        }
    }, 'json');

  });

  $("#add-new-row").on('click', function(){
    var html = $("#vourcher-row").html();
    $("#grid").append(html);
  });

  $(document).on('click', ".remove-row", function(){
    var length = $("#grid").find(".row").length;
    if(length > 2) {
        $(this).parents(".row").remove();
        $("input[name='debit_amount[]']:first-child").trigger('blur');
        $("input[name='credit_amount[]']:first-child").trigger('blur');
    }
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
</script>
