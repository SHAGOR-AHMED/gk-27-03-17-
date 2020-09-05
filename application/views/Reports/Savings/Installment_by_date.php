<!Doctype html>
<html>
<body style="color: #333;">
  <div style="width:670px; margin:15 auto; border:1px solid #CCC;">

      <table style="width:100%; padding:10px; border-collapse:collapse;">
          <tr>
            <td colspan="2" style="text-align: center; font-weight: 14px;">
              <?= $this->config->item('app_company_name'); ?>
              <br>
              <span style="font-size: 12px;">Savings report<br>Date: <?php if(isset($installment_date)){
                  $installment_date = date_create($installment_date);
                  echo date_format($installment_date, 'd/m/y');
                }else{
                  echo "N/A";
                  } ?></span>
            </td>
          </tr>
          <tr style="font-size:12px;">
            <td>
              Somiti name: <?= (isset($somiti->name))? $somiti->name : 'N/A'; ?>
            </td>
            <td style="text-align:right;">
              Somiti id: <?= (isset($somiti->id))? $somiti->id : 'N/A'; ?>
            </td>
          </tr>
      </table>
    <div style="width:100%;">
      <table style="width:100%; padding:10px; border-collapse:collapse;">
          <tr style="font-size:12px; text-align:left; font-weight:bolder;">
            <td>
              Name
            </td>
             <td>
              Week no
            </td>
            <td>
              Description
            </td>
            <td>
              Deposit
            </td>
            <td>
              Withdraw
            </td>
            <td>
              Balance
            </td>
            <td>
              Received by
            </td>
          </tr>
          <?php
           $total_deposit = 0.0;
           $total_withdraw = 0.0;
           $total_balance = 0.0;
           if(!empty($installmentList)){ foreach ($installmentList as $installment) { ?>
            <tr>
              <td style='border-top:1px solid #ccc; font-size:10px;'>
                <?= $installment->member_name; ?>
              </td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $installment->week_no; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $installment->details; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px; <?= ($installment->deposit > 0)? "color:green;" : " " ?>'><?= $installment->deposit; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;<?= ($installment->withdraw > 0)? "color:red;" : " " ?>'><?= $installment->withdraw; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $installment->balance; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $installment->employee_name; ?></td>
            </tr>
          <?php
            $total_deposit = ($total_deposit+$installment->deposit);
            $total_withdraw = ($total_withdraw+$installment->withdraw);
            $total_balance = ($total_deposit-$total_withdraw);
          } }
          ?>
          <tr>
            <td style='border-top:1px solid #ccc; font-size:10px; text-align: right; font-weight:bolder;' colspan="3">Total:&nbsp;</td>
            <td style='border-top:1px solid #ccc; font-size:10px; font-weight: bolder; color:green;'><?= $total_deposit; ?></td>  
            <td style='border-top:1px solid #ccc; font-size:10px; font-weight: bolder; color:red;'><?= $total_withdraw; ?></td>  
            <td style='border-top:1px solid #ccc; font-size:10px; font-weight: bolder;'><?= $total_balance; ?></td>
            <td style='border-top:1px solid #ccc; font-size:10px;'>&nbsp;</td>
          </tr>
      </table>
    </div>

  </div>
    <span style="text-align:right;font-size:10px; margin-left:15px;">
      Date: <?= date("d M, Y / h:m:s:A")?> | Generated by <?= auth('name'); ?>
    </span>
</body>
</html>