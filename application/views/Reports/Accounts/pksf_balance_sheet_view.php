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
    <tr><td style="text-align: center; font-size:15px;" colspan="3"><strong>Balance Sheet # As of <?php echo $date ?></strong></td></tr>
    <tr><td style="text-align: center; font-size:13px;" colspan="3">Reg. Branch # <?= $reg_branch_info ?> &nbsp; &nbsp; &nbsp; Branch # <?php echo $branchInfo ?></td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
</table>

<table class="table table-bordered table-condensed table-hover">
  <tr>
    <th colspan="2">Asset</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    $sub_head_total = 0;
    $total_asset    = 0;
    foreach($assetList as $v) {
        if($sub_head_id != $v->sub_head){
           if(!empty($sub_head_id)){
                echo '<tr><td colspan="2"> <p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$sub_head_total.'</p></td></tr>';
            }
            echo '<tr><th colspan="2"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
            $sub_head_total = 0;
        }

        $sub_head_total += $v->debit_balance;
        $total_asset     += $v->debit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> '.$v->debit_balance.'</td></tr>';
    }

    echo '<tr><td colspan="2"> <p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$sub_head_total.'</p></td></tr>';
    echo '<tr><th>Total Asset</th><th><p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$total_asset.'</p></th></tr>';
  ?>  
</table>

<table class="table table-bordered table-condensed table-hover">
  <tr>
    <th colspan="2">Liability</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    $sub_head_total = 0;
    $total_liability = 0;
    foreach($liabilityList as $v) {
        if($sub_head_id != $v->sub_head){
            if(!empty($sub_head_id)){
                echo '<tr><td colspan="2"> <p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$sub_head_total.'</p></td></tr>';
            }
            
            echo '<tr><th colspan="2"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
            $sub_head_total = 0;
        }

        $sub_head_total     += $v->credit_balance;
        $total_liability    += $v->credit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> '.$v->credit_balance.'</td></tr>';
    }

    echo '<tr><td colspan="2"> <p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$sub_head_total.'</p></td></tr>';
    echo '<tr><th>Total Liability</th><th><p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$total_liability.'</p></th></tr>';
  ?>  
</table>

<table class="table table-bordered table-condensed table-hover">
  <tr>
    <th colspan="2">Equity</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    $sub_head_total = 0;
    $total_equity   = 0;
    foreach($equityList as $v) {
        if($sub_head_id != $v->sub_head){
            if(!empty($sub_head_id)){
                echo '<tr><td colspan="2"> <p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$sub_head_total.'</p></td></tr>';
            }
            echo '<tr><th colspan="2"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
            $sub_head_total = 0;
        }

        $sub_head_total   += $v->credit_balance;
        $total_equity     += $v->credit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> '.$v->credit_balance.'</td></tr>';
    }

    echo '<tr><td colspan="2"> <p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$sub_head_total.'</p></td></tr>';
     echo '<tr><th>Accumulated Profit/Loss</th><th><p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.($incomeInfo->credit_balance - $expenseInfo->debit_balance).'</p></th></tr>';
    echo '<tr><th>Total Equity & Accumulated Profit/Loss</th><th><p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.($total_equity + $incomeInfo->credit_balance - $expenseInfo->debit_balance).'</p></th></tr>';

    echo '<tr><th>Total Liability & Equity</th><th><p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.($total_liability + $total_equity + $incomeInfo->credit_balance - $expenseInfo->debit_balance).'</p></th></tr>';
  ?>  
</table>