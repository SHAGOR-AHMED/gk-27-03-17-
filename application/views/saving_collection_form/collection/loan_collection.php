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

    	<div class="panel panel-default">
      		<div class="panel-body">
      			<div class="row">
                	<form action="" method="post" role="form" class="form-inline">
	                  
	                  <div class="form-group col-sm-offset-1">
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
	
		$tm = date("m");
		$weekDate = $this->db->query("SELECT payment_date,week_no FROM `loan_collection` WHERE month_no = $tm GROUP BY week_no ORDER BY week_no ASC")->result();
		// print_r($weekDate);

		foreach($weekDate as $wd):
			if($wd->week_no == 1):
				$fwd = $wd->payment_date;
			elseif($wd->week_no == 2):
				$swd = $wd->payment_date;
			elseif($wd->week_no == 3):
				$twd = $wd->payment_date;
			elseif($wd->week_no == 4):
				$four_wd = $wd->payment_date;
			elseif($wd->week_no == 5):
				$five_wd = $wd->payment_date;
			endif;
		endforeach;

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
          					<td><?= date("M") ?></td>
          					<td>সালঃ</td>
          					<td><?= date("Y") ?></td>
          				</tr>
          			</table>
          		</div>
          	</div>
          <div class="box-tools pull-right">
          </div>
        </div>
        
        <div class="box-body">
			<form action="loan_saving_form/loan_collection_update" method="post" role="form" class="form-inline">
			<table width="100%" height="auto" class="table-bordered">
			<tr>
				<td rowspan="5" style="transform:rotate(-90deg);"> ক্রমিক নং </td>
				<td rowspan="5" style="transform:rotate(-90deg);"> সদস্য নং </td>
				<td rowspan="5"> সদ্যসের নাম </td>
				<td rowspan="5"> অভিভাকের নাম </td>
				<td rowspan="5"> তারিখ </td>
				<td colspan="12"> এ মাসের  ঋণ আদায় (সার্ভিস চার্জ সহ) </td>
				<td colspan="2" rowspan="3"> মাস শেষে <br> ঋণ স্থিতি </td>
				<td colspan="2" rowspan="3">  মাস শেষে <br> বকেয়া স্থিতি  </td>
			</tr>
			
			<tr>
				<td colspan="10"> তারিখ </td>
				<td colspan="2" rowspan="2"> মোট আদায় </td>
			</tr>
			
			<tr>
				
				<td colspan="2">
					<input type="date" name="first_week" id="first_week" style="width:100px;" value="<?php if(isset($fwd)):$exp = explode(' ',$fwd);echo $exp[0]; endif; ?>" >
				</td>
				
				<td colspan="2">
					<input type="date" name="second_week" id="second_week" style="width:100px;" value="<?php if(isset($swd)):$exp = explode(' ',$swd);echo $exp[0]; endif; ?>" >
				</td>
				
				<td colspan="2">
					<input type="date" name="third_week" id="third_week" style="width:100px;" value="<?php if(isset($twd)):$exp = explode(' ',$twd);echo $exp[0]; endif; ?>" >
				</td>
				
				<td colspan="2">
					<input type="date" name="four_week" id="four_week" style="width:100px;" value="<?php if(isset($four_wd)):$exp = explode(' ',$four_wd);echo $exp[0]; endif; ?>" >
				</td>
				
				<td colspan="2">
					<input type="date" name="five_week" id="five_week" style="width:100px;" value="<?php if(isset($five_wd)):$exp = explode(' ',$five_wd);echo $exp[0]; endif; ?>" >
				</td>
			
			</tr>
			
			<tr>
				<td> আসল </td>
				<td> সেবা </td>
				<td> আসল </td>
				<td> সেবা </td>
				<td> আসল </td>
				<td> সেবা </td>
				<td> আসল </td>
				<td> সেবা </td>
				<td> আসল </td>
				<td> সেবা </td>
				<td> আসল </td>
				<td> সেবা </td>
				<td> আসল </td>
				<td> সেবা </td>
				<td> আসল </td>
				<td> সেবা </td>
			</tr>
			
			<!-- numbering start -->
			<tr>
				<td> 17 </td>
				<td> 18 </td>
				<td> 19 </td>
				<td> 20 </td>
				<td> 21 </td>
				<td> 22 </td>
				<td> 23 </td>
				<td> 24 </td>
				<td> 25 </td>
				<td> 26 </td>
				<td> 27 </td>
				<td> 28 </td>
				<td> 29 </td>
				<td> 30 </td>
				<td> 31 </td>
				<td> 32 </td>
			</tr>
			<!-- numbering end -->
			
			<!-- row start -->
			
<?php

	if(isset($_POST['search'])):

		extract($_POST);

		$total_stable_capital = 0;
		$total_stable_charge = 0;
		
		$memberData = $this->db->query("SELECT m.user_id,m.name,m.father_or_husband,l.loan_amount,l.interest_amount,l.opening_date,l.loan_purpose,l.active FROM `member_info` m,loan_info l WHERE m.user_id = l.member_id AND m.somiti = $somiti")->result();

		$si = 0;

		$subTotalCapital = 0;
		$subTotalCharge = 0;
		
		// total each week amount
			// first week
		$fTotalCapital = 0;
		$fTotalCharge = 0;

			// second week
		$sTotalCapital = 0;
		$sTotalCharge = 0;

			// third week
		$tTotalCapital = 0;
		$tTotalCharge = 0;

			// fourth week
		$foTotalCapital = 0;
		$foTotalCharge = 0;

			// fifth week
		$fiTotalCapital = 0;
		$fiTotalCharge = 0;

		foreach($memberData as $mData):
			$si++;

			// loan stable upto last month
			$m = date("m")-1;
			$loan_log = $this->db->query("SELECT sum(capital) as capital,SUM(charge) as charge FROM loan_collection WHERE member_id = $mData->user_id AND month_no = $m")->row();

			// collection history checking
			$tm = date("m");
			$collectionLog = $this->db->query("SELECT * FROM `loan_collection` WHERE member_id = $mData->user_id AND month_no = $tm")->result();
			// echo $collectionLog[0]->week_no;
			// print_r($collectionLog);

			// initialization

			$tCapital = 0;
			$tCharge = 0;

			$fcapital = 0;
			$fcharge = 0;
			$fdisable = '';

			$scapital = 0;
			$scharge = 0;
			$sdisable = '';

			$tcapital = 0;
			$tcharge = 0;
			$tdisable = '';

			$four_capital = 0;
			$four_charge = 0;
			$four_disable = '';

			$five_capital = 0;
			$five_charge = 0;
			$five_disable = '';

			foreach($collectionLog as $clog):
				// print_r($clog);
				if($clog->week_no == 1):
					$fcapital = $clog->capital;
					$fcharge = $clog->charge;
					$fdisable = "readonly";

					$fTotalCapital += $clog->capital;
					$fTotalCharge += $clog->charge;

				elseif($clog->week_no == 2):
					$scapital = $clog->capital;
					$scharge = $clog->charge;
					$sdisable = "readonly";

					$sTotalCapital += $clog->capital;
					$sTotalCharge += $clog->charge;

				elseif($clog->week_no == 3):
					$tcapital = $clog->capital;
					$tcharge = $clog->charge;
					$tdisable = "readonly";

					$tTotalCapital += $clog->capital;
					$tTotalCharge += $clog->charge;

				elseif($clog->week_no == 4):
					$four_capital = $clog->capital;
					$four_charge = $clog->charge;
					$four_disable = "readonly";

					$foTotalCapital += $clog->capital;
					$foTotalCharge += $clog->charge;

				elseif($clog->week_no == 5):
					$five_capital = $clog->capital;
					$five_charge = $clog->charge;
					$five_disable = "readonly";
				
					$fiTotalCapital += $clog->capital;
					$fiTotalCharge += $clog->charge;

				endif;
			endforeach;

?>

			<tr>
				<td> <?= $si ?> </td>
				<td> <?= $mData->user_id ?>
					<input type="hidden" name="member_id[]" id="member_id" value="<?= $mData->user_id ?>" />
					<input type="hidden" name="all_capital[]" value="<?= $mData->loan_amount ?>" />
					<input type="hidden" name="all_interest[]" value="<?= $mData->interest_amount ?>" />
				</td>
				<td> <?= $mData->name ?> </td>
				<td> <?= $mData->father_or_husband ?> </td>
				<td> <?= $mData->opening_date ?> </td>
				
				<td> <input type="text" name="capital1[]" id="capital_1" size="4" value="<?php if(isset($fcapital)):if($fcapital != 0):echo $fcapital; $tCapital += $fcapital; endif;endif; ?>"  <?php if(isset($fdisable)):echo $fdisable;endif; ?> />
				</td>
				
				<td>
					<input type="text" name="service1[]" id="service_1" size="4" value="<?php if(isset($fcharge)):if($fcharge != 0):echo $fcharge; $tCharge += $fcharge; endif;endif; ?>"  <?php if(isset($fdisable)):echo $fdisable;endif; ?> />
				</td>
				
				<td> 
					<input type="text" name="capital2[]" id="capital_2" size="4" value="<?php if(isset($scapital)):if($scapital != 0):echo $scapital; $tCapital += $scapital; endif;endif; ?>"  <?php if(isset($sdisable)):echo $sdisable;endif; ?> />
				</td>
				
				<td>
					<input type="text" name="service2[]" id="service_2" size="4" value="<?php if(isset($scharge)):if($scharge != 0):echo $scharge; $tCharge += $scharge; endif;endif; ?>"  <?php if(isset($sdisable)):echo $sdisable;endif; ?> />
				</td>

				<td>
					<input type="text" name="capital3[]" id="capital_3" size="4" value="<?php if(isset($tcapital)):if($tcapital != 0):echo $tcapital; $tCapital += $tcapital; endif;endif; ?>"  <?php if(isset($tdisable)):echo $tdisable;endif; ?> />
				</td>
				
				<td>
					<input type="text" name="service3[]" id="service_3" size="4" value="<?php if(isset($tcharge)):if($tcharge != 0):echo $tcharge; $tCharge += $tcharge; endif;endif; ?>"  <?php if(isset($tdisable)):echo $tdisable;endif; ?> />
				</td>
				
				<td>
					<input type="text" name="capital4[]" id="capital_4" size="4" value="<?php if(isset($four_capital)):if($four_capital != 0):echo $four_capital; $tCapital += $four_capital; endif;endif; ?>"  <?php if(isset($four_disable)):echo $four_disable;endif; ?> />
				</td>
				
				<td>
					<input type="text" name="service4[]" id="service_4" size="4" value="<?php if(isset($four_charge)):if($four_charge != 0):echo $four_charge; $tCharge += $four_charge; endif;endif; ?>"  <?php if(isset($four_disable)):echo $four_disable;endif; ?> />
				</td>
				
				<td>
					<input type="text" name="capital5[]" id="capital_5" size="4" value="<?php if(isset($five_capital)):if($five_capital != 0):echo $five_capital; $tCapital += $five_capital; endif;endif; ?>"  <?php if(isset($five_disable)):echo $five_disable;endif; ?> />
				</td>
				
				<td>
					<input type="text" name="service5[]" id="service_5" size="4" value="<?php if(isset($five_charge)):if($five_charge != 0):echo $five_charge; $tCharge += $five_charge; endif;endif; ?>"  <?php if(isset($five_disable)):echo $five_disable;endif; ?> />
				</td>
				<td> <?= $tCapital;$subTotalCapital += $tCapital; ?> </td>
				<td> <?= $tCharge;$subTotalCharge += $tCharge; ?> </td>
				
				<td> <?php $total_stable_capital += $mData->loan_amount - $loan_log->capital - $tCapital;echo $mData->loan_amount - $loan_log->capital - $tCapital; ?> </td>
				<td> <?php $total_stable_charge += $mData->interest_amount - $loan_log->charge - $tCharge;echo $mData->interest_amount - $loan_log->charge - $tCharge; ?> </td>
				
				<td>  </td>
				<td>  </td>
			</tr>
			
<?php endforeach;endif; ?>
			<!-- row end -->
			
			<!-- Result start -->
			<tr>
				<td colspan="5" style="text-align:justify !important;"> মোট = </td>
				<td> <?php if(isset($fTotalCapital)):echo $fTotalCapital;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($fTotalCharge)):echo $fTotalCharge;else:echo 0;endif;  ?> </td>
				<td> <?php if(isset($sTotalCapital)):echo $sTotalCapital;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($sTotalCharge)):echo $sTotalCharge;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($tTotalCapital)):echo $tTotalCapital;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($tTotalCharge)):echo $tTotalCharge;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($foTotalCapital)):echo $foTotalCapital;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($foTotalCharge)):echo $foTotalCharge;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($fiTotalCapital)):echo $fiTotalCapital;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($fiTotalCharge)):echo $fiTotalCharge;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($subTotalCapital)):echo $subTotalCapital;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($subTotalCharge)):echo $subTotalCharge;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($total_stable_capital)):echo $total_stable_capital;else:echo 0;endif; ?> </td>
				<td> <?php if(isset($total_stable_charge)):echo $total_stable_charge;else:echo 0;endif; ?> </td>
				<td>  </td>
				<td>  </td>
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
			</tr>
			<!-- Result end -->
			
			</table>

			<button type="submit" class="btn btn-primary" name="update" id="update" style="float:right;margin-top: 5px;margin-right: 20px;">update</button>

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