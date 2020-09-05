<form id="OpeningBalnaceForm" action="<?= base_url('/opening_create'); ?>" method="post">
    <input type="hidden" name="reg_branch" value="<?php echo $reg_branch ?>">
    <input type="hidden" name="branch" value="<?php echo $branch ?>">
    <input type="hidden" name="voucher_date" value="<?php echo $voucher_date ?>">
    <!-- voucher list to collect input form user -->
    <div id="grid">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                  <p class="form-control-static">Accounts Head</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                  <p class="form-control-static text-right">Debit Amount</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                  <p class="form-control-static text-right">Credit Amount</p>
                </div>
            </div>
        </div>
        <?php 
            $total_debit = 0;
            $total_credit = 0;
            foreach ($tran_heads as $v): 
                $total_debit += $v->debit;
                $total_credit += $v->credit;
        ?>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                  <p class="form-control-static"><?php echo $v->head_name, ' / ', $v->sub_head_name, ' / ', $v->name ?></p>
                  <input type="hidden" name="sub_head[]" value="<?php echo $v->sub_head_id ?>">
                  <input type="hidden" name="tran_head[]" value="<?php echo $v->id ?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                  <input type="text" class="form-control text-right" name="debit_amount[]" placeholder="Debit amount" value="<?php echo $v->debit ? $v->debit : 0 ?>" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                  <input type="text" class="form-control text-right" name="credit_amount[]" placeholder="Credit amount" value="<?php echo $v->credit ? $v->credit : 0 ?>" required>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
         <div id="debit-amount" class="col-md-2 col-md-offset-3 text-right" style="border-top:1px solid #000"><?php echo $total_debit ?></div>
        <div id="credit-amount" class="col-md-2 text-right" style="border-top:1px solid #000"><?php echo $total_credit ?></div>
    </div>
    <div class="form-group">
        <input type="hidden" id="DebitAmount" value="<?php echo $total_debit ?>">
        <input type="hidden" id="CreditAmount" value="<?php echo $total_credit ?>">
        <input type="submit" name="submit" value="Save" class="btn btn-primary btn-sm" />
    </div>
</form>