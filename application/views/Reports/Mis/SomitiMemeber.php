<?php view('inc.Header'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>for <?= (isset($title))? $title : ''; ?></small>
      </h1>

      <button class="btn btn-primary pull-right" onclick="window.print()" style="margin-top: -20px;" >Print</button>

    </section>

<style type="text/css">
	table tr td{
		text-align: center !important;
	}

	@media print{
		body{
			margin-top: -10px;
			font-size: 10px;
			page-break-before: avoid;
		}
		footer{
			visibility: hidden;
		}
	}

</style>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?= (isset($title))? $title : ''; ?></h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        
        <div class="box-body">
        <p><b> ১ । সমিতি ও সদস্য সংক্রান্ত : </b></p>
			<table width="100%" height="auto" class="table-bordered">
				<tr>
					<td style="width: 12%;">ক্ষুদ্রঋণ কর্মসূচীর নাম</td>
					<td style="width: 12%;">শাখার সংখ্যা</td>
					<td style="width: 38%;">
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td colspan="3">সমিতির সংখ্যা</td>
							</tr>
							<tr>
								<td style="width: 33%;">পুরুষ</td>
								<td style="width: 33%;">মহিলা</td>
								<td style="width: 33%;">মোট</td>
							</tr>
						</table>						
					</td>
					<td style="width: 38%;">
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td colspan="3">সদস্য সংখ্যা</td>
							</tr>
							<tr>
								<td style="width: 33%;">পুরুষ</td>
								<td style="width: 33%;">মহিলা</td>
								<td style="width: 33%;">মোট</td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td>১</td>		
					<td>২</td>		
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 33%;">৩</td>
								<td style="width: 33%;">৪</td>
								<td style="width: 33%;">৫ = ৩ + ৪</td>
							</tr>
						</table>
					</td>		
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 33%;">৬</td>
								<td style="width: 33%;">৭</td>
								<td style="width: 33%;">৮ = ৬ + ৭ </td>
							</tr>
						</table>
					</td>		
				</tr>

<?php

	$projectList = $this->db->order_by("id","ASC")->get("project")->result();

	// total initialize
	$tBranch = 0;
	$tMsomiti = 0;
	$tFsomiti = 0;
	$tFmSomiti = 0;

	// member info
	$tmMember = 0;
	$tfMember = 0;
	$subTotal = 0;

	foreach($projectList as $list):

		// getting branch number
		$branchList = $this->db->query("SELECT * FROM somiti_info si,somiti_project sp WHERE sp.somiti_id = si.id AND sp.project_id = $list->id GROUP BY si.branch_id")->result();
		
		$tBranch += count($branchList);

		$mSomiti = 0;
		$mSomiti = count($this->db->query("SELECT * FROM somiti_info si,somiti_project sp WHERE sp.somiti_id = si.id AND sp.project_id = $list->id AND si.somiti_type = 1")->result());

		$tMsomiti += $mSomiti;

		$fSomiti = 0;
		$fSomiti = count($this->db->query("SELECT * FROM somiti_info si,somiti_project sp WHERE sp.somiti_id = si.id AND sp.project_id = $list->id AND si.somiti_type = 2")->result());
		$tFsomiti += $fSomiti;

		$tFmSomiti = $tMsomiti + $tFsomiti;
		

		// member information
		$mMember = count($this->db->query("SELECT * FROM somiti_info si,somiti_project sp,member_info mf WHERE sp.somiti_id = si.id AND si.id = mf.somiti AND sp.project_id = $list->id AND mf.gender = 1")->result());
		$fMember = count($this->db->query("SELECT * FROM somiti_info si,somiti_project sp,member_info mf WHERE sp.somiti_id = si.id AND si.id = mf.somiti AND sp.project_id = $list->id AND mf.gender = 2")->result());

		$mot = $mMember + $fMember;

		$tmMember += $mMember;
		$tfMember += $fMember;

		$subTotal = $tmMember + $tfMember;

?>

				<tr>
					<td><?= $list->project_name ?></td>		
					<td><?= count($branchList); ?></td>		
					<td>
						<table width="100%" height="auto" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 33%;"><?= $mSomiti ?></td>
								<td style="width: 33%;"><?= $fSomiti ?></td>
								<td style="width: 33%;"><?= $mSomiti+$fSomiti ?></td>
							</tr>
						</table>
					</td>		
					<td>
						<table width="100%" height="auto" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 33%;"><?= $mMember ?></td>
								<td style="width: 33%;"><?= $fMember ?></td>
								<td style="width: 33%;"><?= $mot ?></td>
							</tr>
						</table>
					</td>		
				</tr>

<?php endforeach; ?>


				<tr>
					<td>সর্বমোট</td>		
					<td><?= $tBranch ?></td>		
					<td>
						<table width="100%" height="auto" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 33%;"><?= $tMsomiti ?></td>
								<td style="width: 33%;"><?= $tFsomiti ?></td>
								<td style="width: 33%;"><?= $tFmSomiti ?></td>
							</tr>
						</table>
					</td>		
					<td>
						<table width="100%" height="auto" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 33%;"><?= $tmMember ?></td>
								<td style="width: 33%;"><?= $tfMember ?></td>
								<td style="width: 33%;"><?= $subTotal ?></td>
							</tr>
						</table>
					</td>		
				</tr>
			
				<tr>
					<td>স্বয়ংসম্পূর্ণ</td>
					<td colspan="2">পিকেএসএফ ফান্ড = ১</td>
					<td>
						<table width="100%" class="table-bordered">
							<tr>
								<td>নন-পিকেএসএফ ফান্ড = ২</td>
								<td style="width: 33.5%;">মোট =  <?= $subTotal ?></td>
							</tr>
						</table>
					</td>
				</tr>

			</table>
		</div><!-- /.box-body -->
        
        <p>
        	<b style="font-size: 13px !important;">
        		বিঃ দ্রঃ উপরোক্ত ছকে প্রতিটি ঋণ কার্যক্রমের ক্ষেত্রে শাখা , সমিতি , ও সদস্য সংখ্যা অবশ্যই উল্লেখ করতে হবে । 
        	</b>
        </p>

		<div class="box-body">
		<p><b> ২ । সদস্য সংক্রান্ত : </b></p>
			<table width="100%" height="auto" class="table-bordered">
				<tr>
					<td style="width: 20%;">ক্ষুদ্রঋণ কর্মসূচীর নাম</td>
					
					<td style="width: 20%;">
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td colspan="3">বিগত মাস পর্যন্ত সঞ্চয় স্থিতি  <br> ( টাকা ) </td>
							</tr>
							<tr>
								<td style="width: 50%;">পুরুষ</td>
								<td style="width: 50%;">মহিলা</td>
							</tr>
						</table>	
					</td>
					
					<td style="width: 20%;">
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td colspan="3">এ মাসের সঞ্চয় আদায়   <br> ( টাকা ) </td>
							</tr>
							<tr>
								<td style="width: 50%;">পুরুষ</td>
								<td style="width: 50%;">মহিলা</td>
							</tr>
						</table>	
					</td>
					
					<td style="width: 20%;">
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td colspan="3">এ মাসের সঞ্চয় ফেরৎ   <br> উত্তোলন ( টাকা ) </td>
							</tr>
							<tr>
								<td style="width: 50%;">পুরুষ</td>
								<td style="width: 50%;">মহিলা</td>
							</tr>
						</table>	
					</td>
					
					<td style="width: 20%;">
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td colspan="3">মাস শেষে সঞ্চয়  <br> স্থিতি ( টাকা ) </td>
							</tr>
							<tr>
								<td style="width: 50%;">পুরুষ</td>
								<td style="width: 50%;">মহিলা</td>
							</tr>
						</table>	
					</td>
				</tr>
				
				<!-- numbering start -->
				<tr>
					<td>১</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">২</td>
								<td style="width: 50%;">৩</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">৪</td>
								<td style="width: 50%;">৫</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">৬</td>
								<td style="width: 50%;">৭</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">৮ = ২+৪ - ৬</td>
								<td style="width: 50%;">৯ = ৩+৫ - ৭</td>
							</tr>
						</table>
					</td>
						
				</tr>
				<!-- numbering end -->
				
				<!-- RMC Start -->	
				
<?php
	$pList = $this->db->where("pksf","1")->get("project")->result();

	$regularTotalLM = 0;
	$regularTotalLF = 0;
	
	$sessaTotalLM = 0;
	$sessaTotalLF = 0;

	// current month pksf total
	$pksfRegularMT = 0;
	$pksfRegularFT = 0;

	$pksfSessaMT = 0;
	$pksfSessaFT = 0;

	// current mont pksf total widraw
	$currentPksfRWM = 0;
	$currentPksfRWF = 0;

	$currentPksfSWM = 0;
	$currentPksfSWF = 0;


	foreach($pList as $list):

		// initialize
		$lfTotal = 0;
		$lmTotal = 0;

		// last month accounting
		// regular saving
		$ym = date("m") - 1;
		$regularSavingLM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.save_or_widrow = 1 AND sl.payment_month = $ym AND sp.project_id = $list->id")->row();

		$lmTotal += $regularSavingLM->amount;
		$regularTotalLM += $regularSavingLM->amount;

		$regularSavingLF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.save_or_widrow = 1 AND sl.payment_month = $ym AND sp.project_id = $list->id")->row();

		$lfTotal += $regularSavingLF->amount;
		$regularTotalLF += $regularSavingLF->amount;

		// sessa saving
		$sessaSavingLM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.save_or_widrow = 1 AND sl.payment_month = $ym AND sp.project_id = $list->id")->row();

		$lmTotal += $sessaSavingLM->amount;
		$sessaTotalLM += $sessaSavingLM->amount;

		$sessaSavingLF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.save_or_widrow = 1 AND sl.payment_month = $ym AND sp.project_id = $list->id")->row();

		$lfTotal += $sessaSavingLF->amount;
		$sessaTotalLF += $sessaSavingLF->amount;

		// current month

		$tmTotal = 0;
		$tfTotal = 0;

		

		// regular saving
		$tm = date("m");
		$regularSavingTM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.save_or_widrow = 1 AND sl.payment_month = $tm AND sp.project_id = $list->id")->row();

		$tmTotal += $regularSavingTM->amount;
		$pksfRegularMT += $regularSavingTM->amount;

		$regularSavingTF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.save_or_widrow = 1 AND sl.payment_month = $tm AND sp.project_id = $list->id")->row();

		$tfTotal += $regularSavingTF->amount;
		$pksfRegularFT += $regularSavingTF->amount;

		// sessa saving
		$sessaSavingTM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.save_or_widrow = 1 AND sl.payment_month = $tm AND sp.project_id = $list->id")->row();

		$tmTotal += $sessaSavingTM->amount;
		$pksfSessaMT += $sessaSavingTM->amount;

		$sessaSavingTF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.save_or_widrow = 1 AND sl.payment_month = $tm AND sp.project_id = $list->id")->row();

		$tfTotal += $sessaSavingTF->amount;
		$pksfSessaFT += $sessaSavingTF->amount;


		//////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////// current month widrow //////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////

		$currentTotalWM = 0;
		$currentTotalWF = 0;

		

		// regular saving
		$tm = date("m");
		$currentRegularWM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.save_or_widrow = 2 AND sl.payment_month = $tm AND sp.project_id = $list->id")->row();

		$currentTotalWM += $currentRegularWM->amount;
		$currentPksfRWM += $currentRegularWM->amount;

		$currentRegularWF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.save_or_widrow = 2 AND sl.payment_month = $tm AND sp.project_id = $list->id")->row();

		$currentTotalWF += $currentRegularWF->amount;
		$currentPksfRWF += $currentRegularWF->amount;

		// sessa saving
		$currentSessaWM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.save_or_widrow = 2 AND sl.payment_month = $tm AND sp.project_id = $list->id")->row();

		$currentTotalWM += $currentSessaWM->amount;
		$currentPksfSWM += $currentSessaWM->amount;

		$currentSessaWF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.save_or_widrow = 2 AND sl.payment_month = $tm AND sp.project_id = $list->id")->row();

		$currentTotalWF += $currentSessaWF->amount;
		$currentPksfSWF += $currentSessaWF->amount;

?>

				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"><?= $list->project_name ?></td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> নিয়মিত সঞ্চয়</td>
										</tr>
										<tr>
											<td> স্বেচ্ছা সঞ্চয় </td>
										</tr>
										<tr>
											<td> অন্যান্য সঞ্চয় </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?php if($regularSavingLM->amount):echo $regularSavingLM->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td><?php if($sessaSavingLM->amount):echo $sessaSavingLM->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $lmTotal ?></td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?php if($regularSavingLF->amount):echo $regularSavingLF->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td><?php if($sessaSavingLF->amount):echo $sessaSavingLF->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $lfTotal ?></td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?php if($regularSavingTM->amount):echo $regularSavingTM->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td><?php if($sessaSavingTM->amount):echo $sessaSavingTM->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $tmTotal ?></td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?php if($regularSavingTF->amount):echo $regularSavingTF->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td><?php if($sessaSavingTF->amount):echo $sessaSavingTF->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $tfTotal ?></td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?php if($currentRegularWM->amount):echo $currentRegularWM->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td><?php if($currentSessaWM->amount):echo $currentSessaWM->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $currentTotalWM ?></td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?php if($currentRegularWF->amount):echo $currentRegularWF->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td><?php if($currentSessaWF->amount):echo $currentSessaWF->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $currentTotalWF ?></td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?= $regularSavingLM->amount + $regularSavingTM->amount - $currentRegularWM->amount ?></td>
										</tr>
										<tr>
											<td><?= $sessaSavingLM->amount + $sessaSavingTM->amount - $currentSessaWM->amount ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $regularSavingLM->amount + $regularSavingTM->amount - $currentRegularWM->amount + $sessaSavingLM->amount + $sessaSavingTM->amount - $currentSessaWM->amount ?></td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?= $regularSavingLF->amount + $regularSavingTF->amount - $currentRegularWF->amount ?></td>
										</tr>
										<tr>
											<td><?= $sessaSavingLF->amount + $sessaSavingTF->amount - $currentSessaWF->amount ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $regularSavingLF->amount + $regularSavingTF->amount - $currentRegularWF->amount + $sessaSavingLF->amount + $sessaSavingTF->amount - $currentSessaWF->amount ?></td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
						
				</tr>
				
<?php
	endforeach;
?>

				<!-- RMC End -->
				
<?php
	$pksfRegularCMT = 0;
	$pksfSessaCMT = 0;
?>			
				
				<!-- PKSF Total Fund Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> পিকেএসএফ  <br> ফান্ড মোট : </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> নিয়মিত সঞ্চয়</td>
										</tr>
										<tr>
											<td> স্বেচ্ছা সঞ্চয় </td>
										</tr>
										<tr>
											<td> অন্যান্য সঞ্চয় </td>
										</tr>
										<tr>
											<td> সর্বমোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
		
<!-- last month -->

					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $regularTotalLM ?> </td>
										</tr>
										<tr>
											<td> <?= $sessaTotalLM ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $regularTotalLM + $sessaTotalLM ?> </td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $regularTotalLF ?>	 </td>
										</tr>
										<tr>
											<td> <?= $sessaTotalLF ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $regularTotalLF + $sessaTotalLF ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
<!-- current month pksf -->

					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $pksfRegularCMT += $pksfRegularMT ?> </td>
										</tr>
										<tr>
											<td> <?= $pksfSessaCMT += $pksfSessaMT ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $pksfRegularMT + $pksfSessaMT ?> </td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $pksfRegularFT ?> </td>
										</tr>
										<tr>
											<td> <?= $pksfSessaFT ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $pksfRegularFT + $pksfSessaFT ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					


		<!-- widraw section -->
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?= $currentPksfRWM ?></td>
										</tr>
										<tr>
											<td><?= $currentPksfSWM ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $currentPksfRWM + $currentPksfSWM ?></td>
										</tr>
									</table>
									
								</td>
								
								

								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $currentPksfRWF ?> </td>
										</tr>
										<tr>
											<td> <?= $currentPksfSWF ?> </td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td> <?= $currentPksfRWF + $currentPksfSWF ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
		<!-- end windraw -->

	<!-- total ending -->
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $regularTotalLM + $pksfRegularMT - $currentPksfRWM ?> </td>
										</tr>
										<tr>
											<td> <?= $sessaTotalLM + $pksfSessaMT - $currentPksfSWM ?> </td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td> <?= $regularTotalLM + $pksfRegularMT - $currentPksfRWM + $sessaTotalLM + $pksfSessaMT - $currentPksfSWM ?> </td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $regularTotalLF + $pksfRegularFT - $currentPksfRWF ?> </td>
										</tr>
										<tr>
											<td> <?= $sessaTotalLF + $pksfSessaFT - $currentPksfSWF ?> </td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td> <?= $regularTotalLF + $pksfRegularFT - $currentPksfRWF + $sessaTotalLF + $pksfSessaFT - $currentPksfSWF ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>

					<!-- total ending end -->
						
				</tr>
				
				<!-- PKSF Total Fund End -->
	
<?php
	// non pksf regular saving upto last month
	
	$npkmsTotalLM = 0;
	$npkmsTotalLF = 0;

	// male
	$npksfRegularLM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.payment_month = $ym AND p.pksf = 2")->row();
	
	$npkmsTotalLM += $npksfRegularLM->amount;

	// female
	$npksfRegularLF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.payment_month = $ym AND p.pksf = 2")->row();

	$npkmsTotalLF += $npksfRegularLF->amount;
	// non pksf sessa saving upto last month
	
	// male
	$npksfSessaLM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.payment_month = $ym AND p.pksf = 2")->row();
	
	$npkmsTotalLM += $npksfSessaLM->amount;

	// female
	$npksfSessaLF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.payment_month = $ym AND p.pksf = 2")->row();
	$npkmsTotalLF += $npksfSessaLF->amount;

	   ///////////////////////////////////////////////////////////////////////////////////////
	  //////////////////////// current month non pksf ///////////////////////////////////////
	 /////////////// non pksf regular saving upto Current month ////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////

	$npkmsTotalCLM = 0;
	$npkmsTotalCLF = 0;

	$npksfTotalRCM = 0;
	$npksfTotalRCF = 0;

	$npksfTotalSCM = 0;
	$npksfTotalSCF = 0;

	$tm = date("m");

	// male
	$npksfRegularCLM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.payment_month = $tm AND p.pksf = 2")->row();
	
	$npkmsTotalCLM += $npksfRegularCLM->amount;
	$npksfTotalRCM += $npksfRegularCLM->amount;
	// $npkmsTotalCM += $npksfRegularCLM->amount;

	// female
	$npksfRegularCLF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.payment_month = $tm AND p.pksf = 2")->row();

	$npkmsTotalCLF += $npksfRegularCLF->amount;
	$npksfTotalRCF += $npksfRegularCLF->amount;
	// non pksf sessa saving upto last month
	
	// male
	$npksfSessaCLM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.payment_month = $tm AND p.pksf = 2")->row();
	
	$npkmsTotalCLM += $npksfSessaCLM->amount;
	$npksfTotalSCM += $npksfSessaCLM->amount;

	// female
	$npksfSessaCLF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.payment_month = $tm AND p.pksf = 2")->row();
	$npkmsTotalCLF += $npksfSessaCLF->amount;
	$npksfTotalSCF += $npksfSessaCLF->amount;


		//////////////////////////////////////////////////////////////////////////////////////
	   /////////////////////// current month non pksf ///////////////////////////////////////
	  ////////////// non pksf regular , sessa widraw upto Current month ////////////////////
	 //////////////////////////////////////////////////////////////////////////////////////

	$npkmsTotalWM = 0;
	$npkmsTotalWF = 0;

	$npksfTotalRWM = 0;
	$npksfTotalRWF = 0;

	$npksfTotalSWM = 0;
	$npksfTotalSWF = 0;

	$tm = date("m");

	// male
	$npksfRegularWM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sl.save_or_widrow = 2 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.payment_month = $tm AND p.pksf = 2")->row();
	
	$npkmsTotalWM += $npksfRegularWM->amount;
	$npksfTotalRWM += $npksfRegularWM->amount;
	// $npkmsTotalCM += $npksfRegularCLM->amount;

	// female
	$npksfRegularWF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 1 AND sl.save_or_widrow = 2 AND sl.payment_month = $tm AND p.pksf = 2")->row();

	$npkmsTotalWF += $npksfRegularWF->amount;
	$npksfTotalRWF += $npksfRegularWF->amount;
	// non pksf sessa saving upto last month
	
	// male
	$npksfSessaWM = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 1 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.save_or_widrow = 2 AND sl.payment_month = $tm AND p.pksf = 2")->row();
	
	$npkmsTotalWM += $npksfSessaWM->amount;
	$npksfTotalSWM += $npksfSessaWM->amount;

	// female
	$npksfSessaWF = $this->db->query("SELECT SUM(sl.amount) as amount FROM saving_log sl,member_info mi,somiti_info si,somiti_project sp,project p WHERE sl.member_id = mi.user_id AND si.id = mi.somiti AND si.somiti_type = 2 AND sp.somiti_id = si.id AND sl.saving_type = 2 AND sl.save_or_widrow = 2 AND sl.payment_month = $tm AND p.pksf = 2")->row();
	$npkmsTotalWF += $npksfSessaWF->amount;
	$npksfTotalSWF += $npksfSessaWF->amount;
?>

				<!-- NON - PKSF Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">NON-PKSF</td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> নিয়মিত সঞ্চয়</td>
										</tr>
										<tr>
											<td> স্বেচ্ছা সঞ্চয় </td>
										</tr>
										<tr>
											<td> অন্যান্য সঞ্চয় </td>
										</tr>
										<tr>
											<td> সর্বমোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?php if($npksfRegularLM->amount):echo $npksfRegularLM->amount;else:echo 0;endif; ?> </td>
										</tr>
										<tr>
											<td> <?php if($npksfSessaLM->amount):echo $npksfSessaLM->amount;else:echo 0;endif; ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $npkmsTotalLM  ?> </td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?php if($npksfRegularLF->amount):echo $npksfRegularLF->amount;else:echo 0;endif; ?> </td>
										</tr>
										<tr>
											<td> <?php if($npksfSessaLF->amount):echo $npksfSessaLF->amount;else:echo 0;endif; ?>  </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $npkmsTotalLF  ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?php if($npksfRegularCLM->amount):echo $npksfRegularCLM->amount;else:echo 0;endif; ?> </td>
										</tr>
										<tr>
											<td> <?php if($npksfSessaLM->amount):echo $npksfSessaLM->amount;else:echo 0;endif; ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $npkmsTotalCLM  ?> </td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?php if($npksfRegularCLF->amount):echo $npksfRegularCLF->amount;else:echo 0;endif; ?> </td>
										</tr>
										<tr>
											<td> <?php if($npksfSessaCLF->amount):echo $npksfSessaCLF->amount;else:echo 0;endif; ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $npkmsTotalCLF  ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?php if($npksfRegularWM->amount):echo $npksfRegularWM->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td><?php if($npksfSessaWM->amount):echo $npksfSessaWM->amount;else:echo 0;endif; ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $npkmsTotalWM ?></td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?php if($npksfRegularWF->amount):echo $npksfRegularWF->amount;else:echo 0;endif; ?> </td>
										</tr>
										<tr>
											<td> <?php if($npksfSessaWF->amount):echo $npksfSessaWF->amount;else:echo 0;endif; ?> </td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td> <?= $npkmsTotalWF ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $npksfRegularLM->amount + $npksfRegularWM->amount - $npksfRegularWM->amount ?> </td>
										</tr>
										<tr>
											<td> <?= $npksfSessaLM->amount + $npksfSessaWM->amount - $npksfSessaWM->amount ?> </td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td> <?= $npksfRegularLM->amount + $npksfRegularWM->amount - $npksfRegularWM->amount + $npksfSessaLM->amount + $npksfSessaWM->amount - $npksfSessaWM->amount ?> </td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $npksfRegularLF->amount + $npksfRegularWF->amount - $npksfRegularWF->amount ?> </td>
										</tr>
										<tr>
											<td> <?= $npksfSessaLF->amount + $npksfSessaWF->amount - $npksfSessaWF->amount ?> </td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td> <?= $npksfRegularLF->amount + $npksfRegularWF->amount - $npksfRegularWF->amount + $npksfSessaLF->amount + $npksfSessaWF->amount - $npksfSessaWF->amount ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
						
				</tr>
				
				<!-- NON - PKSF End -->
				
				<!-- pksf and non-pksf total fund Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">পিকেএসএফ <br> ফান্ড + নন- <br> পিকেএসএফ <br> ফান্ড মোট</td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> নিয়মিত সঞ্চয়</td>
										</tr>
										<tr>
											<td> স্বেচ্ছা সঞ্চয় </td>
										</tr>
										<tr>
											<td> অন্যান্য সঞ্চয় </td>
										</tr>
										<tr>
											<td> সর্বমোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
<!-- pksf non pksf last month -->

					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $regularTotalLM + $sessaTotalLM + $npkmsTotalLM ?> </td>
										</tr>
										<tr>
											<td> <?= $sessaTotalLM + $npksfSessaLM->amount ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $regularTotalLM + $sessaTotalLM + $npkmsTotalLM + $sessaTotalLM + $npksfSessaLM->amount ?> </td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $regularTotalLF + $sessaTotalLF + $npkmsTotalLF ?> </td>
										</tr>
										<tr>
											<td> <?= $sessaTotalLF + $npksfSessaLF->amount ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $regularTotalLF + $sessaTotalLF + $npkmsTotalLF + $sessaTotalLF + $npksfSessaLF->amount ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
<!-- pksf non pksf current month -->

					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $npksfTotalRCM + $pksfRegularCMT ?> </td>
										</tr>
										<tr>
											<td> <?= $npksfTotalSCM + $pksfSessaCMT ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $npksfTotalRCM + $pksfRegularCMT + $npksfTotalSCM + $pksfSessaCMT ?> </td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $npksfTotalRCF + $pksfRegularFT ?> </td>
										</tr>
										<tr>
											<td> <?= $npksfTotalSCF + $pksfSessaFT ?> </td>
										</tr>
										<tr>
											<td> - </td>
										</tr>
										<tr>
											<td> <?= $npksfTotalRCF + $pksfRegularFT + $npksfTotalSCF + $pksfSessaFT ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
<!-- pksf non pksf windraw -->

					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td><?= $currentPksfRWM + $npksfTotalRWM ?></td>
										</tr>
										<tr>
											<td><?= $currentPksfSWM + $npksfTotalSWM ?></td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td><?= $currentPksfRWM + $npksfTotalRWM + $currentPksfSWM + $npksfTotalSWM ?></td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $currentPksfRWF + $npksfTotalRWF ?> </td>
										</tr>
										<tr>
											<td> <?= $currentPksfSWF + $npksfTotalSWF ?> </td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td> <?= $currentPksfRWF + $npksfTotalRWF + $currentPksfSWF + $npksfTotalSWF ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
<!-- pksf non pksf final -->

					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $regularTotalLM + $sessaTotalLM + $npkmsTotalLM + $npksfTotalRCM + $pksfRegularCMT - $currentPksfRWM - $npksfTotalRWM ?> </td>
										</tr>
										<tr>
											<td> <?= $sessaTotalLM + $npksfSessaLM->amount + $npksfTotalSCM + $pksfSessaCMT - $currentPksfSWM - $npksfTotalSWM ?> </td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td> <?= $regularTotalLM + $sessaTotalLM + $npkmsTotalLM + $npksfTotalRCM + $pksfRegularCMT - $currentPksfRWM - $npksfTotalRWM + $sessaTotalLM + $npksfSessaLM->amount + $npksfTotalSCM + $pksfSessaCMT - $currentPksfSWM - $npksfTotalSWM ?> </td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> <?= $regularTotalLF + $sessaTotalLF + $npkmsTotalLF + $npksfTotalRCF + $pksfRegularFT - $currentPksfRWF - $npksfTotalRWF ?> </td>
										</tr>
										<tr>
											<td> <?= $sessaTotalLF + $npksfSessaLF->amount + $npksfTotalSCF + $pksfSessaFT - $currentPksfSWF - $npksfTotalSWF ?> </td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td> <?= $regularTotalLF + $sessaTotalLF + $npkmsTotalLF + $npksfTotalRCF + $pksfRegularFT - $currentPksfRWF - $npksfTotalRWF + $sessaTotalLF + $npksfSessaLF->amount + $npksfTotalSCF + $pksfSessaFT - $currentPksfSWF - $npksfTotalSWF ?> </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
						
				</tr>
				
				<!-- pksf and non-pksf total fund End -->
				
				<!-- main total Start -->	
				
				<tr>
					<td>
						 সর্বমোট (পুঃ + মহিলা ) : <br> পিকেএসএফ ফান্ড + নন 
					</td>		
					
					<td>
						<?= $regularTotalLM + $sessaTotalLM + $npkmsTotalLM + $sessaTotalLM + $npksfSessaLM->amount + $regularTotalLF + $sessaTotalLF + $npkmsTotalLF + $sessaTotalLF + $npksfSessaLF->amount ?>
					</td>
					
					<td>
						<?= $npksfTotalRCM + $pksfRegularCMT + $npksfTotalSCM + $pksfSessaCMT + $npksfTotalRCF + $pksfRegularFT + $npksfTotalSCF + $pksfSessaFT ?>
					</td>
					
					<td>
						<?= $currentPksfRWM + $npksfTotalRWM + $currentPksfSWM + $npksfTotalSWM + $currentPksfRWF + $npksfTotalRWF + $currentPksfSWF + $npksfTotalSWF ?>
					</td>
					
					<td>
						<?= $regularTotalLM + $sessaTotalLM + $npkmsTotalLM + $npksfTotalRCM + $pksfRegularCMT - $currentPksfRWM - $npksfTotalRWM + $sessaTotalLM + $npksfSessaLM->amount + $npksfTotalSCM + $pksfSessaCMT - $currentPksfSWM - $npksfTotalSWM + $regularTotalLF + $sessaTotalLF + $npkmsTotalLF + $npksfTotalRCF + $pksfRegularFT - $currentPksfRWF - $npksfTotalRWF + $sessaTotalLF + $npksfSessaLF->amount + $npksfTotalSCF + $pksfSessaFT - $currentPksfSWF - $npksfTotalSWF ?>
					</td>
						
				</tr>
				
				<!-- main total End -->
				
				<!-- saving interest Start -->	
				
				<tr>
					<td>
						 সঞ্চয়ের উপর প্রদত্ত সুদের হার
         			</td>		
					
					<td colspan="2" style="text-align:left !important;">
						পিকেএসএফ ফান্ড =
					</td>
					
					<td colspan="2" style="text-align:left !important;">
						নন - পিকেএসএফ ফান্ড =
					</td>
						
				</tr>
				
				<!-- saving interest End -->
			</table>
		</div><!-- /.box-body -->


		<div class="box-body">
			<p><b> ৩ । সদস্য ভর্তি , বাতিল , সঞ্চয়কারী ও উপস্থিতি সংক্রান্ত : </b></p>
			<table width="100%" height="auto" class="table-bordered">
				<tr>
					<td>ক্ষুদ্রঋণ কর্মসূচীর নাম</td>
					<td>বিগত মাস শেষে সদস্য</td>
					<td>এ মাসে নতুন সদস্য ভর্তি</td>
					<td>এ মাসে সদস্য</td>
					<td>মাস শেষে সদস্য সংখ্যা</td>
					<td>এ মাসে গড় সঞ্চয়কারী</td>
					<td>এ মাসে সঞ্চয় ফেরত নেয়া</td>
					<td>এ মাসে গড় উপস্থিতির সংখ্যা</td>
				</tr>
				
				<tr>
					<td>১</td>		
					<td>২</td>
					<td>৩</td>
					<td>৪</td>
					<td>৫ = ২ + ৩ - ৪</td>
					<td>৬</td>
					<td>৭</td>
					<td>৮ </td>
				</tr>

<?php

	$tdate = "'".date("Y-m-d")."'";

	foreach($projectList as $list):

		$newOldMember = $this->db->query("SELECT * FROM `member_info` mf,somiti_project sp WHERE mf.somiti=sp.somiti_id and sp.project_id = $list->id and date(mf.created_at) < date($tdate)")->num_rows();
		$totalMember = $this->db->query("SELECT * FROM `member_info` mf,somiti_project sp WHERE mf.somiti=sp.somiti_id and sp.project_id = $list->id")->num_rows();
?>

				<tr>
					<td><?= $list->project_name ?></td>		
					<td><?= $newOldMember ?></td>
					<td><?= $newMember = $totalMember - $newOldMember ?></td>
					<td>-</td>
					<td><?= $newOldMember + $newMember ?></td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>

<?php endforeach; ?>


			</table>
			
		</div><!-- /.box-body -->

			<p>
				<b  style="font-size: 13px !important;">
					বিঃ দ্রঃ 
১ । উপরোক্ত ৩ নং ছকে তবে পি কে এস এফ মোট এবং সর্বমোট সারি (Row) দু’টিতে দ্বৈত গণনা (Double Counting) পরিহার করে প্রকৃত সংখ্যা উল্লেখ করতে হবে । <br/>
২ । উপরোক্ত ১,২,৩ নং ছকে অন্যান্য ক্ষুদ্রঋণ কার্যক্রমের ক্ষেত্রে প্রয়োজনীয় সংখ্যক সারি তৈরী করে প্রতিটি কার্যক্রমের নাম উল্লেখপূর্বক আলাদাভাবে তথ্য তথ্য সন্নিবেশ করতে হবে । 

				</b>
			</p>

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