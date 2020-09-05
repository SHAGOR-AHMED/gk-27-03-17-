<table style="width:100%; padding:10px; border-collapse:collapse;">
    <tr>
      <td colspan="3" style="text-align: center; font-weight: 14px; font-size:25px;">
        <?php echo $companyinfo->name ?>             
      </td>
    </tr>
    <tr>
      <td colspan="3" style="text-align: center; font-size: 12px;">
        <?php echo $companyinfo->address ?>             
      </td>
    </tr>
    <tr><td style="text-align: center; font-size:15px;" colspan="3"><strong>Trail Balance # As on <?php echo $date ?></strong></td></tr>
    <tr><td style="text-align: center; font-size:13px;" colspan="3">Reg. Branch # <?php echo $regBranchInfo->name ?> &nbsp; &nbsp; &nbsp; Branch # <?php echo $branchInfo->name ?></td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
</table>

<table class="table table-bordered table-condensed table-hover">
  <tr>
    <th class="text-center">Accounts Head</th>
    <th class="text-center">Debit</th>
    <th class="text-center">Credit</th>
  </tr>
  <tr>
    <th colspan="3">Asset</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    $total_debit    = 0;
    $total_credit   = 0;
    foreach($assetList as $v) {
        if($sub_head_id != $v->sub_head){
            echo '<tr><th colspan="3"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
        }

        $total_debit  += $v->debit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> '.$v->debit_balance.'</td><td class="text-right"> </td></tr>';
    }
  ?> 
  <tr>
    <th colspan="3">Liability</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    foreach($liabilityList as $v) {
        if($sub_head_id != $v->sub_head){
            echo '<tr><th colspan="3"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
        }

        $total_credit  += $v->credit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> </td><td class="text-right"> '.$v->credit_balance.'</td></tr>';
    }
  ?>
  <tr>
    <th colspan="3">Equity</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    foreach($equityList as $v) {
        if($sub_head_id != $v->sub_head){
            echo '<tr><th colspan="3"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
        }

        $total_credit  += $v->credit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> </td><td class="text-right"> '.$v->credit_balance.'</td></tr>';
    }
  ?>  
  <tr>
    <th colspan="3">Equity</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    foreach($equityList as $v) {
        if($sub_head_id != $v->sub_head){
            echo '<tr><th colspan="3"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
        }

        $total_credit  += $v->credit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> </td><td class="text-right"> '.$v->credit_balance.'</td></tr>';
    }
  ?>  
  <tr>
    <th colspan="3">Income</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    foreach($incomeList as $v) {
        if($sub_head_id != $v->sub_head){
            echo '<tr><th colspan="3"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
        }

        $total_credit  += $v->credit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> </td><td class="text-right"> '.$v->credit_balance.'</td></tr>';
    }
  ?>  
  <tr>
    <th colspan="3">Expense</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    foreach($expenseList as $v) {
        if($sub_head_id != $v->sub_head){
            echo '<tr><th colspan="3"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
        }

        $total_debit  += $v->debit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> '.$v->debit_balance.'</td><td class="text-right"> </td></tr>';
    }

    echo '<tr><th> Grand Total </th><th class="text-right"> '.$total_debit.' </th><th class="text-right"> '.$total_credit.' </th></tr>';
  ?>  
</table>