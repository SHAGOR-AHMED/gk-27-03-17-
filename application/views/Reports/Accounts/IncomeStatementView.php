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
    <tr><td style="text-align: center; font-size:15px;" colspan="3"><strong>Income Statement # <?php echo "From ", $from_date, " To ", $to_date ?></strong></td></tr>
    <tr><td style="text-align: center; font-size:13px;" colspan="3">Reg. Branch # <?php echo $regBranchInfo->name ?> &nbsp; &nbsp; &nbsp; Branch # <?php echo $branchInfo->name ?></td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
</table>

<table class="table table-bordered table-condensed table-hover">
  <tr>
    <th colspan="2">Income</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    $sub_head_total = 0;
    $total_income   = 0;
    foreach($incomeList as $v) {
        if($sub_head_id != $v->sub_head){
           if(!empty($sub_head_id)){
                echo '<tr><td colspan="2"> <p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$sub_head_total.'</p></td></tr>';
            }
            echo '<tr><th colspan="2"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
            $sub_head_total = 0;
        }

        $sub_head_total += $v->credit_balance;
        $total_income   += $v->credit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> '.$v->credit_balance.'</td></tr>';
    }

    echo '<tr><td colspan="2"> <p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$sub_head_total.'</p></td></tr>';
    echo '<tr><th>Total Income</th><th><p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$total_income.'</p></th></tr>';
  ?>  
</table>

<table class="table table-bordered table-condensed table-hover">
  <tr>
    <th colspan="2">Expense</th>
  </tr>
  <?php
    $sub_head_id    = 0;
    $sub_head_total = 0;
    $total_expense  = 0;
    foreach($expenseList as $v) {
        if($sub_head_id != $v->sub_head){
            if(!empty($sub_head_id)){
                echo '<tr><td colspan="2"> <p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$sub_head_total.'</p></td></tr>';
            }
            
            echo '<tr><th colspan="2"> &nbsp; &nbsp; '.$v->sub_head_name.'</th></tr>';
            $sub_head_id = $v->sub_head;
            $sub_head_total = 0;
        }

        $sub_head_total   += $v->debit_balance;
        $total_expense    += $v->debit_balance;

        echo '<tr><td> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> '.$v->debit_balance.'</td></tr>';
    }

    echo '<tr><td colspan="2"> <p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$sub_head_total.'</p></td></tr>';
    echo '<tr><th>Total Expense</th><th><p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.$total_expense.'</p></th></tr>';
    echo '<tr><th>Accumulated Profit/Loss</th><th><p style="border-top:1px solid #000; width:150px; float:right; text-align:right">'.($total_income - $total_expense).'</p></th></tr>';
  ?>  
</table>