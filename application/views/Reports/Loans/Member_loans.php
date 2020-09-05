<!Doctype html>
<html>
<body style="color: #333;">
  <div style="width:670px; margin:15 auto; border:1px solid #CCC;">

      <table style="width:100%; padding:10px; border-collapse:collapse;">
          <tr>
            <td colspan="3" style="text-align: center; font-weight: 14px;">
              <?= $this->config->item('app_company_name'); ?>
              <br>
              <span style="font-size: 12px;">Loan report</span>
            </td>
          </tr>
          <tr style="font-size:12px;">
            <td>
              Member name: <?= (isset($loans_header_info->name))? $loans_header_info->name : 'N/A'; ?>
            </td>
            <td>
              Father/Husband: <?= (isset($loans_header_info->father_or_husband))? $loans_header_info->father_or_husband : 'N/A'; ?>
            </td>
            <td>
              Somiti name: <?= (isset($loans_header_info->somiti_name))? $loans_header_info->somiti_name : 'N/A'; ?>
            </td>
          </tr>
          <tr style="font-size:12px;">
            <td>
              Somiti id: <?= (isset($loans_header_info->somiti_id))? $loans_header_info->somiti_id : 'N/A'; ?>
            </td>
            <td>
              Loan purpose: <?= (isset($loans_header_info->loan_purpose))? $loans_header_info->loan_purpose : 'N/A'; ?>
            </td>
            <td>
              Loan amount: <?= (isset($loans_header_info->loan_amount))? $loans_header_info->loan_amount : 'N/A'; ?>
            </td>
          </tr>
          <tr style="font-size:12px;">
            <td>
              Total amount with interest: <?= (isset($loans_header_info->total_amount))? $loans_header_info->total_amount : 'N/A'; ?>
            </td>
            <td>
              Loan received date: <?= (isset($loans_header_info->opening_date))? $loans_header_info->opening_date : 'N/A'; ?>
            </td>
            <td>
              Loan expire date: <?= (isset($loans_header_info->closing_date))? $loans_header_info->closing_date : 'N/A'; ?>
            </td>
          </tr>
      </table>
    <div style="width:100%;">
      <table style="width:100%; padding:10px; border-collapse:collapse;">
          <tr style="font-size:12px; text-align:left; font-weight:bolder;">
            <td>Date</td>
            <td>Week no</td>
            <td>Colletable amount</td>
            <td>Colletable interest</td>
            <td>Actual amount</td>
            <td>Actual interest</td>
            <td>Total Collected amount</td>
            <td>Total Collected interest</td>
            <td>Remaining amount</td>
            <td>Remaining interest</td>
          </tr>
          <?php
           if(!empty($loans)){ foreach ($loans as $loan) { ?>
            <tr>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= date_format(date_create($loan->installment_date), 'd/m/y'); ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $loan->week_no; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $loan->collectable_amount; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $loan->collectable_interest; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $loan->actual_amount; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $loan->actual_interest; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $loan->total_collected_amount; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $loan->total_collected_interest; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $loan->remaining_amount; ?></td>
              <td style='border-top:1px solid #ccc; font-size:10px;'><?= $loan->remaining_interest; ?></td>
            </tr>
          <?php
          } }
          ?>
      </table>
    </div>

  </div>
    <span style="text-align:right;font-size:10px; margin-left:15px;">
      Date: <?= date("d M, Y / h:m:s:A")?> | Generated by <?= auth('name'); ?>
    </span>
</body>
</html>