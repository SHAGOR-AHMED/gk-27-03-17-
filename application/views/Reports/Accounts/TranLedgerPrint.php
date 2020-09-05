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
        <tr><td style="text-align: center; font-size:12px;" colspan="3"><strong>Accounts Ledger for <?php echo $headInfo->name, " # From ", $from_date, " To ", $to_date ?></strong></td></tr>
        <tr><td style="text-align: center; font-size:10px;" colspan="3">Reg. Branch # <?php echo $regBranchInfo->name ?> &nbsp; &nbsp; &nbsp; Branch # <?php echo $branchInfo->name ?></td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
    </table>

    <table style="width:100%; padding:10px; border-collapse:collapse;">
        <thead>
            <tr>
                <th style="padding:3px 0; font-size:10px; text-align:center;">SN</th>
                <th style="padding:3px 0; font-size:10px; text-align:center;">Date</th>
                <th style="padding:3px 0; font-size:10px; text-align:center;">Description</th>
                <th style="padding:3px 0; font-size:10px; text-align:right;">Debit</th>
                <th style="padding:3px 0; font-size:10px; text-align:right;">Credit</th>
                <th style="padding:3px 0; font-size:10px; text-align:right;">Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1; 
                $balance = 0;
                if(!empty($pervBalance->debit_balance)) {
                    echo '<tr><td style="padding:3px 0; font-size:10px; text-align:center;">'.$i++.'</td><td colspan="4" style="padding:3px 0; font-size:10px;">Previous Balance</td><td style="padding:3px 0; font-size:10px; text-align:center;">'.$pervBalance->debit_balance.'</td></tr>';
                    $balance = $pervBalance->debit_balance;
                }
                
                foreach ($tranList as $v): 
                    $balance += $v->debit - $v->credit;
                    if($v->voucher_id == 0) $v->voucher_caption = "Opening Balance";
            ?>
            <tr>
                <td style="padding:3px 0; font-size:10px; text-align:center;"><?php echo $i++; ?></td>
                <td style="padding:3px 0; font-size:10px; text-align:center;"><?php echo $v->voucher_date; ?></td>
                <td style="padding:3px 0; font-size:10px;"><?php echo $v->voucher_caption; ?></td>
                <td style="padding:3px 0; font-size:10px; text-align:right;"><?php echo $v->debit; ?></td>
                <td style="padding:3px 0; font-size:10px; text-align:right;"><?php echo $v->credit; ?></td>
                <td style="padding:3px 0; font-size:10px; text-align:right;"><?php echo $balance; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="5" style="padding:3px 0; font-size:10px; text-align:right;">Balance</th>
                <th style="padding:3px 0; font-size:10px; text-align:right; border-top:1px solid #000"><?php echo $balance; ?></th>
            </tr>
        </tbody>
    </table>
</body>
</html>