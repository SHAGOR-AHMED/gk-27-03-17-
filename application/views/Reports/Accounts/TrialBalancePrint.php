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
        <tr><td style="text-align: center; font-size:12px;" colspan="3"><strong>Trial Balance As on # <?php echo $date ?></strong></td></tr>
        <tr><td style="text-align: center; font-size:10px;" colspan="3">Reg. Branch # <?php echo $regBranchInfo->name ?> &nbsp; &nbsp; &nbsp; Branch # <?php echo $branchInfo->name ?></td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
    </table>

    <table style="width:100%; padding:10px; border-collapse:collapse;">
      <tr>
        <td style="padding:3px 0; font-size:10px;">Accounts Head</td>
        <td style="padding:3px 0; font-size:10px; text-align:right; width:100px;">Debit</td>
        <td style="padding:3px 0; font-size:10px; text-align:right; width:100px;">Credit</td>
      </tr>
      <tr>
        <td colspan="3" style="padding:3px 0; font-size:10px;">Asset</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        $total_debit    = 0;
        $total_credit   = 0;
        foreach($assetList as $v) {
            if($sub_head_id != $v->sub_head){
                echo '<tr><td colspan="3" style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td></tr>';
                $sub_head_id = $v->sub_head;
            }

            $total_debit  += $v->debit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td style="padding:3px 0; font-size:10px; text-align:right"> '.$v->debit_balance.'</td><td class="text-right"> </td></tr>';
        }
      ?> 
      <tr>
        <td colspan="3" style="padding:3px 0; font-size:10px;">Liability</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        foreach($liabilityList as $v) {
            if($sub_head_id != $v->sub_head){
                echo '<tr><td colspan="3" style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td></tr>';
                $sub_head_id = $v->sub_head;
            }

            $total_credit  += $v->credit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> </td><td style="padding:3px 0; font-size:10px; text-align:right;"> '.$v->credit_balance.'</td></tr>';
        }
      ?>
      <tr>
        <td colspan="3" style="padding:3px 0; font-size:10px;">Equity</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        foreach($equityList as $v) {
            if($sub_head_id != $v->sub_head){
                echo '<tr><td colspan="3" style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td></tr>';
                $sub_head_id = $v->sub_head;
            }

            $total_credit  += $v->credit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td style="padding:3px 0; font-size:10px; text-align:right"> </td><td class="text-right"> '.$v->credit_balance.'</td></tr>';
        }
      ?>  
      <tr>
        <td colspan="3" style="padding:3px 0; font-size:10px;">Equity</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        foreach($equityList as $v) {
            if($sub_head_id != $v->sub_head){
                echo '<tr><td colspan="3" style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td></tr>';
                $sub_head_id = $v->sub_head;
            }

            $total_credit  += $v->credit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> </td><td style="padding:3px 0; font-size:10px; text-align:right"> '.$v->credit_balance.'</td></tr>';
        }
      ?>  
      <tr>
        <td colspan="3" style="padding:3px 0; font-size:10px;">Income</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        foreach($incomeList as $v) {
            if($sub_head_id != $v->sub_head){
                echo '<tr><td colspan="3" style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td></tr>';
                $sub_head_id = $v->sub_head;
            }

            $total_credit  += $v->credit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td class="text-right"> </td><td style="padding:3px 0; font-size:10px; text-align:right"> '.$v->credit_balance.'</td></tr>';
        }
      ?>  
      <tr>
        <td colspan="3" style="padding:3px 0; font-size:10px;">Expense</td>
      </tr>
      <?php
        $sub_head_id    = 0;
        foreach($expenseList as $v) {
            if($sub_head_id != $v->sub_head){
                echo '<tr><td colspan="3" style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp; '.$v->sub_head_name.'</td></tr>';
                $sub_head_id = $v->sub_head;
            }

            $total_debit  += $v->debit_balance;

            echo '<tr><td style="padding:3px 0; font-size:10px;"> &nbsp; &nbsp;  &nbsp; &nbsp; '.$v->tran_head_name.'</td><td style="padding:3px 0; font-size:10px; text-align:right"> '.$v->debit_balance.'</td><td style="padding:3px 0; font-size:10px; text-align:right"> </td></tr>';
        }

        echo '<tr><td style="padding:3px 0; font-size:10px;"> Grand Total </td><td style="padding:3px 0; font-size:10px; text-align:right; border-top:1px solid #000"> '.$total_debit.' </td><td style="padding:3px 0; font-size:10px; text-align:right;  border-top:1px solid #000"> '.$total_credit.' </td></tr>';
      ?>  
    </table>
</body>
</html>