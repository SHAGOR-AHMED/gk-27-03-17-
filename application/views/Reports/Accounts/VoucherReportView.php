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
    <tr><td style="text-align: center; font-size:15px;" colspan="3"><strong>Voucher Report # <?php echo $from_date, " To ", $to_date ?></strong></td></tr>
    <tr><td style="text-align: center; font-size:13px;" colspan="3">Reg. Branch # <?php echo $regBranchInfo->name ?> &nbsp; &nbsp; &nbsp; Branch # <?php echo $branchInfo->name ?></td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
</table>

<table class="table table-bordered table-condensed table-hover">
    <thead>
        <tr>
            <th class="text-left">Description</th>
            <th class="text-right">Debit</th>
            <th class="text-right">Credit</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tranList as $v): ?>
        <tr>
            <th> Date # <?php echo $v->voucher_date ?> &nbsp; &nbsp; &nbsp; Voucher # <?php echo $v->voucher_no ?></th>
            <th class="text-right" colspan="2">&nbsp;</th>
        </tr>
        <?php 
            $total_debit = 0;
            $total_credit = 0;
            foreach ($v->transections as $tran): 
                $total_debit += $tran->debit;
                $total_credit += $tran->credit;
        ?>
        <tr>
            <td><?php echo $tran->tran_head_name ?></td>
            <td class="text-right"><?php echo $tran->debit ?></td>
            <td class="text-right"><?php echo $tran->credit ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td>&nbsp;</td>
            <td class="text-right" style="border-top:1px solid #000"><?php echo $total_debit ?></td>
            <td class="text-right" style="border-top:1px solid #000"><?php echo $total_credit ?></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>