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
        <tr><td style="text-align: center; font-size:12px;" colspan="3"><strong>Balance Sheet # As of <?php echo $date ?></strong></td></tr>
        <tr><td style="text-align: center; font-size:13px;" colspan="3">Reg. Branch # <?= $reg_branch_info ?> &nbsp; &nbsp; &nbsp; Branch # <?php echo $branchInfo ?></td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
    </table>

    <table style="width:100%; padding:10px; border-collapse:collapse;">
      <tr>
        <td style="padding:3px 0; font-size:10px;">Asset</td>
        <td style="width:100px;">&nbsp;</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        $sub_head_total = 0;
        $total_asset    = 0;
        foreach($assetList as $v) {
            if($sub_head_id != $v->sub_head){
               if(!empty($sub_head_id)){
                    echo '<tr><td>&nbsp;</td><td style="padding:3px 0; font-size:10px; text-align:right; border-top:1px solid #000;"> '.$sub_head_total.'</td></tr>';
                }
                echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td><td>&nbsp;</td></tr>';
                $sub_head_id = $v->sub_head;
                $sub_head_total = 0;
            }

            $sub_head_total += $v->debit_balance;
            $total_asset     += $v->debit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td style="padding:3px 0; font-size:10px; text-align:right"> '.$v->debit_balance.'</td></tr>';
        }

        echo '<tr><td>&nbsp;</td><td style="padding:3px 0; font-size:10px; text-align:right; border-top:1px solid #000;">'.$sub_head_total.'</td></tr>';
        echo '<tr><td style="padding:3px 0; font-size:10px;">Total Asset</td><td style="padding:3px 0; font-size:10px;  text-align:right; border-top:1px solid #000;">'.$total_asset.'</td></tr>';
      ?>  
    </table>

    <table style="width:100%; padding:10px; border-collapse:collapse;">
      <tr>
        <td style="padding:3px 0; font-size:10px;">Liability</td>
        <td style="width:100px;">&nbsp;</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        $sub_head_total = 0;
        $total_liability = 0;
        foreach($liabilityList as $v) {
            if($sub_head_id != $v->sub_head){

                if(!empty($sub_head_id)){
                    echo '<tr><td>&nbsp;</td><td style="padding:3px 0; font-size:10px; text-align:right; border-top:1px solid #000;"> '.$sub_head_total.'</td></tr>';
                }
                
                echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td><td>&nbsp;</td></tr>';
                $sub_head_id = $v->sub_head;
                $sub_head_total = 0;
            }

            $sub_head_total     += $v->credit_balance;
            $total_liability    += $v->credit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td style="padding:3px 0; font-size:10px; text-align:right"> '.$v->credit_balance.'</td></tr>';
        }

        echo '<tr><td>&nbsp;</td><td style="padding:3px 0; font-size:10px; border-top:1px solid #000; text-align:right"> '.$sub_head_total.'</td></tr>';
        echo '<tr><td style="padding:3px 0; font-size:10px;">Total Liability</td><td style="padding:3px 0; font-size:10px; border-top:1px solid #000; text-align:right">'.$total_liability.'</td></tr>';
      ?>  
    </table>

    <table style="width:100%; padding:10px; border-collapse:collapse;">
      <tr>
        <td style="padding:3px 0; font-size:10px;">Equity</td>
        <td style="width:100px;">&nbsp;</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        $sub_head_total = 0;
        $total_equity   = 0;
        foreach($equityList as $v) {
            if($sub_head_id != $v->sub_head){
                if(!empty($sub_head_id)){
                    echo '<tr><td>&nbsp;</td><td style="padding:3px 0; font-size:10px; border-top:1px solid #000; text-align:right"> '.$sub_head_total.'</td></tr>';
                }
                echo '<tr><td colspan="2" style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td></tr>';
                $sub_head_id = $v->sub_head;
                $sub_head_total = 0;
            }

            $sub_head_total   += $v->credit_balance;
            $total_equity     += $v->credit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right" style="padding:3px 0; font-size:10px; text-align:right"> '.$v->credit_balance.'</td></tr>';
        }

        echo '<tr><td>&nbsp;</td><td style="padding:3px 0; font-size:10px; border-top:1px solid #000; text-align:right"> '.$sub_head_total.'</td></tr>';
         echo '<tr><td style="padding:3px 0; font-size:10px;">Accumulated Profit/Loss</td><td style="padding:3px 0; font-size:10px; border-top:1px solid #000; text-align:right">'.($incomeInfo->credit_balance - $expenseInfo->debit_balance).'</td></tr>';
        echo '<tr><td style="padding:3px 0; font-size:10px;">Total Equity & Accumulated Profit/Loss</td><td style="padding:3px 0; font-size:10px; border-top:1px solid #000; text-align:right">'.($total_equity + $incomeInfo->credit_balance - $expenseInfo->debit_balance).'</td></tr>';

        echo '<tr><td style="padding:3px 0; font-size:10px;">Total Liability & Equity</td><td style="padding:3px 0; font-size:10px; border-top:1px solid #000; text-align:right">'.($total_liability + $total_equity + $incomeInfo->credit_balance - $expenseInfo->debit_balance).'</td></tr>';
      ?>  
    </table>
</body>
</html>