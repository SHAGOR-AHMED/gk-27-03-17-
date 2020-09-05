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
		
		<div class="box-body">
		
			
			
			<table width="100%" height="auto" class="table-bordered">
			<center> <b> গণস্বাস্থ্য কেন্দ্র ক্ষুদ্রঋণ কার্যক্রম ( জিকেএমসি) </b>
					 <p> আর্থিক প্রতিবেদনঃ সমন্বিত স্থিতিপত্র month, year; অর্থ বছর  year - year (month টু month)</p>	
			</center>
				<tr>
					<td rowspan="2"> ক্রঃ <br> নং </td>
					<td rowspan="2" colspan="2"> সম্পত্তি </td>
					<td colspan="3"> বিগত অর্থ বছর ২০১৪-২০১৫ </td>
					<td colspan="3"> চলতি অর্থ বছর ২০১৫-২০১৬ (জুলাই টু জুন) </td>
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
					<td> ১ </td>
					<td colspan="2"> মাঠে ঋণ স্থিতিঃ </td>
					<td> টাকা </td>
					<td> টাকা  </td>
					<td> টাকা </td>
					<td> টাকা </td>
					<td> &nbsp; </td>
					<td> টাকা </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বুনিয়াদ এককালীন </td>
					<td> - </td>
					<td> -  </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বুনিয়াদ মাসিক </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বুনিয়াদ এককালীন </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> উপমোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> এল আর পি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বৈদ্বঃ কর্মঃ ঋণ (পিকেএসএফ)</td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অতিদরিদ্র (ইফরাপ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অতিদরিদ্র (ইউপিপি) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> স্যানিটেশন ঋণ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> গৃহ ঋণ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> জাগরণ ঋণ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> প্ললীঋণ (আরএমসি)</td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> পার্টনার এনজিও ঋণ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2" style="text-align:right !important;"> উপমোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2" style="text-align:right !important;"> সর্বমোট ঋণ স্থিতিঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> শাখা অফিস হিঃ (এফএসসি) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> প্রধান অফিস হিঃ (এফএসসি) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> প্রধান অফিস হিঃ (ক্ষুদ্রঋণ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> উপমোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> প্রধান অফিস হিঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> আঞ্চলিক অফিস হিঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> শাখা অফিস হিঃ  </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> উপমোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> এফ ডি আরঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সঞ্চয় </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> এলএলপি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ডিএমএফই </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অন্যান্য বিনিয়োগ (এফদি আর সুদ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> উপমোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> স্থায়ী সম্পত্তি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অফিস সরঞ্জাম </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> জমি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> আসবাব পত্র </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বইপত্র </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বৈদ্যতিক সরঞ্জাম </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বিল্ডিং </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> টউবওয়েল </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> মটরসাইকেল </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> কম্পিউটার </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> যানবাহন (সাইকেল) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> তৈজসপত্র</td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> স্থায়ী সম্পত্তি মোটঃ</td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অন্যান্য সম্পত্তিঃ</td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> মোটর সাইকেলের ঋণ</td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বাইসাইকেলের ঋণ</td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সফটওয়্যার হিসাব </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> প্রিন্টেড ষ্টেশনারী ষ্টক হিঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> তসরুপ / সাসপেন্স হিঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> শেয়ার ক্রয় </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> আন্ত ঋণ হিঃ (শাখা টূ শাখা) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অগ্রিম হিসাব </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> আয়কর অগ্রিম হিসাব </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ওডিঋণ শাখা অফিস </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সিকিউরিটি হিসাব (কর্মী কল্যাণ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> কু - ঋণ হিসাব </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ঋণ শাখা অফিস (ক্ষুদ্রঋণপিকেঃ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ঋণ হিসাব শিক্ষা কার্যক্রম </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> আন্তঋণ হিঃ (প্রধান অফিস টু কেন্দ্র) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> মোট অন্যান্য সম্পত্তি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> হাতে নগদ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ব্যাংকে স্থিতি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> উপমোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সর্বমোট সম্পদঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
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