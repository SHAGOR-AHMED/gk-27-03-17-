<?php view('inc.Header'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>for <?= (isset($title))? $title : ''; ?></small>
      </h1>
    </section>

<style type="text/css">
	
	table tr td{
		text-align: center !important;
		border: 1px solid #000 !important;
		border-collapse: collapse  !important;
		
	}

	@media print {
  body * {
    visibility: hidden;
  }

  #prntBtn,#update{
    visibility: hidden;
  }

  .box-header, .box-header * ,.box-body, .box-body * {
    visibility: visible;
  }

  .box-header, .box-header *{
  	font-size : 13px;
  }

  .box-header table{
  	margin-left: -1600px;
  }

  .content{
  	margin-top: -4300px;
  }

  #heading-bar{
  	display: block;
  	visibility: visible;
  }

  @page {size: landscape}

}

</style>

    <!-- Main content -->
    <section class="content">
    	<div class="panel-body">
      			<div class="row">
                	<form action="" method="post" role="form" class="form-inline">
	                  
	                  <div class="form-group">
	                      <label for="reg_branch_name">Regional Branch Name <span class="text-red">*</span></label>
	                      <select class="form-control" name="reg_branch_name" id="reg_branch_name" onchange="getBranchList(this);" required>
	                        <option value="">Select Branch Name</option>
	                        <?php if(!empty($regBranchList)){ foreach ($regBranchList as $reg_branch) { ?>
	                          <option value="<?= $reg_branch->id; ?>"><?= $reg_branch->name; ?></option>
	                        <?php } } ?>
	                      </select>
	                  </div>

	                  <div class="form-group">
	                      <label for="branch">Branch <span class="text-red">*</span></label>
	                      <select class="form-control" name="branch" id="branch" onchange="getSomitiList(this);" required>
	                        <option value="">Select Branch</option>
	                      </select>
	                  </div>

	                  <div class="form-group">
	                      <label for="somiti">Somiti <span class="text-red">*</span></label>
	                      <select class="form-control" name="somiti" id="somiti" onchange="getMemberList(this);" required>
	                        <option value="">Select Somiti</option>
	                      </select>
	                  </div>

	                  <div class="form-group">
	                      <label for="somiti">Month <span class="text-red">*</span></label>
	                      <select class="form-control" name="tm" id="tm" required>
	                        <option value="">Select Month</option>
	                        <?php for($i = 1;$i <= 12;$i++): ?>
	                        	<option value="<?= $i ?>" ><?= date("F", mktime(0, 0, 0, $i, 10)) ?></option>
	                      	<?php endfor; ?>
	                      </select>
	                  </div>

	                  <div class="form-group">
	                  	<button type="submit" name="search" id="search" class="btn btn-primary">Search</button>
	                  </div>

	                  <div class="form-group">
	                  	<button type="button" class="btn btn-info" id="prntBtn" style="margin-left: 100px;" onclick="window.print();" >Print</button>
	                  </div>

      			</form>
      		</div>
      	</div>
      <?php
		if(isset($_POST['search'])):
			extract($_POST);

			$somiti_info = $this->db->query("SELECT si.name,ei.emp_name FROM `somiti_info` si,employee_info ei WHERE si.emp_id = ei.id AND si.id = $somiti")->row();
			// print_r($somiti_info);
		endif;
	?>

	      <!-- Default box -->
	      <div class="box box-info">
	        <div class="box-header with-border">
	          <h3 class="box-title">
	          	<div class="panel panel-default" style="margin: 0px !important;padding: 0px !important;margin-left: 300px !important;">
	          		<div class="panel-body" style="margin: 0px !important;padding: 0px !important;">
	          			<table class="table" style="margin: 0px !important;padding: 0px !important;">
	          				<tr>
	          					<td> শাখার নামঃ </td>
	          					<td colspan="3"> গণস্ব্যাস্থ কেন্দ্র </td>
	          					<td> সমিতির নামঃ </td>
	          					<td colspan="3"><?php if(isset($somiti_info->name)):echo $somiti_info->name;endif; ?></td>
	          				</tr>

	          				<tr>
	          					<td> কর্মীর নামঃ </td>
	          					<td colspan="3"><?php if(isset($somiti_info->emp_name)):echo $somiti_info->emp_name;endif; ?></td>
	          					<td>মাসের নামঃ</td>
	          					<td><?php if(isset($tm)): echo date("F", mktime(0, 0, 0, $tm, 10));else:echo date('M');endif; ?></td>
	          					<td>সালঃ</td>
	          					<td><?= date("Y") ?></td>
	          				</tr>
	          			</table>
	          		</div>
	          	</div>
	          </h3>
	          <div class="box-tools pull-right">
	          </div>
	        </div>
        
        <div class="box-body">
        	<form action="<?php echo base_url('loan_saving_form/saving_collection_update') ?>" class="form-inline" role="form" method="post">
			<table width="100%" height="auto" class="table-bordered">
			<tr>
				<td rowspan="5" style="transform:rotate(-90deg);"> ক্রমিক নং </td>
				<td rowspan="5" style="transform:rotate(-90deg);"> সদস্য নং  </td>
				<td rowspan="5"> তারিখ </td>
				<td colspan="10" height="40px"> সাধারন সঞ্চয়  </td>
				<td colspan="10" height="40px"> সেচ্ছায় সঞ্চয় </td>
			</tr>
			
			<tr>
				<td rowspan="3"> গত  <br> মাস শেষে  <br> সঞ্চয় স্থিতি </td>
				<td colspan="6"> এ মাসে সঞ্চয় আদায় </td>
				<td colspan="2"> সঞ্চয় ফেরত </td>
				<td rowspan="3"> মাস শেষে <br> সঞ্চয় স্থিতি </td>
				<td rowspan="3">গত  <br> মাস শেষে  <br> সঞ্চয় স্থিতি </td>
				<td colspan="6"> এ মাসে সঞ্চয় আদায় </td>
				<td colspan="2"> সঞ্চয় ফেরত </td>
				<td rowspan="3"> মাস শেষে <br> সঞ্চয় স্থিতি </td>
			</tr>
			
			<tr>
				<td colspan="5"> তারিখ </td>
				<td rowspan="2"> মোট  <br> আদায় </td>
				<td rowspan="2"> তারিখ </td>
				<td rowspan="2"> টাকা </td>
				<td colspan="5"> তারিখ </td>
				<td rowspan="2"> মোট  <br> আদায় </td>
				<td rowspan="2"> তারিখ </td>
				<td rowspan="2"> টাকা </td>
			</tr>
			
			<tr>
				<td> &nbsp; </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				
			</tr>
			
			<!-- numbering start -->
			<tr>
				<td> ৩৩ </td>
				<td> ৩৪ </td>
				<td> ৩৫ </td>
				<td> ৩৬ </td>
				<td> ৩৭ </td>
				<td> ৩৮ </td>
				<td> ৩৯ </td>
				<td> ৪০ </td>
				<td> ৪১ </td>
				<td> ৪২ </td>
				<td> ৪৩ </td>
				<td> ৪৪ </td>
				<td> ৪৫ </td>
				<td> ৪৬ </td>
				<td> ৪৭ </td>
				<td> ৪৮ </td>
				<td> ৪৯ </td>
				<td> ৫০ </td>
				<td> ৫১ </td>
				<td> ৫২ </td>
			</tr>
			<!-- numbering end -->
			
			<!-- row start -->
			
<?php

	if(isset($_POST['search'])):

		extract($_POST);

		$total_stable_capital = 0;
		$total_stable_charge = 0;
		
		// week total
		$fweektotal = 0;
		$sweektotal = 0;
		$tweektotal = 0;
		$fourweektotal = 0;
		$fiveweektotal = 0;

		// total collection
		$totalCollection = 0;

		// total saving out standing
		$totalSavingOutStanding = 0;

		// total sessa out standing
		$totalSessaOutStanding = 0;

		$memberData = $this->db->query("SELECT m.user_id,m.name,m.father_or_husband,l.loan_amount,l.interest_amount,l.opening_date,l.loan_purpose,l.active FROM `member_info` m LEFT JOIN loan_info l ON m.user_id = l.member_id WHERE m.somiti = $somiti")->result();

		$si = 0;

		foreach($memberData as $mData):
			$si++;


			// saving info upto last month
		// general saving instrument
			$last_month = $tm - 1;
			$this_year = date("Y");

			if($last_month <= 0):
				$last_month = 12;
				$this_year--;
			endif;

			$last_month_date = $this_year.'-'.$last_month.'-31';


			$lastMonthSaving = $this->db->query("SELECT SUM(amount) as amount FROM `saving_log` WHERE date(pay_date) <= date('$last_month_date') AND `member_id` = '$mData->user_id' AND `saving_type` = 1 AND `save_or_widrow` = 1")->row();


			$saving_data = array(
					"payment_month"	=> $tm,
					"member_id"		=> $mData->user_id,
					"saving_type"	=> 1,
					"save_or_widrow"=> 1
				);
			$thisMonthSaving = $this->db->get_where("saving_log",$saving_data)->result();

			$fSaving = 0;
			$sSaving = 0;
			$threeSaving = 0;
			$fourSaving = 0;
			$fiveSaving = 0;

			$tCollection = 0;
			$savingOutStanding = 0;

			foreach($thisMonthSaving as $tsaving):
				if($tsaving->week_no == 1):
					$fSaving = $tsaving->amount;
					$tCollection += $fSaving;
				elseif( $tsaving->week_no == 2 ):
					$sSaving = $tsaving->amount;
					$tCollection += $sSaving;
				elseif( $tsaving->week_no == 3 ):
					$threeSaving = $tsaving->amount;
					$tCollection += $threeSaving;
				elseif( $tsaving->week_no == 4 ):
					$fourSaving = $tsaving->amount;
					$tCollection += $fourSaving;
				elseif( $tsaving->week_no == 5 ):
					$fiveSaving = $tsaving->amount;
					$tCollection += $fiveSaving;
				endif;
			endforeach;

			// general widraw log
			$widraw_data = array(
					"payment_month"	=> $tm,
					"member_id"		=> $mData->user_id,
					"save_or_widrow"=> 2
				);
			$gWidraw = $this->db->get_where("saving_log",$widraw_data)->row();

?>

			<tr>
				<td> <?= $si ?> </td>
				<td> 
					<?= $mData->name ?>
					<input type="hidden" name="member_id[]" id="member_id" value="<?= $mData->user_id ?>" />
				</td>
				<td> <?= $mData->opening_date ?> </td>
				<td> <?= $lastMonthSaving->amount ?> </td>
				
				<td> <input type="text" name="saving_collection1[]" id="saving_collection_1" size="4" value="<?php if($fSaving != 0):echo $fSaving; $fweektotal += $fSaving; endif; ?>" <?php if($fSaving != 0):echo "readonly";endif; ?> /> </td>
				
				<td> <input type="text" name="saving_collection2[]" id="saving_collection_2" size="4" value="<?php if($sSaving != 0):echo $sSaving; $sweektotal += $sSaving; endif; ?>" <?php if($sSaving != 0):echo "readonly";endif; ?> /> </td>
				
				<td> <input type="text" name="saving_collection3[]" id="saving_collection_3" size="4" value="<?php if($threeSaving != 0):echo $threeSaving; $tweektotal += $threeSaving; endif; ?>" <?php if($threeSaving != 0):echo "readonly";endif; ?> /> </td>
				
				<td> <input type="text" name="saving_collection4[]" id="saving_collection_4" size="4" value="<?php if($fourSaving != 0):echo $fourSaving; $fourweektotal += $fourSaving; endif; ?>" <?php if($fourSaving != 0):echo "readonly";endif; ?> /> </td>
				
				<td> <input type="text" name="saving_collection5[]" id="saving_collection_5" size="4" value="<?php if($fiveSaving != 0):echo $fiveSaving; $fiveweektotal += $fiveSaving; endif; ?>" <?php if($fiveSaving != 0):echo "readonly";endif; ?> /> </td>
				
				<td><?php echo $tCollection;$totalCollection += $tCollection; ?></td>

				<td> <input type="text" name="widrawDate[]" class="datepicker" size="9" style="font-size:11px;" value="<?php if(isset($gWidraw->amount)):$pd = explode(" ", $gWidraw->pay_date);echo $pd[0];endif;  ?>" <?php if(isset($gWidraw->amount)): echo "readonly"; endif; ?> > </td>

				<td> <input type="text" name="widrawAmount[]" size="4" value="<?php if(isset($gWidraw->amount)):echo $widraw = $gWidraw->amount;else:$widraw = 0;endif;  ?>" <?php if(isset($gWidraw->amount)): echo "readonly"; endif; ?> > </td>
				
				<td> <?php echo $savingOutStanding = $tCollection + $lastMonthSaving->amount - $widraw;$totalSavingOutStanding += $savingOutStanding; ?> </td>
				
<!-- first part end -->

<!-- second part start-->
<?php
	// saving info upto last month
		// general saving instrument
			$last_month = date("m") - 1;

			$data = array(
					"payment_month" => $last_month,
					"member_id"		=> $mData->user_id,
					"saving_type"	=> 2,
					"save_or_widrow"=> 1
				);

			$lastMonthSaving = $this->db->select("SUM(amount) as amount")->from("saving_log")->where($data)->get()->row();

			// $tm = date("m");
			$saving_data = array(
					"payment_month"	=> $tm,
					"member_id"		=> $mData->user_id,
					"saving_type"	=> 2,
					"save_or_widrow"=> 1
				);
			$thisMonthSaving = $this->db->get_where("saving_log",$saving_data)->result();

			$fSaving = 0;
			$sSaving = 0;
			$threeSaving = 0;
			$fourSaving = 0;
			$fiveSaving = 0;

			// sessa week total
			$fSavingWeek = 0;
			$sSavingWeek = 0;
			$tSavingWeek = 0;
			$fourSavingWeek = 0;
			$fiveSavingWeek = 0;

			$tCollection = 0;
			$totalCollection = 0;

			foreach($thisMonthSaving as $tsaving):
				if($tsaving->week_no == 1):
					$fSaving = $tsaving->amount;
					$tCollection += $fSaving;
				elseif( $tsaving->week_no == 2 ):
					$sSaving = $tsaving->amount;
					$tCollection += $sSaving;
				elseif( $tsaving->week_no == 3 ):
					$threeSaving = $tsaving->amount;
					$tCollection += $threeSaving;
				elseif( $tsaving->week_no == 4 ):
					$fourSaving = $tsaving->amount;
					$tCollection += $fourSaving;
				elseif( $tsaving->week_no == 5 ):
					$fiveSaving = $tsaving->amount;
					$tCollection += $fiveSaving;
				endif;
			endforeach;

			// general widraw log
			$widraw_data = array(
					"payment_month"	=> $tm,
					"member_id"		=> $mData->user_id,
					"saving_type"	=> 2,
					"save_or_widrow"=> 2
				);
			$gWidraw = $this->db->get_where("saving_log",$widraw_data)->row();

?>

				<td> <?= $lastMonthSaving->amount ?> </td>
				<td> <input type="text" name="sessa_saving_collection1[]" id="saving_collection_1" size="4" value="<?php if($fSaving != 0):echo $fSaving; $fSavingWeek += $fSaving; endif; ?>" <?php if($fSaving != 0):echo "readonly";endif; ?> /> </td>
				
				<td> <input type="text" name="sessa_saving_collection2[]" id="saving_collection_2" size="4" value="<?php if($sSaving != 0):echo $sSaving; $sSavingWeek += $sSaving; endif; ?>" <?php if($sSaving != 0):echo "readonly";endif; ?> /> </td>
				
				<td> <input type="text" name="sessa_saving_collection3[]" id="saving_collection_3" size="4" value="<?php if($threeSaving != 0):echo $threeSaving; $tSavingWeek += $threeSaving; endif; ?>" <?php if($threeSaving != 0):echo "readonly";endif; ?> /> </td>
				
				<td> <input type="text" name="sessa_saving_collection4[]" id="saving_collection_4" size="4" value="<?php if($fourSaving != 0):echo $fourSaving; $fourSavingWeek += $fourSaving; endif; ?>" <?php if($fourSaving != 0):echo "readonly";endif; ?> /> </td>
				
				<td> <input type="text" name="sessa_saving_collection5[]" id="saving_collection_5" size="4" value="<?php if($fiveSaving != 0):echo $fiveSaving; $fiveSavingWeek += $fiveSaving; endif; ?>" <?php if($fiveSaving != 0):echo "readonly";endif; ?> /> </td>
				
				<td><?php echo $tCollection;$totalCollection += $tCollection; ?></td>

				<td> <?php if(isset($gWidraw->amount)):$pd = explode(" ", $gWidraw->pay_date);echo $pd[0];endif;  ?></td>
				<td> <?php if(isset($gWidraw->amount)):echo $widraw = $gWidraw->amount;else:$widraw = 0;endif;  ?> </td>
				
				<td> <?php echo $sessaOutStanding =  $tCollection + $lastMonthSaving->amount - $widraw;$totalSessaOutStanding += $sessaOutStanding; ?> </td>
			</tr>
			<!-- row end -->
			
<?php
	endforeach;
endif;
?>

			<!-- Result start -->
			<tr>
				<td colspan="4" style="text-align:justify !important;"> মোট = </td>
				<td> <?php if(isset($fweektotal)):echo $fweektotal;endif;  ?> </td>
				<td> <?php if(isset($sweektotal)):echo $sweektotal;endif; ?> </td>
				<td> <?php if(isset($tweektotal)):echo $tweektotal;endif; ?> </td>
				<td> <?php if(isset($fourweektotal)):echo $fourweektotal;endif; ?> </td>
				<td> <?php if(isset($fiveweektotal)):echo $fiveweektotal;endif; ?> </td>
				<td> <?php if(isset($totalCollection)):echo $totalCollection;endif; ?> </td>
				<td>  </td>
				<td>  </td>
				<td> <?php if(isset($totalSavingOutStanding)):echo $totalSavingOutStanding;endif; ?> </td>
				<td>  </td>
				<td> <?php if(isset($fSavingWeek)):echo $fSavingWeek;endif; ?> </td>
				<td> <?php if(isset($sSavingWeek)):echo $sSavingWeek;endif; ?> </td>
				<td> <?php if(isset($tSavingWeek)):echo $tSavingWeek;endif; ?> </td>
				<td> <?php if(isset($fourSavingWeek)):echo $fourSavingWeek;endif; ?> </td>
				<td> <?php if(isset($fiveSavingWeek)):echo $fiveSavingWeek;endif; ?> </td>
				<td> <?php if(isset($totalCollection)):echo $totalCollection;endif; ?> </td>
				<td>  </td>
				<td>  </td>
				<td> <?php if(isset($totalSessaOutStanding)):echo $totalSessaOutStanding;endif; ?> </td>
			</tr>
			<!-- Result end -->
			
			<!-- Result start -->
			<tr>
				<td colspan="5" style="text-align:justify !important;"> স্বাক্ষরঃ মাঠকর্মী </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
			</tr>
			<!-- Result end -->
			
			<!-- Result start -->
			<tr>
				<td colspan="5" style="text-align:justify !important;"> স্বাক্ষরঃ ব্রাঞ্চ ম্যানেজার </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
			</tr>
			<!-- Result end -->
			
			</table>

			<tr style="border: none;">
				<td colspan="23">
					<button class="btn btn-primary" name="update" id="update" type="submit" style="float:right;margin-top: 5px;">Update</button>
				</td>
			</tr>
		</form>
	</div><!-- /.box-body -->
        
        <div class="box-footer">
          <div class="form-group">
            <span>
                <?php if (hasFlash('msg')) {?>
                    <span><?= flashMessage('msg')  ?></span>
                <?php } ?>
            </span>
          </div>
        </div><!-- /.box-footer-->
      </div><!-- /.box -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>