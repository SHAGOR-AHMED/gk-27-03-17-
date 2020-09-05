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
	          </h3>
	          <div class="box-tools pull-right">
	          </div>
	        </div>
       


        <div class="box-body">
			<table width="100%" height="auto" class="table-bordered">
			<tr>
				<td rowspan="3" style="transform:rotate(-90deg);"> ক্রমিক নং </td>
				<td rowspan="2" style="transform:rotate(-90deg);"> সদস্য নং </td>
				<td rowspan="2"> সদ্যসের নাম </td>
				<td rowspan="2"> অভিভাকের নাম </td>
				<td rowspan="2"> তারিখ </td>
				<td colspan="2"> গত মাস পর্যন্ত <br>ঋণ বিতরণ </td>
				<td colspan="3"> এ মাসে <br>ঋণ বিতরণ </td>
				<td rowspan="2"> দফা <br> নং </td>
				<td rowspan="2" style="transform:rotate(-90deg);"> ঋণের খাত  </td>
				<td rowspan="2" style="transform:rotate(-90deg);"> উত্তীর্ণ সপ্তাহ  </td>
				<td colspan="2"> গতমাস শেষে  <br> ঋণস্থিতি </td>
				<td colspan="2"> গতমাস শেষে  <br> বকেয়া স্থিতি </td>
			</tr>
			
			<tr>
				<td> আসল </td>
				<td> সেবা </td>
				<td> তারিখ </td>
				<td> আসল </td>
				<td> সেবা </td>
				<td> আসল </td>
				<td> সেবা </td>
				<td> আসল </td>
				<td> সেবা </td>
			</tr>
			
			<!-- numbering start -->
			<tr>
				<td> 1 </td>
				<td> 2 </td>
				<td> 3</td>
				<td> 4 </td>
				<td> 5 </td>
				<td> 6 </td>
				<td> 7 </td>
				<td> 8 </td>
				<td> 9 </td>
				<td> 10 </td>
				<td> 11 </td>
				<td> 12 </td>
				<td> 13 </td>
				<td> 14 </td>
				<td> 15 </td>
				<td> 16 </td>
				
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
		foreach($memberData as $mData):
			$si++;

			// loan stable upto last month
			$m = date("m")-1;
			$loan_log = $this->db->query("SELECT sum(capital) as capital,SUM(charge) as charge FROM loan_collection WHERE member_id = $mData->user_id AND month_no <= $m")->row();

			// dopa no
			$dopa_no = $this->db->query("SELECT COUNT(*) as dopa FROM `loan_info` WHERE member_id = $mData->user_id")->row()->dopa;

			// check new member
			$dateChecking = explode("-", $mData->opening_date);

			// total loan amount for each member upto last month
			$last_date = date("Y")."-".$m."-30";
			$totalLoanUptoLastM = $this->db->query("SELECT sum(loan_amount) as tloan,sum(interest_amount) as tinterest FROM loan_info WHERE member_id = $mData->user_id AND opening_date < '$last_date'")->row();


?>	
			<tr>
				<td> <?= $si ?> </td>
				<td>
					<?= $mData->name ?>
					<input type="hidden" name="member_id" id="member_id" value="<?= $mData->user_id ?>" />
				</td>
				<td> <?= $mData->name ?> </td>
				<td> <?= $mData->father_or_husband ?> </td>
				<td> <?= $mData->opening_date ?> </td>
				<td> <?= $totalLoanUptoLastM->tloan ?> </td>
				<td> <?= $totalLoanUptoLastM->tinterest ?> </td>
				
				<td> <?php if($dateChecking[1] == date("m")): ?>
						<?= $mData->opening_date ?>
					<?php endif; ?>
				</td>
				
				<td> <?php if($dateChecking[1] == date("m")): ?>
						<?= $mData->loan_amount ?>
					<?php endif; ?>
				</td>
				
				<td> <?php if($dateChecking[1] == date("m")): ?>
						<?= $mData->interest_amount ?>
					<?php endif; ?>
				</td>

				<td> <?= $dopa_no ?> </td>
				<td> <?= $mData->loan_purpose ?> </td>
				<td>  </td>
				<td> <?php $total_stable_capital += $mData->loan_amount - $loan_log->capital;echo $mData->loan_amount - $loan_log->capital; ?> </td>
				<td> <?php $total_stable_charge += $mData->interest_amount - $loan_log->charge;echo $mData->interest_amount - $loan_log->charge; ?> </td>
				<td>  </td>
				<td>  </td>
			</tr>
			
<?php endforeach;endif; ?>
			<!-- row end -->
			


			<!-- Result start -->
			<tr>
				<td colspan="5" style="text-align:justify !important;"> মোট = </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td> <?php if(isset($total_stable_capital)):echo $total_stable_capital;endif; ?> </td>
				<td> <?php if(isset($total_stable_charge)):echo $total_stable_charge;endif; ?> </td>
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
			</tr>
			<!-- Result end -->
			
			</table>
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