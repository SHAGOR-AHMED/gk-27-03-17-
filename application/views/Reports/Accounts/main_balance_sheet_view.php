<style type="text/css">
  table tr td{
    text-align: center !important;
  }
</style>

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
    <tr><td style="text-align: center; font-size:15px;" colspan="3"><strong>Balance Sheet # As of <?php echo $date ?></strong></td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
</table>

<table width="100%" height="auto" class="table-bordered">

  <tr>
    <td rowspan="2" colspan="2"> খাত </td>
    <td colspan="3"> বিগত অর্থ বছর <?= $last_year ?> </td>
    <td colspan="3"> চলতি অর্থ বছর <?= $date ?> </td>
  </tr>
  
  <tr>
    <td> পিকেএসএফ </td>
    <td> নন পিকেএসএফ </td>
    <td> মোট </td>
    <td> পিকেএসএফ </td>
    <td> নন পিকেএসএফ </td>
    <td> মোট </td>
  </tr>
  
  <tr>
    <td colspan="2"></td>
    <td> টাকা </td>
    <td> টাকা  </td>
    <td> টাকা </td>
    <td> টাকা </td>
    <td> টাকা </td>
    <td> টাকা </td>
  </tr>

<?php

  $last_year_pk_total_head = 0;
  $last_year_npk_total_head = 0;

  $this_year_pk_total_head = 0;;
  $this_year_npk_total_head = 0;;

  foreach($head as $h):
?>

  <tr>
    <td colspan="2" style="text-align: left !important;font-weight: bold;">&nbsp;<?= $h->name ?></td>
    <td colspan="6"></td>
  </tr>

<?php
  $sub_head = $this->db->where("head_id",$h->id)->get("acc_sub_heads")->result();
  foreach($sub_head as $sh):
?>

  <tr>
    <td colspan="2" style="text-align: left !important;font-weight: bold;" >&nbsp;&nbsp;&nbsp; <?= $sh->name ?> </td>
    <td colspan="6"></td>
  </tr>

<?php
  $trend_head = $this->db->where("sub_head_id",$sh->id)->get("acc_tran_heads")->result();
  foreach($trend_head as $th):
?>

  <tr>
  
    <td colspan="2" style="text-align: left !important;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $th->name ?> </td>
    
    <td><?php $last_year_pk_head = $this->Accounts_model->headWiseTotal($th->id,1,$last_year_start,$last_year_end);echo $last_year_pk_head;$last_year_pk_total_head += $last_year_pk_head; ?></td>

    <td><?php $last_year_npk_head = $this->Accounts_model->headWiseTotal($th->id,2,$last_year_start,$last_year_end);echo $last_year_npk_head;$last_year_npk_total_head += $last_year_npk_head; ?></td>
    
    <td><?= $last_year_pk_head + $last_year_npk_head ?></td>
    
    <td><?php $this_year_pk_head = $this->Accounts_model->headWiseTotal($th->id,1,$this_year_start,$this_year_end);echo $this_year_pk_head;$this_year_pk_total_head += $this_year_pk_head; ?></td>
    
    <td><?php $this_year_npk_head = $this->Accounts_model->headWiseTotal($th->id,2,$this_year_start,$this_year_end);echo $this_year_npk_head;$this_year_npk_total_head += $this_year_npk_head; ?></td>
    
    <td><?= $this_year_pk_head + $this_year_npk_head ?></td>
  
  </tr>

<?php endforeach; ?>

<?php endforeach; ?>
  
<?php endforeach; ?>

  <tr>
    <td colspan="2" style="font-weight: bold;">Total :</td>
    <td><?= $last_year_pk_total_head ?></td>
    <td><?= $last_year_npk_total_head ?></td>
    <td><?= $last_year_pk_total_head + $last_year_npk_total_head ?></td>
    <td><?= $this_year_pk_total_head ?></td>
    <td><?= $this_year_npk_total_head ?></td>
    <td><?= $this_year_pk_total_head + $this_year_npk_total_head ?></td>
  </tr>

</table>

