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
    <tr><td style="text-align: center; font-size:15px;" colspan="3"><strong>Cash Flow for <?php echo $cashInfo->name, " # From ", $from_date, " To ", $to_date ?></strong></td></tr>
    <tr><td style="text-align: center; font-size:13px;" colspan="3">Reg. Branch # <?php echo $regBranchInfo->name ?> &nbsp; &nbsp; &nbsp; Branch # <?php echo $branchInfo->name ?></td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
</table>

<table class="table table-bordered table-condensed table-hover">
    <thead>
        <tr>
            <th class="text-center">SN</th>
            <th class="text-center">Date</th>
            <th class="text-center">Description</th>
            <th class="text-center">Debit</th>
            <th class="text-center">Credit</th>
            <th class="text-center">Balance</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i = 1; 
            $balance = 0;
            if(!empty($pervBalance->debit_balance)) {
                echo '<tr><td class="text-center">'.$i++.'</td><td colspan="4">Previous Balance</td><td class="text-right">'.$pervBalance->debit_balance.'</td></tr>';
                $balance = $pervBalance->debit_balance;
            }
            
            foreach ($tranList as $v): 
                $balance += $v->debit - $v->credit;
                if($v->voucher_id == 0) $v->voucher_caption = "Opening Balance";
        ?>
        <tr>
            <td class="text-center"><?php echo $i++; ?></td>
            <td class="text-center"><?php echo $v->voucher_date; ?></td>
            <td><?php echo $v->voucher_caption; ?></td>
            <td class="text-right"><?php echo $v->debit; ?></td>
            <td class="text-right"><?php echo $v->credit; ?></td>
            <td class="text-right"><?php echo $balance; ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="5" class="text-right">Balance</th>
            <th class="text-right" style="border-top:1px solid #000;"><?php echo $balance; ?></th>
        </tr>
    </tbody>
</table>