<!Doctype html>
<html>
<body>
    

    <table style="width:100%; padding:10px; border-collapse:collapse;">
        <tr>
          <td colspan="3" style="text-align: center; font-weight: 14px;">
            <?php echo $companyinfo->name ?>             
          </td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center; font-size: 12px;">
            <?php echo $companyinfo->address ?>             
          </td>
        </tr>
        <tr><td style="text-align: center; font-size:12px;" colspan="3"><strong>Income Statement # <?php echo "From ", $from_date, " To ", $to_date ?></strong></td></tr>
        <tr><td style="text-align: center; font-size:10px;" colspan="3">Reg. Branch # <?php echo $regBranchInfo->name ?> &nbsp; &nbsp; &nbsp; Branch # <?php echo $branchInfo->name ?></td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
    </table>

    <table style="width:100%; padding:10px; border-collapse:collapse;">
      <tr>
        <td style="padding:3px 0; font-size:10px;">Income</td>
        <td style="width:100px;">&nbsp;</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        $sub_head_total = 0;
        $total_income   = 0;
        foreach($incomeList as $v) {
            if($sub_head_id != $v->sub_head){
               if(!empty($sub_head_id)){
                    echo '<tr><td>&nbsp;</td><td style="padding:3px 0; font-size:10px; text-align:right; border-top:1px solid #000;"> '.$sub_head_total.'</td></tr>';
                }
                echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td><td>&nbsp;</td></tr>';
                $sub_head_id = $v->sub_head;
                $sub_head_total = 0;
            }

            $sub_head_total += $v->credit_balance;
            $total_income   += $v->credit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td style="padding:3px 0; font-size:10px; text-align:right"> '.$v->credit_balance.'</td></tr>';
        }

        echo '<tr><td>&nbsp;</td><td style="padding:3px 0; font-size:10px; text-align:right; border-top:1px solid #000;">'.$sub_head_total.'</td></tr>';
        echo '<tr><td style="padding:3px 0; font-size:10px;">Total Income</td><td style="padding:3px 0; font-size:10px;  text-align:right; border-top:1px solid #000;">'.$total_income.'</td></tr>';
      ?>  
    </table>

    <table style="width:100%; padding:10px; border-collapse:collapse;">
      <tr>
        <td style="padding:3px 0; font-size:10px;">Expense</td>
        <td style="width:100px;">&nbsp;</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        $sub_head_total = 0;
        $total_expense = 0;
        foreach($expenseList as $v) {
            if($sub_head_id != $v->sub_head){

                if(!empty($sub_head_id)){
                    echo '<tr><td>&nbsp;</td><td style="padding:3px 0; font-size:10px; text-align:right; border-top:1px solid #000;"> '.$sub_head_total.'</td></tr>';
                }
                
                echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td><td>&nbsp;</td></tr>';
                $sub_head_id = $v->sub_head;
                $sub_head_total = 0;
            }

            $sub_head_total   += $v->debit_balance;
            $total_expense    += $v->debit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td style="padding:3px 0; font-size:10px; text-align:right"> '.$v->debit_balance.'</td></tr>';
        }

        echo '<tr><td>&nbsp;</td><td style="padding:3px 0; font-size:10px; border-top:1px solid #000; text-align:right"> '.$sub_head_total.'</td></tr>';
        echo '<tr><td style="padding:3px 0; font-size:10px;">Total Expense</td><td style="padding:3px 0; font-size:10px; border-top:1px solid #000; text-align:right">'.$total_expense.'</td></tr>';
        echo '<tr><td style="padding:3px 0; font-size:10px;">Accumulated Profit/Loss</td><td style="padding:3px 0; font-size:10px; border-top:1px solid #000; text-align:right">'.($total_income - $total_expense).'</td></tr>';
      ?>  
    </table>
</body>
</html>