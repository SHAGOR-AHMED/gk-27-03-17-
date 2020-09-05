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
		border-color: 1px solid #000 !important;
	}

	table table tr td{
		border-color: 1px solid #000 !important;
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
			<table width="100%" height="auto" class="table-bordered">
				<tr>
					<td colspan="2">কর্মসূচীর নাম</td>
					<td colspan="2">
						<table width="100%" class="table-bordered">
							<tr>
								<td colspan="2">বিগত মাস শেষে </td>
							</tr>
							<tr>
								<td>ঋণ গ্রহীতার </td>
								<td>ঋণস্থিতি </td>
							</tr>
						</table>
					</td>

					<td colspan="2">
						<table width="100%" class="table-bordered">
							<tr>
								<td colspan="2">এ মাসে ঋণ বিতরন </td>
							</tr>
							<tr>
								<td>জন </td>
								<td>টাকা</td>
							</tr>
						</table>
					</td>

					<td>এ মাসে মোট <br/> ঋণ আদায়  <br/> ( টাকা )</td>
					<td>এ মাসে পূর্ণ <br/> পরিশোধ</td>
					
					<td colspan="2">
						<table width="100%" class="table-bordered">
							<tr>
								<td colspan="2">মাস শেষে </td>
							</tr>
							<tr>
								<td>ঋণ গ্রহীতার <br/> সংখ্যা</td>
								<td>ঋণস্থিতি</td>
							</tr>
						</table>
					</td>

					<td colspan="2">
						<table width="100%" class="table-bordered">
							<tr>
								<td colspan="2">এ যাবৎ ( ক্রমপুঞ্জিভূত )</td>
							</tr>
							<tr>
								<td>ঋণ গ্রহীতার <br/> সংখ্যা</td>
								<td>ঋণ সংখ্যা</td>
							</tr>
						</table>
					</td>

					<td colspan="5">
						<table width="100%" class="table-bordered">
							<tr>
								<td colspan="3">কর্মসংস্থান সংক্রান্ত তথ্য ( এ মাসে বিতরণকৃত ঋণের)</td>
							</tr>
							<tr>
								<td>স্বকর্ম সংস্থান</td>
								<td>মঞ্জুরী ভিত্তিক কর্ম <br/> সংস্থান</td>
								<td>সর্বমোট</td>
							</tr>
						</table>
					</td>

				</tr>

				<tr>
					<td colspan="2"> ১ </td>
					<td> ২ </td>
					<td> ৩ </td>
					<td> ৪ </td>
					<td> ৫ </td>
					<td> ৬ </td>
					<td> ৭ </td>
					<td> ৮ = ২ + ৪ - ৭ </td>
					<td> ৯ = ৩ + ৫ - ৬ </td>
					<td> ১০ </td>
					<td> ১১ </td>
					<td>ঋণ <br/> গ্রহীতা</td>
					<td>পরিবারের <br/> সদস্য</td>
					<td>নিজ <br/> পরিবারভূক্ত</td>
					<td>পরিবারের <br/> বাহিরে</td>
					<td></td>
				</tr>
				
<!-- pksf row start -->

<?php
	$pList = $this->db->where("pksf","1")->get("project")->result();

	// last month

	$pksfTotalLM = 0;
	$pksfTotalLF = 0;

	$pksfLoanLM = 0;
	$pksfLoanLF = 0;

	// current month

	$pksfTotalCM = 0;
	$pksfTotalCF = 0;

	// current month loan
	$pksfLoanCM = 0;
	$pksfLoanCF = 0;

	// current month collection
	$pksfCurrentCollectionM = 0;
	$pksfCurrentCollectionF = 0;

	// pksf total loaner
	$pksfTotalLoanerM = 0;
	$pksfTotalLoanerF = 0;

	// pksf sub total loaner 
	$subTotalLoanerM = 0;
	$subTotalLoanerF = 0;

	// pksf total loaner
	$pksfLoanCountM = 0;
	$pksfLoanCountF = 0;

	foreach($pList as $list):
		
		$sub_totalLM = 0;
		$sub_total_loanLM = 0;
		$lmtm = date("Y")."-".date("m")."-01";

		$pksfLoanM = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id AND li.opening_date < '$lmtm'")->num_rows();

		$sub_totalLM += $pksfLoanM;
		$pksfTotalLM += $pksfLoanM;

		$pksfLoanF = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id AND li.opening_date < '$lmtm'")->num_rows();

		$sub_totalLM += $pksfLoanF;

		$pksfTotalLF += $pksfLoanF;

		// loan information
		// active loan total
		$totalActiveLoanLM = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id")->row(); 
		
		$totalActiveLoanLF = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id")->row(); 

		// collection up to last month
		$tm = date("m");

		$paidLoanLM = $this->db->query("SELECT SUM(lc.capital) as paid_loan FROM `loan_info` li,somiti_project sp,member_info mi,loan_collection lc WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND lc.member_id=li.member_id AND lc.month_no < $tm AND sp.project_id = $list->id")->row();

		

		$paidLoanLF = $this->db->query("SELECT SUM(lc.capital) as paid_loan FROM `loan_info` li,somiti_project sp,member_info mi,loan_collection lc WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND lc.member_id=li.member_id AND lc.month_no < $tm AND sp.project_id = $list->id")->row();


		// current month loan given
		
		$sub_total_givenM = 0;
		$sub_total_givenF = 0;

		$dfirst = date("Y").'-'.date("m").'-01';
		$dlast = date("Y").'-'.date("m").'-30';

		$currentLoanGiveM = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id AND li.opening_date >= '$dfirst' AND li.opening_date <= '$dlast' ")->num_rows();

		$sub_total_givenM += $currentLoanGiveM;
		$pksfTotalCM += $currentLoanGiveM;

		$currentLoanGiveF = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id AND li.opening_date >= '$dfirst' AND li.opening_date <= '$dlast' ")->num_rows();
		
		$sub_total_givenF += $currentLoanGiveF;
		$pksfTotalCF += $currentLoanGiveF;


		// current month loan given
		$stDate = date("Y")."-".date("m")."-"."01";
		$lsDate = date("Y")."-".date("m")."-"."30";

		// initial sub total
		$sub_total_current_loan = 0;

		// male current given loan
		$currentMonthLoanM = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id AND li.opening_date >= '$stDate' AND li.opening_date <= '$lsDate' ")->row();

		$pksfLoanCM += $currentMonthLoanM->total_amount;
		$sub_total_current_loan += $currentMonthLoanM->total_amount;

		// female current given loan
		$currentMonthLoanF = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id AND li.opening_date >= '$stDate' AND li.opening_date <= '$lsDate' ")->row();

		$pksfLoanCF += $currentMonthLoanF->total_amount;
		$sub_total_current_loan += $currentMonthLoanF->total_amount;

		// current month collection
		$ctm = date("m");

			// sub total
			$currentTotalCollectionSubT = 0;

			// male
		$currentTotalCollectionM = $this->db->query("SELECT SUM(lc.capital) as capital FROM loan_collection lc,member_info mi,somiti_project sp WHERE lc.member_id = mi.user_id AND mi.somiti = sp.somiti_id AND sp.project_id = $list->id AND mi.gender = 1 AND lc.month_no = $ctm")->row();

		$currentTotalCollectionSubT += $currentTotalCollectionM->capital;
		$pksfCurrentCollectionM += $currentTotalCollectionM->capital;

			// female
		$currentTotalCollectionF = $this->db->query("SELECT SUM(lc.capital) as capital FROM loan_collection lc,member_info mi,somiti_project sp WHERE lc.member_id = mi.user_id AND mi.somiti = sp.somiti_id AND sp.project_id = $list->id AND mi.gender = 2 AND lc.month_no = $ctm")->row();

		$currentTotalCollectionSubT += $currentTotalCollectionF->capital;
		$pksfCurrentCollectionF += $currentTotalCollectionF->capital;

		// total loaner ( last month+current month )
		$pksfTotalSubCM = 0;

		// total loaner information

		$subTotalLoaner = 0;

		// male loaner
		$totalLoanerM = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id GROUP BY member_id ")->num_rows();

		$subTotalLoaner += $totalLoanerM;
		$subTotalLoanerM += $totalLoanerM;

		// female loaner
		$totalLoanerF = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id GROUP BY member_id ")->num_rows();
		

		$subTotalLoaner += $totalLoanerF;
		$subTotalLoanerF += $totalLoanerF;

		// male total loan given
		$totalLoanM = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id ")->num_rows();

		$loanCount = 0;

		$loanCount += $totalLoanM;
		$pksfLoanCountM += $totalLoanM;

		
		// female total loan given
		$totalLoanF = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id")->num_rows();

		$loanCount += $totalLoanF;
		$pksfLoanCountF += $totalLoanM;

?>

				<tr>
					<td rowspan="3"><?= $list->project_name ?></td>
					<td>পুরুষ</td>
					<td><?= $pksfLoanM ?></td>
					<td>
						<?php 
							$sub_total_loanLM += $totalActiveLoanLM->total_amount - $paidLoanLM->paid_loan;
							$pksfLoanLM += $totalActiveLoanLM->total_amount - $paidLoanLM->paid_loan; 
							echo $totalActiveLoanLM->total_amount - $paidLoanLM->paid_loan; 
						?>
					</td>
					<td><?= $currentLoanGiveM ?></td>
					<td><?= $currentMonthLoanM->total_amount ?></td>
					<td><?= $currentTotalCollectionM->capital ?></td>
					<td>-</td>
					<td>
						<?php 
							$pksfTotalSubCM += $pksfLoanM + $currentLoanGiveM;
							$pksfTotalLoanerM += $pksfLoanM + $currentLoanGiveM;
							echo $pksfLoanM + $currentLoanGiveM;
						?>
					</td>
					<td><?= $totalActiveLoanLM->total_amount - $paidLoanLM->paid_loan + $currentMonthLoanM->total_amount; ?></td>
					<td><?= $totalLoanerM ?></td>
					<td><?= $totalLoanM ?></td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>



				<tr>
					<td>মহিলা</td>
					<td><?= $pksfLoanF ?></td>
					<td>
						<?php 
							$sub_total_loanLM += $totalActiveLoanLF->total_amount - $paidLoanLF->paid_loan;
							$pksfLoanLF += $totalActiveLoanLF->total_amount - $paidLoanLF->paid_loan;
							echo $totalActiveLoanLF->total_amount - $paidLoanLF->paid_loan; ?></td>
					<td><?= $currentLoanGiveF ?></td>
					<td><?= $currentMonthLoanF->total_amount ?></td>
					<td><?= $currentTotalCollectionF->capital ?></td>
					<td>-</td>
					<td>
						<?php 
							$pksfTotalSubCM += $pksfLoanF + $currentLoanGiveF;
							$pksfTotalLoanerF += $pksfLoanF + $currentLoanGiveF;
							echo $pksfLoanF + $currentLoanGiveF; 
						?>
					</td>
					<td><?= $totalActiveLoanLF->total_amount - $paidLoanLF->paid_loan + $currentMonthLoanF->total_amount; ?></td>
					<td><?= $totalLoanerF ?></td>
					<td><?= $totalLoanF ?></td>
					<td></td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>

				<tr>
					<td>মোট</td>
					<td><?= $sub_totalLM ?></td>
					<td><?= $sub_total_loanLM ?></td>
					<td><?= $sub_total_givenM ?></td>
					<td><?= $sub_total_current_loan ?></td>
					<td><?= $currentTotalCollectionSubT ?></td>
					<td>-</td>
					<td><?= $pksfTotalSubCM ?></td>
					<td><?= $sub_total_loanLM + $sub_total_current_loan ?></td>
					<td><?= $subTotalLoaner ?></td>
					<td><?= $loanCount ?></td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>

<?php
	endforeach;
?>

<!-- total pksf -->
	<tr style="background: #eee;">
		<td>পিকেএসএফ </td>
		<td>পুরুষ</td>
		<td><?= $pksfTotalLM ?></td>
		<td><?= $pksfLoanLM ?></td>
		<td><?= $pksfTotalCM ?></td>
		<td><?= $pksfLoanCM ?></td>
		<td><?= $pksfCurrentCollectionM ?></td>
		<td>-</td>
		<td><?= $pksfTotalLoanerM ?></td>
		<td><?= $pksfLoanLM + $pksfLoanCM ?></td>
		<td><?= $subTotalLoanerM ?></td>
		<td><?= $pksfLoanCountM ?></td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
	</tr>

	<tr style="background: #eee;">
		<td>মোট</td>
		<td>মহিলা</td>
		<td><?= $pksfTotalLF ?></td>
		<td><?= $pksfLoanLF ?></td>
		<td><?= $pksfTotalCF ?></td>
		<td><?= $pksfLoanCF ?></td>
		<td><?= $pksfCurrentCollectionF ?></td>
		<td>-</td>
		<td><?= $pksfTotalLoanerF ?></td>
		<td><?= $pksfLoanLF + $pksfLoanCF ?></td>
		<td><?= $subTotalLoanerF ?></td>
		<td><?= $pksfLoanCountF ?></td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
	</tr>

	<tr style="background: #eee;">
		<td></td>
		<td>মোট</td>
		<td><?= $pksfTotalLM + $pksfTotalLF ?></td>
		<td><?= $pksfLoanLM + $pksfLoanLF ?></td>
		<td><?= $pksfTotalCM + $pksfTotalCF ?></td>
		<td><?= $pksfLoanCM + $pksfLoanCF ?></td>
		<td><?= $pksfCurrentCollectionM + $pksfCurrentCollectionF ?></td>
		<td>-</td>
		<td><?= $pksfTotalLoanerM + $pksfTotalLoanerF ?></td>
		<td><?= $pksfLoanLM + $pksfLoanLF + $pksfLoanCM + $pksfLoanCF ?></td>
		<td><?= $subTotalLoanerM + $subTotalLoanerF ?></td>
		<td><?= $pksfLoanCountM + $pksfLoanCountF ?></td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
	</tr>

<!-- pksf row end -->


<!-- non pksf start -->
<?php
	$pList = $this->db->where("pksf","2")->get("project")->result();

	// last month

	$nonpksfTotalLM = 0;
	$nonpksfTotalLF = 0;

	$nonpksfLoanLM = 0;
	$nonpksfLoanLF = 0;

	// current month

	$nonpksfTotalCM = 0;
	$nonpksfTotalCF = 0;

	// current month loan
	$nonpksfLoanCM = 0;
	$nonpksfLoanCF = 0;

	// current month collection
	$nonpksfCurrentCollectionM = 0;
	$nonpksfCurrentCollectionF = 0;

	// pksf total loaner
	$nonpksfTotalLoanerM = 0;
	$nonpksfTotalLoanerF = 0;

	// pksf sub total loaner 
	$subTotalLoanerM = 0;
	$subTotalLoanerF = 0;

	// pksf total loaner
	$nonpksfLoanCountM = 0;
	$nonpksfLoanCountF = 0;

	foreach($pList as $list):
		
		$sub_totalLM = 0;
		$sub_total_loanLM = 0;
		$lmtm = date("Y")."-".date("m")."-01";

		$nonpksfLoanM = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id AND li.opening_date < '$lmtm'")->num_rows();

		$sub_totalLM += $nonpksfLoanM;
		$nonpksfTotalLM += $nonpksfLoanM;

		$nonpksfLoanF = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id AND li.opening_date < '$lmtm'")->num_rows();

		$sub_totalLM += $nonpksfLoanF;

		$nonpksfTotalLF += $nonpksfLoanF;

		// loan information
		// active loan total
		$totalActiveLoanLM = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id")->row(); 
		
		$totalActiveLoanLF = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id")->row(); 

		// collection up to last month
		$tm = date("m");

		$paidLoanLM = $this->db->query("SELECT SUM(lc.capital) as paid_loan FROM `loan_info` li,somiti_project sp,member_info mi,loan_collection lc WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND lc.member_id=li.member_id AND lc.month_no < $tm AND sp.project_id = $list->id")->row();

		

		$paidLoanLF = $this->db->query("SELECT SUM(lc.capital) as paid_loan FROM `loan_info` li,somiti_project sp,member_info mi,loan_collection lc WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND lc.member_id=li.member_id AND lc.month_no < $tm AND sp.project_id = $list->id")->row();


		// current month loan given
		
		$sub_total_givenM = 0;
		$sub_total_givenF = 0;

		$dfirst = date("Y").'-'.date("m").'-01';
		$dlast = date("Y").'-'.date("m").'-30';

		$currentLoanGiveM = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id AND li.opening_date >= '$dfirst' AND li.opening_date <= '$dlast' ")->num_rows();

		$sub_total_givenM += $currentLoanGiveM;
		$nonpksfTotalCM += $currentLoanGiveM;

		$currentLoanGiveF = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id AND li.opening_date >= '$dfirst' AND li.opening_date <= '$dlast' ")->num_rows();
		
		$sub_total_givenF += $currentLoanGiveF;
		$nonpksfTotalCF += $currentLoanGiveF;


		// current month loan given
		$stDate = date("Y")."-".date("m")."-"."01";
		$lsDate = date("Y")."-".date("m")."-"."30";

		// initial sub total
		$sub_total_current_loan = 0;

		// male current given loan
		$currentMonthLoanM = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id AND li.opening_date >= '$stDate' AND li.opening_date <= '$lsDate' ")->row();

		$nonpksfLoanCM += $currentMonthLoanM->total_amount;
		$sub_total_current_loan += $currentMonthLoanM->total_amount;

		// female current given loan
		$currentMonthLoanF = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id AND li.opening_date >= '$stDate' AND li.opening_date <= '$lsDate' ")->row();

		$nonpksfLoanCF += $currentMonthLoanF->total_amount;
		$sub_total_current_loan += $currentMonthLoanF->total_amount;

		// current month collection
		$ctm = date("m");

			// sub total
			$currentTotalCollectionSubT = 0;

			// male
		$currentTotalCollectionM = $this->db->query("SELECT SUM(lc.capital) as capital FROM loan_collection lc,member_info mi,somiti_project sp WHERE lc.member_id = mi.user_id AND mi.somiti = sp.somiti_id AND sp.project_id = $list->id AND mi.gender = 1 AND lc.month_no = $ctm")->row();

		$currentTotalCollectionSubT += $currentTotalCollectionM->capital;
		$nonpksfCurrentCollectionM += $currentTotalCollectionM->capital;

			// female
		$currentTotalCollectionF = $this->db->query("SELECT SUM(lc.capital) as capital FROM loan_collection lc,member_info mi,somiti_project sp WHERE lc.member_id = mi.user_id AND mi.somiti = sp.somiti_id AND sp.project_id = $list->id AND mi.gender = 2 AND lc.month_no = $ctm")->row();

		$currentTotalCollectionSubT += $currentTotalCollectionF->capital;
		$nonpksfCurrentCollectionF += $currentTotalCollectionF->capital;

		// total loaner ( last month+current month )
		$nonpksfTotalSubCM = 0;

		// total loaner information

		$subTotalLoaner = 0;

		// male loaner
		$totalLoanerM = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id GROUP BY member_id ")->num_rows();

		$subTotalLoaner += $totalLoanerM;
		$subTotalLoanerM += $totalLoanerM;

		// female loaner
		$totalLoanerF = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id GROUP BY member_id ")->num_rows();
		

		$subTotalLoaner += $totalLoanerF;
		$subTotalLoanerF += $totalLoanerF;

		// male total loan given
		$totalLoanM = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id ")->num_rows();

		$loanCount = 0;

		$loanCount += $totalLoanM;
		$nonpksfLoanCountM += $totalLoanM;

		
		// female total loan given
		$totalLoanF = $this->db->query("SELECT * FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id")->num_rows();

		$loanCount += $totalLoanF;
		$nonpksfLoanCountF += $totalLoanM;

?>

				<tr>
					<td rowspan="3"><?= $list->project_name ?></td>
					<td>পুরুষ</td>
					<td><?= $nonpksfLoanM ?></td>
					<td>
						<?php 
							$sub_total_loanLM += $totalActiveLoanLM->total_amount - $paidLoanLM->paid_loan;
							$nonpksfLoanLM += $totalActiveLoanLM->total_amount - $paidLoanLM->paid_loan; 
							echo $totalActiveLoanLM->total_amount - $paidLoanLM->paid_loan; 
						?>
					</td>
					<td><?= $currentLoanGiveM ?></td>
					<td><?= $currentMonthLoanM->total_amount ?></td>
					<td><?= $currentTotalCollectionM->capital ?></td>
					<td>-</td>
					<td>
						<?php 
							$nonpksfTotalSubCM += $nonpksfLoanM + $currentLoanGiveM;
							$nonpksfTotalLoanerM += $nonpksfLoanM + $currentLoanGiveM;
							echo $nonpksfLoanM + $currentLoanGiveM;
						?>
					</td>
					<td><?= $totalActiveLoanLM->total_amount - $paidLoanLM->paid_loan + $currentMonthLoanM->total_amount; ?></td>
					<td><?= $totalLoanerM ?></td>
					<td><?= $totalLoanM ?></td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>



				<tr>
					<td>মহিলা</td>
					<td><?= $nonpksfLoanF ?></td>
					<td>
						<?php 
							$sub_total_loanLM += $totalActiveLoanLF->total_amount - $paidLoanLF->paid_loan;
							$nonpksfLoanLF += $totalActiveLoanLF->total_amount - $paidLoanLF->paid_loan;
							echo $totalActiveLoanLF->total_amount - $paidLoanLF->paid_loan; ?></td>
					<td><?= $currentLoanGiveF ?></td>
					<td><?= $currentMonthLoanF->total_amount ?></td>
					<td><?= $currentTotalCollectionF->capital ?></td>
					<td>-</td>
					<td>
						<?php 
							$nonpksfTotalSubCM += $nonpksfLoanF + $currentLoanGiveF;
							$nonpksfTotalLoanerF += $nonpksfLoanF + $currentLoanGiveF;
							echo $nonpksfLoanF + $currentLoanGiveF; 
						?>
					</td>
					<td><?= $totalActiveLoanLF->total_amount - $paidLoanLF->paid_loan + $currentMonthLoanF->total_amount; ?></td>
					<td><?= $totalLoanerF ?></td>
					<td><?= $totalLoanF ?></td>
					<td></td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>

				<tr>
					<td>মোট</td>
					<td><?= $sub_totalLM ?></td>
					<td><?= $sub_total_loanLM ?></td>
					<td><?= $sub_total_givenM ?></td>
					<td><?= $sub_total_current_loan ?></td>
					<td><?= $currentTotalCollectionSubT ?></td>
					<td>-</td>
					<td><?= $nonpksfTotalSubCM ?></td>
					<td><?= $sub_total_loanLM + $sub_total_current_loan ?></td>
					<td><?= $subTotalLoaner ?></td>
					<td><?= $loanCount ?></td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>

<?php
	endforeach;
?>

<!-- total non-pksf -->
	<tr style="background: #eee;">
		<td>নন পিকেএসএফ </td>
		<td>পুরুষ</td>
		<td><?= $nonpksfTotalLM ?></td>
		<td><?= $nonpksfLoanLM ?></td>
		<td><?= $nonpksfTotalCM ?></td>
		<td><?= $nonpksfLoanCM ?></td>
		<td><?= $nonpksfCurrentCollectionM ?></td>
		<td>-</td>
		<td><?= $nonpksfTotalLoanerM ?></td>
		<td><?= $nonpksfLoanLM + $nonpksfLoanCM ?></td>
		<td><?= $subTotalLoanerM ?></td>
		<td><?= $nonpksfLoanCountM ?></td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
	</tr>

	<tr style="background: #eee;">
		<td>মোট</td>
		<td>মহিলা</td>
		<td><?= $nonpksfTotalLF ?></td>
		<td><?= $nonpksfLoanLF ?></td>
		<td><?= $nonpksfTotalCF ?></td>
		<td><?= $nonpksfLoanCF ?></td>
		<td><?= $nonpksfCurrentCollectionF ?></td>
		<td>-</td>
		<td><?= $nonpksfTotalLoanerF ?></td>
		<td><?= $nonpksfLoanLF + $pksfLoanCF ?></td>
		<td><?= $subTotalLoanerF ?></td>
		<td><?= $nonpksfLoanCountF ?></td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
	</tr>

	<tr style="background: #eee;">
		<td></td>
		<td>মোট</td>
		<td><?= $nonpksfTotalLM + $nonpksfTotalLF ?></td>
		<td><?= $nonpksfLoanLM + $nonpksfLoanLF ?></td>
		<td><?= $nonpksfTotalCM + $nonpksfTotalCF ?></td>
		<td><?= $nonpksfLoanCM + $nonpksfLoanCF ?></td>
		<td><?= $nonpksfCurrentCollectionM + $nonpksfCurrentCollectionF ?></td>
		<td>-</td>
		<td><?= $nonpksfTotalLoanerM + $nonpksfTotalLoanerF ?></td>
		<td><?= $nonpksfLoanLM + $nonpksfLoanLF + $nonpksfLoanCM + $nonpksfLoanCF ?></td>
		<td><?= $subTotalLoanerM + $subTotalLoanerF ?></td>
		<td><?= $nonpksfLoanCountM + $nonpksfLoanCountF ?></td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
		<td>-</td>
	</tr>

<!-- non pksf end -->


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