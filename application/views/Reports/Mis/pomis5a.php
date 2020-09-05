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
        
<?php
	// pksf service charge collection
	$pksfCharge = $this->db->query("SELECT SUM(lc.charge) as total_charge FROM `loan_collection` lc,member_info mi,somiti_project sp,project p WHERE lc.member_id=mi.user_id AND mi.somiti=sp.somiti_id AND sp.project_id=p.id AND p.pksf = 1")->row();
	
	// non pksf charge collection
	$nonpksfCharge = $this->db->query("SELECT SUM(lc.charge) as total_charge FROM `loan_collection` lc,member_info mi,somiti_project sp,project p WHERE lc.member_id=mi.user_id AND mi.somiti=sp.somiti_id AND sp.project_id=p.id AND p.pksf = 2")->row();
?>

		<div class="box-body">
			<p style="text-align:center;"> <b> আর্থিক প্রতিবেদন  ( Financial Report )  <br> গণস্বাস্থ্য কেন্দ্র ক্ষুদ্র ঋণ কার্যক্রম (জিকেএমসি)  <br> month - year </b> </p>
			<table width="100%" height="auto" class="table-bordered">
				<tr>
					<td rowspan="2"> <p style="transform:rotate(-90deg);">  নোট </p> </td>
					<td colspan="2" > তহবিল  (DMF) </td>
					<td colspan="8"> Notes to Balance Sheet </td>
				</tr>
				
				<!-- title -->
				<tr>
					<td colspan="2" > (খ)  তহবিল হিসাব </td>
					<td colspan="4" > &nbsp; </td>
					<td colspan="2"> PKSF </td>
					<td> NON - PKSF </td>
					<td> PKSF + NON - PKSF </td>
				</tr>
				<!-- numbering -->
				<tr>
					<td rowspan="7"> <p style="transform:rotate(-90deg);">  নোট - ১ </p> </td>
					<td rowspan="7" colspan="2"> Fund </td>
					<td colspan="4" > ১ </td>
					<td colspan="2"> ২ </td>
					<td> ৩ </td>
					<td> ৪ = ২+৩ </td>
				</tr>
				<!-- numbering -->
				<tr>
					<td colspan="4" > এ যাবৎ সার্ভিস চার্জ আদায় </td>
					<td colspan="2"> <?= $pksfCharge->total_charge ?> </td>
					<td> <?php if($nonpksfCharge->total_charge):echo $nonpksfCharge->total_charge;else:echo 0;endif; ?> </td>
					<td> <?= $pksfCharge->total_charge + $nonpksfCharge->total_charge ?> </td>
				</tr>
				
				<tr>
					<td colspan="4" >  এ যাবৎ অন্যান্য  আয়</td>
					<td colspan="2"> 0 </td>
					<td> 0 </td>
					<td> 0 </td>
				</tr>
				
				<tr>
					<td colspan="4" >  এ যাবৎ মোট আয় </td>
					<td colspan="2"> <?= $pksfCharge->total_charge ?> </td>
					<td> <?php if($nonpksfCharge->total_charge):echo $nonpksfCharge->total_charge;else:echo 0;endif; ?> </td>
					<td> <?= $pksfCharge->total_charge + $nonpksfCharge->total_charge ?> </td>
				</tr>
				
				<tr>
					<td colspan="4" >  এ যাবৎ মোট ব্যয় </td>
					<td colspan="2"> 0 </td>
					<td> 0 </td>
					<td> 0 </td>
				</tr>
				
				<tr>
					<td colspan="4" > তহবিল </td>
					<td colspan="2"> <?= $pksfCharge->total_charge ?> </td>
					<td> <?php if($nonpksfCharge->total_charge):echo $nonpksfCharge->total_charge;else:echo 0;endif; ?> </td>
					<td> <?= $pksfCharge->total_charge + $nonpksfCharge->total_charge ?> </td>
				</tr>
				
				<tr>
					<td colspan="4" >  এ যাবৎ বেতন প্রদান </td>
					<td colspan="2"> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
			</table>
		</div><!-- /.box-body -->
        
		<!-- 2nd part start-->
		
		<div class="box-body">
			<table width="100%" height="auto" class="table-bordered">
				
				<tr>
					<td rowspan="13"> <p style="transform:rotate(-90deg);">  নোট - ২ </p> </td>
					<td colspan="2" rowspan="2"> PKSF Fund </td>
					<td  rowspan="2"> এ যাবৎ  প্রাপ্তি  <br> (আসল) </td>
					<td colspan="2"> এ যাবৎ  প্রাপ্তি  পরিশোধ </td>
					<td rowspan="2"> বর্তমান স্থিতি <br> আসল </td>
					<td colspan="2"> মাস শেষে বকেয়া </td>
					<td rowspan="2"> পরবর্তী ১২ মাসে  <br> পরিশোধযোগ্য তহবিল </td>
				</tr>
				<!-- title -->
				<tr>
					<td> আসল </td>
					<td> সার্ভিস চার্জ </td>
					<td> আসল </td>
					<td> সার্ভিস চার্জ </td>
				</tr>
				<!-- title -->
				
				<tr>
					<td colspan="2"> গ্রামীণ ক্ষুদ্রঋণ (পিকেএসএফ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2"> অতিদরিদ্র ক্ষুদ্রঋণ (ইউপিপি) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2"> এল আর পি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2"> ইফরাপ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2"> এফএসওই - ইউপিপি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2"> অন্যান্য ক্ষুদ্রঋণ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2"> মোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2"> প্রাতিষ্ঠানিক ঋণ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2"> পিকেএসএফ মোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2"> নন - পিকেএসএফ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2"> সর্বমোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
			</table>
		</div><!-- /.box-body -->
		
		<!-- 2nd part end -->
		
		
		<!-- 3rd part start-->
		
<?php
	// regular savings
	$data = array(
			"saving_type" => 1,
			"save_or_widrow" => 1
		);
	$generalSavings = $this->db->select("SUM(amount) as total")->get_where("saving_log",$data)->row();
	
	// sessa savings
	$sessadata = array(
			"saving_type" => 2,
			"save_or_widrow" => 1
		);

	$sessaSavings = $this->db->select("SUM(amount) as total")->get_where("saving_log",$sessadata)->row();

	// regular withdraw
	$withdrawdata = array(
			"saving_type" => 1,
			"save_or_widrow" => 2
		);
	$generalWithdraw = $this->db->select("SUM(amount) as total")->get_where("saving_log",$withdrawdata)->row();
	
	// sessa savings
	$sessaWithdrawData = array(
			"saving_type" => 2,
			"save_or_widrow" => 2
		);

	$sessaWithdraw = $this->db->select("SUM(amount) as total")->get_where("saving_log",$sessaWithdrawData)->row();


?>

		<div class="box-body">
			<table width="100%" height="auto" class="table-bordered">
				<tr>
					<td rowspan="7"> <p style="transform:rotate(-90deg);">  নোট - ৩ </p> </td>
					<td rowspan="2" colspan="2" > সঞ্চয় তহবিল </td>
					<td colspan="3"> সাধারণ সঞ্চয় (নিয়মিত )</td>
					<td colspan="3"> সেচ্ছা সঞ্চয় </td>
					<td colspan="3"> মোট সঞ্চয় </td>
				</tr>
				
				<tr>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2" > এ যাবৎ সঞ্চয় আদায় (ক)  </td>
					<td> <?= $generalSavings->total ?> </td>
					<td> - </td>
					<td> - </td>
					<td> <?= $sessaSavings->total ?> </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2" > এ যাবৎ সুদ প্রভিশন (খ)  </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2" > মোট সঞ্চয় আদায় (গ) = ক + খ</td>
					<td> <?= $generalSavings->total ?> </td>
					<td> - </td>
					<td> - </td>
					<td> <?= $sessaSavings->total ?> </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2" > এ যাবৎ সঞ্চয় ফেরত (ঘ) </td>
					<td> <?php if($generalWithdraw->total != ''):echo $generalWithdraw->total;else:echo 0;endif; ?> </td>
					<td> - </td>
					<td> - </td>
					<td> <?php if($sessaWithdraw->total != ''):echo $sessaWithdraw->total;else:echo 0;endif; ?> </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td colspan="2" > বর্তমান সঞ্চয় স্থিতি (ঙ)  = গ - ঘ </td>
					<td> <?= $generalSavings->total - $generalWithdraw->total ?> </td>
					<td> - </td>
					<td> - </td>
					<td> <?= $sessaSavings->total - $sessaWithdraw->total ?> </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
			</table>
			
			<p> 
				বিঃ দ্রঃ  উপরোক্ত ছকের ২ নং নোটে অন্যান্য ক্ষুদ্রঋণ কার্যক্রমের ক্ষেত্রে প্রয়োজনীয় সংখ্যক সারি তৈ্রী করে কার্যক্রমের নাম উল্লেখ পূর্বক আলাদাভাবে তথ্য সন্নিবেশ করতে হবে।
			</p>
		</div><!-- /.box-body -->
		
		<!-- 3rd part end -->
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