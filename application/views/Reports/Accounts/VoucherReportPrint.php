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
        <tr><td style="text-align: center; font-size:12px;" colspan="3"><strong>Cash Flow # <?php echo "From ", $from_date, " To ", $to_date ?></strong></td></tr>
        <tr><td style="text-align: center; font-size:10px;" colspan="3">Reg. Branch # <?php echo $regBranchInfo->name ?> &nbsp; &nbsp; &nbsp; Branch # <?php echo $branchInfo->name ?></td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
    </table>

    <table style="width:100%; padding:10px; border-collapse:collapse;">
        <thead>
            <tr>
                <th style="padding:3px 0; font-size:10px; text-align:left">Description</th>
                <th style="padding:3px 0; font-size:10px; text-align:right; width:100px;">Debit</th>
                <th style="padding:3px 0; font-size:10px; text-align:right; width:100px;">Credit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tranList as $v): ?>
            <tr>
                <td colspan="3" style="padding:3px 0; font-size:10px;"> Date # <?php echo $v->voucher_date ?> &nbsp; &nbsp; &nbsp; Voucher # <?php echo $v->voucher_no ?></td>
            </tr>
            <?php 
                $total_debit = 0;
                $total_credit = 0;
                foreach ($v->transections as $tran): 
                    $total_debit += $tran->debit;
                    $total_credit += $tran->credit;
            ?>
            <tr>
                <td style="padding:3px 0; font-size:10px;"><?php echo $tran->tran_head_name ?></td>
                <td style="padding:3px 0; font-size:10px; text-align:right;"><?php echo $tran->debit ?></td>
                <td style="padding:3px 0; font-size:10px; text-align:right;"><?php echo $tran->credit ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td style="padding:3px 0; font-size:10px;">&nbsp;</td>
                <td style="padding:3px 0; font-size:10px; text-align: right; border-top:1px solid #000;"><?php echo $total_debit ?></td>
                <td style="padding:3px 0; font-size:10px; text-align: right; border-top:1px solid #000;"><?php echo $total_credit ?></td>
            </tr>
            <tr>
                <td colspan="3" style="padding:3px 0; font-size:10px;">&nbsp;</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>