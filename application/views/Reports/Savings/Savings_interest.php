<!Doctype html>
<html>
<body style="color: #333;">
  <div style="width:670px; margin:15 auto; border:1px solid #CCC;">

      <table style="width:100%; padding:10px; border-collapse:collapse;">
          <tr>
            <td colspan="2" style="text-align: center; font-weight: 14px;">
              <?= $this->config->item('app_company_name'); ?>
              <br>
              <span style="font-size: 12px;">Savings interest
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
            <td>Serial</td>
            <!-- <td>Member ID</td> -->
            <td>Member</td>
            <td>Joining</td>
            <td>Balance Till</td>
            <td>Balance Till</td>
            <td>Total</td>
            <td>Obtained</td>
            <td>Balance</td>
          </tr>
          <tr style="font-size:12px; text-align:left; font-weight:bolder;">
            <td>No</td>
            <td>Name</td>
            <td>Date</td>
            <td><?= (isset($from))? date_format(date_create($from), 'd/m/y') : 'N/A' ?></td>
            <td><?= (isset($to))? date_format(date_create($to), 'd/m/y') : 'N/A' ?></td>
            <td>Balance</td>
            <td>Interest</td>
            <td>with Interest</td>
          </tr>
          <?php $count = 1; ?>
          <?php
           $gt_first_balance = 0.0;
           $gt_second_balance = 0.0;
           $gt_interest = 0.0;
           $gt_balance_with_interest = 0.0;
           if(!empty($interests)){ foreach ($interests as $interest) { ?>
            <?php 
              //calculating interest
              $total_savings = 0;
              $total_interest = 0;
              $total_savings = ($interest['first_balance']+$interest['second_balance']);
              $total_interest = (($total_savings/2)*(0.06))/2;
              $balance_with_interest = ($interest['second_balance']+$total_interest);
            ?>
            <tr>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $count++; ?></td>
              <!-- <td style='border-top:1px solid #ccc; font-size:10px;'><?= $interest['member_id']; ?></td> -->
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $interest['name']; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $interest['joining_date']; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $interest['first_balance']; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $interest['second_balance']; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $total_savings; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $total_interest; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $balance_with_interest; ?></td>
            </tr>
          <?php
              //counting the total to show footer row
              $gt_first_balance = ($gt_first_balance+$interest['first_balance']);
              $gt_second_balance = ($gt_second_balance+$interest['second_balance']);
              $gt_interest = ($gt_interest+$total_interest);
              $gt_balance_with_interest = ($gt_balance_with_interest+$balance_with_interest);
          } }
          ?>
          <tr>
            <td style='border-top:1px solid #ccc; font-size:10px; text-align: right; font-weight:bolder;' colspan="3">Total:&nbsp;</td>
            <td style='border-top:1px solid #ccc; font-size:10px; font-weight: bolder;'><?= $gt_first_balance; ?></td>  
            <td style='border-top:1px solid #ccc; font-size:10px; font-weight: bolder;'><?= $gt_second_balance; ?></td>  
            <td style='border-top:1px solid #ccc; font-size:10px; font-weight: bolder;'>&nbsp;</td>  
            <td style='border-top:1px solid #ccc; font-size:10px; font-weight: bolder;'><?= $gt_interest; ?></td>
            <td style='border-top:1px solid #ccc; font-size:10px; font-weight: bolder;'><?= $gt_balance_with_interest; ?></td>
          </tr>
      </table>
    </div>

  </div>
    <span style="text-align:right;font-size:10px; margin-left:15px;">
      Date: <?= date("d M, Y / h:m:s:A")?> | Generated by <?= auth('name'); ?>
    </span>
</body>
</html>